<?php 
session_start();
include('connect.php');
date_default_timezone_set("Asia/Colombo");
	
$vehicle1 = $_POST['id1'];
$vehicle2 = $_POST['id2'];


if($vehicle1==""){
$vehicle = $_POST['id2'];	
}else{
$vehicle = $_POST['id1'];	
}

$mac_id =$_POST['mac_id'];

$type = $_POST['type'];	

  $result = $db->prepare("SELECT * FROM job WHERE vehicle_no = '$vehicle' and type='active' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
			$id1 = $row['id'];
		}
	
	
	
if($type=="1"){
$sql = "UPDATE job 
        SET mechanic_id=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($mac_id,$id1));
	
}
	
	
if($type=="2"){
$sql = "UPDATE job 
        SET mechanic_id_rep=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($mac_id,$id1));
	
}

header("location: job_m.php?id=$id1");
?>

