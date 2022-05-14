<?php
session_start();
include('connect.php');
date_default_timezone_set("Asia/Colombo");

$date=date('Y-m-d');
$user_id=$_GET['id'];

$result = $db->prepare("SELECT * FROM customer WHERE  customer_id='$user_id'  ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
		    $user_name=$row['customer_name'];
		}

$sql = "INSERT INTO finger (user_id,user_name,device_id,date,type,action) VALUES (?,?,?,?,?,?)";
$q = $db->prepare($sql);
$q->execute(array($user_id,$user_name,"2",$date,"0","25"));



?>