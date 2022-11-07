<?php

use PHPMailer\PHPMailer\PHPMailer;

  function sendOTP($m_pass1,$otp){
        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();

        //SMTP Settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "contact.zocarro@gmail.com";
        $mail->Password = 'zocarroadmin@123';
        $mail->Port = 465; //587
        $mail->SMTPSecure = "ssl"; //tls

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom('contact.zocarro@gmail.com','ZoCarro');
        $mail->addAddress($m_pass1);
        $mail->Subject = 'OTP';
        $mail->Body = '<div style="margin:2%2%2%2%; border-style: dashed; border-color: orangered;background-color: whitesmoke;">
                                <h1 style="font-family:Georgia; text-align: center; color:#03a9f4"><u>ZoCarro</u></h1>
                                <div style="margin:4%4%4%4%">
                                    <p style="color: orangered;">Your Mentor Registration Request One Time Password (OTP) is ,</p>
                                    <p style="color: orangered;font-size: 18pt;">'.$otp.'</p>
                                </div>
                        </div>';
          $result = $mail->send();		
          return $result;
      }


?>
