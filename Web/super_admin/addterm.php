<?php
include_once("../db/connect.php");
include_once("back/function/session.php");

if(isset($_GET['stringdata']) && isset($_GET['stringdata1']) && isset($_GET['stringdata2']) && isset($_GET['stringdata3']))
	{
	    $str_id = mysqli_real_escape_string($con,$_GET['stringdata']);
	    $str_id = base64_decode($str_id);
	    
	    $pro_id = mysqli_real_escape_string($con,$_GET['stringdata1']);
	    $pro_id = base64_decode($pro_id);
	    
	    $brn_id = mysqli_real_escape_string($con,$_GET['stringdata2']);
	    $brn_id = base64_decode($brn_id);
	    
	    $uni_id = mysqli_real_escape_string($con,$_GET['stringdata3']);
	    $uni_id = base64_decode($uni_id);
	    
	    $bran = "select b_name from branch_data where b_id='$brn_id'";
    	$runbran=mysqli_query($con,$bran) or die(mysqli_error($con));
        while($rowbr=mysqli_fetch_array($runbran))
        {
            $b_name=$rowbr['b_name'];
        }
	    
	    $pro = "select program_name from program_data where pr_id='$pro_id'";
	    $runpro=mysqli_query($con,$pro) or die(mysqli_error($con));
        while($rowpro=mysqli_fetch_array($runpro))
        {
            $program_name=$rowpro['program_name'];
        }  
            
        $strm = "select stream_name from stream_data where stream_id='$str_id'";
    	$runst=mysqli_query($con,$strm) or die(mysqli_error($con));
        while($rowst=mysqli_fetch_array($runst))
        {
            $stream_name=$rowst['stream_name'];
        }
        
        $uni = "select uni_name from university_data where university_id='$uni_id'";
    	$rununi=mysqli_query($con,$uni) or die(mysqli_error($con));
        while($rowuni=mysqli_fetch_array($rununi))
        {
            $uni_name=$rowuni['uni_name'];
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
                    <li><a href="Add_University"><b><?=$b_name;?></b></a></li>
                    <li>Add Medium-Semester</li>
                </ul>
            </div>
        </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 " style="margin-bottom:30px;">
                            <div class="ps-product__box">
                                <ul class="ps-tab-list">
                                    <li class="active"><a href="#tab-1">View Sememster/Year</a></li>
                                    <li><a href="#tab-2">Add Sememster/Year</a></li>
                                </ul>
                                <div class="ps-tabs">
                                    
                                    <div class="ps-tab active" id="tab-1">
                                        <div class="ps-document">
                                            <?php 
                                            include_once('back/display/displayterm.php');
                                            ?>
                                            <div id="return"></div>
                                            </div>
                                    </div>
                                    
                                    
                                    <div class="ps-tab" id="tab-2">
                                        <div class="ps-document">
                                              <form onsubmit="return term(this);" id="myform3" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="stream_id" id="stream_id" value="<?php echo $str_id; ?>">
                            <input type="hidden" name="pr_id" id="pr_id" value="<?php echo $pro_id; ?>">
                            <input type="hidden" name="b_id" id="b_id" value="<?php echo $brn_id; ?>">
                            <input type="hidden" name="uni_id" id="uni_id" value="<?php echo $uni_id; ?>">

<div class="form-group">
  <label for="header">Medium:<sup style="color:red;">*</sup></label>
  <select class="form-control required" name="medium" id="medium" required>
                <option value="" seleted >-- Select Medium --</option>
                <option>	ENGLISH	</option>
                <option>	GUJARATI	</option>
                <option>	HINDI	</option>
                
                </select>
                </div>

<div class="form-group">
  <label for="header">Sememster/Year Name:<sup style="color:red;">*</sup></label>
  <input type="text" class="form-control" name="tname" id="tname" aria-describedby="helpId" placeholder="Sememster Name" required />
</div>


<small id="helpId" class="form-text" style="color:red; font-size:10pt;">-EX&nbsp;:&nbsp;Year/Semester&nbsp;:&nbsp;10th yearly,11th Science A Yearly,sem-1,sem-2,sem-3,sem-4,etc<br/>* Fields are
                        Mandatory</small><br>

<button type="submit" name="t_submit" id="t_submit" class="ps-btn" style="background-color:#28a745;">Add</button>
<button type="reset"  name="reset" id="reset" class="ps-btn" style="background-color:#dc3545;">Reset</button>
<div class="loader" id="loader">
                                    <img src="../loader/form.gif" width="140px" alt="">
                            </div>

</form>
											<br>
											<div id="term"></div>
											
											
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
    <script src="ajax/structure.js"></script>
    <script src="ajax/removeterm.js"></script>
    <script src="ajax/fetchterm.js"></script>
    <script src="ajax/updateterm.js"></script>
    <script src="ajax/toastr/toastr.min.js"></script>
    <script src="../js/imgpreview.js"></script>
    <script src="datatable/jquery.dataTables.min.js"></script>
    <script src="datatable/dataTables.bootstrap4.min.js"></script>
    <script src="datatable/datatable-basic.min.js"></script>
    <script src="../js/confirm.js"></script>
    <script>
    $('#load3').dataTable( {
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