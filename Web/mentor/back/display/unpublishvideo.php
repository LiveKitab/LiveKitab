
        <div class="table-responsive">
            <table id="load2" class="table table-hover table-bordered zero-configuration"  style="width:100%">
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
                    
                   
                    
                </tr>
              </thead>
              <tbody align="center">
                <?php
            $count = 0; 
              $cmd="select * from creator_video where c_id='$c_id' and subject_id='$subject_id' and v_status='0' ORDER BY ch_id ASC";
              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
              while($row=mysqli_fetch_array($result))
              {     
                  $count = $count + 1;
                  $id=$row['id'];
                  $ch_id=$row['ch_id'];
                  $course_id=$row['course_id'];
                  $v_title=$row['v_title'];
                  $v_link1=$row['v_link'];
                  $v_date=$row['v_date'];
                  $v_status=$row['v_status'];
                  $v_attach=$row['v_attach'];
                  $ch_name=$row['ch_name'];
                  $sequence=$row['sequence'];
                  $cmd2="select * from chapter_data where ch_id='$ch_id' ";
                  $result2=mysqli_query($con,$cmd2) or die(mysqli_error($con));
                  while($row2=mysqli_fetch_array($result2))
                  {
                      $chapter1= $row2['ch_no'].'-'.$row2['ch_name'];
                  }
              ?>
                <tr id="delete<?php echo $row['id'] ?>">
                    <td style="display:none;"><?php echo $id; ?></td>
                    <td style="display:none;"><?php echo $count; ?></td>
                    <td><?php echo $sequence;?></td>
                    <td><?php echo $v_title;?></td>
                    <td><?php echo $chapter1;?></td>
                    <td><a href="<?php echo $v_link1; ?>" target="_blank"><i class="fa fa-play-circle-o" style="font-size:25pt;"></i></a></td>
                    <td><?php echo $v_date;?></td>
                    
                    <td>
                        <?php
                            if($v_status === '0')
                            {
                                echo'<p style="color:orange">Unpublish</p>';
                            }
                            elseif($v_status === '1')
                            {
                                echo'<p style="color:green">Publish</p>';
                            }
                            
                            
                            
                        ?>
                    </td>
                    <td>
                         <a class="ps-btn" href="../src/creator/video/<?php echo $v_attach;?>" role="button" style="background-color:#fb7c00; color:white;" download><i class="fa fa-download" aria-hidden="true"></i></a>
                     </td>
                    
                      
                  </tr>
              <?php
              
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
                    
                  
                </tr>
              </tfoot>
            </table>
          </div>
           
       
      