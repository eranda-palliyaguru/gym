<?php
session_start();
include('connect.php');
$a = $_POST['name'];
$b = $_POST['code'];
$c = $_POST['type'];
$d = $_POST['sell'];
$e = $_POST['cost'];
$f = $_POST['re_order'];
$rack = $_POST['rack'];




// query
$sql = "INSERT INTO products (product_name,product_code,sell_price,cost_price) VALUES (:a,:b,:d,:e)";
$ql = $db->prepare($sql);
$ql->execute(array(':a'=>$a,':b'=>$b,':d'=>$d,':e'=>$e));
header("location: product_view.php");


?>