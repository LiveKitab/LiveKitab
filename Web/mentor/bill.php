<?php
include("../db/mconnect.php");
$nvideo=0;
$nsubs=0;
$count=0;
$total=0;
$finalamount=0;
if(isset($_GET['qstringdata']) && isset($_GET['qstringdata1']))
{
    $cs_id = mysqli_real_escape_string($con,$_GET['qstringdata']);
    $cs_id = base64_decode($cs_id);

    $per = mysqli_real_escape_string($con,$_GET['qstringdata1']);
    $per = base64_decode($per);

    $dis1= "select * from creator_payment where course_id='$cs_id'";
    $return1=mysqli_query($con,$dis1) or die(mysqli_error($con));
    while($rows3=mysqli_fetch_array($return1))
    {
        $pm = $rows3['payment_month'];
        $py = $rows3['payment_year'];
    }
    
    $dis= "select * from course_data where course_id='$cs_id'";
    $return=mysqli_query($con,$dis) or die(mysqli_error($con));
    while($rows1=mysqli_fetch_array($return))
    {
        $count = $count+1;
        $coursename = $rows1['course_name'];
        $courseprice = $rows1['course_price'];
        $cid = $rows1['c_id'];
        $subcode = $rows1['sub_code'];
    }
    
    $sel = "select * from creator_data where c_id='$cid'";
    $run=mysqli_query($con,$sel) or die(mysqli_error($con));
    while($rows=mysqli_fetch_array($run))
    {
        $crname=$rows['c_name'].' '.$rows['c_lname'];
        $mob=$rows['c_cno'];
        $ad=$rows['c_addr'];
    }
    
    $cmd3="select id from final_video where c_id='$cid'";
    $result3=mysqli_query($con,$cmd3) or die(mysqli_error($con));
    while($row3=mysqli_fetch_array($result3))
    {
        $nvideo=$nvideo+1;
    }
    $nsubs=0;
    $cmd2="select purchased_courses.id from purchased_courses,course_data where purchased_courses.course_id=course_data.course_id and course_data.c_id='$cid' and course_data.course_id='$cs_id'";
    $result2=mysqli_query($con,$cmd2) or die(mysqli_error($con));
    while($row2=mysqli_fetch_array($result2))
    {
        $nsubs=$nsubs+1;
        $total=$courseprice*$nsubs;
    }
    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bill</title>
    <link rel ="icon" href="../img/icons/favicon.png" type = "image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700&amp;amp;subset=latin-ext" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

    <style type="text/css">
       .invoice-title h2, .invoice-title h3 {
    display: inline-block;
}

.table > tbody > tr > .no-line {
    border-top: none;
}

.table > thead > tr > .no-line {
    border-bottom: none;
}

.table > tbody > tr > .thick-line {
    border-top: 2px solid;
}

@media print {
  /* style sheet for print goes here */
  .noprint {
    visibility: hidden;
  }
}

    </style>


</head>

<body>
    
    <div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Invoice</h2><h3 class="pull-right">Subject Code: <?php echo $subcode; ?></h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
        			<strong>Payment Details :</strong><br>
        			Month: <?php echo $pm; ?><br>
        			Year: <?php echo $py; ?><br>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
        			<strong>Mentor Name :</strong><br>
        			<?php echo $crname; ?><br>
        			<?php echo $mob; ?><br>
        			<?php echo $ad; ?><br>
    				</address>
    			</div>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    					<strong>Payment Method:</strong><br>
    					<?php echo 'COD'; ?><br>
    				</address>
    			</div>
    		</div>
    		
    	
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Payment Summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
                                    <td><strong>Sr No.</strong></td>
        							<td><strong>Subject Name</strong></td>
        							<td><strong>Subject Price</strong></td>
        							<td class="text-center"><strong>Number of Video</strong></td>
        							<td class="text-center"><strong>Number of Subscribers</strong></td>
        							<td class="text-center"><strong>Mentor Percentage</strong></td>
        							<td class="text-right"><strong>Total</strong></td>
                                </tr>
                                
    						</thead>
    						<tbody>
    						    
    						    
    							<tr>
    							    <td><?php echo $count; ?></td>
    								<td><?php echo $coursename; ?></td>
    								<td><?php echo $courseprice; ?></td>
    								<td class="text-center"><?php echo $nvideo; ?></td>
    								<td class="text-center"><?php echo $nsubs; ?></td>
    								<td class="text-center"><?php echo $per; ?></td>
    								<td class="text-right"><?php echo $finalamount=(($total*$per)/100); ?></td>
    							
    							</tr>
    							
    							    
    							 <tr>
    							    <td class="thick-line"></td>
    							    <td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    			<br>
    			<!--<center><button type="button" onclick="window.print();" class="zocarro-btn"><i class="icon-print"></i> Print Invoice</button></center><br/>-->
    			<center><button type="button" onclick="printbill()" id="billprint" name="billprint" class="ps-btn">Print Bill</button></center><br/>
    		</div>
    	</div>
    </div>
</div>
<script>
function printbill() {
  $('#billprint').hide();
  window.print();
  setTimeout(function() {
  $('#billprint').show();
  }, 1000);
}
</script>
</body>
</html>
<?php
}

else
{
    header("location:account");
}
?>