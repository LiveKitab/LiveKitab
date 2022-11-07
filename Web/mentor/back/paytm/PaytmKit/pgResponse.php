<?php
include('../../../../db/mconnect.php');
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;


$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	if (isset($_POST["STATUS"])) {
		$status=$_POST['STATUS'];
	    $amount=$_POST["TXNAMOUNT"];
	    $ORDER_ID = $_POST['ORDERID'];
	    $GATEWAYNAME = $_POST['GATEWAYNAME'];
	    $TXNID = $_POST['TXNID'];
	    $TXNDATE = $_POST['TXNDATE'];
	    $CUST_ID = $_POST['CUST_ID'];
	   // echo '1'.$CUST_ID;
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
		
           	if($status == 'TXN_SUCCESS')
			{
			    $sel12 = "select * from mentor_purchased_courses_dummy where paytm_orderid='$ORDER_ID'";
                $result12=mysqli_query($con,$sel12) or die(mysqli_error($con));
                while($row1 = mysqli_fetch_array($result12))
                {
                    $credit = $row1['credit'];
                    $c_id = $row1['c_id'];
                    $sub_id = $row1['sub_id'];
                    $bill_id = $row1['bill_id'];
                    $transaction_id = $row1['transaction_id'];
                    $date = $row1['date'];
                    $suborderid = $row1['order_id'];
                    
                    $data = "insert into mentor_purchased_courses (`id`, `c_id`,`type`, `sub_id`,`transaction_id`,`order_id`,`bill_id`, `date`, `status`)
                    values (null,'$c_id','-','$sub_id','$transaction_id','$suborderid','$bill_id','$date','1')";
    		        $result = mysqli_query($con,$data) or die(mysqli_error($con));
    		        if($result)
    		        {
    		            $upd = "update apply_for_subject set status='1' where sub_id='$sub_id'";
    		            $exe = mysqli_query($con,$upd);
    		            
    		            $mendel = "delete from mentor_purchased_courses_dummy where paytm_orderid='$ORDER_ID'";
            		    $run1 = mysqli_query($con,$mendel);
    		        }
                }
                
                $sel123 = "select * from user_transaction_dummy where paytm_orderid='$ORDER_ID'";
                $result123 =mysqli_query($con,$sel123) or die(mysqli_error($con));
                while($row12 = mysqli_fetch_array($result123))
                {
                    $discount = $row12['discount'];
                    $sub_id = $row12['sub_id'];
                    $bill_id = $row12['bill_id'];
                    $transaction_id = $row12['transaction_id'];
                    $date = $row12['date'];
                    $suborderid = $row12['order_id'];

                    $data1 = "insert into `user_transaction`(`id`, `type`, `transaction_id`, `bill_id`, `order_id`, `BankName`, `payment_mode`, `amount`, `discount`, `TXNIDPAYTM`, `transaction_time`, `status`)
                    values (null,'Mentor','$transaction_id','$bill_id','$suborderid','$GATEWAYNAME','Online','$amount','$discount','$TXNID','$TXNDATE','$status')";
    		        $result1 = mysqli_query($con,$data1) or die(mysqli_error($con));
    		        if($result1)
    		        {
    		            $del = "delete from user_transaction_dummy where paytm_orderid='$ORDER_ID'";
            		    $run = mysqli_query($con,$del);
    		        }
                }
			    
				echo '<meta http-equiv="refresh" content="0;URL=../../../payment-success" />';
			}
			elseif($status == 'TXN_FAILURE')
			{
				echo '<meta http-equiv="refresh" content="0;URL=../../../payment-failed" />';
			}
			else
			{
				echo '<meta http-equiv="refresh" content="0;URL=../../../payment-failed" />';
			}
}
	else {
		echo '<meta http-equiv="refresh" content="0;URL=../../../payment-failed" />';
	}
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>