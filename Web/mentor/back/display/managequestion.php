

                    
          <div class="table-responsive">
            <table id="load" class="table table-hover table-bordered zero-configuration" width="100%">
              <thead class="thead-dark" align="center">
                <tr>
                    <th style="display:none;">id</th>
                    <th>Index</th>
                    <th>Question</th>
                    <th>Option A</th>
                    <th>Option B</th>
                    <th>Option C</th>
                    <th>Option D</th>
                    <th>Solution</th>
                    <th>Correct Answer</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
              </thead>
              <tbody align="center">
                <?php
              $count = 0;
              $cmd="select * from video_question_data where test_id='$test_id'";
              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
              while($row=mysqli_fetch_array($result))
              {
                  $count = $count + 1;
                  $id =$row['id'];
                  $qid =$row['que_id'];
                  $question=$row['question'];
                  $a=$row['a'];
                  $b=$row['b'];
                  $c=$row['c'];
                  $d=$row['d'];
                  $sol=$row['sol'];
                  $correct=$row['correct'];
                  $qid=base64_encode($qid);
              ?>
                <tr>
                    
                    <td ><?php echo $id; ?></td>
                    <td style="display:none;"><?php echo $count = $count + 1; ?></td>
                    <td><?php echo $question;?></td>
                    <td><?php echo $a;?></td>
                    <td><?php echo $b;?></td>
                    <td><?php echo $c;?></td>
                    <td><?php echo $d;?></td>
                    <td><?php echo $sol;?></td>
                    <td><?php echo Option.' '.$correct;?></td>
                    <td>
                       <form target="_blank" action="editquestion" method="get">
                            <input type="hidden" name="queid" id="queid" value="<?=$qid;?>">
                        <button type="submit" class="ps-btn" name="edit" id="edit" style="background-color:#28a745;"><i class="icon-pencil" style="font-weight:bold;"></i></button>
                        </form>
                    </td>
                        <td>
                      <button onclick="deletequestion(<?php echo $row['id'];  ?>)" class="ps-btn" style="background-color:#dc3545;"><i class="icon-trash" style="font-weight:bold;"></i></button> 
                    </td>
                  </tr>
              <?php
                
               }
              ?>
              </tbody>
              <tfoot align="center" class="thead">
                <tr>
                    <th style="display:none;">id</th>
                    <th>Index</th>
                    <th>Question</th>
                    <th>Option A</th>
                    <th>Option B</th>
                    <th>Option C</th>
                    <th>Option D</th>
                    <th>Solution</th>
                    <th>Correct AnsWer</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
              </tfoot>
            </table>
          </div>
       
      