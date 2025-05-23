<?php
/*
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
                          <img src="/assets/uploads/<?= isset($v['main_image']) && $v['main_image'] ? $v['main_image'] : 'default-avatar.jpeg' ?>" alt="AI Chatting Desktop" class="project-image" onerror="this.src='/assets/images/default-avatar.jpeg'">
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
*/




use core\App;
use core\Database;

require base_path('vendor/autoload.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db = App::resolve(Database::class);
$results = [];

// استلام الفلاتر من المستخدم
$search    = $_GET['search'] ?? '';
$type      = $_GET['type'] ?? '';
$status    = $_GET['status'] ?? '';
$language  = $_GET['language'] ?? '';
$sort      = $_GET['sort'] ?? '';
$priceMin  = $_GET['price_min'] ?? '';
$priceMax  = $_GET['price_max'] ?? '';
$page = isset($_GET['page']) ? (int)($_GET['page']) :1;
$limit = 4;
$offset = ($page-1) * $limit;

$where = "1=1";
$params = [];

// بناء شروط الفلترة
if (!empty($search)) {
    $where .= " AND MATCH(p.product_name, p.short_description) AGAINST (:search IN NATURAL LANGUAGE MODE)";
    $params['search'] = $search;
}
if (!empty($type)) {
    $where .= " AND c.category_name = :type";
    $params['type'] = $type;
}
if (!empty($status)) {
    $where .= " AND p.status = :status";
    $params['status'] = $status;
}
if (!empty($language)) {
    $where .= " AND l.language_name = :language";
    $params['language'] = $language;
}
if (!empty($priceMin)) {
    $where .= " AND p.price >= :price_min";
    $params['price_min'] = $priceMin;
}
if (!empty($priceMax)) {
    $where .= " AND p.price <= :price_max";
    $params['price_max'] = $priceMax;
}

// تحديد ترتيب النتائج
$orderBy = "";
switch ($sort) {
    case 'price-asc':   $orderBy = "ORDER BY p.price ASC"; break;
    case 'price-desc':  $orderBy = "ORDER BY p.price DESC"; break;
    case 'popularity':  $orderBy = "ORDER BY number_rates DESC"; break;
    case 'newest':      $orderBy = "ORDER BY p.start_date DESC"; break;
    case 'rating':      $orderBy = "ORDER BY avg_rating DESC"; break;
}

// الاستعلام النهائي مع كل العلاقات
$results = $db->query("
    SELECT DISTINCT
        p.*,
        c.category_name,
        l.language_name,
        -- عدد التعليقات
        (SELECT COUNT(*) FROM comments co WHERE co.product_id = p.product_id) AS number_comments,
        -- عدد التقييمات
        (SELECT COUNT(*) FROM rates r WHERE r.product_id = p.product_id) AS number_rates,
        -- متوسط التقييم (اختياري)
        (SELECT AVG(r.rate) FROM rates r WHERE r.product_id = p.product_id) AS avg_rating
    FROM products p
    JOIN categorys c ON p.category_id = c.category_id
    LEFT JOIN product_languages pl ON p.product_id = pl.product_id
    LEFT JOIN languages l ON pl.language_id = l.language_id
    WHERE $where
    $orderBy LIMIT $limit OFFSET $offset
", $params)->get();

// طلب AJAX؟ اطبع النتائج فقط
if (isset($_GET['ajax']) && $_GET['ajax'] === '1') {
    foreach ($results as $v): ?>
        <div class="project-card" data-language="<?= htmlspecialchars($v['language_name'] ?? '') ?>" data-type="<?= htmlspecialchars($v['type'] ?? '') ?>">
            <img src="/assets/uploads/<?= isset($v['main_image']) && $v['main_image'] ? $v['main_image'] : 'default-avatar.jpeg' ?>" alt="AI Chatting Desktop" class="project-image" onerror="this.src='/assets/images/default-avatar.jpeg'">
            <div class="project-content">
                <div class="tags">
                    <span class="tag blue">Development</span>
                    <span class="tag red"><?= htmlspecialchars($v['category_name'] ?? 'Unknown') ?></span>
                    <span class="tag green">Project</span>
                </div>
                <h2 class="project-title"><?= htmlspecialchars($v['product_name'] ?? 'No Name') ?></h2>
                <p class="project-desc"><?= htmlspecialchars($v['short_description'] ?? '') ?></p>
                <div class="project-stats">
                    <span><ion-icon name="chatbubble-ellipses-outline"></ion-icon> <?= $v['number_comments'] ?? 0 ?> Comments</span>
                    <span><ion-icon name="star-outline"></ion-icon> <?= $v['number_rates'] ?? 0 ?> Rates</span>
                    <span><ion-icon name="star-half-outline"></ion-icon> <?= number_format($v['avg_rating'] ?? 0, 1) ?> / 5</span>
                    <span><ion-icon name="time-outline"></ion-icon> <?= $v['duration'] ?? '-' ?> Months</span>
                </div>
                <div class="project-footer">
                    <div class="investment-info">
                        <span class="investment-amount"><?= $v['price'] ?? '0.00' ?> $</span>
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
    <?php endforeach;
    exit;
}

$getAllTypeAndStatus =$db->query("SELECT * FROM products ");
$getAllLauange =$db->query("SELECT * FROM languages ");

// عرض الصفحة الكاملة (غير AJAX)
view("projects.view.php", ['results' => $results,
'getAllTypeAndStatus'=>$getAllTypeAndStatus,
'getAllLauange' =>$getAllLauange]);
