<?php
use core\App;
use core\Authenticator;
use core\Database;
$db = App::resolve(Database::class);
$auth = new Authenticator(); 
$errors = [];
$where = "1=1";
$param = [];

$search = isset($_GET["search"]) ? $_GET["search"] :"";
// if(!empty($search)) {
//     $where .= " AND MATCH(p.product_name, p.short_description) AGAINST (:search IN NATURAL LANGUAGE MODE)";
//     $param["search"] = $search;
// }

if(!empty($search)) {
    $where .= " AND (LOWER(p.product_name) LIKE :search)";
    $param["search"] ="%".strtolower($search)."%";
}

$totalProduct = $db->query("SELECT count(*) as totalPro FROM products")->find();

$totalProductActive = $db->query('SELECT COUNT( status) as pro_active FROM products WHERE status= :status',[
    ':status'=>'Active'
])->find();

$totalProductCompleted = $db->query('SELECT COUNT(status) as pro_completed FROM products WHERE status= :status',[
    ':status'=>'completed'
])->find();

$totalProductBeta = $db->query('SELECT COUNT(status) as pro_Beta FROM products WHERE status= :status',[
    ':status'=>'Beta'
])->find();


$activeInvestments = $db->query('SELECT SUM(amount) as sum_mount FROM  investments where status =:status',  [
    ':status'=>'completed'
])->find();

$getRol =$db->query('SELECT 
  ROUND(((SUM(p.price) - SUM(i.amount)) / SUM(i.amount)) * 100, 2) AS total_roi_percentage
FROM investments i
JOIN products p ON i.product_id = p.product_id
WHERE i.status =:status'

,[
    ':status'=>'completed'
])->find();



$productAndInvstment = $db->query("SELECT 
    p.product_name AS name,
    p.start_date AS start_date,
    p.status AS status,
    inv.amount AS amount,  ROUND((inv.amount / p.budget) * 100 ,2)avg_roi
FROM products p
JOIN investments inv ON inv.product_id = p.product_id where $where",$param)->get();

$active_investors  = $db->query(' SELECT COUNT(DISTINCT user_id) as active_investors 
        FROM investments 
        WHERE status =:status',[
    ':status'=>'completed'
])->find();



$sql = $db->query("SELECT MONTH(created_at) as month,SUM(amount) as totalPrice FROM investments GROUP BY MONTH(created_at)
ORDER BY month")->get();
$investmentData = array_fill(1,12,0);
foreach($sql as $row)
{
    $investmentData[(int)$row['month']] = (float)$row['totalPrice'];
}


if(isset($_GET['ajax'])&&$_GET['ajax']==1)
{
    foreach($productAndInvstment as $row): ?>
        <tr>
            <td>
                <div style="font-weight: 600;"><?= $row['name'] ?? '' ?></div>
                <div style="color: #64748b; font-size: 0.75rem;"><?= $row['start_date'] ?? '' ?></div>
            </td>
            <td><span class="status-badge active"><?= $row['status'] ?? '' ?></span></td>
            <td>$<?= $row['amount'] ?? 0?></td>
            <td><?= $row['avg_roi'] ?? 0 ?>%</td>    
            <td>
                <button class="action-btn edit">Edit</button>
                <button class="action-btn delete">Delete</button>
            </td>
        </tr>
        <?php endforeach;
        exit;
    }


    // إعداد السنة والشهر الحالي والماضي
$currentMonth = date('m');
$currentYear = date('Y');
$lastMonth = date('m', strtotime('first day of last month'));
$lastYear = date('Y', strtotime('first day of last month'));

//  Total Projects: النسبة المئوية للتغير
$currentProjects = $db->query("SELECT COUNT(*) AS c FROM products WHERE MONTH(start_date) = $currentMonth AND YEAR(start_date) = $currentYear")->find()['c'];
$lastProjects = $db->query("SELECT COUNT(*) AS c FROM products WHERE MONTH(start_date) = $lastMonth AND YEAR(start_date) = $lastYear")->find()['c'];
$projectChange = ($lastProjects > 0) ? round((($currentProjects - $lastProjects) / $lastProjects) * 100, 2) : 0;

//  Active Investments: النسبة المئوية للتغير
$currentInvest = $db->query("SELECT SUM(amount) AS s FROM investments WHERE status = 'completed' AND MONTH(created_at) = $currentMonth AND YEAR(created_at) = $currentYear")->find()['s'];
$lastInvest = $db->query("SELECT SUM(amount) AS s FROM investments WHERE status = 'completed' AND MONTH(created_at) = $lastMonth AND YEAR(created_at) = $lastYear")->find()['s'];
$investmentChange = ($lastInvest > 0) ? round((($currentInvest - $lastInvest) / $lastInvest) * 100, 2) : 0;

//  ROI: النسبة المئوية للتغير
$currentROI = $db->query("SELECT ROUND(((SUM(p.price) - SUM(i.amount)) / SUM(i.amount)) * 100, 2) AS r FROM investments i JOIN products p ON i.product_id = p.product_id WHERE i.status = 'completed' AND MONTH(i.created_at) = $currentMonth AND YEAR(i.created_at) = $currentYear")->find()['r'];
$lastROI = $db->query("SELECT ROUND(((SUM(p.price) - SUM(i.amount)) / SUM(i.amount)) * 100, 2) AS r FROM investments i JOIN products p ON i.product_id = p.product_id WHERE i.status = 'completed' AND MONTH(i.created_at) = $lastMonth AND YEAR(i.created_at) = $lastYear")->find()['r'];
$roiChange = ($lastROI != 0) ? round((($currentROI - $lastROI) / abs($lastROI)) * 100, 2) : 0;

//  Active Investors: النسبة المئوية للتغير
$currentInvestors = $db->query("SELECT COUNT(DISTINCT user_id) AS c FROM investments WHERE status = 'completed' AND MONTH(created_at) = $currentMonth AND YEAR(created_at) = $currentYear")->find()['c'];
$lastInvestors = $db->query("SELECT COUNT(DISTINCT user_id) AS c FROM investments WHERE status = 'completed' AND MONTH(created_at) = $lastMonth AND YEAR(created_at) = $lastYear")->find()['c'];
$investorChange = ($lastInvestors > 0) ? round((($currentInvestors - $lastInvestors) / $lastInvestors) * 100, 2) : 0;




view('manage/dashboard.view.php',['totalProduct'=> $totalProduct,
                                   'activeInvestments'=>$activeInvestments,
                                  'getRol'=>$getRol,
                                  'active_investors'=>$active_investors,
                                  'totalProductActive'=>$totalProductActive,
                                  'totalProductCompleted ',$totalProductCompleted ,
                                  'totalProductBeta'=>$totalProductBeta,
                                  'productAndInvstment'=>$productAndInvstment,
                                 'investmentData'=>$investmentData,
                                  'projectChange' => $projectChange,
                                  'investmentChange' => $investmentChange,
                                  'roiChange' => $roiChange,
                                  'investorChange' => $investorChange]
                                );