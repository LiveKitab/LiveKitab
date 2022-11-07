<?php
include '../inc/connection.php';

$sub_id = $_POST['sub_id'];
$chap_id = $_POST['chap_id'];
$c_id = $_POST['c_id'];

// $sub_id = 'SUB1';
// $chap_id ='CHP36';
// $c_id ='KAU1';
 $i = 0;


$response = array();
 $temp = array();
 $sql  = "select * from exercise_data where subject_id = '$sub_id' and c_id ='$c_id' and ch_id = '$chap_id'"; 
//  echo $sql;
 $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
 	$count1=mysqli_num_rows($result);
 	if($count1 >0)
 	{
        while($row = mysqli_fetch_assoc($result))
        {
           $temp['v_id']= $row['v_id'];
            $v_id= $row['v_id'];
              $i = $i +1;
            $excercise_file = $row['excercise_file'];
            $pdfflie = "https://videobooks.zocarro.com/videobook/Web/mentor/pdf/".$excercise_file; 
            $temp['file'] = $pdfflie;
                        $temp['sequence'] = $i;

            $sql1 = "SELECT DISTINCT * FROM creator_video where v_id ='$v_id' LIMIT 1";
        // echo $sql;
        $result1 = mysqli_query($conn,$sql1) or die(mysqli_error($conn));
        $count2 = mysqli_num_rows($result1);
            while($row1 = mysqli_fetch_assoc($result1))
            {
                    // $temp['c_id'] = $row['c_id'];
                     $temp['v_title'] =  $row1['v_title'];
                    $temp['v_des'] = $row1['v_des'];
                    // $temp['sequence'] = $row1['sequence'];

                    // $temp['v_link'] = $row1['v_link'];
                      $link = $row1['v_link'];
                     $linkfront = substr($link,0,30);
            	     $linkback = substr($link,30);
                	 $checkfront = "https://www.youtube.com/embed/";
                	 if($checkfront == $linkfront)
                	 {
                			$temp['player']='1';
                		    $temp['v_link'] = $linkback;
                	 }
                     else
                	 {
                			 $temp['player']='0';
                			$temp['v_link'] = $link;
                     }
                     array_push($response,$temp);  
            }
                                   

        }
 	}
 	     array_unshift($response,array("total"=>$count1 ." Material" ));

 	echo json_encode($response);
	 mysqli_close($conn);

?>
