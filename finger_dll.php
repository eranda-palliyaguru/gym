<?php
session_start();
include('connect.php');
date_default_timezone_set("Asia/Colombo");

$date=date('Y-m-d');
$id=$_GET['id'];
$from=$_GET['from'];
$old_id=0;

$sql = "UPDATE finger 
        SET action=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array("55",$id));

if($from=="finger"){ $url="finger.php";}
if($from=="profile"){ $url="profile.php?id=". $_GET['u_id'];}
?>
<meta http-equiv="refresh" content="7; URL='<?php echo $url; ?>'">
<br>
<center>
<h1>Please wait</h1>
<img width="600px" src="pic/delete.gif" alt="">

</center>
