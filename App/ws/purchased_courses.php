<?php
	include '../inc/connection.php';
	$response=array();
	
	$user_id = mysqli_real_escape_string($conn,$_POST['user_id']);
    $user_id = htmlspecialchars ($user_id);
    
    $subject_id = mysqli_real_escape_string($conn,$_POST['course_id']);
    $subject_id = htmlspecialchars ($subject_id);
    
    $price = mysqli_real_escape_string($conn,$_POST['price']);
    $price = htmlspecialchars ($price);
    
    $oldprice = mysqli_real_escape_string($conn,$_POST['oldprice']);
    $oldprice = htmlspecialchars ($oldprice);
    
    $discount = mysqli_real_escape_string($conn,$_POST['discount']);
    $discount = htmlspecialchars ($discount);

    $cid = mysqli_real_escape_string($conn,$_POST['c_id']);
    $cid = htmlspecialchars ($cid);
    
    $payment_mode = mysqli_real_escape_string($conn,$_POST['payment_mode']);
    $payment_mode = htmlspecialchars ($payment_mode);
    
    $tran_id = mysqli_real_escape_string($conn,$_POST['tran_id']);
    $tran_id = htmlspecialchars ($tran_id);
    
    $status = mysqli_real_escape_string($conn,$_POST['status']);
    $status = htmlspecialchars ($status);
    
    $time = mysqli_real_escape_string($conn,$_POST['time']);
    $time = htmlspecialchars ($time);
    
    $BankName = mysqli_real_escape_string($conn,$_POST['BankName']);
    $BankName = htmlspecialchars ($BankName);
    
    $TXNIDPAYTM = mysqli_real_escape_string($conn,$_POST['TXNIDPAYTM']);
    $TXNIDPAYTM = htmlspecialchars ($TXNIDPAYTM);
    
    $type = "Student";
    $type1 = "Mentor";
    
    $transaction_random = rand(1111,9999);
    $order_random = rand(1111,9999);
     $bill_random = rand(1111,9999);

    $mentorprice = 0;
    
    // $user_id = "USER1";
    // $subject_id = "COURSE1";
    // $price = "300";
    // $discount = "5";
    
    $today=date('Y-m-d');
    
   $creatorsql="SELECT discount FROM creator_data where c_id = '$cid'";
   
        	//echo $cmd;
            $creatorsqlresult=mysqli_query($conn,$creatorsql) or die(mysqli_error($conn));
            while($creatorsqlresultrow = mysqli_fetch_array($creatorsqlresult))
            {
                $discountcreator = $creatorsqlresultrow['discount'];
            }
            $mentorprice = (($price *$discountcreator) /100);
            $mentorprice = round($mentorprice);    
            
            $cmd="SELECT id FROM user_transaction ORDER BY id DESC LIMIT 1";
        	//echo $cmd;
            $result3=mysqli_query($conn,$cmd) or die(mysqli_error($conn));
            if(mysqli_num_rows($result3)<1)
            {
                        $id = 0;
            }
            else
            {
                $cmd1="SELECT id FROM user_transaction ORDER BY id DESC LIMIT 1";
                $result4=mysqli_query($conn,$cmd1) or die(mysqli_error($conn));
                while($row=mysqli_fetch_array($result4))
                {
                    $id=$row['id'];
                }
            }
            $id = $id + 1;
            $prefix = 'TRAN';
        	$transaction_id = $prefix.$transaction_random.$id;
        	
        	
            $order = 'ORDER';
            $orderid = $order.$order_random.$id;
            
            
            $bill = 'BILL';
            $billid = $bill.$bill_random.$id;
            
    $sql1="Select * from purchased_courses where user_id='$user_id' and sub_id='$subject_id' and c_id = '$cid'";
	//echo $sql1;
	$result1=mysqli_query($conn,$sql1)or die(mysqli_error($conn));
	$count=mysqli_num_rows($result1);
	//echo $count;
	if($count==0)
	{
        	 //echo $transaction_id;
	
			$sql = "INSERT INTO purchased_courses(c_id,user_id, type, pkg_id, sub_id, status, transaction_id,order_id,bill_id ,date)
			VALUES ('$cid','$user_id','$type','Not Set','$subject_id','0', '$transaction_id','$orderid','$billid','$today') ";
			$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
			$sql2 = "INSERT INTO user_transaction(user_id,type,transaction_id,bill_id,order_id,BankName,payment_mode,amount,c_amount,discount,TXNIDPAYTM,transaction_time,status)
			VALUES ('$user_id','$type','$transaction_id','$billid','$orderid','$BankName','$payment_mode','$price','$oldprice','$discount','$TXNIDPAYTM','$time','$status') ";
			$result2=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
// 			echo $sql2;
			$sql15 = "INSERT INTO mentor_transaction(c_id,type,transaction_id,bill_id,order_id,BankName,payment_mode,amount,TXNIDPAYTM, transaction_time,status)
			VALUES ('$cid','$type1','$transaction_id','$billid','$orderid','Not Set','Not Set','$mentorprice','Not Set','Not Set','pending') ";
			$result15=mysqli_query($conn,$sql15) or die(mysqli_error($conn));
			
			if($result2 && $result && $result15)
			{
				$response['message']="Course Enrolled";
				$response['transaction_id']=$transaction_id;
			}
			else
			{
				$response['message']="Failed to Enrolled";
			}
		}
		else
		{
		    $sql12="UPDATE purchased_courses SET order_id ='$orderid',	bill_id='$billid', transaction_id= '$transaction_id',date ='$today' WHERE user_id='$user_id' AND sub_id='$subject_id' AND c_id ='$cid'";
		  //  echo $sql12;
            $result12 =mysqli_query($conn,$sql12) or die(mysqli_error($conn));
            $sql13 = "INSERT INTO user_transaction(user_id,type,transaction_id,bill_id,order_id,BankName,payment_mode,amount,c_amount,discount,TXNIDPAYTM, transaction_time,status)
			VALUES ('$user_id','$type','$transaction_id','$billid','$orderid','$BankName','$payment_mode','$price','$oldprice','$discount','$TXNIDPAYTM','$time','$status') ";
			$result13=mysqli_query($conn,$sql13) or die(mysqli_error($conn));
			$sql14 = "INSERT INTO mentor_transaction(c_id,type,transaction_id,bill_id,order_id,BankName,payment_mode,amount,TXNIDPAYTM, transaction_time,status)
			VALUES ('$cid','$type1','$transaction_id','$billid','$orderid','Not Set','Not Set','$mentorprice','Not Set','Not Set','pending') ";
			$result14=mysqli_query($conn,$sql14) or die(mysqli_error($conn));
          	if($result12 && $result13 && $result14)
			{
				$response['message']="Course Update";
				$response['transaction_id']=$transaction_id;
			}
			else
			{
				$response['message']="Failed to Update";
			}
		}
	 echo json_encode($response);
	 mysqli_close($conn);
?>