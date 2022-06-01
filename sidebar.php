<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="index.php" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>C</b>arm</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><i class="fa fa-cloud"></i><b> arm</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
           
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i>
                            <?php include("connect.php");
                                $visit_count=0;
                                $date=date('Y-m-d');
		                            $result = $db->prepare("SELECT id FROM attends WHERE  date='$date'  GROUP BY user_id; ");
				                        $result->bindParam(':userid', $date);
                                $result->execute();
                                for($i=0; $row = $result->fetch(); $i++){
				                        $visit_count+=1;
				                      } ?>
                            <span class="label label-warning"><?php echo $visit_count; ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have <?php echo $visit_count; ?> Member Visit</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    
                                    <li>
                                    <?php $today=date('Y-m-d');
                                         $result = $db->prepare("SELECT * FROM attends WHERE date='$today'");
		                                     $result->bindParam(':userid', $res);
		                                     $result->execute();
		                                     for($i=0; $row = $result->fetch(); $i++){		                                    
                                       ?>
                                        <a href="attend_rp.php?d1=<?php echo date('Y-m-d'); ?>&d2=<?php echo date('Y-m-d'); ?>">
                                            <i class="fa fa-500px text-info"></i> <?php echo $row['user_name']; ?>(<?php echo $row['time']; ?>)
                                        </a>
                                        <?php } ?>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="attend_rp.php?d1=<?php echo date('Y-m-d'); ?>&d2=<?php echo date('Y-m-d'); ?>">View all</a></li>
                        </ul>
                    </li>
                    <?php
			$uname=$_SESSION['SESS_MEMBER_ID'];
		$result1 = $db->prepare("SELECT * FROM user WHERE id='$uname' ");
		$result1->bindParam(':userid', $res);
		$result1->execute();
		for($i=0; $row1 = $result1->fetch(); $i++){
		$upic1=$row1['upic'];
		}
			
			?>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo $upic1;?>" class="user-image" alt="User Image">
                            <span class="hidden-xs"><?php echo $_SESSION['SESS_FIRST_NAME'];?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?php echo $upic1;?>" class="img-circle" alt="User Image">

                                <p> <?php echo $_SESSION['SESS_FIRST_NAME'];?> -
                                    <?php echo $_SESSION['SESS_LAST_NAME'];?>
                                    <small>Member since Nov. <?php echo date("Y"); ?></small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href=" ../../../index.php" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->

            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo $upic1;?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php echo $_SESSION['SESS_FIRST_NAME'];?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                                class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li>
                    <a href="index.php">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        <span class="pull-right-container">

                        </span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-group"></i> <span>Member</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="cus.php"><i class="fa fa-circle-o text-yellow"></i> Add Member</a></li>
                        <li><a href="cus_view.php"><i class="fa fa-circle-o text-aqua"></i> View Member</a></li>
                    </ul>
                </li>





                <li>
                    <a href="payment.php">
                        <i class="fa fa-usd"></i> <span>Payment</span>
                        <span class="pull-right-container">

                        </span>
                    </a>
                </li>





                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-line-chart"></i> <span>Report</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="sales_rp.php?d1=<?php echo date("Y-m-d");?>&d2=<?php echo date("Y-m-d");?>"><i
                                    class="fa fa-circle-o text-yellow"></i> Payment Report</a></li>
                        <li><a href="attend_rp.php?d1=<?php echo date("Y-m-d");?>&d2=<?php echo date("Y-m-d");?>"><i
                                    class="fa fa-circle-o text-yellow"></i> Attendees Report</a></li>
                    </ul>
                </li>




            </ul>
            </li>
            </ul>
        </section>