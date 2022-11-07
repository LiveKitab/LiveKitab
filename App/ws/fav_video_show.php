<?php
include '../inc/connection.php';

    $user_id=$_POST['user_id'];
    
    // $user_id="USER35";
    
	$response=array();
	$i = 0;
	$temp = array();
	
 $sql = "SELECT id,vid FROM video_wishlist WHERE user_id = '$user_id'";
	$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
	if(mysqli_num_rows($result)>0)
	{
	 $message = "Available";
     while($row=mysqli_fetch_assoc($result)) 
     {
        //  $temp['cid'] =$row['c_id'];
        $temp['id'] = $row['id'];
         $temp['vid'] = $row['vid'];
         $vid = $row['vid'];
         $i = $i +1;
        $temp['i'] = $i;
	$sql12="SELECT c_id,subject_id,v_id,ch_id,sequence,v_link,v_des,v_title
			FROM creator_video WHERE v_id ='$vid'";
			$result12=mysqli_query($conn,$sql12) or die(mysqli_error($conn));
            $count1=mysqli_num_rows($result12);
			while($row12=mysqli_fetch_assoc($result12)) 
			{
				$temp['c_id']=$row12['c_id'];
				$temp['subject_id']=$row12['subject_id'];
				$temp['ch_name']=$row12['ch_id'];
				$temp['sequence']=$row12['sequence'];
				$temp['v_id']=$row12['v_id'];
				$temp['v_title']=$row12['v_title'];
				$temp['v_des'] = $row12['v_des'];
				 $link  = $row12['v_link'];
        		 $linkfront = substr($link,0,30);
            	 $linkback = substr($link,30);
            	 $checkfront = "https://www.youtube.com/embed/";
            	 if($checkfront == $linkfront)
            	 {
            			$temp['player']='1';
            		    $temp['link'] = $linkback;
            	 }
                 else
            	 {
            			 $temp['player']='0';
            			$temp['link'] = $link;
                 }
				$temp['v_des']=$row12['v_des'];
			    array_push($response,$temp);
			}
     }
	}
	else
	{
	     $message = "Not Available";
	}
		array_unshift($response,array("message"=>$message));
	echo json_encode($response);
     mysqli_close($conn);
    ?>