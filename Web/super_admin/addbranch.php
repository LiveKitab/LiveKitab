<?php
include_once("../db/connect.php");
include_once("back/function/session.php");

if(isset($_GET['stringdata']) && isset($_GET['stringdata1']) && isset($_GET['stringdata2']))
	{
	    $stream_id = mysqli_real_escape_string($con,$_GET['stringdata']);
	    $stream_id = base64_decode($stream_id);
	    
	    $pr_id = mysqli_real_escape_string($con,$_GET['stringdata1']);
	    $pr_id = base64_decode($pr_id);
	    
	    $uni_id = mysqli_real_escape_string($con,$_GET['stringdata2']);
	    $uni_id = base64_decode($uni_id);
	    
	    $strm = "select program_name from program_data where pr_id='$pr_id'";
	    $result=mysqli_query($con,$strm) or die(mysqli_error($con));
        while($row=mysqli_fetch_array($result))
        {
            $program_name=$row['program_name'];
        }
            
        $strm = "select stream_name from stream_data where stream_id='$stream_id'";
    	$result=mysqli_query($con,$strm) or die(mysqli_error($con));
        while($row=mysqli_fetch_array($result))
        {
            $stream_name=$row['stream_name'];
        }
        
        $uni = "select uni_name from university_data where university_id='$uni_id'";
    	$result=mysqli_query($con,$uni) or die(mysqli_error($con));
        while($row=mysqli_fetch_array($result))
        {
            $uni_name=$row['uni_name'];
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
    <link rel="stylesheet" href="ajax/toastr/toastr.css">
    <link rel="stylesheet" href="../css/imgpreview.css">
    <link rel="stylesheet" href="../css/confirm.css">
    <link href="datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        .loader1{
            display:none;
        }
        .loader{
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
                    <li><a href="Add_University"><b><?=$uni_name;?></b></a></li>
                    <li><a href="Add_University"><b><?=$stream_name;?></b></a></li>
                    <li><a href="Add_University"><b><?=$program_name;?></b></a></li>
                    <li>Add Branch</li>
                </ul>
            </div>
        </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 " style="margin-bottom:30px;">
                            <div class="ps-product__box">
                                <ul class="ps-tab-list">
                                    <li class="active"><a href="#tab-1">View Branch</a></li>
                                    <li><a href="#tab-2">Add Branch</a></li>
                                </ul>
                                <div class="ps-tabs">
                                    
                                    <div class="ps-tab active" id="tab-1">
                                        <div class="ps-document">
                                            <?php 
                                            include_once('back/display/displaybranch.php');
                                            ?>
                                            <div id="return"></div>
                                            </div>
                                    </div>
                                    
                                    
                                    <div class="ps-tab" id="tab-2">
                                        <div class="ps-document">
                                              <form onsubmit="return branch(this);" id="myform2" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="uni_id" id="uni_id" value="<?php echo $uni_id; ?>">
                                                <input type="hidden" name="stream_id" id="stream_id" value="<?php echo $stream_id; ?>">
                                                <input type="hidden" name="pr_id" id="pr_id" value="<?php echo $pr_id; ?>">
<div class="form-group">
  <label for="header">Branch Name:<sup style="color:red;">*</sup></label>
  <input type="text" class="form-control" name="bname" id="bname" aria-describedby="helpId" placeholder="Branch Name" required />
</div>

<label for="">Image:<sup style="color:red;">*</sup></label>        
  <div class="col-sm-2 imgUp">
    <div class="imagePreview"></div>

				<input type="file" class="uploadFile img" style="height:45px; border:none;" name="b_img" id="b_img" required>
				
  </div>



<small id="helpId" class="form-text" style="color:red; font-size:10pt;">-EX&nbsp;:&nbsp;Standard Name&nbsp;:&nbsp;Computer Engineer,Information Technology,etc<br/>* Fields are
                        Mandatory</small><br>

<button type="submit" name="b_submit" id="b_submit" class="ps-btn" style="background-color:#28a745;">Add</button>
<button type="reset"  name="reset" id="reset" class="ps-btn" style="background-color:#dc3545;">Reset</button>
<div class="loader" id="loader">
                                    <img src="../loader/form.gif" width="140px" alt="">
                            </div>

</form>
											<br>
											<div id="branch"></div>
											
											
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
    <script src="ajax/managebranch.js"></script>
    <script src="ajax/removebranch.js"></script>
    <script src="ajax/fetchbranch.js"></script>
    <script src="ajax/updatebranch.js"></script>
    <script src="ajax/structure.js"></script>
    <script src="ajax/toastr/toastr.min.js"></script>
    <script src="../js/imgpreview.js"></script>
    <script src="datatable/jquery.dataTables.min.js"></script>
    <script src="datatable/dataTables.bootstrap4.min.js"></script>
    <script src="datatable/datatable-basic.min.js"></script>
    <script src="../js/confirm.js"></script>
    <script>
    $('#load2').dataTable( {
  "ordering": false
} );    
</body>

</html>
<?php
}
else
{
    echo 'Data Not Post';
}
?>