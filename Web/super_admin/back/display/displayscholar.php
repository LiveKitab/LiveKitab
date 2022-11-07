

                    
          <div class="table-responsive">
            <table id="load" class="table table-hover table-bordered zero-configuration" width="100%">
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
                    <th style="display:none;">State</th> 
                    <th style="display:none;">City</th>
                    <th style="display:none;">University</th>                    
                    <th style="display:none;">Stream</th>
                    <th style="display:none;">Program</th>
                    <th style="display:none;">Branch</th>
                    <th style="display:none;">Medium</th>
                    <th style="display:none;">Semester</th>
                    <th>Action</th> 
                    <th style="display:none;">Joindate</th> 
                    
                </tr>
              </thead>
              <tbody align="center">
                <?php
              $count1 = 0; 
              $cmd="select * from user_data ORDER BY id asc";
              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
              while($row=mysqli_fetch_array($result))
              {     
                  $count1 = $count1 + 1;
                  $id=$row['id'];
                  $uniid=$row['university'];
                  $username=$row['username'];
                  $u_fname=$row['u_fname'];
                  $u_lname=$row['u_lname'];
                  $u_cno=$row['u_cno'];
                  $u_email=$row['u_email'];
                  $u_state=$row['u_state'];
                  $u_city=$row['u_city'];
                  $u_addr=$row['u_addr'];
                  $u_joindate=$row['u_joindate'];
                  $stream=$row['stream'];
                  $program=$row['program'];
                  $department=$row['department'];
                  $term_id=$row['term_id'];
                  
                  $cmd1="select * from stream_data where stream_id = '$stream'";
              $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
              while($row1=mysqli_fetch_array($result1))
              {
                  $stream_name=$row1['stream_name'];
                  $uni=$row1['uni'];
              }
                  
                  $cmd2="select * from program_data where pr_id = '$program'";
              $result2=mysqli_query($con,$cmd2) or die(mysqli_error($con));
              while($row2=mysqli_fetch_array($result2))
              {
                  $pr_id=$row2['program_name'];
              }
                  
                  $cmd3="select * from branch_data where b_id = '$department'";
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
                  
              $cmd5="select * from university_data where university_id = '$uniid'";
              $result5=mysqli_query($con,$cmd5) or die(mysqli_error($con));
              while($row5=mysqli_fetch_array($result5))
              {
                  $university_name=$row5['uni_name'];
             }   
              ?>
                <tr id="delete<?php echo $row['id'] ?>" class="showmodal">
                    <td style="display:none;"><?php echo $id; ?></td>
                    <td><?php echo $count1; ?></td>
                    <td><?php echo $username; ?></td>
                    <td><?php echo $u_fname; ?></td>
                    <td><?php echo $u_lname; ?></td>
                    <td><?php echo $u_cno; ?></td>
                    <td><?php echo $u_email; ?></td>
                    <td style="display:none;"><?php echo $u_addr; ?></td>
                    <td style="display:none;"><?php echo $u_state; ?></td> 
                    <td style="display:none;"><?php echo $u_city; ?></td>
                    <td style="display:none;"><?php echo $university_name; ?></td>
                    <td style="display:none;"><?php echo $stream_name; ?></td>
                    <td style="display:none;"><?php echo $pr_id; ?></td>
                    <td style="display:none;"><?php echo $b_id; ?></td>
                    <td style="display:none;"><?php echo $med; ?></td>
                    <td style="display:none;"><?php echo $term_name; ?></td>
                    <td>
                        
                         <button type="button" class="ps-btn editscholar" title="Edit"
                         style="background-color:#007bff;"><i class="icon-pencil"></i></button>
                      
                          <button onclick="deletescholar(<?php echo $row['id'];  ?>)" class="ps-btn" title="Delete" style="background-color:#dc3545;"><i class="icon-trash"></i></button>
                        
                          <button class="ps-btn" style="background-color:#ffc107;" data-toggle="modal" data-target="#abc<?php echo $row['id'] ?>"><i class="fa fa-eye" aria-hidden="true"></i></button>
                        </td>
                        <td style="display:none;"><?php echo $u_joindate; ?></td>
                        
                            
                        
                  </tr>
              <?php
              include("back/modal/viewscholar.php");
            }
            include("back/modal/updatescholar.php");
            //include("back/modal/displayscholar.php");
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
                    <th style="display:none;">State</th> 
                    <th style="display:none;">City</th>
                    <th style="display:none;">University</th>                    
                    <th style="display:none;">Stream</th>
                    <th style="display:none;">Program</th>
                    <th style="display:none;">Branch</th>
                    <th style="display:none;">Medium</th>
                    <th style="display:none;">Semester</th>
                    <th>Action</th> 
                    
                    <th style="display:none;">Joindate</th> 
                </tr>
              </tfoot>
            </table>
          </div>
       
      