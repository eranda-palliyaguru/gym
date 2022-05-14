<?php
 date_default_timezone_set("Asia/Colombo");
 include("connect.php");

$id=$_GET['id'];
$vehicle=$_GET['v'];
$result = $db->prepare("SELECT * FROM sales_list WHERE id = '$id' ");
				$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
					$prise= $row['price'];
					$qty= $row['qty'];
					$dis= $row['dic'];
				}
?>

<div class="form-group">
	<div class="box-body">
       <form method="post" action="sales_save_pro.php">
		   
          <div class="col-md-10">
			  <div class="form-group">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <label>Price</label>
                  </div>
                   <input type="number" class="form-control" value="<?php echo $prise; ?>" name="price" tabindex="1" >				   
                </div>				
        </div>		
        </div>
				

			  <div class="col-md-8">
			  <div class="form-group">    
                <div class="input-group date">
                  <div class="input-group-addon">
                    <label>Qty</label>
                  </div>
                   <input type="number" class="form-control" value="<?php echo $qty; ?>" name="qty" tabindex="2" >				   
                </div>				
        </div>	
        </div>

			  <div class="col-md-8">
			  <div class="form-group">
                <div class="input-group date">
                <div class="input-group-addon">
                    <label>Dis</label>
                  </div>
                   <input type="number" class="form-control" value="<?php echo $dis; ?>" name="dis" tabindex="3" >				   
                </div>				
        </div>		
        </div>
			  

		<input type="hidden"  name="id" value="<?php echo $id; ?>"  >	  
		<input type="hidden"  name="vehicle" value="<?php echo $vehicle; ?>"  >
		   <div class="col-md-8">
       <input class="btn btn-info" type="submit" value="Submit" >
              </div></div>
 
			  </form>
              </div>

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

<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

   
    $("[data-mask]").inputmask();

  });
</script>