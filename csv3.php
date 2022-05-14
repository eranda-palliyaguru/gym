<?php

class csv extends mysqli
{
	private $state_csv = false;
	public function __construct()
	{
		parent::__construct("localhost","colorb69_1","rathunona1.","colorb69_ned");
		if ($this->connect_error) {

			echo "Fail to connection_timeout".$this->connect_error;

		}
	}
public function inport($file)
{
	$file = fopen($file, 'r');

	while( ($row = fgetcsv($file,1000,",")) !==false) {

		$r=$row [0];
		$r1=$row [1];
		$r2=$row [4];
		$r3=$row [2];	
		$r4=$row [6];
		$r5=$row [7];
		$r6=$row [14];
		$r7=$row [17];
		
		$str=$r2;
		
		$unwanted_array = array(    'µ'=>'A','¶'=>'B','·'=>'C','¸'=>'D','¹'=>'E','º'=>'F','»'=>'G','¼'=>'H','½'=>'I','¾'=>'J','¿'=>'K','À'=>'L','Á'=>'M','Â'=>'N','Ã'=>'O','Ä'=>'P','Å'=>'Q','Æ'=>'R','Ç'=>'S','È'=>'T','É'=>'U','Ê'=>'V','Ë'=>'W','Ì'=>'X','Í'=>'Y','Î'=>'Z','”'=>' ','¤'=>'0','¥'=>'1','¦'=>'2','§'=>'3','¨'=>'4','©'=>'5','ª'=>'6','«'=>'7','¬'=>'8','­'=>'9' ,'¡'=>'-' );
$str = strtr( $str, $unwanted_array );

$a = substr($str,0,1) ;
$b = substr($str,1,1) ;
$c = substr($str,2,1) ;
$d = substr($str,3,1) ;
$e = substr($str,4,1) ;
$f = substr($str,5,1) ;
$i = substr($str,6,1) ;
$j = substr($str,7,1) ;
$k = substr($str,8,1) ;
$a1 = substr($str,9,1) ;
$a2 = substr($str,10,1) ;
$a3 = substr($str,11,1) ;
$a4 = substr($str,12,1) ;
$a5 = substr($str,13,1) ;
$a6 = substr($str,14,1) ;
$a7 = substr($str,15,1) ;
$a8 = substr($str,16,1) ;
$a9 = substr($str,17,1) ;
$a10 = substr($str,18,1) ;
$a11 = substr($str,19,1) ;
$a12 = substr($str,20,1) ;
$a13 = substr($str,21,1) ;
$a14 = substr($str,22,1) ;
$a15 = substr($str,23,1) ;
$a16 = substr($str,24,1) ;
$a17 = substr($str,25,1) ;
$a18 = substr($str,26,1) ;
$a19 = substr($str,27,1) ;
$a20 = substr($str,28,1) ;
$a21 = substr($str,29,1) ;
$a22 = substr($str,30,1) ;
$a23 = substr($str,31,1) ;
$a24 = substr($str,32,1) ;
$a25 = substr($str,33,1) ;
$a26 = substr($str,34,1) ;
$a27 = substr($str,35,1) ;
$a28 = substr($str,36,1) ;

$name= $a28.$a27.$a26.$a25.$a24.$a23.$a22.$a21.$a20.$a19.$a18.$a17.$a16.$a15.$a14.$a13.$a12.$a11.$a10.$a9.$a8.$a7.$a6.$a5.$a4.$a3.$a2.$a1.$k.$j.$i.$f.$e.$d.$c.$b.$a;
		

     include('connect.php');


	  
	  	//$value = "'". implode("','", $row)."'";
	  	$q = "INSERT INTO csv3(code,name,price,price1,price2,price3,price4) 
		VALUES('$r1','$name','$r3','$r4','$r5','$r6','$r7')";
	  	if ($this->query($q)) {
	  		$this->state_csv = true;
	  	}else{
	  		$this->state_csv = false;
	  		echo $this->error;
	  	}

	  } 

}
}
?>