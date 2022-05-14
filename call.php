<!DOCTYPE html>
<html>
<?php 

include("head.php");
include("connect.php");
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
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

        Month END

        <small>Preview</small>

      </h1>

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">PRODUCT</li>
      </ol>
    </section>

   

   


   

   

   

   <section class="content">

   

     <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Calls</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">


				
		<?php 
		include($cone);
	     $result1 = $db->prepare("SELECT * FROM sales WHERE call_id ='0' and action = 'active' and  customer_id > 1 ");
		$result1->bindParam(':userid', $res);
		$result1->execute();
		for($i=0; $row = $result1->fetch(); $i++){
			$invo=$row['invoice_number'];
			$g=$row['customer_id'];
			$date=$row['date'];
	  ?>
	  
	  <a  id="<?php echo $row['transaction_id']; ?>" class="btn btn-primary btn-xs n" href="#">
	  <?php echo $row['vehicle_no']; ?></a><br><br>

<!-- The Modal -->

<div id="n<?php echo $row['transaction_id']; ?>" class="modal">
	<?php
	
                $result = $db->prepare("SELECT * FROM customer WHERE customer_id='$g' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
		
		$name=$row['customer_name'];
		$vehicle_no=$row['vehicle_no'];
			$color=$row['color'];
			
			
			
			$contact=$row['contact'];
			$gend=$row['gend'];
			
			
		
		}
	  
	?>	
  <!-- Modal content -->
  <div id="tag" class="modal-content">
    <div class="modal-header">
      <span class="close"> &times;</span>
      <h2><?php echo $name;?><br>
		  <?php echo $contact;?>
		</h2>
		<?php echo $vehicle_no;?><br>
		<?php echo $date;?>
		
		
    </div>
    <div class="modal-body">
        <div class="row">
			 <div class="col-lg-3 col-xs-10"> 
				 <table  class="table table-bordered table-hover">
			<tr>
                <th>Product Name</th>
				<th>QTY</th>
				
                <th>Price (Rs.)</th>
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
					 <td><?php echo $row['price']; ?></td>
				 <?php  $total+=$row['price']; ?>
				 
				 <?php
		}	?>
					 </tr>
					 <tr style="color: red" >
				     <td>Total</td>
					 <td></td>
					 <td><?php echo $total; ?></td>
				
				 </tr>
			 </table>
				 </div>
			<div class="col-lg-3 col-xs-5"> 
        <form method="POST" action="save_call.php">
			<input type="hidden" name="vehicel" value="<?php echo $vehicle_no; ?>">
			<input type="hidden" name="invo" value="<?php echo $invo; ?>"> 
			<input type="hidden" name="name" value="<?php echo $name; ?>">
			<input type="hidden" name="id" value="<?php echo $g; ?>">
			<input type="hidden" name="conect" value="<?php echo $cone; ?>">
			<input type="hidden" name="type" value="feed"> 
				<div class="form-group">
					<h3>
				<div class="radio">
                    <label>
                      <input type="radio" name="no" id="optionsRadios1" value="0" checked>
                      No Mark <i class="fa fa-ban"></i>
                    </label>
                  </div>
						
						
						
                  <div class="radio">
                    <label>
                      <input type="radio" name="no" id="optionsRadios1" value="1" checked>
                      1 <i class="fa fa-frown-o"></i>
                    </label>
                  </div>
						<div class="radio">
                    <label>
                      <input type="radio" name="no" id="optionsRadios2" value="2" checked>
                      2 <i class="fa fa-meh-o"></i>
                    </label>
                  </div>
						<div class="radio">
                    <label>
                      <input type="radio" name="no" id="optionsRadios3" value="3" checked>
                      3 <i class="fa fa-meh-o"></i>
                    </label>
                  </div>
						<div class="radio">
                    <label>
                      <input type="radio" name="no" id="optionsRadios4" value="4" checked>
                      4 <i class="fa fa-smile-o"></i>
                    </label>
                  </div>
						<div class="radio">
                    <label>
                      <input type="radio" name="no" id="optionsRadios5" value="5" checked>
                      5 <i class="fa fa-smile-o"></i>
                    </label>
                  </div>
                 
                  
                </h3></div>
			
			</div>
			<div class="col-lg-3 col-xs-12">
                    <label>Note</label>
                  
                   <textarea name="note" class="textarea" placeholder="Message" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>				   
               </div>
				
    </div>
		 <div class="modal-footer">
     <input class="btn btn-info" type="submit" value="Save" >
				</form>
    
			   
                  
			 
		
			 </div>
  </div>
</div>
	</div>
	<?php } ?> 
	<?php 
			$date=date("Y-m-d");
	     $result1 = $db->prepare("SELECT * FROM call_center WHERE date ='$date'  ");
		$result1->bindParam(':userid', $res);
		$result1->execute();
		for($i=0; $row = $result1->fetch(); $i++){
		
	  ?>			
		
		<a   class="btn btn-warning btn-xs" href="#">
	  <?php echo $row['vehicle_no']; ?></a>		
				
				<?php } ?>		
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

      

   

   

   



    <!-- Main content -->

    


      <!-- /.row -->



    </section>

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

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- page script -->
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
	
	
	$('#datepicker').datepicker({  autoclose: true, datepicker: true,  format: 'yyyy-mm-dd'});
    $('#datepicker').datepicker({ autoclose: true });
	
	
	
	$('#datepickerd').datepicker({  autoclose: true, datepicker: true,  format: 'yyyy-mm-dd'});
    $('#datepickerd').datepicker({ autoclose: true  });
	
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
</script>

</body>
</html>