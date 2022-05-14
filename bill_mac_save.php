<!DOCTYPE html>
<html>
<?php 
include("head.php");
include("connect.php");
?>
<body class="hold-transition skin-red sidebar-mini layout-top-nav">
<?php 
//include_once("auth.php");


?>




<link rel="stylesheet" href="datepicker.css"
        type="text/css" media="all" />
    <script src="datepicker.js" type="text/javascript"></script>
    <script src="datepicker.ui.min.js"
        type="text/javascript"></script>
 <script type="text/javascript">
     
		 $(function(){
        $("#datepicker1").datepicker({ dateFormat: 'yy/mm/dd' });
        $("#datepicker2").datepicker({ dateFormat: 'yy/mm/dd' });
       
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
		$ramp1 = $_GET['ramp1'];
		$ramp2 = $_GET['ramp2'];
		
		$result = $db->prepare("SELECT * FROM mechanic WHERE ramp = '$ramp1' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
		$name1 = $row['name'];	
		}
		$result = $db->prepare("SELECT * FROM mechanic WHERE ramp = '$ramp2' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
		$name2 = $row['name'];	
		}
	
		//echo $note;
?>
		<img src="cloud.png" width="180" alt="">
		<br><br>
		<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				<th><?php echo $name1 ?></th>
				<th><?php echo $name2 ?></th>
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
		
		
		
  $result = $db->prepare("SELECT * FROM job WHERE vehicle_no = '$vehicle1' and type='active' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
			$id1 = $row['id'];
           $note1 = $row['note'];
			$product_note1 = $row['product_note'];
			$km1 = $row['km'];
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
		//echo $note;
?>
					  
			<form method="GET" action="job_ramp.php">
					  <input type="hidden" name="ramp2" value="<?php echo $ramp2 ?>"> 
					  <input type="hidden" name="id2" value="<?php echo $vehicle2 ?>">
				<input type="hidden" name="ramp1" value="<?php echo $ramp1 ?>">  
                <input style="width:120px"  type="text" name="id1" data-inputmask='"mask": "AAA-9999"' data-mask autofocus >
         
	</form>
						<br>
		<div class="row">
		<div class="col-md-4">
		
	<span class="badge bg-red"><h1>         
      <?php
echo $vehicle1;
		?></h1><h3>      <?php echo $km1;	?>Km</h3></span>
	<span class="badge bg-green"><h2>         
      <?php
echo $product_note1;
		?></h2></span>		
		<h3><?php
echo $note1;
?></h3>
			</div>
		
		
		<div class="col-md-4">
			
			<?php   $result1 = $db->prepare("SELECT * FROM sales WHERE vehicle_no='$vehicle1' ORDER by transaction_id DESC limit 0,1");
		$result1->bindParam(':userid', $res);
		$result1->execute();
		for($i=0; $row = $result1->fetch(); $i++){   ?>
		<table id="example2" class="table table-bordered table-hover ">
			<tr>
                <th>Product Name</th>
				<th>QTY</th>
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
		
		</div>
		</div>
				<form method="POST" action="job_ramp_note.php">
					<label>Note</label>
					  <input type="hidden" name="ramp2" value="<?php echo $ramp2; ?>"> 
					  <input type="hidden" name="id2" value="<?php echo $vehicle2; ?>">
				<input type="hidden" name="ramp1" value="<?php echo $ramp1; ?>">  
                <input type="hidden" name="id1" value="<?php echo $vehicle1; ?>" >
					<input type="hidden" name="job_id" value="<?php echo $id1; ?>">
<textarea name="note" class="textarea" placeholder="Note" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>    
	</form>		
				 <form method="GET" action="job_ramp.php">
					 <label>AA-xxxx</label>
					  <input type="hidden" name="ramp2" value="<?php echo $ramp2 ?>"> 
					  <input type="hidden" name="id2" value="<?php echo $vehicle2 ?>">
				<input type="hidden" name="ramp1" value="<?php echo $ramp1 ?>">  
                <input style="width:120px"  type="text" name="id1" data-inputmask='"mask": "AA-9999"' data-mask autofocus >
         
	</form>
						
						
						
						
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
		
		
		
  $result = $db->prepare("SELECT * FROM job WHERE vehicle_no = '$vehicle2' and type='active' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
			$id2 = $row['id'];
           $note2 = $row['note'];
			$product_note2 = $row['product_note'];
			$km2 = $row['km'];
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
?>
					  
					  
					  <form method="GET" action="job_ramp.php">
					  <input type="hidden" name="ramp1" value="<?php echo $ramp1 ?>"> 
					  <input type="hidden" name="id1" value="<?php echo $vehicle1 ?>"> 
				<input type="hidden" name="ramp2" value="<?php echo $ramp2 ?>">  
                <input style="width:120px"  type="text" name="id2" data-inputmask='"mask": "AAA-9999"' data-mask autofocus >
         
	</form>
						<br>
		<div class="row">
		<div class="col-md-4">
		
	<span class="badge bg-red"><h1>         
      <?php
echo $vehicle2;
		?></h1><h3>      <?php echo $km2;	?>Km</h3></span>
		<span class="badge bg-green"><h2>         
      <?php
echo $product_note2;
		?></h2></span>	
		<h3><?php
echo $note2;
?></h3>
			</div>
		
		
		<div class="col-md-4">
			
			<?php   $result1 = $db->prepare("SELECT * FROM sales WHERE vehicle_no='$vehicle2' ORDER by transaction_id DESC limit 0,1");
		$result1->bindParam(':userid', $res);
		$result1->execute();
		for($i=0; $row = $result1->fetch(); $i++){   ?>
		<table id="example2" class="table table-bordered table-hover ">
			<tr>
                <th>Product Name</th>
				<th>QTY</th>
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
		
		</div>
		</div>
					  <form method="POST" action="job_ramp_note.php">
					<label>Note</label>
					  <input type="hidden" name="ramp2" value="<?php echo $ramp2; ?>"> 
					  <input type="hidden" name="id2" value="<?php echo $vehicle2; ?>">
				<input type="hidden" name="ramp1" value="<?php echo $ramp1; ?>">  
                <input type="hidden" name="id1" value="<?php echo $vehicle1; ?>" >
					<input type="hidden" name="job_id" value="<?php echo $id2; ?>">
<textarea name="note" class="textarea" placeholder="Note" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>    
	</form>
						<form method="GET" action="job_ramp.php">
	<label>AA-xxxx</label>
					  <input type="hidden" name="ramp1" value="<?php echo $ramp1 ?>"> 
					  <input type="hidden" name="id1" value="<?php echo $vehicle1 ?>"> 
				<input type="hidden" name="ramp2" value="<?php echo $ramp2 ?>">  
                <input style="width:120px"  type="text" name="id2" data-inputmask='"mask": "AA-9999"' data-mask autofocus >
         
	</form>
						
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
</body>
</html>
