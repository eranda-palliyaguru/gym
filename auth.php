<?php
	//Start session
	session_start();
	include("connect.php");
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {
		header("location:./../../../index.php");
		exit();	
		
	}

	$member_id=$_SESSION['SESS_MEMBER_ID'];
	$result = $db->prepare("SELECT * FROM user WHERE id='$member_id' ");
	$result->bindParam(':userid', $res);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){	
	
		$user_level=$row['user_level'];
	}

?>