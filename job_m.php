<!DOCTYPE html>
<html>
<?php 
include("head.php");
include("connect.php");
include_once("auth.php");?>
<body class="hold-transition skin-red sidebar-mini layout-top-nav sidebar-collapse">
<?php 
date_default_timezone_set("Asia/Colombo");
$r=$_SESSION['SESS_LAST_NAME'];
if($r =='Cashier'){
header("location:./../../../index.php");
}
if($r =='admin'){



include_once("sidebar.php");

}else{ include_once("sidebar2.php"); }
	
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
	  
	 

    <!-- Main content -->
    <section class="content">
		
		

		

		
	
		<div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Leave Form </h3>
            </div>
			<div class="box-body">
	
	
		       <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Nomal JOB</a></li>
              <li><a href="#tab_2" data-toggle="tab">ENGING REPEAR</a></li>
             
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <b>Nomal JOB</b><br>
		
				  <center><br><br>
				  
				 <form method="POST" action="job_rep.php">
				  <input type="hidden" name="type" value="1">
					 <input type="hidden" name="mac_id" value="<?php echo $_SESSION['mac_id']; ?>">
					 <label>AAA-xxxx</label>
				   <input style="width:120px"  type="text" name="id1" data-inputmask='"mask": "AAA-9999"' data-mask autofocus ><br>
					  <label>AA-xxxx</label>
				   <input style="width:120px"  type="text" name="id2" data-inputmask='"mask": "AA-9999"' data-mask autofocus ><br>
					 <input type="hidden" name="id" value="">
					 <input class="btn btn-info btn-lg" type="submit" value="Apply" >
				  </form>
				  
</center>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
				  <b>ENGING REPEAR</b><br>
         
				  <center><br><br>
		 <form method="POST" action="job_rep.php">
				  <input type="hidden" name="type" value="2">
			  <input type="hidden" name="mac_id" value="<?php echo $_SESSION['mac_id']; ?>">
					 <label>AAA-xxxx</label>
				   <input style="width:120px"  type="text" name="id1" data-inputmask='"mask": "AAA-9999"' data-mask autofocus ><br>
					  <label>AA-xxxx</label>
				   <input style="width:120px"  type="text" name="id2" data-inputmask='"mask": "AA-9999"' data-mask autofocus ><br>
					 <input type="hidden" name="id" value="">
					 <input class="btn btn-info btn-lg" type="submit" value="Apply" >
				  </form>
				  
</center>
				  
              </div>
              <!-- /.tab-pane -->
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>		
<?php
				$idd=$_GET['id'];
		$result = $db->prepare("SELECT * FROM job WHERE id = '$idd' and type='active' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
			$vehicle1=$row['vehicle_no'];
			$tech_time_chek1=$row['tech_time'];
			$id1 = $row['id'];
           $note1 = $row['note'];
			$job_type_id1 = $row['job_type'];
			$product_note1 = $row['product_note'];
			$km1 = $row['km'];
			$tech_note1 = $row['tech_note'];
			$ramp_chek1 = $row['ramp'];
		}		
		$result = $db->prepare("SELECT * FROM job_type WHERE id = '$job_type_id1' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
            $job_type1 = $row['name'];
			
		}		
	?>			
	<div class="col-md-4">
		
	<span class="badge bg-red"><h4>         
      <?php
echo $vehicle1."<br>";
		?></h4>      <?php echo $km1."<br>";	?>Km
			
			</span>
			<br>
	<span class="badge bg-green">         
      <?php
echo $job_type1;
		?></span>
				<br>
<span class="badge bg-">
		<?php
echo $note1;
?></span><br>
			
			</div>
				
				
				
	</div></div>
	
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
