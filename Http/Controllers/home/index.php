<?php
use core\App;
use core\Authenticator;
use core\Database;
$db = App::resolve(Database::class);
$auth = new Authenticator(); 
$errors = [];

$totlie = $db->query("SELECT COUNT(*) as count FROM products ")->find();
$randomOffSet = rand(0,$totlie['count']-3);
try {

    $sql = "
    SELECT product_id, product_name, main_image, short_description, status
    FROM products
    LIMIT 3 OFFSET $randomOffSet
";
$resualt = $db->query($sql)->get();
 } catch (\Exception $e) {
   dd( "$randomOffSet". $e->getMessage());
 }

view("index.view.php",["resualt"=>$resualt]);