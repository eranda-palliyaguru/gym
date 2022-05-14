

 <?php
	include("connect.php");
date_default_timezone_set("Asia/Colombo");
		$vehicle1 = $_GET['id1'];
		$vehicle2 = $_GET['id2'];
		$ramp1 = $_GET['ramp1'];
		$ramp2 = $_GET['ramp2'];
		$job_id = $_GET['job_id'];
$p = $_GET['p'];



$result = $db->prepare("SELECT * FROM job WHERE id='$job_id'  ");
				$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
				$wash_time1=$row['tech_time'];
					$ramp_pos=$row['ramp'];
				}


$time_now=date("H.i");
$date1 = new DateTime($time_now);
$date2 = $date1->diff(new DateTime($wash_time1));

$h=$date2->h;
$m=$date2->i;
$note=$h.".".$m;


if($ramp_pos=="complete"){
	
}else{

		$sql = "UPDATE job 
        SET tech_time_end=tech_time_end+?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($note,$job_id));
}

		$sql = "UPDATE job 
        SET ramp=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($p,$job_id));

header("location: job_ramp.php?id1=$vehicle1&id2=$vehicle2&ramp1=$ramp1&ramp2=$ramp2");		
?>


	