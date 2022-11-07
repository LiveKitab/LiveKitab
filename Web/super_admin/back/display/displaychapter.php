          <div class="table-responsive">
            <table id="load5" class="table table-hover table-bordered zero-configuration">
              <thead class="thead-dark" align="center">
                <tr>
                    <th style="display:none;">id</th>
                    <th>Index</th>
                    <th>Chapter No.</th>
                    <th>Chapter Name</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody align="center">
                <?php
              $count = 0; 
              $cmd="select * from chapter_data where stream_id='$str_id' and pr_id='$pro_id' and b_id='$brn_id' and university_id='$uni_id' and term_id='$tem_id' and sub_id='$sub_id' order by id ASC";
              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
              while($row=mysqli_fetch_array($result))
              {     
                  $index=$row['id'];
                  $ch_id=$row['ch_id'];
                  $ch_no=$row['ch_no'];
                  $ch_name=$row['ch_name'];
                  $status=$row['status'];
              ?>
                <tr id="delete<?php echo $row['id'] ?>">
                    <td style="display:none;"><?php echo $index; ?></td>
                    <td><?php echo $count=$count+1; ?></td>
                    <td><?php echo $ch_no; ?></td>
                    <td><?php echo $ch_name; ?></td>
                    <td>
                        <button type="button" class="ps-btn editchapter" title="Edit" style="background-color:#007bff;"><i class="icon-pencil"></i></button>
                        <button onclick="deletechapter(<?php echo $row['id'];  ?>)" class="ps-btn" title="Delete" style="background-color:#dc3545;"><i class="icon-trash"></i></button>
                    </td>
                  </tr>
              <?php
              
            }
            include("back/modal/updatechapter.php");
            ?>
              </tbody>
              <tfoot align="center" class="thead">
                <tr>
                   <th style="display:none;">id</th>
                    <th>Index</th>
                    <th>Chapter No.</th>
                    <th>Chapter Name</th>
                    <th>Action</th>
                </tr>
              </tfoot>
            </table>
          </div>
            