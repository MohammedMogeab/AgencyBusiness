<?php 
use core\App;
use core\Database;

require base_path('vendor/autoload.php');
$db = App::resolve(Database::class);

// echo "<pre><br><br><br><br><br><br><br><br>";
// print_r($_POST);
// echo "</pre><br><br><br>";
// print_r($_FILES);
// echo "<br><br><br><br><br>";

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

$uploadDir=base_path('public/uploads/');
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
try{
    $db->creatTransaction();
    $db->query("INSERT INTO products (
        product_name, 
        overview, 
        large_description, 
        status, 
        client_name, 
        start_date, 
        main_image,
        budget, 
        progress,
        short_description,
        duration,
        users_imapacted,
        lines_of_code,
        countries_deployed,
        minmum_investment
    ) VALUES 
    (:title, :overview, :description, :status, :company, :start_date, :main_image, :budget, :progress ,:large_description,:duration,:users_impacted,:lines_of_code,:countries_deployed,:minmum_investment);", [
        'title' => $_POST['title'],
        'overview' => $_POST['overview'],
        'description' => $_POST['description'],
        'status' => $_POST['status'],
        'main_image' => (saveUpload($_FILES['image']['tmp_name'], $_FILES['image']['name'])) ? $_FILES['image']['name'] : null,
        'company' => $_POST['company'],
        'start_date' => $_POST['start_date'],
        'budget' => $_POST['budget'],
        'progress' => $_POST['progress'],
        'large_description' => $_POST['description'],
        'duration' => $_POST['duration'],
        // 'vidio' => $_POST['vidio'],
        'users_impacted' => $_POST['users_imapacted'],
        'lines_of_code' => $_POST['lines_of_code'],
        'countries_deployed' => $_POST['countries_deployed'],
        'minmum_investment' => $_POST['min_investment']
    ]);

    $productId = $db->lastInsertId();
    /* 
    [team] => Array
            (
                [0] => Array
                    (
                        [name] => team1 name
                        [role] => team 1 role
                        [twitter] => https://twitter.com/MubarakAlqadasy1
                        [github] => https://github.com/MubarakAshrafAlrawy1
                        [linkedin] => https://linkedin.com/MubarakAshrafAlrawy1
                    )

                [1] => Array
                    (
                        [name] => team2 name
                        [role] => team2 role
                        [twitter] => https://twitter.com/MubarakAlqadasy2
                        [github] => https://github.com/MubarakAshrafAlrawy2
                        [linkedin] => https://linkedin.com/MubarakAshrafAlrawy2
                    )

            )

    [team] => Array ( 
            [name] => Array ( 
                [0] => Array ( [avatar] => WIN_20250308_20_22_54_Pro.jpg ) 
                [1] => Array ( [avatar] => WIN_20250308_20_22_54_Pro (3).jpg )) 
            [full_path] => Array ( 
                [0] => Array ( [avatar] => WIN_20250308_20_22_54_Pro.jpg ) 
                [1] => Array ( [avatar] => WIN_20250308_20_22_54_Pro (3).jpg ) ) 
            [type] => Array ( 
                [0] => Array ( [avatar] => image/jpeg ) 
                [1] => Array ( [avatar] => image/jpeg ) ) 
            [tmp_name] => Array ( 
                [0] => Array ( [avatar] => C:\xampp\tmp\php73EB.tmp ) 
                [1] => Array ( [avatar] => C:\xampp\tmp\php73EC.tmp ) ) 
            [error] => Array ( 
                [0] => Array ( [avatar] => 0 ) 
                [1] => Array ( [avatar] => 0 ) ) 
            [size] => Array ( 
                [0] => Array ( [avatar] => 188981 ) 
                [1] => Array ( [avatar] => 66650 ) ) ) 
    */
    foreach($_POST['team'] as $key =>$team) {
        $db->query("INSERT INTO developers (name,  role, avatar) VALUES ( :name, :role , :avatar )", [
            'name' => $team['name'],
            'role' => $team['role'],
            'avatar' => ((isset($_FILES['team']) && isset($_FILES['team']['name'][$key])) && move_uploaded_file( from: $_FILES['team']['tmp_name'][$key]['avatar'],  to: $uploadDir . $_FILES['team']['name'][$key]['avatar']))?$_FILES['team']['name'][$key]['avatar']:null
        ]);
        $developer_id = $db->lastInsertId();
        $db->query("INSERT INTO developers_links (developer_id, link, link_type) VALUES ( :developer_id, :link, :link_type )", [
            'developer_id' => $db->lastInsertId(),
            'link' => $team['twitter'],
            'link_type' => 'twitter'
        ]);
        $db->query("INSERT INTO developers_links (developer_id, link, link_type) VALUES ( :developer_id, :link, :link_type )", [
            'developer_id' => $db->lastInsertId(),
            'link' => $team['github'],
            'link_type' => 'github'
        ]);
        $db->query("INSERT INTO developers_links (developer_id, link, link_type) VALUES ( :developer_id, :link, :link_type )", [
            'developer_id' => $db->lastInsertId(),
            'link' => $team['linkedin'],
            'link_type' => 'linkedin'
        ]);
        $db->query("INSERT INTO product_developers (product_id, developer_id) VALUES ( :product_id, :developer_id )", [
            'product_id' => $productId,
            'developer_id' => $developer_id
        ]);
    }
    foreach ($_FILES['gallery']['name'] as $key => $name) {
        if (saveUpload($_FILES['gallery']['tmp_name'][$key]['file'], $name['file'])) 
        {
            // Insert into product_photoes table
            $db->query("INSERT INTO products_photoes (product_id, photo, caption) VALUES ( :productId,  :name, :caption )", [
                'productId' => $productId, 'name' => $name['file'], 'caption' => $_POST['gallery'][$key]['caption']
            ]);
        }
    }

    // Insert technologies
    foreach ($_POST['technologies'] as $technology) {
        $db->query("INSERT INTO product_technologies (product_id, technology) VALUES ( :productId, :technology )", [
            'productId' => $productId, 
            'technology' => $technology
        ]);
    }

    // Insert timeline
    foreach ($_POST['timeline'] as $timeline) {
        $db->query("INSERT INTO product_timeline (product_id, title, date, description) VALUES ( :productId, :title , :date , :description )", [
            'productId' => $productId, 'title' => $timeline['title'], 'date' => $timeline['date'], 'description' => $timeline['description']
        ]);
    }
    $db->commit();
}catch(Exception $exception){
    $_SESSION['error'] = "error saving this project error message is: " . $exception->getMessage();
    echo $_SESSION['error'] . "<br>";
    $db->rollBack();
}

echo "Data successfully stored!". $productId;
