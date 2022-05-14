<?php
session_start();
date_default_timezone_set("Asia/Colombo");
include('connect.php');

$f=0;
$g="non";
$cus=3;
$v1="";
$man = $_POST['man'];
$a1 = $_POST['id'];
//$ar = $_POST['amount'];
$type = $_POST['p_type'];
//$c = $_POST['cus_name'];
$now=date("Y-m-d");
if($type=="chq"){
	$amount_pay=0;
	$f = $_POST['chq_no'];
	$g = $_POST['bank'];
	$amount=$_POST['chq_amount'];
	$date= $_POST['chq_date'];
} 
if($type=="cash"){
	$amount_pay=$_POST['cash_amount'];
    $amount=$_POST['cash_amount'];
	$date = date("Y-m-d");
}
if($type=="credit"){
    $amount=0;
	$amount_pay=0;
	$date = $_POST['credit_date'];
	$cus = $_POST['cus'];
	$v1 = $_POST['v1'];
	$v2 = $_POST['v2'];

if($v1==""){$v1=$v2;}
}




$result = $db->prepare("SELECT * FROM customer WHERE customer_id = '$cus' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
            $c_name = $row['customer_name'];
			$datab = $row['datab'];
		}
if($datab==""){$job_id="";}else{
include($datab);
$result = $db->prepare("SELECT * FROM job WHERE vehicle_no = '$v1'  and type='active' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
            $job_id = $row['id'];
		}
if(!$job_id){header("location: sales.php?id=$a1");}
}


include('connect.php');
$sql = "INSERT INTO payment (invoice_no,pay_amount,amount,type,date,chq_no,bank,date_now) VALUES (:a,:b,:c,:d,:e,:f,:g,:h)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a1,':b'=>$amount_pay,':c'=>$amount,':d'=>$type,':e'=>$date,':h'=>$now,':f'=>$f,':g'=>$g));


$a=0;
$result = $db->prepare("SELECT sum(amount) FROM sales_list WHERE invoice_no = '$a1' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
            $a = $row['sum(amount)'];	
		}

$pay_total=0;
$result = $db->prepare("SELECT sum(amount) FROM payment WHERE invoice_no = '$a1' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
            $pay_total = $row['sum(amount)'];	
		}

$profit=0;
$result = $db->prepare("SELECT sum(profit) FROM sales_list WHERE invoice_no = '$a1' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
        $profit = $row['sum(profit)'];	
		}

 $labor_cost=0;
$result = $db->prepare("SELECT sum(amount) FROM sales_list WHERE invoice_no = '$a1' and type='Service'");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
        $labor_cost = $row['sum(amount)'];	
		}


$result = $db->prepare("SELECT * FROM sales_list WHERE invoice_no = '$a1' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
        $id = $row['product_id'];
		$qty = $row['qty'];
			
$sql = "UPDATE products 
        SET qty=qty-?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($qty,$id));
		}






$ar=$pay_total;
$bill_date_up = date("Y-m-d");
$b = $ar-$a;

echo $labor_cost;

$labor_cost=0;
//$bill_date_up=0;

// query
$sql = "INSERT INTO sales (invoice_number,amount,balance,profit,pay_type,pay_amount,labor_cost,date,customer_id,customer_name,sales_man,vehicle_no,job_no) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:cu,:cun,:man,:v1,:job)";
$ql = $db->prepare($sql);
$ql->execute(array(':a'=>$a1,':b'=>$a,':c'=>$b,':d'=>$profit,':e'=>$type,':f'=>$pay_total,':g'=>$labor_cost,':h'=>$bill_date_up,':cu'=>$cus,':cun'=>$c_name,':man'=>$man,':v1'=>$v1,':job'=>$job_id));
      
header("location: bill.php?id=$a1");

?>