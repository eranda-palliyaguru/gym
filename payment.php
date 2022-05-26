<!DOCTYPE html>
<html>
<?php 
include("head.php");
include("connect.php");
?>
<body class="hold-transition skin-blue sidebar-mini">
<?php 
include_once("auth.php");
$r=$_SESSION['SESS_LAST_NAME'];

if($r =='Cashier'){

header("location:./../../../index.php");
}
if($r =='admin'){

include_once("sidebar.php");
}
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
    <section class="content-header">
      <h1>
        Payment
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Advanced Elements</li>
      </ol>
    </section>
   <?php if($_GET['id']==""){ ?>
   
   <br><br><br><br>	
    <section class="content"> <div class="col-lg-3 "></div> <div class="col-lg-6 ">
     <form action="payment.php" method="get">   

	     <div class="box">
            <div class="box-header">
              <h3 class="box-title">Set Member</h3>
            </div>
            <!-- /.box-header -->
			
            <div class="box-body">
	    
<div class="row">
   
    <div class="col-lg-6 ">
  <select class="form-control select2" name="id" style="width: 255px;" id="select2" required >
			   <?php 		 $result = $db->prepare("SELECT * FROM customer");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
			
	?>
		<option value="<?php echo $row['customer_id'];?>"><?php echo $row['customer_name']; ?></option>
	<?php
				}
			?>
		</select>
		</div>
		
		
		
		<div class="col-xs-2">
				<button class="btn btn-info form-control" style="width: 123px; height:35px; margin-top:-8px;margin-left:8px;" type="submit">
 <i class="icon icon-search icon-large"></i> Search
 </button>
  </div>
</div>
			  
        </div>
</div>  
			 
			
			 </form></div>  
			 </section>
  <?php }else{ ?>
  
  
  
  
   <section class="content">
   
     <div class="box">
            <div class="box-header">
              <h2 class="box-title"><?php   $id=$_GET['id'];
        $result = $db->prepare("SELECT * FROM customer WHERE customer_id='$id'");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
		
		    echo "<b>Name: </b>".$row['customer_name']."<br>";
		    echo "<h5><b>Contact: </b>".$row['contact']."</h5>";
		    $cat_id=$row['membership'];
		}
	?></h2>
            </div>
            <!-- /.box-header -->
			
            <div class="box-body"> <center>
<?php   $result = $db->prepare("SELECT * FROM cat WHERE id='$cat_id'");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
		
		    echo "<h3><b>".$row['name']."</b></h3>";
		    echo "<h3><b></b>Rs.".$row['amount']."/-</h3>";
		    
		}
	?>
 <a href="save_payment.php?id=<?php echo $id;  ?>" >	<button class="btn btn-danger form-control" style="width: 123px; height:35px; margin-top:-8px;margin-left:8px;"> Pay
 </button></a> </center>
                
              <table id="example1" class="table table-bordered table-striped">
			  
                <thead>
                <tr>
                  <th>Invoice no</th>
                  <th>Date</th>
                  <th>Customer Name</th>
				  <th>Type</th>
				  <th>Amount</th>
				  <th>Pay Month</th>
                </tr>
				
                </thead>
				
                <tbody>
				<?php
                $result = $db->prepare("SELECT * FROM payment WHERE  cus_id= '$id' ");
				$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
			?>
                <tr>
				  <td><?php echo $row['transaction_id'];?></td>
				  <td><?php echo $row['date'];?></td>
				  <td><?php echo $row['cus_name'];?></td>
				  <td><?php echo $row['type'];?></td>
                  <td><?php echo $row['amount'];?></td>
				  <td><?php echo $row['pay_month'];?></td>
				  </tr>
				<?php 
				}
				?>
                </tbody>
                <tfoot>
                </tfoot>
              </table>
			</div>
				
            <!-- /.box-body -->
          </div>
	   
          <!-- /.box -->
        </div>
        <!-- /.col -->
      
   
   
   

    <!-- Main content -->
    
      <!-- /.row -->

    </section>
   <?php } ?> 
    
    <!-- /.content -->
   </div>
  <!-- /.content-wrapper -->
<?php
  include("dounbr.php");
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
<!-- page script -->
<script>
  $(function () {

    $(".select2").select2();


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
		
</script>
</body>
</html>
