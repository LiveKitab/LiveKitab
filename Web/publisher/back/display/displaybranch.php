

                    
          <div class="table-responsive">
            <table id="load" class="table table-hover table-bordered zero-configuration">
              <thead class="thead-dark" align="center">
                <tr>
                    <th style="display:none;">id</th>
                    <th>Index</th>
                    <th>Branch Name</th>                    
                    <th>Start Date</th>
                    <th>End Date</th>
                     
                     
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
                  
                 
              ?>
                <tr id="delete<?php echo $row['id'] ?>">
                    <td style="display:none;"><?php echo $index; ?></td>
                    <td><?php echo $count=$count+1; ?></td>
                    <td><?php echo $b_name; ?></td>
                    <td><?php echo $b_stime; ?></td>
                    <td><?php echo $b_etime; ?></td>
                    
                    
                      
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
                    <th>Start Date</th>
                    <th>End Date</th>
                    
                </tr>
              </tfoot>
            </table>
          </div>
       
      