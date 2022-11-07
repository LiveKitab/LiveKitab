<?php
include_once("../db/mconnect.php");
include_once("back/function/session.php");
if(isset($_GET['questringdata']))
	{
	    $test_id = mysqli_real_escape_string($con,$_GET['questringdata']);
	    $test_id = base64_decode($test_id);
	    
	    $no_que = mysqli_real_escape_string($con,$_GET['nofquestion']);
	    $no_que = base64_decode($no_que);
	    
	    
	    $cmd="select * from video_test_data where test_id='$test_id'";
        $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
        while($row=mysqli_fetch_array($result))
        {     
            $title=$row['title'];
            $total=$row['total'];
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
    <link rel="stylesheet" href="../css/tabs.css" type="text/css" media="screen, projection"/>
    <link href="datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/latest.js?config=TeX-MML-AM_CHTML' async></script>

    <style>
        .loader
        {
            display:none;
        }
          pre {
white-space: normal !important;
}
.ui-tabs .ui-tabs-nav{
    z-index:10 !important;
}
.ui-tabs .ui-tabs-nav li.ui-tabs-selected
{
    padding-bottom: 0px !important;
}
.ui-tabs .ui-tabs-nav li 
{
    margin: 0px 1px 1px 1px !important;
    min-width: 40px;
    text-align: center;
}
.ui-tabs .ui-tabs-nav li.ui-tabs-selected {
    border: 1px solid coral;   
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
                    <li>Test Name: <a href="viewvideo"><?=$title;?></a>&nbsp;&nbsp;Total Marks: <a href="viewvideo"><?=$total;?></a></li>
                    <li>Add Question</li>
                </ul>
            </div>
        </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 " style="margin-bottom:30px;">
                            <div class="ps-product__box">
                                <ul class="ps-tab-list">
                                    <li class="active"><a href="#tab-1">View Paper</a></li>
                                    <li><a href="#tab-2">Add Question</a></li>
                                    
                                </ul>
                                <div class="ps-tabs">
                                    <div class="ps-tab active" id="tab-1">
                                        <div class="ps-document">
                                            <?php 
                                            include_once('back/display/managequestion.php');
                                            ?>  
                                            <div id="return"></div>     
                                        </div>
                                    </div>
                                    
                                    <div class="ps-tab" id="tab-2">
                                        <div class="ps-document">
                                            <form onsubmit="return AddQuestion(this);" method="post" id="MyForm">

      <input type="hidden" name="testid" id="testid" value="<?=$test_id;?>">
      <input type="hidden" name="no_que" id="no_que" value="<?=$no_que;?>">
      
      <div class="form-group">
        <label for="qs">Question<sup style="color:red;">*</sup></label>
          <textarea class="form-control" name="qs" id="qs" rows="3" placeholder="Describe Here..."></textarea>
        <small id="helpId" class="form-text text-muted"></small>
      </div>

<div class="row">
      <div class="col-md-6 form-group">
        <label for="a">Option A<sup style="color:red;">*</sup></label>
        <input type="text" class="form-control" name="a" id="a" placeholder="Enter Option A" aria-describedby="helpId" required />
        <small id="helpId" class="form-text text-muted"></small>
      </div>

      <div class="col-md-6 form-group">
        <label for="a">Option B<sup style="color:red;">*</sup></label>
        <input type="text" class="form-control" name="b" id="b" placeholder="Enter Option B" aria-describedby="helpId" required />
        <small id="helpId" class="form-text text-muted"></small>
      </div>
      
      </div>
      
      
      <div class="row">
      <div class="col-md-6 form-group">
        <label for="a">Option C<sup style="color:red;">*</sup></label>
        <input type="text" class="form-control" name="c" id="c" placeholder="Enter Option C" aria-describedby="helpId" required />
        <small id="helpId" class="form-text text-muted"></small>
      </div>

      <div class="col-md-6 form-group">
        <label for="a">Option D<sup style="color:red;">*</sup></label>
        <input type="text" class="form-control" name="d" id="d" placeholder="Enter Option D" aria-describedby="helpId" required />
        <small id="helpId" class="form-text text-muted"></small>
      </div>
      
      </div>
      
      
      <div class="form-group">
        <label for="ans">Correct Answer<sup style="color:red;">*</sup></label>
        <select class="form-control browser-default custom-select" name="answer" id="answer" required>
            <option value="">--Select--</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
        </select>
        <small id="helpId" class="form-text text-muted"></small>
      </div>

      <div class="form-group">
        <label for="sol">Solution Of Question<sup style="color:red;">*</sup></label>
          <textarea class="form-control" name="sol" id="sol" rows="3" placeholder="Describe Here..."></textarea>
        <small id="helpId" class="form-text text-muted"></small>
      </div>
      
      <small id="helpId" class="form-text" style="color:red; font-size:10pt;">* Fields are
                        Mandatory</small><br>
      
      <button type="submit" name="q_submit" id="q_submit"
        value="q_submit" style="background-color:#007bff;" class="ps-btn">Add</button>
      <button type="reset" name="q_reset" id="q_reset" value="q_reset" style="background-color:#dc3545;"
        class="ps-btn">Reset</button>
     <div class="loader" id="loader">
                                    <img src="../loader/form.gif" width="140px" alt="">
                            </div>
    </form>
											<br>
											<div id="que"></div>
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
    <script src="datatable/jquery.dataTables.min.js"></script>
    <script src="datatable/dataTables.bootstrap4.min.js"></script>
    <script src="datatable/datatable-basic.min.js"></script>
    <!-- custom scripts-->
    <script src="../js/main.js"></script>
    <script src="ajax/addquestion.js"></script>
    <script src="ajax/removequestion.js"></script>
    <script src="ajax/toastr/toastr.min.js"></script>
    <script src="../js/confirm.js"></script>
    <script src="../js/imgpreview.js"></script>
    <script src="../plugins/ckeditor/ckeditor.js"></script>
    
	<script type="text/javascript" src="../plugins/jquery-ui-1.7.custom.min.js"></script>
    <script>
    //   CKEDITOR.replace( 'qs' );
    //   CKEDITOR.add

    //   CKEDITOR.replace( 'a' );
    //   CKEDITOR.add

    //   CKEDITOR.replace( 'b' );
    //   CKEDITOR.add

    //   CKEDITOR.replace( 'c' );
    //   CKEDITOR.add

    //   CKEDITOR.replace( 'd' );
    //   CKEDITOR.add
      
    //   CKEDITOR.replace( 'sol' );
    //   CKEDITOR.add
    </script>
    
    <script type="text/javascript">
		$(function() {

			var $tabs = $('#tabs').tabs();
	
			$(".ui-tabs-panel").each(function(i){
	
			  var totalSize = $(".ui-tabs-panel").size() - 1;
	
			  if (i != totalSize) {
			      next = i + 2;
		   		  $(this).append("<a href='#' class='next-tab mover' rel='" + next + "'>Next Page &#187;</a>");
			  }
	  
			  if (i != 0) {
			      prev = i;
		   		  $(this).append("<a href='#' class='prev-tab mover' rel='" + prev + "'>&#171; Prev Page</a>");
			  }
   		
			});
	
			$('.next-tab, .prev-tab').click(function() { 
		           $tabs.tabs('select', $(this).attr("rel"));
		           return false;
		       });

		});
    </script>
    
</body>

</html>
<?php
}
?>