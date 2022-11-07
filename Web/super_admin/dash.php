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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../plugins/owl-carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="../plugins/owl-carousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="../plugins/slick/slick/slick.css">
    <link rel="stylesheet" href="../plugins/nouislider/nouislider.min.css">
    <link rel="stylesheet" href="../plugins/lightGallery-master/dist/css/lightgallery.min.css">
    <link rel="stylesheet" href="../plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css">
    <link rel="stylesheet" href="../plugins/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="ajax/toastr/toastr.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/home-photo.css">
    <style type="text/css">
        #chartdiv {
            width: 100%;
            height: 435px;
            font-size: 15px;
        }

        .amcharts-chart-div a {display:none !important;}
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
    

    <main id="homepage-photo">
        
        <div class="ps-home-search bg--cover" data-background="../img/home/home-photo/banner.jpg">
            <div class="ps-section__wrapper">
                <div class="ps-section__header">
                    <p><strong>171,484,880</strong> Educational videos & more then <strong>171 Subject</strong></p>
                    <h3>The Educational Video Platform <br/> Subject and video thats You needs.</h3>
                </div>
                <!--<form class="ps-form--photo-search" action="index.html" method="get">-->
                <!--    <div class="ps-form__content">-->
                <!--        <div class="form-group form-group--icon">-->
                <!--            <input class="form-control" type="text" placeholder="Search for Courses, Videos and Creators... "><i class="icon-magnifier"></i>-->
                <!--        </div>-->
                <!--        <select class="ps-select">-->
                <!--            <option value="1">Search All</option>-->
                <!--            <option value="2">Courses</option>-->
                <!--            <option value="3">Videos</option>-->
                <!--            <option value="4">Creator</option>-->
                <!--        </select>-->
                <!--    </div>-->
                <!--    <div class="ps-form__footer">Top Search Results : <a href="#">Computer & Science</a><a href="#">Mechenical</a><a href="#">Information & Technology</a><a href="#">Civil</a><a href="#">Electrical</a><a href="#">Petrochemical</a></div>-->
                <!--</form>-->
            </div>
            <h5>Created By <a href="https://www.zocarro.net"> Encender</a></h5>
        </div>
        
            

        <!--<div class="ps-home-promotions mt-5" style="padding-top: 10px; padding-bottom: 60px;">-->
        <!--    <div class="container">-->
        <!--        <div class="row">-->
        <!--            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 ">-->
        <!--                <a class="ps-collection" href="#"><img src="../img/promotions/home-8/1.jpg" alt=""></a>-->
        <!--            </div>-->
        <!--            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">-->
        <!--                <a class="ps-collection" href="#"><img src="../img/promotions/home-8/2.jpg" alt=""></a>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        
        <div class="ps-home-trending-products ps-section--furniture mt-5" style="padding-top: 10px; padding-bottom: 60px;">
            <div class="container">
                <div class="ps-section__header">
                    <div class="ps-block--countdown-deal">
                        <div class="ps-block__left">
                            <h3>Analysis</h3>
                        </div>
                        
                    </div>
                    <hr>
                </div>
                <div class="ps-section__content">
                    <?php
                                            $cmd = "select * from creator_data";
                                            $result=mysqli_query($con,$cmd);
                                            $creators=mysqli_num_rows($result);

                                            $cmd = "select * from user_data";
                                            $result=mysqli_query($con,$cmd);
                                            $users=mysqli_num_rows($result);

                                            $cmd = "select * from university_data";
                                            $result=mysqli_query($con,$cmd);
                                            $university=mysqli_num_rows($result);

                                            $cmd = "select * from stream_data";
                                            $result=mysqli_query($con,$cmd);
                                            $stream=mysqli_num_rows($result);

                                            $cmd = "select * from program_data";
                                            $result=mysqli_query($con,$cmd);
                                            $program=mysqli_num_rows($result);

                                            $cmd = "select * from branch_data";
                                            $result=mysqli_query($con,$cmd);
                                            $branch=mysqli_num_rows($result);

                                            $cmd = "select * from subject_data";
                                            $result=mysqli_query($con,$cmd);
                                            $subject=mysqli_num_rows($result);
                                            ?>
                   <script src="ajax/charts/amcharts.js"></script>
<script src="ajax/charts/serial.js"></script>
<div id="chartdiv"></div> 
                </div>
            </div>
        </div>
        
        <div class="ps-home-promotion-2" style="padding-top: 10px; padding-bottom: 60px;">
            <div class="container">
                <a href="#"><img src="../img/promotions/home-8/3.jpg" alt=""></a>
            </div>
        </div>
        
        <div class="ps-section--furniture ps-home-shop-by-room" style="margin-bottom:20px;">
            <?php
                $sel="select * from package";
                $run=mysqli_query($con,$sel);
                if(mysqli_num_rows($run)>0)
                {
                    ?>
            <div class="container">
                
                
                <div class="ps-section__header" style="text-align: center; border-bottom: none; font-weight: 400; font-size: 24px; text-transform: uppercase; padding-bottom: 20px;"
                    <h3>Combo Offers (Pacages)</h3>
                </div>
                <div class="ps-section__content">
                    <div class="row">
                        <?php
                        
                        while($col=mysqli_fetch_array($run))
                        {
                            $pkgtitle=$col['pkg_title'];
                            $pkgimg=$col['pkg_img'];
                        
                        ?>
                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="ps-block--category-room">
                                <div class="ps-block__thumbnail">
                                    <a href="" data-toggle="modal" data-target="#abcde<?php echo $col['id'] ?>"><img src="../src/package/<?=$pkgimg;?>" alt="" height="170px" width="270px;"></a>
                                </div>
                                <div class="ps-block__content"><a href=""><?=$pkgtitle;?></a></div>
                            </div>
                        </div>
                        
                        <!-- Modal -->
                        
                        <div class="modal fade" id="abcde<?php echo $col['id'] ?>" role="dialog">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                    <h5>View Package Details</h5>
                    <button type="button" class="close" style="font-size:20pt;" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                            <div class="modal-body">
                            
                                
                                    <div class="row">
                                        <div class="col-md-5">Package Name</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?=$pkgtitle;?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Package Price</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?=$col['price'];?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Package Discount</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?=$col['dis'];?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Package Description</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?=$col['descr'];?></div>
                                    </div>
                                    
                            <div class="modal-footer">
                                <button type="reset" name="reset" id="reset" value="reset" class="ps-btn" style="background-color: #dc3545;" data-dismiss="modal">Close</button>
                            </div>
                </div>
                
            </div>
            </div>
        </div>
                        <?php
                        }
                
                        ?>
                        
                    </div>
                </div>
            </div>
            <?php
                }
                ?>
        </div>
        

        
        <!---- -->
        <section class="ps-home-share-work">
            <div class="container-fluid">
                <div class="ps-section__header">
                    <p>Join My Video Book Community</p>
                    <h3>Share your work and start earning</h3>
                </div>
                <div class="ps-section__content">
                    <div class="ps-section__left"><img src="../img/home/home-photo/share-work.png" alt=""></div>
                    <div class="ps-section__right">
                        <div class="row ps-section__wrapper">
                            <div class="col-sm-6 col-12">
                                <figure>
                                    <div class="ps-block--icon"><i class="icon-cash-dollar"></i>
                                        <h5>Make 50% Every Time You Sell</h5>
                                        <p>A photo can sell again and again to multiple clients.</p>
                                    </div>
                                </figure>
                            </div>
                            <div class="col-sm-6 col-12">
                                <figure>
                                    <div class="ps-block--icon"><i class="icon-loupe"></i>
                                        <h5>Always Keep Your Copyright</h5>
                                        <p>You choose which photos you want to sell and retain the copyright to your work.</p>
                                    </div>
                                </figure>
                            </div>
                            <div class="col-sm-6 col-12">
                                <figure>
                                    <div class="ps-block--icon"><i class="icon-group-work"></i>
                                        <h5>Make 50% Every Time You Sell</h5>
                                        <p>A photo can sell again and again to multiple clients.</p>
                                    </div>
                                </figure>
                            </div>
                            <div class="col-sm-6 col-12">
                                <figure>
                                    <div class="ps-block--icon"><i class="icon-bubbles"></i>
                                        <h5>24/7 dedicated support</h5>
                                        <p>Our supporters alway 24/7 to help you anythings</p>
                                    </div>
                                </figure>
                            </div>
                        </div>
                        <div class="ps-section__footer"><a class="ps-btn" href="https://videobooks.zocarro.com/videobook/Web/mentor/">Become A Mentor</a></div>
                    </div>
                </div>
            </div>
        </section>
        <!--<section class="ps-home-blog">-->
        <!--    <div class="container-fluid">-->
        <!--        <div class="ps-section__content">-->
        <!--            <div class="row">-->
        <!--                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 ">-->
        <!--                    <div class="ps-post">-->
        <!--                        <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="blog-detail.html"></a><img src="../img/home/home-photo/blog-1.jpg" alt=""></div>-->
        <!--                        <div class="ps-post__content"><a class="ps-post__meta" href="#">Review Product</a><a class="ps-post__title" href="#">Harman Kadon Onyx Studio Mini, Reviews & Experiences</a>-->
        <!--                            <p>December 17, 2018 by<a href="#"> Admin</a></p>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 ">-->
        <!--                    <div class="ps-post">-->
        <!--                        <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="blog-detail.html"></a><img src="../img/home/home-photo/blog-2.jpg" alt=""></div>-->
        <!--                        <div class="ps-post__content"><a class="ps-post__meta" href="#">Tips & Tricks</a><a class="ps-post__title" href="#">B&O Play - Best Headphone For You</a>-->
        <!--                            <p>December 17, 2019 by<a href="#"> Drfuri</a></p>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 ">-->
        <!--                    <div class="ps-post">-->
        <!--                        <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="blog-detail.html"></a><img src="../img/home/home-photo/blog-3.jpg" alt=""></div>-->
        <!--                        <div class="ps-post__content"><a class="ps-post__meta" href="#">Review Product</a><a class="ps-post__title" href="#">Experience Great Sound With Beats’sHeadphone</a>-->
        <!--                            <p>Jul 09th, 2019 by<a href="#"> LoganCee</a></p>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 ">-->
        <!--                    <div class="ps-post">-->
        <!--                        <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="blog-detail.html"></a><img src="../img/home/home-photo/blog-3.jpg" alt=""></div>-->
        <!--                        <div class="ps-post__content"><a class="ps-post__meta" href="#">Review Product</a><a class="ps-post__title" href="#">Experience Great Sound With Beats’sHeadphone</a>-->
        <!--                            <p>Jul 09th, 2019 by<a href="#"> LoganCee</a></p>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</section>-->
        <!--<section class="ps-home-brands">-->
        <!--    <div class="container-fluid">-->
        <!--        <div class="ps-section__header">-->
        <!--            <h3>MartFury connects 22+ million <br> creators to the world's leading visual brands</h3>-->
        <!--        </div>-->
        <!--        <div class="ps-section__content"><a href="#"><img src="../img/home/home-photo/brand-1.png" alt=""></a><a href="#"><img src="../img/home/home-photo/brand-2.png" alt=""></a><a href="#"><img src="../img/home/home-photo/brand-3.png" alt=""></a><a href="#"><img src="../img/home/home-photo/brand-4.png" alt=""></a><a href="#"><img src="../img/home/home-photo/brand-5.png" alt=""></a><a href="#"><img src="../img/home/home-photo/brand-6.png" alt=""></a><a href="#"><img src="../img/home/home-photo/brand-7.png" alt=""></a></div>-->
        <!--    </div>-->
        <!--</section>-->
        
        <!-- Modal -->
                                            
                <div class="modal fade" id="Modal" role="dialog">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                    <h4>View Subject</h4>
                    <button type="button" class="close" style="font-size:25pt;" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                            <div class="modal-body" style="font-size:13pt;">
                            
                                <input type="hidden" name="courseid" id="courseid" class="" readonly>
                                
                                    <div class="row">
                                        <div class="col-md-5">Subject Name</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><input type="text" name="vcname" id="vcname" class="" style="background-color:transparent;" disabled></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Subject Price</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><input type="text" name="vcprice" id="vcprice" class="" style="background-color:transparent;" disabled></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Subject Plan Duration</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><input type="text" name="vcpd" id="vcpd" class="" style="background-color:transparent;" disabled></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Subject Description</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><textarea style="border: none; overflow: auto; outline: none; -webkit-box-shadow: none; -moz-box-shadow: none; box-shadow: none; resize: none; background-color:transparent;" class="" name="vcdes" id="vcdes" disabled></textarea></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Subject Start Date</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><input type="text" name="vcsdate" id="vcsdate" class="" style="background-color:transparent;" disabled></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Subject End Date</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><input type="text" name="vcedate" id="vcedate" class="" style="background-color:transparent;" disabled></div>
                                    </div>
                                    
    
                            
                            <div class="modal-footer">
                                <button type="reset" name="reset" id="reset" value="reset" class="ps-btn" data-dismiss="modal">Close</button>
                            </div>
                </div>
                
            </div>
            </div>
        </div>
        
<!-- *************************************
                 Footer Start
    ******************************************-->

        <?php
        include_once("design/footer.php");
        ?>
        
    <!-- *************************************
                 Footer End
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
    <script src="ajax/toastr/toastr.min.js"></script>
        <script>
        $(document).ready(function() {

    $(document).on('click', '.viewcourse', function(e) {

        $('#Modal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#courseid').val(data[0]);
        $('#vcname').val(data[1]);
        $('#vcprice').val(data[2]);
        $('#vcpd').val(data[3]);
        $('#vcdes').val(data[4]);
        $('#vcsdate').val(data[5]);
        $('#vcedate').val(data[6]);
    });

});
    </script>
    
    <!-- Graph JavaScript -->
    
    
        <script type="text/javascript">
var chart = AmCharts.makeChart("chartdiv", {
  "type": "serial",
  "startDuration": 2,
  "dataProvider": [{
    "country": "Mentors",
    "visits": <?=$creators;?>,
    "color": "#FF0F00"
  }, {
    "country": "Users",
    "visits": <?=$users;?>,
    "color": "#FF6600"
  }, {
    "country": "University",
    "visits": <?=$university;?>,
    "color": "#FF9E01"
  }, {
    "country": "Stream",
    "visits": <?=$stream;?>,
    "color": "#FCD202"
  }, {
    "country": "Program",
    "visits": <?=$program;?>,
    "color": "#F8FF01"
  }, {
    "country": "Branches",
    "visits": <?=$branch;?>,
    "color": "#B0DE09"
  }, {
    "country": "Subjects",
    "visits": <?=$subject;?>,
    "color": "#04D215"
  }],
  "valueAxes": [{
    "position": "left",
    "axisAlpha": 0,
    "gridAlpha": 0
  }],
  "graphs": [{
    "balloonText": "[[category]]: <b>[[value]]</b>",
    "colorField": "color",
    "fillAlphas": 0.85,
    "lineAlpha": 0.1,
    "type": "column",
    "topRadius": 1,
    "valueField": "visits"
  }],
  "depth3D": 40,
  "angle": 30,
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "country",
  "categoryAxis": {
    "gridPosition": "start",
    "axisAlpha": 0,
    "gridAlpha": 0

  },
  "exportConfig": {
    "menuTop": "20px",
    "menuRight": "20px",
    "menuItems": [{
      "icon": '/lib/3/images/export.png',
      "format": 'png'
    }]
  }
}, 0);

jQuery('.chart-input').off().on('input change', function() {
  var property = jQuery(this).data('property');
  var target = chart;
  chart.startDuration = 0;

  if (property == 'topRadius') {
    target = chart.graphs[0];
  }

  target[property] = this.value;
  chart.validateNow();
});

</script>

</body>

</html>