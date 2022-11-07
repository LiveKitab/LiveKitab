

                    
          <div class="table-responsive">
            <table id="load" class="table table-hover table-bordered zero-configuration">
              <thead class="thead-dark" align="center">
                <tr>
                  <th>Index</th>
                    <th>Name</th>                    
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>State</th> 
                    <th>City</th> 
                    <th>View</th> 
                </tr>
              </thead>
              <tbody align="center">
                <?php
              $id = 0; 
              $cmd="select * from editor_data";
              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
              while($row=mysqli_fetch_array($result))
              {     
                  $id = $id + 1;
                  $e_name=$row['e_name'];
                  $e_cno=$row['e_cno'];
                  $e_email=$row['e_email'];
                  $e_addr=$row['e_addr'];
                  $e_state=$row['e_state'];
                  $e_city=$row['e_city'];
                  $e_des=$row['e_des'];
                 
              ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $e_name; ?></td>
                    <td><?php echo $e_cno; ?></td>
                    <td><?php echo $e_email; ?></td>
                    <td><?php echo $e_addr; ?></td>
                    <td><?php echo $e_state; ?></td>
                    <td><?php echo $e_city; ?></td>  
                    <td>
                          <button class="ps-btn" style="background-color:#ffc107;" data-toggle="modal" data-target="#abc<?php echo $row['id'] ?>"><i class="fa fa-eye" aria-hidden="true"></i></button>
                          </td>
                  </tr>
              <?php
              include("back/modal/viewpublisher.php");
            }
            ?>
              </tbody>
              <tfoot align="center" class="thead">
                <tr>
                   <th>Index</th>
                    <th>Name</th>                    
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>State</th> 
                    <th>City</th>
                    <th>View</th> 
                </tr>
              </tfoot>
            </table>
          </div>
       
      