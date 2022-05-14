<?php
session_start();
include('connect.php');
date_default_timezone_set("Asia/Colombo");

$vehicle = $_POST['vehicle_no'];
$vehicle2 = $_POST['vehicle_no2'];

if($vehicle==""){ $vehicle=$vehicle2; }
$nic = $_POST['nic'];
$km = 0;
$note1 = $_POST['note'];
$product1 = "";
$type="active";
$time= date("H.i");
$date= date("Y-m-d");

$note= str_replace(".","<br>",$note1); 
$product= str_replace(".","<br>",$product1);
$category="Accident";
//$note = (float) strtr($note1, ['.' => '<br>',]);

$sql = "INSERT INTO job (vehicle_no,km,note,type,date,time,product_note,nic_no,category) VALUES (:ve,:km,:note,:type,:date,:time,:pro,:nic,:category)";
$q = $db->prepare($sql);
$q->execute(array(':ve'=>$vehicle,':km'=>$km,':note'=>$note,':type'=>$type,':date'=>$date,':time'=>$time,':pro'=>$product,':nic'=>$nic,':category'=>$category));

$iii="acc".date("Ymdhis");
	$result = $db->prepare("SELECT * FROM customer WHERE vehicle_no = '$vehicle' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
            $customer_id = $row['customer_id'];
		}

$result = $db->prepare("SELECT * FROM job WHERE vehicle_no = '$vehicle' and type='active' ORDER by id DESC LIMIT    0, 1 ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
            $id = $row['id'];
		}

	if(!$customer_id){ header("location: job_cus.php?id=$vehicle"); 
			   
			   }else{ header("location: job_accident.php?id=$id"); }

?>