

                    
          <div class="table-responsive">
            <table id="load" class="table table-hover table-bordered zero-configuration" width="100%">
              <thead class="thead-dark" align="center">
                <tr>
                    <th style="display:none;">id</th>
                    <th>Index</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Excercise's PDF</th>
                    <th>Date</th>
                    <th>Manage</th>
                </tr>
              </thead>
              <tbody align="center">
                <?php
              $count = 0;
              $cmd="select * from exercise_data where c_id='$c_id' and subject_id = '$subject_id' and v_id='$v_id' and ch_id='$ch_id'";
              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
              while($row=mysqli_fetch_array($result))
              {
                  $count = $count + 1;
                  $id =$row['id'];
                  $title=$row['title'];
                  $des=$row['des'];
                  $pdf=$row['excercise_file'];
                  $date=$row['date'];
               
              ?>
                <tr id="delete<?php echo $row['id'] ?>" class="showmodal" >
                    
                    <td ><?php echo $id; ?></td>
                    <td style="display:none;"><?php echo $count = $count + 1; ?></td>
                    <td><?php echo $title;?></td>
                    <td><?php echo $des;?></td>
                    <td>
                        <a style="color:red;"href="pdf/<?php echo $pdf;?>" download><b><i class="fa fa-download" aria-hidden="true"></i>Download</b>
                    </a>
                    </td>
                    <td><?php echo $date;  ?></td>
                    <td>
                      <button type="button" class="ps-btn editex" title="Edit" style="background-color:#007bff;"><i class="icon-pencil"></i></button>
                      <button onclick="deleteexe(<?php echo $row['id'];  ?>)" class="ps-btn" title="Delete" style="background-color:#dc3545;"><i class="icon-trash"></i></button>
                    </td>
                  </tr>
              <?php
                include("back/modal/updateex.php");
               }
              ?>
              </tbody>
              <tfoot align="center" class="thead">
                <tr>
                   <th style="display:none;">id</th>
                    <th>Index</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Excercise's PDF</th>
                    <th>Date</th>
                    <th>Manage</th>
                </tr>
              </tfoot>
            </table>
          </div>
       
      