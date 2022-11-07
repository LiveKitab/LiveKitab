          <div class="table-responsive">
            <table id="load" class="table table-hover table-bordered zero-configuration">
              <thead class="thead-dark" align="center">
                <tr>
                    <th>Index</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Plan Duration</th>
                    <th>Video Limit</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Download</th>
                    <th style="display:none;">Des</th>
                     
                </tr>
              </thead>
              <tbody align="center">
                <?php
            $count = 0; 
              $cmd="select * from course_data where c_id='$c_id' ORDER BY id DESC";
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
                  $course_booklet=$row['course_booklet'];
                  $course_video_limit=$row['course_video_limit'];
                 
              ?>
                <tr id="delete<?php echo $row['id'] ?>" class="showmodal">
                    <td ><?php echo $id; ?></td>
                    <td><?php echo $course_name;?></td>
                    <td><?php echo $course_price;?></td>
                    <td><?php echo $course_plan_duration;?></td>
                    
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
                                echo'<p style="color:red">Rejected</p>';
                            }
                            
                            
                        ?>
                    </td>
                    <td style="display:none;"><?php echo $course_des; ?></td>
                    <td><a class="ps-btn" href="../src/course/<?php echo $course_booklet;?>" role="button" title="Download Booklet" style="background-color:#fb7c00; color:white;" download><i class="fa fa-download" aria-hidden="true"></i></a></td>
                  </tr>
                    
                    <?php
                    include_once("back/modal/displaycourse.php");
                    ?>

              <?php
            }
            
            ?>
              </tbody>
              <tfoot align="center" class="thead">
                <tr>
                    <th>Index</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Plan Duration</th>
                    <th>Video Limit</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Download</th>
                    <th style="display:none;">Des</th>
                </tr>
              </tfoot>
            </table>
          </div>
       
      