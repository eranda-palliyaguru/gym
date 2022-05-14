<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      
    })
  })
</script>
<?php 
 date_default_timezone_set("Asia/Colombo");
 include("connect.php");
$sales_id=1;
$resultj = $db->prepare("SELECT * FROM job WHERE type='active'  ORDER by id ASC ");
				$resultj->bindParam(':userid', $date);
                $resultj->execute();
                for($i=0; $rowj = $resultj->fetch(); $i++){
					$pro_invo="-45".$rowj['vehicle_no'];
		
		$id=$rowj['id'];						
		$reason=$rowj['reason'];
				$vehicle=$rowj['vehicle_no'];
					
					$result1 = $db->prepare("SELECT * FROM customer WHERE vehicle_no='$vehicle'");
				$result1->bindParam(':userid', $date);
                $result1->execute();
                for($i=0; $row1 = $result1->fetch(); $i++){
				$idi=$row1['customer_id'];	
					$name=$row1['customer_name'];
					$phone=$row1['contact'];
					$phone2=$row1['contact2'];
				}
					
					
		if($reason==""){
			}else{	
					
?>



	<div class="col-md-5">
 <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $vehicle; ?></h3><br>
				
<?php echo $name; ?><br>
		<?php echo $phone; ?> / <?php echo $phone2; ?><br>
				
				<span class="badge bg-green"> <?php echo $reason; ?> </span>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
         
<a href="cancel_job_appr.php?id=<?php echo $id; ?>" >
					  <button class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete</button></a>
	 </div></div>


<?php }   }	?>
<?php  
 $result = $db->prepare("SELECT * FROM mac_leave WHERE action = 'pending'  ORDER by id DESC");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
			
		
		
		?>	
	<div class="col-md-2">
 <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title"><b><?php echo $row['type']; ?></b><br><?php echo $row['mac_name']; ?></h3>
				
				<br>
<?php echo $row['date']; ?> -
		<?php echo $row['time']; ?> <br><?php echo $row['note']; ?> 	
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
			<b><?php echo $row['date1']; ?></b> to <b>  <?php echo $row['date2']; ?></b>	
            </div>
	<a href="leave_appr.php?id=<?php echo $row['id']; ?>&type=approve"> <span class="badge bg-green">Approve</span></a>
	 <div class="box-tools pull-right">
		<a href="leave_appr.php?id=<?php echo $row['id']; ?>&type=cancel"> <span class="badge bg-red">Cancel</span></a>
	 </div>
	 </div></div>
	<?php } ?>	


<?php  
 $result = $db->prepare("SELECT * FROM advance WHERE action = 'pending'  ORDER by id DESC");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
			
		
		
		?>	
	<div class="col-md-2">
 <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title"><b>Advance</b><br><?php echo $row['name']; ?></h3>
				
				<br>
<?php echo $row['date']; ?> -
		<?php echo $row['time']; ?><h3>Rs.<?php echo $row['amount']; ?> </h3> 	
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
	<a href="advance_appr.php?id=<?php echo $row['id']; ?>&type=approve"> <span class="badge bg-green">Approve</span></a>
	 <div class="box-tools pull-right">
		<a href="advance_appr.php?id=<?php echo $row['id']; ?>&type=cancel"> <span class="badge bg-red">Cancel</span></a>
	 </div>
	 </div></div>
	<?php } ?>	
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       0