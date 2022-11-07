<?php

include '../inc/connection.php';
$date1 = date("Y-m-d-H.i.s");

    $response = array();
	$cmd="SELECT id FROM user_transaction ORDER BY id DESC LIMIT 1";
        	//echo $cmd;
            $result3=mysqli_query($conn,$cmd) or die(mysqli_error($conn));
            if(mysqli_num_rows($result3)<1)
            {
                $id = 0;
            }
            else
            {
                $cmd1="SELECT id FROM user_transaction ORDER BY id DESC LIMIT 1";
                $result4=mysqli_query($conn,$cmd1) or die(mysqli_error($conn));
                while($row=mysqli_fetch_array($result4))
                {
                    $id=$row['id'];
                }
            }
           $videobook =  uniqid();
            // $order = 'ZOCVIDEOBOOK1234';
            $orderid = $videobook;
            
    $response['order_id'] = $orderid;
    echo json_encode($response);
    mysqli_close($conn);
    ?>