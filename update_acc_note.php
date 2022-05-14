<?php
session_start();
include('connect.php');
date_default_timezone_set("Asia/Colombo"); 

$invo = $_POST['invo'];
$id = $_POST['note'];



$date=date("Y-m-d");
$time=date("H.i");
$cashi = $_SESSION['SESS_FIRST_NAME'];
$note=$_POST['note'];
$type0="comments";


$sql = "INSERT INTO job_record (job_no,note,type,user,date,time) VALUES (:a,:b,:c,:d,:e,:f)";
$ql = $db->prepare($sql);
$ql->execute(array(':a'=>$invo,':b'=>$note,':c'=>$type0,':d'=>$cashi,':e'=>$date,':f'=>$time));


 
header("location: accident.php?id=$invo&se=0");
?>