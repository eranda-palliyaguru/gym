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
if($r =='mechanic'){
header("location: job.php");
}
if($r =='pay'){
header("location: tech_month_pay.php");
}

if($r =='promo'){
header("location: promo.php");
}
	
if($r =='tech'){
header("location: tech.php");
}
if($r =='admin'){
include_once("sidebar.php");
}



?>





    <!-- /.sidebar -->

    </aside>



    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">

        <!-- Content Header (Page header) -->

        <section class="content-header">

            <h1>
                Home
                <small>Preview</small>
            </h1>
        </section>
        <!-- Main content -->
        <section class="content">
            <?php

		include('connect.php');
 date_default_timezone_set("Asia/Colombo");
 $cash=$_SESSION['SESS_FIRST_NAME'];
                  $date =  date("Y-m-d");					

			

				
				  $profit=0;

				

				







$result = $db->prepare("SELECT sum(amount) FROM payment WHERE    date='$date'  ");
					$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){

				  

				  $amount=$row['sum(amount)'];

				}		
				



		$month1=date("Y-m-01");
		$month2=date("Y-m-31");		
		date_default_timezone_set("Asia/Colombo");
		$date=date("Y-m-d");
			?>
            <div class="row">
                <?php     $r=$_SESSION['SESS_LAST_NAME'];
if($r =='Cashier'){}else{
	?>
                <div class="col-lg-3 col-xs-6">

                    <!-- small box -->

                    <div class="small-box bg-aqua">

                        <div class="inner">

                            <h3>Rs.<?php echo $amount; ?></h3>



                            <p>Total Sales</p>

                        </div>

                        <div class="icon">

                            <i class="ion ion-pie-graph"></i>

                        </div>

                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

                    </div>

                </div>

                <!-- ./col -->

                <div class="col-lg-3 col-xs-6">

                    <!-- small box -->

                    <div class="small-box bg-green">

                        <div class="inner">

                            <h3>Rs.<?php // echo $ex; ?></sup></h3>



                            <p>Expenses Total </p>

                        </div>

                        <div class="icon">

                            <i class="ion ion-stats-bars"></i>

                        </div>

                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

                    </div>

                </div>

                <!-- ./col -->

                <div class="col-lg-3 col-xs-6">

                    <!-- small box -->

                    <div class="small-box bg-yellow">

                        <div class="inner">

                            <h3><?php 
                            $result = $db->prepare("SELECT * FROM device  LIMIT 1");
                            $result->bindParam(':userid', $res);
                            $result->execute();
                            for($i=0; $row = $result->fetch(); $i++){
                                $device_time=$row['time'];
                                $time=date('ymdHis');
                                $diff=$time-$device_time;
                                if($diff > 20){ echo "<a>Offline</a>";}else{ echo "Online";}
                            }
                            ?></h3>



                            <p>Fingerprint Device</p>

                        </div>

                        <div class="icon">

                            <i class="ion ion-tablet"></i>

                        </div>

                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

                    </div>

                </div>

                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3><?php echo $visit_count; ?></h3>



                            <p>Total Visitors</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-hammer"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->

            </div>

            <?php 

}

 ?>
            <div class="row">


                <section class="col-lg-7 connectedSortable">

                    <div class="box box-info">
                        <div class="box-header">
                            <i class="fa fa-tablet"></i>
                            <h3 class="box-title">Fingerprint Device </h3>
                            <div class="pull-right box-tools">
                            <?php if($diff > 20){?><small   class="label bg-red">Offline</small>
                                 <?php }else{ ?><small   class="label bg-green">Online</small> <?php } ?>    
                    <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                                    <i class="fa fa-times"></i></button>
                            </div>

                        </div>

                        <?php 
                        $result = $db->prepare("SELECT * FROM device  LIMIT 1");
                        $result->bindParam(':userid', $res);
                        $result->execute();
                        for($i=0; $row = $result->fetch(); $i++){
                            $d_id=$row['device_id'];
                            $version=$row['version'];
                            $memory=$row['memory'];
                            $note=$row['comment'];
                        }
                        if($diff > 20){ $note="can't access in devices";}else{ }
                        ?>
                        <h1>Device ID:<?php echo $d_id; ?></h1>
                        <h3>Connection:<small  class="label bg-blue">WiFi</small></h3>
                        <h3>Memory:<small  class="label bg-yellow"><?php echo $memory; ?>/5000</small></h3>
                        <h3>Note:<small  class="label bg-red"><?php echo $note; ?></small></h3>

                        <h4 class="pull-right">Version:<?php echo $version; ?></h4>
                        <button type="button" class="btn  btn-block btn-success ">  <i class="glyphicon glyphicon-lock"></i> <br> Door Unlock</button>

                        <div class="box-footer clearfix">
                            <button type="button" class="pull-right btn btn-default" id="sendEmail">Send
                                <i class="fa fa-arrow-circle-right"></i></button>
                        </div>
                    </div>



                </section>




                <section class="col-lg-5 connectedSortable">



                    <div class="box box-info">
                        <div class="box-header">
                            <i class="fa fa-500px"></i>
                            <h3 class="box-title">Attendance</h3>

                            <div class="pull-right box-tools">
                                <button type="button" class="btn btn-info btn-sm" data-widget="remove"
                                    data-toggle="tooltip" title="Remove">
                                    <i class="fa fa-times"></i></button>
                            </div>

                        </div>
                        <div class="box-body">

                            <div class="box-body">
                                <ul class="products-list product-list-in-box">

                                    <?php $today=date('Y-m-d');
        $result = $db->prepare("SELECT * FROM attends WHERE date='$today'");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
		$type=$row['membership'];
    ?>


                                    <li class="item">
                                        <div class="product-img">
                                            <img src="pic/ned.jpg" alt="Product Image">
                                        </div>
                                        <div class="product-info">
                                            <a class="product-title"><?php echo $row['user_name']; ?>

                                                <?php   $result1 = $db->prepare("SELECT * FROM cat WHERE id='$type'");
		$result1->bindParam(':userid', $res);
		$result1->execute();
		for($i=0; $row1 = $result1->fetch(); $i++){ ?>
                                                <span
                                                    class="label label-<?php echo $row1['color']; ?> pull-right"><?php echo $row1['name']; ?></span>
                                                <?php } ?>
                                            </a>
                                            <span class="product-description">
                                                <?php echo $row['date']."___".$row['time']; ?>
                                            </span>
                                        </div>
                                    </li>


                                    <?php } ?>
                                </ul>
                            </div>
                </section>
            </div>


            <!-- SELECT2 EXAMPLE -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo date("Y")-1 ?> to <?php echo date("Y") ?> Sales Chart</h3>
                    <div class="chart">
                        <canvas id="lineChart" style="height:250px"></canvas>
                    </div>
                    <!-- Main content -->
                </div>
            </div>




















        </section>


    </div>

    <!-- /.content-wrapper -->

    <?php

  include("dounbr.php");

?>

    <!-- /.control-sidebar -->

    <!-- Add the sidebar's background. This div must be placed

       immediately after the control sidebar -->

    <div class="control-sidebar-bg"></div>



    <!-- ./wrapper -->



    <!-- jQuery 2.2.3 -->

    <script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>

    <!-- Bootstrap 3.3.6 -->

    <script src="../../bootstrap/js/bootstrap.min.js"></script>

    <!-- ChartJS 1.0.1 -->

    <script src="../../plugins/chartjs/Chart.min.js"></script>

    <!-- FastClick -->

    <script src="../../plugins/fastclick/fastclick.js"></script>

    <!-- AdminLTE App -->

    <script src="../../dist/js/app.min.js"></script>

    <!-- AdminLTE for demo purposes -->

    <script src="../../dist/js/demo.js"></script>







    <?php

 include("chart.php");

?>




    <?php 
	           
	
	?>
    <!-- page script -->

    <script>
    $(function() {

        /* ChartJS

         * -------

         * Here we will create a few charts using ChartJS

         */



        //--------------

        //- AREA CHART -

        //--------------


        var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
        var pieChart = new Chart(pieChartCanvas);

        var pieOptions = {
            //Boolean - Whether we should show a stroke on each segment
            segmentShowStroke: true,
            //String - The colour of each segment stroke
            segmentStrokeColor: "#fff",
            //Number - The width of each segment stroke
            segmentStrokeWidth: 2,
            //Number - The percentage of the chart that we cut out of the middle
            percentageInnerCutout: 50, // This is 0 for Pie charts
            //Number - Amount of animation steps
            animationSteps: 100,
            //String - Animation easing effect
            animationEasing: "easeOutBounce",
            //Boolean - Whether we animate the rotation of the Doughnut
            animateRotate: true,
            //Boolean - Whether we animate scaling the Doughnut from the centre
            animateScale: false,
            //Boolean - whether to make the chart responsive to window resizing
            responsive: true,
            // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio: true,
            //String - A legend template
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
        };
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        pieChart.Doughnut(PieData, pieOptions);
        // Get context with jQuery - using jQuery's .get() method.
        var areaChartCanvas = $("#lineChart").get(0).getContext("2d");
        // This will get the first returned node in the jQuery collection.
        var areaChart = new Chart(areaChartCanvas);
        var areaChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September",
                "October", "November", "December"
            ],
            datasets: [{
                    label: <?php echo date("Y")-1 ?> + " SALES ",
                    fillColor: "rgba(210, 214, 222, 1)",
                    strokeColor: "rgba(210, 214, 222, 1)",
                    pointColor: "rgba(210, 214, 222, 1)",
                    pointStrokeColor: "#c1c7d1",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [<?php  echo $m1t; ?>, <?php  echo $m2t; ?>, <?php  echo $m3t; ?>,
                        <?php  echo $m4t; ?>, <?php  echo $m5t; ?>, <?php  echo $m6t; ?>,
                        <?php  echo $m7t; ?>, <?php  echo $m8t; ?>, <?php  echo $m9t; ?>,
                        <?php  echo $m10t; ?>, <?php  echo $m11t; ?>, <?php  echo $m12t; ?>
                    ]
                },
                {
                    label: <?php echo date("Y") ?> + " SALES ",
                    fillColor: "rgba(60,141,188,0.9)",
                    strokeColor: "rgba(60,141,188,0.8)",
                    pointColor: "#3b8bba",
                    pointStrokeColor: "rgba(60,141,188,1)",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(60,141,188,1)",
                    data: [<?php  echo $m1; ?>, <?php  echo $m2; ?>, <?php  echo $m3; ?>,
                        <?php  echo $m4; ?>, <?php  echo $m5; ?>, <?php  echo $m6; ?>,
                        <?php  echo $m7; ?>, <?php  echo $m8; ?>, <?php  echo $m9; ?>,
                        <?php  echo $m10; ?>, <?php  echo $m11; ?>, <?php  echo $m12; ?>
                    ]
                }
            ]
        };
        var areaChartOptions = {
            //Boolean - If we should show the scale at all
            showScale: true,
            //Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines: false,
            //String - Colour of the grid lines
            scaleGridLineColor: "rgba(0,0,0,.05)",
            //Number - Width of the grid lines
            scaleGridLineWidth: 1,
            //Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            //Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines: true,
            //Boolean - Whether the line is curved between points
            bezierCurve: true,
            //Number - Tension of the bezier curve between points
            bezierCurveTension: 0.3,
            //Boolean - Whether to show a dot for each point
            pointDot: false,
            //Number - Radius of each point dot in pixels
            pointDotRadius: 4,
            //Number - Pixel width of point dot stroke
            pointDotStrokeWidth: 1,
            //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
            pointHitDetectionRadius: 20,
            //Boolean - Whether to show a stroke for datasets
            datasetStroke: true,
            //Number - Pixel width of dataset stroke
            datasetStrokeWidth: 2,
            //Boolean - Whether to fill the dataset with a color
            datasetFill: true,

            //String - A legend template

            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",

            //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container

            maintainAspectRatio: true,

            //Boolean - whether to make the chart responsive to window resizing

            responsive: true

        };



        //Create the line chart

        areaChart.Line(areaChartData, areaChartOptions);



        //-------------

        //- LINE CHART -

        //--------------

        var lineChartCanvas = $("#lineChart").get(0).getContext("2d");

        var lineChart = new Chart(lineChartCanvas);

        var lineChartOptions = areaChartOptions;

        lineChartOptions.datasetFill = false;

        lineChart.Line(areaChartData, lineChartOptions);



        //-------------

        //- PIE CHART -

        //-------------





        //-------------

        //- BAR CHART -

        //-------------

        var barChartCanvas = $("#barChart").get(0).getContext("2d");

        var barChart = new Chart(barChartCanvas);

        var barChartData = areaChartData;

        barChartData.datasets[1].fillColor = "#00a65a";

        barChartData.datasets[1].strokeColor = "#00a65a";

        barChartData.datasets[1].pointColor = "#00a65a";

        var barChartOptions = {

            //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value

            scaleBeginAtZero: true,

            //Boolean - Whether grid lines are shown across the chart

            scaleShowGridLines: true,

            //String - Colour of the grid lines

            scaleGridLineColor: "rgba(0,0,0,.05)",

            //Number - Width of the grid lines

            scaleGridLineWidth: 1,

            //Boolean - Whether to show horizontal lines (except X axis)

            scaleShowHorizontalLines: true,

            //Boolean - Whether to show vertical lines (except Y axis)

            scaleShowVerticalLines: true,

            //Boolean - If there is a stroke on each bar

            barShowStroke: true,

            //Number - Pixel width of the bar stroke

            barStrokeWidth: 2,

            //Number - Spacing between each of the X value sets

            barValueSpacing: 5,

            //Number - Spacing between data sets within X values

            barDatasetSpacing: 1,

            //String - A legend template

            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",

            //Boolean - whether to make the chart responsive

            responsive: true,

            maintainAspectRatio: true

        };



        barChartOptions.datasetFill = false;

        barChart.Bar(barChartData, barChartOptions);

    });
    </script>

</body>

</html>