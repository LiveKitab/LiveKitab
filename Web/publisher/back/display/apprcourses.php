

                    
          <div class="table-responsive">
            <table id="load" class="table table-hover table-bordered zero-configuration">
              <thead class="thead-dark" align="center">
                <tr>
                     <th style="display:none;">id</th>
                    <th>Index</th>
                    <th style="display:none;">e_id</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Plan Duration</th>
                    <th>Booklet</th>
                    <th style="display:none;">des</th>
                    <th style="display:none;">v_limit</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Publish</th>
                    <th>Update</th> 
                    <th>Delete</th>  
                     
                </tr>
              </thead>
              <tbody align="center">
                <?php
            $count = 0; 
              $cmd="select * from course_data where course_apprrej='1' ORDER BY id DESC";
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
                    <td style="display:none;"><?php echo $id; ?></td>
                    <td><?php echo $count; ?></td>
                    <td style="display:none;"><?php echo $e_id; ?></td>
                    <td><?php echo $course_name;?></td>
                    <td><?php echo $course_price;?></td>
                    <td><?php echo $course_plan_duration;?></td>
                    <td style="display:none;"><?php echo $course_des; ?></td>
                    <td style="display:none;"><?php echo $course_video_limit; ?></td>
                    <td><?php echo $course_booklet; ?></td>
                    <td><?php echo $course_sdate; ?></td>
                    <td><?php echo $course_edate; ?></td>
                    
                    <?php
                          if($course_status === '0')
                          {
                              ?>
                              <td><button onclick="deleteAjax(<?php echo $row['id'];  ?>)" class="ps-btn" class="zocarro-btn" style="background-color:#28a745">Block</button></td>
                              <?php
                          }
                          elseif($course_status === '1')
                          {
                              ?>
                              <td><button onclick="deleteAjax1(<?php echo $row['id'];  ?>)"  class="ps-btn" class="zocarro-btn" style="background-color:#ffc107">Unblock</button></td>
                              <?php
                          }
                          ?>
                       <td>
                         <button type="button" class="ps-btn editcourses"
                         style="background-color:#007bff;"> Edit</button>
                      </td>
                      
                      <td>
                          <button onclick="deletecourses(<?php echo $row['id'];  ?>)"  class="ps-btn" style="background-color:#dc3545;">Delete</button>
                          </td>
                      
                  </tr>
              <?php
              
            }
            include("back/modal/updatecourses.php");
            ?>
              </tbody>
              <tfoot align="center" class="thead">
                <tr>
                    <th style="display:none;">id</th>
                    <th>Index</th>
                    <th style="display:none;">e_id</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Plan Duration</th>
                    <th>Booklet</th>
                    <th style="display:none;">des</th>
                    <th style="display:none;">v_limit</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Publish</th>
                    <th>Update</th> 
                    <th>Delete</th>  
                </tr>
              </tfoot>
            </table>
          </div>
       
      