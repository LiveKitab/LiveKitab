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
                    <th>Status</th>
                    <th>Action</th> 
                    
                </tr>
              </thead>
              <tbody align="center">
                <?php
            $count = 0; 
              $cmd="select * from creator_data where c_status='0' ORDER BY id DESC";
              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
              while($row=mysqli_fetch_array($result))
              {     
                  $count = $count + 1;
                  $id=$row['id'];
                  $c_name=$row['c_name'];
                  $c_fname=$row['c_fname'];
                  $c_lname=$row['c_lname'];
                  $c_cno=$row['c_cno'];
                  $c_email=$row['c_email'];
                  $c_addr=$row['c_addr'];
                  $c_state=$row['c_state'];
                  $c_status=$row['c_status'];
                  $c_city=$row['c_city'];
                  $c_edu=$row['c_edu'];
                  $c_spec=$row['c_spec'];
                  $c_joindate=$row['c_joindate'];
              ?>
                <tr id="delete<?php echo $row['id'] ?>">
                    <td><?php echo $count; ?></td>
                    <td><?php echo $c_name; echo ' '; echo $c_fname; echo ' ';    echo $c_lname;?></td>
                    <td><?php echo $c_cno; ?></td>
                    <td><?php echo $c_email; ?></td>
                    <td><?php echo $c_addr; ?></td>
                    <td><?php echo $c_state; ?></td>
                    <td><?php echo $c_city; ?></td>
                    <td>
                        <?php
                            if($c_status === '0')
                            {
                                echo'<p style="color:orange">Pending</p>';
                            }
                            elseif($c_status === '1')
                            {
                                echo'<p style="color:green">Approved</p>';
                            }
                            elseif($c_status === '2')
                            {
                                echo'<p style="color:red">Reject</p>';
                            }
                            
                            
                        ?>
                    </td>
                    <td>
                <button onclick="apprmentor(<?php echo $row['id'];  ?>)" class="ps-btn" title="Approve" style="background-color:#28a745;"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> </button>             

                    
                    
                    <button onclick="rejmentor(<?php echo $row['id'];  ?>)" class="ps-btn" title="Reject" style="background-color:#dc3545;"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> </button>             

                    
                    
                          <button class="ps-btn" style="background-color:#ffc107;" data-toggle="modal" data-target="#abc<?php echo $row['id'] ?>"><i class="fa fa-eye" aria-hidden="true"></i></button>
                          </td>
                  </tr>
              <?php
              include("back/modal/viewmentor.php");
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
                    <th>Status</th>
                    <th>Action</th> 
                    
                </tr>
              </tfoot>
            </table>
          </div>
       
      