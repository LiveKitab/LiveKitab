
        <div class="table-responsive">
            <table id="load" class="table table-hover table-bordered zero-configuration" style="width:100%">
              <thead class="thead-dark" align="center">
                <tr>
                    <th style="display:none;">id</th>
                    <th style="display:none;">Index</th>
                    <th>Video Sequence</th>
                    <th>Title</th>
                    <th>Chapter Name</th>
                    <th>Link</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Download </th>
                    <th>View </th>
                </tr>
              </thead>
              <tbody align="center">
                <?php
            $count = 0; 
              $cmd="select * from final_video where c_id='$c_id' and course_id='$course_id' ORDER BY sequence ASC";
              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
              while($row1=mysqli_fetch_array($result))
              {     
                  $count = $count + 1;
                  $id=$row1['id'];
                  $course_id=$row1['course_id'];
                  $v_title=$row1['v_title'];
                  $v_link1=$row1['v_link'];
                  $v_date=$row1['v_date'];
                  $v_status=$row1['v_status'];
                  $v_attach=$row1['v_attach'];
                  $v_des=$row1['v_des'];
                  $ch_name=$row1['ch_name'];
                  $sequence=$row1['sequence'];
              ?>
                <tr id="delete<?php echo $row['id'] ?>">
                    <td style="display:none;"><?php echo $id; ?></td>
                    <td style="display:none;"><?php echo $count; ?></td>
                    <td><?php echo $sequence;?></td>
                    <td><?php echo $v_title;?></td>
                    <td><?php echo $ch_name;?></td>
                    <td><a href="<?php echo $v_link1; ?>" target="_blank" title="Play"><i class="fa fa-play-circle-o" style="font-size:25pt;"></i></a></td>
                    <td><?php echo $v_date;?></td>
                    
                    <td>
                        <?php
                            if($v_status === '0')
                            {
                                echo'<p style="color:orange">Under Editing</p>';
                            }
                            elseif($v_status === '1')
                            {
                                echo'<p style="color:green">On Platform</p>';
                            }
                            elseif($v_status === '2')
                            {
                                echo'<p style="color:red">Off Platform</p>';
                            }
                            
                            
                        ?>
                    </td>
                    <td>
                         <a class="ps-btn" href="../src/creator/video/<?php echo $v_attach;?>" role="button" title="Download Attachment" style="background-color:#fb7c00; color:white;" download><i class="fa fa-download" aria-hidden="true"></i></a>
                     </td>
                     <td>
                     <button class="ps-btn" style="background-color:#ffc107;" data-toggle="modal" data-target="#abcd<?php echo $row1['id'] ?>"><i class="fa fa-eye" aria-hidden="true"></i></button>

                     </td>
                    
                      
                  </tr>
              <?php
              include("back/modal/viewfinalvideo.php");
            }
            
            ?>
              </tbody>
              <tfoot align="center" class="thead">
                <tr>
                   <th style="display:none;">id</th>
                    <th style="display:none;">Index</th>
                    <th>Video Sequence</th>
                    <th>Title</th>
                    <th>Chapter Name</th>
                    <th>Link</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Download </th>
                    <th>View </th>
                </tr>
              </tfoot>
            </table>
          </div>
           
       
      