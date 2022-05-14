
<table id="example1" class="table table-bordered table-striped " >
              
                <thead>
                <tr>
				<th>Code</th>
				<th>Product Name</th>
          
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
	echo "<tr class='record' >
<td align='center'>".$row['product_code']."</td>
<td align='center'>".$row['product_name']."</td>

<td><a href='sales_add.php?id=".$row['id']."&invo=".$_GET['invo']."'  >
				  <button class='btn btn-success'><i class='fa  fa-cart-arrow-down'></i></button></a> </td>
</tr>";
	}


echo "



";
?>
</tbody>
                
              </table>
