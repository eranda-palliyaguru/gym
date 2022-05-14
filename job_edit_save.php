<?php
session_start();
include('connect.php');
date_default_timezone_set("Asia/Colombo");



$id = $_POST['id'];
$vehicle = $_POST['vehicle_no'];

$job_type = $_POST['type'];
$km = $_POST['km'];
$note1 = $_POST['note'];
$product1 = $_POST['note1'];
$type="active";


$note= str_replace(".","<br>",$note1); 
$product= str_replace(".","<br>",$product1);
//$note = (float) strtr($note1, ['.' => '<br>',]);

$sql = "UPDATE job SET vehicle_no=?,km=?,note=?,product_note=?,job_type=? WHERE id=?";
$ql = $db->prepare($sql);
$ql->execute(array($vehicle,$km,$note,$product,$job_type,$id));




header("location: job.php"); 

?>