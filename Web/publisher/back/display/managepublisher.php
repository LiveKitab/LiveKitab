

                    
          <div class="table-responsive">
            <table id="load" class="table table-hover table-bordered zero-configuration">
              <thead class="thead-dark" align="center">
                <tr>
                    <th style="display:none;">id</th>
                  <th>Index</th>
                    <th>Name</th>                    
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th style="display:none;">Des</th>
                    <th>State</th> 
                    <th>City</th>
                    <th>Action</th>
                    <th>Update</th> 
                    <th>Delete</th> 
                     
                </tr>
              </thead>
              <tbody align="center">
                <?php
            $count = 0; 
              $cmd="select * from editor_data order by id asc";
              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
              while($row=mysqli_fetch_array($result))
              {     
                  $index=$row['id'];
                  $e_name=$row['e_name'];
                  $e_cno=$row['e_cno'];
                  $e_email=$row['e_email'];
                  $e_addr=$row['e_addr'];
                  $e_state=$row['e_state'];
                  $e_city=$row['e_city'];
                  $e_status=$row['e_status'];
                  $e_des=$row['e_des'];
                 
              ?>
                <tr id="delete<?php echo $row['id'] ?>">
                    <td style="display:none;"><?php echo $index; ?></td>
                    <td><?php echo $count=$count+1; ?></td>
                    <td><?php echo $e_name; ?></td>
                    <td><?php echo $e_cno; ?></td>
                    <td><?php echo $e_email; ?></td>
                    <td><?php echo $e_addr; ?></td>
                    <td style="display:none;"><?php echo $e_des; ?></td>
                    <td><?php echo $e_state; ?></td>
                    <td><?php echo $e_city; ?></td> 
                    <?php
                          if($e_status === '0')
                          {
                              ?>
                              <td><button onclick="deleteAjax(<?php echo $row['id'];  ?>)" class="ps-btn" class="zocarro-btn" style="background-color:#28a745">Block</button></td>
                              <?php
                          }
                          elseif($e_status === '1')
                          {
                              ?>
                              <td><button onclick="deleteAjax1(<?php echo $row['id'];  ?>)"  class="ps-btn" class="zocarro-btn" style="background-color:#ffc107">Unblock</button></td>
                              <?php
                          }
                          ?>
                       <td>
                         <button type="button" class="ps-btn editeditor"
                         style="background-color:#007bff;">Edit</button>
                      </td>
                      
                      <td>
                          <button onclick="deleteeditor(<?php echo $row['id'];  ?>)" class="ps-btn" style="background-color:#dc3545;">Delete</button>
                          </td>
                      
                  </tr>
              <?php
              
            }
            include("back/modal/updatepublisher.php");
            ?>
              </tbody>
              <tfoot align="center" class="thead">
                <tr>
                    <th style="display:none;">id</th>
                   <th>Index</th>
                    <th>Name</th>                    
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th style="display:none;">Des</th>
                    <th>State</th> 
                    <th>City</th>
                    <th>Action</th>
                    <th>Update</th> 
                    <th>Delete</th> 
                </tr>
              </tfoot>
            </table>
          </div>
       
      