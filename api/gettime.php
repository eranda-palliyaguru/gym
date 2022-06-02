<?php
include("../connect.php");
$no=1;
$update="now";

$u_id=0;

 date_default_timezone_set("Asia/Colombo");
header("Content-Type:application/json");
$key = $_GET['key'];
$did = $_GET['did'];
$con = $_GET['con'];
$data=$_GET['data'];
$version=$_GET['version'];

if($version=="1.0.4"){
	$update="no";
}

if($data == "COMPLETED"){
    
    $sql = "UPDATE finger 
        SET action=?";
$q = $db->prepare($sql);
$q->execute(array("1"));
}

$y=date("y");
$m=date("m");
$d=date("d");
$h=date("H");
$i=date("i");
$s=date("s");


$finger_id=0;
$time=date("His");
$result = $db->prepare("SELECT * FROM device WHERE device_id='$did' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
		    $device_s_id=$row['id'];
		}

		if($device_s_id > 0){
		$sql = "UPDATE device 
        SET time=?
		WHERE id=?";
        $q = $db->prepare($sql);
        $q->execute(array($time,$device_s_id));
		}else{ 
		$sql = "INSERT INTO device (device_id,time) VALUES (?,?)";
		$q = $db->prepare($sql);
		$q->execute(array($did,$time));
		}

		$result = $db->prepare("SELECT * FROM finger WHERE action='25' and device_id='$did' LIMIT 1 ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
		    $finger_id=$row['id'];
		    $user_id=$row['user_id'];
		    $user_name=$row['user_name'];
		}

if($finger_id > 0){
$response = array("y"=>$y, "M"=>$m, "d"=>$d, "h"=>$h, "m"=>$i, "s"=>$s,"action"=>"register","user_id"=>$user_id,"user_name"=>$user_name,"finger_id"=>$finger_id,);
	$json_response = json_encode($response);
	echo $json_response;
}else{
$y=date("y");
$m=date("m");
$d=date("d");
$h=date("H");
$i=date("i");
$s=date("s");
$response = array("y"=>$y, "M"=>$m, "d"=>$d, "h"=>$h, "m"=>$i, "s"=>$s, "update"=>$update);
	$json_response = json_encode($response);
	echo $json_response;
}
?>