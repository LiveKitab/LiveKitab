<?php
	
	include '../inc/connection.php';
	$response=array();

/*	if(isset($_POST['user_id']))
	{*/
		$user_id=$_POST['user_id'];
		$user_id="USER1";
		$sql1="Select * from purchased_courses where user_id='$user_id' and type='package'";
		$result1=mysqli_query($conn,$sql1)or die(mysqli_error($conn));
		$count=mysqli_num_rows($result1);
	
		while(	$row=mysqli_fetch_assoc($result1))
		{
			
		    $course_id=$row['course_id'];
		    $temp=array();
			$sql = "SELECT course_id,course_name, course_bg, course_price,course_dis, course_des FROM course_data WHERE course_id='$course_id' ";
			$result=mysqli_query($conn,$sql) or die(mysqli_error($sql));
			while($row1=mysqli_fetch_assoc($result))
			{
			    $temp['course_id']=$row1['course_id'];
			    $temp['course_name']=$row1['course_name'];
			    $temp['course_bg']=$row1['course_bg'];
			    $temp['course_price']=$row1['course_price'];
			    $temp['course_dis']=$row1['course_dis'];
                $temp['des']=$row1['course_des'];
			    array_push($response,$temp);
			}
		}
		$sql2="Select DISTINCT type from purchased_courses where user_id='$user_id' and type!='individual'";
		//echo $sql2;
		$result2=mysqli_query($conn,$sql2)or die(mysqli_error($conn));
		$count1=mysqli_num_rows($result2);
		$total=$count+$count1;
		while($row2=mysqli_fetch_assoc($result2))
		{
			
		    $pk_id=$row2['type'];
		    $temp=array();
		    $sql3="Select pkg_id,pkg_title,pkg_img,price,dis,descr from package where pkg_id='$pk_id'";
		    //echo $sql3;
		    $result3=mysqli_query($conn,$sql3)or die(mysqli_error($conn));
		    while(	$row2=mysqli_fetch_assoc($result3))
		   {
		      
    			    $temp['course_id']=$row2['pkg_id'];
    			    $temp['course_name']=$row2['pkg_title'];
    			    $temp['course_bg']=$row2['pkg_img'];
    			    $temp['course_price']=$row2['price'];
    			    $temp['course_dis']=$row2['dis'];
    			    $temp['des']=$row2['descr'];
    			    array_push($response,$temp);
    			  
    			    
    			}
		   
		}
		
		
	
	
		
	 //}
	 array_unshift($response,array("total"=>$total));
	 echo json_encode($response);
	 mysqli_close($conn);



?>