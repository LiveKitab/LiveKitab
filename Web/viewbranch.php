<?php
    
    if(isset($_GET['qsearch']))
    {
        include_once("db/connect.php");
        
        $qsearch = mysqli_real_escape_string($con,$_GET['qsearch']);
        $qsearch = base64_decode($qsearch);
        
        $cmd="select * from branch_data where id='$qsearch' limit 1";
        $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
        while($row=mysqli_fetch_array($result))
        {
            $b_id=$row['b_id'];
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
    <link rel ="icon" href="img/icons/favicon.png" type = "image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700&amp;amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/Linearicons/Linearicons/Font/demo-files/demo.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/owl-carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="plugins/owl-carousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="plugins/slick/slick/slick.css">
    <link rel="stylesheet" href="plugins/nouislider/nouislider.min.css">
    <link rel="stylesheet" href="plugins/lightGallery-master/dist/css/lightgallery.min.css">
    <link rel="stylesheet" href="plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css">
    <link rel="stylesheet" href="plugins/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/home-photo.css">
    <style>
    a:hover{
        color:#c81919 !important;
    }
    </style>
</head>

<body>
    
    <!-- *************************************
                 Main Header
    ******************************************-->
    <header class="header header--photo" data-sticky="true">
        <?php
        include("assets/topnavbar.php");
        ?>
    </header>
    
    <!-- *************************************
                 Main Header End
    ******************************************-->
    
    <!-- *************************************
                 Mobile Menu
    ******************************************-->
    
    <?php
    include("assets/mobilenav.php");
    ?>
    
    <!-- *************************************
                 Mobile Menu End
    ******************************************-->
    

    <main id="homepage-photo">
        <div class="ps-home-search bg--cover" data-background="img/home/home-photo/banner.jpg">
            <div class="ps-section__wrapper">
                <div class="ps-section__header">
                    <p><strong>171,484,880</strong> Educational videos & more then <strong>171 Subject</strong></p>
                    <h3>The Educational Video Platform <br/> Subject and video thats You needs.</h3>
                </div>
            </div>
            <h5>Created By <a href="https://www.zocarro.net"> Encender</a></h5>
        </div>
        <div class="ps-home-media">
            <div class="ps-section__header">
                <ul class="ps-list">
                    <?php
              $cmd="select * from branch_data where b_id='$b_id' limit 1";
              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
              while($row=mysqli_fetch_array($result))
              {     
                  ?>
                    <li><a><?php echo $row['b_name']; ?></a></li>
            <?php
                }
            ?>
                </ul>
            </div>
            <div class="ps-section__content">
                <div class="masonry-wrapper" data-col-lg="4" data-col-md="3" data-col-sm="2" data-col-xs="1" data-gap="30" data-radio="100%">
                    <div class="ps-masonry">
                        <div class="grid-sizer"></div>
                        <div class="grid-item">
                            <div class="grid-item__content-wrapper">
                                <div class="ps-block--top-photographer bg--cover" data-background="img/home/home-photo/popular-bg.jpg" style="min-height: 660px;">
                                    <div class="ps-block__header">
                                        <p>Leaderboard Last 30 Days</p>
                                        <h3>New Mentors</h3>
                                    </div>
                                    <div class="ps-block__content">
                                        <?php
                                          $cmd="select * from creator_data order by id desc LIMIT 4";
                                          $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
                                          while($row=mysqli_fetch_array($result))
                                          {     
                                              ?>
                                                <div class="ps-block__author">
                                                    <div class="ps-block__author-thumbnail"><img src="src/creator/<?php echo $row['c_img']; ?>" alt=""></div>
                                                    <figure><a><?php echo $row['c_name']; ?></a>
                                                        <p><?php echo $row['c_fname'].' '.$row['c_lname']; ?></p>
                                                        <p><?php echo $row['c_cno']; ?></p>
                                                    </figure>
                                                </div>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <table class="table table-borderless">
                            <tbody>
                        <?php
                            $cmd="select * from course_data where b_id='$b_id' order by id desc";
                            $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
                            while($row=mysqli_fetch_array($result))
                            {     
                                  $courseindex=$row['id'];
                                  $course_name=$row['course_name'];
                                  $course_price=$row['course_price'];
                                  $course_plan_duration=$row['course_plan_duration'];
                                  $course_booklet=$row['course_booklet'];
                                  $course_sdate=$row['course_sdate'];
                                  $course_edate=$row['course_edate'];
                                  $course_status=$row['course_status'];
                                  $course_apprrej=$row['course_apprrej'];
                                  $course_des=$row['course_des'];
                                  $course_booklet=$row['course_booklet'];
                                  $course_video_limit=$row['course_video_limit'];
                  ?>
                                <tr>
                                    <td style="display:none;"><?php echo $courseindex; ?></td>
                                    <td style="display:none;"><?php echo $course_name; ?></td>
                                    <td style="display:none;"><?php echo $course_price; ?></td>
                                    <td style="display:none;"><?php echo $course_plan_duration; ?></td>
                                    <td style="display:none;"><?php echo $course_des; ?></td>
                                    <td style="display:none;"><?php echo $course_sdate; ?></td>
                                    <td style="display:none;"><?php echo $course_edate; ?></td>
                                    <td>
                                    <div class="grid-item">
                                        <div class="grid-item__content-wrapper">
                                            <div class="ps-product--photo"><a><img src="src/course/<?php echo $row['course_bg']; ?>" alt=""></a>
                                                <div class="ps-product__content"><a><span><?php echo $row['course_name']; ?></span></a>
                                                        <ul class="ps-product__actions">
                                                        <li><a class="viewcourse" title="Quick View" style="cursor:pointer;"><i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                    </tr>
                                    

                                <?php
                            }
                            
                            
                        ?>
                        </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>

        
        <!---- -->
        <section class="ps-home-share-work">
            <div class="container-fluid">
                <div class="ps-section__header">
                    <p>Join My Video Book Community</p>
                    <h3>Share your work and start earning</h3>
                </div>
                <div class="ps-section__content">
                    <div class="ps-section__left"><img src="img/home/home-photo/share-work.png" alt=""></div>
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
        
        <footer class="ps-footer ps-footer--photo">
            <div class="container-fluid">
                <div class="ps-footer__wrapper">
                    <div class="ps-footer__left">
                        <aside class="widget widget_footer">
                            <h4 class="widget-title">Contact us</h4>
                            <div class="ps-site-info">
                                <p>Call us 24/7</p>
                                <h5>1800 97 97 59</h5>
                                <p>502 New Design Str, Melbourne, Australia <br/><a>contact@martfury.com</a></p>
                                <!--<ul class="ps-list--social">-->
                                <!--    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>-->
                                <!--    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>-->
                                <!--    <li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>-->
                                <!--    <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>-->
                                <!--</ul>-->
                            </div>
                        </aside>
                    </div>
                    <div class="ps-footer__content">
                        <div class="row">
                            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 ">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 ">
                                        <aside class="widget widget_footer">
                                            <h4 class="widget-title">Company</h4>
                                            <ul class="ps-list--link">
                                                <li><a href="about-us.html">About Us</a></li>
                                                <li><a href="contact.html">Contact</a></li>
                                            </ul>
                                        </aside>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 ">
                                        <aside class="widget widget_footer">
                                            <h4 class="widget-title">Vendor</h4>
                                            <ul class="ps-list--link">
                                                <li><a href="../mentor/">Mentor</a></li>
                                                <li><a href="../publisher/">Publisher</a></li>
                                            </ul>
                                        </aside>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 ">
                                <aside class="widget widget_newletters widget_footer">
                                    <h4 class="widget-title">Newsletter</h4>
                                    <p>Register now to get updates on promotions & coupons</p>
                                    <form class="ps-form--newletter" method="get">
                                        <div class="form-group--nest">
                                            <input class="form-control" type="text" placeholder="Email Address">
                                            <button class="ps-btn">Subscribe</button>
                                        </div>
                                    </form>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ps-footer__copyright">
                    <p>© 2020 My Video Book. All Rights Reserved</p>
                    <!--<p><span>We Using Safe Payment For:</span><a href="#"><img src="img/payment-method/1.jpg" alt=""></a><a href="#"><img src="img/payment-method/2.jpg" alt=""></a><a href="#"><img src="img/payment-method/3.jpg" alt=""></a><a href="#"><img src="img/payment-method/4.jpg" alt=""></a><a href="#"><img src="img/payment-method/5.jpg" alt=""></a></p>-->
                </div>
            </div>
        </footer>
    </main>
    <div id="back2top"><i class="pe-7s-angle-up"></i></div>
    <div class="ps-site-overlay"></div>
    <script src="plugins/jquery.min.js"></script>
    <script src="plugins/nouislider/nouislider.min.js"></script>
    <script src="plugins/popper.min.js"></script>
    <script src="plugins/owl-carousel/owl.carousel.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/imagesloaded.pkgd.min.js"></script>
    <script src="plugins/masonry.pkgd.min.js"></script>
    <script src="plugins/isotope.pkgd.min.js"></script>
    <script src="plugins/jquery.matchHeight-min.js"></script>
    <script src="plugins/slick/slick/slick.min.js"></script>
    <script src="plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
    <script src="plugins/slick-animation.min.js"></script>
    <script src="plugins/lightGallery-master/dist/js/lightgallery-all.min.js"></script>
    <script src="plugins/sticky-sidebar/dist/sticky-sidebar.min.js"></script>
    <script src="plugins/select2/dist/js/select2.full.min.js"></script>
    <script src="plugins/gmap3.min.js"></script>
    <!-- custom scripts-->
    <script src="js/main.js"></script>
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
</body>

</html>
        <?php
        
    }
    else
    {
        header('location:index');
    }
?>