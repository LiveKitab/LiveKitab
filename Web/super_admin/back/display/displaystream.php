

                    
          <div class="table-responsive">
            <table id="load" class="table table-hover table-bordered zero-configuration">
              <thead class="thead-dark" align="center">
                <tr>
                    <th style="display:none;">id</th>
                    <th>Index</th>
                    <th>Stream Name</th>
                    <th>Manage</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody align="center">
                <?php
              $count = 0; 
              $cmd="select * from stream_data where uni='$u_id' order by id asc";
              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
              while($row=mysqli_fetch_array($result))
              {     
                  $id=$row['id'];
                  $s_name=$row['stream_name'];
                  $s_id=$row['stream_id'];
                  $s_id = base64_encode($s_id);
                  $uni=$row['uni'];
                  $uni = base64_encode($uni);
              ?>
                <tr id="delete<?php echo $row['id'] ?>">
                    <td style="display:none;"><?php echo $id; ?></td>
                    <td><?php echo $count=$count+1; ?></td>
                    <td><?php echo $s_name; ?></td>
                    <td>
                        <a href="addprogram?stringdata=<?php echo $s_id;?>&stringdata1=<?php echo $uni;?>" style="background-color:#20c997;" class="ps-btn"><i class="fa fa-plus"></i> Add Program</a>
                    </td>
                    <td>
                      <button type="button" class="ps-btn editstream" title="Edit" style="background-color:#007bff;"><i class="icon-pencil"></i></button>
                      <button onclick="deletestream(<?php echo $row['id'];  ?>)" class="ps-btn" title="Delete" style="background-color:#dc3545;"><i class="icon-trash"></i></button>
                    </td>
                    
                      
                  </tr>
              <?php
              
            }
            include("back/modal/updatestructure.php");
            ?>
              </tbody>
              <tfoot align="center" class="thead">
                <tr>
                    <th style="display:none;">id</th>
                    <th>Index</th>
                    <th>Stream Name</th> 
                    <th>Manage</th>
                    <th>Action</th>
                </tr>
              </tfoot>
            </table>
          </div>
       
      