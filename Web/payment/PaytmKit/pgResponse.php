<?php
include('../../db/connect.php');
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");


$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$ORDER_ID = $_POST['ORDERID'];
// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
	    $status=$_POST['STATUS'];
	    $amount=$paramList["TXNAMOUNT"];
	    $ORDER_ID = $_POST['ORDERID'];
	    $GATEWAYNAME = $_POST['GATEWAYNAME'];
	    $TXNID = $_POST['TXNID'];
	    $TXNDATE = $_POST['TXNDATE'];
	    
	    $cmd="select * from user_transaction ORDER BY id DESC LIMIT 1";
        $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
        if(mysqli_fetch_row($result)<1)
        {
                    $id = 0;
        }
        else
        {
            $cmd1="select * from user_transaction ORDER BY id DESC LIMIT 1";
            $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
            while($rows=mysqli_fetch_array($result1))
            {
                $id=$rows['id'];
            }
        }
        $id = $id + 1;
        $prefix = 'TRA';
        $TRID = $prefix.$id;
	    
	    
	    $sel="select session from creator_payment where payment_id='$ORDER_ID' LIMIT 1";
	    $run=mysqli_query($con,$sel);
	    while($row=mysqli_fetch_array($run))
	    {
	        $session = $row['session'];
	        $session = base64_decode($session);
	        $_SESSION['sa_email'] = $session;
	    }
	    
	    $cmd="update creator_payment set status='$status' where payment_id='$ORDER_ID'";
	    $run=mysqli_query($con,$cmd);
	    if($run)
	    {
	        $ins="insert into user_transaction (id,transaction_id,BankName,payment_mode,amount,discount,TXNIDPAYTM,transaction_time,status) values
	        (null,'$TRID','$GATEWAYNAME','Online','$amount','Not Set','$TXNID','$TXNDATE','$status')";
    	    $q=mysqli_query($con,$ins);
    	    if($run)
    	    {
    		    echo "<script>alert('Payment Success');</script>";
    			echo "<script>setTimeout(function(){window.location='../../super_admin/selectmentor'},1)</script>";
    	    }
    	    else
    	    {
    	        echo "<script>alert('Payment Failed');</script>";
			    echo "<script>setTimeout(function(){window.location='../../super_admin/selectmentor'},1)</script>";
    	    }
	    }
	    else
	    {
	        echo "<script>alert('Payment Fail');</script>";
			echo "<script>setTimeout(function(){window.location='../../super_admin/selectmentor'},1)</script>";
	    }
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	}
	else {
		echo "<script>alert('Your Transaction is Failed');</script>";
		echo "<script>setTimeout(function(){window.location='../../super_admin/selectmentor'},1)</script>";
	}

	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>