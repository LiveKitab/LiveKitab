<?php
include('../../../../db/mconnect.php');
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
	date_default_timezone_set("Asia/Calcutta");
	
	
	if(isset($_POST['amount']) && isset($_POST['c_id']) && isset($_POST['subid']) && isset($_POST['dis']))
	{
	    $paytmorderid = 'ORDER'.rand(1000000,99999999);
	    $billid = 'BILLID'.rand(1000000,99999999);
	    $trid = 'TRANID'.rand(1000000,99999999);
	    $myorderid = 'ORDERID'.rand(1000000,99999999);
	    $subid=$_POST['subid'];
	    $amount=$_POST['amount'];
	    $c_id=$_POST['c_id'];
	    $dis=$_POST['dis'];
	    $date = date('Y-m-d');
	    $timestamp = date('Y-m-d h:i:s');
	    $finalprice = (($amount*$dis)/100);
	    $famount = $amount - $finalprice;

	        $data = "insert into mentor_purchased_courses_dummy (`id`, `c_id`,`type`, `sub_id`,`transaction_id`,`order_id`,`paytm_orderid`,`bill_id`, `date`, `status`)
            values (null,'$c_id','-','$subid','$trid','$myorderid','$paytmorderid','$billid','$date','0')";
    		$result = mysqli_query($con,$data) or die(mysqli_error($con));
    		
    		$data1 = "insert into `user_transaction_dummy`(`id`, `type`, `transaction_id`, `bill_id`, `order_id`,`paytm_orderid`, `BankName`, `payment_mode`, `amount`, `discount`, `TXNIDPAYTM`, `transaction_time`, `status`)
            values (null,'Mentor','$trid','$billid','$myorderid','$paytmorderid','NA','Online','$famount','$dis','NA','NA','NA')";
    		$result1 = mysqli_query($con,$data1) or die(mysqli_error($con));

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html style="display:none;">
<head>
<title>Merchant Check Out Page</title>
<meta name="GENERATOR" content="Evrsoft First Page">
</head>
<body>
	<h1>Merchant Check Out Page</h1>
	<pre>
	</pre>
	<form method="post" action="pgRedirect.php" name="f2">
		<table border="1">
			<tbody>
				<tr>
					<th>S.No</th>
					<th>Label</th>
					<th>Value</th>
				</tr>
				<tr>
					<td>1</td>
					<td><label>ORDER_ID::*</label></td>
					<td><input id="ORDER_ID" tabindex="1" maxlength="" size=""
						name="ORDER_ID" autocomplete="off"
						value="<?php echo $paytmorderid; ?>">
					</td>
				</tr>
				<tr>
					<td>2</td>
					<td><label>CUSTID ::*</label></td>
					<td><input id="CUST_ID" tabindex="2" maxlength="20" size="20" name="CUST_ID" autocomplete="off" value="<?php echo $c_id; ?>"></td>
				</tr>
				<tr>
					<td>3</td>
					<td><label>INDUSTRY_TYPE_ID ::*</label></td>
					<td><input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail"></td>
				</tr>
				<tr>
					<td>4</td>
					<td><label>Channel ::*</label></td>
					<td><input id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
					</td>
				</tr>
				<tr>
					<td>5</td>
					<td><label>txnAmount*</label></td>
					<td><input title="TXN_AMOUNT" tabindex="10"
						type="text" name="TXN_AMOUNT"
						value="<?=$famount;?>">
					</td>
				</tr>
				
				<tr>
					<td></td>
					<td></td>
					<td><input value="CheckOut" type="submit"	onclick=""></td>
				</tr>
			</tbody>
		</table>
		* - Mandatory Fields
		<script type="text/javascript">								
        document.f2.submit();
		</script>
	</form>
</body>
</html>
<?php
}
else
{
    echo "<script>alert('Data Not Post');</script>";
    echo "<script>setTimeout(function(){window.location='../../../addcredit'},1)</script>";
}
?>