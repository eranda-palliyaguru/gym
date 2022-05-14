<?php
session_start();
include('connect.php');
date_default_timezone_set("Asia/Colombo");




$vehicle = $_POST['vehicle_no'];
$vehicle2 = $_POST['vehicle_no2'];

if($vehicle==""){ $vehicle=$vehicle2; }

$name = $_POST['name'];

$com="wash";



$time=date("H:i");

  $result = $db->prepare("SELECT * FROM job WHERE vehicle_no = '$vehicle' and type='active' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
			$id = $row['id'];
           
		}

$sql = "UPDATE job 
        SET washer_id=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($name,$id));

$sql = "UPDATE job 
        SET wash_time=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($time,$id));

$sql = "UPDATE job 
        SET ramp=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($com,$id));


header("location: job_wosh.php"); 

?>