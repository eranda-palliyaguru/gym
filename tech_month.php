<!DOCTYPE html>
<html>
<?php 
include("head.php");
include("connect.php");
include_once("auth.php");?>
<body class="hold-transition skin-red sidebar-mini layout-top-nav sidebar-collapse">
<?php 
//include_once("auth.php");
//$r=$_SESSION['SESS_LAST_NAME'];
date_default_timezone_set("Asia/Colombo");

include_once("sidebar2.php");
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
		
 <form action="tech_month.php" method="get">   
	<center>
	
			  
			  
			<strong>

From :<input type="text" style="width:223px; padding:4px;" name="d1" id="datepicker" value="" autocomplete="off" /> 
To:<input type="text" style="width:223px; padding:4px;" name="d2" id="datepickerd"  value="" autocomplete="off"/>

 <button class="btn btn-info" style="width: 123px; height:35px; margin-top:-8px;margin-left:8px;" type="submit">
 <i class="icon icon-search icon-large"></i> Search
 </button>
 
</strong>  
			  
		<br>	  
			  
         <h4> Report from&nbsp;<i class=" text-primary "><?php echo $_GET['d1'] ?></i>&nbsp;to&nbsp;<i class=" text-primary "><?php echo $_GET['d2'] ?> </i>  </h4>
			 
			 </center>
			 </form>
		
	
		<div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Daily Summary </h3>
            </div>
			<div class="box-body">
	
		 <table id="example2" class="table table-bordered table-hover">
			<tr>
                <th>Vehicle no</th>
				<th>Labor</th>
				<th>full </th>
				<th>Free</th>
              </tr>
				 <?php 
			 $date1=$_GET['d1'];
			 $date2=$_GET['d2'];
			 $r=$_SESSION['mac_id'];
			 $mac_rep=0;
                $result = $db->prepare("SELECT * FROM sales WHERE mechanic = '$r' and date BETWEEN '$date1' and '$date2' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
		$invo=$row['invoice_number'];
		$type=$row['type_id'];
		$mac_rep=$row['mechanic_rep'];
			$total=0;
			 $repair=0;
				$full=0;
				$ned_free=0;
				$free1=0;
				$free2=0;
			
			
			

$result2 = $db->prepare("SELECT sum(price) FROM sales_list where invoice_no='$invo' and product_id='998'  ");
				$result2->bindParam(':userid', $id);
                $result2->execute();
                for($i=0; $row2 = $result2->fetch(); $i++){
					$repair3=$row2['sum(price)'];
				}		

$result2 = $db->prepare("SELECT sum(price) FROM sales_list where invoice_no='$invo' and product_id='404'  ");
				$result2->bindParam(':userid', $id);
                $result2->execute();
                for($i=0; $row2 = $result2->fetch(); $i++){
					$repair1=$row2['sum(price)'];
				}
$result2 = $db->prepare("SELECT sum(price) FROM sales_list where invoice_no='$invo' and product_id='403'  ");
				$result2->bindParam(':userid', $id);
                $result2->execute();
                for($i=0; $row2 = $result2->fetch(); $i++){
					$repair2=$row2['sum(price)'];
				}
$result2 = $db->prepare("SELECT sum(price) FROM sales_list where invoice_no='$invo' and product_id='402'  ");
				$result2->bindParam(':userid', $id);
                $result2->execute();
                for($i=0; $row2 = $result2->fetch(); $i++){
					$full1=$row2['sum(price)'];
				}
$result2 = $db->prepare("SELECT count(price) FROM sales_list where invoice_no='$invo' and product_id='407'  ");
				$result2->bindParam(':userid', $id);
                $result2->execute();
                for($i=0; $row2 = $result2->fetch(); $i++){
					$ned_free1=$row2['count(price)'];
				}
$result2 = $db->prepare("SELECT count(price) FROM sales_list where invoice_no='$invo' and product_id='431'  ");
				$result2->bindParam(':userid', $id);
                $result2->execute();
                for($i=0; $row2 = $result2->fetch(); $i++){
					$st=$row2['count(price)'];
				}
$result2 = $db->prepare("SELECT count(price) FROM sales_list where invoice_no='$invo' and product_id='432'  ");
				$result2->bindParam(':userid', $id);
                $result2->execute();
                for($i=0; $row2 = $result2->fetch(); $i++){
					$nd=$row2['count(price)'];
				}
	
				$repair+=$repair1+$repair2+$repair3;
			if($mac_rep>0){ $repair=0; }
				$full+=$full1;
				$ned_free+=$ned_free1;
				$free1+=$st;
				$free2+=$nd;
			$freexr=$free1+$free2+$ned_free1;
			
	?>
				 <tr >
				     
					 <td><?php echo $row['vehicle_no'];  ?>
					 </td>
					 <td><span class="badge bg-"><?php echo $repair; ?></span>
		<span class="badge bg-yellow"><?php if($repair>1){  echo $repair/100*2; $repairx+=$repair/100*2; } ?></span> </td>
					 <td><span class="badge bg-"><?php  echo $full;  ?></span>
				<span class="badge bg-yellow"><?php if($full>1){ echo "25"; $fullx+="25"; } ?></span></td>
				<td><span class="badge bg-"><?php  echo $freexr;  ?></span>
				<span class="badge bg-yellow"><?php if($freexr>0){ echo "25";$freex+="25"; } ?></span></td>	
				 <?php // $total+=$row['price']; ?>
				 </tr>
				 <?php
		}	?>
			 
			 				 <?php 
			 $date1=$_GET['d1'];
			 $date2=$_GET['d2'];
			 $r=$_SESSION['mac_id'];
			 
                $result = $db->prepare("SELECT * FROM sales WHERE mechanic_rep = '$r' and date BETWEEN '$date1' and '$date2' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
		$invo=$row['invoice_number'];
		$type=$row['type_id'];
			$total=0;
			 $repair=0;
				$full=0;
				$ned_free=0;
				$free1=0;
				$free2=0;
			
			
			

$result2 = $db->prepare("SELECT sum(price) FROM sales_list where invoice_no='$invo' and product_id='998'  ");
				$result2->bindParam(':userid', $id);
                $result2->execute();
                for($i=0; $row2 = $result2->fetch(); $i++){
					$repair3=$row2['sum(price)'];
				}		

$result2 = $db->prepare("SELECT sum(price) FROM sales_list where invoice_no='$invo' and product_id='404'  ");
				$result2->bindParam(':userid', $id);
                $result2->execute();
                for($i=0; $row2 = $result2->fetch(); $i++){
					$repair1=$row2['sum(price)'];
				}
$result2 = $db->prepare("SELECT sum(price) FROM sales_list where invoice_no='$invo' and product_id='403'  ");
				$result2->bindParam(':userid', $id);
                $result2->execute();
                for($i=0; $row2 = $result2->fetch(); $i++){
					$repair2=$row2['sum(price)'];
				}

	
				$repair+=$repair1+$repair2+$repair3;
				$full+=0;
				$ned_free+=0;
				$free1+=0;
				$free2+=0;
			$freexr=0;
			
	?>
				 <tr >
				     
					 <td><?php echo $row['vehicle_no'];  ?>
					 </td>
					 <td><span class="badge bg-"><?php echo $repair; ?></span>
		<span class="badge bg-yellow"><?php if($repair>1){  echo $repair/100*2; $repairx+=$repair/100*2; } ?></span> </td>
					 <td><span class="badge bg-"><?php  echo $full;  ?></span>
				<span class="badge bg-yellow"><?php if($full>1){ echo "25"; $fullx+="25"; } ?></span></td>
				<td><span class="badge bg-"><?php  echo $freexr;  ?></span>
				<span class="badge bg-yellow"><?php if($freexr>0){ echo "25";$freex+="25"; } ?></span></td>	
				 <?php // $total+=$row['price']; ?>
				 </tr>
				 <?php
		}	?>
			 
			 
			 
				 <tfoot>
					 <tr style="background-color:currentColor">
			 <td></td>
			     <td><span class="badge bg-yellow"><?php if($repairx>1){ echo $repairx; } ?></span></td>
				 <td><span class="badge bg-yellow"><?php if($fullx>1){ echo $fullx; } ?></span></td>
				 
				 <td><span class="badge bg-yellow"><?php if($freex>1){ echo $freex; } ?></span></td>
			 </tr>
			 </tfoot>
			 </table>		
				<span class="badge bg-yellow"><h3>Rs.<?php echo $freex+$fullx+$repairx;  ?></h3></span>
				
				
				
				
				
				
				
	</div></div>
		</center>
		
		
    </section>
	
    <!-- /.content -->
  </div>
  
  <!-- /.content-wrapper -->
    <?php
	
	
	

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
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
	
	
	$('#datepicker').datepicker({  autoclose: true, datepicker: true,  format: 'yyyy-mm-dd '});
    $('#datepicker').datepicker({ autoclose: true });
	
	$('#datepickerd').datepicker({  autoclose: true, datepicker: true,  format: 'yyyy-mm-dd '});
    $('#datepickerd').datepicker({ autoclose: true  });
	
	$('#datepickerc').datepicker({  autoclose: true, datepicker: true,  format: 'yyyy-mm-dd '});
    $('#datepickerc').datepicker({ autoclose: true  });
	
</script>
</body>
</html>
