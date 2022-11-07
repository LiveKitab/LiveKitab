<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");
$checkSum = "";

// below code snippet is mandatory, so that no one can use your checksumgeneration url for other purpose .
$ORDER_ID = $_POST["ORDER_ID"];
$CUST_ID = $_POST["CUST_ID"];
$INDUSTRY_TYPE_ID = $_POST["INDUSTRY_TYPE_ID"];
$CHANNEL_ID = $_POST["CHANNEL_ID"];
$TXN_AMOUNT = $_POST["TXN_AMOUNT"];
$CALL=$_POST['CALLBACK_URL'];
$paramList = array();

//$ORDER_ID='ODMb61';

$paramList["MID"] = PAYTM_MERCHANT_MID; //Provided by Paytm
$paramList["ORDER_ID"] = $ORDER_ID;
$paramList["CUST_ID"] = $CUST_ID;
$paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
$paramList["CHANNEL_ID"] = $CHANNEL_ID;
$paramList["TXN_AMOUNT"] = $TXN_AMOUNT; // transaction amount
$paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;//Provided by Paytm
$paramList["CALLBACK_URL"] = "https://pguat.paytm.com/paytmchecksum/paytmCallback.jsp";//Provided by Paytm

$checkSum = getChecksumFromArray($paramList, PAYTM_MERCHANT_KEY);
$paramList["CHECKSUMHASH"] = $checkSum;
echo json_encode(array("CHECKSUMHASH" => $checkSum,"ORDER_ID" =>$ORDER_ID, "payt_STATUS" => "1"),JSON_UNESCAPED_SLASHES);
?>
