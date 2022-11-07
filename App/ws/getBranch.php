<?php  

    include '../inc/connection.php';
    if(isset($_POST['pr_id']) || isset($_POST['stream_id']))
    {
	
       $pr_id=$_POST['pr_id'];
       $stream_id=$_POST['stream_id'];
        // $uni=$_POST['uni'];
     /*  $pr_id='PROGRAM1';
       $stream_id='STREAM1';*/
    //   $uni = 'GTU';
        
       
         
         $response=array();
    	$sql="SELECT  b_id, b_name FROM branch_data WHERE stream_id='$stream_id' and pr_id='$pr_id' order by b_name asc";
        //	echo $sql;
    	$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    	while($row=mysqli_fetch_assoc($result))
    	{
    		$response[]=$row;
    	}
    	
    	echo json_encode($response);	
    	mysqli_close($conn);
    }
	
?>