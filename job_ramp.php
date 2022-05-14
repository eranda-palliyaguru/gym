<!DOCTYPE html>
<html>
<?php 
include("head.php");
include("connect.php");
?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<body class="hold-transition skin-red sidebar-mini layout-top-nav">
<?php 
//include_once("auth.php");


?>



<link rel="stylesheet" href="src/popup.css" type="text/css" media="all" />
<link rel="stylesheet" href="datepicker.css"
        type="text/css" media="all" />
    <script src="datepicker.js" type="text/javascript"></script>
    <script src="datepicker.ui.min.js"
        type="text/javascript"></script>
 <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
	var bleep = new Audio();
	bleep.src = "audio/definite.mp3";
	bleep.play();
	
	
$(document).ready(function(){
	setInterval(function(){
		$("#screen").load('job_pro_view.php?id=<?php echo $_GET['id1']; ?>')
    }, 2000);
});
	
	$(document).ready(function(){
	setInterval(function(){
		$("#screen1").load('job_pro_view.php?id=<?php echo $_GET['id2']; ?>')
    }, 2000);
});
</script>



    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

<center>
    <!-- Main content -->
    <section class="content">
		
				 <?php
		date_default_timezone_set("Asia/Colombo");
		$month1=date("Y-m-01");
		$month2=date("Y-m-31");
		
		$tech_time= date("H.i");
		$ramp1 = $_GET['ramp1'];
		$ramp2 = $_GET['ramp2'];
		
		$result = $db->prepare("SELECT * FROM mechanic WHERE ramp = '$ramp1' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
		$name1 = $row['name'];
			$mac_id1 = $row['id'];
		}
		$result = $db->prepare("SELECT * FROM mechanic WHERE ramp = '$ramp2' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
		$name2 = $row['name'];
			$mac_id2 = $row['id'];
		}
	
	$result1 = $db->prepare("SELECT count(transaction_id) FROM sales WHERE  mechanic='$mac_id1' AND action='active' AND date BETWEEN '$month1' AND '$month2' ");
					$result1->bindParam(':userid', $date);
                $result1->execute();
                for($i=0; $row1 = $result1->fetch(); $i++){
				  $mac_srv1=$row1['count(transaction_id)'];
				}
		
		$result1 = $db->prepare("SELECT count(transaction_id) FROM sales WHERE  mechanic='$mac_id2' AND action='active' AND date BETWEEN '$month1' AND '$month2' ");
					$result1->bindParam(':userid', $date);
                $result1->execute();
                for($i=0; $row1 = $result1->fetch(); $i++){
				  $mac_srv2=$row1['count(transaction_id)'];
				}
		
		
		//echo $note;
?>
		<img src="cloud.png" width="180" alt="">
		<br><br>
		<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				<th width="50%"><?php echo $name1 ?><span class="badge bg-green">         
      <?php
echo $mac_srv1;
		?></span></th>
				<th width="50%"><?php echo $name2 ?><span class="badge bg-green">         
      <?php
echo $mac_srv2;
		?></span></th>
					</tr>
				
                </thead>
				
                <tbody>
					<tr>
				  <td>
					  
					  				 <?php
		$vehicle1 = $_GET['id1'];
		$vehicle2 = $_GET['id2'];
		$ramp1 = $_GET['ramp1'];
		$ramp2 = $_GET['ramp2'];
		$out="out";
		
		$sql = "UPDATE job 
        SET ramp=?
		WHERE ramp=?";
$q = $db->prepare($sql);
$q->execute(array($out,$ramp1));
					

		
		
		
		
		
		$result = $db->prepare("SELECT * FROM mechanic WHERE ramp = '$ramp1' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
		$mechanic_id = $row['id'];	
		}
		
	$result = $db->prepare("SELECT * FROM customer WHERE vehicle_no = '$vehicle1' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
            $customer_name1 = $row['customer_name'];
			$phone_no1=$row['contact'];
		}	
		
  $result = $db->prepare("SELECT * FROM job WHERE vehicle_no = '$vehicle1' and type='active' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
			$tech_time_chek1=$row['tech_time'];
			$id1 = $row['id'];
           $note1 = $row['note'];
			$job_type_id1 = $row['job_type'];
			$product_note1 = $row['product_note'];
			$km1 = $row['km'];
			$tech_note1 = $row['tech_note'];
			$ramp_chek1 = $row['ramp'];
		}
if($ramp_chek1=="pause"){				
$sql = "UPDATE job 
        SET tech_time=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($tech_time,$id1));
	}				
					
					
		$result = $db->prepare("SELECT * FROM job_type WHERE id = '$job_type_id1' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
            $job_type1 = $row['name'];
			
		}
		
$sql = "UPDATE job 
        SET ramp=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($ramp1,$id1));
		
		
		$sql = "UPDATE job 
        SET mechanic_id=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($mechanic_id,$id1));
					
	if($tech_time_chek1==""){				
$sql = "UPDATE job 
        SET tech_time=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($tech_time,$id1));
	}
		//echo $note;
?>
		<?php if(!$vehicle1){ ?>			  
			<form method="GET" action="job_ramp.php">
         <label>AAA-xxxx</label>
					  <input type="hidden" name="ramp2" value="<?php echo $ramp2 ?>"> 
					  <input type="hidden" name="id2" value="<?php echo $vehicle2 ?>">
				<input type="hidden" name="ramp1" value="<?php echo $ramp1 ?>">  
                <input style="width:120px"  type="text" name="id1" data-inputmask='"mask": "***-9999"' data-mask autofocus >
         
	</form>
					  
					  <form method="GET" action="job_ramp.php">
					 <label>AA-xxxx</label>
					  <input type="hidden" name="ramp2" value="<?php echo $ramp2 ?>"> 
					  <input type="hidden" name="id2" value="<?php echo $vehicle2 ?>">
				<input type="hidden" name="ramp1" value="<?php echo $ramp1 ?>">  
                <input style="width:120px"  type="text" name="id1" data-inputmask='"mask": "AA-9999"' data-mask autofocus >
         
	</form>	
		<?php } else{ ?>
<a href="job_ramp_ok.php?ramp1=<?php echo $ramp1 ?>&id1=&ramp2=<?php echo $ramp2 ?>&id2=<?php echo $vehicle2 ?>&job_id=<?php echo $id1; ?>&p=complete"><button class="btn btn-success" style="width: 100px; height:35px; margin-top:-8px;margin-left:8px;" >
 <i class="glyphicon glyphicon-ok"></i> 
 </button></a>
					  
<a href="job_ramp_ok.php?ramp1=<?php echo $ramp1 ?>&id1=&ramp2=<?php echo $ramp2 ?>&id2=<?php echo $vehicle2 ?>&job_id=<?php echo $id1; ?>&p=pause"><button class="btn btn-warning" style="width: 100px; height:35px; margin-top:-8px;margin-left:8px;" >
 <i class="glyphicon glyphicon-pause"></i> 
 </button></a>
					  <br><br>
		<div class="row">
		<div class="col-md-4">
		
	<span class="badge bg-red"><h4>         
      <?php
echo $vehicle1."<br>".$job_type1;
		?></h4>      <?php echo $km1."<br>";	?>Km
			<?php echo $customer_name1;	?><br><?php echo $phone_no1;	?>
			</span>
			<br>
	<span class="badge bg-green">         
      <?php
echo $product_note1;
		?></span>
				<br>
<span class="badge bg-">
		<?php
echo $note1;
?></span><br>
			<span class="badge bg-black">         
      <?php
echo $tech_note1;
		?></span>
			</div>
		<small class="pull-right">
		
			
			<?php   $result1 = $db->prepare("SELECT * FROM sales WHERE vehicle_no='$vehicle1' and action='active' ORDER by transaction_id DESC limit 0,1");
		$result1->bindParam(':userid', $res);
		$result1->execute();
		for($i=0; $row = $result1->fetch(); $i++){   ?>
		<table id="example2" class="table table-bordered table-hover ">
			<tr>
                <th width="200">Product Name</th>
				<th width="50">QTY</th>
              </tr>
				 <?php $invo=$row['invoice_number'];
			    $total=0;
                $result = $db->prepare("SELECT * FROM sales_list WHERE invoice_no = '$invo' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row1 = $result->fetch(); $i++){
	?>
				 <tr>
				     <td><?php echo $row1['name']; ?></td>
					 <td><?php echo $row1['qty']; ?></td>
				 </tr>
				 <?php
		}	?>
			 </table>
			<?php
		}	?>
		
		
			</small>
		</div>
					  
					  
					  <br>
					  
					  
					  
					  
					  
					   
	  
	  <?php 
	     $result1 = $db->prepare("SELECT * FROM category  ORDER by id DESC ");
		$result1->bindParam(':userid', $res);
		$result1->execute();
		for($i=0; $row = $result1->fetch(); $i++){
			$c_id=$row['id'];
	  ?>
	  
	  <a class="s" id="<?php echo $row['id']; ?>" href="#">
	  <button style="background-color: white; color: black;" ><?php echo $row['name']; ?> <br> <img src="<?php echo $row['img']; ?>" alt="" style="width: 100px"></button></a>

<!-- The Modal -->

<div id="s<?php echo $row['id']; ?>" class="modal">
	
  <!-- Modal content -->
  <div id="tag" class="modal-content">
    <div class="modal-header">
      <span class="close"> &times;</span>
      <h2>Product</h2>
    </div>
    <div class="modal-body">
         <div class="form-group">
			 <form method="POST" action="save_ramp_pro.php">
				 <input type="hidden" name="ramp2" value="<?php echo $ramp2; ?>"> 
				<input type="hidden" name="id2" value="<?php echo $vehicle2; ?>">
				<input type="hidden" name="ramp1" value="<?php echo $ramp1; ?>">  
                <input type="hidden" name="id1" value="<?php echo $vehicle1; ?>" >
				<input type="hidden" name="job_id" value="<?php echo $id1; ?>">
				<input type="hidden" name="vehicle" value="<?php echo $vehicle1; ?>">
			 <?php 
	     $result = $db->prepare("SELECT * FROM product WHERE category = '$c_id' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row1 = $result->fetch(); $i++){
	  ?>
                  <div class="radio">
                    <label>
                      <input type="radio" name="name" value="<?php echo $row1['product_id']; ?>" >
                      <?php echo $row1['code']; ?>-<p style="color: red" ><?php echo $row1['name']; ?></p>
                    </label>
                  </div>
                <?php } ?>  
          </div>
			 
                    <label>Qty</label>
                  
                   <input type="number" value="1" name="qty" >				   
               
    </div>
		 <div class="modal-footer">
     
    
			   
                  
			 </form>
			 </div>
  </div>
</div>
<?php } ?> 
					  
					  
					  
					  
					  
		
					  							  	<br>		
	
		  
			<div id="screen"></div>
					  
				<form method="POST" action="job_ramp_note.php">
					<label>Note</label>
					  <input type="hidden" name="ramp2" value="<?php echo $ramp2; ?>"> 
					  <input type="hidden" name="id2" value="<?php echo $vehicle2; ?>">
				<input type="hidden" name="ramp1" value="<?php echo $ramp1; ?>">  
                <input type="hidden" name="id1" value="<?php echo $vehicle1; ?>" >
					<input type="hidden" name="job_id" value="<?php echo $id1; ?>">
<textarea name="note" class="textarea" placeholder="Note" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>    
	<input class="btn btn-info" type="submit" value="SAVE Note" >
					  </form>

							  
							  <br><br><br>
				 
					  <?php }  ?>
						</td>
				  <td>
					  
					  <?php
		$vehicle1 = $_GET['id1'];
		$vehicle2 = $_GET['id2'];
		$ramp1 = $_GET['ramp1'];
		$ramp2 = $_GET['ramp2'];
		$out="out";
		
		$sql = "UPDATE job 
        SET ramp=?
		WHERE ramp=?";
$q = $db->prepare($sql);
$q->execute(array($out,$ramp2));
		
		
		
		
		
		$result = $db->prepare("SELECT * FROM mechanic WHERE ramp = '$ramp2' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
		$mechanic_id = $row['id'];	
		}
	
	$result = $db->prepare("SELECT * FROM customer WHERE vehicle_no = '$vehicle2' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
            $customer_name2 = $row['customer_name'];
			$phone_no2=$row['contact'];
		}
		
		
  $result = $db->prepare("SELECT * FROM job WHERE vehicle_no = '$vehicle2' and type='active' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
			$tech_time_chek2 = $row['tech_time'];
			$id2 = $row['id'];
           $note2 = $row['note'];
			$job_type_id2 = $row['job_type'];
			$product_note2 = $row['product_note'];
			$km2 = $row['km'];
			$tech_note2 = $row['tech_note'];
			$ramp_chek2 = $row['ramp'];
		}
	if($ramp_chek2=="pause"){				
$sql = "UPDATE job 
        SET tech_time=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($tech_time,$id1));
	}						 
							 
	$result = $db->prepare("SELECT * FROM job_type WHERE id = '$job_type_id2' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
            $job_type2 = $row['name'];
			
		}
		
$sql = "UPDATE job 
        SET ramp=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($ramp2,$id2));
		
		
		$sql = "UPDATE job 
        SET mechanic_id=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($mechanic_id,$id2));
		//echo $note;
	if($tech_time_chek2==""){				
$sql = "UPDATE job 
        SET tech_time=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($tech_time,$id2));
	}
					  
					  
					  ?>
				<?php if(!$vehicle2){ ?>	  
					  
					  <form method="GET" action="job_ramp.php">
						  <label>AAA-xxxx</label>
					  <input type="hidden" name="ramp1" value="<?php echo $ramp1 ?>"> 
					  <input type="hidden" name="id1" value="<?php echo $vehicle1 ?>"> 
				<input type="hidden" name="ramp2" value="<?php echo $ramp2 ?>">  
                <input style="width:120px"  type="text" name="id2" data-inputmask='"mask": "***-9999"' data-mask autofocus >
         
	</form>
					  
<form method="GET" action="job_ramp.php">
	<label>AA-xxxx</label>
					  <input type="hidden" name="ramp1" value="<?php echo $ramp1 ?>"> 
					  <input type="hidden" name="id1" value="<?php echo $vehicle1 ?>"> 
				<input type="hidden" name="ramp2" value="<?php echo $ramp2 ?>">  
                <input style="width:120px"  type="text" name="id2" data-inputmask='"mask": "AA-9999"' data-mask autofocus >
         
	</form>
					  
					  
<?php }else{	?>				  
					  
<a href="job_ramp_ok.php?ramp1=<?php echo $ramp1 ?>&id1=<?php echo $vehicle1 ?>&ramp2=<?php echo $ramp2 ?>&id2=&job_id=<?php echo $id2; ?>&p=complete"><button class="btn btn-success" style="width: 100px; height:35px; margin-top:-8px;margin-left:8px;" >
 <i class="glyphicon glyphicon-ok"></i> 
 </button></a>
					  
<a href="job_ramp_ok.php?ramp1=<?php echo $ramp1 ?>&id1=<?php echo $vehicle1 ?>&ramp2=<?php echo $ramp2 ?>&id2=&job_id=<?php echo $id2; ?>&p=pause"><button class="btn btn-warning" style="width: 100px; height:35px; margin-top:-8px;margin-left:8px;" >
 <i class="glyphicon glyphicon-pause"></i> 
 </button></a>
					  <br><br>
		<div class="row">
		<div class="col-md-4">
		
	<span class="badge bg-red"><h4>         
      <?php
echo $vehicle2."<br>".$job_type2;
		?></h4>      <?php echo $km2."<br>";	?>Km
			<?php echo $customer_name2;	?><br><?php echo $phone_no2;	?>
			</span><br>
		<span class="badge bg-green">         
      <?php
echo $product_note2;
		?></span><br>
			
				<span class="badge bg-">
		<?php
echo $note2;
?></span><br>
<span class="badge bg-black">         
      <?php
echo $tech_note2;
		?></span>
			</div>
		
		 <small class="pull-right">
		
			
			<?php   $result1 = $db->prepare("SELECT * FROM sales WHERE vehicle_no='$vehicle2' and action='active' ORDER by transaction_id DESC limit 0,1");
		$result1->bindParam(':userid', $res);
		$result1->execute();
		for($i=0; $row = $result1->fetch(); $i++){   ?>
		<table id="example2" class="table table-bordered table-hover ">
			<tr>
                <th width="200">Product Name</th>
				<th width="50">QTY</th>
              </tr>
				 <?php $invo=$row['invoice_number'];
			    $total=0;
                $result = $db->prepare("SELECT * FROM sales_list WHERE invoice_no = '$invo' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row1 = $result->fetch(); $i++){
	?>
				 <tr>
				     <td><?php echo $row1['name']; ?></td>
					 <td><?php echo $row1['qty']; ?></td>
				 </tr>
				 <?php
		}	?>
			 </table>
			<?php
		}	?>
		
		
			  </small>
			</div>
		</div>
					
					
					
					
					  <?php 
	     $result1 = $db->prepare("SELECT * FROM category  ORDER by id DESC ");
		$result1->bindParam(':userid', $res);
		$result1->execute();
		for($i=0; $row = $result1->fetch(); $i++){
			$c_id=$row['id'];
	  ?>
	  
	  <a class="n" id="<?php echo $row['id']; ?>" href="#">
	  <button style="background-color: white; color: black;" ><?php echo $row['name']; ?> <br> <img src="<?php echo $row['img']; ?>" alt="" style="width: 100px"></button></a>

<!-- The Modal -->

<div id="n<?php echo $row['id']; ?>" class="modal">
	
  <!-- Modal content -->
  <div id="tag" class="modal-content">
    <div class="modal-header">
      <span class="close"> &times;</span>
      <h2>Product</h2>
    </div>
    <div class="modal-body">
         <div class="form-group">
			 <form method="POST" action="save_ramp_pro.php">
				 <input type="hidden" name="ramp2" value="<?php echo $ramp2; ?>"> 
				<input type="hidden" name="id2" value="<?php echo $vehicle2; ?>">
				<input type="hidden" name="ramp1" value="<?php echo $ramp1; ?>">  
                <input type="hidden" name="id1" value="<?php echo $vehicle1; ?>" >
				<input type="hidden" name="job_id" value="<?php echo $id2; ?>">
				<input type="hidden" name="vehicle" value="<?php echo $vehicle2; ?>">
			 <?php 
	     $result = $db->prepare("SELECT * FROM product WHERE category = '$c_id' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row1 = $result->fetch(); $i++){
	  ?>
                  <div class="radio">
                    <label>
                      <input type="radio" name="name" value="<?php echo $row1['product_id']; ?>" >
                      <?php echo $row1['code']; ?>-<p style="color: red" ><?php echo $row1['name']; ?></p>
                    </label>
                  </div>
                <?php } ?>  
          </div>
			 
                    <label>Qty</label>
                  
                   <input type="number" value="1" name="qty" >				   
               
    </div>
		 <div class="modal-footer">
     
    
			   
                  
			 </form>
			 </div>
  </div>
</div>
<?php } ?> 
					<br>		
			
	<div id="screen1"></div>
					
					  <form method="POST" action="job_ramp_note.php">
					<label>Note</label>
					  <input type="hidden" name="ramp2" value="<?php echo $ramp2; ?>"> 
					  <input type="hidden" name="id2" value="<?php echo $vehicle2; ?>">
				<input type="hidden" name="ramp1" value="<?php echo $ramp1; ?>">  
                <input type="hidden" name="id1" value="<?php echo $vehicle1; ?>" >
					<input type="hidden" name="job_id" value="<?php echo $id2; ?>">
<textarea name="note" class="textarea" placeholder="Note" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>    
	<input class="btn btn-info" type="submit" value="SAVE Note" >
					  </form>
					

					
					
					
					<br><br><br>
						
		<?php } ?>				
						</td>
						</tr>
               
                
                </tbody>
			</table>

	
		
		
		
		
		
		
		
		
		
		
		
		
		
    </section>
	</center>
	  
    <!-- /.content -->
  </div>
  
  <!-- /.content-wrapper -->
    <?php
  //include("dounbr.php");
?>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../../plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("YYYY/MM/DD", {"placeholder": "YYYY/MM/DD"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("YYYY/MM/DD", {"placeholder": "YYYY/MM/DD"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'YYYY/MM/DD h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>


<script type="text/javascript">
$(function() {
		$(".n").click(function(){
var element = $(this);
var idt = element.attr("id");
var inf = 'n' + idt;
});
	
	
	var modal1 = document.getElementsByClassName("modal");
	
	

	$(".n").click(function(){
		
var element = $(this);
var idt = element.attr("id");
var inf = 'n' + idt;	
var modal = document.getElementById(inf);		
modal.style.display = "block";	

	window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
	
var span = document.getElementsByClassName("close")[0];
span.onclick = function() {
  modal.style.display = "none";
}
	
	
	});





});
	
	
	
	
	$(function() {
		$(".s").click(function(){
var element = $(this);
var idt = element.attr("id");
var inf = 's' + idt;
});
	
	
	var modal1 = document.getElementsByClassName("modal");
	
	

	$(".s").click(function(){
		
var element = $(this);
var idt = element.attr("id");
var inf = 's' + idt;	
var modal = document.getElementById(inf);		
modal.style.display = "block";	

	window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
	
var span = document.getElementsByClassName("close")[0];
span.onclick = function() {
  modal.style.display = "none";
}
	
	
	});





});
</script>


</body>
</html>
