

                    
          <div class="table-responsive">
            <table id="load" class="table table-hover table-bordered zero-configuration">
              <thead class="thead-dark" align="center">
                <tr>
                    <th style="display:none;">Id</th>
                    <th>Index</th>
                    <th>User Name</th>                    
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th style="display:none;">Addr</th>
                    <th>State</th> 
                    <th>City</th> 
                    <th>Update</th> 
                    <th>Delete</th> 
                    <th>View</th> 
                </tr>
              </thead>
              <tbody align="center">
                <?php
              $count = 0; 
              $cmd="select * from user_data";
              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
              while($row=mysqli_fetch_array($result))
              {     
                  $count = $id + 1;
                  $id=$row['id'];
                  $username=$row['username'];
                  $u_fname=$row['u_fname'];
                  $u_lname=$row['u_lname'];
                  $u_cno=$row['u_cno'];
                  $u_email=$row['u_email'];
                  $u_state=$row['u_state'];
                  $u_city=$row['u_city'];
                  $u_addr=$row['u_addr'];
                 
              ?>
                <tr id="delete<?php echo $row['id'] ?>">
                    <td style="display:none;"><?php echo $id; ?></td>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $username; ?></td>
                    <td><?php echo $u_fname; ?></td>
                    <td><?php echo $u_lname; ?></td>
                    <td><?php echo $u_cno; ?></td>
                    <td><?php echo $u_email; ?></td>
                    <td style="display:none;"><?php echo $u_addr; ?></td>
                    <td><?php echo $u_state; ?></td> 
                    <td><?php echo $u_city; ?></td> 
                    <td>
                         <button type="button" class="ps-btn editscholar"
                         style="background-color:#007bff;">Edit</button>
                      </td>
                      
                      <td>
                          <button onclick="deletescholar(<?php echo $row['id'];  ?>)" class="ps-btn" style="background-color:#dc3545;">Delete</button>
                          </td>
                          <td>
                              <form target="_blank" action="viewscholar" method="post">
                                   <input type="hidden" name="u_id" id="u_id" value="<?php echo $u_id;?>">
                                   <center><button type="submit" name="view" id="view" class="ps-btn" style="background-color:#ffc107">View</button></center>
                              </form>
              </td>
                  </tr>
              <?php
            }
            include("back/modal/updatescholar.php");
            ?>
              </tbody>
              <tfoot align="center" class="thead">
                <tr>
                    <th style="display:none;">Id</th>
                    <th>Index</th>
                    <th>User Name</th>                    
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th style="display:none;">Addr</th>
                    <th>State</th> 
                    <th>City</th> 
                    <th>Update</th> 
                    <th>Delete</th> 
                    <th>View</th>  
                </tr>
              </tfoot>
            </table>
          </div>
       
      