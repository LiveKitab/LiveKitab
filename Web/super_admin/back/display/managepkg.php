

                    
          <div class="table-responsive">
            <table id="load" class="table table-hover table-bordered zero-configuration" width="100%">
              <thead class="thead-dark" align="center">
                <tr>
                    <th style="display:none;">Id</th>
                    <th>Index</th>
                    <th style="display:none;">Package Name</th>
                    <th>Subject Name</th>
                    <th style="display:none;">rmk </th>
                    <th>Subject Code</th>
                    <th>Action</th>
                    
                   
                </tr>
              </thead>
              <tbody align="center">
                <?php
              $count = 0; 
              $cmd="select * from package_product where pkg_id='$pkg_id'";
              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
              while($row=mysqli_fetch_array($result))
              {     
                  $count = $count + 1;
                  $id=$row['id'];
                  $pkg_id=$row['pkg_id'];
                  $course_id=$row['course_id'];
                  $remark=$row['remark'];
                  
                  
                  $cmd1="select * from package where pkg_id='$pkg_id'";
              $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
              while($row1=mysqli_fetch_array($result1))
              {
                  $pkg_title=$row1['pkg_title'];
                  
              }
                  
                  $cmd2="select * from course_data where course_id = '$course_id'";
              $result2=mysqli_query($con,$cmd2) or die(mysqli_error($con));
              while($row2=mysqli_fetch_array($result2))
              {
                  $course_name=$row2['course_name'];
                  $sub_code=$row2['sub_code'];
              }
                  
                  
                  
                  
                 
              ?>
                <tr id="delete<?php echo $row['id'] ?>" class="showmodal">
                    <td style="display:none;"><?php echo $id; ?></td>
                    <td><?php echo $count; ?></td>
                    <td style="display:none;"><?php echo $pkg_title; ?></td>
                    <td><?php echo $course_name; ?> 
                    <td style="display:none;"><?php echo $remark; ?></td>
                    <td><?php echo $sub_code; ?> 
                    
                    
                    <td>
                        
                         <button type="button" class="ps-btn editmngpkg" title="Edit"
                         style="background-color:#007bff;"><i class="icon-pencil"></i></button>
                         
                          <button onclick="deletemngpkg(<?php echo $row['id'];  ?>)" class="ps-btn" title="Delete" style="background-color:#dc3545;"><i class="icon-trash"></i></button>
                        
                          </td>
                          

                  </tr>
              <?php
              include("back/modal/viewmanagepkg.php");
            }
            include("back/modal/updatemanagepkg.php");
            
            ?>
              </tbody>
              <tfoot align="center" class="thead">
                <tr>
                    <th style="display:none;">Id</th>
                    <th>Index</th>
                    <th style="display:none;">Package Name</th>
                    <th>Subject Name</th>
                    <th style="display:none;">rmk </th>
                    <th>Subject Code</th>
                    <th>Action</th>
                   
                    
                </tr>
              </tfoot>
            </table>
          </div>
       
      