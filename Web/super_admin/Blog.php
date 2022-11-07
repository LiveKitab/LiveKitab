<?php
    session_start();
    $s_admin_cont = base64_decode($_SESSION['s_admin_cont']);
    $s_admin_name = base64_decode($_SESSION['s_admin_name']);
    include_once("../db/mconnect.php");
?>
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
    <title><?php include"title.php"; ?></title>
    <link rel ="icon" href="../img/icons/favicon.png" type = "image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700&amp;amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../fonts/Linearicons/Linearicons/Font/demo-files/demo.css">
    <link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../plugins/owl-carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="../plugins/owl-carousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="../plugins/slick/slick/slick.css">
    <link rel="stylesheet" href="../plugins/nouislider/nouislider.min.css">
    <link rel="stylesheet" href="../plugins/lightGallery-master/dist/css/lightgallery.min.css">
    <link rel="stylesheet" href="../plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css">
    <link rel="stylesheet" href="../plugins/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/home-photo.css">
    <link rel="stylesheet" href="ajax/toastr/toastr.css">
    <link rel="stylesheet" href="../css/imgpreview.css">
    <link rel="stylesheet" href="../css/confirm.css">
    <link href="datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        .loader{
            display:none;
        }
        .loader1{
            display:none;
        }
    </style>
    </style>
</head>

<body>

<!-- Main Header -->

    <header class="header header--photo" data-sticky="true">
	<?php
	include_once("design/topnav.php");

	?>

    </header>
	
	<!-- Main Header End -->
	
	
	<!-- Mobile Header Start -->
    
	<?php 
	include("design/mobilenav.php");
	?>
	
	<!-- Mobile Header End -->

    <div class="ps-page--single">
    <div class="ps-breadcrumb">
      <div class="container">
        <ul class="breadcrumb">
          <li><a href="dash">Dashboard</a></li>
          <li>Notification</li>
        </ul>
      </div>
    </div>

  </div>
  
    
	
	<!-- Dashboard Data Here -->

    <div class="container">
<div class="ps-shop-categories">
      <div class="row align-content-lg-stretch" id="searchoutput"></div>
</div>
</div>


<div class="ps-page--product ps-page--product-box">
      <div class="container">
        <div class="ps-product--detail ps-product--box">

          <div class="ps-product__content ps-tab-root">
            <div class="row">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                <div class="ps-product__box">
                  <ul class="ps-tab-list">
                    <li class="active"><a href="#tab-1">Add Blog</a></li>
                    <!--<li class=""><a href="#tab-2">Manage Notification</a></li>-->
                  </ul>
                  <div class="ps-tabs">
           
                    <div class="ps-tab active" id="tab-1">
                      <div class="ps-document">
                            
               <form onsubmit="return addblog(this);" id="myform" method="post">
            
                        
                          
                          <div class="form-group">
                              <label for="">Blogger's Name</label>
                              <input type="text" class="form-control" name="name" id="name" placeholder="Blogger's Name">
                          </div>
                          
                          <div class="form-group">
                              <label for="">Title</label>
                              <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                          </div>
                          
                          <div class="form-group">
                    <label for=""> Description:<sup style="color:red;">*</sup></label>
                      <textarea class="form-control" name="description" id="description" placeholder=" Description" rows="3"></textarea>
                </div>
                          
                          <div class="form-group">
                              <label for="">Image</label>
                              <input type="file" class="form-control" name="img" id="img">
                          </div>
                          <hr>

                       <button type="submit" class="ps-btn" name="submit" id="submit" style="background-color:#28a745;">Submit </button>
                       <button type="reset" class="ps-btn" id="reset" name="reset" style="background-color:#dc3545;">Close</button>
                      <div class="loader" id="loader">
                            <img src="../loader/form.gif" width="140px" alt="">
                        </div>
                       
                   </form>

                   <div id="data"></div>

                </div>
                    </div>
          

                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>


	
	<!-- Dashboard End -->
	
	        
	
	<!-- Footer Start -->
	<?php
	include_once("design/footer.php");
	?>
	<!-- Footer End -->
	
	
  <!--include shared/cart-sidebar-->
    <!-- Plugins-->
    <script src="../plugins/jquery.min.js"></script>
    <script src="../plugins/nouislider/nouislider.min.js"></script>
    <script src="../plugins/popper.min.js"></script>
    <script src="../plugins/owl-carousel/owl.carousel.min.js"></script>
    <script src="../plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/imagesloaded.pkgd.min.js"></script>
    <script src="../plugins/masonry.pkgd.min.js"></script>
    <script src="../plugins/isotope.pkgd.min.js"></script>
    <script src="../plugins/jquery.matchHeight-min.js"></script>
    <script src="../plugins/slick/slick/slick.min.js"></script>
    <script src="../plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
    <script src="../plugins/slick-animation.min.js"></script>
     <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="../plugins/lightGallery-master/dist/js/lightgallery-all.min.js"></script>
    <script src="../plugins/sticky-sidebar/dist/sticky-sidebar.min.js"></script>
     <script src="../plugins/jquery.slimscroll.min.js"></script>
    <script src="../plugins/select2/dist/js/select2.full.min.js"></script>
    <script src="../plugins/gmap3.min.js"></script>
    <!-- custom scripts-->
    <script src="../js/main.js"></script>
    <script src="ajax/toastr/toastr.min.js"></script>
    <script src="ajax/add/addblog.js"></script>
     <script src="datatable/jquery.dataTables.min.js"></script>
    <script src="datatable/dataTables.bootstrap4.min.js"></script>
    <script src="datatable/datatable-basic.min.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
	<script>
	CKEDITOR.replace( 'description' );
	</script>
    <!--<script>-->
    <!--    $('#load').dataTable( {-->
    <!--      "ordering": false-->
    <!--    } );    -->
    <!--</script>-->
    
   
    <script>
   

</body>
</html>