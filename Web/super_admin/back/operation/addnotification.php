<?php 
session_start();
include("../../../db/mconnect.php");


if(isset($_POST['sms']) && isset($_POST['title']) && isset($_POST['des']))
{
    $sms  = mysqli_real_escape_string($con,$_POST['sms']);
    $title = mysqli_real_escape_string($con,$_POST['title']);
    $des = mysqli_real_escape_string($con,$_POST['des']);
    $timestamp = date('Y-m-d');

    
      $cmd="select * from notice ORDER BY id DESC LIMIT 1";
        $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
        if(mysqli_fetch_row($result)<1)
        {
                    $id = 0;
        }
    
        else
        {
            $cmd1="select * from notice ORDER BY id DESC LIMIT 1";
            $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
            while($row=mysqli_fetch_array($result1))
            {
                $id=$row['id'];
            }
        }
        $id = $id + 1;
        $prefix = 'NOTI';
        $nt_id = $prefix.$id;
        
        
        $cmd="INSERT INTO `notice`(`id`, `nt_id`, `cat`, `title`, `des`, `date`, `status`) values
        (null,'$nt_id','$sms','$title','$des','$timestamp','1')";
        $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
        if($result)
        {
            
            
         require_once 'firebase/firebase.php';
	     require_once 'firebase/push.php';
          
          $sendstustatus = 0;
            $senderregids = array();
            
            $firebase = new Firebase();
            $push = new Push();
            $payload = array();
            $payload['title'] = $title;
            $payload['message'] = $des;
            $payload['action'] = $nt_id;
            $push->setIsBackground(TRUE);
            $push->setPayload($payload);
            $json = '';
            $response = '';
            $json = $push->getPush();
            
            // if($sms == 'Student')
            // {
            //     $sql = mysqli_query($con, "SELECT u_regid FROM user_data where u_regid!='NOT SET' ORDER BY u_regid ASC LIMIT 2000");
            //     if(mysqli_num_rows($sql)>0)
            //     {
            //         $sendstustatus = 1;
            //         while($row = mysqli_fetch_array($sql)) 
            //         {
            //             $regid = $row['u_regid'];
            //             $senderregids[] = $regid;
            //         }
            //     }
            // }
            
            if($sms == 'All')
            {
                $sql = mysqli_query($con, "SELECT u_regid FROM user_data where u_regid!='NOT SET' ORDER BY u_regid ASC LIMIT 2000");
                if(mysqli_num_rows($sql)>0)
                {
                    $sendstustatus = 1;
                    while($row = mysqli_fetch_array($sql)) 
                    {
                        $regid = $row['u_regid'];
                        $senderregids[] = $regid;
                    }
                }
            
            }
            
            ?>
                <script>
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
                "timeOut": "1500",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
                toastr["success"]("Add Notification Successfully...!","Notification Added")
            </script>
            <?php
        }
        else
        {
            ?>
                <script>
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
                "timeOut": "1500",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
                toastr["error"]("Something Went Wrong...!","Failed")
            </script>
            <?php
        }
    }
    
    $con -> close();
    if($sendstustatus == '1')
    {
        foreach ($senderregids as $keyname) {
            $response = $firebase->send($keyname,$json);
        }
    }
    
?>