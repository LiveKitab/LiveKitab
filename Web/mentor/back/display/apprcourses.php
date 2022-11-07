

                    
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
                    <th style="display:none;">des</th>
                    <th style="display:none;">v_limit</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Action</th>
                    
                     
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
                    <?php
                        if($course_apprrej == '0')
                        {
                          if($course_status === '0')
                          {
                              ?>
                              <td><button onclick="deleteAjax(<?php echo $row['id'];  ?>)" title="Block" class="ps-btn" class="zocarro-btn" style="background-color:#28a745"><i class="fa fa-unlock" aria-hidden="true"></i></button>
                              <?php
                          }
                          elseif($course_status === '1')
                          {
                              ?>
                              <td><button onclick="deleteAjax1(<?php echo $row['id'];  ?>)" title="Unblock" class="ps-btn" class="zocarro-btn" style="background-color:#ffc107"><i class="fa fa-lock" aria-hidden="true"></i></button>
                              <?php
                          }
                        }
                        else
                        {
                              if($course_status === '0')
                              {
                                  ?>
                                  <td><button type="button" title="Block" class="ps-btn" style="background-color:#28a745;" onClick="(function(){$.alert({title: 'Alert!',content: 'You Can Not Block Approved Course Detail Please Contact Admin..!',});})();return false;"><i class="fa fa-lock" aria-hidden="true"></i></button>
                                  <?php
                              }
                              elseif($course_status === '1')
                              {
                                  ?>
                                  <td><button type="button" title="Unblock"  class="ps-btn" style="background-color:#ffc107;" onClick="(function(){$.alert({title: 'Alert!',content: 'You Can Not Unblock Approved Course Detail Please Contact Admin..!',});})();return false;"><i class="fa fa-unlock" aria-hidden="true"></i></button>
                                  <?php
                              }
                        }
                          ?>
                       
                           <?php
                            if($course_apprrej == '0')
                            {
                                ?>
                         <button type="button" title="Edit" class="ps-btn editcourses"
                         style="background-color:#007bff;"> <i class="icon-pencil"></i></button>
                         <?php
                            }
                            else
                            {
                                ?>
                                    <button type="button" title="Edit"  class="ps-btn" style="background-color:#007bff;" onClick="(function(){$.alert({title: 'Alert!',content: 'You Can Not Edit Approved Course Detail Please Contact Admin..!',});})();return false;"> <i class="icon-pencil"></i></button>
                                <?php
                            }
                        ?>
                      
                      
                      <?php
                        if($course_apprrej == '0')
                        {
                            ?>
                                  <button onclick="deletecourses(<?php echo $row['id'];  ?>)" title="Delete" class="ps-btn" style="background-color:#dc3545;"><i class="icon-trash"></i></button>
                            <?php
                        }
                        else
                        {
                            ?>
                                <button type="button" title="Delete" class="ps-btn" style="background-color:#dc3545;" onClick="(function(){$.alert({title: 'Alert!',content: 'You Can Not Remove Approved Course Detail Please Contact Admin..!',});})();return false;"><i class="icon-trash"></i></button>   
                            <?php
                        }
                      ?>
                      </td>
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
                    
                    <th style="display:none;">des</th>
                    <th style="display:none;">v_limit</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Action</th>
                    
                </tr>
              </tfoot>
            </table>
          </div>
       
      