<?php
session_start();
date_default_timezone_set("Asia/Colombo");
include('connect.php');

$a = $_POST['type'];
$b = $_POST['type_id'];
$c = $_POST['from'];
$d = $_POST['to'];
$e = $_SESSION['SESS_FIRST_NAME'];
$f = $_SESSION['mac_id'];
$g = $_POST['note'];
$date=date("Y-m-d");
$time=date("H.i");
$day=0;
if($b==3){$day=1;}
if($b==2){
				  $sday= strtotime( $c);
                  $nday= strtotime($d);
                  $tdf= abs($nday-$sday);
                  $nbday1= $tdf/86400;
                  $day= intval($nbday1);
	}
if($f=="0"){
	$user="user";
	$f=$_SESSION['SESS_MEMBER_ID'];
	
}else{ $user="mac";}



$sql = "INSERT INTO mac_leave (type,type_id,date1,date2,mac_name,mac_id,note,date,action,time,leave_day,user_type) VALUES (:a,:b,:c,:d,:e,:f,:g,:pro,:ac,:ti,:day,:user)";
$ql = $db->prepare($sql);
$ql->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$g,':pro'=>$date,':ac'=>'pending',':ti'=>$time,':day'=>$day,':user'=>$user));

//$ql->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$g,':pro'=>$date,':ac'=>$date));


$from="info@colorbiz.org";
$to="neddaniel46@gmail.com";
$sub=$a." Request From ".$e;
$masseg="Mr.NED
".$a." Leave Request From ".$e."
".$g."


"."Request Date: ".$date."
Request Time: ".$time;

//$masseg = '<p><strong>This is strong text</strong> while this is not.</p>';



mail($to, $sub, $masseg, "From:".$from);






header("location: leave.php");

?>