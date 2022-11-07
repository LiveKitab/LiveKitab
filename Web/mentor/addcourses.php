<?php
include_once("../db/mconnect.php");
include_once("back/function/session.php");
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
    <link href="datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
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
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 " style="margin-bottom:30px;">
                            <div class="ps-product__box">
                                <ul class="ps-tab-list">
                                    <li class="active"><a href="#tab-1">View Courses</a></li>
                                    <li><a href="#tab-2">Add Courses</a></li>
                                </ul>
                                <div class="ps-tabs">
                                    <div class="ps-tab active" id="tab-1">
                                        <div class="ps-document">
                                            <?php 
                                            include_once('back/display/displaycourses.php');
                                            ?>  
                                                 
                                        </div>
                                    </div>
                                    
                                    <div class="ps-tab" id="tab-2">
                                        <div class="ps-document">
                                              
                                              <form onsubmit="return courses(this);" method="post" id="myform" enctype="multipart/form-data">
                                   
                                   <div class="form-group">
                  <label for="">Subject :<sup style="color:red;">*</sup></label>
                  <select class="form-control browser-default custom-select" name="b_id" id="b_id" required>
                    <option value="">-- Select Branch --</option>
                    <?php
                            $q = "select * from branch_data order by b_name asc";
                            $result = mysqli_query($con,$q);
                            while($rows = mysqli_fetch_array($result))
                    {
                    ?>
                            
                            <option value="<?php echo $rows['b_id'];?>"><?php echo $rows['b_name']; ?></option>
                    <?php
                    }               
                    ?>
                  </select>
                </div>

<div class="form-group">
  <label for="header">Courses Name:<sup style="color:red;">*</sup></label>
  <input type="text" class="form-control" name="cname" id="cname" aria-describedby="helpId" placeholder="Courses Name" required />
</div>


<div class="form-group">
  <label for="header">Courses Price:<sup style="color:red;">*</sup></label>
  <input type="number" class="form-control" name="cprice" id="cprice" aria-describedby="helpId" placeholder="Courses Price" required />
</div>

<div class="form-group">
  <label for="header">Courses Paln Duration:<sup style="color:red;">*</sup></label>
  <input type="number" class="form-control" name="c_duration" id="c_duration" aria-describedby="helpId" placeholder="Courses Paln Duration" required />
</div>

<div class="form-group">
                    <label for="">Courses Description:<sup style="color:red;">*</sup></label>
                      <textarea class="form-control" name="c_des" id="c_des" placeholder="Courses Description here..." rows="3"></textarea>
                </div>
                
                <div class="form-group">
  <label for="header">Courses Video Limit:<sup style="color:red;">*</sup></label>
  <input type="number" class="form-control" name="limit" id="limit" aria-describedby="helpId" placeholder="Courses Video Limit" required />
</div>
                
                <label for="">Course Background:<sup style="color:red;">*</sup></label>        
  <div class="col-sm-2 imgUp">
    <div class="imagePreview"></div>

				<input type="file" class="uploadFile img" style="height:45px; border:none;" name="bg_img" id="bg_img">
				
  </div>
  
  <label for="">Course Booklet:<sup style="color:red;">*</sup></label>        
  <div class="col-sm-2 imgUp">
    <div class="imagePreview"></div>

				<input type="file" class="uploadFile img" style="height:45px; border:none;" name="bk_img" id="bk_img">
				
  </div>




<small id="helpId" class="form-text" style="color:red; font-size:10pt;">* Fields are
                        Mandatory</small><br>

<button type="submit" name="submit" id="submit" class="ps-btn" style="background-color:#28a745;">Add</button>
<button type="reset"  name="reset" id="reset" class="ps-btn" style="background-color:#dc3545;">Reset</button>
<div class="loader" id="loader">
                                    <img src="../loader/form.gif" width="140px" alt="">
                            </div>

</form>
											<br>
											<div id="courses"></div>
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
    
    <script src="ajax/addcourses.js"></script>
    <script src="ajax/toastr/toastr.min.js"></script>
    <script src="../js/imgpreview.js"></script>
    <script src="datatable/jquery.dataTables.min.js"></script>
    <script src="datatable/dataTables.bootstrap4.min.js"></script>
    <script src="datatable/datatable-basic.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on('dblclick', '.showmodal', function(e) {
            $('#viewmodal').modal('show');
            
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
            return $(this).text();
            }).get();
            
            $('#vid').val(data[0]);
            $('#vcname').val(data[1]);
            $('#vcprice').val(data[2]);
            $('#vcpd').val(data[3]);
            $('#vcdes').val(data[8]);
            $('#vcsdate').val(data[5]);
            $('#vcedate').val(data[6]);
        
        });
});
    </script>
</body>

</html>