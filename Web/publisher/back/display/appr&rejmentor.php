

                    
          <div class="table-responsive">
            <table id="load" class="table table-hover table-bordered zero-configuration">
              <thead class="thead-dark" align="center">
                <tr>
                    <th style="display:none;">id</th>
                    <th>Index</th>
                    <th>Name</th>
                    <th style="display:none;">fName</th>
                    <th style="display:none;">lName</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>State</th> 
                    <th>City</th>
                    <th>Publish</th>
                    <th>Update</th> 
                    <th>Delete</th> 
                     
                </tr>
              </thead>
              <tbody align="center">
                <?php
            $count = 0; 
              $cmd="select * from creator_data where c_status='1' ORDER BY id DESC";
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
                  $c_block=$row['c_block'];
                  $c_city=$row['c_city'];
                 
              ?>
                <tr id="delete<?php echo $row['id'] ?>">
                    <td style="display:none;"><?php echo $id; ?></td>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $c_name;?></td>
                    <td style="display:none;"><?php echo $c_fname;?></td>
                    <td style="display:none;"><?php echo $c_lname;?></td>
                    <td><?php echo $c_cno; ?></td>
                    <td><?php echo $c_email; ?></td>
                    <td><?php echo $c_addr; ?></td>
                    <td><?php echo $c_state; ?></td>
                    <td><?php echo $c_city; ?></td> 
                    <?php
                          if($c_block === '0')
                          {
                              ?>
                              <td><button onclick="deleteAjax(<?php echo $row['id'];  ?>)" class="ps-btn" class="zocarro-btn" style="background-color:#28a745">Block</button></td>
                              <?php
                          }
                          elseif($c_block === '1')
                          {
                              ?>
                              <td><button onclick="deleteAjax1(<?php echo $row['id'];  ?>)"  class="ps-btn" class="zocarro-btn" style="background-color:#ffc107">Unblock</button></td>
                              <?php
                          }
                          ?>
                       <td>
                         <button type="button" class="ps-btn editmentor"
                         style="background-color:#007bff;"> Edit</button>
                      </td>
                      
                      <td>
                          <button onclick="deletementor(<?php echo $row['id'];  ?>)"  class="ps-btn" style="background-color:#dc3545;">Delete</button>
                          </td>
                      
                  </tr>
              <?php
              
            }
            include("back/modal/updatementor.php");
            ?>
              </tbody>
              <tfoot align="center" class="thead">
                <tr>
                    <th style="display:none;">id</th>
                   <th>Index</th>
                    <th>Name</th>
                    <th style="display:none;">fName</th>
                    <th style="display:none;">lName</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>State</th> 
                    <th>City</th>
                    <th>Publish</th>
                    <th>Update</th> 
                    <th>Delete</th> 
                </tr>
              </tfoot>
            </table>
          </div>
       
      