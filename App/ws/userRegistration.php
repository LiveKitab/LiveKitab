<?php 

    include '../inc/connection.php';

// 	$u_id = $_POST['u_id'];

  
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $username = htmlspecialchars ($username);
    
    $u_conn = mysqli_real_escape_string($conn,$_POST['u_conn']);
    $u_conn = htmlspecialchars ($u_conn);
    
    $u_email = mysqli_real_escape_string($conn,$_POST['u_email']);
    $u_email = htmlspecialchars ($u_email);
    
    $u_city = mysqli_real_escape_string($conn,$_POST['u_city']);
    $u_city = htmlspecialchars ($u_city);
    
    $u_state = mysqli_real_escape_string($conn,$_POST['u_state']);
    $u_state = htmlspecialchars ($u_state);
    
    $u_pswd = mysqli_real_escape_string($conn,$_POST['u_pswd']);
    $u_pswd = htmlspecialchars ($u_pswd);

	$u_status = 0;
	$u_block = 0;
	
// 	$u_id = "USERID16";
// 	$username = "TestR1eg";
// 	$u_conn = "1234456269";
// 	$u_email = "tesrtin2@gmail.com";
// 	$u_city = "Leela2Circle1";
// 	$u_state = "Sids2ar";
// 	$u_pswd = "abc@12233";
// 	$u_status = 0;
// 	$u_block = 0;
	
	$newpass=password_hash($u_pswd, PASSWORD_DEFAULT);
	$today=date('Y-m-d');
	$response = array();
	$loginstatus = array();

	$sel = "select * from user_data where u_cno='$u_conn'";
    $val = mysqli_query($conn,$sel) or die(mysqli_error($conn));
    $count=mysqli_num_rows($val);
    if($count==0)
    {
    
    	$cmd="SELECT id FROM user_data ORDER BY id DESC LIMIT 1";
        $result=mysqli_query($conn,$cmd) or die(mysqli_error($conn));
        if(mysqli_fetch_row($result)<1)
        {
                    $id = 0;
        }
    
        else
        {
            $cmd1="SELECT id FROM user_data ORDER BY id DESC LIMIT 1";
            $result1=mysqli_query($conn,$cmd1) or die(mysqli_error($conn));
            while($row=mysqli_fetch_array($result1))
            {
                $id=$row['id'];
                
            }
        }
        $id = $id + 1;
        $prefix = 'USER';
    	$user_id = $prefix.$id;
    // 	echo $user_id;
        
    	$stmt = "INSERT INTO user_data(u_id, username, u_fname, u_lname, u_cno, u_email, u_addr, u_state, u_city, stream, program, department,term_id, u_img, u_field,
    	u_pwd, u_regid, u_joindate, u_status, u_block) 
             VALUES ('$user_id','$username','NOT SET','NOT SET','$u_conn','$u_email','NOT SET','$u_state','$u_city','STREAM NOT SET','PROGRAM NOT SET','DEPARTMENT NOT SET','TERM NOT SET','NOT SET','NOT SET','$newpass','NOT SET','$today','1','0')";
        // echo $stmt;
    	$result = mysqli_query($conn,$stmt) or die(mysqli_error($conn));
    	if($result)
    	{
    	    
    		$message = "Success";
    		   $cmd2="SELECT * FROM user_data where u_id  ='$user_id'";
             $result2=mysqli_query($conn,$cmd2) or die(mysqli_error($conn));
              while($row1=mysqli_fetch_array($result2))
               {
                	   	$loginstatus['u_id'] =$row1['u_id'];
                	   	$loginstatus['u_cno'] =$row1['u_cno']; 
                	    $loginstatus['username'] =$row1['username']; 
                	    $loginstatus['u_email'] = $row1['u_email'];
                	    $loginstatus["loginstatus"] = 0;
                	    $loginstatus['stream'] = $row1['stream'];
                	    $loginstatus['program'] =$row1['program'];
                	    $loginstatus['department'] = $row1['department'];
                	    $loginstatus['term_id'] = $row1['term_id'];
                	    $term_id = $row1['term_id'];

                	    
                	if($term_id !="TERM NOT SET")
            	   	{
            	   	    $sql3="SELECT t.med from term_data t where term_id ='$term_id '";
            	   	    $result4=mysqli_query($conn,$sql3);
            	   	    $row3=mysqli_fetch_assoc($result4);
            	   	    $med=$row3['med'];
            	   	}
            	   	else
            	   	{
            	   	     $med="MEDIUM NOT SET";
            	   	
            	   	}
               	    $loginstatus['med'] = $med;

                	    
                	    
               }
                array_push($response,$loginstatus);

    	}
    	else
    	{
    		$message = "Failed";
    		$user_id = "NA";
    	}
    }
    else
    {
        /*	$sel1 = "select * from user_data where username='$username'";
            $val1 = mysqli_query($conn,$sel1) or die(mysqli_error($conn));*/
        	$message = "Number is already register";
    		$user_id = "NA";
        	//$row1=mysqli_fetch_assoc($val1);
        /*	$response['u_id']=$row1['u_id'];
        	$response['username']=$row1['username'];
        	$response['u_email']=$row1['u_email'];*/
    
    }
          
    array_unshift($response,array("message" => $message),array("user_id" =>$user_id ));
    	echo json_encode($response);
    	mysqli_close($conn);
	
?>