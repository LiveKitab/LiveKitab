

                    
          <div class="table-responsive">
            <table id="load1" class="table table-hover table-bordered zero-configuration">
              <thead class="thead-dark" align="center">
                <tr>
                    <th style="display:none;">id</th>
                    <th>Index</th>
                    <th>Program Name</th>
                    <th>Manage</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody align="center">
                <?php
              $count = 0; 
              $cmd="select * from program_data where stream_id='$s_id' order by id asc";
              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
              while($row=mysqli_fetch_array($result))
              {     
                  $index=$row['id'];
                  $p_name=$row['program_name'];
                  
                  $pr_id=$row['pr_id'];
                  $pr_id = base64_encode($pr_id);
                  $stream_id=$row['stream_id'];
                  $stream_id = base64_encode($stream_id);
                  $university_id=$row['university_id'];
                  $university_id = base64_encode($university_id);
                 
              ?>
                <tr id="delete<?php echo $row['id'] ?>">
                    <td style="display:none;"><?php echo $index; ?></td>
                    <td><?php echo $count=$count+1; ?></td>
                    <td><?php echo $p_name; ?></td>
                    <td>
                        <a href="addbranch?stringdata=<?php echo $stream_id; ?>&stringdata1=<?php echo $pr_id; ?>&stringdata2=<?php echo $university_id; ?>" style="background-color:#20c997;" class="ps-btn"><i class="fa fa-plus"></i> Add Branch</a>
                    </td>
                    <td>
                      <button type="button" class="ps-btn editprogram" title="Edit" style="background-color:#007bff;"><i class="icon-pencil"></i></button>
                      <button onclick="deleteprogram(<?php echo $row['id'];  ?>)" class="ps-btn" title="Delete" style="background-color:#dc3545;"><i class="icon-trash"></i></button>
                    </td>
                  </tr>
              <?php
              
            }
            include("back/modal/updateprogram.php");
            ?>
              </tbody>
              <tfoot align="center" class="thead">
                <tr>
                    <th style="display:none;">id</th>
                    <th>Index</th>
                    <th>Program Name</th> 
                    <th>Manage</th>
                    <th>Action</th>

                </tr>
              </tfoot>
            </table>
          </div>
       
      