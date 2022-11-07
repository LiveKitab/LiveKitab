<div class="ps-document">
                                                 <?php 
                                                 $cmd="select * from apply_for_subject where c_id='$c_id' and sub_id='$subject_id'";
                                                 $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
                                                 while($row=mysqli_fetch_array($result))
                                                 {
                                                       $nsubs=0;
                                                       $title=$row['title'];
                                                       $no_of_video=$row['no_of_video'];
                                                       $no_of_test=$row['no_of_test'];
                                                       $sub_id=$row['sub_id'];
                                                       $remarks=$row['remarks'];
                                                       $c_id=$row['c_id'];
                                                       $des=$row['des'];
                                                       $sub_duration=$row['sub_duration'];
                                                       $price=$row['price'];
                                                       $discount=$row['discount'];
                                                       
                                                   
                                                   $sel1="select * from subject_data where sub_id='$subject_id'";
                                                  $run1=mysqli_query($con,$sel1) or die(mysqli_error($con));
                                                  while($rows1=mysqli_fetch_array($run1))
                                                  {
                                                      $sub_name=$rows1['sub_name'];
                                                      $university_id=$rows1['university_id'];
                                                      $stream_id=$rows1['stream_id'];
                                                      $pr_id=$rows1['pr_id'];
                                                      $b_id=$rows1['b_id'];
                                                      $term_id=$rows1['term_id'];
                                                  }
                                                  
                                                  $sel="select * from term_data where term_id='$term_id'";
                                                  $run=mysqli_query($con,$sel) or die(mysqli_error($con));
                                                  while($rows=mysqli_fetch_array($run))
                                                  {
                                                      $t_name=$rows['term_name'];
                                                      $med=$rows['med'];
                                                  }
                                                  
                                                  $cmd1="select * from stream_data where stream_id='$stream_id' LIMIT 1";
                                                  $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
                                                  while($row1=mysqli_fetch_array($result1))
                                                  {
                                                    $stream_name=$row1['stream_name'];
                                                  }
                                                  
                                                  
                                                    $cmd2="select * from program_data where pr_id='$pr_id' LIMIT 1";
                                                    $result2=mysqli_query($con,$cmd2) or die(mysqli_error($con));
                                                    while($row2=mysqli_fetch_array($result2))
                                                    {
                                                        $program_name=$row2['program_name'];
                                                    }
                                                    
                                                    $cmd2="select * from branch_data where b_id='$b_id' LIMIT 1";
                                                    $result2=mysqli_query($con,$cmd2) or die(mysqli_error($con));
                                                    while($row2=mysqli_fetch_array($result2))
                                                    {
                                                        $branch_name=$row2['b_name'];
                                                    }
                                                    
                                                    $cmd21="select uni_name from university_data where university_id='$university_id' LIMIT 1";
                                                    $result21=mysqli_query($con,$cmd21) or die(mysqli_error($con));
                                                    while($row21=mysqli_fetch_array($result21))
                                                    {
                                                        $uni_name=$row21['uni_name'];
                                                    }
                                                    
                                                    // $cmd2="select purchased_courses.id from purchased_courses,course_data where purchased_courses.course_id=course_data.course_id and course_data.c_id='$c_id' and course_data.course_id='$course_id'";
                                                    //   $result2=mysqli_query($con,$cmd2) or die(mysqli_error($con));
                                                    //   while($row2=mysqli_fetch_array($result2))
                                                    //   {
                                                    //     $nsubs=$nsubs+1;    
                                                    //   }
                                                    
                                                 }
                                            ?>  
                                            <div class="row">
                                              <div class="col-sm-12">
                                                <div class="card">
                                                  <div class="card-body">
                                                      <div class="table-responsive">
                                                      <table class="ps-table ps-table--vendor-status" style="width:100%;">
                                                          <tr>
                                                              <td>University</td>
                                                              <td><?php echo $uni_name; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td>Stream</td>
                                                              <td><?php echo $stream_name; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td>Program</td>
                                                              <td><?php echo $program_name; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td>Branch</td>
                                                              <td><?php echo $branch_name; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td>Medium</td>
                                                              <td><?php echo $med; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td>Semester</td>
                                                              <td><?php echo $t_name; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td>Subject</td>
                                                              <td><?php echo $sub_name; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td>Description</td>
                                                              <td><p class="text-justify"><?php echo $des; ?></p></td>
                                                          </tr>
                                                          <tr>
                                                              <td>Number of Video</td>
                                                              <td><?php echo $no_of_video; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td>Number of Test</td>
                                                              <td><?php echo $no_of_test; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td>Subject Duration</td>
                                                              <td><?php echo $sub_duration.' Hours'; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td>Number of Subscriber</td>
                                                              <td><?php echo $nsubs; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td>Price</td>
                                                              <td><?php echo $price. ' Rs/-'; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td>Discount</td>
                                                              <td><?php echo $discount. '%'; ?></td>
                                                          </tr>
                                                      </table>
                                                      </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </div>                                            