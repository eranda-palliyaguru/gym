<?php

session_start();

include('connect.php');
$a = $_POST['cus_name'];
$b = $_POST['phone_no'];
$c = $_POST['address'];
$d =  $_POST['membership'];
$phone2= $_POST['phone_no2'];
$birth=$_POST['birthday'];

// query

$sql = "INSERT INTO customer (customer_name,contact,address,birthday,contact2,membership) VALUES (?,?,?,?,?,?)";
$ql = $db->prepare($sql);
$ql->execute(array($a,$b,$c,$birth,$phone2,$d));
header("location: cus_view.php");





?>