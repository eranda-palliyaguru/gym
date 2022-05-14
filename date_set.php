<?php
session_start();
include('connect.php');


$result = $db->prepare("SELECT * FROM csv ");
$result->bindParam(':userid', $d);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
$id=$row['id'];
	
	$vehi=$row['mileg'];
    
			
	$f = substr($vehi,0,10) ;
	
			
			echo $f;
	
	echo "<br>";
	
	
	
	$sql = "UPDATE csv 
        SET mileg=? 
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($f,$id));
	
	
				}
exit;
?>