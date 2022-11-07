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
	
/*
    $u_id = "USERID2";
	$username = "TestReg";
	$u_conn = "1234455669";
	$u_email = "testing@gmail.com";
	$u_city = "LeelaCircle";
	$u_state = "Sidsar";
	$u_pswd = "abc@123";
	$u_status = 0;
	$u_block = 0;
*/
	
	$newpass=password_hash($u_pswd, PASSWORD_DEFAULT);
	$today=date('Y-m-d');
	$response = array();

	$sel = "select * from user_data where username='$username' and u_cno='$u_conn' and u_email='$u_email' and u_city='$u_city' and u_state='$u_state'";
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
        
    
    	$stmt = "INSERT INTO user_data(u_id, username, u_fname, u_lname, u_cno, u_email, u_addr, u_state, u_city, stream, program, department,term_id,
    	u_img, u_field, u_pwd, u_regid, u_joindate, u_status, u_block) VALUES ('$user_id','$username','NOT SET','NOT SET','$u_conn','$u_email',
    	'NOT SET','$u_state','$u_city','STREAM NOT SET','PROGRAM NOT SET','DEPARTMENT NOT SET','TERM NOT SET','NOT SET','NOT SET','$newpass',
    	'NOT SET','$today','0','0')";
        // echo $stmt;
    	$result = mysqli_query($conn,$stmt) or die(mysqli_error($conn));
    	if($result){
    		$response['message'] = "Success";
    		$sel1 = "select * from user_data where u_id='$user_id'";
            $val1 = mysqli_query($conn,$sel1) or die(mysqli_error($conn));
            $row1=mysqli_fetch_assoc($val1);
            $response['u_id']=$row1['u_id'];
        	$response['username']=$row1['username'];
        	$response['u_email']=$row1['u_email'];

    	}
    	else{
    		$response['message'] = "Failed";
    	}
    }
    else
    {
        	$sel1 = "select * from user_data where u_email='$u_email'";
            $val1 = mysqli_query($conn,$sel1) or die(mysqli_error($conn));
        	$response['message'] = "Already Register";
        	$row1=mysqli_fetch_assoc($val1);
        	$response['u_id']=$row1['u_id'];
        	$response['username']=$row1['username'];
        	$response['u_email']=$row1['u_email'];
        	
    
    }
    	echo json_encode($response);
    	mysqli_close($conn);
	
?>