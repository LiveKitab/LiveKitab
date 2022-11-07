<?php
    include("../../../db/mconnect.php");

$cmd="select * from creator_data where c_id='$c_id'";
$result=mysqli_query($con,$cmd) or die(mysqli_error($con));
while($row=mysqli_fetch_array($result))
{
                  $id=$row['id'];
                  $c_name=$row['c_name'];
                  $c_fname=$row['c_fname'];
                  $c_lname=$row['c_lname'];
                  $c_cno=$row['c_cno'];
                  $c_email=$row['c_email'];
                  $c_addr=$row['c_addr'];
                  $c_state=$row['c_state'];
                  $c_status=$row['c_status'];
                  $c_block=$row['c_block'];
                  $c_city=$row['c_city'];
                  $c_edu=$row['c_edu'];
                  $c_spec=$row['c_spec'];
                  $c_id=$row['c_id'];
                  $acc_holder_name=$row['acc_holder_name'];
                  $acc_type=$row['acc_type'];
                  $acc_no=$row['acc_no'];
                  $ifsc=$row['ifsc'];
                  $mid=$row['mid'];
                  $m_key=$row['m_key'];
}
?>

  
    
 <table id="load" class="table ps-table ps-table--vendor-status">
     <thead>
         
     </thead>
         <tbody>
                    <tr>
                        <td><b> Mentor ID </b></td>
                        <td><b><?php echo $c_id; ?></b></td>
                    </tr>
                    <tr>
                        <td> First Name </td>
                        <td><?php echo $c_name; ?></td>
                    </tr>
                    
                    <tr>
                        <td> Father Name </td>
                        <td><?php echo $c_fname; ?></td>
                    </tr>
                    
                    <tr>
                        <td> Last Name </td>
                        <td><?php echo $c_lname; ?></td>
                    </tr>
                    
                    <tr>
                        <td><b> Contact No </b></td>
                        <td><b><?php echo $c_cno; ?></b></td>
                    </tr>
                    
                    <tr>
                        <td><b> Email </b></td>
                        <td><b><?php echo $c_email; ?></b></td>
                    </tr>
                    <tr>
                        <td> Address </td>
                        <td><?php echo $c_addr; ?></td>
                    </tr>
                    
                    <tr>
                        <td> State </td>
                        <td><?php echo $c_state; ?></td>
                    </tr>
                    
                    <tr>
                        <td> City </td>
                        <td><?php echo $c_city; ?></td>
                    </tr>
                    
                    <tr>
                        <td><b> Education </b></td>
                        <td><b><?php echo $c_edu; ?></b></td>
                    </tr>
                    
                    <tr>
                        <td><b> Specialization </b></td>
                        <td><b><?php echo $c_spec; ?></b></td>
                    </tr>
                    
                    <tr>
                        <td><b> Account Holder Name </b></td>
                        <td><b><?php echo $acc_holder_name; ?></b></td>
                    </tr>
                    
                    <tr>
                        <td> Account Type </td>
                        <td><?php echo $acc_type; ?></td>
                    </tr>
                    
                    <tr>
                        <td><b> Account No. </b></td>
                        <td><b><?php echo $acc_no; ?></b></td>
                    </tr>
                    
                    <tr>
                        <td> IFSC No. </td>
                        <td><?php echo $ifsc; ?></td>
                    </tr>
                    
                    <tr>
                        <td> Merchant ID </td>
                        <td><?php echo $mid; ?></td>
                    </tr>
                    
                    <tr>
                        <td> Merchant Key </td>
                        <td><?php echo $m_key; ?></td>
                    </tr>
                    
                    
                </tbody>
            </table>

        
        <div class="row">
            <div class="col-md-4 form-group">

                <button type="button" class="ps-btn" style="background-color:#007bff;" data-toggle="modal" data-target="#modelId1">Update Profile</button>
            </div>
            
        </div>