<?php

        $receiving_email_address = 'support@livekitab.com';
        $headers="From: ".$_POST['newsemail'];
        if(mail($receiving_email_address,'Newsletter','I am Intrested In Your Product..!!!', $headers)){
			?>
			    <div class="alert alert-success alert-dismissible fade show" role="alert">
                  Subscribe Successfully! Thank you <?php echo $_POST['newsemail']; ?>, We will notify you shortly!
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
			<?php
		}
		else{
			?>
			    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  Something went wrong!
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
			<?php
		}
?>
