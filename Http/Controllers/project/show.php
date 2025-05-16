<?php

use core\App;
use core\Database;
require base_path('vendor/autoload.php');
$db = App::resolve(Database::class);

$page_name = 'project';
if(!isset($_GET['project_id'])){
    abort(404);
    exit;
}
$project=  $db->query(
    "Select 
        p.id,
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
        FROM projects P
        WHERE p.id = :project_id
    ",
[
    'project_id' => $_GET['project_id']
])->findOrFail();
$project['resources'] = $db->query("select pr.resource_name,pr.resource_url,pr.type from project_resources pr where pr.project_id = :project_id", ['project_id' => $project['id']])->get();
$project['faq'] = $db->query("select pf.question, pf.answer from project_faq pf where pf.project_id = :project_id", ['project_id' => $project['id']])->get();

$project['previews'] = $db->query("select 
        pre.reviewer_name,
        pre.reviewer_role,
        pre.rating,
        pre.review,
        pre.created_at from project_reviews pre where pre.project_id = :project_id", ['project_id' => $project['id']])->get();
$project['milestones'] = $db->query("select 
        pm.milestone,
        pm.badge_color from project_milestones pm where project_id = :project_id", ['project_id' => $project['id']])->get();
$project['related_projects'] = $db->query("select 
        pp.id,
        pp.title,
        pp.main_image
        FROM related_projects re
        LEFT JOIN projects pp ON (re.related_project_id = pp.id)
        WHERE re.project_id = :project_id", ['project_id' => $project['id']])->get();

foreach ($project['related_projects'] as $key => $item) {
    $project['related_projects'][$key]['technologies'] = $db->query("SELECT technology FROM project_technologies WHERE project_id = :project_id", ['project_id' => $item['id']])->get();
}

$project['overviews'] = $db->query("select overview from project_overviews where project_id = :project_id", ['project_id' => $project['id']])->get();

$gttt = [
    'gallery' => $db->query("SELECT image_url as url, caption FROM project_gallery WHERE project_id = :project_id", ['project_id' => $project['id']])->get(),
    'timeline' => $db->query("SELECT title, description, date FROM project_timeline WHERE project_id = :project_id", ['project_id' => $project['id']])->get(),
    'team' => $db->query("SELECT name, role, avatar, linkedin FROM project_team WHERE project_id = :project_id", ['project_id' => $project['id']])->get(),
    'technologies' => $db->query("SELECT technology FROM project_technologies WHERE project_id = :project_id", ['project_id' => $project['id']])->get()
];


// echo "<pre> <br><br><br><br><br><br><br><br>";
// print_r($project);
// echo "</pre>";
// echo "<pre> <br><br><br><br><br><br><br><br>";
// print_r($gttt);
// echo "<br><br><br>$projectData<br><br></pre>";





view('project/show.view.php', [
    'project' => $project,
    'gttt' => $gttt
]);