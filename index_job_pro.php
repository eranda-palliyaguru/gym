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
					
		$sales_id=1;			
		$resultm = $db->prepare("SELECT * FROM sales_list WHERE invoice_no = '$pro_invo' ");
		$resultm->bindParam(':userid', $pro_invo);
		$resultm->execute();
		for($i=0; $rowm = $resultm->fetch(); $i++){
		$sales_id = $rowm['id'];	
		}
		
				$vehicle=$rowj['vehicle_no'];
					$idi=0;
					$result1 = $db->prepare("SELECT * FROM customer WHERE vehicle_no='$vehicle'");
				$result1->bindParam(':userid', $date);
                $result1->execute();
                for($i=0; $row1 = $result1->fetch(); $i++){
				$idi=$row1['customer_id'];	
					$name=$row1['customer_name'];
					$phone=$row1['contact'];
					$phone2=$row1['contact2'];
				}
					
					
		if($sales_id==1){
			}else{	
					
?>



	<div class="col-md-6">
 <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $vehicle; ?></h3><br>
<?php echo $name; ?><br>
		<?php echo $phone; ?> / <?php echo $phone2; ?>		
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
           
<div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
					  <th >Product Name.</th>
					  <th >Price.</th>
                    <th >QTY.</th>
                  <th >Amount.</th>
					  <th ></th>
                  
                  </tr>
                  </thead>
                  <tbody>
					  <?php 
			$tot=0;
			$amount=0;
			$result = $db->prepare("SELECT * FROM sales_list WHERE invoice_no = '$pro_invo' ");
				$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
					  ?>
                  <tr>
					  <td><?php echo $row['name'];?></td>
					  <td>Rs.<?php echo $row['price'];?></td>
                    <td><?php echo $row['qty'];?></td>
                    <td>Rs.<?php echo $amount=$row['price']*$row['qty'];?></td>
        <td><a rel="facebox" href="lord_ramp_sales.php?id=<?php echo $row['id']; ?>&v=<?php echo $vehicle; ?>" >
					  <button class="btn btn-success"><i class="glyphicon glyphicon-ok"></i></button></a>
					  <a href="sales_skip_pro.php?id=<?php echo $row['id']; ?>&v=<?php echo $vehicle; ?>" >
					  <button class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button></a></td>
					
                  </tr>

                  <?php
				$tot+=$amount;
				} ?>
                  </tbody>
					
                </table>
				 <h3>Total Rs.<?php echo $tot;	?></h3> 
              </div>
              
				
            </div>
	 </div></div>


<?php }   }	?>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       0