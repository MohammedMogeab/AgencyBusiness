<?php
use core\App;
use core\Database;

$db = App::resolve(Database::class);

$user_id = $_SESSION['user']['user_id'];

// User info
$user = $db->query('SELECT * FROM users WHERE user_id = :id', [
    'id' => $user_id
])->findOrFail();

// Portfolio summary
$portfolio = $db->query("
    SELECT 
        COALESCE(SUM(amount),0) as total_invested,
        COALESCE(SUM(actual_return),0) as total_returns,
        COALESCE(SUM(amount + actual_return),0) as current_value,
        ROUND(100 * SUM(CASE WHEN actual_return > 0 THEN 1 ELSE 0 END) / NULLIF(COUNT(*),0), 2) as success_rate
    FROM investments
    WHERE user_id = :id
", ['id' => $user_id])->findOrFail();

// Active investments
$active_investments = $db->query("
    SELECT i.*, p.product_name, p.main_image as product_image, p.progress
    FROM investments i
    JOIN products p ON i.product_id = p.product_id
    WHERE i.user_id = :id AND i.status IN ('pending', 'completed') AND (i.maturity_date IS NULL OR i.maturity_date > NOW())
    ORDER BY i.investment_date DESC
", ['id' => $user_id])->get();

// Add calculated fields for each active investment
foreach ($active_investments as &$inv) {
    $inv['roi_percentage'] = $inv['amount'] > 0 ? round(100 * ($inv['actual_return'] / $inv['amount']), 2) : 0;
    $inv['current_value'] = $inv['amount'] + $inv['actual_return'];
    $inv['progress'] = $inv['progress'] ?? 0;
}

// Investment history
$investment_history = $db->query("
    SELECT i.*, p.product_name
    FROM investments i
    JOIN products p ON i.product_id = p.product_id
    WHERE i.user_id = :id
    ORDER BY i.investment_date DESC
    LIMIT 50
", ['id' => $user_id])->get();

foreach ($investment_history as &$h) {
    $h['roi_percentage'] = $h['amount'] > 0 ? round(100 * ($h['actual_return'] / $h['amount']), 2) : 0;
}

// Project details (optional, for modal/details)
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

view('user/usermanage.view.php', [
    'user' => $user,
    'portfolio' => $portfolio,
    'active_investments' => $active_investments,
    'investment_history' => $investment_history,
    'project_details' => $project_details
]);

