<?php

include('connect.php');
$d=1;


$sql = "UPDATE sales
        SET call_id=?";
$q = $db->prepare($sql);
$q->execute(array($d));
	


?>