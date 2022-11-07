<?php  

    include '../inc/connection.php';
   
        
    
    if(isset($_POST['stream_id']))
    {
	/*{stream_id=STREAM2}*/
       $stream_id=$_POST['stream_id'];
        //$stream_id="STREAM2";
     
         
         $response=array();
    	$sql="SELECT  pr_id, program_name FROM program_data WHERE stream_id='$stream_id'";
    // 	echo $sql;
    	$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    	while($row=mysqli_fetch_assoc($result))
    	{
    		$response[]=$row;
    	}
    	
    	echo json_encode($response);	
    	mysqli_close($conn);
    }
	
?>