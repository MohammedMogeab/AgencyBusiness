<?php

use core\App;
use core\Database;
require base_path('vendor/autoload.php');
$db = App::resolve(Database::class);

$page_name = 'product';

if(!isset($_GET['project_id'])){
    abort(404);
    exit;
}
$project=  $db->query(
    "SELECT 
        product_id AS id,
        product_name AS title,
        large_description AS description,
        status,
        client_name,
        start_date,
        main_image,
        progress,
        budget,
        duration,
        vidio,
        overview,
        users_imapacted AS users_impacted,
        lines_of_code,
        countries_deployed
        FROM products
        WHERE product_id = :product_id
    ",
[
    'product_id' => $_GET['project_id']
])->findOrFail();


$project['resources'] = $db->query("SELECT pr.resource_name,pr.resource_url,pr.type FROM product_resources pr WHERE pr.product_id = :product_id", ['product_id' => $project['id']])->get();
$project['faq'] = $db->query("SELECT pf.question, pf.answer FROM product_faq pf WHERE pf.product_id = :product_id", ['product_id' => $project['id']])->get();

$project['previews'] = $db->query("SELECT
        u.user_name AS reviewer_name,
        u.role AS reviewer_role,
        r.rate AS rating,
        c.content AS review,
        c.dates AS created_at
        FROM comments c
        LEFT JOIN users u on(c.user_id = u.user_id)
        LEFT JOIN rates r on(c.user_id = r.user_id and r.product_id = :product_id)
         WHERE c.product_id = :product_id", ['product_id' => $project['id']]
)->get();

$project['milestones'] = $db->query("SELECT 
        pm.milestone,
        pm.badge_color FROM product_milestones pm WHERE product_id = :product_id", ['product_id' => $project['id']])->get();

$project['related_products'] = $db->query("SELECT 
        pp.product_id as id,
        pp.product_name as title,
        pp.main_image
        FROM related_products re
        LEFT JOIN products pp ON (re.related_product_id = pp.product_id)
        WHERE re.product_id = :product_id", ['product_id' => $project['id']])->get();

foreach ($project['related_products'] as $key => $item) {
    $project['related_products'][$key]['technologies'] = $db->query("SELECT technology FROM product_technologies WHERE product_id = :product_id", ['product_id' => $item['id']])->get();
}

$project['overviews'] = $db->query("SELECT feature as overview FROM product_featuers WHERE product_id = :product_id", ['product_id' => $project['id']])->get();


$gttt = [
    'gallery' => $db->query("SELECT photo AS url, caption FROM products_photoes WHERE product_id = :product_id", ['product_id' => $project['id']])->get(),
    'timeline' => $db->query("SELECT title, description, date FROM product_timeline WHERE product_id = :product_id", ['product_id' => $project['id']])->get(),
    'team' => $team = $db->query("SELECT u.name AS name, u.role as role, u.avatar AS avatar, dl.link AS linkedin FROM product_developers pd LEFT JOIN developers u on(pd.developer_id = u.id) LEFT JOIN developers_links dl on(pd.developer_id = dl.developer_id and dl.link_type = 'linkedin') WHERE product_id = :product_id ", ['product_id' => $project['id']])->get(),
    'technologies' => $db->query("SELECT technology FROM product_technologies WHERE product_id = :product_id", ['product_id' => $project['id']])->get()
];

// echo "<pre> <br><br><br><br><br><br><br><br>";
// print_r($project);
// echo "</pre>";
// echo "<pre> <br><br><br><br><br><br><br><br>";
// print_r($gttt);
// echo "<br><br><br>$productData<br><br></pre>";





view('project/show.view.php', [
    'project' => $project,
    'gttt' => $gttt
]);

//intelliPHP