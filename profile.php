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




    <link rel="stylesheet" href="datepicker.css" type="text/css" media="all" />
    <script src="datepicker.js" type="text/javascript"></script>
    <script src="datepicker.ui.min.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(function() {
        $("#datepicker1").datepicker({
            dateFormat: 'yy/mm/dd'
        });
        $("#datepicker2").datepicker({
            dateFormat: 'yy/mm/dd'
        });

    });
    </script>




    <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Profile
                <small>Preview</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

                <li class="active">Profile</li>
            </ol>
        </section>



        <?php
	$g = $_GET['id'];
                $result = $db->prepare("SELECT * FROM customer WHERE customer_id='$g' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
		
		$name=$row['customer_name'];
			$join=$row['join_date'];
			$birthday=$row['birthday'];
			$gend=$row['gend'];	
      $ex=$row['v_date'];	
		
		}
	  
	?>
        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-3">

                    <!-- SELECT2 EXAMPLE -->

                    <!-- /.box about me -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">About Me</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <?php
	$g = $_GET['id'];
                $result = $db->prepare("SELECT * FROM customer WHERE customer_id='$g' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){	
$type_id=$row['membership'];
            $resul = $db->prepare("SELECT * FROM cat WHERE id='$type_id' ");
            $resul->bindParam(':userid', $res);
            $resul->execute();
            for($i=0; $row1 = $resul->fetch(); $i++){ $type=$row1['name']; }
	?>



                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Name:</b> <i><?php echo $gend.$name=$row['customer_name'];?></i>
                                </li>
                                <li class="list-group-item">
                                    <b>Address:</b> <i><?php echo $address=$row['address'];?></i>
                                </li>
                                <li class="list-group-item">
                                    <b>Contact:</b> <i><?php echo $contact=$row['contact'];?></i>
                                </li>
                                <li class="list-group-item">
                                    <b>Birthday:</b> <i><?php echo $birthday;?></i>
                                </li>
                                <li class="list-group-item">
                                    <b>Join Date:</b> <i><?php echo $row['join_date'];?></i>
                                </li>
                                <li class="list-group-item">
                                    <b>Expire Date:</b> <i><?php echo $row['v_date'];?></i>
                                </li>
                                <li class="list-group-item">
                                    <b>Membership:</b> <i><?php echo $type;?></i>
                                </li>
                                <li class="list-group-item">
                                    <b>Finger:</b> <i>
                                        <?php   
                $result1 = $db->prepare("SELECT * FROM finger WHERE user_id='$g' AND action='1' ");
				$result1->bindParam(':userid', $date);
                $result1->execute();
                for($i=0; $row1 = $result1->fetch(); $i++){  $finger=$row1['id'];?><a
                                            class="btn btn-info btn-md delbutton" href="#"><i
                                                class="fa fa-500px"></i></a> <?php if($user_level==1){ ?>
                                                <a onclick="return confirm('Are you sure about this delete ?')"  href="finger_dll.php?id=<?php echo $row1['id'];?>&from=profile&u_id=<?php echo $_GET['id'];?>" >
					  <button class="btn btn-danger"><i   class="glyphicon glyphicon-trash"></i></button></a>
                                        <?php } } ?></td>
                                        <td></td>
                                        <?php if(!$finger){ ?>
                                        <a href="finger_add.php?id=<?php echo $row['customer_id'];?>">
                                            <button class="btn btn-danger">ADD Finger</button></a> 
                                        <?php } ?>
                                    </i>
                                </li>
                                <?php } ?>

                            </ul>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.col (left) -->


                <div class="col-md-9">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#activity" data-toggle="tab">About</a></li>

                            <li><a href="#settings" data-toggle="tab">Settings</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <!-- Post -->



                                <?php
	
       $result1 = $db->prepare("SELECT * FROM payment WHERE cus_id='$g' ORDER by transaction_id DESC ");
		$result1->bindParam(':userid', $res);
		$result1->execute();
		for($i=0; $row = $result1->fetch(); $i++){
	?>
                                <ul class="timeline timeline-inverse">
                                    <!-- timeline time label -->
                                    <li class="time-label">
                                        <span class="bg-blue">
                                            <?php echo $row['date'];?>
                                        </span>
                                    </li>
                                    <li>
                                        <i class="fa fa-check bg-green"></i>
                                        </i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i>
                                                <?php echo $row['date'];?></span>
                                            <h3 class="timeline-header"><a href="#">Invoice no:</a>
                                                <?php echo $row['transaction_id'];?></h3>
                                            <div class="timeline-body">
                                                <a class="btn btn-warning btn-xs"><?php echo $row['date']; ?></a> to
                                                <a
                                                    class="btn btn-success btn-xs"><?php echo $row['pay_month']; ?></a><br>

                                            </div>
                                            <div class="timeline-footer">
                                                <a class="btn btn-info btn-xs"><?php echo $row['type']; ?>
                                                    Rs.<?php echo $row['amount']; ?></a>
                                            </div>
                                        </div>
                                    </li>

                                    <?php }		?>

                                </ul>



                                <!-- /.post -->
                            </div>
                            <!-- /.tab-pane -->

                            <!-- /.tab-pane -->

                            <?php if($user_level==1){ ?>

                            <div class="tab-pane" id="settings">
                                <form method="post" action="profile_save.php" class="form-horizontal">
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name"
                                                value="<?php echo $name; ?>" id="inputName">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Contact</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="contact"
                                                value="<?php echo $contact; ?>" id="inputName"
                                                data-inputmask='"mask": "(999)-9999999"' data-mask>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Address</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="address"
                                                value="<?php echo $address; ?>" id="inputName" placeholder="Address">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Join Date</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="join"
                                                value="<?php echo $join; ?>" id="inputName" placeholder="Join Date">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Expire Date</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="v_date"
                                                value="<?php echo $ex; ?>" id="inputName" placeholder="Expire Date">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Membership</label>

                                        <div class="col-sm-10">
                                            <select type="text" class="form-control" name="type"  value="<?php echo $ex; ?>" id="inputName" placeholder="type">
                                            <option value="<?php echo $type_id; ?>"><?php echo $type; ?></option>
                                            <?php 
                                            $result1 = $db->prepare("SELECT * FROM cat ");
                                            $result1->bindParam(':userid', $res);
                                            $result1->execute();
                                            for($i=0; $row = $result1->fetch(); $i++){
                                                echo "<option value='".$row['id']."' >".$row['name']."</option>";                                  
                                            }
                                            ?>
                                            </select>
                                        </div>
                                    </div>



                                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> I agree to <a href="#">Submit</a>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>
                                </form>
                                <?php } ?>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.box-body -->


                <!-- /.box -->

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
    $(function() {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("YYYY/MM/DD", {
            "placeholder": "YYYY/MM/DD"
        });
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("YYYY/MM/DD", {
            "placeholder": "YYYY/MM/DD"
        });
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            format: 'YYYY/MM/DD h:mm A'
        });
        //Date range as a button
        $('#daterange-btn').daterangepicker({
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function(start, end) {
                $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                    'MMMM D, YYYY'));
            }
        );

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true,
            datepicker: true,
            format: 'yyyy/mm/dd '
        });
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
</body>

</html>