<?php
use core\App;
use core\Authenticator;
use core\Database;
require base_path('vendor/autoload.php');
//session_start();
$db = App::resolve(Database::class);
$errors = [];

$result ;
$results []='';

$type = isset($_GET['type'])?$_GET['type']:'all';


$searchget = $_GET['search']??'';

if (! empty($searchget)){

  //$re = $db->selectData("products","*","match(product_name , short_description ) against (' ".$searchget."' in natural language mode)");
$result = $db->query('

  SELECT p.main_image,
  c.category_name,
  p.product_name,
  p.short_description,
  p.price,
  p.duration,
      (SELECT COUNT(*) FROM comments co WHERE co.product_id = p.product_id) AS number_comments,
    (SELECT COUNT(*) FROM rates rat WHERE rat.product_id = p.product_id) AS number_rates
   FROM products p join categorys c on(p.category_id = c.category_id)
  join comments co on(p.product_id = co.product_id)
  join rates rat on(p.product_id=rat.product_id) where
  match(p.product_name , p.short_description ) against (:searchget in natural language mode)',[
    'searchget' => $searchget
  ])->get();
  
}else
{
    $result = $db->query('

    SELECT p.main_image,
    c.category_name,
    p.product_name,
    p.short_description,
    p.price,
    p.duration,
        (SELECT COUNT(*) FROM comments co WHERE co.product_id = p.product_id) AS number_comments,
      (SELECT COUNT(*) FROM rates rat WHERE rat.product_id = p.product_id) AS number_rates
     FROM products p join categorys c on(p.category_id = c.category_id)
    join comments co on(p.product_id = co.product_id)
    join rates rat on(p.product_id=rat.product_id) ')->get();
}

if (! empty($result)){
    $results  = $result;
}



              if(isset($_GET['ajax']) && $_GET['ajax']=='1'){
                foreach($results as $v):?>
                

                         
                        <div class="project-card" data-language="JavaScript" data-type="Desktop">
                          <img src="<?= isset($v['main_image'])?$v['main_image']:''?>" alt="AI Chatting Desktop" class="project-image">
                          <div class="project-content">
                        
                            <div class="tags">
                              <span class="tag blue">Development</span>
                              <span class="tag red"><?= isset($v['caregory_name'])?$v['category_name']:'oooo'?></span>
                              <span class="tag green">Project</span>
                            </div>
                            <h2 class="project-title"><?= isset($v['product_name'])?$v['product_name']:'oooooo'?></h2>
                            <p class="project-desc"><?= isset($v['short_description'])?$v['short_description']:'pppp'?></p>
                            <div class="project-stats">
                              <span><ion-icon name="chatbubble-ellipses-outline"></ion-icon>  <?= isset($v['number_comments'])?$v['number_comments']:'1'?><span>Comments</span></span>
                              <span><ion-icon name="star-outline"></ion-icon> <?= isset($v['number_rates'])?$v['number_rates']:'2'?><span>Rate</span></span>
                              <span><ion-icon name="trending-up-outline"></ion-icon> 345 <span>ROI</span></span>
                              <span><ion-icon name="time-outline"></ion-icon> <?= isset($v['duration'])?$v['duration']:'99'?><span>Months</span></span>
                            </div>
                            <div class="project-footer">
                              <div class="investment-info">
                                <span class="investment-amount"><?= isset($v['price'])?$v['price']:'888'?></span>
                                <span class="investment-label">Minimum Investment</span>
                              </div>
                              <div class="footer-divider"></div>
                              <div class="button-group">
                                <button class="btn-quick-view"><ion-icon name="eye-outline"></ion-icon> Quick View</button>
                                <button onclick="window.location.href='/project'">View Investment</button>
                              </div>
                            </div>
                          </div>
                        </div>
                
                        <?php   endforeach;
                        exit;
                     
                
                }
          
    

view("projects.view.php",['results'=> $results]);