

                    
          <div class="table-responsive">
            <table id="load" class="table table-hover table-bordered zero-configuration">
              <thead class="thead-dark" align="center">
                <tr>
                  <th>Index</th>
                    <th>Plan Name</th>                    
                    <th>Price</th>
                    <th>Date</th>
                    <th>Title</th>
                    <th>Paln Description</th>
                    <th>Description</th> 
                    
                </tr>
              </thead>
              <tbody align="center">
                <?php
              $id = 0; 
              $cmd="select * from plan_details";
              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
              while($row=mysqli_fetch_array($result))
              {     
                  $id = $id + 1;
                  $plan_name=$row['plan_name'];
                  $plan_price=$row['plan_price'];
                  $plan_cre_date=$row['plan_cre_date'];
                  $plan_title=$row['plan_title'];
                  $plan_des=$row['plan_des'];
                  $plan_tc=$row['plan_tc'];
                 
              ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $plan_name; ?></td>
                    <td><?php echo $plan_price; ?></td>
                    <td><?php echo $plan_cre_date; ?></td>
                    <td><?php echo $plan_title; ?></td>
                    <td><?php echo $plan_des; ?></td>
                    <td><?php echo $plan_tc; ?></td>         
                  </tr>
              <?php
            }
            ?>
              </tbody>
              <tfoot align="center" class="thead">
                <tr>
                   <th>Index</th>
                    <th>Plan Name</th>                    
                    <th>Price</th>
                    <th>Date</th>
                    <th>Title</th>
                    <th>Paln Description</th>
                    <th>Description</th> 
                </tr>
              </tfoot>
            </table>
          </div>
       
      