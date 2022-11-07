

                    
          <div class="table-responsive">
            <table id="load" class="table table-hover table-bordered zero-configuration">
              <thead class="thead-dark" align="center">
                <tr>
                    <th style="display:none;">id</th>
                    <th>Index</th>
                    <th>Party Name</th>                    
                    <th>Party Contact</th>
                    <th>Party Email</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Start Date</th> 
                    <th>End Date</th> 
                    <th style="display:none;">addr</th>
                    <th style="display:none;">des</th>
                    <th>Action</th>
                    
                     
                </tr>
              </thead>
              <tbody align="center">
                <?php
            $index = 0; 
              $cmd="select * from banners order by id asc";
              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
              while($row=mysqli_fetch_array($result))
              {     
                  $index=$row['id'];
                  $party_name=$row['party_name'];
                  $party_contact=$row['party_contact'];
                  $party_email=$row['party_email'];
                  $price=$row['price'];
                  $descount=$row['descount'];
                  $s_date=$row['s_date'];
                  $e_date=$row['e_date'];
                  $banner_img=$row['banner_img'];
                  $party_addr=$row['party_addr'];
                  $banner_des=$row['banner_des'];
                  $status=$row['status'];
                 
              ?>
                <tr id="delete<?php echo $row['id'] ?>">
                    <td style="display:none;"><?php echo $index; ?></td>
                    <td><?php echo $count=$count+1; ?></td>
                    <td><?php echo $party_name; ?></td>
                    <td><?php echo $party_contact; ?></td>
                    <td><?php echo $party_email; ?></td>
                    <td><?php echo $price; ?></td>
                    <td><?php echo $descount; ?></td>
                    <td><?php echo $s_date; ?></td>
                    <td><?php echo $e_date; ?></td>
                    <td style="display:none;"><?php echo $party_addr; ?></td>
                    <td style="display:none;"><?php echo $banner_des; ?></td> 
                    
                    <?php
                          if($status === '0')
                          {
                              ?>
                              <td><button onclick="pbanner(<?php echo $row['id'];  ?>)" class="ps-btn" class="zocarro-btn" title="Publish" style="background-color:#28a745"><i class="fa fa-calendar-check-o" aria-hidden="true"></i></button>
                              <?php
                          }
                          elseif($status === '1')
                          {
                              ?>
                              <td><button onclick="unpbanner(<?php echo $row['id'];  ?>)"  class="ps-btn" title="Unpublish" class="zocarro-btn" style="background-color:#ffc107"><i class="fa fa-calendar-times-o" aria-hidden="true"></i></button>
                              <?php
                          }
                          ?>
                       
                         <button type="button" title="Edit" class="ps-btn editbanner"
                         style="background-color:#007bff;"><i class="icon-pencil"></i></button>
                      
                      
                      
                          <button onclick="deletebanner(<?php echo $row['id'];  ?>)" class="ps-btn" title="Delete" style="background-color:#dc3545;"><i class="icon-trash"></i></button>
                          <button class="ps-btn" style="background-color:#ffc107;" data-toggle="modal" data-target="#abc<?php echo $row['id'] ?>"><i class="fa fa-eye" aria-hidden="true"></i></button>
                          </td>
                          </td>
                      
                  </tr>
              <?php
              include("back/modal/viewbanner.php");
            }
            include("back/modal/updatebanner.php");
            ?>
              </tbody>
              <tfoot align="center" class="thead">
                <tr>
                    <th style="display:none;">id</th>
                    <th>Index</th>
                    <th>Party Name</th>                    
                    <th>Party Contact</th>
                    <th>Party Email</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Start Date</th> 
                    <th>End Date</th> 
                    <th style="display:none;">addr</th>
                    <th style="display:none;">des</th>
                    <th>Action</th>
                    
                </tr>
              </tfoot>
            </table>
          </div>
       
      