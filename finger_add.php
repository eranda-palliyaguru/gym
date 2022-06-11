<?php
session_start();
include('connect.php');
date_default_timezone_set("Asia/Colombo");

$date=date('Y-m-d');
$user_id=$_GET['id'];
$old_id=0;
$result1 = $db->prepare("SELECT * FROM finger WHERE user_id='$user_id' AND action='0' ");
$result1->bindParam(':userid', $date);
$result1->execute();
for($i=0; $row1 = $result1->fetch(); $i++){ 
$old_id=$row1['id'];
}
if($old_id > 0){

	$sql = "UPDATE finger SET action=? WHERE id=?";
	$q = $db->prepare($sql);
	$q->execute(array("25",$old_id));
}else{


$result = $db->prepare("SELECT * FROM customer WHERE  customer_id='$user_id'  ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
		    $user_name=$row['customer_name'];
		}

$sql = "INSERT INTO finger (user_id,user_name,device_id,date,type,action) VALUES (?,?,?,?,?,?)";
$q = $db->prepare($sql);
$q->execute(array($user_id,$user_name,"2",$date,"0","25"));

	}

?>
<meta http-equiv="refresh" content="10; URL='profile.php?id=<?php echo $user_id; ?>'">
<br>
<center>
<h1>Please wait</h1>
<img width="600px" src="pic/fingerprint.gif" alt="">

</center>
