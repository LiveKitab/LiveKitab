<?php

	require_once '../inc/connection.php';
	
	//this is our upload folder 
	$upload_path = '../../Web/src/user/';
	
	
	
	//creating the upload url 
	$upload_url = 'http://www.videobooks.zocarro.com/videobook/Web/src/user/'; 
	
	//response array 
	$response = array(); 
	
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		//checking the required parameters from the request 
		if(isset($_POST['name']) and isset($_FILES['image']['name'])){
			
		
			
			//getting name from the request 
			$u_id = $_POST['name'];
			//$u_id="USER26";
			
			//getting file info from the request 
			$fileinfo = pathinfo($_FILES['image']['name']);
			
			//getting the file extension 
			$extension = $fileinfo['extension'];
			$date1=date("Y-m-d-h:i:s");
            $setdate=date("Y-m-d h:i:s");
            $name = $date1."-".$u_id.".jpg";
            $name1=$date1."-".$u_id;
			
			//file url to store in the database 
			$file_url = $upload_url . $name1 . '.' . $extension;
			
			//file path to upload in the server 
			$file_path = $upload_path . $name1  . '.'. $extension; 
			move_uploaded_file($_FILES['image']['tmp_name'],$file_path);
				$sql="Select u_img from user_data where u_id='$u_id' ";	
            	//echo $sql;
            	$result=mysqli_query($conn,$sql) or die(mysqli_close($conn));
            	$count=mysqli_num_rows($result);
            	//echo $count;
            	$row=mysqli_fetch_assoc($result);
            	 $u_img=$row['u_img'];
                
		
            	if($u_img=="NOT SET")
            	{
                 
            	    //echo $u_img;
            	    $filepath="../../Web/src/user/$u_img";
            	     $response=array();
                   $stmt = $conn->prepare("UPDATE user_data set u_img ='$name' where u_id = '$u_id'");
                   if ($stmt->execute()) {
                	$response["message"] = "success";
                		//file_put_contents($imagePath,base64_decode($doc));
                		 unlink($filepath);
                	}
            	
            	}
            	else
            	{
            	   $response=array();
                   $stmt = $conn->prepare("UPDATE user_data set u_img ='$name' where u_id = '$u_id'");
                   if ($stmt->execute()) {
                	$response["message"] = "success";
                		
                	}
            	}
            	
            	
			
			
			//closing the connection 
			mysqli_close($conn);
		}else{
			$response['error']=true;
			$response['message']='Please choose a file';
		}
		
	}
	
	
	/*
		We are generating the file name 
		so this method will return a file name for the image to be upload 
	*/
	/*function getFileName(){
		$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');
		$sql = "SELECT max(id) as id FROM images";
		$result = mysqli_fetch_array(mysqli_query($con,$sql));
		
		mysqli_close($con);
		if($result['id']==null)
			return 1; 
		else 
			return ++$result['id']; 
	}*/



?>