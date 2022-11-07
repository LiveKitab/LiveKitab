<?php
    include("../../../db/connect.php");

$cmd="select * from super_admin";
$result=mysqli_query($con,$cmd) or die(mysqli_error($con));
while($row=mysqli_fetch_array($result))
{
    $id=$row['id'];
    $sa_name=$row['sa_name'];
    $sa_cno=$row['sa_cno'];
    $sa_email=$row['sa_email'];
    $sa_addr=$row['sa_addr'];
    

}
?>

  
    
 <table id="load" class="table ps-table ps-table--vendor-status">
         <tbody>
            
                    <tr>
                        <td><b> First Name </b></td>
                        <td><b><?php echo $sa_name; ?></b></td>
                    </tr>
                    
                    <tr>
                        <td><b> Contact No </b></td>
                        <td><b><?php echo $sa_cno; ?></b></td>
                    </tr>
                    
                    <tr>
                        <td><b> Email </b></td>
                        <td><b><?php echo $sa_email; ?></b></td>
                    </tr>
                    <tr>
                        <td><b> Address </b></td>
                        <td><b><?php echo $sa_addr; ?></b></td>
                    </tr>
                    
                    
                </tbody>
            </table>

        
        <div class="row">
            <div class="col-md-4 form-group">

                <button type="button" class="ps-btn bg-danger" style="background-color:#007bff;" data-toggle="modal" data-target="#modelId1">Update Profile</button>
            </div>
            
        </div>