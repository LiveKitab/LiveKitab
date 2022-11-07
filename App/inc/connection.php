<?php

date_default_timezone_set("Asia/Kolkata");

define('DB_USER', "zocaryzg"); // db user
define('DB_PASSWORD', "Zocarro@#1150"); // db password (mention your db password here)
define('DB_DATABASE', "zocaryzg_videobook"); // database name
define('DB_SERVER', "localhost"); // db server
$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE);
  
  
// Check connection
if(mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
/*class Login { 
      
    public static  function logincheck($stu_id,$token) { 
         static $message; 
         $conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE);
        $sel = "select status from master_student where stu_id='$stu_id' LIMIT 1";
		$ex = mysqli_query($conn,$sel) or die (mysqli_error($conn));
		while($row = mysqli_fetch_assoc($ex))
		{
		    $status = $row['status'];
		}
		if($status != $token)
		{
		    $message= 'Logout';
		}
		else
		{
            $message='Stay Login';   
		}
	    return $message; 
       
    } 
} */
 
?>