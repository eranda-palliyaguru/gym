<?php
session_start();
include('connect.php');
date_default_timezone_set("Asia/Colombo");

$id=$_REQUEST['job_no'];
$vehi=$_REQUEST['vehi'];

$code=$_REQUEST['mechanic'];




$sql = "UPDATE job 
        SET mechanic_id=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($code,$id));

header("location: sales1.php");

?>