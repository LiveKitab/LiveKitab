<?php
        session_start();
		//error_reporting(0);
        $urlpath = 'https://zocarro.com/';
		$con=mysqli_connect("localhost","zocaryzg","Zocarro@#1150","zocaryzg_videobook") or die("ERROR IN CONNECTION");

        $e_email = $_SESSION['e_email'];

        $sel = "select * from editor_data where e_email='$e_email'";
        $run = mysqli_query($con,$sel) or die(mysqli_error($con));
        while($editor_data = mysqli_fetch_array($run))
        {
            $e_name = $editor_data['e_name'];
            $e_cno = $editor_data['e_cno'];
            $e_id = $editor_data['e_id'];
        }
        date_default_timezone_set("Asia/Kolkata");
    	$query_date = date("Y-m-d h:i:s");

?>

