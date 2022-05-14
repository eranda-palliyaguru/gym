<!DOCTYPE html>
<html>
<?php 
include("head.php");
include("connect.php");
?>
<body class="hold-transition skin-red sidebar-mini layout-top-nav">
<?php 
//include_once("auth.php");
//$r=$_SESSION['SESS_LAST_NAME'];

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
		
		<br>
		<a href="job.php" >
					  <button class="btn btn-info"><i class="glyphicon glyphicon-home"></i> Home</button></a>
		
		<br><br><br>
		<div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Accident JOB</h3>
            </div>
			<div class="box-body">
	<div class="row">
            <div class="col-md-6">
              <div class="form-group">
				  <div class="input-group">
				   <div class="input-group-addon">
					 <label>Product</label>  
                  </div>
					  <form method="post" action="sales_save_acc.php">
                <select class="form-control select2" name="name" id="p_type" style="width: 100%;" tabindex="1" autofocus onchange="view_payment_date(this.value);" >
			<option value=""></option>	
					<option value="shop"> Out of Shop </option>	 
		<?php  $invo = $_GET['id'];
         $result = $db->prepare("SELECT * FROM product ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){ ?>
		<option value="<?php echo $row['product_id'];?>"><?php echo $row['name']; ?> -<?php echo $row['code']; ?> - Rs<?php echo $row['sell']; ?>  </option>
	<?php	} ?>
                </select>
                  </div>
                  </div>
				</div>

				<div class="col-md-2" id="pro" style="display:none;" >
			  <div class="form-group" >    
                <div class="input-group date">
                  <div class="input-group-addon">
                    <label>Product</label>
                  </div>
                   <input type="text" class="form-control"  name="product" tabindex="2"  >				   
                </div>				
        </div>	
        </div>
				
			  <div class="col-md-2"  >
			  <div class="form-group">    
                <div class="input-group date">
                  <div class="input-group-addon">
                    <label>Qty</label>
                  </div>
                   <input type="number" class="form-control" name="qty" tabindex="2"  >				   
                </div>				
        </div>	
        </div>

			  <div class="col-md-2">
			  <div class="form-group">
                <div class="input-group date">
                <div class="input-group-addon">
                    <label>Type</label>
                  </div>
                   <select class="form-control select2" name="type" style="width: 100%;" tabindex="1" autofocus >
				 
		
		<option value="1">Replace</option>
					   <option value="2">Repair</option>
                </select>				   
                </div>				
        </div>		
        </div>
			  

			  <div class="col-md-2">
			  <div class="form-group">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <label>Price</label>
                  </div>
                   <input type="number" class="form-control" name="price" tabindex="2" >				   
                </div>				
        </div>		
        </div>
		<input type="hidden"  name="invoice" value="<?php echo $invo; ?>"  >
        <input class="btn btn-info" type="submit" value="Submit" >
         </form>     
		</div> 
              </div>
	
		
		<div class="box-body">
			 <table id="example2" class="table table-bordered table-hover">
			<tr>
                <th>Product Name</th>
				<th>QTY</th>
				<th>Dic (Rs.)</th>
                <th>Price (Rs.)</th>
				<th>Type</th>
				<th>#</th>
              </tr>
				 <?php $total=0;
                $result = $db->prepare("SELECT * FROM sales_list WHERE invoice_no = '$invo' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
				 <tr  >
				     <td><?php echo $row['name']; ?></td>
					 <td><?php echo $row['qty']; ?></td>
					 <td><?php echo $row['dic']; ?></td>
					 <td><?php echo $row['price']; ?></td>
					 <td><?php  $acc_type=$row['acc_type'];
						 if($acc_type==1){ echo "Replace";
										 } if($acc_type==2) {echo "Repair";
											  };
						 ?>

					 </td>
					 <td> <a href="sales_dll_acc.php?id=<?php echo $row['id']; ?>&invo=<?php echo $invo; ?>"  >
				  <button class="btn btn-danger"><i class="fa fa trash">X</i></button></a></td>
				 <?php  $total+=$row['price']; ?>
					 
				 </tr>
				 <?php
		}	?>
			 </table> 

			<h1>Rs <?php echo $total; ?>.00</h1>			</div>
		<form method="post" action="save_qt_acc.php">	
		<input type="hidden"  name="id" value="<?php echo $invo; ?>"  >
        <input class="btn btn-info" type="submit" value="Submit" >
         </form>
		
		
		</div></div>
		
    </section>
	  
	</center>
    <!-- /.content -->
  </div>
  
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
 function view_payment_date(type){
	if(type=='shop'){
	document.getElementById('pro').style.display='block';	
	
		} else  {
		document.getElementById('pro').style.display='none';	
		
			} 
	 } 
  </script>
</body>
</html>
