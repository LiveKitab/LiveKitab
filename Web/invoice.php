<?php
include("backend/function/session.php");
include_once("../db/mconnect.php");
$todaysdate = date("Y-m-d");
$decoded = base64_decode($bill_id);

$dis= "select * from user_transaction where bill_id='$decoded'";
$return=mysqli_query($con,$dis) or die(mysqli_error($con));
while($rows1=mysqli_fetch_array($return))
{
    $email = $rows1['c_email'];
    $no = $rows1['c_cno'];
    $addr = $rows1['c_addr'];
    // $sh_gst = $rows1['gst_no'];
}

if(isset($_GET['bill-id']))
{
    $id = mysqli_real_escape_string($con,$_GET['bill-id']);
    $id = base64_decode($id);
    $count=0;
    
    $sel = "select * from user_transaction where order_id='$id'";
    $run=mysqli_query($con,$sel) or die(mysqli_error($con));
    while($row=mysqli_fetch_array($run))
    {
        $count=$count+1;
        $t_id=$row['transaction_id'];
        $b_id=$row['bill_id'];
        $o_id=$row['order_id'];
        $bank=$row['BankName'];
        $p_mode=$row['payment_mode'];
        $total=$row['amount'];
        $discount=$row['discount'];
        $time=$row['transaction_time'];
//         $taxcredit=$row['tax_amount'];
//         $host_fees = $row['host_fees'];
//         $maintenance_fees = $row['maintenance_fees'];
//         $pamt = $row['plan_amount'];
//         $plan_name = $row['plan_name'];
//         $gsttax = $row['tax_amount'];
//         $gatewaytax = $row['gateway_amount'];
// 		$dev_fees = $row['dev_fees'];
// 		$locked_fees = $row['locked_amount'];
//         $subtotal = $pamt + $host_fees + $maintenance_fees + $dev_fees + $locked_fees;
        
//         $sdate = $row['sdate'];
//         $edate = $row['edate'];
//         $stmt = 'INR ' .$credit. ' Paid For Purchasing '.$plan_name. ' Plan (From '.$sdate.' To '.$edate.')';
        
    }

?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Invoice</title>
		<link rel="stylesheet" href="design/css/invoice.css">
		<link rel="license" href="https://www.opensource.org/licenses/mit-license/">

	</head>
	<body>
		<header>
			<h1>Invoice</h1>
			
        			<address>
        			    <strong>Supplier :</strong><br>
        				E-mail: <?php echo $email; ?><br>
        			Contact No.: <?php echo $no; ?><br>
        			Address: <?php echo $addr; ?><br>
        			Date: <?php echo $todaysdate; ?><br>
        			</address>
			    
			    
        			<address style="margin-left:300px;">
        				<strong>Admin :</strong><br>
        			<?php echo 'Encender Technologies Pvt Ltd'; ?><br>
        			Contact: <?php echo '+919099535481'; ?><br>
        		<br>
        			</address>
			    
			<!--<span><img alt="" src="http://www.jonathantneal.com/examples/invoice/logo.png"><input type="file" accept="image/*"></span>-->
		</header>
		<article>
			
			<table class="meta" style="width:350px;float:left;">
			    
				<tr>
					<th><span>Order ID</span></th>
					<td><span><?=$o_id;?></span></td>
				</tr>
				<tr>
					<th><span>Transaction ID</span></th>
					<td><span><?=$t_id;?></span></td>
				</tr>
			</table>
			
			<table class="meta" style="width:350px;float:right;">
			    
				
				<tr>
					<th><span>Bill ID</span></th>
					<td><span><?=$b_id;?></span></td>
				</tr>
				
				<tr>
					<th><span>Payment Method</span></th>
					<td><span><?=$p_mode;?></span></td>
				</tr>
			</table>
			
			<table class="inventory">
				<thead>
					<tr>
						<th style="width:5%;"><span>Sr No.</span></th>
						<th style="width:20%;"><span>Plan ID</span></th>
						<th style="width:15%;"><span>Plan Name</span></th>
						<th style="width:15%;"><span>Charges</span></th>
						<th style="width:10%;"><span>Amount</span></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><span><?php echo 1; ?></span></td>
						<td><span><?php echo $plan_id; ?></span></td>
						<td align="center" style="padding-right:50px;"><span><?php echo $plan_name; ?> Plan</span></td>
						<td align="center" style="padding-right:35px;"><span>Subsciption Fees</span></td>
						<td style="padding-right:45px;"><span>₹<?php echo $pamt; ?></span></td>
					</tr>
					<tr>
						<td><span><?php echo 2; ?></span></td>
						<td><span>-</span></td>
						<td align="center" style="padding-right:80px;"><span>-</span></td>
						<td align="center" style="padding-right:25px;"><span>Developement Charges</span></td>
						<td style="padding-right:45px;"><span>₹<?php echo $dev_fees; ?></span></td>
					</tr>
					<tr>
						<td><span><?php echo 3; ?></span></td>
						<td><span>-</span></td>
						<td align="center" style="padding-right:80px;"><span>-</span></td>
						<td align="center" style="padding-right:50px;"><span>Hosting Fees</span></td>
						<td style="padding-right:45px;"><span>₹<?php echo $host_fees; ?></span></td>
					</tr>
					<tr>
						<td><span><?php echo 4; ?></span></td>
						<td><span>-</span></td>
						<td align="center" style="padding-right:80px;"><span>-</span></td>
						<td align="center" style="padding-right:40px;"><span>Maintenance Fees</span></td>
						<td style="padding-right:45px;"><span>₹<?php echo $maintenance_fees; ?></span></td>
					</tr>
					<tr>
						<td><span><?php echo 5; ?></span></td>
						<td><span>-</span></td>
						<td align="center" style="padding-right:80px;"><span>-</span></td>
						<td align="center" style="padding-right:40px;"><span>Locked Fees</span></td>
						<td style="padding-right:45px;"><span>₹<?php echo $locked_fees; ?></span></td>
					</tr>
					
				</tbody>
			</table>
			
			<table class="balance">
				<tr>
					<th><span>Subtotal </span></th>
					<td style="padding-right:45px;"><span data-prefix>₹</span><span><?php echo $subtotal; ?></span></td>
				</tr>
				<tr>
					<th><span>Tax Amount(GST) </span></th>
					<td style="padding-right:45px;"><span data-prefix>+ ₹</span><span><?php echo $gsttax; ?></span></td>
				</tr>
				<tr>
					<th><span>Gateway Charges </span></th>
					<td style="padding-right:45px;"><span data-prefix>+ ₹</span><span><?php echo $gatewaytax; ?></span></td>
				</tr>
				<?php
				$promo = "select promocode_dis from apply_plan_promocode where order_id='$id'";
				$runquery = mysqli_query($con,$promo) or die(mysqli_error($promo));
				if(mysqli_num_rows($runquery)>0)
				{
				    while($fetchrow = mysqli_fetch_array($runquery))
				    {
				        ?>
				        <tr>
    					<th><span>Promocode Amount :</span></th>
    					<td style="padding-right:45px;"><span data-prefix>- ₹</span><span><?php echo $fetchrow['promocode_dis']; ?></span></td>
				        </tr>
				        <?php
				    }
				}
				?>
				<tr>
					<th><span>Total </span></th>
					<td style="padding-right:45px;"><span data-prefix>₹</span><span><?php echo $credit; ?></span></td>
				</tr>
				
			</table>
		</article>
		<aside>
			<h1><span>Description</span></h1>
			<div>
				<p><?php echo $stmt; ?></p>
			</div>
		</aside>
	</body>
</html>
<?php
}
?>