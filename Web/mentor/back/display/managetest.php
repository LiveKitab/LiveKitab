


                    
          <div class="table-responsive">
            <table id="load" class="table table-hover table-bordered zero-configuration">
              <thead class="thead-dark" align="center">
                <tr>
                    <th style="display:none;">Id</th>
                    <th>Index</th>
                    <th>Test Title</th>  
                    <th>No. Of Question</th>
                    <th>Total</th>
                    <th>Positive</th>
                    <th>Negative</th>
                    <th>Action</th> 
                    <th>Add Question</th>
                </tr>
              </thead>
              <tbody align="center">
                <?php
              $count = 0; 
              $cmd="select * from video_test_data where v_id='$v_id' and ch_id='$ch_id'";
              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
              while($row=mysqli_fetch_array($result))
              {     
                  $count = $id + 1;
                  $id=$row['id'];
                  $title=$row['title'];
                  $total=$row['total'];
                  $no_que=$row['no_que'];
                  $pos=$row['pos'];
                  $neg=$row['neg'];
                  $v_id=$row['v_id'];
                  $test_id=$row['test_id'];
                  $test_id=base64_encode($test_id);
                 
              ?>
                <tr id="delete<?php echo $row['id'] ?>" class="showmodal">
                    <td style="display:none;"><?php echo $id; ?></td>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $title; ?></td>
                    <td><?php echo $no_que; ?></td>
                    <td><?php echo $total; ?></td>
                    <td><?php echo $pos; ?></td>
                    <td><?php echo $neg; ?></td>
                    
                    <td>
                         <button type="button" class="ps-btn edittest" title="Edit"
                         style="background-color:#007bff;"><i class="icon-pencil"></i></button>
                      
                          <button onclick="deletetest(<?php echo $row['id'];  ?>)" class="ps-btn" title="Delete" style="background-color:#dc3545;"><i class="icon-trash"></i></button>

                          </td>
                        
                        <td>
                            <a class="ps-btn" target="_blank" href="addquestion?questringdata=<?=$test_id;?>&nofquestion=<?=base64_encode($no_que);?>" style="background-color:#ffc107;"><i class="fa fa-plus"></i></a>
                        </td>

                  </tr>
              <?php
              
            }
            include("back/modal/updatetest.php");
            
            ?>
              </tbody>
              <tfoot align="center" class="thead-dark">
                <tr>
                    <th style="display:none;">Id</th>
                    <th>Index</th>
                    <th>Test Title</th>  
                    <th>No. Of Question</th>
                    <th>Total</th>
                    <th>Positive</th>
                    <th>Negative</th>
                    <th>Action</th> 
                    <th>Add Question</th>
                </tr>
              </tfoot>
            </table>
          </div>
       
      