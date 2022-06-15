<?php
session_start();
include('connect.php');

$sql = "UPDATE device 
        SET lock_action=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array("2","1"));

?>
<meta http-equiv="refresh" content="7; URL='index.php'">
<br>
<center>
<h1>Please wait</h1>
<img width="600px" src="pic/unlock.gif" alt="">

</center>
