<?php
use core\App;
use core\Authenticator;
use core\Database;
$db = App::resolve(Database::class);
$auth = new Authenticator(); 
$errors = [];

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


$activeInvestments = $db->query('SELECT SUM(amount) as sum_mount FROM investments where status =:status',  [
    ':status'=>'compeleted'
])->find();

$getRol =$db->query('
        SELECT AVG(roi) as avg_roi 
        FROM (
            SELECT (p.budget * 0.15) as roi 
            FROM products p
            WHERE p.status = :status
        ) as roi_calc
',[
    ':status'=>'pending'
])->find();



$productAndInvstment = $db->query(' SELECT 
    p.product_name AS name,
    p.start_date AS start_date,
    p.status AS status,
    inv.amount AS amount,  ROUND((inv.amount / p.budget) * 100 ,2)avg_roi
FROM products p
JOIN investments inv ON inv.product_id = p.product_id')->get();

$active_investors  = $db->query(' SELECT COUNT(DISTINCT user_id) as active_investors 
        FROM investments 
        WHERE status =:status',[
    ':status'=>'complete'
])->find();



$sql = $db->query("SELECT MONTH(created_at) as month,SUM(amount) as totalPrice FROM investments GROUP BY MONTH(created_at)
ORDER BY month")->get();
$investmentData = array_fill(1,12,0);
foreach($sql as $row)
{
    $investmentData[(int)$row['month']] = (float)$row['totalPrice'];
}



view('manage/dashboard.view.php',['totalProduct'=> $totalProduct,
                                   'activeInvestments'=>$activeInvestments,
                                  'getRol'=>$getRol,
                                  'active_investors'=>$active_investors,
                                  'totalProductActive'=>$totalProductActive,
                                  'totalProductCompleted ',$totalProductCompleted ,
                                  'totalProductBeta'=>$totalProductBeta,
                                  'productAndInvstment'=>$productAndInvstment,
                                  'investmentData'=>$investmentData]
                                );