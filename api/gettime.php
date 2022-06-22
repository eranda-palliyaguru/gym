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
$data[]=$_GET['data'];
$memory=$_GET['memory'];
$version=$_GET['version'];
$mode=$_GET['mode'];
$d_finger=$_GET['d_finger'];

if($mode=="finger_delete"){
	$sql = "UPDATE finger SET action=? WHERE id=?";
	$q = $db->prepare($sql);
	$q->execute(array("0",$d_finger));
}

if($version=="1.1.0"){
	$update="no";
}

if($data == "COMPLETED"){   
    $sql = "UPDATE finger 
        SET action=?
		WHERE action=?";
$q = $db->prepare($sql);
$q->execute(array("1","25"));
}


$y=date("y");
$m=date("m");
$d=date("d");
$h=date("H");
$i=date("i");
$s=date("s");

$action="";
$finger_id=0;
$device_s_id =0;
$time=date("ymdHis");
$result = $db->prepare("SELECT id,comment,lock_action, restart FROM device WHERE device_id='$did' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
		    $device_s_id=$row['id'];
			$comment=$row['comment'];
			$lock_action=$row['lock_action'];
			$restart=$row['restart'];
		}
		if($lock_action=="2"){	$action="unlock";}
		if($restart=="2"){	$action="restart";}
		if($comment == "TIMEOUT"){   
			$sql = "UPDATE finger 
				SET action=?
				WHERE action=?";
		$q = $db->prepare($sql);
		$q->execute(array("0","25"));
		}

		if($device_s_id > 0){
		$sql = "UPDATE device SET time=? , memory=? , comment=? , version=? , lock_action=? , restart=? WHERE id=?";
        $q = $db->prepare($sql);
        $q->execute(array($time,$memory,$data,$version,"1","1",$device_s_id));
		}else{ 
		$sql = "INSERT INTO device (device_id,time) VALUES (?,?)";
		$q = $db->prepare($sql);
		$q->execute(array($did,$time));
		}

		$result = $db->prepare("SELECT id,user_id,user_name,action FROM finger WHERE action > '5' and device_id='$did' LIMIT 1 ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
		    $finger_id=$row['id'];
		    $user_id=$row['user_id'];
		    $user_name=$row['user_name'];
			$f_action=$row['action'];
		}


		


if($finger_id > 0){

	if($f_action == "55"){
		$response = array("y"=>$y, "M"=>$m, "d"=>$d, "h"=>$h, "m"=>$i, "s"=>$s,"action"=>"finger_delete","finger_id"=>$finger_id);
	}
	if($f_action == "25"){
$response = array("y"=>$y, "M"=>$m, "d"=>$d, "h"=>$h, "m"=>$i, "s"=>$s,"action"=>"register","user_id"=>$user_id,"user_name"=>$user_name,"finger_id"=>$finger_id);
	}	
$json_response = json_encode($response);
	echo $json_response;
}else{
$y=date("y");
$m=date("m");
$d=date("d");
$h=date("H");
$i=date("i");
$s=date("s");
if($memory > 0){$action="read";}
$response = array("y"=>$y, "M"=>$m, "d"=>$d, "h"=>$h, "m"=>$i, "s"=>$s, "update"=>$update,"action"=>"$action");
	$json_response = json_encode($response);
	echo $json_response;
}
?>