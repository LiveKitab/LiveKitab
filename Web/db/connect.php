<?php
        session_start();
		//error_reporting(0);
        $urlpath = 'https://zocarro.com/';
		$con=mysqli_connect("localhost","zocaryzg","Zocarro@#1150","zocaryzg_videobook") or die("ERROR IN CONNECTION");
        
        $sa_email = $_SESSION['sa_email'];
        
        $sel = "select * from super_admin where sa_email='$sa_email'";
        $run = mysqli_query($con,$sel) or die(mysqli_error($con));
        while($superadmin = mysqli_fetch_array($run))
        {
            $sa_name = $superadmin['sa_name'];
            $sa_cno = $superadmin['sa_cno'];
            
        }
       
        date_default_timezone_set("Asia/Kolkata");
    	$query_date = date("Y-m-d h:i:s");
        
?>

