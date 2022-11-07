<?php
    include("../../../db/mconnect.php");
    if(isset($_POST['update']))
    {
        foreach($_POST['positions'] as $positions){
            $index = $positions[0];
            $newPosition = $positions[1];
            
            echo $index;
            echo $newPosition;
            
            $cmd = "update final_video set sequence = '$newPosition' where id = '$index'";
            $run = mysqli_query($con,$cmd);
            if($run)
            {
                echo 'Updated';
            }
            else
            {
                echo 'Fail To Update';
            }
        }   
    }
?>