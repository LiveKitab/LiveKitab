<?php
include_once("../db/connect.php");
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
    <style>
        .loader
        {
            display:none;
        }
        thead input {
        width: 100%;
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
                    <li>Select Mentor</li>
                </ul>
            </div>
        </div>
                    <div class="row">
                        <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="ps-layout__left">
                    <aside class="widget widget_shop ps-product__box">
                        <figure class="ps-custom-scrollbar" data-height="250">
                        <h4 class="widget-title"><b>BY State</b></h4>
                         <div class="ps-form--widget-search">
                        <input class="form-control mb-3 statesrch" type="text" placeholder="Search here...">
                        <button><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                        <div id="scrollbar" class="statelist" style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                        
                            <?php
                                $q = "select distinct c_state from creator_data order by c_state asc";
                                $result = mysqli_query($con,$q);
                                while($rows = mysqli_fetch_array($result))
                                {
                                    
                                ?>
                                <div class="ps-checkbox">
                                    <input class="form-control filter-checkbox-c_state" type="checkbox" id="<?php echo $rows['c_state']; ?>" name="<?php echo $rows['c_state']; ?>" value="<?php echo $rows['c_state']; ?>">
                                    <label for="<?php echo $rows['c_state']; ?>"><?php echo $rows['c_state']; ?></label>
                                </div>
                            <?php
                            }               
                            ?>
                            </div>
                        </figure>
                        <figure class="ps-custom-scrollbar" data-height="250">
                        <h4 class="widget-title"><b>BY City</b></h4>
                         <div class="ps-form--widget-search">
                        <input class="form-control mb-3 citysrch" type="text" placeholder="Search here...">
                        <button><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                        <div id="scrollbar" class="citylist" style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                            <?php
                                $q = "select distinct c_city from creator_data order by c_city asc";
                                $result = mysqli_query($con,$q);
                                while($rows = mysqli_fetch_array($result))
                                {
                                    
                                ?>
                                <div class="ps-checkbox">
                                    <input class="form-control filter-checkbox-c_city" type="checkbox" id="<?php echo $rows['c_city']; ?>" name="<?php echo $rows['c_city']; ?>" value="<?php echo $rows['c_city']; ?>">
                                    <label for="<?php echo $rows['c_city']; ?>"><?php echo $rows['c_city']; ?></label>
                                </div>
                            <?php
                            }               
                            ?>
                            </div>
                        </figure>
                        
                        
                    </aside>
                    
                </div>
                    </div>
                    
                    
                        <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12 " style="margin-bottom:30px;">
                            <div class="ps-product__box">
                                <ul class="ps-tab-list">
                                    <li class="active"><a href="#tab-1">Select Mentor</a></li>
                                </ul>
                                <div class="ps-tabs">
    
                                    
                                    <div class="ps-tab active" id="tab-1">
                                        <div class="ps-document">
                                            <div class="table-responsive">
            <table id="load" class="table table-hover table-bordered zero-configuration">
              <thead align="center" class="thead-dark">
                <tr>
                  <th>Index</th>
                    <th>Mentor Name</th>                    
                    <th>Mentor Contact Number</th>
                    <th>Total Course</th>
                    <th style="display:none;">State</th>
                    <th style="display:none;">City</th>
                    <th>Action</th>
                    
                </tr>
              </thead>
              <tbody align="center">
                <?php
                $count=0;
         $cmd="select * from creator_data";
         $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
         while($row=mysqli_fetch_array($result))
         {
             $count=$count+1;
             $c_id=$row['c_id'];
             $c_id1=$row['c_id'];
             $c_name=$row['c_name'].' '.$row['c_lname'];
             $c_cno=$row['c_cno'];
             $c_state=$row['c_state'];
             $c_city=$row['c_city'];
             $name=rand(1,8);
             $c_id = base64_encode($c_id);
              
              $coursecount = 0;
              $cmd1="select id from course_data where c_id='$c_id1'";
              $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
              while($row1=mysqli_fetch_array($result1))
              {
                $coursecount=$coursecount+1;
              }
              ?>
                <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $c_name; ?></td>
                    <td><?php echo $c_cno; ?></td>
                    <td><?php echo $coursecount; ?></td>
                    <td style="display:none;"><?php echo $c_state; ?></td>
                    <td style="display:none;"><?php echo $c_city; ?></td>
                    <td>
                    <a type="button" href="account?stringdata=<?php echo $c_id; ?>" class="ps-btn"><i class="fa fa-eye"></i></a>             
                    </td>
                  </tr>
              <?php
            }
            ?>
              </tbody>
              <tfoot align="center">
                <tr>
                
                    <th>Index</th>
                    <th>Mentor Name</th>                    
                    <th>Mentor Contact Number</th>
                    <th>Total Course</th>
                    <th style="display:none;">State</th>
                    <th style="display:none;">City</th>
                    <th>Action</th>
                    
                </tr>
              </tfoot>
            </table>
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
    <script src="ajax/apprrejmentor.js"></script>
    <script src="ajax/managecourses.js"></script>
    <script src="ajax/removecourses.js"></script>
    <script src="ajax/fetchcourses.js"></script>
    <script src="ajax/updatecourses.js"></script>
    <script src="ajax/toastr/toastr.min.js"></script>
    <script src="../js/confirm.js"></script>
    <script src="ajax/sidebarsearch.js"></script>
    <script src="datatable/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/3.3.1/js/dataTables.fixedColumns.min.js"></script>
    <script src="datatable/dataTables.bootstrap4.min.js"></script>
    <script>
    $(document).ready(function() {
    
    var table = $('#load').DataTable( {
        orderCellsTop: true,
        fixedHeader: true
    } );
    
    
    $('.filter-checkbox-c_state').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox-c_state'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      table.column(4).search(searchTerms.join('|'), true, false, true).draw();
    });
    
    $('.filter-checkbox-c_city').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox-c_city'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      table.column(5).search(searchTerms.join('|'), true, false, true).draw();
    });
    
    
    
} );
    </script>
</body>

</html>