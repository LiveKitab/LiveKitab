<?php
include_once("../db/pconnect.php");
include_once("back/function/session.php");
if(isset($_GET['teststringdata']))
	{
	    $v_id = mysqli_real_escape_string($con,$_GET['teststringdata']);
	    $v_id = base64_decode($v_id);
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
    <title>Zocarro | Video Book</title>
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
    <link href="datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="ajax/toastr/toastr.css">
    <link rel="stylesheet" href="../css/confirm.css">
    <link rel="stylesheet" href="../css/imgpreview.css">
    <style>
        .loader
        {
            display:none;
        }
    </style>
    
</head>

<body>
    
    <!-- *************************************
                 Main Header
    ******************************************-->
    <header class="header header--photo" data-sticky="true">
        <?php
        include("design/topnav.php");
        ?>
    </header>
    
    <!-- *************************************
                 Main Header End
    ******************************************-->
    
    <!-- *************************************
                 Mobile Menu
    ******************************************-->
    
    <?php
    include("design/mobilenav.php");
    ?>
    
    <!-- *************************************
                 Mobile Menu End
    ******************************************-->
    
    <!-- *************************************
                 Dash Start
    ******************************************-->
   <main id="homepage-photo">
        
        <div class="ps-page--product ps-page--product-box">
        <div class="container">
            <div class="ps-product--detail ps-product--box">

                <div class="ps-product__content ps-tab-root">
                    <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="dash">Home</a></li>
                    <li><a href="addasign">Assigned Video</a></li>
                    <li>Add Test</li>
                </ul>
            </div>
        </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 " style="margin-bottom:30px;">
                            <div class="ps-product__box">
                                <ul class="ps-tab-list">
                                    <li class="active"><a href="#tab-1">Manage Test</a></li>
                                    <li><a href="#tab-2">Add Test</a></li>
                                    
                                </ul>
                                <div class="ps-tabs">
                                    <div class="ps-tab active" id="tab-1">
                                        <div class="ps-document">
                                            <?php 
                                            include_once('back/display/managetest.php');
                                            ?>  
                                            <div id="return"></div>     
                                        </div>
                                    </div>
                                    
                                    <div class="ps-tab" id="tab-2">
                                        <div class="ps-document">
                                            <form onsubmit="return createtest(this);" id="myform" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="test_v_id" id="test_v_id" value="<?=$v_id;?>">
<div class="form-group">
  <label for="header">Test Title:<sup style="color:red;">*</sup></label>
  <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Test Title" required />
</div>


  
  <div class="row">
      <div class="col-md-6 form-group">
  <label for="header">Number of Question:<sup style="color:red;">*</sup></label>
  <input type="number" class="form-control" name="no_que" id="no_que" aria-describedby="helpId" placeholder="Number of Question" required />
</div>

  <div class="col-md-6 form-group">
  <label for="header">Total Marks:<sup style="color:red;">*</sup></label>
  <input type="number" class="form-control" name="total" id="total" aria-describedby="helpId" placeholder="Total Marks" required />
</div>
</div>

<div class="row">
<div class="col-md-6 form-group">
    <label for="">Positive Marks For Correct:<sup style="color:red;">*</sup></label>
        <input type="number" class="form-control" name="pos" id="pos" placeholder="Positive Marks For Correct">
    </div>
                
<div class="col-md-6 form-group">
                    <label for="">Negative Marks For Incorrect:<sup style="color:red;">*</sup></label>
                      <input type="number" class="form-control" name="neg" id="neg" placeholder="Negative Marks For Incorrect">
</div>
    </div>

<small id="helpId" class="form-text" style="color:red; font-size:10pt;">* Fields are
                        Mandatory</small><br>

<button type="submit" name="submit" id="submit" class="ps-btn" style="background-color:#28a745;">Add</button>
<button type="reset"  name="cancel" id="cancel" class="ps-btn" style="background-color:#dc3545;">Reset</button>
<div class="loader" id="loader">
                                    <img src="../loader/form.gif" width="140px" alt="">
                            </div>

</form>
											<br>
											<div id="test"></div>
                                        </div>
                                    </div>
                                    
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    <!-- *************************************
                 Dash  End
    ******************************************-->    
       
    <!-- *************************************
                 footer  
    ******************************************-->   
    
    <?php
    include("design/footer.php");
    ?>
    
    <!-- *************************************
                 footer  End
    ******************************************-->   
    
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
    <script src="../plugins/lightGallery-master/dist/js/lightgallery-all.min.js"></script>
    <script src="../plugins/sticky-sidebar/dist/sticky-sidebar.min.js"></script>
    <script src="../plugins/select2/dist/js/select2.full.min.js"></script>
    <script src="../plugins/gmap3.min.js"></script>
    <!-- custom scripts-->
    <script src="../js/main.js"></script>
    <script src="ajax/fetchtest.js"></script>
    <script src="ajax/addtest.js"></script>
    <script src="ajax/removetest.js"></script>
    <script src="ajax/updatetest.js"></script>
    <script src="datatable/jquery.dataTables.min.js"></script>
    <script src="datatable/dataTables.bootstrap4.min.js"></script>
    <script src="datatable/datatable-basic.min.js"></script>
    <script src="ajax/toastr/toastr.min.js"></script>
    <script src="../js/confirm.js"></script>
    <script src="../js/imgpreview.js"></script>
    <script>
    $('#load').dataTable( {
  "ordering": false
} );    
    </script>
</body>

</html>
<?php
}
?>