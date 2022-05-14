<!DOCTYPE html>
<html>
<head>
	<?php
		  include("connect.php");
	
	$invo = $_GET['id'];
	$co = substr($invo,0,2) ;
			?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CLOUD ARM | Invoice</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body onload="window.print() " style=" font-size: 13px; font-family: arial;">
<?php
$sec = "1";
?><meta http-equiv="refresh" content="<?php echo $sec;?>;URL='index.php'">	

  <!-- Main content -->
  
	  
	  
	  
	  
	  
        <!-- accepted payments column -->
     <img src="honda.png" width="150" alt=""><br>
	<b>Tel: 031-2226886 </b><br><b>Mobile: 077-3213484 </b><br>	<b>Mobile: 076-9163030 </b>
        <!-- /.col -->
         <h5>
		  <?php 
		 $id=$_GET['id'];
			$date=date("Y-m-d");
			 
			 $result = $db->prepare("SELECT * FROM job WHERE date='$date' ORDER by id ASC limit 0,1");
				$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
					$jid=$row['id'];
				}
			 
				$result = $db->prepare("SELECT * FROM job WHERE   id='$id'");
				$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
					$job_type=$row['job_type'];
					
					$pivotr=$row['pivot_arm_cover_r'];
					$pivot=$row['pivot_arm_cover'];
					$carpet=$row['carpet'];
					$helmet=$row['helmet'];
					$toolkit=$row['toolkit'];
					
		$result1 = $db->prepare("SELECT * FROM job_type WHERE id = '$job_type' ");
		$result1->bindParam(':userid', $res);
		$result1->execute();
		for($i=0; $row1 = $result1->fetch(); $i++){
			$type=$row1['name'];
			$v_number=$row['vehicle_no'];
		}
					$nba=1+$id-$jid;
					
					echo "<h3>".$nba."</h3>";
				echo "<b>Vehicle No: </b>".$row['vehicle_no'];
					echo "<br><br>";
					echo "<b>Job Type: </b>".$type;
					echo "<br><br>";
					echo "<b>Date: </b>".$row['date'];
					echo "<br><br>";
					echo "<b>Mileage: </b>".$row['km']."Km";
					echo "<br><br>";
					echo "<b>Note: </b><br>".$row['note'];
					echo "<br><br>";
					echo "<b>Product Note: </b><br>".$row['product_note'];
					echo "<br>";
					
					if($helmet==1){ echo "Helmet <br>";  }
					if($toolkit==1){ echo "Tool Kit <br>";  }
					if($carpet==1){ echo "Carpet <br>";  }
					if($pivot==1){ echo "Pivot Arm Cover L <br>";  }
					if($pivotr==1){ echo "Pivot Arm Cover R<br>";  }
				}
	
 ?>
			</h5>
        <!-- /.col -->
	<h5>CLOUD ARM SOFTWARE<br><br>
 <?php if($helmet==1){ echo $v_number."<br><br> ".$v_number;  } ?>
</h5></div>
</body>
</html>