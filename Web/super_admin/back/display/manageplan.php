

                    
          <div class="table-responsive">
            <table id="load" class="table table-hover table-bordered zero-configuration">
              <thead class="thead-dark" align="center">
                <tr>
                    <th style="display:none;">id</th>
                    <th>Index</th>
                    <th>Plan Name</th>                    
                    <th>Price</th>
                    <th>Date</th>
                    <th>Title</th>
                    <th style="display:none;">des</th>
                    <th style="display:none;">tc_des</th>
                    <th>Action</th>
                    
                     
                </tr>
              </thead>
              <tbody align="center">
                <?php
            $index = 0; 
              $cmd="select * from plan_details order by id asc";
              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
              while($row=mysqli_fetch_array($result))
              {     
                  $index = $row['id'];
                  $plan_name=$row['plan_name'];
                  $plan_price=$row['plan_price'];
                  $plan_cre_date=$row['plan_cre_date'];
                  $plan_title=$row['plan_title'];
                  $plan_des=$row['plan_des'];
                  $plan_tc=$row['plan_tc'];
                  $status=$row['status'];
                 
              ?>
                <tr id="delete<?php echo $row['id'] ?>">
                    <td style="display:none;"><?php echo $index; ?></td>
                    <td><?php echo $count=$count+1; ?></td>
                    <td><?php echo $plan_name; ?></td>
                    <td><?php echo $plan_price; ?></td>
                    <td><?php echo $plan_cre_date; ?></td>
                    <td><?php echo $plan_title; ?></td>
                    <td style="display:none;"><?php echo $plan_des; ?></td>
                    <td style="display:none;"><?php echo $plan_tc; ?></td> 
                    
                    <?php
                          if($status === '0')
                          {
                              ?>
                              <td><button onclick="blockplan(<?php echo $row['id'];  ?>)" class="ps-btn" class="zocarro-btn" title="Publish" style="background-color:#28a745"><i class="fa fa-calendar-check-o" aria-hidden="true"></i></button>
                              <?php
                          }
                          elseif($status === '1')
                          {
                              ?>
                              <td><button onclick="unblockplan(<?php echo $row['id'];  ?>)"  class="ps-btn" title="Unpublish" class="zocarro-btn" style="background-color:#ffc107"><i class="fa fa-calendar-times-o" aria-hidden="true"></i></button>
                              <?php
                          }
                          ?>
                       
                         <button type="button" title="Edit" class="ps-btn editplan"
                         style="background-color:#007bff;"><i class="icon-pencil"></i></button>
                      
                      
                      
                          <button onclick="deleteplan(<?php echo $row['id'];  ?>)" class="ps-btn" title="Delete" style="background-color:#dc3545;"><i class="icon-trash"></i></button>
                          </td>
                          </td>
                      
                  </tr>
              <?php
              
            }
            include("back/modal/updateplan.php");
            ?>
              </tbody>
              <tfoot align="center" class="thead">
                <tr>
                    <th style="display:none;">id</th>
                    <th>Index</th>
                    <th>Plan Name</th>                    
                    <th>Price</th>
                    <th>Date</th>
                    <th>Title</th>
                    <th style="display:none;">des</th>
                    <th style="display:none;">tc_des</th>
                    <th>Action</th>
                    
                </tr>
              </tfoot>
            </table>
          </div>
       
      