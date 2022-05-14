

<?php
include("connect.php");
date_default_timezone_set("Asia/Colombo");

		$vehicle1 = $_POST['id1'];
		$vehicle2 = $_POST['id2'];
		$ramp1 = $_POST['ramp1'];
		$ramp2 = $_POST['ramp2'];
		$job_id = $_POST['job_id'];

$a1 = $_POST['name'];
$f = $_POST['qty'];

  
$result = $db->prepare("SELECT * FROM job WHERE id = '$job_id'  ");
		$result->bindParam(':userid', $c);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
			$c="-45".$row['vehicle_no'];
			
		}


$result = $db->prepare("SELECT * FROM product WHERE product_id = '$a1' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
            $b = $row['name'];
			$d = $row['sell'];
			$g = $row['code'];
			$cost = $row['cost'];
			$type = $row['type'];
		}

// query
$sql = "INSERT INTO sales_list (product_id,name,invoice_no,price,dic,qty,code,profit,type) VALUES (:a,:b,:c,:d,:e,:f,:g,:pro,:type)";
$ql = $db->prepare($sql);
$ql->execute(array(':a'=>$a1,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>'',':f'=>$f,':g'=>$g,':pro'=>'',':type'=>$type));

header("location: job_ramp.php?id1=$vehicle1&id2=$vehicle2&ramp1=$ramp1&ramp2=$ramp2");		
?>		
	