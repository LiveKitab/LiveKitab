<?php  
    include '../inc/connection.php';
    
        $stream_id = $_POST['stream_id'];
        $pr_id = $_POST['pr_id'];
        $b_id = $_POST['b_id'];
        $term_id = $_POST['term_id'];
        
        /*
        $stream_id = "STREAM2";
        $pr_id = 'PROGRAM27';
        $b_id = "BID1";
        $term_id = "TERM2";
        */
        
        $response=array();
        
    	$sql="SELECT DISTINCT price, dis, descr, pkg_title, pkg_img, pkg_id  FROM package
    	WHERE stream_id='$stream_id' AND pr_id='$pr_id' AND b_id='$b_id' AND term_id='$term_id'";
        // 	echo $sql;
    	$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    	
    	while($row=mysqli_fetch_assoc($result))
    	{
    		$response[]=$row;
    	}
    	
    	echo json_encode($response);	
    	mysqli_close($conn);
?>