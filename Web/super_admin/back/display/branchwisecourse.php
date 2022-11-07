<?php
    include("../../../db/connect.php");
    $id = mysqli_real_escape_string($con,$_POST['id']);
    $cmd1="select b_id from branch_data where id='$id' LIMIT 1";
                            $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
                            while($row1=mysqli_fetch_array($result1))
                            {     
                                  $b_id=$row1['b_id'];
                            }
    $output='';
?>


<?php
$cmd="select * from course_data where b_id='$b_id' order by id desc LIMIT 20";
                            $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
                            while($row=mysqli_fetch_array($result))
                            { 
$output .= '
                                    <div class="grid-item">
                                        <div class="grid-item__content-wrapper">
                                            <div class="ps-product--photo"><a><img src="../src/course/'.$row['course_bg'].'" alt=""></a>
                                                <div class="ps-product__content"><a><span>'.$row['course_name'].'</span></a>
                                                        <ul class="ps-product__actions">
                                                        <li><a class="viewcourse" title="Quick View" style="cursor:pointer;"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
}
echo $output;
?>