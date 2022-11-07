<?php 
session_start();
include("../db/mconnect.php");


if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['comment']))
{
    $name  = mysqli_real_escape_string($con,$_POST['name']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $comment = mysqli_real_escape_string($con,$_POST['comment']);
    $today = date("F j, Y, g:i a");
    $cmd="INSERT INTO `comment`(`id`, `name`, `email`, `comment`, `date`) values
        (null,'$name','$email','$comment','$today')";
        $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
        if($result)
        {
        
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                  Comment Successfully! Thank you For Your Valuable Feedback..!! <?php echo $_POST['name']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
        }
        else
        {
            ?>
               <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  Something went wrong!
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            <?php
        }
    }
    
    $con -> close();
   
?>