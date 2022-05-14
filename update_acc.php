<?php
session_start();
include('connect.php');
date_default_timezone_set("Asia/Colombo"); 

$invo = $_POST['invo'];
$id = $_POST['product'];
$amount = $_POST['amount'];
$type = $_POST['type'];

$date=date("Y-m-d");
  $result = $db->prepare("SELECT * FROM job_record WHERE type='approve' and date='$date' and job_no='$invo'");
		$result->bindParam(':userid', $note);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
			$job_id= $row['id'];
		}

$time=date("H.i");
$cashi = $_SESSION['SESS_FIRST_NAME'];
$note="Insurance Agent Decide for ";
$type0="approve";

if(!$job_id){
$sql = "INSERT INTO job_record (job_no,note,type,user,date,time) VALUES (:a,:b,:c,:d,:e,:f)";
$ql = $db->prepare($sql);
$ql->execute(array(':a'=>$invo,':b'=>$note,':c'=>$type0,':d'=>$cashi,':e'=>$date,':f'=>$time));
}

 $result = $db->prepare("SELECT * FROM job_record WHERE type='approve' and date='$date' and job_no='$invo'");
		$result->bindParam(':userid', $note);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
			$job_id= $row['id'];
		}


$sql = "UPDATE  sales_list SET app_amount=?,app_type=?,note_no=? WHERE id=?";
$ql = $db->prepare($sql);
$ql->execute(array($amount,$type,$job_id,$id));

header("location: accident.php?id=$invo&se=1");
?>