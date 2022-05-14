<?php
include '../connect.php';

$data = json_decode(file_get_contents('php://input'), true);

$key = $data['Key'];
$userid=$data['Userid'];
$name=$data['Name'];


$sql = "INSERT INTO attends (user_name,d_date) VALUES (?,?)";
$ql = $db->prepare($sql);
$ql->execute(array($name,$key));


$response = array("id"=>$userid, "name"=>$name);
	$json_response = json_encode($response);
	echo $json_response;
?>