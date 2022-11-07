<?php
include_once("../db/mconnect.php");
include_once("back/function/session.php");

if(isset($_GET['id']))
{
	$id = mysqli_real_escape_string($con,$_GET['id']);
	$id = base64_decode($id);
	$subject_id = mysqli_real_escape_string($con,$_GET['subject_id']);
	$subject_id = base64_decode($subject_id);
	
	$cmd="select * from exercise_data where id='$id'";
    $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
    while($row=mysqli_fetch_array($result))
    {     
      $title=$row['title'];
      $des=$row['des'];
    }
        
    $cmd3="select * from apply_for_subject where sub_id='$subject_id'";
    $result3=mysqli_query($con,$cmd3) or die(mysqli_error($con));
    while($row=mysqli_fetch_array($result3))
    {
        $subcode=$row['sub_code'];
        $sub_name=$row['sub_name'];
    }
	
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
                    <li>Subject Name : <a href="viewvideo"><?php echo  $sub_name; ?></a>&nbsp;&nbsp;Subject Code : <a href="viewvideo"><?php echo $subcode; ?></a></li>
                    <li>Edit Exercise</li>
                </ul>
            </div>
        </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 " style="margin-bottom:30px;">
                            <div class="ps-product__box">
                                <ul class="ps-tab-list">
                                   <li class="active"><a href="#tab-2">Edit Exercise</a></li>
                                </ul>
                                <div class="ps-tabs">
                                    
                                    <div class="ps-tab active" id="tab-2">
                                        <div class="ps-document">
                                            <form onsubmit="return editexe(this);" id="MyForm" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="id" id="id" value="<?=$id;?>">
                                            
                                                <div class="form-group">
                                                  <label for="header">Exercise Title:<sup style="color:red;">*</sup></label>
                                                  <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Exercise Title" value="<?=$title;?>" required />
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="exercise">Exercise<sup style="color:red;">*</sup></label>
                                                      <textarea class ="form-control" name="exercise" id="exercise" rows="3" placeholder="Exercise Here..."><?=$des;?></textarea>
                                                    <small id="helpId" class="form-text text-muted"></small>
                                                </div>
                                                  
                                                  
                                                <small id="helpId" class="form-text" style="color:red; font-size:10pt;">* Fields are Mandatory</small><br>
                                                
                                                <button type="submit" name="update" id="update" class="ps-btn" style="background-color:#28a745;">Add</button>
                                                <button type="reset"  name="reset" id="reset" class="ps-btn" style="background-color:#dc3545;">Reset</button>
                                                <div class="loader" id="loader">
                                                   <img src="../loader/form.gif" width="140px" alt="">
                                                </div>
                                                 
                                                </form>
											<br>
											<div id="exercise"></div>
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
    <script src="../js/confirm.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
    <script src="ajax/editexercise.js"></script>
    <script src="ajax/toastr/toastr.min.js"></script>
    <script src="../js/imgpreview.js"></script>
    <script src="../plugins/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="../plugins/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="../plugins/jquery-ui-1.7.custom.min.js"></script>
    <script>
      CKEDITOR.replace( 'exercise' );
      CKEDITOR.add
    </script>  
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