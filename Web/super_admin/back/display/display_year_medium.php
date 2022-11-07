

                    
          <div class="table-responsive">
            <table id="load3" class="table table-hover table-bordered zero-configuration">
              <thead class="thead-dark" align="center">
                <tr>
                    <th style="display:none;">id</th>
                    <th>Index</th>
                    <th>Medium </th>
                    <th>Semester Name</th>
                    <th>Manage</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody align="center">
                <?php
              $count = 0; 
              $cmd="select * from term_data where stream_id='$str_id' and pr_id='$pro_id' and b_id='$brn_id' and university_id='$uni_id' order by id asc";
              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
              while($row=mysqli_fetch_array($result))
              {     
                  $index=$row['id'];
                  $term_name=$row['term_name'];
                  $med=$row['med'];
                  $status=$row['status'];
                  
                  $university_id=$row['university_id'];
                  $university_id = base64_encode($university_id);
                  $stream_id=$row['stream_id'];
                  $stream_id = base64_encode($stream_id);
                  $pr_id=$row['pr_id'];
                  $pr_id = base64_encode($pr_id);
                  $b_id=$row['b_id'];
                  $b_id = base64_encode($b_id);
                  $term_id=$row['term_id'];
                  $term_id = base64_encode($term_id);
              ?>
                <tr id="delete<?php echo $row['id'] ?>">
                    <td style="display:none;"><?php echo $index; ?></td>
                    <td><?php echo $count=$count+1; ?></td>
                    <td><?php echo $med; ?></td>
                    <td><?php echo $term_name; ?></td>
                    <td>
                        <a href="add_year_subject?stringdata=<?=$university_id;?>" style="background-color:#20c997;" class="ps-btn"><i class="fa fa-plus"></i> Add Subject</a>
                    </td>
                    <td>
                        <button type="button" class="ps-btn editterm" title="Edit" style="background-color:#007bff;"><i class="icon-pencil"></i></button>
                        <button onclick="deleteterm(<?php echo $row['id'];  ?>)" class="ps-btn" title="Delete" style="background-color:#dc3545;"><i class="icon-trash"></i></button>
                    </td>
                  </tr>
              <?php
              
            }
            include("back/modal/updateterm.php");
            ?>
              </tbody>
              <tfoot align="center" class="thead">
                <tr>
                    <th style="display:none;">id</th>
                    <th>Index</th>
                    <th>Medium </th>
                    <th>Semester Name</th>
                    <th>Manage</th>
                    <th>Action</th>
                </tr>
              </tfoot>
            </table>
          </div>
       
      