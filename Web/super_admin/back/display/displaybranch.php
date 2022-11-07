

                    
          <div class="table-responsive">
            <table id="load2" class="table table-hover table-bordered zero-configuration">
              <thead class="thead-dark" align="center">
                <tr>
                    <th style="display:none;">id</th>
                    <th>Index</th>
                    <th>Branch/Standard Name</th>
                    <th>Branch/Standard Image</th>
                    <th style="display:none;">Start Date</th>
                    <th style="display:none;">End Date</th>
                    <th>Manage</th>
                    <th>Action</th>
                    
                </tr>
              </thead>
              <tbody align="center">
                <?php
              $count = 0; 
              $cmd="select * from branch_data where stream_id='$stream_id' and pr_id='$pr_id' order by id asc";
              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
              while($row=mysqli_fetch_array($result))
              {     
                  $index=$row['id'];
                  $b_name=$row['b_name'];
                  $b_stime=$row['b_stime'];
                  $b_etime=$row['b_etime'];
                  $b_status=$row['b_status'];
                  $b_bg=$row['b_bg'];
                  
                  $finaluniversity_id=$row['university_id'];
                  $finaluniversity_id = base64_encode($finaluniversity_id);
                  $finalstream_id=$row['stream_id'];
                  $finalstream_id = base64_encode($finalstream_id);
                  $finalpr_id=$row['pr_id'];
                  $finalpr_id = base64_encode($finalpr_id);
                  $finalb_id=$row['b_id'];
                  $finalb_id = base64_encode($finalb_id);
                 
              ?>
                <tr id="delete<?php echo $row['id'] ?>">
                    <td style="display:none;"><?php echo $index; ?></td>
                    <td><?php echo $count=$count+1; ?></td>
                    <td><?php echo $b_name; ?></td>
                    <td><img src="../src/branch/<?php echo $b_bg; ?>" height="60px" alt=""></td>
                    <td style="display:none;"><?php echo $b_stime; ?></td>
                    <td style="display:none;"><?php echo $b_etime; ?></td>
                    <td>
                            <a href="addterm?stringdata=<?php echo $finalstream_id; ?>&stringdata1=<?php echo $finalpr_id; ?>&stringdata2=<?php echo $finalb_id; ?>&stringdata3=<?php echo $finaluniversity_id; ?>" style="background-color:#20c997;" class="ps-btn"><i class="fa fa-plus"></i> Add Semester/Year</a>
                        </td>
                    <td>
                    <?php
                          if($b_status === '0')
                          {
                              ?>
                              <button onclick="blockbranch(<?php echo $row['id'];  ?>)" class="ps-btn" title="Block" class="zocarro-btn" style="background-color:#28a745"><i class="fa fa-unlock" aria-hidden="true"></i></button>
                              <?php
                          }
                          elseif($b_status === '1')
                          {
                              ?>
                              <button onclick="unblockbranch(<?php echo $row['id'];  ?>)"  class="ps-btn" title="Unblock" class="zocarro-btn" style="background-color:#ffc107"><i class="fa fa-lock" aria-hidden="true"></i></button>
                              <?php
                          }
                          ?>
                       
                         <button type="button" class="ps-btn editbranch" title="Edit" style="background-color:#007bff;"><i class="icon-pencil"></i></button>
                      
                      
                      
                          <button onclick="deletebranch(<?php echo $row['id'];  ?>)" class="ps-btn" title="Delete" style="background-color:#dc3545;"><i class="icon-trash"></i></button>
                           </td>
                           
    
                        
                      
                  </tr>
                  
              <?php
             
            }
            include("back/modal/updatebranch.php");
            ?>
              </tbody>
              <tfoot align="center" class="thead">
                <tr>
                    <th style="display:none;">id</th>
                    <th>Index</th>
                    <th>Branch/Standard Name</th>
                    <th>Branch/Standard Image</th>
                    <th style="display:none;">Start Date</th>
                    <th style="display:none;">End Date</th>
                    <th>Manage</th>
                    <th>Action</th>
                    
                    
                </tr>
              </tfoot>
            </table>
          </div>
       
      