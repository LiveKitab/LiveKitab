<?php
$con=mysqli_connect("localhost","zocaryzg","Encender@24/7","zocaryzg_videobook") or die("ERROR IN CONNECTION");
/*
- Use PAYTM_ENVIRONMENT as 'PROD' if you wanted to do transaction in production environment else 'TEST' for doing transaction in testing environment.
- Change the value of PAYTM_MERCHANT_KEY constant with details received from Paytm.
- Change the value of PAYTM_MERCHANT_MID constant with details received from Paytm.
- Change the value of PAYTM_MERCHANT_WEBSITE constant with details received from Paytm.
- Above details will be different for testing and production environment.
*/
//echo $CUST_ID;
$query = "select * from creator_data,creator_payment where creator_data.c_id=creator_payment.c_id and creator_payment.payment_id='$ORDER_ID' LIMIT 1";
$run = mysqli_query($con,$query);
while($row=mysqli_fetch_array($run))
{
    $mid=$row['mid'];
    $m_key=$row['m_key'];
}
//echo $mid;

define('PAYTM_ENVIRONMENT', 'TEST'); // PROD
 //define('PAYTM_MERCHANT_KEY', 'K6243n_sVbV#R!ae'); //Change this constant's value with Merchant key received from Paytm.
 //define('PAYTM_MERCHANT_MID', 'DhZiog53955920109736'); //Change this constant's value with MID (Merchant ID) received from Paytm.
define('PAYTM_MERCHANT_KEY', $m_key);
define('PAYTM_MERCHANT_MID', $mid);
define('PAYTM_MERCHANT_WEBSITE', 'WEBSTAGING'); //Change this constant's value with Website name received from Paytm.

$PAYTM_STATUS_QUERY_NEW_URL='https://securegw-stage.paytm.in/merchant-status/getTxnStatus';
$PAYTM_TXN_URL='https://securegw-stage.paytm.in/theia/processTransaction';
if (PAYTM_ENVIRONMENT == 'PROD') {
	$PAYTM_STATUS_QUERY_NEW_URL='https://securegw.paytm.in/merchant-status/getTxnStatus';
	$PAYTM_TXN_URL='https://securegw.paytm.in/theia/processTransaction';
}

define('PAYTM_REFUND_URL', '');
define('PAYTM_STATUS_QUERY_URL', $PAYTM_STATUS_QUERY_NEW_URL);
define('PAYTM_STATUS_QUERY_NEW_URL', $PAYTM_STATUS_QUERY_NEW_URL);
define('PAYTM_TXN_URL', $PAYTM_TXN_URL);
?>
