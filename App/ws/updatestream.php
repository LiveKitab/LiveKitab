<?php  

    include '../inc/connection.php';
	if(isset($_POST['u_id']) || isset($_POST['stream']) ||isset($_POST['dep']) || isset($_POST['program']))
	{

    $u_id = mysqli_real_escape_string($conn,$_POST['u_id']);
    $u_id = htmlspecialchars ($u_id);

    $stream = mysqli_real_escape_string($conn,$_POST['stream']);
    $stream = htmlspecialchars ($stream);
    
    $dep = mysqli_real_escape_string($conn,$_POST['dep']);
    $dep = htmlspecialchars ($dep);
    
    $program = mysqli_real_escape_string($conn,$_POST['program']);
    $program = htmlspecialchars ($program);
    
    $term_id = mysqli_real_escape_string($conn,$_POST['term_id']);
    $term_id = htmlspecialchars ($term_id);
    
    
    $uni = mysqli_real_escape_string($conn,$_POST['uni']);
    $uni = htmlspecialchars ($uni);
     
     /*$u_id ="USER13";
     $stream ="STREAM1";
     $dep ="BID1";
     $program="PROGRAM3";
     $term_id = "TERM5";*/
    
    
     
     $response=array();
	$sql="Update user_data set stream='$stream',department='$dep',program='$program',term_id = '$term_id',university ='$uni' where u_id='$u_id' ";
	$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
	if($result)
	{
		$response['message']="Data Updated";
	}
	else
	{
		$response['message']="Data not Updated";
	}
	echo json_encode($response);	
	mysqli_close($conn);
	}
?>