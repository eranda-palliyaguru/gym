<!DOCTYPE html>
<html>
<?php 
include("head.php");
include("connect.php");
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
<?php 
include_once("auth.php");
$r=$_SESSION['SESS_LAST_NAME'];

if($r =='Cashier'){
include_once("sidebar2.php");
}
if($r =='admin'){
include_once("sidebar.php");
}
?>



<link rel="stylesheet" href="src/popup.css"
        type="text/css" media="all" />
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
        Product Form
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Product Form</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Product Edit</h3>
</div> <center>
          
			  <?php 
		  $type=$_GET['type'];
		  if($type==1){
		  
	     $result1 = $db->prepare("SELECT * FROM company  ORDER by id DESC ");
		$result1->bindParam(':userid', $res);
		$result1->execute();
		for($i=0; $row = $result1->fetch(); $i++){
			$c_id=$row['id'];
	  ?>
	  
	  <a href="product_hub.php?type=2&id=<?php echo $c_id; ?>">
	  <button style="background-color: white; color: black" ><?php echo $row['name']; ?> <br> <img src="<?php echo $row['img']; ?>" alt="" style="width: 300px"></button></a>


   <?php } } ?>
		  <?php
		  if($type==2){
		  $co_id=$_GET['id'];
	     $result1 = $db->prepare("SELECT * FROM model WHERE company_id='$co_id' ORDER by id DESC ");
		$result1->bindParam(':userid', $res);
		$result1->execute();
		for($i=0; $row = $result1->fetch(); $i++){
			$m_id=$row['id'];
	  ?>
	  
	  <a href="product_hub.php?type=3&id=<?php echo $m_id; ?>">
	  <button style="background-color: white; color: black" ><?php echo $row['name']; ?> <br> <img src="<?php echo $row['parth']; ?>" alt="" style="width: 200px"></button></a>



   <?php } } ?>
		  
		  
		  
		  <?php
		  if($type==3){
		  $co_id=$_GET['id'];
	     $result1 = $db->prepare("SELECT * FROM model_color WHERE model_id='$co_id' ORDER by id DESC ");
		$result1->bindParam(':userid', $res);
		$result1->execute();
		for($i=0; $row = $result1->fetch(); $i++){
			$col_id=$row['id'];
	  ?>
	  
	  <a href="product_hub.php?type=4&id=<?php echo $col_id; ?>">
	  <button style="background-color: white; color: black" ><?php echo $row['color']; ?> <br> <img src="<?php echo $row['img']; ?>" alt="" style="width: 200px"></button></a>



   <?php } } ?>
		  
		  
		   <?php
		  if($type==4){
		  $color_id=$_GET['id'];
	     $result1 = $db->prepare("SELECT * FROM diagram WHERE color_id='$color_id' ORDER by id DESC ");
		$result1->bindParam(':userid', $res);
		$result1->execute();
		for($i=0; $row = $result1->fetch(); $i++){
			$col_id=$row['id'];
	  ?>
	  
	  <a href="product_hub.php?type=5&id=<?php echo $col_id; ?>">
	  <button style="background-color: white; color: black" ><?php echo $row['name']; ?> <br> <img src="<?php echo $row['img']; ?>" alt="" style="width: 200px"></button></a>



		  
   <?php } } ?>
		  
	</center>
		  
	<?php
		  if($type==5){
		  $co_id=$_GET['id'];
	     $result1 = $db->prepare("SELECT * FROM diagram WHERE id='$co_id' ORDER by id DESC ");
		$result1->bindParam(':userid', $res);
		$result1->execute();
		for($i=0; $row = $result1->fetch(); $i++){
			$col_id=$row['id'];
	  ?>
	  <div class="row">
	  <div class="col-xs-9">
	  <button style="background-color: white; color: black" ><?php echo $row['name']; ?> <br> <img src="<?php echo $row['img']; ?>" alt="" style="width: 950px"></button>
<?php }  ?>
		</div>  <div class="col-xs-3">
 <table id="example1" class="table table-bordered table-striped">
			  
                <thead>
                <tr>
					<th>No.</th>
                  <th>Product Name</th>
				  <th >QTY</th>
                  
			
                </tr>
				
                </thead>
	                 <tbody>
				<?php

   $result = $db->prepare("SELECT * FROM product_hub WHERE  diagram_id = '$co_id'  ");
				$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
			
				
			?>
                <tr>
				  <td><span class="badge bg-red" ><?php echo $row['diagram_no'];?> </span></td>
				  <td><?php echo $row['name'];?></td>
				  <td><input style="width: 50px" type="text"></td>
                  
			
				  
                </tr>
               <?php }  ?>
                
                </tbody>
	 
	 
	 
	 

		  </table>
			  </div></div>
   <?php }  ?>
		  
		  
		  
		  
		
        
			
			
			
        </div>
        <!-- /.col (right) -->
      </div>
		
		
		
		
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
</script>
	
</body>
</html>
