<?php
include("backend/function/session.php");
include_once("../db/mconnect.php");
$todaysdate = date("Y-m-d");
$decoded = base64_decode($bill_id);

if(isset($_GET['data']))
{
    $id = mysqli_real_escape_string($con,$_GET['data']);
    $id = base64_decode($id);
    
    $count=0;
    
    $sel = "select * from mentor_transaction where bill_id='$id'";
    $run=mysqli_query($con,$sel) or die(mysqli_error($con));
    while($row=mysqli_fetch_array($run))
    {
        $count=$count+1;
        $id=$row['id'];
        $t_id=$row['transaction_id'];
        $b_id=$row['bill_id'];
        $o_id=$row['order_id'];
        $bank=$row['BankName'];
        $p_mode=$row['payment_mode'];
        $total=$row['amount'];
        $time=$row['transaction_time'];
        $cid=$row['c_id'];
        $stmt = 'INR ' .$total. ' Paid For Purchasing Course.';
    }
    
    //  $sel1="select * from  creator_data where bill_id='$b_id'";
    //  $run1=mysqli_query($con,$sel1) or die(mysqli_error($con));
    //  while($rows1=mysqli_fetch_array($run1))
    //  {
    //      $mentor_id=$rows1['c_id'];
    //      $sub_id=$rows1['sub_id'];
       
         
    //      $cmd1="select * from apply_for_subject where sub_id='$sub_id' ";
    //     $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
    //     while($row12=mysqli_fetch_array($result1))
    //     {
    //         $sub_name=$row12['sub_name'];
    //         $price=$row12['price'];
    //     }  
         
       
    $dis= "select * from creator_data where c_id='$cid'";
    $return=mysqli_query($con,$dis) or die(mysqli_error($con));
    while($rows1=mysqli_fetch_array($return))
    {
        $email = $rows1['c_email'];
        $no = $rows1['c_cno'];
        $addr = $rows1['c_addr'];
        $c_name=$row1['c_name'];
        $c_lname=$row1['c_lname'];
        $name=$c_name . ' ' . $c_lname;
    }
//}
        
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Invoice</title>
		<link rel="stylesheet" href="design/css/invoice.css">
		<link rel="license" href="https://www.opensource.org/licenses/mit-license/">
        <link rel ="icon" href="../img/icons/favicon.png" type = "image/x-icon">
	</head>
	<body>
		<header>
			<h1>Invoice</h1>
			
        			<address>
        			    <strong><b>Admin Data :</b></strong><br>
        			    Name:Zocarro Admin<br/>
        				E-mail:contact@videobooks.zocarro.com<br>
        			Contact No.9099535481<br>
        			Address: 307-"Capital"-Compalex,Top3,Bhavnagar.<br>
        		<br>
        			</address>
			    
			    
        			<address style="margin-left:300px;">
        				<strong><b>Mentor Data :</b></strong><br>
        				E-mail: <?php echo $email; ?><br>
        			Contact No.: <?php echo $no; ?><br>
        			Address: <?php echo $addr; ?><br>
        			Date: <?php echo $todaysdate; ?><br>
        		<br>
        			</address>
			    
			<!--<span><img alt="" src="http://www.jonathantneal.com/examples/invoice/logo.png"><input type="file" accept="image/*"></span>-->
		</header>
		<article>
			
		
			
			<table class="meta" style="width:350px;float:right;">
			    
				
				<tr>
					<th><span><b>Bill ID</b></span></th>
					<td><span><?=$b_id;?></span></td>
				</tr>
				
				<tr>
					<th><span><b>Payment Method</b></span></th>
					<td><span><?=$p_mode;?></span></td>
				</tr>
				
					<tr>
					<th><span><b>Transaction Time</b></span></th>
					<td><span><?=$time;?></span></td>
				</tr>
			</table>
			
			<table class="inventory">
				<thead>
					<tr>
						<th style="width:5%;"><span>Sr No.</span></th>
						<th style="width:10%;"><span>Order ID</span></th>
						<th style="width:10%;"><span>Transaction ID</span></th>
						<th style="width:10%;"><span>Final Amount</span></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><span><?php echo 1; ?></span></td>
						<td><span><?php echo $o_id; ?></span></td>
						<td align="center" style="padding-right:50px;"><span><?php echo $t_id; ?></span></td>
					   <td style="padding-right:45px;"><span>???<?php echo $total; ?></span></td>
					</tr>
				
					
				</tbody>
			</table>
			
			<table class="balance">
			
				<tr>
					<th><span>Total </span></th>
					<td style="padding-right:45px;"><span data-prefix>???</span><span><?php echo $total; ?></span></td>
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