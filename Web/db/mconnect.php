<?php
        session_start();
		//error_reporting(0);
        //$urlpath = 'https://zocarro.com/';
		$con=mysqli_connect("localhost","zocaryzg","Zocarro@#1150","zocaryzg_videobook") or die("ERROR IN CONNECTION");

        $c_email = $_SESSION['c_email'];

        $sel = "select * from creator_data where c_email='$c_email'";
        $run = mysqli_query($con,$sel) or die(mysqli_error($con));
        while($creator_data = mysqli_fetch_array($run))
        {
            $c_name = $creator_data['c_name'];
            $c_cno = $creator_data['c_cno'];
            $c_id = $creator_data['c_id'];
        }
        date_default_timezone_set("Asia/Kolkata");
    	$query_date = date("Y-m-d h:i:s");

?>

