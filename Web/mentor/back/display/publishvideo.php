
        <div class="table-responsive">
            <table id="load1" class="table table-hover table-bordered zero-configuration"  style="width:100%">
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
                    <th>Add Test</th>
                    <th>Add Exercise</th>
                </tr>
              </thead>
              <tbody align="center">
                <?php
              $count = 0; 
              $cmd="select * from creator_video where c_id='$c_id' and subject_id='$subject_id' and v_status='1' ORDER BY ch_id ASC";
              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
              while($row=mysqli_fetch_array($result))
              {     
                  $count = $count + 1;
                  $id=$row['id'];
                  $c_id=$row['c_id'];
                  $ch_id=$row['ch_id'];
                  $subject_id=$row['subject_id'];
                  $v_title=$row['v_title'];
                  $v_link1=$row['v_link'];
                  $v_date=$row['v_date'];
                  $v_status=$row['v_status'];
                  $v_id=$row['v_id'];
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
                        <a type="button" href="addtest?testdata=<?=base64_encode($v_id);?>&subdata=<?=base64_encode($subject_id);?>&chdata=<?=base64_encode($ch_id);?>&mentordata=<?=base64_encode($c_id);?>" class="ps-btn" style="background-color:#28a745;"><i class="fa fa-plus"></i></button>
                    </td>
                    <td>
                        <a type="button" href="addexercise?exercisedata=<?=base64_encode($v_id);?>&subdata=<?=base64_encode($subject_id);?>&chdata=<?=base64_encode($ch_id);?>&mentordata=<?=base64_encode($c_id);?>" class="ps-btn" style="background-color:#dc3545;"><i class="fa fa-plus"></i></button>
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
                    <th>Add Test</th>
                    <th>Add Exercise</th>
                </tr>
              </tfoot>
            </table>
          </div>
           
       
      