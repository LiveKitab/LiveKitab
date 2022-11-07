<?php
    include("../../../db/pconnect.php");

$cmd="select * from editor_data where e_id='$e_id'";
$result=mysqli_query($con,$cmd) or die(mysqli_error($con));
while($row=mysqli_fetch_array($result))
{
                  $id=$row['id'];
                  $e_name=$row['e_name'];
                  $e_cno=$row['e_cno'];
                  $e_email=$row['e_email'];
                  $e_addr=$row['e_addr'];
                  $e_state=$row['e_state'];
                  $e_city=$row['e_city'];
                  $e_id=$row['e_id'];
                 
}
?>

  
    
 <table id="load" class="table ps-table ps-table--vendor-status">
         <tbody>
            <tr>
                        <td> Publisher ID </td>
                        <td><?php echo $e_id; ?></td>
                    </tr>
                    <tr>
                        <td> Name </td>
                        <td><?php echo $e_name; ?></td>
                    </tr>
                    
                    
                    
                    <tr>
                        <td> Contact No </td>
                        <td><?php echo $e_cno; ?></td>
                    </tr>
                    
                    <tr>
                        <td> Email </td>
                        <td><?php echo $e_email; ?></td>
                    </tr>
                    <tr>
                        <td> Address </td>
                        <td><?php echo $e_addr; ?></td>
                    </tr>
                    
                    <tr>
                        <td> State </td>
                        <td><?php echo $e_state; ?></td>
                    </tr>
                    
                    <tr>
                        <td> City </td>
                        <td><?php echo $e_city; ?></td>
                    </tr>
                    
                    
                    
                    
                </tbody>
            </table>

        
        <div class="row">
            <div class="col-md-4 form-group">

                <button type="button" class="ps-btn" style="background-color:#007bff;" data-toggle="modal" data-target="#modelId1">Update Profile</button>
            </div>
            
        </div>