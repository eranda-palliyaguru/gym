<?php
include("../connect.php");
$no=1;
$update="now";

$u_id=0;

 date_default_timezone_set("Asia/Colombo");
header("Content-Type:application/json");
$key = $_GET['key'];
$did = $_GET['did'];
$con = $_GET['con'];
$data=$_GET['data'];
$memory=$_GET['memory'];
$version=$_GET['version'];
$mode=$_GET['mode'];



if($version=="1.0.5"){
	$update="no";
}


$y=date("y");
$m=date("m");
$d=date("d");
$h=date("H");
$i=date("i");
$s=date("s");
if($memory > 0){$action="delete";}else{$action="";}
$response = array("y"=>$y, "M"=>$m, "d"=>$d, "h"=>$h, "m"=>$i, "s"=>$s, "update"=>$update,"action"=>"$action");
	$json_response = json_encode($response);
	echo $json_response;

?>