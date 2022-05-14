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
<table id="example1" class="table table-bordered table-striped">
			  
                <thead>
                <tr>
                  <th>ID</th>
				  <th>name</th>
                  <th>code</th>
				  
                  <th>sell Price</th>
                  <th>Cost Price</th>
					<th>#</th>
                </tr>
				
                </thead>
<tbody>
<?php 
include("connect.php");

$inda=$_GET['q'];

$result = $db->prepare("select * from products where (`product_code` LIKE '%".$inda."%') OR (`product_name` LIKE '%".$inda."%') ORDER by id DESC limit 0,10 ");
$result->bindParam(':userid', $date);
                $result->execute();
 for($i=0; $row = $result->fetch(); $i++){
	$id=$row['id']; 
	 ?>
	   <tr>
				  <td><?php echo $row['id'];?></td>
				  <td><?php echo $row['product_name'];?></td>
                  <td><?php echo $row['product_code'];?></td>
					
                  
                  <td><?php echo $row['sell_price'];?></td>
				<td><?php echo $row['cost_price'];?></td>
                  
				  <td><a rel="facebox" href="product_edit.php?id=<?php echo $id;?>" class="btn btn-primary btn-xs"><b>Edit</b></a>
					
					<a href="product_dll.php?id=<?php echo $id;?>" class="btn btn-danger btn-xs"><b>DELETE</b></a>
					</td>
				   
                </tr>
	<?php	}	?>
</tbody>
 <tfoot>
                
				
				
				
				
				
				
                </tfoot>
              </table>               
          
