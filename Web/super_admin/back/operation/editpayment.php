<?php
  include("../../../db/connect.php");
 
       if(isset($_POST['id']) && isset($_POST['transaction_id']) && isset($_POST['order_id']))
      {
            $id = mysqli_real_escape_string($con,$_POST['id']);
            $id = htmlspecialchars($id);
            $transaction_id = mysqli_real_escape_string($con,$_POST['transaction_id']);
            $transaction_id = htmlspecialchars($transaction_id);
            $bill_id = mysqli_real_escape_string($con,$_POST['bill_id']);
            $bill_id = htmlspecialchars($bill_id);
            $order_id = mysqli_real_escape_string($con,$_POST['order_id']);
            $order_id = htmlspecialchars($order_id);
            $payment_mode = mysqli_real_escape_string($con,$_POST['payment_mode']);
            $payment_mode = htmlspecialchars($payment_mode);
            $amount= mysqli_real_escape_string($con,$_POST['amount']);
            $amount = htmlspecialchars($amount);
            $todaysdate=date("Y-m-d H:i:s"); ;
            
            $sel = "update mentor_transaction set amount='$amount',transaction_time='$todaysdate',status='TXN_SUCCESS' where order_id='$order_id'";
            $sql=mysqli_query($con,$sel) or die(mysqli_error($con));
            if($sql) 
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
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                  }
                    toastr["success"]("Payment Details Updated Successfully...!","Success")
                </script>
                <?php
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
                    toastr["error"]("Something Went Wrong...!","Failed")
                </script>';           
            }
                
        }
        else
        {
           header('location:../../../404.php');   
        }
      
      

?>