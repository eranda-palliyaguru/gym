<?php
session_start();
include('connect.php');

$a = $_POST['name'];
$b = $_POST['vehicle_no'];
$c = $_POST['v_date'];
$d = $_POST['contact'];
$e = $_POST['join'];
$address = $_POST['address'];
$id= $_POST['id'];
$membar=$_POST['type'];




$sql = "UPDATE customer 
        SET customer_name=?
		WHERE customer_id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$id));


$sql = "UPDATE customer 
        SET v_date=?
		WHERE customer_id=?";
$q = $db->prepare($sql);
$q->execute(array($c,$id));



$sql = "UPDATE customer 
        SET address=?
		WHERE customer_id=?";
$q = $db->prepare($sql);
$q->execute(array($address,$id));


$sql = "UPDATE customer 
        SET contact=?
		WHERE customer_id=?";
$q = $db->prepare($sql);
$q->execute(array($d,$id));


$sql = "UPDATE customer SET join_date=? , membership=? WHERE customer_id=?";
$q = $db->prepare($sql);
$q->execute(array($e,$membar,$id));



header("location: profile.php?id=$id");


?>