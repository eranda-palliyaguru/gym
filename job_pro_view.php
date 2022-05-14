<table id="example2" class="table table-bordered table-hover ">
<?php  
include("connect.php");
$id=$_GET['id'];

	$id1=1;
	 $result = $db->prepare("SELECT * FROM job WHERE vehicle_no = '$id' and type='active' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
			
			$id1 = $row['id'];
         
		}
	
$result1 = $db->prepare("SELECT * FROM sales WHERE job_no='$id1' ");
		$result1->bindParam(':userid', $res);
		$result1->execute();
		for($i=0; $row = $result1->fetch(); $i++){   ?>
		
			<tr>
                <th >Product Name</th>
				<th >QTY</th>
              </tr>
			 
				 <?php $invopro="-45".$id;
			    $total=0;
                $result = $db->prepare("SELECT * FROM sales_list WHERE invoice_no = '$invopro' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row1 = $result->fetch(); $i++){
	?>
				 <tr>
				     <td><span class="badge bg-yellow"><?php echo $row1['name']; ?></span></td>
					 <td><?php echo $row1['qty']; ?></td>
				 </tr>
				 <?php
		}	?>
		<?php $invosales="-22".$id;
			    $total=0;
                $result = $db->prepare("SELECT * FROM sales_list WHERE invoice_no = '$invosales' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row1 = $result->fetch(); $i++){
	?>
				 <tr>
				     <td><span class="badge bg-green"><?php echo $row1['name']; ?></span></td>
					 <td><?php echo $row1['qty']; ?></td>
				 </tr>
				 <?php
		}	?>
	
				 <?php $invo=$row['invoice_number'];
			    $total=0;
                $result = $db->prepare("SELECT * FROM sales_list WHERE invoice_no = '$invo' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row1 = $result->fetch(); $i++){
	?>
				 <tr>
				     <td><span class="badge bg-green"><?php echo $row1['name']; ?></span></td>
					 <td><?php echo $row1['qty']; ?></td>
				 </tr>
				 <?php
		}	?>

	
	<?php $invopro1="-40".$id;
			    $total=0;
                $result = $db->prepare("SELECT * FROM sales_list WHERE invoice_no = '$invopro1' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row1 = $result->fetch(); $i++){
	?>
				 <tr>
				     <td><span class="badge bg-red"><?php echo $row1['name']; ?></span></td>
					 <td><?php echo $row1['qty']; ?></td>
				 </tr>
				 <?php
		}	?>
			 </table>
			<?php
		}	?>