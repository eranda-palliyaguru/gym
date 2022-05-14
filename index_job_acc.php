
<div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
					  <th >Job No.</th>
                    <th >Vehicle No.</th>
                  
                    <th>Time</th>
					  <th>Type</th>
					  <th>Profile</th>
                   <th>print</th>
					  <th>view</th>
                  </tr>
                  </thead>
                  <tbody>
					  <?php 
					  date_default_timezone_set("Asia/Colombo");
					  include("connect.php");
					  $job_no=0;
					  
			$result = $db->prepare("SELECT * FROM job WHERE type='active' and category='Accident' ORDER by id ASC ");
				$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
					$date=$row['date'];
					$ramp=$row['ramp'];
					
		$resultm = $db->prepare("SELECT * FROM mechanic WHERE ramp = '$ramp' ");
		$resultm->bindParam(':userid', $res);
		$resultm->execute();
		for($i=0; $rowm = $resultm->fetch(); $i++){
		$rname = $rowm['name'];	
		}
					
					
					$job_no+=1;
					
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
				}
					
					  ?>
                  <tr>
					  <td><?php echo $job_no;?></td>
                    <td><?php echo $row['vehicle_no'];?></td>
                    
                    <td><span class="badge bg-<?php echo $color;?>"><i class="fa fa-clock-o"></i> <?php echo $time_on." ".$time_type;?></span></td>
					  
					  <td><span class="badge bg-<?php echo $color_ramp;?>"><?php echo $info;?></span></td>
					  
					  
					  <td><?php if($idi>1){ ?>
						  <a href="profile.php?id=<?php echo $idi; ?>" >
					  <button class="btn btn-success"><i class="glyphicon glyphicon-user"></i></button></a>
						  <?php }else{ ?>
						   <a href="cus.php" >
					  <button class="btn btn-info"><i class="glyphicon glyphicon-user">+</i></button></a>
						  <?php } ?></td>
					   <td><a href="job_print.php?id=<?php echo $row['id']; ?>" >
					  <button class="btn btn-warning"><i class="glyphicon glyphicon-print"></i></button></a></td>
					  <td><a href="accident.php?id=<?php echo $row['id']; ?>&se=0" >
					  <button class="btn btn-info">view</button></a></td>
                  </tr>

                  <?php } ?>
                  </tbody>
					
                </table>
              </div>
              <!-- /.table-responsive -->
				
            </div>