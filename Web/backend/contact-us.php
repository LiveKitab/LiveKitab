<?php
    if(isset($_POST['username']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['message']))
    {
        $username = $_POST['username'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        
        $msg = '
            <p><strong>Name : </strong>'.$username.'</p>
            <p><strong>Email : </strong>'.$email.'</p>
            <p><strong>Phone : </strong>'.$phone.'</p>
            <p><strong>Message : </strong>'.$message.'</p>
        ';

        $receiving_email_address = 'support@livekitab.com';

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "From: LiveKitab <".$email.">";

        $headers1  = 'MIME-Version: 1.0' . "\r\n";
        $headers1 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers1 .= "From: LiveKitab <".$receiving_email_address.">";

        $msg1 = '
            <p><strong>Name : </strong>'.$username.'</p>
            <p><strong>Email : </strong>'.$email.'</p>
            <p><strong>Phone : </strong>'.$phone.'</p>
            <p><strong>Message : </strong>'.$message.'</p>
        ';

        if(mail($email,'GET IN TOUCH',$msg, $headers1)){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Request has been Sent Successfully<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
            <?php

            mail($receiving_email_address,'Get in Touch',$msg1, $headers);
        }
        else{
            // echo 'Something Wents Wrong Check Your Email And Please Try again...';
            ?>
            <div class="alert alert-error alert-dismissible fade show" role="alert"><strong>Something Wents Wrong Check Your Email And Please Try again...<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
            <?php
        }
    }
    else{
        ?>
            <div class="alert alert-error alert-dismissible fade show" role="alert"><strong>Something Wents Wrong Check Your Email And Please Try again...<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
            <?php
    }
?>