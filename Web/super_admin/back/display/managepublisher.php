

                    
          <div class="table-responsive">
            <table id="load" class="table table-hover table-bordered zero-configuration" width="100%">
              <thead class="thead-dark" align="center">
                <tr>
                    <th style="display:none;">id</th>
                  <th>Index</th>
                    <th>Name</th>                    
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th style="display:none;">Des</th>
                    <th style="display:none;">State</th> 
                    <th style="display:none;">City</th>
                    <th>Action</th>
                    
                     
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
                    <td style="display:none;"><?php echo $e_state; ?></td>
                    <td style="display:none;"><?php echo $e_city; ?></td> 
                    <td>
                        
                    <?php
                          if($e_status === '0')
                          {
                              ?>
                              <button onclick="deleteAjax(<?php echo $row['id'];  ?>)" class="ps-btn" class="zocarro-btn" title="Publish" style="background-color:#28a745"><i class="fa fa-unlock" aria-hidden="true"></i></button>
                              <?php
                          }
                          elseif($e_status === '1')
                          {
                              ?>
                              <button onclick="deleteAjax1(<?php echo $row['id'];  ?>)"  class="ps-btn" class="zocarro-btn" title="Unpublish" style="background-color:#ffc107"><i class="fa fa-lock" aria-hidden="true"></i></button>
                              <?php
                          }
                          ?>
                        
                         <button type="button" class="ps-btn editeditor" title="Edit"
                         style="background-color:#007bff;"><i class="icon-pencil"></i></button>
                         
                      
                      
                          <button onclick="deleteeditor(<?php echo $row['id'];  ?>)" class="ps-btn" title="Delete" style="background-color:#dc3545;"><i class="icon-trash"></i></button>
                        
                        <button class="ps-btn" style="background-color:#ffc107;" data-toggle="modal" data-target="#abc<?php echo $row['id'] ?>"><i class="fa fa-eye" aria-hidden="true"></i></button>
                      
                          
                          </td>
                      
                  </tr>
              <?php
              include("back/modal/viewpublisher.php");
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
                    <th style="display:none;">State</th> 
                    <th style="display:none;">City</th>
                    <th>Action</th>
                    
                </tr>
              </tfoot>
            </table>
          </div>
       
      