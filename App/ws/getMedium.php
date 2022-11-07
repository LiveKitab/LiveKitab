<?php  

    include '../inc/connection.php';
    if(isset($_POST['pr_id']) || isset($_POST['stream_id']) || isset($_POST['b_id']))
    {
	
       $pr_id=$_POST['pr_id'];
       $stream_id=$_POST['stream_id'];
       $b_id=$_POST['b_id'];
      
      /* {stream_id=STREAM2, b_id=BID1, pr_id=PROGRAM3}*/
       /*$pr_id='PROGRAM3';
       $stream_id='STREAM2';
       $b_id='BID1';*/
        // $term_id = 'TERM14';
        
       
         
         $response=array();
    	$sql="SELECT DISTINCT med FROM term_data WHERE stream_id='$stream_id' and b_id='$b_id' and pr_id='$pr_id'";
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