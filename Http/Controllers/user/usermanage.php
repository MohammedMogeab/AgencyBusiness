<?php
use core\App;
use core\Database;

$db = App::resolve(Database::class);

// Debug session
error_log("Session contents: " . print_r($_SESSION, true));

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    error_log("User not logged in, redirecting to login");
    header('Location: /login');
    exit();
}

$user_id = $_SESSION['user']['user_id'];
// dd($_SESSION['user']);
error_log("User ID: " . $user_id);

try {
    
    // User info
    $user = $db->query('SELECT * FROM users WHERE user_id = :id', [
        'id' => $user_id
    ])->find();
    // dd($user);

    error_log("User found: " . print_r($user, true));

    // Portfolio summary
    $portfolio = $db->query("
        SELECT 
            COALESCE(SUM(amount),0) as total_invested,
            COALESCE(SUM(CASE WHEN status = 'completed' THEN amount ELSE 0 END),0) as total_returns,
            COALESCE(SUM(amount),0) as current_value,
            ROUND(100 * SUM(CASE WHEN status = 'completed' THEN 1 ELSE 0 END) / NULLIF(COUNT(*),0), 2) as success_rate
        FROM investments
        WHERE user_id = :id
    ", ['id' => $user_id])->findOrFail();

    error_log("Portfolio summary: " . print_r($portfolio, true));

    // Active investments
    $active_investments = $db->query("
        SELECT i.*, p.product_name, p.main_image as product_image, p.progress,
               p.short_description, p.budget, p.start_date, p.duration
        FROM investments i
        JOIN products p ON i.product_id = p.product_id
        WHERE i.user_id = :id AND i.status IN ('pending', 'completed')
        ORDER BY i.created_at DESC
    ", ['id' => $user_id])->get();

    error_log("Active investments count: " . count($active_investments));

    // Add calculated fields for each active investment
    foreach ($active_investments as &$inv) {
        $inv['roi_percentage'] = $inv['status'] === 'completed' ? 100 : 0;
        $inv['current_value'] = $inv['amount'];
        $inv['progress'] = $inv['progress'] ?? 0;
    }

    // Investment history with pagination
    $page = $_GET['page'] ?? 1;
    $per_page = 10;
    $offset = ($page - 1) * $per_page;

    // Get total count for pagination
    $total_count = $db->query("
        SELECT COUNT(*) as count 
        FROM investments 
        WHERE user_id = :id
    ", ['id' => $user_id])->find()['count'];

    $total_pages = ceil($total_count / $per_page);

    // Get paginated investment history
    $investment_history = $db->query("
        SELECT i.*, p.product_name, p.main_image
        FROM investments i
        JOIN products p ON i.product_id = p.product_id
        WHERE i.user_id = :id
        ORDER BY i.created_at DESC
        LIMIT $per_page OFFSET $offset
    ", [
        'id' => $user_id
    ])->get();

    error_log("Investment history count: " . count($investment_history));

    foreach ($investment_history as &$h) {
        $h['roi_percentage'] = $h['status'] === 'completed' ? 100 : 0;
    }

    // Project details
    $project_ids = array_unique(array_column($active_investments, 'product_id'));
    $project_details = [];
    if ($project_ids) {
        $in = implode(',', array_map('intval', $project_ids));
        $project_details = $db->query("
            SELECT p.*, 
                (SELECT GROUP_CONCAT(feature) FROM product_featuers WHERE product_id = p.product_id) as features,
                (SELECT GROUP_CONCAT(technology) FROM product_technologies WHERE product_id = p.product_id) as technologies
            FROM products p
            WHERE p.product_id IN ($in)
        ")->get();
    }

    error_log("Project details count: " . count($project_details));
    
    view('user/usermanage.view.php', [
        'user' => $user,
        'portfolio' => $portfolio,
        'active_investments' => $active_investments,
        'investment_history' => $investment_history,
        'project_details' => $project_details,
        'pagination' => [
            'current_page' => (int)$page,
            'total_pages' => $total_pages,
            'per_page' => $per_page
        ]
    ]);



} catch (Exception $e) {
    // Log the error with more details
    error_log("Error in user management: " . $e->getMessage());
    error_log("Error trace: " . $e->getTraceAsString());
    
    // Display error message
    echo "<div style='color: red; padding: 20px; margin: 20px; border: 1px solid red;'>";
    echo "<h3>Error Details:</h3>";
    echo "<p><strong>Message:</strong> " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<p><strong>File:</strong> " . htmlspecialchars($e->getFile()) . "</p>";
    echo "<p><strong>Line:</strong> " . $e->getLine() . "</p>";
    echo "<p><strong>Trace:</strong></p>";
    echo "<pre>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
    echo "</div>";
    
    // Set error message in session
    $_SESSION['error'] = "An error occurred while loading your investment data. Please try again later.";
}

