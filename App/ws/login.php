<?php
include '../inc/connection.php';
/*if(isset($_POST['u_email']) || isset($_POST['u_pwd']) )
{*/

$u_email = mysqli_real_escape_string($conn,$_POST['u_email']);
$u_email = htmlspecialchars ($u_email);

$u_pwd = mysqli_real_escape_string($conn,$_POST['u_pwd']);
$u_pwd = htmlspecialchars ($u_pwd);

$reg_id = $_POST['reg_id'];

// $u_email = "9662454545";
// $u_pwd = "abc@123";

$response = array();
$loginstatus = array();

$stmt = "SELECT u.u_cno, u.u_id,u.u_pwd,u.username,u.u_email,u.u_img,u.stream,u.program,u.department,u.term_id from user_data u where u.u_cno ='$u_email'";
$run = mysqli_query($conn, $stmt) or die(mysqli_error($conn));
if (mysqli_num_rows($run) > 0) {
    while($row = mysqli_fetch_assoc($run)) {
        $u_cno = $row['u_cno'];
        $u_id = $row['u_id'];
        $password1 = $row['u_pwd'];
        $username = $row['username'];
        $u_email = $row['u_email'];
        $u_img = $row['u_img'];
        $stream = $row['stream'];
        $program = $row['program'];
        $department = $row['department'];
        $term_id = $row['term_id'];
			if (password_verify($u_pwd,$password1)) {
            	   	$sql2="UPDATE user_data SET u_status='1',u_regid ='$reg_id'  WHERE u_id='$u_id' ";
            	   	$result=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
            	   	if($term_id!="TERM NOT SET") {
            	   	    $sql3="SELECT t.med from term_data t where term_id ='$term_id '";
            	   	    $result1=mysqli_query($conn,$sql3);
            	   	    $row3=mysqli_fetch_assoc($result1);
            	   	    $med=$row3['med'];
            	   	} else {
            	   	     $med="MEDIUM NOT SET";
            	   	}
            	   	
            		if($result) {
                		$loginstatus["loginstatus"] = 0;
                	    $loginstatus["message"] = "Login Success";
                	   	$loginstatus['u_id'] = $u_id;
                	   	$loginstatus['u_cno'] = $u_cno;
                	    $loginstatus['username'] = $username;
                	    $loginstatus['u_email'] = $u_email;
                	    $loginstatus['u_img'] = $u_img;
                	    $loginstatus['stream'] = $stream;
                	    $loginstatus['program'] = $program;
                	    $loginstatus['department'] = $department;
                	    $loginstatus['term_id'] = $term_id;
                	    $loginstatus['med'] = $med;
            		} else {
                    	    $loginstatus["loginstatus"] = 1;
				            $loginstatus["message"] = "Invalid username or password";
                    	}
			       }
			       else 
			       {
                		$loginstatus["loginstatus"] = 2;
                		$loginstatus["message"] = "Invalid username or password";
			       }
        }
	}
	else
	{
		$loginstatus["loginstatus"] = 3;
		$loginstatus["message"] = "Invalid username or password";
	}
echo json_encode($loginstatus);
mysqli_close($conn);
?>