<!--<div class="row">-->
<!--<div class="col-md-12 form-group">-->
<!--                            <center><button type="button" style="font-size:15px;color:white;margin-left:80%;" class="btn btn-success" data-toggle="modal"-->
<!--                                    data-target="#exampleModalCenter">Upload-->
<!--                                    Excel</button></center>-->
<!--                        </div>-->
<!--     </div>               -->
          <div class="table-responsive">
            <table id="load4" class="table table-hover table-bordered zero-configuration">
              <thead class="thead-dark" align="center">
                <tr>
                    <th style="display:none;">id</th>
                    <th>Index</th>
                    <th>Subject Code</th>
                    <th>Subject Name</th>
                    <th>Image</th>
                    <th>Manage</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody align="center">
                <?php
              $count = 0; 
              $cmd="select * from subject_data where stream_id='$str_id' and pr_id='$pro_id' and b_id='$brn_id' and university_id='$uni_id' and term_id='$tem_id' order by id DESC";
              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
              while($row=mysqli_fetch_array($result))
              {     
                  $index=$row['id'];
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
                  $sub_id=$row['sub_id'];
                  $sub_id = base64_encode($sub_id);
                  $sub_code=$row['sub_code'];
                  $sub_name=$row['sub_name'];
                  $sub_bg=$row['sub_bg'];
                  $status=$row['status'];
              ?>
                <tr id="delete<?php echo $row['id'] ?>">
                    <td style="display:none;"><?php echo $index; ?></td>
                    <td><?php echo $count=$count+1; ?></td>
                    <td><?php echo $sub_code; ?></td>
                    <td><?php echo $sub_name; ?></td>
                    <td><img src="../src/subject/<?php echo $sub_bg; ?>" height="60px" alt=""></td>
                     <td>
                        <a href="addchapter?stringdata=<?=$university_id;?>&stringdata1=<?=$stream_id;?>&stringdata2=<?=$pr_id;?>&stringdata3=<?=$b_id;?>&stringdata4=<?=$term_id;?>&stringdata5=<?=$sub_id;?>" style="background-color:#20c997;" class="ps-btn"><i class="fa fa-plus"></i> Add Chapter</a>
                    </td>
                    <td>
                        <button type="button" class="ps-btn editsub" title="Edit" style="background-color:#007bff;"><i class="icon-pencil"></i></button>
                        <button onclick="deletesub(<?php echo $row['id'];  ?>)" class="ps-btn" title="Delete" style="background-color:#dc3545;"><i class="icon-trash"></i></button>
                    </td>
                  </tr>
              <?php
              
            }
            include("back/modal/updatesub.php");
            ?>
              </tbody>
              <tfoot align="center" class="thead">
                <tr>
                    <th style="display:none;">id</th>
                    <th>Index</th>
                    <th>Subject Code</th>
                    <th>Subject Name</th>
                    <th>Image</th>
                    <th>Manage</th>
                    <th>Action</th>
                </tr>
              </tfoot>
            </table>
          </div>
            <!--   <div class="modal fade" id="exampleModalCenter">-->
            <!--    <div class="modal-dialog modal-dialog-centered" role="document">-->
            <!--        <div class="modal-content">-->
            <!--            <div class="modal-header">-->
            <!--                <h4>Upload Excel</h4>-->
            <!--                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>-->
            <!--            </div>-->
            <!--            <div class="modal-body">-->
            <!--                <form onsubmit="return uploadexcel(this);" id="myform1" method="post"-->
            <!--                    enctype="multipart/form-data">-->

            <!--                    <input type="file" name="file" id="file" accept="csv/*" style="height:40px;" required />-->
            <!--                    <button type="submit" class="btn btn-warning" style="font-size:15px;color:white;" name="upload" id="upload" value="upload"-->
            <!--                        required>Upload</button>-->
            <!--                    <center>-->
                                    <!--<div class="loading" id="loading">-->
                                    <!--    <img src="../loader/form.gif" width="140px" alt="">-->
                                    <!--</div>-->
            <!--                    </center>-->

            <!--                </form>-->
            <!--            </div>-->
            <!--            <div class="modal-footer">-->
            <!--                <button type="reset" name="reset" id="reset" value="reset" class="btn btn-danger"-->
            <!--                    style="font-size:15px;color:white;" data-dismiss="modal">Close</button>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
      