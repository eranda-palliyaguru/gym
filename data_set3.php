<?php
session_start();
include('connect.php');



		$resultm = $db->prepare("SELECT * FROM sales WHERE action='' AND date BETWEEN '2019-12-01' AND '2020-12-20' ");
		$resultm->bindParam(':userid', $res);
		$resultm->execute();
		for($i=0; $row12 = $resultm->fetch(); $i++){	
		$amount = $row12['amount'];
		$balance = $row12['balance'];
		$invoice_number = $row12['invoice_number'];
		
		$resultm1 = $db->prepare("SELECT sum(pay_amount) FROM payment WHERE invoice_no='$invoice_number' ");
		$resultm1->bindParam(':userid', $res);
		$resultm1->execute();
		for($i=0; $row121 = $resultm1->fetch(); $i++){	
		$pay_total = $row121['sum(pay_amount)'];
		}
if(!$pay_total){$pay_total=0;}
	
		$tot=$amount-$pay_total;
		$tot="-".$tot;
			
		if($tot==$balance){}else{
			echo $invoice_number."___Amount-".$amount."___Balance-".$balance."__Tot".$tot." <br>";
			
			
$sql = "UPDATE sales 
        SET balance=?
		WHERE invoice_number=?";
$q = $db->prepare($sql);
$q->execute(array($tot,$invoice_number));
			
		}
		
			
			
		}


?>