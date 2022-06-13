<?php
session_start();
include('connect.php');
date_default_timezone_set("Asia/Colombo");

$date=date('Y-m-d');
$id=$_GET['id'];
$old_id=0;

$sql = "UPDATE finger 
        SET action=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array("55",$id));

?>
<meta http-equiv="refresh" content="7; URL='finger.php'">
<br>
<center>
<h1>Please wait</h1>
<img width="600px" src="pic/delete.gif" alt="">

</center>
