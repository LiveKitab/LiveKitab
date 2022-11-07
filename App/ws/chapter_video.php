<?php
	include '../inc/connection.php';
	$response=array();
	$temp=array();
// 	if(isset($_POST['user_id'])|| isset($_POST['course_id']))
// 	{
    	$user_id=$_POST['user_id'];
		$course_id=$_POST['sub_id'];
		$c_id  = $_POST['c_id'];
		$chap_id = $_POST['chap_id'];
// 		$c_id  = "KAU1";
// 		$user_id="USER35";
// 		$course_id="SUB1";
// 		$chap_id = "CHP36";
    	$sql1="Select * from purchased_courses where user_id='$user_id' and sub_id='$course_id' and c_id = '$c_id'";
		$result1=mysqli_query($conn,$sql1)or die(mysqli_error($conn));
		$count=mysqli_num_rows($result1);
		if($count==0)
		{
			$message="Not Enrolled";
			
			$sql12="SELECT c_id,subject_id,v_id,ch_id,sequence,v_link,v_des,v_title
			FROM creator_video WHERE subject_id='$course_id' AND v_status='1' AND c_id='$c_id' AND ch_id ='$chap_id' ORDER BY sequence ";
			$result12=mysqli_query($conn,$sql12) or die(mysqli_error($conn));
            $count1=mysqli_num_rows($result12);
			while($row12=mysqli_fetch_assoc($result12)) 
			{
				$temp['c_id']=$row12['c_id'];
				$temp['subject_id']=$row12['subject_id'];
				$temp['ch_name']=$row12['ch_id'];
				$temp['sequence']=$row12['sequence'];
				$temp['v_id']=$row12['v_id'];
				$v_id2 = $row12['v_id'];
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
				 $sql23  = "select * from exercise_data where v_id = '$v_id2'"; 
                    //  echo $sql;
                    $result23 = mysqli_query($conn,$sql23) or die(mysqli_error($conn));
                    $count23=mysqli_num_rows($result23);
                    if($count23 >0)
                    {
                        while($row23 = mysqli_fetch_assoc($result23))
                        {
                            $v_id= $row['v_id'];
                            $excercise_file = $row23['excercise_file'];
                            $pdfflie = "https://videobooks.zocarro.com/videobook/Web/mentor/pdf/".$excercise_file; 
                            $temp['file'] = $pdfflie;
                        }
                    }
                    else
                    {
                        $temp['file'] = "File not found";
                    }
				
				
			    array_push($response,$temp);
			}
		}
		else
		{
	        $temp=array();
		    $message="Enrolled";
			$sql="SELECT c_id,subject_id,v_id,ch_id,sequence,v_link,v_des,v_title
			FROM creator_video WHERE subject_id='$course_id' AND v_status='1' AND c_id='$c_id' AND ch_id ='$chap_id' ORDER BY sequence LIMIT 3 ";
			//echo $sql;
			$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
            $count1=mysqli_num_rows($result);
			while($row=mysqli_fetch_assoc($result))
			{
	        	/*
				$temp['likes']=$count1;
				$temp['dislikes']=$count2;
				*/
				$temp['c_id']=$row['c_id'];
				$temp['subject_id']=$row['subject_id'];
				$temp['ch_name']=$row['ch_id'];
				$temp['sequence']=$row['sequence'];
				$temp['v_id']=$row['v_id'];
				$v_id1 = $row['v_id'];
				$temp['v_title']=$row['v_title'];
				$temp['v_des'] = $row['v_des'];
				// $temp['v_link']=$row['v_link'];
				 $link  = $row['v_link'];
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

				$temp['v_des']=$row['v_des'];
				
				  $sql22  = "select * from exercise_data where v_id = '$v_id1'"; 
                    //  echo $sql;
                    $result22 = mysqli_query($conn,$sql22) or die(mysqli_error($conn));
                    $count22=mysqli_num_rows($result22);
                    if($count22 >0)
                    {
                        while($row22 = mysqli_fetch_assoc($result22))
                        {
                            $v_id= $row['v_id'];
                            $excercise_file = $row22['excercise_file'];
                            $pdfflie = "https://videobooks.zocarro.com/videobook/Web/mentor/pdf/".$excercise_file; 
                            $temp['file'] = $pdfflie;
                        }
                    }
                    else
                    {
                        $temp['file'] = "File not found";
                    }
			
				$sql1="SELECT sub_name,sub_code
			FROM apply_for_subject WHERE sub_id='$course_id' AND c_id='$c_id'";
			//echo $sql;
			$result1=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
            $count2=mysqli_num_rows($result1);
			while($row1=mysqli_fetch_assoc($result1))
			{
	        	/*
				$temp['likes']=$count1;
				$temp['dislikes']=$count2;
				*/
				$temp['sub_name']=$row1['sub_name'];
				$temp['sub_code']=$row1['sub_code'];
					array_push($response,$temp);

				
			}
				
			}
		
		}
		
	array_unshift($response,array("total"=>$count1),array("message"=>$message));
	echo json_encode($response);
	mysqli_close($conn);
?>