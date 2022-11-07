<?php
    include '../inc/connection.php';

	$response=array();
	
	$pk_id = mysqli_real_escape_string($conn,$_POST['pk_id']);
    $pk_id = htmlspecialchars ($pk_id);
    
    $u_id = mysqli_real_escape_string($conn,$_POST['u_id']);
    $u_id = htmlspecialchars ($u_id);
    
	$price = mysqli_real_escape_string($conn,$_POST['price']);
    $price = htmlspecialchars ($price);
    
    $discount = mysqli_real_escape_string($conn,$_POST['discount']);
    $discount = htmlspecialchars ($discount);
    
   /* {pk_id=PACKAGE1, u_id=USER46, price=4500, discount=10}*/
    
	/*$pk_id="PACKAGE1";
	$u_id="USER46";
	$price = "4500";
	$discount = "10";*/
	
	$today=date('Y-m-d');
    $time = date('H:i:s');
	
		$sql1="SELECT * from purchased_courses WHERE user_id = '$u_id' and pkg_id='$pk_id'";
// 		echo $sql1;
		$result1=mysqli_query($conn,$sql1)or die(mysqli_error($conn));
		$count=mysqli_num_rows($result1);
		//echo $count;
		if($count==0)
		{
                	$cmd="SELECT id FROM user_transaction ORDER BY id DESC LIMIT 1";
                // 	echo $cmd;
                    $result3=mysqli_query($conn,$cmd) or die(mysqli_error($conn));
                    if(mysqli_fetch_row($result3)<1)
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
                    $prefix = 'TRA';
                	$transaction_id = $prefix.$id;
                	//echo $transaction_id;
                	 
                	       	 
            $sql="SELECT pkg_id,course_id FROM package_product WHERE pkg_id='$pk_id'";
        // 	 echo $sql;
        	$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
        	while($row=mysqli_fetch_assoc($result))
        	{
        	    $course_id=$row['course_id'];
        	    $sql3="INSERT INTO purchased_courses(transaction_id, user_id,type, pkg_id, course_id,date,status) 
        	    VALUES ('$transaction_id','$u_id', 'package','$pk_id','$course_id','$today','0')";
        	    //echo $sql1;
        	    $result3=mysqli_query($conn,$sql3) or die(mysqli_error($conn));
        	    	if($result3)
        			{
        				$response['message']="Course Enrolled";
        	        $sql2 = "INSERT INTO user_transaction(transaction_id,BankName,payment_mode,amount, discount,TXNIDPAYTM, transaction_time,status)
        			VALUES ('$transaction_id','BankName','ONLINE', '$price', '$discount','Not Set','$time','Pending') ";
        			//echo $sql2;
        			$result2=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
        			if($result2 )
        			{
        				$response['message']="Success";
        				$response['transaction_id']=$transaction_id;
        			}
        			else{
        				$response['message']="Fail";
        			}
        }
     }
	}
	else
	{
		$response['message']="Already Enrolled";
	}
	/*if($response['message']=="Course Enrolled")
	 $sql2 = "INSERT INTO user_transaction(transaction_id,BankName,payment_mode,amount, discount,TXNIDPAYTM, transaction_time,status)
			VALUES ('$transaction_id','BankName','ONLINE', '$price', '$discount','Not Set','$time','Pending') ";
			//echo $sql2;
			$result2=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
			if($result2 )
			{
				$response['message2']="Success";
				$response['transaction_id']=$transaction_id;
			}
			else{
				$response['message2']="Fail";
			}*/
  
	echo json_encode($response);
    mysqli_close($conn);
?>