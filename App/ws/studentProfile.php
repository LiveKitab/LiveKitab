<?php 
    include '../inc/connection.php';
	$u_id = $_POST['u_id'];

// 	$u_id ="USER48";

		$response=array();
		$sql="SELECT u.username,u.u_email,u.u_cno,u.u_img,t.term_name,s.stream_name,s.stream_name,s.uni,p.program_name,b.b_name,t.med,ud.uni_name FROM user_data u,term_data t,stream_data s,program_data p,
		branch_data b,university_data ud WHERE u.u_id='$u_id' and u.term_id = t.term_id and u.stream = s.stream_id and u.program = p.pr_id and u.department = b.b_id and u.university =ud.university_id";
// 		echo $sql;
		$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$total = mysqli_num_rows($result);
		array_push($response,array("total"=>$total));
		While($row=mysqli_fetch_assoc($result))
		{
			$response[]=$row;	
		}
	array_unshift($response,array("error"=>"no error"));
	echo json_encode($response);
	mysqli_close($conn);
?>
