<?php
session_start();
date_default_timezone_set("Asia/Colombo");
include('connect.php');
$id=$_GET['id'];

        $result = $db->prepare("SELECT * FROM customer WHERE customer_id='$id'");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
		$name=$row['customer_name'];
		$type_id=$row['membership'];
		$v_date=$row['v_date'];
		}
		
		$result = $db->prepare("SELECT * FROM cat WHERE id='$type_id'");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
		    $type=$row['name'];
		    $amount=$row['amount'];
		}

if($v_date==""){ $v_date=date('Y-m-d');}

$data = explode('-', $v_date);

$y=$data[0];
$m=$data[1]+1;
$d=$data[2];

if($d > 28){$m=$m+1; $d="01";}

if($m > 12){ $y=$y+1; $m="01"; }
$pay_month=$y."-".$m."-".$d;

$date=date('Y-m-d');

$sql = "INSERT INTO payment (cus_id,cus_name,amount,type,type_id,date,pay_month) VALUES (?,?,?,?,?,?,?)";
$q = $db->prepare($sql);
$q->execute(array($id,$name,$amount,$type,$type_id,$date,$pay_month));


$sql = "UPDATE  customer 
        SET v_date=? 
        WHERE customer_id=?";
$ql = $db->prepare($sql);
$ql->execute(array($pay_month,$id));

$result = $db->prepare("SELECT * FROM payment WHERE cus_id='$id' ORDER BY transaction_id DESC LIMIT 1");
$result->bindParam(':userid', $res);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
	$invo=$row['transaction_id'];
}

header("location: bill.php?id=$invo");	

?>