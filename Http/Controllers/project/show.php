<?php

use core\App;
use core\Database;
require base_path('vendor/autoload.php');
$db = App::resolve(Database::class);

$page_name = 'product';

if(!isset($_GET['product_id'])){
    abort(404);
    exit;
}
$project=  $db->query(
    "Select 
        p.product_id,
        p.title,
        p.description,
        p.status,
        p.client_name,
        p.start_date,
        p.main_image,
        p.progress,
        p.budget,
        p.duration,
        p.vidio,
        p.overview,
        p.users_impacted,
        p.lines_of_code,
        p.countries_deployed
        FROM products P
        WHERE p.product_id = :product_id
    ",
[
    'product_id' => $_GET['product_id']
])->find();
$project['resources'] = $db->query("select pr.resource_name,pr.resource_url,pr.type from product_resources pr where pr.product_id = :product_id", ['product_id' => $product['id']])->get();
$project['faq'] = $db->query("select pf.question, pf.answer from product_faq pf where pf.product_id = :product_id", ['product_id' => $product['id']])->get();

$project['previews'] = $db->query("select 
        pre.reviewer_name,
        pre.reviewer_role,
        pre.rating,
        pre.review,
        pre.created_at from product_reviews pre where pre.product_id = :product_id", ['product_id' => $product['id']])->get();
$project['milestones'] = $db->query("select 
        pm.milestone,
        pm.badge_color from product_milestones pm where product_id = :product_id", ['product_id' => $product['id']])->get();
$product['related_products'] = $db->query("select 
        pp.id,
        pp.title,
        pp.main_image
        FROM related_products re
        LEFT JOIN products pp ON (re.related_product_id = pp.id)
        WHERE re.product_id = :product_id", ['product_id' => $project['id']])->get();

foreach ($project['related_products'] as $key => $item) {
    $project['related_products'][$key]['technologies'] = $db->query("SELECT technology FROM product_technologies WHERE product_id = :product_id", ['product_id' => $item['id']])->get();
}

$project['overviews'] = $db->query("select overview from product_overviews where product_id = :product_id", ['product_id' => $project['id']])->get();

$gttt = [
    'gallery' => $db->query("SELECT image_url as url, caption FROM product_gallery WHERE product_id = :product_id", ['product_id' => $project['id']])->get(),
    'timeline' => $db->query("SELECT title, description, date FROM product_timeline WHERE product_id = :product_id", ['product_id' => $project['id']])->get(),
    'team' => $db->query("SELECT name, role, avatar, linkedin FROM product_team WHERE product_id = :product_id", ['product_id' => $project['id']])->get(),
    'technologies' => $db->query("SELECT technology FROM product_technologies WHERE product_id = :product_id", ['product_id' => $project['id']])->get()
];


// echo "<pre> <br><br><br><br><br><br><br><br>";
// print_r($product);
// echo "</pre>";
// echo "<pre> <br><br><br><br><br><br><br><br>";
// print_r($gttt);
// echo "<br><br><br>$productData<br><br></pre>";





view('product/show.view.php', [
    'product' => $project,
    'gttt' => $gttt
]);