<?php
// Create connection

$GLOBALS['con'] = mysqli_connect("localhost","colorb69_1","rathunona1.");

// Check connection
if (!$GLOBALS['con'])
  			{
  				die('Could not connect: ' . mysqli_error());
  			}

mysqli_select_db($GLOBALS['con'],"colorb69_nedep" );
mysqli_set_charset($GLOBALS['con'],'utf8');
date_default_timezone_set("Asia/Colombo");
				
?>
