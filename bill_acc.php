<!DOCTYPE html>
<html>
<head>
	<?php
		  include("connect.php");
	
	$invo = $_GET['id'];
	$co = substr($invo,0,2) ;
			?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CLOUD ARM | Invoice</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body onload="window.print() " style=" font-size: 13px; font-family: arial;">
<?php
$sec = "1";
?><meta http-equiv="refresh" content="<?php echo $sec;?>;URL='index.php'">	
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
	  
	  
	  
	  
	  <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
            <img src="Ned C.jpg" width="150" alt=""><BR>
          NED ENTERPRISES
	  <h5>NO.349/12,Main Street, Negombo. <br>
	  Authorized Dealer For HONDA <br>
	  	  
		  <b>Invoice no.<?php echo $_GET['id']; ?> </b><br>
	<b>Tel: 031-2226886 </b><br><b>Mobile: 077-3213484 </b><br>	<b>Mobile: 076-9163030 </b><br>
		  Date:<?php date_default_timezone_set("Asia/Colombo"); 
    echo date("Y-m-d"); echo "  Time-";  echo date("h:ia")  ?>
			</h5>
	  
        </div>
        <!-- /.col -->
		  
		  
		  
		  
        <div class="col-xs-6">
          <small class="pull-right"><img src="honda.png" width="150" alt="">
        </div> <h5>
		  <?php 
		  if ($co>0){
		 $invo=$_GET['id'];	
				$result = $db->prepare("SELECT * FROM sales WHERE   invoice_number='$invo'");
				$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
					$mechanic_id=$row['mechanic'];
					$customer_id=$row['customer_id'];
				echo "<b>Vehicle No: </b>".$row['vehicle_no']."...";
					echo "<br>";
					echo "<b>Customer Name: </b>".$row['customer_name'].".....";
					echo "<br>";
					echo "<b>Model: </b>".$row['model'];
					echo "<br>";
					echo "<b>Note: </b>".$row['comment'];
					echo "<br>";	
				}
$result = $db->prepare("SELECT * FROM customer WHERE   customer_id='$customer_id'");
				$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
				echo "<b>contact no: </b>".$row['contact'];
					echo "<br>";	
				}
			  
			  } ?>
			</h5></small>
        <!-- /.col -->
		  <div class="col-xs-4">
          <h3>
		  <?php 
		echo "Quotations";
	 
			  
			  $invo=$_GET['id'];
					$tot_amount=0;
				$result = $db->prepare("SELECT sum(dic) FROM sales_list WHERE   invoice_no='$invo'");
					$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
				$dis_tot=$row['sum(dic)'];
				}
			  
			  
			  ?>
			  </h3>
      </div></div>
  
<div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				
				<th>Product</th>
                  <th>Qty</th>
                  <?php
					if($dis_tot>0){
					?>
					<th>Disc</th>
					<?php } ?>
                  <th>Cost </th>
					<th>Approve Type </th>
					<th>Approve Amount </th>
					
                </tr>
                </thead>
                <tbody>
				<?php
			date_default_timezone_set("Asia/Colombo");
		$hh=date("Y/m/d");
		$invo=$_GET['id'];
					$tot_amount=0;
				$result = $db->prepare("SELECT * FROM sales_list WHERE   invoice_no='$invo'");
					$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
			?>
                <tr>
				
                  <td><?php echo $row['name'];?></td>
				  <td><?php echo $row['qty'];?></td>
                  <?php
					if($dis_tot>0){
					?>
					<td><?php echo $row['dic'];?></td>
					<?php } ?>
                  <td>Rs.<?php echo $row['price'];?></td>
					<td></td>
					<td></td>
					<?php $tot_amount+= $row['price'];?>
                  <?php } ?>
                 </tr>
					<tr>
					<td></td><td>Total: </td>
						<?php
					if($dis_tot>0){
					?>
					<td>Rs.<?php echo $dis_tot;?></td>
					<?php } ?>
						
						<td>Rs.<?php echo $tot_amount;?></td>
					</tr>
                </tbody>
                <tfoot>
                </tfoot>
              </table>
	<?php
				$result1 = $db->prepare("SELECT * FROM sales WHERE   invoice_number='$invo'  ");		
					$result1->bindParam(':userid', $date);
                $result1->execute();
                for($i=0; $row1 = $result1->fetch(); $i++){
				//$tot_amount=$row1['amount'];
					$balance=$row1['balance'];
				}
			?>  
	<div class="col-xs-6">
         
       
        </div>
	
            </div><br><br><br><br>
	 <small class="pull-right"><img src="cloud.png" width="80" alt=""></small>
	
        </div>
	  __________________ <br> DEALER SIGNATURE
  </section>
</div>
</body>
</html>