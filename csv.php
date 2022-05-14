<?php
$sta="0";
class csv extends mysqli
{
	private $state_csv = false;
	public function __construct()
	{
		parent::__construct("localhost","colorb69_1","rathunona1.","colorb69_nedep");
		if ($this->connect_error) {

			echo "Fail to connection_timeout".$this->connect_error;

		}
	}
public function inport($file)
{
	$file = fopen($file, 'r');

	while( ($row = fgetcsv($file,50000,",")) !==false) {

		$r=$row [1];
		$r1=$row [14];
		$r2=$row [10];
		$r3=$row [6];

     include('connect.php');
	  
	  	//$value = "'". implode("','", $row)."'";
	  	$q = "INSERT INTO csv (code,price,qty) 
		VALUES('$r','$r1','$r2')";
	  	if ($this->query($q)) {
	  		$this->state_csv = true;
			$sta="1";
	  	}else{
	  		$this->state_csv = false;
	  		echo $this->error;
			$sta="0";
	  	}

	  } 

}
}
if($sta=="1"){ header("location: bill.php?id=$a1"); 
			 
			 
			 echo "Sucssus";
			 }
echo "sem";
?>