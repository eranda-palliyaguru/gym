<?php 
	include('connect.php');
 date_default_timezone_set("Asia/Colombo");
$month1=date("Y-m-01");
$month2=date("Y-m-31");
$job_type=1;
$result1 = $db->prepare("SELECT * FROM sales WHERE   date BETWEEN '$month1' AND '$month2' ");
$result1->bindParam(':userid', $date);
$result1->execute();
for($i=0; $row1 = $result1->fetch(); $i++){
 $id=$row1['transaction_id'];
$job_no=$row1['job_no'];

$result = $db->prepare("SELECT * FROM job WHERE id='$job_no'  ORDER by id ASC ");
				$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){	
				$job_type=$row['job_type'];	
}
$sql = "UPDATE sales 
        SET type_id=?
		WHERE transaction_id=?";
$q = $db->prepare($sql);
$q->execute(array($job_type,$id));
}

?>