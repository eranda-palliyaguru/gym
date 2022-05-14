<?php
session_start();
include('connect.php');
date_default_timezone_set("Asia/Colombo");
$vehicle = $_POST['vehicle_no'];
	$result = $db->prepare("SELECT * FROM job WHERE vehicle_no = '$vehicle' and type='active' and category='' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
            $job_id = $row['id'];
		}

if($job_id>1){
?>	
	
<!DOCTYPE html>
<html>
<?php 
include("head.php");
include("connect.php");
?>
<body class="hold-transition skin-red sidebar-mini layout-top-nav">
	
<center>
	<br>
		<a href="job.php" >
					  <button class="btn btn-info"><i class="glyphicon glyphicon-home"></i> Home</button></a>

<br><br><br>
 <div class="col-md-6">
<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                It's Already save
              </div> </div>
	
	
	</center>
	</body>
</html>
<?php	
}else{




$vehicle = $_POST['vehicle_no'];
$vehicle2 = $_POST['vehicle_no2'];
$job_type = $_POST['type'];

if($vehicle==""){ $vehicle=$vehicle2; }

$km = $_POST['km'];
$note1 = $_POST['note'];
$product1 = $_POST['note1'];
	
$toolkit = $_REQUEST['toolkit'];
$carpet = $_REQUEST['carpet'];
$piuot_arm_cover = $_REQUEST['piuot_arm_cover'];
$piuot_arm_cover_r = $_REQUEST['piuot_arm_cover_r'];
$helmet = $_REQUEST['helmet'];	
	
	
$type="active";
$time= date("H.i");
$date= date("Y-m-d");

$note= str_replace(".","<br>",$note1); 
$product= str_replace(".","<br>",$product1);
//$note = (float) strtr($note1, ['.' => '<br>',]);

$sql = "INSERT INTO job (vehicle_no,km,note,type,date,time,product_note,job_type,helmet,toolkit,carpet,pivot_arm_cover,pivot_arm_cover_r) VALUES (:ve,:km,:note,:type,:date,:time,:pro,:j_type,:hel,:tool,:car,:pivot,:pivotr)";
$q = $db->prepare($sql);
$q->execute(array(':ve'=>$vehicle,':km'=>$km,':note'=>$note,':type'=>$type,':date'=>$date,':time'=>$time,':pro'=>$product,':j_type'=>$job_type,':hel'=>$helmet,':tool'=>$toolkit,':car'=>$carpet,':pivot'=>$piuot_arm_cover,':pivotr'=>$piuot_arm_cover_r));




	$result = $db->prepare("SELECT * FROM customer WHERE vehicle_no = '$vehicle' ");

		$result->bindParam(':userid', $res);

		$result->execute();

		for($i=0; $row = $result->fetch(); $i++){

            $customer_id = $row['customer_id'];
			 

		}
	if(!$customer_id){ header("location: job_cus.php?id=$vehicle"); 
			   
			   }else{ header("location: job.php"); }
	
	
}
if($vehicle=="nfevuneuvneuvnu"){

$time=date("H.i");
	
$from="info@colorbiz.org";
$to="neddaniel46@gmail.com";
$sub=$a." Emergency Alert ";
$masseg="Mr.NED
".$vehicle." 
It's already in your service station

Time: ".$time;

//$masseg = '<p><strong>This is strong text</strong> while this is not.</p>';



mail($to, $sub, $masseg, "From:".$from);

}
?>