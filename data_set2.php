<?php

include('connect_sr.php');

	
$sql1=mysqli_query($GLOBALS['con'],"SELECT * FROM csv  ORDER by id ASC limit 0,100");
 while($r=mysqli_fetch_array($sql1)){
	
	$code=$r['code'];
	$price=$r['price'];
	$qty=$r['qty'];
    $id=$r['id'];
    $date=date("Y-m-d");	

	    $sql2 = mysqli_query($GLOBALS['con'],"UPDATE products 
        SET price='$price',qty_up='$qty',up_date= '$date' 
		WHERE product_code = '$code'")or die(mysqli_error($GLOBALS['con']));
	 
	 
	 include('connect.php');
	 $result = $db->prepare("DELETE FROM csv WHERE  id= :memid");
	 $result->bindParam(':memid', $id);
	 $result->execute();
}


header("location: data_set_re.php");
?>