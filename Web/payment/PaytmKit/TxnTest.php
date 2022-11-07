<?php
include("../../db/connect.php");
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
	
	if(isset($_POST['submit']))
	{
	    $orderid=$_POST['ORDER_ID'];
	    $month=$_POST['MONTH'];
	    $year=$_POST['YEAR'];
	    $amt=$_POST['AMOUNT'];
	    $rmk=$_POST['RMK'];
	    $c_id=$_POST['crt_id'];
	    $course_id=$_POST['course_id'];
	    $sa_email=base64_encode($sa_email);
	    $mid=$_POST['mid'];
        $mkey=$_POST['m_key'];
	    
	    $sel="select * from creator_payment where c_id='$c_id' and course_id='$course_id' and payment_month='$month' and payment_year='$year'";
    	$run=mysqli_query($con,$sel) or die(mysqli_error($con));
        if(mysqli_num_rows($run)<1)
        {
	    
	   $cmd="insert into creator_payment (id,c_id,course_id,payment_id,payment_month,payment_year,payment_method,payment_amount,remark,status,session) values
	    (null,'$c_id','$course_id','$orderid','$month','$year','Online','$amt','$rmk','Not Set','$sa_email')";
	    $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
	    if($result)
	    {
	        
	    }



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
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
					<td><input id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo $orderid; ?>">
					</td>
				</tr>
				<tr>
					<td>2</td>
					<td><label>MONTH ::*</label></td>
					<td><input id="MONTH" tabindex="2" maxlength="12" size="12" name="MONTH" autocomplete="off" value="<?=$month;?>"></td>
				</tr>
				<tr>
					<td>3</td>
					<td><label>YEAR ::*</label></td>
					<td><input id="YEAR" tabindex="4" maxlength="12" size="12" name="YEAR" autocomplete="off" value="<?=$year;?>"></td>
				</tr>
				<tr>
					<td>4</td>
					<td><label>REMARKS ::*</label></td>
					<td><input id="REMARKS" tabindex="4" maxlength="12"
						size="12" name="REMARKS" autocomplete="off" value="<?=$rmk;?>">
					</td>
				</tr>
				<tr>
					<td>2</td>
					<td><label>CUSTID ::*</label></td>
					<td><input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo $c_id; ?>"></td>
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
						value="<?=$amt;?>">
					</td>
				</tr>
				<tr>
					<td>5</td>
					<td><label>MERCHANT KEY ::*</label></td>
					<td><input title="MERCHANT KEY" tabindex="10"
						type="text" name="m_key"
						value="<?=$mkey;?>">
					</td>
				</tr>
				<tr>
					<td>5</td>
					<td><label>MERCHANT ID ::*</label></td>
					<td><input title="MERCHANT ID" tabindex="10"
						type="text" name="mid"
						value="<?=$mid;?>">
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
    echo "<script>alert('You Have Alrady Pay to This Mentor');</script>";
    echo "<script>setTimeout(function(){window.location='../../super_admin/selectmentor'},1)</script>";
}
}
