        <div class="table-responsive" >
            <table id="load4" class="table table-hover table-bordered zero-configuration" style="width:100%">
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
                    <th>Action</th>
                    <th>Test</th>
                     
                    
                </tr>
              </thead>
              <tbody align="center">
                <?php
            $count = 0; 
              $cmd="select * from creator_video where subject_id='$course_id' and v_status='1' ORDER BY sequence ASC";
              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
              while($row=mysqli_fetch_array($result))
              {     
                 $count = $count + 1;
                  $id=$row['id'];
                  $course_id=$row['course_id'];
                  $v_title=$row['v_title'];
                  $v_link1=$row['v_link'];
                  $v_des=$row['v_des'];
                  $v_rmk=$row['v_rmk'];
                  $v_date=$row['v_date'];
                  $v_status=$row['v_status'];
                  $v_doc1=$row['v_doc1'];
                  $v_doc2=$row['v_doc2'];
                  $v_id=$row['v_id'];
                  $v_id=base64_encode($v_id);
                  $videoid=$row['v_id'];
                  $ch_name=$row['ch_name'];
                  $sequence=$row['sequence'];
                 
              ?>
                <tr id="delete<?php echo $row['id'] ?>">
                    <td style="display:none;"><?php echo $id; ?></td>
                    <td style="display:none;"><?php echo $count; ?></td>
                    <td><?php echo $sequence;?></td>
                    <td><?php echo $v_title;?></td>
                    <td><?php echo $ch_name;?></td>
                    <td><a href="<?php echo $v_link1; ?>" target="_blank"><i class="fa fa-play-circle-o" style="font-size:25pt;"></i></a></td>
                    <td><?php echo $v_date;?></td>
                    
                    <td>
                        <?php
                            if($v_status === '0')
                            {
                                echo'<p style="color:orange">Pending</p>';
                            }
                            elseif($v_status === '1')
                            {
                                echo'<p style="color:green">Approved</p>';
                            }
                            elseif($v_status === '2')
                            {
                                echo'<p style="color:red">Rejected</p>';
                            }
                            
                            
                        ?>
                    </td>
                    <td>
                        <button type="button" class="ps-btn completevideo"
                         style="background-color:#007bff;">Complete</button>                    
                    </td>
                    <?php
                    $sel="select id from final_video where v_id='$videoid'";
                    $run=mysqli_query($con,$sel);
                    if(mysqli_num_rows($run)>0)
                    {
                        ?>
                        <td>
                        <a type="button" href="addtest?teststringdata=<?=$v_id;?>" class="ps-btn">Add Test</button>                    
                        </td>
                        <?php
                    }
                    else
                    {
                        ?>
                        <td>
                        <button type="button" onclick="myFunction()" class="ps-btn">Add Test</button>                    
                        </td>
                        <?php
                    }
                    ?>
                    
                  </tr>
              <?php
              
            }
            include("back/modal/completedvideo.php");
            
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
                    <th>Action</th>
                    <th>Test</th>
                    
                </tr>
              </tfoot>
            </table>
          </div>
          
          <script>
              function myFunction() {
                  toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          }
            toastr["warning"]("Complete Video First","Warning")
            }
          </script>
       
      