<?php  

    include '../inc/connection.php';
	
   $uni = $_POST['uni'];
    // $uni ='UNIVER3';
   
    //$uni = "GTU";
    /* $u_id = "USER5";
     $contact = "9898989898";*/
     $unitype ="";
     $response=array();
	$sql="SELECT stream_id, stream_name FROM stream_data where uni = '$uni'";
	//echo $sql;
	$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
	while($row=mysqli_fetch_assoc($result))
	{
		$response[]=$row;
	}
if($uni == "UNIVER3" )
{
    $unitype ="gone";
}
else
{
     $unitype ="visible";
}

array_unshift($response,array("change" => $unitype));
	echo json_encode($response);	
	mysqli_close($conn);
	
?>