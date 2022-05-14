<?php
session_start();
date_default_timezone_set("Asia/Colombo");
include('connect.php');

$id = $_GET['id'];
$b = $_GET['type'];



$sql = "UPDATE mac_leave 
        SET action=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($b,$id));




header("location: index.php");

?>