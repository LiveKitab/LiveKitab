<?php
include '../inc/connection.php';

    $sub_id = $_POST['course_id'];
    $user_id=$_POST['user_id'];
    $cid = $_POST['c_id'];
    
    // $sub_id = "SUB8";
    // $user_id="USER35";
    // $cid = 'KAU1';
    $v_id = '0';
    
	$response=array();
	$temp=array();
	$review = "0";
	
	
 $sql = "SELECT DISTINCT c.des,c.remarks,c.days,c.sub_code,c.c_id,c.sub_name, c.sub_duration, c.price, c.discount,c.sub_id
        FROM apply_for_subject c where c.sub_id='$sub_id' AND c.c_id ='$cid'";
 $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    while($row=mysqli_fetch_assoc($result)) 
    {
         $temp['c_id']=$row['c_id'];
         $temp['sub_id']=$row['sub_id'];
         $subject_id1 = $row['sub_id'];
         $c_id1 = $row['c_id'];
         $temp['sub_name']=$row['sub_name'];
         $temp['des']=$row['des'];
         $dis  =  $row['discount'];
         $temp['sub_duration']=$row['sub_duration'];
         $temp['remarks']=$row['remarks'];
        $temp['discount'] = $row['discount'];

         $temp['days'] = $row['days'];
         $temp['price']=$row['price'];
         $op = $row['price'];
         $np = $op-($op * $dis)/100;
        $temp['remarks']=$row['remarks'];
         $temp['nprice'] = round($np);
         $temp['sub_code']=$row['sub_code'];
        
        $videosql = "SELECT DISTINCT f.v_id,f.v_link,f.ch_id
        FROM creator_video f WHERE f.subject_id='$subject_id1' AND f.c_id ='$c_id1' ORDER BY f.sequence LIMIT 1";
        // echo $videosql;
        $videoresult=mysqli_query($conn,$videosql) or die(mysqli_error($conn));
        $countvideosql = mysqli_num_rows($videoresult);
        // echo $countvideosql; 
        if($countvideosql==0)
		{
	       	$v_id = '0';
	       	$link123 = 'Abcccc';
	       	$temp['link'] = $link123;
		} 
		else
		{
		         while($videorow=mysqli_fetch_assoc($videoresult)) 
                {
                                $v_id=$videorow['v_id'];
                                $link  = $videorow['v_link'];
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
                } 
		}
       
        $temp['v_id'] =$v_id; 
        $creatorsql = "SELECT DISTINCT cd.c_img,cd.c_edu,cd.c_spec FROM creator_data cd WHERE c_id ='$c_id1'";
        $creatoresult=mysqli_query($conn,$creatorsql) or die(mysqli_error($conn));
        while($creatorow=mysqli_fetch_assoc($creatoresult)) 
        {
                 $temp['c_img']= $creatorow['c_img'];
                 $temp['c_edu']= $creatorow['c_edu'];
                 $temp['c_spec']= $creatorow['c_spec'];
        }
		 $sql1="select avg(rating) 'rating' from course_feedback where sub_id='$subject_id1' AND c_id ='$cid'";
    	 $result1=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
    	 if (mysqli_num_rows($result1)>0) 
    	 {
        	while ( $row12=mysqli_fetch_assoc($result1)) 
        	{
        	    $rating = $row12['rating'];
        	}
        	if($rating=="")
        	{
        	     $review = "0";
        	}
        	else
        	{
        	     $review = $rating;
        	}
    	 }
    	 else 
    	 {
    	    $review="0";
    	 }
    	 $temp['review']= round($review,2);
    	 
    	 $sql2="select user_id from purchased_courses where sub_id='$sub_id'  AND c_id ='$cid' ";
         $result2=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
         $count=mysqli_num_rows($result2);
         $temp['enrolled']=$count;
         $cmd="SELECT t.bill_id,t.order_id,p.transaction_id,p.user_id,t.status FROM purchased_courses p,user_transaction t WHERE p.user_id='$user_id' AND p.sub_id='$sub_id' AND p.c_id = '$cid' and p.transaction_id=t.transaction_id
         and t.status='Success'";
         $result3=mysqli_query($conn,$cmd) or die(mysqli_error($conn));
         $count1=mysqli_num_rows($result3);
         //echo $cmd;
         if($count1==0)
    	{
    	    $temp['purschased']="false";
    	    $temp['order_id']="NA";
    	    $temp['transaction_id']="NA";
    	    $temp['bill_id']="NA";
    	}
    	else
    	{
    	      $temp['purschased']="true";
    	    while($row1 = mysqli_fetch_assoc($result3))
    	    {
    	        $temp['transaction_id']=$row1['transaction_id'];
    	        $temp['bill_id']=$row1['bill_id'];
    	        $temp['order_id']=$row1['order_id'];

    	    }
    	}
     		array_push($response, $temp);
     }

     echo json_encode($response);
     mysqli_close($conn);
    ?>