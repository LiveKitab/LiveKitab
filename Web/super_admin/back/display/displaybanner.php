

                    
          <div class="table-responsive">
            <table id="load" class="table table-hover table-bordered zero-configuration">
              <thead class="thead-dark" align="center">
                <tr>
                  <th>Index</th>
                    <th>Party Name</th>                    
                    <th>Party Contact</th>
                    <th>Party Email</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Start Date</th> 
                    <th>End Date</th> 
                    <th>Download</th> 
                    <th>View</th> 
                </tr>
              </thead>
              <tbody align="center">
                <?php
              $id = 0; 
              $cmd="select * from banners";
              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
              while($row=mysqli_fetch_array($result))
              {     
                  $id = $id + 1;
                  $party_name=$row['party_name'];
                  $party_contact=$row['party_contact'];
                  $party_email=$row['party_email'];
                  $price=$row['price'];
                  $party_addr=$row['party_addr'];
                  $descount=$row['descount'];
                  $s_date=$row['s_date'];
                  $e_date=$row['e_date'];
                  $banner_img=$row['banner_img'];
                  $banner_des=$row['banner_des'];
              ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $party_name; ?></td>
                    <td><?php echo $party_contact; ?></td>
                    <td><?php echo $party_email; ?></td>
                    <td><?php echo $price; ?></td>
                    <td><?php echo $descount; ?></td>
                    <td><?php echo $s_date; ?></td>
                    <td><?php echo $e_date; ?></td> 
                    <td><a class="ps-btn" href="../src/banner/<?php echo $banner_img;?>" role="button" title="Download Booklet" style="background-color:#fb7c00; color:white;" download><i class="fa fa-download" aria-hidden="true"></i></a></td>
                    <td>
                          <button class="ps-btn" style="background-color:#ffc107;" data-toggle="modal" data-target="#abc<?php echo $row['id'] ?>"><i class="fa fa-eye" aria-hidden="true"></i></button>
                          </td>
                  </tr>
              <?php
               include("back/modal/viewbanner.php");
            }
            ?>
              </tbody>
              <tfoot align="center" class="thead">
                <tr>
                   <th>Index</th>
                    <th>Party Name</th>                    
                    <th>Party Contact</th>
                    <th>Party Email</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Start Date</th> 
                    <th>End Date</th> 
                    <th>Download</th> 
                    <th>View</th> 
                </tr>
              </tfoot>
            </table>
          </div>
       
      