

                    
          <div class="table-responsive">
            <table id="load" class="table table-hover table-bordered zero-configuration">
              <thead class="thead-dark" align="center">
                <tr>
                    <th>Index</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Plan Duration</th>
                    <th>Booklet</th>
                    <th>Video Limit</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Approve</th> 
                    <th>Reject</th> 
                </tr>
              </thead>
              <tbody align="center">
                <?php
            $count = 0; 
              $cmd="select * from course_data ORDER BY id DESC";
              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
              while($row=mysqli_fetch_array($result))
              {     
                  $count = $count + 1;
                  $id=$row['id'];
                  $e_id=$row['e_id'];
                  $course_name=$row['course_name'];
                  $course_price=$row['course_price'];
                  $course_plan_duration=$row['course_plan_duration'];
                  $course_booklet=$row['course_booklet'];
                  $course_sdate=$row['course_sdate'];
                  $course_edate=$row['course_edate'];
                  $course_status=$row['course_status'];
                  $course_apprrej=$row['course_apprrej'];
                  $course_des=$row['course_des'];
                  $course_video_limit=$row['course_video_limit'];
                 
              ?>
                <tr id="delete<?php echo $row['id'] ?>">
                    <td><?php echo $id; ?></td>
                    <td><?php echo $course_name;?></td>
                    <td><?php echo $course_price;?></td>
                    <td><?php echo $course_plan_duration;?></td>
                    <td><?php echo $course_booklet; ?></td>
                    <td><?php echo $course_video_limit; ?></td>
                    <td><?php echo $course_sdate; ?></td>
                    <td><?php echo $course_edate; ?></td>
                    <td>
                        <?php
                            if($course_apprrej === '0')
                            {
                                echo'<p style="color:orange">Pending</p>';
                            }
                            elseif($course_apprrej === '1')
                            {
                                echo'<p style="color:green">Approved</p>';
                            }
                            elseif($course_apprrej === '2')
                            {
                                echo'<p style="color:red">Reject</p>';
                            }
                            
                            
                        ?>
                    </td>
                    <td>
<button class="ps-btn apprcourse" style="background-color:#28a745;">Approve</button>
</td>
                    
                    <td>
                    <button class="ps-btn rejcourse" style="background-color:#dc3545;">Reject</button></td>              

                    
                    </td>
                  </tr>
              <?php
            }
            include("back/modal/approvecourse.php");
            include("back/modal/rejectcourse.php");
            ?>
              </tbody>
              <tfoot align="center" class="thead">
                <tr>
                    <th>Index</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Plan Duration</th>
                    <th>Booklet</th>
                    <th>Video Limit</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Approve</th> 
                    <th>Reject</th>  
                </tr>
              </tfoot>
            </table>
          </div>
       
      