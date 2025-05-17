<?php 
use core\App;
use core\Database;

require base_path('vendor/autoload.php');
$db = App::resolve(Database::class);

echo "<pre><br><br><br><br><br><br><br><br>";
print_r($_POST);
echo "</pre><br><br><br>";
print_r($_FILES);
echo "<br><br><br><br><br>";

// Validate POST data
function validateData($data) {
    $errors = [];

    if (empty($data['title'])) {
        $errors[] = 'Title is required.';
    }
    if (empty($data['overview'])) {
        $errors[] = 'Overview is required.';
    }
    if (empty($data['description'])) {
        $errors[] = 'Description is required.';
    }
    if (empty($data['company'])) {
        $errors[] = 'Company is required.';
    }
    if (empty($data['start_date'])) {
        $errors[] = 'Start date is required.';
    }
    if (!is_array($data['gallery']) || count($data['gallery']) == 0) {
        $errors[] = 'At least one gallery image is required.';
    }

    // Add more validation as needed...

    return $errors;
}

$errors = validateData($_POST);
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo $error . "<br>";
    }
    exit;
}

// product_id AS id,
// product_name AS title,
// large_description AS description,
// status,
// client_name,
// start_date,
// main_image,
// progress,
// budget,
// duration,
// vidio,
// overview,
// users_imapacted AS users_impacted,
// lines_of_code,
// countries_deployed

// Insert into products table
$db->query("INSERT INTO products (product_name, overview, large_description, status, client_name, start_date, budget, progress,short_description ) VALUES 
(:title, :overview, :description, :status, :company, :start_date, :budget, :progress ,:large_description);", [
    'title' => $_POST['title'],
    'overview' => $_POST['overview'],
    'description' => $_POST['description'],
    'status' => $_POST['status'],
    'company' => $_POST['company'],
    'start_date' => $_POST['start_date'],
    'budget' => $_POST['budget'],
    'progress' => $_POST['progress'],
    'large_description' => $_POST['description'],

]);

$productId = $db->lastInsertId();

foreach($_POST['team'] as $team) {
    $db->query("INSERT INTO product_developers (product_id, developer_id, role) VALUES ( :productId, :user_id, :role )", [
        'productId' => $productId, 'user_id' => $team['id'], 'role' => $team['role']
    ]);
}

$uploadDir=base_path('views/uploads/');
if(move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $_FILES['main_image']['name']))
{
    $db->query("UPDATE products SET main_image = :main_image WHERE product_id = :productId", [
        'main_image' => $_FILES['main_image']['name'],
        'productId' => $productId
    ]);
}
foreach ($_FILES['gallery']['name'] as $key => $name) {
    if (move_uploaded_file($_FILES['gallery']['tmp_name'][$key]['file'], $uploadDir . basename($name['file']))) 
    {
        // Insert into product_photoes table
        $db->query("INSERT INTO products_photoes (product_id, photo, caption) VALUES ( :productId,  :name, :caption )", [
            'productId' => $productId, 'name' => $name['file'], 'caption' => $_POST['gallery'][$key]['caption']
        ]);
    }
}

// Insert technologies
foreach ($technologies as $technology) {
    $db->query("INSERT INTO product_technologies (product_id, technology) VALUES ( :productId, :technology )", [
        'productId' => $productId, 'technology' => $technology
    ]);
}

// Insert timeline
foreach ($_POST['timeline'] as $timeline) {
    $db->query("INSERT INTO product_timeline (product_id, title, date, description) VALUES ( :productId, :title , :date , :description )", [
        'productId' => $productId, 'title' => $timeline['title'], 'date' => $timeline['date'], 'description' => $timeline['description']
    ]);
}

echo "Data successfully stored!". $productId;
