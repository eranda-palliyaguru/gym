

					  				 <?php
	include("connect.php");
		$vehicle1 = $_POST['id1'];
		$vehicle2 = $_POST['id2'];
		$ramp1 = $_POST['ramp1'];
		$ramp2 = $_POST['ramp2'];
		$job_id = $_POST['job_id'];
$note1 = $_POST['note'];
$note= str_replace(".","<br>",$note1);		
		$sql = "UPDATE job 
        SET tech_note=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($note,$job_id));
header("location: job_ramp.php?id1=$vehicle1&id2=$vehicle2&ramp1=$ramp1&ramp2=$ramp2");		
?>		
	