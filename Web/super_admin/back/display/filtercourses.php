<?php
    include("../../../db/connect.php");
    if(isset($_POST['sd']) && isset($_POST['ed']))
    {
        $sdate = mysqli_real_escape_string($con,$_POST['sd']);
        $sdate = date('Y-m-d-h:i:s', strtotime($sdate));
        $edate = mysqli_real_escape_string($con,$_POST['ed']);
        $edate = date('Y-m-d-h:i:s', strtotime($edate));
?>

          <div class="table-responsive">
            <table id="load" class="table table-hover table-bordered zero-configuration">
              <thead class="thead-dark" align="center">
                <tr>
                     <th style="display:none;">id</th>
                    <th>Index</th>
                    <th style="display:none;">e_id</th>
                    <th>Subject Name</th>
                    <th>Sem/Medium</th>
                    <th>Branch Name</th>
                    <th>Program Name</th>
                    <th>Uni/Stream Name</th>
                    <th style="display:none;">s_code</th>
                    <th style="display:none;">s_credit</th>
                    <th style="display:none;">Price</th>
                    <th style="display:none;">Discount In %</th>
                    <th style="display:none;">Plan Duration</th>
                    <th style="display:none;">Booklet</th>
                    <th style="display:none;">des</th>
                    <th style="display:none;">v_limit</th>
                    <th>Start Date</th>
                    <th style="display:none;">End Date</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody align="center">
                <?php
            $count = 0; 
              $cmd="select * from course_data where STR_TO_DATE(course_sdate, '%Y-%m-%d-%h:%i:%s %r') BETWEEN '$sdate' and '$edate' ORDER BY id DESC";
              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
              while($row=mysqli_fetch_array($result))
              {     
                  $count = $count + 1;
                  $id=$row['id'];
                  $e_id=$row['e_id'];
                  $stream_id=$row['stream_id'];
                  $pr_id=$row['pr_id'];
                  $b_id=$row['b_id'];
                  $term_id=$row['term_id'];
                  $course_name=$row['course_name'];
                  $course_price=$row['course_price'];
                  $course_dis=$row['course_dis'];
                  $course_plan_duration=$row['course_plan_duration'];
                  $course_booklet=$row['course_booklet'];
                  $course_sdate=$row['course_sdate'];
                  $course_edate=$row['course_edate'];
                  $course_status=$row['course_status'];
                  $course_apprrej=$row['course_apprrej'];
                  $course_des=$row['course_des'];
                  $course_video_limit=$row['course_video_limit'];
                  $rej_reason=$row['rej_reason'];
                  $sub_code=$row['sub_code'];
                  $credit=$row['credit'];
                  
                  $sel="select * from editor_data where e_id='$e_id'";
                  $run=mysqli_query($con,$sel);
                  while($col=mysqli_fetch_array($run))
                  {
                      $ename=$col['e_name'];
                  }
                  
                   $cmd1="select * from stream_data where stream_id = '$stream_id'";
              $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
              while($row1=mysqli_fetch_array($result1))
              {
                  $stream_name=$row1['stream_name'];
                  $uni=$row1['uni'];
              }
                  
                  $cmd2="select * from program_data where pr_id = '$pr_id'";
              $result2=mysqli_query($con,$cmd2) or die(mysqli_error($con));
              while($row2=mysqli_fetch_array($result2))
              {
                  $pr_id=$row2['program_name'];
              }
                  
                  $cmd3="select * from branch_data where b_id = '$b_id'";
              $result3=mysqli_query($con,$cmd3) or die(mysqli_error($con));
              while($row3=mysqli_fetch_array($result3))
              {
                  $b_id=$row3['b_name'];
              }
              
              $cmd4="select * from term_data where term_id = '$term_id'";
              $result4=mysqli_query($con,$cmd4) or die(mysqli_error($con));
              while($row4=mysqli_fetch_array($result4))
              {
                  $term_name=$row4['term_name'];
                  $med=$row4['med'];
              }
              ?>
                <tr id="delete<?php echo $row['id'] ?>">
                    <td style="display:none;"><?php echo $id; ?></td>
                    <td><?php echo $count; ?></td>
                    <td style="display:none;"><?php echo $e_id; ?></td>
                    <td><?php echo $course_name;?></td>
                    <td><?php echo $term_name; ?> / <?php echo $med; ?></td>
                    <td><?php echo $b_id; ?></td>
                    <td><?php echo $pr_id; ?></td>
                    <td><?php echo $uni; ?> / <?php echo $stream_name; ?></td>
                    <td style="display:none;"><?php echo $course_price;?></td>
                    <td style="display:none;"><?php echo $course_dis;?></td>
                    <td style="display:none;"><?php echo $course_plan_duration;?></td>
                    <td style="display:none;"><?php echo $course_des; ?></td>
                    <td style="display:none;"><?php echo $course_video_limit; ?></td>
                    <td style="display:none;"><?php echo $course_booklet; ?></td>
                    <td><?php echo $course_sdate; ?></td>
                    <td style="display:none;"><?php echo $course_edate; ?></td>
                    <td style="display:none;"><?php echo $sub_code; ?></td>
                    <td style="display:none;"><?php echo $credit; ?></td>
                    <td>
                    <?php
                          if($course_status === '0')
                          {
                              ?>
                              <button onclick="deleteAjax(<?php echo $row['id'];  ?>)" class="ps-btn" class="zocarro-btn" title="Publish" style="background-color:#28a745"><i class="fa fa-calendar-check-o" aria-hidden="true"></i></button>
                              <?php
                          }
                          elseif($course_status === '1')
                          {
                              ?>
                              <button onclick="deleteAjax1(<?php echo $row['id'];  ?>)" class="ps-btn" title="Unpublish" class="zocarro-btn" style="background-color:#ffc107"><i class="fa fa-calendar-times-o" aria-hidden="true"></i></button>
                              <?php
                          }
                          ?>
                       
                         <button type="button" class="ps-btn editcourses" title="Edit"
                         style="background-color:#007bff;"> <i class="icon-pencil"></i></button>
                      
                      
                      
                          <button onclick="deletecourses(<?php echo $row['id'];  ?>)"  class="ps-btn" title="Delete" style="background-color:#dc3545;"><i class="icon-trash"></i></button>
                        <button class="ps-btn" style="background-color:#ffc107;" data-toggle="modal" data-target="#abc<?php echo $row['id'] ?>"><i class="fa fa-eye" aria-hidden="true"></i></button>

                          </td>
                          
                      
                  </tr>
              <?php
              include("../modal/viewcourses.php");
            }
            include("../modal/updatecourses.php");
            ?>
              </tbody>
              <tfoot align="center" class="thead">
                <tr>
                    <th style="display:none;">id</th>
                    <th>Index</th>
                    <th style="display:none;">e_id</th>
                    <th>Subject Name</th>
                    <th>Sem/Medium</th>
                    <th>Branch Name</th>
                    <th>Program Name</th>
                    <th>Uni/Stream Name</th>
                    <th style="display:none;">s_code</th>
                    <th style="display:none;">s_credit</th>
                    <th style="display:none;">Price</th>
                    <th style="display:none;">Discount In %</th>
                    <th style="display:none;">Plan Duration</th>
                    <th style="display:none;">Booklet</th>
                    <th style="display:none;">des</th>
                    <th style="display:none;">v_limit</th>
                    <th>Start Date</th>
                    <th style="display:none;">End Date</th>
                    <th>Action</th>
                    
                </tr>
              </tfoot>
            </table>
          </div>
          <?php
    }
    if(isset($_POST['sp']) && isset($_POST['ep']))
    {
        $sp = mysqli_real_escape_string($con,$_POST['sp']);
        $ep = mysqli_real_escape_string($con,$_POST['ep']);
    ?>

          <div class="table-responsive">
            <table id="load" class="table table-hover table-bordered zero-configuration">
              <thead class="thead-dark" align="center">
                <tr>
                     <th style="display:none;">id</th>
                    <th>Index</th>
                    <th style="display:none;">e_id</th>
                    <th>Subject Name</th>
                    <th>Sem/Medium</th>
                    <th>Branch Name</th>
                    <th>Program Name</th>
                    <th>Uni/Stream Name</th>
                    <th style="display:none;">s_code</th>
                    <th style="display:none;">s_credit</th>
                    <th style="display:none;">Price</th>
                    <th style="display:none;">Discount In %</th>
                    <th style="display:none;">Plan Duration</th>
                    <th style="display:none;">Booklet</th>
                    <th style="display:none;">des</th>
                    <th style="display:none;">v_limit</th>
                    <th>Start Date</th>
                    <th style="display:none;">End Date</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody align="center">
                <?php
              $count = 0; 
              $cmd="select * from course_data WHERE course_price between '$sp' AND '$ep' OR ( CAST( SUBSTRING_INDEX(  course_price,  '-', 1 ) AS UNSIGNED ) between '$sp' AND '$ep' ) OR ( CAST( SUBSTRING_INDEX(  course_price,  '-', -1 ) AS UNSIGNED )  between '$sp' AND '$ep' ) ORDER BY id DESC";
              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
              while($row=mysqli_fetch_array($result))
              {     
                  $count = $count + 1;
                  $id=$row['id'];
                  $e_id=$row['e_id'];
                  $stream_id=$row['stream_id'];
                  $pr_id=$row['pr_id'];
                  $b_id=$row['b_id'];
                  $term_id=$row['term_id'];
                  $course_name=$row['course_name'];
                  $course_price=$row['course_price'];
                  $course_dis=$row['course_dis'];
                  $course_plan_duration=$row['course_plan_duration'];
                  $course_booklet=$row['course_booklet'];
                  $course_sdate=$row['course_sdate'];
                  $course_edate=$row['course_edate'];
                  $course_status=$row['course_status'];
                  $course_apprrej=$row['course_apprrej'];
                  $course_des=$row['course_des'];
                  $course_video_limit=$row['course_video_limit'];
                  $rej_reason=$row['rej_reason'];
                  $sub_code=$row['sub_code'];
                  $credit=$row['credit'];
                  
                  $sel="select * from editor_data where e_id='$e_id'";
                  $run=mysqli_query($con,$sel);
                  while($col=mysqli_fetch_array($run))
                  {
                      $ename=$col['e_name'];
                  }
                  
                   $cmd1="select * from stream_data where stream_id = '$stream_id'";
              $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
              while($row1=mysqli_fetch_array($result1))
              {
                  $stream_name=$row1['stream_name'];
                  $uni=$row1['uni'];
              }
                  
                  $cmd2="select * from program_data where pr_id = '$pr_id'";
              $result2=mysqli_query($con,$cmd2) or die(mysqli_error($con));
              while($row2=mysqli_fetch_array($result2))
              {
                  $pr_id=$row2['program_name'];
              }
                  
                  $cmd3="select * from branch_data where b_id = '$b_id'";
              $result3=mysqli_query($con,$cmd3) or die(mysqli_error($con));
              while($row3=mysqli_fetch_array($result3))
              {
                  $b_id=$row3['b_name'];
              }
              
              $cmd4="select * from term_data where term_id = '$term_id'";
              $result4=mysqli_query($con,$cmd4) or die(mysqli_error($con));
              while($row4=mysqli_fetch_array($result4))
              {
                  $term_name=$row4['term_name'];
                  $med=$row4['med'];
              }
              ?>
                <tr id="delete<?php echo $row['id'] ?>">
                    <td style="display:none;"><?php echo $id; ?></td>
                    <td><?php echo $count; ?></td>
                    <td style="display:none;"><?php echo $e_id; ?></td>
                    <td><?php echo $course_name;?></td>
                    <td><?php echo $term_name; ?> / <?php echo $med; ?></td>
                    <td><?php echo $b_id; ?></td>
                    <td><?php echo $pr_id; ?></td>
                    <td><?php echo $uni; ?> / <?php echo $stream_name; ?></td>
                    <td style="display:none;"><?php echo $course_price;?></td>
                    <td style="display:none;"><?php echo $course_dis;?></td>
                    <td style="display:none;"><?php echo $course_plan_duration;?></td>
                    <td style="display:none;"><?php echo $course_des; ?></td>
                    <td style="display:none;"><?php echo $course_video_limit; ?></td>
                    <td style="display:none;"><?php echo $course_booklet; ?></td>
                    <td><?php echo $course_sdate; ?></td>
                    <td style="display:none;"><?php echo $course_edate; ?></td>
                    <td style="display:none;"><?php echo $sub_code; ?></td>
                    <td style="display:none;"><?php echo $credit; ?></td>
                    <td>
                    <?php
                          if($course_status === '0')
                          {
                              ?>
                              <button onclick="deleteAjax(<?php echo $row['id'];  ?>)" class="ps-btn" class="zocarro-btn" title="Publish" style="background-color:#28a745"><i class="fa fa-calendar-check-o" aria-hidden="true"></i></button>
                              <?php
                          }
                          elseif($course_status === '1')
                          {
                              ?>
                              <button onclick="deleteAjax1(<?php echo $row['id'];  ?>)" class="ps-btn" title="Unpublish" class="zocarro-btn" style="background-color:#ffc107"><i class="fa fa-calendar-times-o" aria-hidden="true"></i></button>
                              <?php
                          }
                          ?>
                       
                         <button type="button" class="ps-btn editcourses" title="Edit"
                         style="background-color:#007bff;"> <i class="icon-pencil"></i></button>
                      
                      
                      
                          <button onclick="deletecourses(<?php echo $row['id'];  ?>)"  class="ps-btn" title="Delete" style="background-color:#dc3545;"><i class="icon-trash"></i></button>
                        <button class="ps-btn" style="background-color:#ffc107;" data-toggle="modal" data-target="#abc<?php echo $row['id'] ?>"><i class="fa fa-eye" aria-hidden="true"></i></button>

                          </td>
                          
                      
                  </tr>
              <?php
              include("../modal/viewcourses.php");
            }
            include("../modal/updatecourses.php");
            ?>
              </tbody>
              <tfoot align="center" class="thead">
                <tr>
                    <th style="display:none;">id</th>
                    <th>Index</th>
                    <th style="display:none;">e_id</th>
                    <th>Subject Name</th>
                    <th>Sem/Medium</th>
                    <th>Branch Name</th>
                    <th>Program Name</th>
                    <th>Uni/Stream Name</th>
                    <th style="display:none;">s_code</th>
                    <th style="display:none;">s_credit</th>
                    <th style="display:none;">Price</th>
                    <th style="display:none;">Discount In %</th>
                    <th style="display:none;">Plan Duration</th>
                    <th style="display:none;">Booklet</th>
                    <th style="display:none;">des</th>
                    <th style="display:none;">v_limit</th>
                    <th>Start Date</th>
                    <th style="display:none;">End Date</th>
                    <th>Action</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <?php
    }
    
    if(isset($_POST['sdi']) && isset($_POST['edi']))
    {
        $sdi = mysqli_real_escape_string($con,$_POST['sdi']);
        $edi = mysqli_real_escape_string($con,$_POST['edi']);
        
        if($sdi == '0')
        {
            echo '<h5 class="display-5 text-center">Discount Never in 0</h1>';
            die();
        }
        if($edi == '0')
        {
            echo '<h5 class="display-5 text-center">Discount Never in 0</h1>';
            die();
        }
    ?>

          <div class="table-responsive">
            <table id="load" class="table table-hover table-bordered zero-configuration">
              <thead class="thead-dark" align="center">
                <tr>
                     <th style="display:none;">id</th>
                    <th>Index</th>
                    <th style="display:none;">e_id</th>
                    <th>Subject Name</th>
                    <th>Sem/Medium</th>
                    <th>Branch Name</th>
                    <th>Program Name</th>
                    <th>Uni/Stream Name</th>
                    <th style="display:none;">s_code</th>
                    <th style="display:none;">s_credit</th>
                    <th style="display:none;">Price</th>
                    <th style="display:none;">Discount In %</th>
                    <th style="display:none;">Plan Duration</th>
                    <th style="display:none;">Booklet</th>
                    <th style="display:none;">des</th>
                    <th style="display:none;">v_limit</th>
                    <th>Start Date</th>
                    <th style="display:none;">End Date</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody align="center">
                <?php
              $count = 0; 
              $cmd="select * from course_data WHERE course_dis between '$sdi' AND '$edi' OR ( CAST( SUBSTRING_INDEX(  course_dis,  '-', 1 ) AS UNSIGNED ) between '$sdi' AND '$edi' ) OR ( CAST( SUBSTRING_INDEX(  course_dis,  '-', -1 ) AS UNSIGNED )  between '$sdi' AND '$edi' ) ORDER BY id DESC";
              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
              while($row=mysqli_fetch_array($result))
              {     
                  $count = $count + 1;
                  $id=$row['id'];
                  $e_id=$row['e_id'];
                  $stream_id=$row['stream_id'];
                  $pr_id=$row['pr_id'];
                  $b_id=$row['b_id'];
                  $term_id=$row['term_id'];
                  $course_name=$row['course_name'];
                  $course_price=$row['course_price'];
                  $course_dis=$row['course_dis'];
                  $course_plan_duration=$row['course_plan_duration'];
                  $course_booklet=$row['course_booklet'];
                  $course_sdate=$row['course_sdate'];
                  $course_edate=$row['course_edate'];
                  $course_status=$row['course_status'];
                  $course_apprrej=$row['course_apprrej'];
                  $course_des=$row['course_des'];
                  $course_video_limit=$row['course_video_limit'];
                  $rej_reason=$row['rej_reason'];
                  $sub_code=$row['sub_code'];
                  $credit=$row['credit'];
                  
                  $sel="select * from editor_data where e_id='$e_id'";
                  $run=mysqli_query($con,$sel);
                  while($col=mysqli_fetch_array($run))
                  {
                      $ename=$col['e_name'];
                  }
                  
                   $cmd1="select * from stream_data where stream_id = '$stream_id'";
              $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
              while($row1=mysqli_fetch_array($result1))
              {
                  $stream_name=$row1['stream_name'];
                  $uni=$row1['uni'];
              }
                  
                  $cmd2="select * from program_data where pr_id = '$pr_id'";
              $result2=mysqli_query($con,$cmd2) or die(mysqli_error($con));
              while($row2=mysqli_fetch_array($result2))
              {
                  $pr_id=$row2['program_name'];
              }
                  
                  $cmd3="select * from branch_data where b_id = '$b_id'";
              $result3=mysqli_query($con,$cmd3) or die(mysqli_error($con));
              while($row3=mysqli_fetch_array($result3))
              {
                  $b_id=$row3['b_name'];
              }
              
              $cmd4="select * from term_data where term_id = '$term_id'";
              $result4=mysqli_query($con,$cmd4) or die(mysqli_error($con));
              while($row4=mysqli_fetch_array($result4))
              {
                  $term_name=$row4['term_name'];
                  $med=$row4['med'];
              }
              ?>
                <tr id="delete<?php echo $row['id'] ?>">
                    <td style="display:none;"><?php echo $id; ?></td>
                    <td><?php echo $count; ?></td>
                    <td style="display:none;"><?php echo $e_id; ?></td>
                    <td><?php echo $course_name;?></td>
                    <td><?php echo $term_name; ?> / <?php echo $med; ?></td>
                    <td><?php echo $b_id; ?></td>
                    <td><?php echo $pr_id; ?></td>
                    <td><?php echo $uni; ?> / <?php echo $stream_name; ?></td>
                    <td style="display:none;"><?php echo $course_price;?></td>
                    <td style="display:none;"><?php echo $course_dis;?></td>
                    <td style="display:none;"><?php echo $course_plan_duration;?></td>
                    <td style="display:none;"><?php echo $course_des; ?></td>
                    <td style="display:none;"><?php echo $course_video_limit; ?></td>
                    <td style="display:none;"><?php echo $course_booklet; ?></td>
                    <td><?php echo $course_sdate; ?></td>
                    <td style="display:none;"><?php echo $course_edate; ?></td>
                    <td style="display:none;"><?php echo $sub_code; ?></td>
                    <td style="display:none;"><?php echo $credit; ?></td>
                    <td>
                    <?php
                          if($course_status === '0')
                          {
                              ?>
                              <button onclick="deleteAjax(<?php echo $row['id'];  ?>)" class="ps-btn" class="zocarro-btn" title="Publish" style="background-color:#28a745"><i class="fa fa-calendar-check-o" aria-hidden="true"></i></button>
                              <?php
                          }
                          elseif($course_status === '1')
                          {
                              ?>
                              <button onclick="deleteAjax1(<?php echo $row['id'];  ?>)" class="ps-btn" title="Unpublish" class="zocarro-btn" style="background-color:#ffc107"><i class="fa fa-calendar-times-o" aria-hidden="true"></i></button>
                              <?php
                          }
                          ?>
                       
                         <button type="button" class="ps-btn editcourses" title="Edit"
                         style="background-color:#007bff;"> <i class="icon-pencil"></i></button>
                      
                      
                      
                          <button onclick="deletecourses(<?php echo $row['id'];  ?>)"  class="ps-btn" title="Delete" style="background-color:#dc3545;"><i class="icon-trash"></i></button>
                        <button class="ps-btn" style="background-color:#ffc107;" data-toggle="modal" data-target="#abc<?php echo $row['id'] ?>"><i class="fa fa-eye" aria-hidden="true"></i></button>

                          </td>
                          
                      
                  </tr>
              <?php
              include("../modal/viewcourses.php");
            }
            include("../modal/updatecourses.php");
            ?>
              </tbody>
              <tfoot align="center" class="thead">
                <tr>
                    <th style="display:none;">id</th>
                    <th>Index</th>
                    <th style="display:none;">e_id</th>
                    <th>Subject Name</th>
                    <th>Sem/Medium</th>
                    <th>Branch Name</th>
                    <th>Program Name</th>
                    <th>Uni/Stream Name</th>
                    <th style="display:none;">s_code</th>
                    <th style="display:none;">s_credit</th>
                    <th style="display:none;">Price</th>
                    <th style="display:none;">Discount In %</th>
                    <th style="display:none;">Plan Duration</th>
                    <th style="display:none;">Booklet</th>
                    <th style="display:none;">des</th>
                    <th style="display:none;">v_limit</th>
                    <th>Start Date</th>
                    <th style="display:none;">End Date</th>
                    <th>Action</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <?php
    }
    
    
    if(isset($_POST['funi']))
    {
        $funi = mysqli_real_escape_string($con,$_POST['funi']);
    ?>

          <div class="table-responsive">
            <table id="load" class="table table-hover table-bordered zero-configuration">
              <thead class="thead-dark" align="center">
                <tr>
                     <th style="display:none;">id</th>
                    <th>Index</th>
                    <th style="display:none;">e_id</th>
                    <th>Subject Name</th>
                    <th>Sem/Medium</th>
                    <th>Branch Name</th>
                    <th>Program Name</th>
                    <th>Uni/Stream Name</th>
                    <th style="display:none;">s_code</th>
                    <th style="display:none;">s_credit</th>
                    <th style="display:none;">Price</th>
                    <th style="display:none;">Discount In %</th>
                    <th style="display:none;">Plan Duration</th>
                    <th style="display:none;">Booklet</th>
                    <th style="display:none;">des</th>
                    <th style="display:none;">v_limit</th>
                    <th>Start Date</th>
                    <th style="display:none;">End Date</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody align="center">
                <?php
              $count = 0; 
              $cmd="select * from course_data,stream_data WHERE course_data.stream_id = stream_data.stream_id and stream_data.uni='$funi' ORDER BY course_data.id DESC";
              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
              while($row=mysqli_fetch_array($result))
              {     
                  $count = $count + 1;
                  $id=$row['id'];
                  $e_id=$row['e_id'];
                  $stream_id=$row['stream_id'];
                  $pr_id=$row['pr_id'];
                  $b_id=$row['b_id'];
                  $term_id=$row['term_id'];
                  $course_name=$row['course_name'];
                  $course_price=$row['course_price'];
                  $course_dis=$row['course_dis'];
                  $course_plan_duration=$row['course_plan_duration'];
                  $course_booklet=$row['course_booklet'];
                  $course_sdate=$row['course_sdate'];
                  $course_edate=$row['course_edate'];
                  $course_status=$row['course_status'];
                  $course_apprrej=$row['course_apprrej'];
                  $course_des=$row['course_des'];
                  $course_video_limit=$row['course_video_limit'];
                  $rej_reason=$row['rej_reason'];
                  $sub_code=$row['sub_code'];
                  $credit=$row['credit'];
                  
                  $sel="select * from editor_data where e_id='$e_id'";
                  $run=mysqli_query($con,$sel);
                  while($col=mysqli_fetch_array($run))
                  {
                      $ename=$col['e_name'];
                  }
                  
                   $cmd1="select * from stream_data where stream_id = '$stream_id'";
              $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
              while($row1=mysqli_fetch_array($result1))
              {
                  $stream_name=$row1['stream_name'];
                  $uni=$row1['uni'];
              }
                  
                  $cmd2="select * from program_data where pr_id = '$pr_id'";
              $result2=mysqli_query($con,$cmd2) or die(mysqli_error($con));
              while($row2=mysqli_fetch_array($result2))
              {
                  $pr_id=$row2['program_name'];
              }
                  
                  $cmd3="select * from branch_data where b_id = '$b_id'";
              $result3=mysqli_query($con,$cmd3) or die(mysqli_error($con));
              while($row3=mysqli_fetch_array($result3))
              {
                  $b_id=$row3['b_name'];
              }
              
              $cmd4="select * from term_data where term_id = '$term_id'";
              $result4=mysqli_query($con,$cmd4) or die(mysqli_error($con));
              while($row4=mysqli_fetch_array($result4))
              {
                  $term_name=$row4['term_name'];
                  $med=$row4['med'];
              }
              ?>
                <tr id="delete<?php echo $row['id'] ?>">
                    <td style="display:none;"><?php echo $id; ?></td>
                    <td><?php echo $count; ?></td>
                    <td style="display:none;"><?php echo $e_id; ?></td>
                    <td><?php echo $course_name;?></td>
                    <td><?php echo $term_name; ?> / <?php echo $med; ?></td>
                    <td><?php echo $b_id; ?></td>
                    <td><?php echo $pr_id; ?></td>
                    <td><?php echo $uni; ?> / <?php echo $stream_name; ?></td>
                    <td style="display:none;"><?php echo $course_price;?></td>
                    <td style="display:none;"><?php echo $course_dis;?></td>
                    <td style="display:none;"><?php echo $course_plan_duration;?></td>
                    <td style="display:none;"><?php echo $course_des; ?></td>
                    <td style="display:none;"><?php echo $course_video_limit; ?></td>
                    <td style="display:none;"><?php echo $course_booklet; ?></td>
                    <td><?php echo $course_sdate; ?></td>
                    <td style="display:none;"><?php echo $course_edate; ?></td>
                    <td style="display:none;"><?php echo $sub_code; ?></td>
                    <td style="display:none;"><?php echo $credit; ?></td>
                    <td>
                    <?php
                          if($course_status === '0')
                          {
                              ?>
                              <button onclick="deleteAjax(<?php echo $row['id'];  ?>)" class="ps-btn" class="zocarro-btn" title="Publish" style="background-color:#28a745"><i class="fa fa-calendar-check-o" aria-hidden="true"></i></button>
                              <?php
                          }
                          elseif($course_status === '1')
                          {
                              ?>
                              <button onclick="deleteAjax1(<?php echo $row['id'];  ?>)" class="ps-btn" title="Unpublish" class="zocarro-btn" style="background-color:#ffc107"><i class="fa fa-calendar-times-o" aria-hidden="true"></i></button>
                              <?php
                          }
                          ?>
                       
                         <button type="button" class="ps-btn editcourses" title="Edit"
                         style="background-color:#007bff;"> <i class="icon-pencil"></i></button>
                      
                      
                      
                          <button onclick="deletecourses(<?php echo $row['id'];  ?>)"  class="ps-btn" title="Delete" style="background-color:#dc3545;"><i class="icon-trash"></i></button>
                        <button class="ps-btn" style="background-color:#ffc107;" data-toggle="modal" data-target="#abc<?php echo $row['id'] ?>"><i class="fa fa-eye" aria-hidden="true"></i></button>

                          </td>
                          
                      
                  </tr>
              <?php
              include("../modal/viewcourses.php");
            }
            include("../modal/updatecourses.php");
            ?>
              </tbody>
              <tfoot align="center" class="thead">
                <tr>
                    <th style="display:none;">id</th>
                    <th>Index</th>
                    <th style="display:none;">e_id</th>
                    <th>Subject Name</th>
                    <th>Sem/Medium</th>
                    <th>Branch Name</th>
                    <th>Program Name</th>
                    <th>Uni/Stream Name</th>
                    <th style="display:none;">s_code</th>
                    <th style="display:none;">s_credit</th>
                    <th style="display:none;">Price</th>
                    <th style="display:none;">Discount In %</th>
                    <th style="display:none;">Plan Duration</th>
                    <th style="display:none;">Booklet</th>
                    <th style="display:none;">des</th>
                    <th style="display:none;">v_limit</th>
                    <th>Start Date</th>
                    <th style="display:none;">End Date</th>
                    <th>Action</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <?php
    }
    
    
        
    if(isset($_POST['sst']))
    {
        $sst = mysqli_real_escape_string($con,$_POST['sst']);
    ?>

          <div class="table-responsive">
            <table id="load" class="table table-hover table-bordered zero-configuration">
              <thead class="thead-dark" align="center">
                <tr>
                     <th style="display:none;">id</th>
                    <th>Index</th>
                    <th style="display:none;">e_id</th>
                    <th>Subject Name</th>
                    <th>Sem/Medium</th>
                    <th>Branch Name</th>
                    <th>Program Name</th>
                    <th>Uni/Stream Name</th>
                    <th style="display:none;">s_code</th>
                    <th style="display:none;">s_credit</th>
                    <th style="display:none;">Price</th>
                    <th style="display:none;">Discount In %</th>
                    <th style="display:none;">Plan Duration</th>
                    <th style="display:none;">Booklet</th>
                    <th style="display:none;">des</th>
                    <th style="display:none;">v_limit</th>
                    <th>Start Date</th>
                    <th style="display:none;">End Date</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody align="center">
                <?php
              $count = 0; 
              $cmd="select * from course_data,stream_data WHERE course_data.stream_id = stream_data.stream_id and stream_data.stream_name Like '%".$sst."%' ORDER BY course_data.id DESC";
              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
              while($row=mysqli_fetch_array($result))
              {     
                  $count = $count + 1;
                  $id=$row['id'];
                  $e_id=$row['e_id'];
                  $stream_id=$row['stream_id'];
                  $pr_id=$row['pr_id'];
                  $b_id=$row['b_id'];
                  $term_id=$row['term_id'];
                  $course_name=$row['course_name'];
                  $course_price=$row['course_price'];
                  $course_dis=$row['course_dis'];
                  $course_plan_duration=$row['course_plan_duration'];
                  $course_booklet=$row['course_booklet'];
                  $course_sdate=$row['course_sdate'];
                  $course_edate=$row['course_edate'];
                  $course_status=$row['course_status'];
                  $course_apprrej=$row['course_apprrej'];
                  $course_des=$row['course_des'];
                  $course_video_limit=$row['course_video_limit'];
                  $rej_reason=$row['rej_reason'];
                  $sub_code=$row['sub_code'];
                  $credit=$row['credit'];
                  
                  $sel="select * from editor_data where e_id='$e_id'";
                  $run=mysqli_query($con,$sel);
                  while($col=mysqli_fetch_array($run))
                  {
                      $ename=$col['e_name'];
                  }
                  
                   $cmd1="select * from stream_data where stream_id = '$stream_id'";
              $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
              while($row1=mysqli_fetch_array($result1))
              {
                  $stream_name=$row1['stream_name'];
                  $uni=$row1['uni'];
              }
                  
                  $cmd2="select * from program_data where pr_id = '$pr_id'";
              $result2=mysqli_query($con,$cmd2) or die(mysqli_error($con));
              while($row2=mysqli_fetch_array($result2))
              {
                  $pr_id=$row2['program_name'];
              }
                  
                  $cmd3="select * from branch_data where b_id = '$b_id'";
              $result3=mysqli_query($con,$cmd3) or die(mysqli_error($con));
              while($row3=mysqli_fetch_array($result3))
              {
                  $b_id=$row3['b_name'];
              }
              
              $cmd4="select * from term_data where term_id = '$term_id'";
              $result4=mysqli_query($con,$cmd4) or die(mysqli_error($con));
              while($row4=mysqli_fetch_array($result4))
              {
                  $term_name=$row4['term_name'];
                  $med=$row4['med'];
              }
              ?>
                <tr id="delete<?php echo $row['id'] ?>">
                    <td style="display:none;"><?php echo $id; ?></td>
                    <td><?php echo $count; ?></td>
                    <td style="display:none;"><?php echo $e_id; ?></td>
                    <td><?php echo $course_name;?></td>
                    <td><?php echo $term_name; ?> / <?php echo $med; ?></td>
                    <td><?php echo $b_id; ?></td>
                    <td><?php echo $pr_id; ?></td>
                    <td><?php echo $uni; ?> / <?php echo $stream_name; ?></td>
                    <td style="display:none;"><?php echo $course_price;?></td>
                    <td style="display:none;"><?php echo $course_dis;?></td>
                    <td style="display:none;"><?php echo $course_plan_duration;?></td>
                    <td style="display:none;"><?php echo $course_des; ?></td>
                    <td style="display:none;"><?php echo $course_video_limit; ?></td>
                    <td style="display:none;"><?php echo $course_booklet; ?></td>
                    <td><?php echo $course_sdate; ?></td>
                    <td style="display:none;"><?php echo $course_edate; ?></td>
                    <td style="display:none;"><?php echo $sub_code; ?></td>
                    <td style="display:none;"><?php echo $credit; ?></td>
                    <td>
                    <?php
                          if($course_status === '0')
                          {
                              ?>
                              <button onclick="deleteAjax(<?php echo $row['id'];  ?>)" class="ps-btn" class="zocarro-btn" title="Publish" style="background-color:#28a745"><i class="fa fa-calendar-check-o" aria-hidden="true"></i></button>
                              <?php
                          }
                          elseif($course_status === '1')
                          {
                              ?>
                              <button onclick="deleteAjax1(<?php echo $row['id'];  ?>)" class="ps-btn" title="Unpublish" class="zocarro-btn" style="background-color:#ffc107"><i class="fa fa-calendar-times-o" aria-hidden="true"></i></button>
                              <?php
                          }
                          ?>
                       
                         <button type="button" class="ps-btn editcourses" title="Edit"
                         style="background-color:#007bff;"> <i class="icon-pencil"></i></button>
                      
                      
                      
                          <button onclick="deletecourses(<?php echo $row['id'];  ?>)"  class="ps-btn" title="Delete" style="background-color:#dc3545;"><i class="icon-trash"></i></button>
                        <button class="ps-btn" style="background-color:#ffc107;" data-toggle="modal" data-target="#abc<?php echo $row['id'] ?>"><i class="fa fa-eye" aria-hidden="true"></i></button>

                          </td>
                          
                      
                  </tr>
              <?php
              include("../modal/viewcourses.php");
            }
            include("../modal/updatecourses.php");
            ?>
              </tbody>
              <tfoot align="center" class="thead">
                <tr>
                    <th style="display:none;">id</th>
                    <th>Index</th>
                    <th style="display:none;">e_id</th>
                    <th>Subject Name</th>
                    <th>Sem/Medium</th>
                    <th>Branch Name</th>
                    <th>Program Name</th>
                    <th>Uni/Stream Name</th>
                    <th style="display:none;">s_code</th>
                    <th style="display:none;">s_credit</th>
                    <th style="display:none;">Price</th>
                    <th style="display:none;">Discount In %</th>
                    <th style="display:none;">Plan Duration</th>
                    <th style="display:none;">Booklet</th>
                    <th style="display:none;">des</th>
                    <th style="display:none;">v_limit</th>
                    <th>Start Date</th>
                    <th style="display:none;">End Date</th>
                    <th>Action</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <?php
    }
    
    
    if(isset($_POST['spr']))
    {
        $spr = mysqli_real_escape_string($con,$_POST['spr']);
    ?>

          <div class="table-responsive">
            <table id="load" class="table table-hover table-bordered zero-configuration">
              <thead class="thead-dark" align="center">
                <tr>
                     <th style="display:none;">id</th>
                    <th>Index</th>
                    <th style="display:none;">e_id</th>
                    <th>Subject Name</th>
                    <th>Sem/Medium</th>
                    <th>Branch Name</th>
                    <th>Program Name</th>
                    <th>Uni/Stream Name</th>
                    <th style="display:none;">s_code</th>
                    <th style="display:none;">s_credit</th>
                    <th style="display:none;">Price</th>
                    <th style="display:none;">Discount In %</th>
                    <th style="display:none;">Plan Duration</th>
                    <th style="display:none;">Booklet</th>
                    <th style="display:none;">des</th>
                    <th style="display:none;">v_limit</th>
                    <th>Start Date</th>
                    <th style="display:none;">End Date</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody align="center">
                <?php
              $count = 0; 
              $cmd="select * from course_data,program_data WHERE course_data.pr_id = program_data.pr_id and program_data.program_name Like '%".$spr."%' ORDER BY course_data.id DESC";
              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
              while($row=mysqli_fetch_array($result))
              {     
                  $count = $count + 1;
                  $id=$row['id'];
                  $e_id=$row['e_id'];
                  $stream_id=$row['stream_id'];
                  $pr_id=$row['pr_id'];
                  $b_id=$row['b_id'];
                  $term_id=$row['term_id'];
                  $course_name=$row['course_name'];
                  $course_price=$row['course_price'];
                  $course_dis=$row['course_dis'];
                  $course_plan_duration=$row['course_plan_duration'];
                  $course_booklet=$row['course_booklet'];
                  $course_sdate=$row['course_sdate'];
                  $course_edate=$row['course_edate'];
                  $course_status=$row['course_status'];
                  $course_apprrej=$row['course_apprrej'];
                  $course_des=$row['course_des'];
                  $course_video_limit=$row['course_video_limit'];
                  $rej_reason=$row['rej_reason'];
                  $sub_code=$row['sub_code'];
                  $credit=$row['credit'];
                  
                  $sel="select * from editor_data where e_id='$e_id'";
                  $run=mysqli_query($con,$sel);
                  while($col=mysqli_fetch_array($run))
                  {
                      $ename=$col['e_name'];
                  }
                  
                   $cmd1="select * from stream_data where stream_id = '$stream_id'";
              $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
              while($row1=mysqli_fetch_array($result1))
              {
                  $stream_name=$row1['stream_name'];
                  $uni=$row1['uni'];
              }
                  
                  $cmd2="select * from program_data where pr_id = '$pr_id'";
              $result2=mysqli_query($con,$cmd2) or die(mysqli_error($con));
              while($row2=mysqli_fetch_array($result2))
              {
                  $pr_id=$row2['program_name'];
              }
                  
                  $cmd3="select * from branch_data where b_id = '$b_id'";
              $result3=mysqli_query($con,$cmd3) or die(mysqli_error($con));
              while($row3=mysqli_fetch_array($result3))
              {
                  $b_id=$row3['b_name'];
              }
              
              $cmd4="select * from term_data where term_id = '$term_id'";
              $result4=mysqli_query($con,$cmd4) or die(mysqli_error($con));
              while($row4=mysqli_fetch_array($result4))
              {
                  $term_name=$row4['term_name'];
                  $med=$row4['med'];
              }
              ?>
                <tr id="delete<?php echo $row['id'] ?>">
                    <td style="display:none;"><?php echo $id; ?></td>
                    <td><?php echo $count; ?></td>
                    <td style="display:none;"><?php echo $e_id; ?></td>
                    <td><?php echo $course_name;?></td>
                    <td><?php echo $term_name; ?> / <?php echo $med; ?></td>
                    <td><?php echo $b_id; ?></td>
                    <td><?php echo $pr_id; ?></td>
                    <td><?php echo $uni; ?> / <?php echo $stream_name; ?></td>
                    <td style="display:none;"><?php echo $course_price;?></td>
                    <td style="display:none;"><?php echo $course_dis;?></td>
                    <td style="display:none;"><?php echo $course_plan_duration;?></td>
                    <td style="display:none;"><?php echo $course_des; ?></td>
                    <td style="display:none;"><?php echo $course_video_limit; ?></td>
                    <td style="display:none;"><?php echo $course_booklet; ?></td>
                    <td><?php echo $course_sdate; ?></td>
                    <td style="display:none;"><?php echo $course_edate; ?></td>
                    <td style="display:none;"><?php echo $sub_code; ?></td>
                    <td style="display:none;"><?php echo $credit; ?></td>
                    <td>
                    <?php
                          if($course_status === '0')
                          {
                              ?>
                              <button onclick="deleteAjax(<?php echo $row['id'];  ?>)" class="ps-btn" class="zocarro-btn" title="Publish" style="background-color:#28a745"><i class="fa fa-calendar-check-o" aria-hidden="true"></i></button>
                              <?php
                          }
                          elseif($course_status === '1')
                          {
                              ?>
                              <button onclick="deleteAjax1(<?php echo $row['id'];  ?>)" class="ps-btn" title="Unpublish" class="zocarro-btn" style="background-color:#ffc107"><i class="fa fa-calendar-times-o" aria-hidden="true"></i></button>
                              <?php
                          }
                          ?>
                       
                         <button type="button" class="ps-btn editcourses" title="Edit"
                         style="background-color:#007bff;"> <i class="icon-pencil"></i></button>
                      
                      
                      
                          <button onclick="deletecourses(<?php echo $row['id'];  ?>)"  class="ps-btn" title="Delete" style="background-color:#dc3545;"><i class="icon-trash"></i></button>
                        <button class="ps-btn" style="background-color:#ffc107;" data-toggle="modal" data-target="#abc<?php echo $row['id'] ?>"><i class="fa fa-eye" aria-hidden="true"></i></button>

                          </td>
                          
                      
                  </tr>
              <?php
              include("../modal/viewcourses.php");
            }
            include("../modal/updatecourses.php");
            ?>
              </tbody>
              <tfoot align="center" class="thead">
                <tr>
                    <th style="display:none;">id</th>
                    <th>Index</th>
                    <th style="display:none;">e_id</th>
                    <th>Subject Name</th>
                    <th>Sem/Medium</th>
                    <th>Branch Name</th>
                    <th>Program Name</th>
                    <th>Uni/Stream Name</th>
                    <th style="display:none;">s_code</th>
                    <th style="display:none;">s_credit</th>
                    <th style="display:none;">Price</th>
                    <th style="display:none;">Discount In %</th>
                    <th style="display:none;">Plan Duration</th>
                    <th style="display:none;">Booklet</th>
                    <th style="display:none;">des</th>
                    <th style="display:none;">v_limit</th>
                    <th>Start Date</th>
                    <th style="display:none;">End Date</th>
                    <th>Action</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <?php
    }
    
    if(isset($_POST['ssm']))
    {
        $ssm = mysqli_real_escape_string($con,$_POST['ssm']);
    ?>

          <div class="table-responsive">
            <table id="load" class="table table-hover table-bordered zero-configuration">
              <thead class="thead-dark" align="center">
                <tr>
                     <th style="display:none;">id</th>
                    <th>Index</th>
                    <th style="display:none;">e_id</th>
                    <th>Subject Name</th>
                    <th>Sem/Medium</th>
                    <th>Branch Name</th>
                    <th>Program Name</th>
                    <th>Uni/Stream Name</th>
                    <th style="display:none;">s_code</th>
                    <th style="display:none;">s_credit</th>
                    <th style="display:none;">Price</th>
                    <th style="display:none;">Discount In %</th>
                    <th style="display:none;">Plan Duration</th>
                    <th style="display:none;">Booklet</th>
                    <th style="display:none;">des</th>
                    <th style="display:none;">v_limit</th>
                    <th>Start Date</th>
                    <th style="display:none;">End Date</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody align="center">
                <?php
              $count = 0; 
              $cmd="select * from course_data,term_data WHERE course_data.term_id = term_data.term_id and term_data.term_name Like '%".$ssm."%' ORDER BY course_data.id DESC";
              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
              while($row=mysqli_fetch_array($result))
              {     
                  $count = $count + 1;
                  $id=$row['id'];
                  $e_id=$row['e_id'];
                  $stream_id=$row['stream_id'];
                  $pr_id=$row['pr_id'];
                  $b_id=$row['b_id'];
                  $term_id=$row['term_id'];
                  $course_name=$row['course_name'];
                  $course_price=$row['course_price'];
                  $course_dis=$row['course_dis'];
                  $course_plan_duration=$row['course_plan_duration'];
                  $course_booklet=$row['course_booklet'];
                  $course_sdate=$row['course_sdate'];
                  $course_edate=$row['course_edate'];
                  $course_status=$row['course_status'];
                  $course_apprrej=$row['course_apprrej'];
                  $course_des=$row['course_des'];
                  $course_video_limit=$row['course_video_limit'];
                  $rej_reason=$row['rej_reason'];
                  $sub_code=$row['sub_code'];
                  $credit=$row['credit'];
                  
                  $sel="select * from editor_data where e_id='$e_id'";
                  $run=mysqli_query($con,$sel);
                  while($col=mysqli_fetch_array($run))
                  {
                      $ename=$col['e_name'];
                  }
                  
                   $cmd1="select * from stream_data where stream_id = '$stream_id'";
              $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
              while($row1=mysqli_fetch_array($result1))
              {
                  $stream_name=$row1['stream_name'];
                  $uni=$row1['uni'];
              }
                  
                  $cmd2="select * from program_data where pr_id = '$pr_id'";
              $result2=mysqli_query($con,$cmd2) or die(mysqli_error($con));
              while($row2=mysqli_fetch_array($result2))
              {
                  $pr_id=$row2['program_name'];
              }
                  
                  $cmd3="select * from branch_data where b_id = '$b_id'";
              $result3=mysqli_query($con,$cmd3) or die(mysqli_error($con));
              while($row3=mysqli_fetch_array($result3))
              {
                  $b_id=$row3['b_name'];
              }
              
              $cmd4="select * from term_data where term_id = '$term_id'";
              $result4=mysqli_query($con,$cmd4) or die(mysqli_error($con));
              while($row4=mysqli_fetch_array($result4))
              {
                  $term_name=$row4['term_name'];
                  $med=$row4['med'];
              }
              ?>
                <tr id="delete<?php echo $row['id'] ?>">
                    <td style="display:none;"><?php echo $id; ?></td>
                    <td><?php echo $count; ?></td>
                    <td style="display:none;"><?php echo $e_id; ?></td>
                    <td><?php echo $course_name;?></td>
                    <td><?php echo $term_name; ?> / <?php echo $med; ?></td>
                    <td><?php echo $b_id; ?></td>
                    <td><?php echo $pr_id; ?></td>
                    <td><?php echo $uni; ?> / <?php echo $stream_name; ?></td>
                    <td style="display:none;"><?php echo $course_price;?></td>
                    <td style="display:none;"><?php echo $course_dis;?></td>
                    <td style="display:none;"><?php echo $course_plan_duration;?></td>
                    <td style="display:none;"><?php echo $course_des; ?></td>
                    <td style="display:none;"><?php echo $course_video_limit; ?></td>
                    <td style="display:none;"><?php echo $course_booklet; ?></td>
                    <td><?php echo $course_sdate; ?></td>
                    <td style="display:none;"><?php echo $course_edate; ?></td>
                    <td style="display:none;"><?php echo $sub_code; ?></td>
                    <td style="display:none;"><?php echo $credit; ?></td>
                    <td>
                    <?php
                          if($course_status === '0')
                          {
                              ?>
                              <button onclick="deleteAjax(<?php echo $row['id'];  ?>)" class="ps-btn" class="zocarro-btn" title="Publish" style="background-color:#28a745"><i class="fa fa-calendar-check-o" aria-hidden="true"></i></button>
                              <?php
                          }
                          elseif($course_status === '1')
                          {
                              ?>
                              <button onclick="deleteAjax1(<?php echo $row['id'];  ?>)" class="ps-btn" title="Unpublish" class="zocarro-btn" style="background-color:#ffc107"><i class="fa fa-calendar-times-o" aria-hidden="true"></i></button>
                              <?php
                          }
                          ?>
                       
                         <button type="button" class="ps-btn editcourses" title="Edit"
                         style="background-color:#007bff;"> <i class="icon-pencil"></i></button>
                      
                      
                      
                          <button onclick="deletecourses(<?php echo $row['id'];  ?>)"  class="ps-btn" title="Delete" style="background-color:#dc3545;"><i class="icon-trash"></i></button>
                        <button class="ps-btn" style="background-color:#ffc107;" data-toggle="modal" data-target="#abc<?php echo $row['id'] ?>"><i class="fa fa-eye" aria-hidden="true"></i></button>

                          </td>
                          
                      
                  </tr>
              <?php
              include("../modal/viewcourses.php");
            }
            include("../modal/updatecourses.php");
            ?>
              </tbody>
              <tfoot align="center" class="thead">
                <tr>
                    <th style="display:none;">id</th>
                    <th>Index</th>
                    <th style="display:none;">e_id</th>
                    <th>Subject Name</th>
                    <th>Sem/Medium</th>
                    <th>Branch Name</th>
                    <th>Program Name</th>
                    <th>Uni/Stream Name</th>
                    <th style="display:none;">s_code</th>
                    <th style="display:none;">s_credit</th>
                    <th style="display:none;">Price</th>
                    <th style="display:none;">Discount In %</th>
                    <th style="display:none;">Plan Duration</th>
                    <th style="display:none;">Booklet</th>
                    <th style="display:none;">des</th>
                    <th style="display:none;">v_limit</th>
                    <th>Start Date</th>
                    <th style="display:none;">End Date</th>
                    <th>Action</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <?php
    }
    
    if(isset($_POST['smd']))
    {
        $smd = mysqli_real_escape_string($con,$_POST['smd']);
    ?>

          <div class="table-responsive">
            <table id="load" class="table table-hover table-bordered zero-configuration">
              <thead class="thead-dark" align="center">
                <tr>
                     <th style="display:none;">id</th>
                    <th>Index</th>
                    <th style="display:none;">e_id</th>
                    <th>Subject Name</th>
                    <th>Sem/Medium</th>
                    <th>Branch Name</th>
                    <th>Program Name</th>
                    <th>Uni/Stream Name</th>
                    <th style="display:none;">s_code</th>
                    <th style="display:none;">s_credit</th>
                    <th style="display:none;">Price</th>
                    <th style="display:none;">Discount In %</th>
                    <th style="display:none;">Plan Duration</th>
                    <th style="display:none;">Booklet</th>
                    <th style="display:none;">des</th>
                    <th style="display:none;">v_limit</th>
                    <th>Start Date</th>
                    <th style="display:none;">End Date</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody align="center">
                <?php
              $count = 0; 
              $cmd="select * from course_data,term_data WHERE course_data.term_id = term_data.term_id and term_data.med Like '%".$smd."%' ORDER BY course_data.id DESC";
              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
              while($row=mysqli_fetch_array($result))
              {     
                  $count = $count + 1;
                  $id=$row['id'];
                  $e_id=$row['e_id'];
                  $stream_id=$row['stream_id'];
                  $pr_id=$row['pr_id'];
                  $b_id=$row['b_id'];
                  $term_id=$row['term_id'];
                  $course_name=$row['course_name'];
                  $course_price=$row['course_price'];
                  $course_dis=$row['course_dis'];
                  $course_plan_duration=$row['course_plan_duration'];
                  $course_booklet=$row['course_booklet'];
                  $course_sdate=$row['course_sdate'];
                  $course_edate=$row['course_edate'];
                  $course_status=$row['course_status'];
                  $course_apprrej=$row['course_apprrej'];
                  $course_des=$row['course_des'];
                  $course_video_limit=$row['course_video_limit'];
                  $rej_reason=$row['rej_reason'];
                  $sub_code=$row['sub_code'];
                  $credit=$row['credit'];
                  
                  $sel="select * from editor_data where e_id='$e_id'";
                  $run=mysqli_query($con,$sel);
                  while($col=mysqli_fetch_array($run))
                  {
                      $ename=$col['e_name'];
                  }
                  
                   $cmd1="select * from stream_data where stream_id = '$stream_id'";
              $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
              while($row1=mysqli_fetch_array($result1))
              {
                  $stream_name=$row1['stream_name'];
                  $uni=$row1['uni'];
              }
                  
                  $cmd2="select * from program_data where pr_id = '$pr_id'";
              $result2=mysqli_query($con,$cmd2) or die(mysqli_error($con));
              while($row2=mysqli_fetch_array($result2))
              {
                  $pr_id=$row2['program_name'];
              }
                  
                  $cmd3="select * from branch_data where b_id = '$b_id'";
              $result3=mysqli_query($con,$cmd3) or die(mysqli_error($con));
              while($row3=mysqli_fetch_array($result3))
              {
                  $b_id=$row3['b_name'];
              }
              
              $cmd4="select * from term_data where term_id = '$term_id'";
              $result4=mysqli_query($con,$cmd4) or die(mysqli_error($con));
              while($row4=mysqli_fetch_array($result4))
              {
                  $term_name=$row4['term_name'];
                  $med=$row4['med'];
              }
              ?>
                <tr id="delete<?php echo $row['id'] ?>">
                    <td style="display:none;"><?php echo $id; ?></td>
                    <td><?php echo $count; ?></td>
                    <td style="display:none;"><?php echo $e_id; ?></td>
                    <td><?php echo $course_name;?></td>
                    <td><?php echo $term_name; ?> / <?php echo $med; ?></td>
                    <td><?php echo $b_id; ?></td>
                    <td><?php echo $pr_id; ?></td>
                    <td><?php echo $uni; ?> / <?php echo $stream_name; ?></td>
                    <td style="display:none;"><?php echo $course_price;?></td>
                    <td style="display:none;"><?php echo $course_dis;?></td>
                    <td style="display:none;"><?php echo $course_plan_duration;?></td>
                    <td style="display:none;"><?php echo $course_des; ?></td>
                    <td style="display:none;"><?php echo $course_video_limit; ?></td>
                    <td style="display:none;"><?php echo $course_booklet; ?></td>
                    <td><?php echo $course_sdate; ?></td>
                    <td style="display:none;"><?php echo $course_edate; ?></td>
                    <td style="display:none;"><?php echo $sub_code; ?></td>
                    <td style="display:none;"><?php echo $credit; ?></td>
                    <td>
                    <?php
                          if($course_status === '0')
                          {
                              ?>
                              <button onclick="deleteAjax(<?php echo $row['id'];  ?>)" class="ps-btn" class="zocarro-btn" title="Publish" style="background-color:#28a745"><i class="fa fa-calendar-check-o" aria-hidden="true"></i></button>
                              <?php
                          }
                          elseif($course_status === '1')
                          {
                              ?>
                              <button onclick="deleteAjax1(<?php echo $row['id'];  ?>)" class="ps-btn" title="Unpublish" class="zocarro-btn" style="background-color:#ffc107"><i class="fa fa-calendar-times-o" aria-hidden="true"></i></button>
                              <?php
                          }
                          ?>
                       
                         <button type="button" class="ps-btn editcourses" title="Edit"
                         style="background-color:#007bff;"> <i class="icon-pencil"></i></button>
                      
                      
                      
                          <button onclick="deletecourses(<?php echo $row['id'];  ?>)"  class="ps-btn" title="Delete" style="background-color:#dc3545;"><i class="icon-trash"></i></button>
                        <button class="ps-btn" style="background-color:#ffc107;" data-toggle="modal" data-target="#abc<?php echo $row['id'] ?>"><i class="fa fa-eye" aria-hidden="true"></i></button>

                          </td>
                          
                      
                  </tr>
              <?php
              include("../modal/viewcourses.php");
            }
            include("../modal/updatecourses.php");
            ?>
              </tbody>
              <tfoot align="center" class="thead">
                <tr>
                    <th style="display:none;">id</th>
                    <th>Index</th>
                    <th style="display:none;">e_id</th>
                    <th>Subject Name</th>
                    <th>Sem/Medium</th>
                    <th>Branch Name</th>
                    <th>Program Name</th>
                    <th>Uni/Stream Name</th>
                    <th style="display:none;">s_code</th>
                    <th style="display:none;">s_credit</th>
                    <th style="display:none;">Price</th>
                    <th style="display:none;">Discount In %</th>
                    <th style="display:none;">Plan Duration</th>
                    <th style="display:none;">Booklet</th>
                    <th style="display:none;">des</th>
                    <th style="display:none;">v_limit</th>
                    <th>Start Date</th>
                    <th style="display:none;">End Date</th>
                    <th>Action</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <?php
    }
?>