<?php
    session_start();
    include("../../../db/mconnect.php");
   
    if(isset($_POST['u_id']) && isset($_POST['u_regid']))
    {
        
        $timestamp = date('Y-m-d H:i:s');

        $u_id = mysqli_real_escape_string($con,$_POST['u_id']);
        $u_regid = mysqli_real_escape_string($con,$_POST['u_regid']);       
        $action = mysqli_real_escape_string($con,$_POST['action']);
        $title = mysqli_real_escape_string($con,$_POST['title']);
        $msg = mysqli_real_escape_string($con,$_POST['msg']);

            require_once '../../../../App/inc/firebase/firebase.php';
	        require_once '../../../../App/inc/firebase/push.php';
            
	        /*echo '<br>'.$s_regid.'<br>';
            echo '<br>'.$seller_id.'<br>';*/
	       
            $senderregids = array();    
            $firebase = new Firebase();
            $push = new Push();
            $payload = array();
            $payload['title'] = $title;
            $payload['message'] = $msg;
            $payload['action'] = $action;
           
            $push->setIsBackground(TRUE);
            $push->setPayload($payload);
            $json = '';
            $response = '';
            $json = $push->getPush();
            $response = $firebase->send($u_regid,$json);
            // echo $response;

        ?>
                <script>
            toastr.options = {
                "closeButton": false,
          "debug": true,
          "newestOnTop": false,
          "progressBar": false,
          "positionClass": "toast-bottom-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "1500",
          "extendedTimeOut": "1500",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "show",
          "hideMethod": "hide"
            }
                toastr["success"]("Notification Successfully Send...!","Notification")
            </script>            
            <?php
            
        }
        else
        {
        ?>
                <script>
            toastr.options = {
                "closeButton": false,
          "debug": true,
          "newestOnTop": false,
          "progressBar": false,
          "positionClass": "toast-bottom-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "1500",
          "extendedTimeOut": "1500",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "show",
          "hideMethod": "hide"
            }
                toastr["error"]("Something Went Wrong...!","Failed")
            </script>
            <?php
    }
?>