<?php
session_start();
date_default_timezone_set("Asia/Colombo");
include('connect.php');

$a = $_POST['amount'];
$e = $_SESSION['SESS_FIRST_NAME'];
$f = $_SESSION['SESS_MEMBER_ID'];
$mac = $_SESSION['mac_id'];
$g = "pending";
$date=date("Y-m-d");
$time=date("H.i");

if($mac=="0"){ $u_type="user"; 
}else{ $u_type="mac"; }



$sql = "INSERT INTO advance (name,user_id,amount,date,action,time,user_type) VALUES (:a,:b,:c,:d,:e,:f,:g)";
$ql = $db->prepare($sql);
$ql->execute(array(':a'=>$e,':b'=>$f,':c'=>$a,':d'=>$date,':e'=>$g,':f'=>$time,':g'=>$u_type));

header("location: advance.php");

?>