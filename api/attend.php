<?php 
include '../connect.php';





date_default_timezone_set("Asia/Colombo");
$key = $_GET['key'];
$fingerid = $_GET['fingerid'];




$action="Welcome";


$time=date('H:i');
$date=date('Y-m-d');
$d_time=date('H:i',$_GET['time']);
$d_date=date('Y-m-d',$_GET['time']);

$sql = "UPDATE finger 
        SET action=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array("1",$fingerid));

$result = $db->prepare("SELECT * FROM finger WHERE  id='$fingerid' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
		    $finger_id=$row['id'];
		    $u_id=$row['user_id'];
		    $u_name=$row['user_name'];
		}


$result = $db->prepare("SELECT * FROM customer WHERE  customer_id='$u_id' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
		    $membership=$row['membership'];
		    $vdate=$row['v_date'];
		}
$date=date('Y-m-d');
$FS=new DateTime($date);
$send= new DateTime($vdate);
$diff = $FS->diff ($send);
$df = $diff->format('%r%a');

if($df < 0){ $action="REJECTED"; }


$sql = "INSERT INTO attends (fingerid,d_time,time,date,user_id,user_name,d_date,membership) VALUES (?,?,?,?,?,?,?,?)";
$ql = $db->prepare($sql);
$ql->execute(array($fingerid,$d_time,$time,$date,$u_id,$u_name,$d_date,$membership));


$response = array("note"=>$action, "uid"=>$u_id, "name"=>$u_name,"success"=>"true");
	$json_response = json_encode($response);
	echo $json_response;


?>
