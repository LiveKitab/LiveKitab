<?php
include("../../../db/mconnect.php");

	    if(isset($_POST['que_id']) && isset($_POST['qs']) && isset($_POST['a']) && isset($_POST['b']) && isset($_POST['c']) && isset($_POST['d']) && isset($_POST['ans']))
	    {
            $q = mysqli_real_escape_string($con,$_POST['qs']);
            $q1 = mysqli_real_escape_string($con,$_POST['a']);
            $q2 = mysqli_real_escape_string($con,$_POST['b']);
            $q3 = mysqli_real_escape_string($con,$_POST['c']);
            $q4 = mysqli_real_escape_string($con,$_POST['d']);
            $qans = mysqli_real_escape_string($con,$_POST['ans']);
            $que_id = mysqli_real_escape_string($con,$_POST['que_id']);
            $sol = mysqli_real_escape_string($con,$_POST['sol']);
            
            $sel = "update video_question_data set question='$q', a='$q1', b='$q2', c='$q3', d='$q4', correct='$qans', sol='$sol' where que_id='$que_id'";
            $sql=mysqli_query($con,$sel) or die(mysqli_error($con));
            if($sql) 
            {                   
                echo'<script>
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                  }
                    toastr["success"]("Question Updated...","Success")
                </script>';            
            }
            else
            {
                echo'<script>
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                  }
                    toastr["error"]("Failed...","Error")
                </script>';           
            }
                
        }
        else
        {
           header('location:../../../404.php');   
        }
      
        $con -> close();
?>