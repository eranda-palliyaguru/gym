
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th >Vehicle No.</th>
                    
                    <th>Time</th>
					  <th>Type</th>
					  <th>Phone</th>
                   <th>Profile</th>
					  <th>Edit</th>
                  </tr>
                  </thead>
                  <tbody>
					  <?php 
				date_default_timezone_set("Asia/Colombo");
					  include("connect.php");
			$result = $db->prepare("SELECT * FROM job WHERE type='active' and category='' ORDER by id ASC ");
				$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
					$wash_id=$row['washer_id'];
					$mechanic_id=$row['mechanic_id'];
					
					$date=$row['date'];
					$ramp=$row['ramp'];
					$phone="";
					
		$resultm = $db->prepare("SELECT * FROM mechanic WHERE ramp = '$ramp' ");
		$resultm->bindParam(':userid', $res);
		$resultm->execute();
		for($i=0; $rowm = $resultm->fetch(); $i++){
		$rname = $rowm['name'];	
		}
					$color_ramp="green"; $info="Waiting";
					if($ramp==""){ $color_ramp="maroon"; $info="Waiting"; }
					if($ramp>0){ $color_ramp="red"; $info=$rname; }
					if($ramp=="wash"){ $color_ramp="blue"; $info="Washing"; }
					if($ramp=="Drying"){ $color_ramp="yellow"; $info="Drying"; }
					
					
					
					
					$date1=date("Y-m-d");
					if($date==$date1){
					$time=$row['time'];
					
						
$time_now=date("H.i");					
$date1 = new DateTime($time_now);
$date2 = $date1->diff(new DateTime($time));

$h=$date2->h;
$m=$date2->i;
					
			if($h==0){ 
				$time_on=$m;	
			$time_type="minute";
			}else{
			$time_on=$h;
			$time_type="hours";	
			}
						
						
						
					}else{
				  $sday= strtotime( $date);
                  $nday= strtotime($date1);
                  $tdf= abs($nday-$sday);
                  $nbday1= $tdf/86400;
                  $time_on= intval($nbday1);
						$time_type="Day";
					}
					
					
					if($time_type=="minute"){ $color="green"; }
					if($time_type=="Day"){ $color="red";  }
					if($time_type=="hours"){ $color="blue";								   
					     if($time_on>4){ $color="yellow"; }	 }  
										   
					$vehicle=$row['vehicle_no'];
					$idi=0;
					$result1 = $db->prepare("SELECT * FROM customer WHERE vehicle_no='$vehicle'");
				$result1->bindParam(':userid', $date);
                $result1->execute();
                for($i=0; $row1 = $result1->fetch(); $i++){
				$idi=$row1['customer_id'];	
					$phone=$row1['contact'];
				}
					
					
$wash_time=$row['wash_time'];					
$time_now=date("H.i");					
$wtime1 = new DateTime($time_now);
$wtime2 = $wtime1->diff(new DateTime($wash_time));

$wh=$wtime2->h;
$wm=$wtime2->i;
			$wtime_on=0;			
			if($wh==0){ 
				$wtime_on=$wm;	
			$wtime_type="minute";
			}else{
			$wtime_on=$wh;
			$wtime_type="hours";	
			}		

	                if($wtime_type=="minute"){ $wcolor="green"; }
					if($wtime_type=="hours"){ $wcolor="blue";								   
					     if($wtime_on>4){ $wcolor="yellow"; }	 }
					
					
					
$tech_time=$row['tech_time'];					
$time_now=date("H.i");					
$ttime1 = new DateTime($time_now);
$ttime2 = $ttime1->diff(new DateTime($tech_time));

$th=$ttime2->h;
$tm=$ttime2->i;
			$ttime_on=0;			
			if($th==0){ 
				$ttime_on=$tm;	
			$ttime_type="minute";
			}else{
			$ttime_on=$th;
			$ttime_type="hours";	
			}		

	                if($ttime_type=="minute"){ $tcolor="green"; }
					if($ttime_type=="hours"){ $tcolor="blue";								   
				    if($ttime_on>4){ $tcolor="yellow"; }	 }
				
					
					  ?>
                  <tr>
                    <td><?php echo $row['vehicle_no'];?>
					  <?php  if($mechanic_id>0){?>
					  <i class="fa fa-wrench " style="color: #C10004" ></i>
						<?php  if($ramp>0){?>
							<span class="badge bg-red"><?php echo $ttime_on." ".$ttime_type;?> </span>
						<?php } ?>
						<?php  }if($wash_id>0){?>
						<i class="fa fa-tint" style="color: mediumblue"></i>
						<?php  if($ramp=="wash"){?>
							<span class="badge bg-blue"><?php echo $wtime_on." ".$wtime_type;?> </span>
						<?php } ?>
						<?php  }if($ramp=="Drying"){?>
<i class="fa fa-sun-o" style="color: darkorange"><span class="badge bg-yellow"><?php echo $wtime_on." ".$wtime_type;?> </span></i>
						 <?php } ?></td>
                   
                    <td><span class="badge bg-<?php echo $color;?>"><i class="fa fa-clock-o"></i> <?php echo $time_on." ".$time_type;?></span></td>
					  
					  <td><span class="badge bg-<?php echo $color_ramp;?>"><?php echo $info;?></span></td>
					  
					  
					  <td><?php echo $phone ?> </td>
					  <td>
						  <a href="profile.php?id=<?php echo $idi; ?>" >
					  <button class="btn btn-success"><i class="glyphicon glyphicon-user"></i></button></a>
						  </td>
					  <td>
					  <a href="job_edit.php?id=<?php echo $row['id']; ?>" >
					  <button class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></button></a>
						 </td>
                  </tr>
                  <?php } ?>
                  </tbody>
					
                </table>
              </div>
              <!-- /.table-responsive -->
<div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th >Vehicle No.</th>
                    
                    <th>Time</th>
					  <th>Type</th>
					  <th>Phone</th>
                   <th>Profile</th>
					  <th>Edit</th>
					  
                  </tr>
                  </thead>
                  <tbody>
					  <?php 
				date_default_timezone_set("Asia/Colombo");
					  include("connect.php");
			$result = $db->prepare("SELECT * FROM job WHERE type='active' and category='Accident' ORDER by id ASC ");
				$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
					$date=$row['date'];
					$ramp=$row['ramp'];
					$phone="";
					
		$resultm = $db->prepare("SELECT * FROM mechanic WHERE ramp = '$ramp' ");
		$resultm->bindParam(':userid', $res);
		$resultm->execute();
		for($i=0; $rowm = $resultm->fetch(); $i++){
		$rname = $rowm['name'];	
		}
					
					if($ramp==""){ $color_ramp="yellow"; $info="Waiting"; }
					if($ramp>0){ $color_ramp="blue"; $info=$rname; }
					if($ramp=="out"){ $color_ramp="green"; $info="Washing"; }
					
					
					
					
					$date1=date("Y-m-d");
					if($date==$date1){
					$time=$row['time'];
					
						
			$split = explode(".", $time);
            $hh = $split[0];
			$hh1=date("H");
						$h=$hh1-$hh;
						
			if($h==0){ 
				$split = explode(".", $time);
			    $m = $split[1];
				$m1= date("i");
				$time_on=$m1-$m;
				
			$time_type="minute";
			}else{
			$time_on=$h;
			$time_type="hours";	
			}
						
						
						
					}else{
				  $sday= strtotime( $date);
                  $nday= strtotime($date1);
                  $tdf= abs($nday-$sday);
                  $nbday1= $tdf/86400;
                  $time_on= intval($nbday1);
						$time_type="Day";
					}
					
					
					if($time_type=="minute"){ $color="green"; }
					if($time_type=="Day"){ $color="green";
					if($time_on>3){ $color="blue"; }
					if($time_on>6){ $color="yellow"; }
					if($time_on>14){ $color="red"; } }
					if($time_type=="hours"){ $color="green";}   
										   
					$vehicle=$row['vehicle_no'];
					$idi=0;
					$result1 = $db->prepare("SELECT * FROM customer WHERE vehicle_no='$vehicle'");
				$result1->bindParam(':userid', $date);
                $result1->execute();
                for($i=0; $row1 = $result1->fetch(); $i++){
				$idi=$row1['customer_id'];	
					$phone=$row1['contact'];
				}
					
					  ?>
                  <tr>
                    <td><?php echo $row['vehicle_no'];?></td>
                    
                    <td><span class="badge bg-<?php echo $color;?>"><i class="fa fa-clock-o"></i> <?php echo $time_on." ".$time_type;?></span></td>
					  
					  <td><span class="badge bg-<?php echo $color_ramp;?>"><?php echo $info;?></span></td>
					  
					  
					  <td><?php echo $phone ?> </td>
					  <td>
						  <a href="profile.php?id=<?php echo $idi; ?>" >
					  <button class="btn btn-success"><i class="glyphicon glyphicon-user"></i></button></a>
						  </td>
					  <td>
					  <a href="job_edit.php?id=<?php echo $row['id']; ?>" >
					  <button class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></button></a>
						 </td>
					  
					  

                  </tr>
                  <?php } ?>
                  </tbody>
					
                </table>
              </div>
			