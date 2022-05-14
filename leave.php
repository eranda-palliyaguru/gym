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
		
		

		
		
<div class="row">		
<div class="col-lg-3 col-xs-6">
         <div class="small-box bg-blue">
            <div class="inner">
              <h3><?php 
				  $m_id=$_SESSION['mac_id'];
				  $user="mac";
				  if($m_id=="0"){ 
					  $m_id=$_SESSION['SESS_MEMBER_ID'];
					  $user="user";
				  }
                  $date1 =  date("Y-m-01");
				  $date2 =  date("Y-m-31");
		$result = $db->prepare("SELECT sum(leave_day) FROM mac_leave WHERE mac_id = '$m_id' and type_id='1' and action='approve' and user_type='$user' and date BETWEEN '$date1' and '$date2'");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
		echo 3-$row['sum(leave_day)'];	
			
		}
				  
				  ?></h3>
              <p>Sick Leave Balance - Month </p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
	
         <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?php 
				  //$m_id=$_SESSION['mac_id'];
                  $date1 =  date("Y-m-01");
				  $date2 =  date("Y-m-31");
			 $result = $db->prepare("SELECT sum(leave_day) FROM mac_leave WHERE mac_id = '$m_id' and type_id='2'  and user_type='$user' and action='approve' and date BETWEEN '$date1' and '$date2'");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
		echo 3-$row['sum(leave_day)'];	
			
		}
				  
				  ?></h3>
              <p>Casual Leave Balance - Month </p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
	
	
	<div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php 
                  $date1 =  date("Y-01-01");
				  $date2 =  date("Y-12-31");
			 $result = $db->prepare("SELECT sum(leave_day) FROM mac_leave WHERE mac_id = '$m_id' and user_type='$user' and type_id='3' and action='approve' and date BETWEEN '$date1' and '$date2'");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
		echo 5-$row['sum(leave_day)'];	
			
		}
				  
				  ?></h3>
              <p>Half Day Leave Balance - Year </p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
	
	
		
		</div>
		
	
		<div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Leave Form </h3>
            </div>
			<div class="box-body">
	
	
		       <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Sick Leave</a></li>
              <li><a href="#tab_2" data-toggle="tab">Casual Leave</a></li>
              <li><a href="#tab_3" data-toggle="tab">Half Day</a></li>
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <b>Sick Leave-ලෙඩ නිවාඩු</b><br>
		තව දුරටත් සේවයේ නිරතවිය නොහැකි මට්ටමේ අසනීප තත්වයක ඔබ පසුවන්නේ නම් මෙම ලෙඩ නිවාඩ සදහා අයදුම් කර හැක
				  <center><br><br>
				  
				 <form method="POST" action="leave_save.php">
				  <input type="hidden" name="type" value="Sick Leave">
				  <input type="hidden" name="type_id" value="1">
					 <input type="hidden" name="from" value="">
					 <input type="hidden" name="to" value="">
					 <input type="hidden" name="note" value="">
					 <input class="btn btn-info btn-lg" type="submit" value="Apply" >
				  </form>
				  
</center>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
				  <b>Casual Leave-හදිස්සි නිවාඩු</b><br>
         
				  <center><br><br>
				 <form method="POST" action="leave_save.php"> 
					  <strong>

From :<input type="text" style="width:223px; padding:4px;" name="from" id="datepicker" value="" autocomplete="off" / required> <br><br>
To:<input type="text" style="width:223px; padding:4px;" name="to" id="datepickerd"  value="" autocomplete="off"/ required>

 

 
</strong>  
 
				  <input type="hidden" name="type" value="Casual Leave">
				  <input type="hidden" name="type_id" value="2"><br><br>
					 
					 <label>Note</label>
		<textarea name="note" class="textarea" placeholder="note" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea><br><br>
					 <input class="btn btn-info btn-lg" type="submit" value="Apply" >
				  </form>
				  
</center>
				  
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
				  <b>Half Day Leave-අර්ධ දින නිවාඩු</b><br>
                මෙම නිවඩුව ලබගැනීමට අයදුම් කල හැක්කේ නිවාඩු ලබන දින පෙ.ව10.00 ට පෙර අයදුම් කලහොත් පමනි.
				  
				  			  <center><br><br>
				 <form method="POST" action="leave_save.php"> 
					  

Date<input type="text" style="width:223px; padding:4px;" name="from" id="datepickerc" value="" autocomplete="off" /> <br><br>


 


 <input type="hidden" name="to" value="">
				  <input type="hidden" name="type" value="Half Day">
				  <input type="hidden" name="type_id" value="3"><br><br>
					 
					 <label>Note</label>
		<textarea name="note" class="textarea" placeholder="note" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea><br><br>
					 <input class="btn btn-info btn-lg" type="submit" value="Apply" >
				  </form>
				  
</center>
				  
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>		

	</div></div>
	<div class="row">	
<?php  
 $result = $db->prepare("SELECT * FROM mac_leave WHERE mac_id = '$m_id' and user_type='$user' and date BETWEEN '$date1' and '$date2' ORDER by id DESC");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
			
		
		
		?>	
	<div class="col-md-2">
 <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title"><b><?php echo $row['type']; ?></b></h3><br>
<?php echo $row['date1']; ?> to <?php echo $row['date2']; ?> <br>
		<?php echo $row['time']; ?> <br><?php echo $row['note']; ?> 	
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
	 
	 <?php 
			$action=$row['action'];
	 if($action=="pending"){echo'<span class="badge bg-yellow">Pending</span>'; }
	 if($action=="approve"){echo'<span class="badge bg-green">Approve</span>'; }
	 if($action=="cancel"){echo'<span class="badge bg-red">Cancel</span>'; }
			
	 ?>
	 </div></div>
	<?php } ?>	
		
	</div>	
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
