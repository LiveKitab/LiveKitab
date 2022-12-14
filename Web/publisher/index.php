
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Zocarro | Video Book</title>
    <link rel ="icon" href="../img/icons/favicon.png" type = "image/x-icon">
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
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/home-photo.css">
    <link rel="stylesheet" href="ajax/toastr/toastr.css">
	<style type="text/css">
        .loader
        {
            display:none;
        }
        
    <?php
    include("design/css/btn.php");
    ?>

    </style>
</head>

<body>
<main id="homepage-photo">
    <div class="ps-my-account">
        <div class="container">
            <form id="myform" method="post" class="ps-form--account ps-tab-root">
                <ul class="ps-tab-list">
                    <li class="active"><a href="#sign-in">Login</a></li>
                </ul>
                <div class="ps-tabs">
                    <div class="ps-tab active" id="sign-in">
                        <div class="ps-form__content">
                            <h5>Log In Your Account</h5>
                            <div class="form-group">
                                <input class="form-control" type="text" name="e_email" id="e_email"
                                    placeholder="Email Address">
                            </div>
                            <div class="form-group form-forgot">
                                <input class="form-control" type="password" name="e_pwd" id="e_pwd"
                                    placeholder="Password"><a style="color:black;"><span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span></a>
                            </div>

                            <div class="form-group submtit">
                                <button type="submit" class="ps-btn ps-btn--fullwidth" name="signin" id="signin">Login</button>
                            </div>
                             <div class="loader" id="loader">
                                    <center><img src="../loader/account.gif" alt=""></center>
                            </div>
                            <div id="return"></div>

                        </div>
                        <div class="ps-form__footer">

                        </div>
                    </div>                     
            </form>
        </div>
    </div>
    </div>

    <footer class="ps-footer ps-footer--2">
        <div class="container">


        <div class="ps-footer__copyright">
            <p>?? 2019 Zocarro. All Rights Reserved</p>
                <!-- <a href="#"><img src="img/payment-method/1.png" alt=""></a>
                <a href="#"><img src="img/payment-method/2.jpeg" alt=""></a>
                <a href="#"><img src="img/payment-method/3.png" alt=""></a> -->
                <!-- <a href="#"><img src="img/payment-method/4.jpg" alt=""></a>
                    <a href="#"><img src="img/payment-method/5.jpg" alt=""></a> -->
            </p>
        </div>
    </div>
    </footer>
    <div id="back2top"><i class="pe-7s-angle-up"></i></div>
    <div class="ps-site-overlay"></div>
    <div id="loader-wrapper">
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <div class="ps-search" id="site-search">
        <a class="ps-btn--close" href="#"></a>
        <div class="ps-search__content">
            <form class="ps-form--primary-search" action="do_action" method="post">
                <input class="form-control" type="text" placeholder="Search for...">
                <button><i class="aroma-magnifying-glass"></i></button>
            </form>
        </div>
    </div>
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
    <!-- Custom scripts-->
    <script src="../js/main.js"></script>
    <script src="ajax/login.js"></script>
    <script src="ajax/toastr/toastr.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxflHHc5FlDVI-J71pO7hM1QJNW1dRp4U&amp;region=GB"></script></body></script>
    <script type="text/javascript">
       $(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
 var x = document.getElementById("e_pwd");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
});
    </script>
</body>

</html>