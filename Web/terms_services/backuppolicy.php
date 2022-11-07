<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Zocarro | Live Kitab</title>
    <link href="../img/icons/favicon.png" rel="icon">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700&amp;amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../fonts/Linearicons/Linearicons/Font/demo-files/demo.css">
    <link rel="stylesheet" href="../plugins/bootstrap4/css/bootstrap.min.css">
    <link rel="stylesheet" href="../plugins/owl-carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="../plugins/slick/slick/slick.css">
    <link rel="stylesheet" href="../plugins/lightGallery-master/dist/css/lightgallery.min.css">
    <link rel="stylesheet" href="../plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css">
    <link rel="stylesheet" href="../plugins/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="../plugins/select2/dist/css/select2.min.css">
    
    <style>
    <?php
    include("zocarro/school/design/css/btn.php");
    ?>
</style>
    
</head>

<body>


<!-- Dashboard Data Here -->



<div class="ps-vendor-banner bg--cover" data-background="zocarro/img/bg/icon.png">
            <div class="container">
                <h2>Backup Policy</h2>
            </div>
        </div>
        <div class="ps-section--vendor ps-vendor-about">
            <div class="container">
                <h3><u>Backup Policy:</u></h3>
                <p class="text-justify" style="font-size:14pt;">
                    We undertake periodic backups of data on servers, email infrastructure but the final responsibility for all backups of your valuable data on your packages rests with you. We strongly recommend that you take periodic backups and store them at your end so that you have multiple options in case of necessity for a restore. You may request us for a backup of the last 7 days (from the date of request) and in most cases we will be able to provision this from our disaster recovery backups. However, this is not a part of our core hosting services and is merely a last resort. We will try our best to help you out but backups provisioning and restoration is an extremely time and resource intensive process and hence we can only promise a best effort service in this regard. We strongly recommended that you make use of reliable and cheap offsite back UPS. On your backup request, We will share a list of IPs to be whitelisted in your firewall at all times to enable us to create the backup archive. If there is a rule in iptables (server firewall) to block all connections or allow connections only from specific IP which does not include the ones shared in response to your ticket, we retain the right to reboot the server in single user mode, stop the iptables service and then access the server in order to check the abuse complaint reported without prior notice, if need be.

                </p>
                </div>
        </div>
                </p>                
                
       
        <div class="ps-vendor-banner bg--cover" data-background="zocarro/img/bg/icon.png">
            <div class="container">
                <h3><u>Note :</u></h3>
                <p class="text-justify" style="font-size:14pt;" style="color:red;">
                 Zocarro requires a fee of ₹ 1500 + 18% Service Tax to provide backup in excel format of data.

            </div>
        </div>
 

<!-- Dashboard End -->



    <!--include shared/cart-sidebar-->
    <!-- Plugins-->
    <script src="../plugins/jquery-1.12.4.min.js"></script>
    <script src="../plugins/popper.min.js"></script>
    <script src="../plugins/owl-carousel/owl.carousel.min.js"></script>
    <script src="../plugins/bootstrap4/js/bootstrap.min.js"></script>
    <script src="../plugins/imagesloaded.pkgd.min.js"></script>
    <script src="../plugins/masonry.pkgd.min.js"></script>
    <script src="../plugins/isotope.pkgd.min.js"></script>
    <script src="../plugins/jquery.matchHeight-min.js"></script>
    <script src="../plugins/slick/slick/slick.min.js"></script>
    <script src="../plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
    <script src="../plugins/slick-animation.min.js"></script>
    <script src="../plugins/lightGallery-master/dist/js/lightgallery-all.min.js"></script>
    <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="../plugins/sticky-sidebar/dist/sticky-sidebar.min.js"></script>
    <script src="../plugins/jquery.slimscroll.min.js"></script>
    <script src="../plugins/select2/dist/js/select2.full.min.js"></script>
    <script src="../plugins/gmap3.min.js"></script>
    <!-- custom scripts-->
    <script src="../js/main.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxflHHc5FlDVI-J71pO7hM1QJNW1dRp4U&amp;region=GB"></script>
	<script src="../school/ajax/themes.js"></script>
	<script src="../plugins/jquery-1.12.4.min.js"></script>
        <script>
            $(document).ready(function(){
               $(document).bind("contextmenu",function(e){
                  return false;
               });
            });
            document.onkeydown = function(e) {
            if(event.keyCode == 123) {
            return false;
            }
            if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
            return false;
            }
            if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
            return false;
            }
            if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
            return false;
            }
            }
        </script>

</body>


</html>