

                    
          <div class="table-responsive">
            <table id="load" class="table table-hover table-bordered zero-configuration" width="100%">
              <thead class="thead-dark" align="center">
                <tr>
                    <th style="display:none;">Id</th>
                    <th>Index</th>
                    <th>Packahe Title</th>
                    <th>University</th>
                    <th style="display:none;">Stream </th>                    
                    <th style="display:none;">Program </th>
                    <th>Branch </th>
                    <th style="display:none;">Medium</th>
                    <th style="display:none;">Semester</th>
                    <th>Price</th>
                    <th>Discount</th> 
                    <th style="display:none;">Des</th>
                    <th>Action</th>
                    <th>Manage</th>
                   
                </tr>
              </thead>
              <tbody align="center">
                <?php
              $count = 0; 
              $cmd="select * from package";
              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
              while($row=mysqli_fetch_array($result))
              {     
                  $count = $id + 1;
                  $id=$row['id'];
                  $stream_id=$row['stream_id'];
                  $pr_id=$row['pr_id'];
                  $pkg_title=$row['pkg_title'];
                  $b_id=$row['b_id'];
                  $term_id=$row['term_id'];
                  $price=$row['price'];
                  $dis=$row['dis'];
                  $descr=$row['descr'];
                  $status=$row['status'];
                  $pkg_id=$row['pkg_id'];
                  $pkg_id=base64_encode($pkg_id);
                  
                  $cmd1="select * from stream_data where stream_id = '$stream_id'";
              $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
              while($row1=mysqli_fetch_array($result1))
              {
                  $stream_name=$row1['stream_name'];
                  $uni=$row1['uni'];
              }
                  
                  $cmd2="select * from program_data where pr_id = '$pr_id'";
              $result2=mysqli_query($con,$cmd2) or die(mysqli_error($con));
              while($row2=mysqli_fetch_array($result2))
              {
                  $pr_id=$row2['program_name'];
              }
                  
                  $cmd3="select * from branch_data where b_id = '$b_id'";
              $result3=mysqli_query($con,$cmd3) or die(mysqli_error($con));
              while($row3=mysqli_fetch_array($result3))
              {
                  $b_id=$row3['b_name'];
              }
              
              $cmd4="select * from term_data where term_id = '$term_id'";
              $result4=mysqli_query($con,$cmd4) or die(mysqli_error($con));
              while($row4=mysqli_fetch_array($result4))
              {
                  $term_name=$row4['term_name'];
                  $med=$row4['med'];
              }
                  
                  
                 
              ?>
                <tr id="delete<?php echo $row['id'] ?>" class="showmodal">
                    <td style="display:none;"><?php echo $id; ?></td>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $pkg_title; ?></td>
                    <td><?php echo $uni; ?> 
                    <td style="display:none;"><?php echo $stream_name; ?></td>
                    <td style="display:none;"><?php echo $pr_id; ?></td>
                    <td><?php echo $b_id; ?></td>
                    <td style="display:none;"><?php echo $med; ?></td>
                    <td style="display:none;"><?php echo $term_name; ?></td>
                    <td><?php echo $price; ?></td>
                    <td><?php echo $dis; ?></td> 
                    <td style="display:none;"><?php echo $descr; ?></td>
                    
                    <td>
                        <div class="row">
                            <div class="col-md-4 mt-1 mb-1">
                         <button type="button" class="ps-btn editpkg" title="Edit"
                         style="background-color:#007bff;"><i class="icon-pencil"></i></button>
                         </div>
                         <div class="col-md-4 mt-1 mb-1 ml-1 mr-2">
                          <button onclick="deletepkg(<?php echo $row['id'];  ?>)" class="ps-btn" title="Delete" style="background-color:#dc3545;"><i class="icon-trash"></i></button>
                        </div>
                        </div>
                          </td>
                          <td>
                          <a class="ps-btn" href="managepackage?packagestringdata=<?php echo $pkg_id; ?>" style="background-color:#ffc107;">Manage</a>
                          </td>

                  </tr>
              <?php
              include("back/modal/viewpkg.php");
            }
            include("back/modal/updatepkg.php");
            
            ?>
              </tbody>
              <tfoot align="center" class="thead">
                <tr>
                    <th style="display:none;">Id</th>
                    <th>Index</th>
                    <th>Packahe Title</th>
                    <th>University</th>
                    <th style="display:none;">Stream </th>                    
                    <th style="display:none;">Program </th>
                    <th>Branch </th>
                    <th style="display:none;">Medium</th>
                    <th style="display:none;">Semester</th>
                    <th>Price</th>
                    <th>Discount</th> 
                    <th style="display:none;">Des</th>
                    <th>Action</th>
                    <th>Manage</th>
                   
                    
                </tr>
              </tfoot>
            </table>
          </div>
       
      