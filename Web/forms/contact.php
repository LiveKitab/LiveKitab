<?php
  $receiving_email_address = 'contact@videobooks.zocarro.com';
    $headers="From: ".$_POST['email'];

        if(mail($receiving_email_address, $_POST['subject'], $_POST['message'], $headers)){
			echo "Sent Successfully! Thank you"." ".$_POST['name'].", We will contact you shortly!";
		}
		else{
			echo "Something went wrong!";
		}
?>
