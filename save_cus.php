<?php

session_start();

include('connect.php');
$first = $_POST['first_name'];
$last = $_POST['last_name'];
$b = $_POST['phone_no'];
$c = $_POST['address'];
$d =  $_POST['membership'];
$phone2= $_POST['phone_no2'];
$birth=$_POST['birthday'];


$a=$first." ".$last;
$join=date('Y-m-d');
// query
$sql = "INSERT INTO customer (customer_name,contact,address,birthday,contact2,membership,join_date) VALUES (?,?,?,?,?,?,?)";
$ql = $db->prepare($sql);
$ql->execute(array($a,$b,$c,$birth,$phone2,$d,$join));
header("location: cus_view.php");





?>