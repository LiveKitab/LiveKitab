

                    
          <div class="table-responsive">
            <table id="load" class="table table-hover table-bordered zero-configuration" width="100%">
              <thead class="thead-dark" align="center">
                <tr>
                    <th>Sr. No</th>
                    <th style="display:none;">id</th>
                    <th>Chapter Name</th>
                    <th>Title</th>
                    <th>Video Sequence</th>
                    <th>Link</th>
                    <th>Status</th>
                    <th>View</th>
                </tr>
              </thead>
              <tbody align="center">
                <?php
            $count = 0;
            
              $cmd="select * from creator_video where c_id='$c_id' and subject_id='$subject_id' ORDER BY ch_id ASC";
              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
              while($row=mysqli_fetch_array($result))
              {     
                  $id=$row['id'];
                  $ch_id=$row['ch_id'];
                 
                  $Subject_id=$row['Subject_id'];
                  $course_id=$row['course_id'];
                  $v_title=$row['v_title'];
                  $v_link1=$row['v_link'];
                  $v_des=$row['v_des'];
                  $v_rmk=$row['v_rmk'];
                  $v_status=$row['v_status'];
                  $v_doc1=$row['v_doc1'];
                  $v_doc2=$row['v_doc2'];
                  $v_counter=$row['v_counter'];
                  $ch_name=$row['ch_name'];
                  $sequence=$row['sequence'];
                  
                $cmd1="select * from chapter_data where ch_id='$ch_id' ";
                $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
                while($row1=mysqli_fetch_array($result1))
                {
                    $chapter= $row1['ch_no'].'-'.$row1['ch_name'];
                }
               
              ?>
                <tr id="delete<?php echo $row['id'] ?>" class="showmodal" >
                    <td><?php echo $count = $count + 1; ?></td>
                    <td style="display:none;"><?php echo $id; ?></td>
                    <td><?php echo $chapter;  ?></td>
                    <td><?php echo $v_title;?></td>
                    <td><?php echo $sequence;?></td>
                    
                    
                    
                    
                    <td><a href="<?php echo $v_link1; ?>" target="_blank" title="Play"><i class="fa fa-play-circle-o" style="font-size:25pt;"></i></a></td>
                   
                    
                    
                    <td>
                        <?php
                            if($v_status === '0')
                            {
                                echo'<p style="color:orange;">Unpublish</p>';
                            }
                            elseif($v_status === '1')
                            {
                                echo'<p style="color:green;">Publish</p>';
                            }
                        ?>
                    </td>
                     <td>
                            <button class="ps-btn" style="background-color:#ffc107;" data-toggle="modal" data-target="#abc<?php echo $row['id'] ?>"><i class="fa fa-eye" aria-hidden="true"></i></button>
                        </td>
                    
                      
                  </tr>
              <?php
                include("back/modal/viewvideo.php");
               }
              ?>
              </tbody>
              <tfoot align="center" class="thead">
                <tr>
                    <th>Sr. No</th>
                    <th style="display:none;">id</th>
                    <th>Chapter Name</th>
                    <th>Title</th>
                    <th>Video Sequence</th>
                    <th>Link</th>
                    <th>Status</th>
                    <th>View</th>
                </tr>
              </tfoot>
            </table>
          </div>
       
      