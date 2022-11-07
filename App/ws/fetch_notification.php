<?php
    include '../inc/connection.php';
    $count = 0;
	$temp=array();
	$response = array();
    $sql = "SELECT * FROM notice WHERE status = '1' ORDER BY id DESC";
    $result = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);
    if($count > 0) 
{
        while($row=mysqli_fetch_assoc($result)) {
                    $temp['nt_id']=$row['nt_id'];
                    $temp['title']=$row['title'];
                    $temp['description']=$row['des'];
                    $temp['date']=$row['date'];
                    $temp['status']=$row['status'];
                    array_push($response, $temp);
                }
            $message = "notification available";
    } else {
        $message = "No notification available";
    }
    array_unshift($response,array("total"=>$count),array("message"=>$message));
    echo json_encode($response);
    mysqli_close($conn);
?>