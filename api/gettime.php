<?php
include("../connect.php");
$no=1;

$u_id=0;

 date_default_timezone_set("Asia/Colombo");
header("Content-Type:application/json");
$key = $_GET['key'];
$did = $_GET['did'];
$con = $_GET['con'];
$data=$_GET['data'];

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
$response = array("y"=>$y, "M"=>$m, "d"=>$d, "h"=>$h, "m"=>$i, "s"=>$s);
	$json_response = json_encode($response);
	echo $json_response;
}
?>