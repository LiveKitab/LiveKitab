<?php
include_once("../db/pconnect.php");
include_once("back/function/session.php");
if(isset($_GET['edit']))
	{
	    $qid = mysqli_real_escape_string($con,$_GET['queid']);
	    $qid = base64_decode($qid);
	    
	    $cmd="select * from video_question_data where que_id='$qid'";
              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
              while($row=mysqli_fetch_array($result))
              {     
                $qs=$row['question'];
                $a=$row['a'];
                $b=$row['b'];
                $c=$row['c'];
                $d=$row['d'];
                $ans=$row['correct'];
                $sol=$row['sol'];
                $test_id1=$row['test_id'];
                $test_id=$row['test_id'];
                $test_id=base64_encode($test_id);
              }
              
              $cmd="select * from video_test_data where test_id='$test_id1'";
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
    <link rel="stylesheet" href="../css/tabs.css" type="text/css" media="screen, projection"/>
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
                    <li>Test Name: <a href="addtest"><?=$title;?></a>&nbsp;&nbsp;Total Marks: <a href="addtest"><?=$total;?></a></li>
                    <li><a href="addquestion?questringdata=<?=$test_id;?>">Add Question</a></li>
                    <li>Edit Question</li>
                </ul>
            </div>
        </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 " style="margin-bottom:30px;">
                            <div class="ps-product__box">
                                <ul class="ps-tab-list">
                                    <li class="active"><a href="#tab-1">Edit Question</a></li>

                                </ul>
                                <div class="ps-tabs">
                                    
                                    
                                    <div class="ps-tab active" id="tab-">
                                        <div class="ps-document">
                                            <form onsubmit="return editquestion(this);" method="post" id="updateform">

      <input type="hidden" name="que_id" id="que_id" value="<?=$qid;?>">

      <div class="form-group">
        <label for="qs">Question<sup style="color:red;">*</sup></label>
          <textarea class="form-control" name="qs" id="qs" rows="3" placeholder="Describe Here..."><?php echo $qs; ?></textarea>
        <small id="helpId" class="form-text text-muted"></small>
      </div>

<div class="row">
      <div class="col-md-6 form-group">
        <label for="a">Option A<sup style="color:red;">*</sup></label>
                  <textarea class="form-control" name="a" id="a" rows="3" placeholder=""><?php echo $a; ?></textarea>
        <small id="helpId" class="form-text text-muted"></small>
      </div>

      <div class="col-md-6 form-group">
        <label for="a">Option B<sup style="color:red;">*</sup></label>
                  <textarea class="form-control" name="b" id="b" rows="3" placeholder=""><?php echo $b; ?></textarea>
        <small id="helpId" class="form-text text-muted"></small>
      </div>
      
      </div>
      
      
      <div class="row">
      <div class="col-md-6 form-group">
        <label for="a">Option C<sup style="color:red;">*</sup></label>
                  <textarea class="form-control" name="c" id="c" rows="3" placeholder=""><?php echo $c; ?></textarea>
        <small id="helpId" class="form-text text-muted"></small>
      </div>

      <div class="col-md-6 form-group">
        <label for="a">Option D<sup style="color:red;">*</sup></label>
                  <textarea class="form-control" name="d" id="d" rows="3" placeholder=""><?php echo $d; ?></textarea>
        <small id="helpId" class="form-text text-muted"></small>
      </div>
      
      </div>
      
      
      <div class="form-group">
        <label for="ans">Correct Answer<sup style="color:red;">*</sup></label>
        <select class="form-control browser-default custom-select" name="ans" id="ans" required>
            <option value="<?php echo $ans; ?>"><?php echo $ans; ?></option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
        </select>
        <small id="helpId" class="form-text text-muted"></small>
      </div>

      <div class="form-group">
        <label for="sol">Solution Of Question<sup style="color:red;">*</sup></label>
          <textarea class="form-control" name="sol" id="sol" rows="3" placeholder="Describe Here..."><?php echo $sol; ?></textarea>
        <small id="helpId" class="form-text text-muted"></small>
      </div>
      
      <small id="helpId" class="form-text" style="color:red; font-size:10pt;">* Fields are
                        Mandatory</small><br>
      
      <button type="submit" name="update" id="update"
        value="update" class="ps-btn" style="background-color:#007bff;">Update</button>
      <button type="reset" name="reset" id="reset" value="reset" style="background-color:#dc3545;"
        class="ps-btn">Cancel</button>
     <div class="loader" id="loader">
                                    <img src="../loader/form.gif" width="140px" alt="">
                            </div>
    </form>
											<br>
											<div id="done"></div>
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
    <script src="ajax/editquestion.js"></script>
    <script src="ajax/toastr/toastr.min.js"></script>
    <script src="../js/confirm.js"></script>
    <script src="../js/imgpreview.js"></script>
    <script src="../plugins/ckeditor/ckeditor.js"></script>
    
        <script>
      var mathElements = [
        'math',
        'maction',
        'maligngroup',
        'malignmark',
        'menclose',
        'merror',
        'mfenced',
        'mfrac',
        'mglyph',
        'mi',
        'mlabeledtr',
        'mlongdiv',
        'mmultiscripts',
        'mn',
        'mo',
        'mover',
        'mpadded',
        'mphantom',
        'mroot',
        'mrow',
        'ms',
        'mscarries',
        'mscarry',
        'msgroup',
        'msline',
        'mspace',
        'msqrt',
        'msrow',
        'mstack',
        'mstyle',
        'msub',
        'msup',
        'msubsup',
        'mtable',
        'mtd',
        'mtext',
        'mtr',
        'munder',
        'munderover',
        'semantics',
        'annotation',
        'annotation-xml'
      ];
      
        CKEDITOR.replace('qs', {
        extraPlugins: 'ckeditor_wiris',
        extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
      });
      
      
      CKEDITOR.replace('a', {
        extraPlugins: 'ckeditor_wiris',
        extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
      });
      
      
      CKEDITOR.replace('b', {
        extraPlugins: 'ckeditor_wiris',
        extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
      });
      
      
      CKEDITOR.replace('c', {
        extraPlugins: 'ckeditor_wiris',
        extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
      });
      
      CKEDITOR.replace('d', {
        extraPlugins: 'ckeditor_wiris',
        extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
      });
      
      CKEDITOR.replace('sol', {
        extraPlugins: 'ckeditor_wiris',
        extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
      });

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