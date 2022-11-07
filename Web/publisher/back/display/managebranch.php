

                    
          <div class="table-responsive">
            <table id="load" class="table table-hover table-bordered zero-configuration">
              <thead class="thead-dark" align="center">
                <tr>
                    <th style="display:none;">id</th>
                    <th>Index</th>
                    <th>Branch Name</th>
                    <th>Image</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Action</th>
                    <th>Update</th> 
                    <th>Delete</th> 
                     
                </tr>
              </thead>
              <tbody align="center">
                <?php
              $count = 0; 
              $cmd="select * from branch_data order by id asc";
              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
              while($row=mysqli_fetch_array($result))
              {     
                  $index=$row['id'];
                  $b_name=$row['b_name'];
                  $b_stime=$row['b_stime'];
                  $b_etime=$row['b_etime'];
                  $b_status=$row['b_status'];
                  $bg=$row['b_bg'];
                  
                 
              ?>
                <tr id="delete<?php echo $row['id'] ?>">
                    <td style="display:none;"><?php echo $index; ?></td>
                    <td><?php echo $count=$count+1; ?></td>
                    <td><?php echo $b_name; ?></td>
                    <td><img src="../src/branch/<?php echo $bg ?>" style="height:60px"  class="img-fluid img-thumbnail" /></td>
                    <td><?php echo $b_stime; ?></td>
                    <td><?php echo $b_etime; ?></td>
                    
                    <?php
                          if($b_status === '0')
                          {
                              ?>
                              <td><button onclick="blockbranch(<?php echo $row['id'];  ?>)" class="ps-btn" class="zocarro-btn" style="background-color:#28a745">Block</button></td>
                              <?php
                          }
                          elseif($b_status === '1')
                          {
                              ?>
                              <td><button onclick="unblockbranch(<?php echo $row['id'];  ?>)"  class="ps-btn" class="zocarro-btn" style="background-color:#ffc107">Unblock</button></td>
                              <?php
                          }
                          ?>
                       <td>
                         <button type="button" class="ps-btn editbranch" style="background-color:#007bff;">Edit</button>
                      </td>
                      
                      <td>
                          <button onclick="deletebranch(<?php echo $row['id'];  ?>)" class="ps-btn" style="background-color:#dc3545;">Delete</button>
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
                    <th>Branch Name</th>
                    <th>Image</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Action</th>
                    <th>Update</th> 
                    <th>Delete</th> 
                </tr>
              </tfoot>
            </table>
          </div>
       
      