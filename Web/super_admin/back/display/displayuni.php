

                    
          <div class="table-responsive">
            <table id="load" class="table table-hover table-bordered zero-configuration">
              <thead class="thead-dark" align="center">
                <tr>
                    <th style="display:none;">id</th>
                    <th>Index</th>
                    <th>University</th>
                    <th>Manage</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody align="center">
                <?php
              $count = 0; 
              $cmd="select * from university_data order by id asc";
              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
              while($row=mysqli_fetch_array($result))
              {     
                  $id=$row['id'];
                  $u_name=$row['uni_name'];
                  $u_id=$row['university_id'];
                  $u_id = base64_encode($u_id);
                  
                 
              ?>
                <tr id="delete<?php echo $row['id'] ?>">
                    <td style="display:none;"><?php echo $id; ?></td>
                    <td><?php echo $count=$count+1; ?></td>
                    <td><?php echo $u_name; ?></td>
                    <td>
                        <a href="structure?stringdata=<?php echo $u_id; ?>" style="background-color:#20c997;" class="ps-btn"><i class="fa fa-plus"></i> Add Stream</a>
                    </td>
                    <td>
                      <button type="button" class="ps-btn edituni" title="Edit" style="background-color:#007bff;"><i class="icon-pencil"></i></button>
                      <button onclick="deleteuni(<?php echo $row['id'];  ?>)" class="ps-btn" title="Delete" style="background-color:#dc3545;"><i class="icon-trash"></i></button>
                    </td>
                    
                      
                  </tr>
              <?php
              
            }
            include("back/modal/updateuni.php");
            ?>
              </tbody>
              <tfoot align="center" class="thead">
                <tr>
                    <th style="display:none;">id</th>
                    <th>Index</th>
                    <th>University</th>
                    <th>Manage</th>
                    <th>Action</th>
                </tr>
              </tfoot>
            </table>
          </div>
       
      