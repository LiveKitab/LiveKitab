<?php
include_once("../db/connect.php");
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
    <link rel="stylesheet" href="../css/confirm.css">
    <link rel="stylesheet" href="../css/imgpreview.css"></script>
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
        <div class="mt-5 mb-5 ml-5 mr-5">
            <div class="ps-product--detail ps-product--box">

                <div class="ps-product__content ps-tab-root">
                    <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="dash">Home</a></li>
                    <li>Add Package</li>
                </ul>
            </div>
        </div>
                    <div class="row">
                        <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="ps-layout__left">
                    <aside class="widget widget_shop ps-product__box">
                        <figure class="ps-custom-scrollbar" data-height="250">
                        <h4 class="widget-title"><b>BY University</b></h4>
                            <div class="ps-form--widget-search">
                        <input class="form-control mb-3 unisrch" type="text" placeholder="Search here...">
                        <button><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                        <div id="scrollbar" class="unilist" style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                            <?php
                                $q = "select distinct uni from stream_data order by uni asc";
                                $result = mysqli_query($con,$q);
                                while($rows = mysqli_fetch_array($result))
                                {
                                ?>
                                <div class="ps-checkbox">
                                    <input class="form-control filter-checkbox-uni" type="checkbox" id="<?php echo $rows['uni']; ?>" name="<?php echo $rows['uni']; ?>" value="<?php echo $rows['uni']; ?>">
                                    <label for="<?php echo $rows['uni']; ?>"><?php echo $rows['uni']; ?></label>
                                </div>
                            <?php
                            }               
                            ?>
                            </div>
                        </figure>
                        <figure class="ps-custom-scrollbar" data-height="250">
                        <h4 class="widget-title"><b>BY Stream</b></h4>
                        <div class="ps-form--widget-search">
                        <input class="form-control mb-3 strmsrch" type="text" placeholder="Search here...">
                        <button><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                        <div id="scrollbar" class="strmlist" style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                            <?php
                                $q = "select distinct stream_name from stream_data order by stream_name asc";
                                $result = mysqli_query($con,$q);
                                while($rows = mysqli_fetch_array($result))
                                {
                                ?>
                                <div class="ps-checkbox">
                                    <input class="form-control filter-checkbox-stream" type="checkbox" id="<?php echo $rows['stream_name']; ?>" name="<?php echo $rows['stream_name']; ?>" value="<?php echo $rows['stream_name']; ?>">
                                    <label for="<?php echo $rows['stream_name']; ?>"><?php echo $rows['stream_name']; ?></label>
                                </div>
                            <?php
                            }               
                            ?>
                            </div>
                        </figure>
                    
                    <figure class="ps-custom-scrollbar" data-height="250">
                    
                        <h4 class="widget-title"><b>BY Program</b></h4>
                        <div class="ps-form--widget-search">
                        <input class="form-control mb-3 progsrch" type="text" placeholder="Search here...">
                        <button><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                        <div id="scrollbar" class="proglist" style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                            <?php
                                $q = "select distinct program_name from program_data order by program_name asc";
                                $result = mysqli_query($con,$q);
                                while($rows = mysqli_fetch_array($result))
                                {
                                ?>
                                <div class="ps-checkbox">
                                    <input class="form-control filter-checkbox-prog" type="checkbox" id="<?php echo $rows['program_name']; ?>" name="<?php echo $rows['program_name']; ?>" value="<?php echo $rows['program_name']; ?>">
                                    <label for="<?php echo $rows['program_name']; ?>"><?php echo $rows['program_name']; ?></label>
                                </div>
                            <?php
                            }               
                            ?>
                            </div>
                        </figure>
                    
                    
                    <figure class="ps-custom-scrollbar" data-height="250">
                        <h4 class="widget-title"><b>BY Branch</b></h4>
                        <div class="ps-form--widget-search">
                        <input class="form-control mb-3 brnsrch" type="text" placeholder="Search here...">
                        <button><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                        <div id="scrollbar" class="brnlist" style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                            <?php
                                $q = "select distinct b_name from branch_data order by b_name asc";
                                $result = mysqli_query($con,$q);
                                while($rows = mysqli_fetch_array($result))
                                {
                                ?>
                                <div class="ps-checkbox">
                                    <input class="form-control filter-checkbox-branch" type="checkbox" id="<?php echo $rows['b_name']; ?>" name="<?php echo $rows['b_name']; ?>" value="<?php echo $rows['b_name']; ?>">
                                    <label for="<?php echo $rows['b_name']; ?>"><?php echo $rows['b_name']; ?></label>
                                </div>
                            <?php
                            }               
                            ?>
                            </div>
                        </figure>
                    
                    
                    <figure class="ps-custom-scrollbar" data-height="250">
                        <h4 class="widget-title"><b>BY Semester</b></h4>
                        <div class="ps-form--widget-search">
                        <input class="form-control mb-3 semsrch" type="text" placeholder="Search here...">
                        <button><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                        <div id="scrollbar" class="semlist" style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                            <?php
                                $q = "select distinct term_name from term_data order by term_name asc";
                                $result = mysqli_query($con,$q);
                                while($rows = mysqli_fetch_array($result))
                                {
                                ?>
                                <div class="ps-checkbox">
                                    <input class="form-control filter-checkbox-term" type="checkbox" id="<?php echo $rows['term_name']; ?>" name="<?php echo $rows['term_name']; ?>" value="<?php echo $rows['term_name']; ?>">
                                    <label for="<?php echo $rows['term_name']; ?>"><?php echo $rows['term_name']; ?></label>
                                </div>
                            <?php
                            }               
                            ?>
                            </div>
                        </figure>
                   
                    <figure class="ps-custom-scrollbar" data-height="250">
                        <h4 class="widget-title"><b>BY Medium</b></h4>
                        
                            <?php
                                $q = "select distinct med from term_data order by med asc";
                                $result = mysqli_query($con,$q);
                                while($rows = mysqli_fetch_array($result))
                                {
                                ?>
                                <div class="ps-checkbox">
                                    <input class="form-control filter-checkbox-med" type="checkbox" id="<?php echo $rows['med']; ?>" name="<?php echo $rows['med']; ?>" value="<?php echo $rows['med']; ?>">
                                    <label for="<?php echo $rows['med']; ?>"><?php echo $rows['med']; ?></label>
                                </div>
                            <?php
                            }               
                            ?>
                            
                        </figure>
                    </aside>
                    
                </div>
                    </div>
                    
                    
                        <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12 " style="margin-bottom:30px;">
                            <div class="ps-product__box">
                                <ul class="ps-tab-list">
                                    <li class="active"><a href="#tab-1">View Package</a></li>
                                    <li><a href="#tab-2">Add Package</a></li>
                                </ul>
                                <div class="ps-tabs">
                                    <div class="ps-tab active" id="tab-1">
                                        <div class="ps-document">
                                            <?php 
                                            include_once('back/display/displaypackage.php');
                                        ?>  
                                                 <div id="return"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="ps-tab" id="tab-2">
                                        <div class="ps-document">
                                            <form onsubmit="return pkg(this);" method="post" id="myform" enctype="multipart/form-data">
                                         
                <div class="form-group">
  <label for="">Package Title:<sup style="color:red;">*</sup></label>
  <input type="text" class="form-control" name="ptitle" id="ptitle" aria-describedby="helpId" placeholder="Package Title" required />
</div>
                
                
                <div class="form-group">
                  <label for="">University/Stream Name :<sup style="color:red;">*</sup></label>
                  <select class="form-control browser-default custom-select" onchange="myfun(this.value)" name="uni_str" id="uni_str" required>
                    <option value="">-- Select University/Stream --</option>
                    <?php
                            $q = "select * from stream_data order by uni asc";
                            $result = mysqli_query($con,$q);
                            while($rows = mysqli_fetch_array($result))
                    {
                    ?>
                            
                            <option value="<?php echo $rows['stream_id'];?>"><?php echo $rows['uni']; ?> / <?php echo $rows['stream_name']; ?></option>
                    <?php
                    }               
                    ?>
                  </select>
                </div>
                
                <div class="row">
                    <div class="col-md-6 form-group">
                  <label for="">Program Name :<sup style="color:red;">*</sup></label>
                  <select class="form-control browser-default custom-select" onchange="myfun1(this.value)" name="program" id="program" required>
                    <option value="">-- Select Program --</option>
                    
                  </select>
                </div>
                
                <div class="col-md-6 form-group">
                  <label for="">Branch Name :<sup style="color:red;">*</sup></label>
                  <select class="form-control browser-default custom-select" name="branch" onchange="myfun2(this.value)" id="branch" required>
                    <option value="">-- Select Branch --</option>
                    
                  </select>
                </div>
                </div>
                
                
                    <div class="form-group">
                  <label for="">Semester/Medium :<sup style="color:red;">*</sup></label>
                  <select class="form-control browser-default custom-select" name="sem_med" id="sem_med" required>
                    <option value="">-- Select Semester/Medium --</option>
                    
                  </select>
                </div>
                
                
                
                
                <div class="row">
                    <div class="col-md-6 form-group">
                  <label for="header">Price:<sup style="color:red;">*</sup></label>
                  <input type="number" class="form-control" name="price" id="price" aria-describedby="helpId" placeholder="Price" required />
                </div>
                
                <div class="col-md-6 form-group">
                  <label for="header">Discount in %:<sup style="color:red;">*</sup></label>
                  <input type="number" class="form-control" name="dis" id="dis" aria-describedby="helpId" placeholder="Discount in %" required />
                </div>
                 </div>
                 
                 <div class="form-group">
                    <label for="">Description:<sup style="color:red;">*</sup></label>
                      <textarea class="form-control" name="des" id="des" placeholder="Description here..." rows="3"></textarea>
                </div>
                
                <label for="">Package Image:<sup style="color:red;">*</sup></label>        
  <div class="col-sm-2 imgUp">
    <div class="imagePreview"></div>

				<input type="file" class="uploadFile img" style="height:45px; border:none;" name="p_img" id="p_img">
				
  </div>    
                
                <small id="helpId" class="form-text" style="color:red; font-size:10pt;">* Fields are
                        Mandatory</small>

                <hr>
                    <button type="submit"  name="submit" id="submit"
                        value="submit" class="ps-btn">Add</button>
                    <button class="ps-btn" type="reset" name="res" value="reset" id="res"
                        style="background-color:#28a745;">Reset</button>
                <div class="loader" id="loader">
                <img src="../loader/form.gif" width="150px" alt="">
                </div>
            </form>
											<br>
											<div id="pkg"></div>
											
										
                                           
                                    
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
    <script src="ajax/addpkg.js"></script>
    <script src="ajax/removepkg.js"></script>
    <script src="ajax/fetchpkg.js"></script>
    <script src="ajax/updatepkg.js"></script>
    <script src="ajax/toastr/toastr.min.js"></script>
    <script src="ajax/sidebarsearch.js"></script>
    <script src="datatable/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/3.3.1/js/dataTables.fixedColumns.min.js"></script>
    <script src="datatable/dataTables.bootstrap4.min.js"></script>
    <script src="../js/confirm.js"></script>
    <script src="../js/imgpreview.js"></script>
    <script>
        function myfun(datavalue) {
    $.ajax({
        url: 'back/operation/structuredropdown.php',
        type: 'POST',
        data: { datapost: datavalue },
        success: function(cat) {
            $('#program').html(cat);
            //alert(cat);
        }
    });
}
    </script>
        <script>
        function myfun1(datavalue1) {
    $.ajax({
        url: 'back/operation/structuredropdown.php',
        type: 'POST',
        data: { datapost1: datavalue1 },
        success: function(form) {
            $('#branch').html(form);
            //alert(form);
        }
    });
}
    </script>
    
    <script>
        function myfun2(datavalue2) {
    $.ajax({
        url: 'back/operation/structuredropdown.php',
        type: 'POST',
        data: { datapost2: datavalue2 },
        success: function(data) {
            $('#sem_med').html(data);
            //alert(form);
        }
    });
}
    </script>
    <script>
    $(document).ready(function() {
    
    var table = $('#load').DataTable( {
        orderCellsTop: true,
        fixedHeader: true
    } );
    
    
    $('.filter-checkbox-uni').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox-uni'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      table.column(3).search(searchTerms.join('|'), true, false, true).draw();
    });
    
    $('.filter-checkbox-stream').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox-stream'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      table.column(4).search(searchTerms.join('|'), true, false, true).draw();
    });
    
    $('.filter-checkbox-prog').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox-prog'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      table.column(5).search(searchTerms.join('|'), true, false, true).draw();
    });
    
    $('.filter-checkbox-branch').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox-branch'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      table.column(6).search(searchTerms.join('|'), true, false, true).draw();
    });
    
    $('.filter-checkbox-term').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox-term'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      table.column(8).search(searchTerms.join('|'), true, false, true).draw();
    });
    
    $('.filter-checkbox-med').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox-med'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      table.column(7).search(searchTerms.join('|'), true, false, true).draw();
    });
    
} );
    </script>
</body>

</html>