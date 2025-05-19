<?php
use core\App;
use core\Database;

$project_id = $_GET['project_id'] ?? null;
$db = App::resolve(Database::class);

if(!$project_id){
    abort(404);
}

$project = $db->query('SELECT product_name FROM products WHERE product_id = :id', [
    'id' => $project_id
])->get();

view('Invest/invest.view.php', [
    'project' => $project
]);