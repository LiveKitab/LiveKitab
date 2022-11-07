<?php
include_once("../db/pconnect.php");
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
        <div class="ps-home-media">
            <div class="ps-section__header" style="text-align: center; border-bottom: none; font-weight: 400; font-size: 24px; text-transform: uppercase;"
                    <h3>Available Subjects</h3>
                </div>
            <div class="ps-section__content">
                <div class="masonry-wrapper" data-col-lg="4" data-col-md="3" data-col-sm="2" data-col-xs="1" data-gap="30" data-radio="100%">
                    <div class="ps-masonry">
                        <div class="grid-sizer"></div>
                        <div class="grid-item">
                            <div class="grid-item__content-wrapper">
                                <!--<div class="ps-block--top-photographer bg--cover" data-background="../img/home/home-photo/popular-bg.jpg" style="min-height: 660px;">-->
                                <!--    <div class="ps-block__header">-->
                                <!--        <p>Leaderboard Last 30 Days</p>-->
                                <!--        <h3>New Mentors</h3>-->
                                <!--    </div>-->
                                <!--    <div class="ps-block__content">-->
                                        <?php
                                          $cmd="select * from creator_data order by id desc LIMIT 5";
                                          $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
                                          while($row=mysqli_fetch_array($result))
                                        //   {     
                                              ?>
                                                <!--<div class="ps-block__author">-->
                                                <!--    <div class="ps-block__author-thumbnail"><img src="../src/creator/<?php echo $row['c_img']; ?>" alt=""></div>-->
                                                <!--    <figure><a><?php echo $row['c_name']; ?></a>-->
                                                <!--        <p><?php echo $row['c_fname'].' '.$row['c_lname']; ?></p>-->
                                                <!--        <p><?php echo $row['c_cno']; ?></p>-->
                                                <!--    </figure>-->
                                                <!--</div> -->
                                        <?php
                                            //  }
                                        ?>
                                <!--    </div>-->
                                <!--</div>-->
                            </div>
                        </div>
                        
                        <table class="table table-borderless">
                            <tbody>
                        <?php
                            $cmd="select * from course_data order by id desc LIMIT 20";
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
                                            <div class="ps-product--photo"><a><img src="../src/course/<?php echo $row['course_bg']; ?>" alt=""></a>
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

        <div class="ps-home-promotions" style="padding-top: 10px; padding-bottom: 60px;">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 ">
                        <a class="ps-collection" href="#"><img src="../img/promotions/home-8/1.jpg" alt=""></a>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                        <a class="ps-collection" href="#"><img src="../img/promotions/home-8/2.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="ps-home-trending-products ps-section--furniture" style="padding-top: 10px; padding-bottom: 60px;">
            <div class="container">
                <div class="ps-section__header" style="text-align: center; border-bottom: none; font-weight: 400; font-size: 24px; text-transform: uppercase;"
                    <h3>Best Creators</h3>
                </div>
                <div class="ps-section__content">
                    <div class="ps-carousel--nav owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="5" data-owl-item-xs="2" data-owl-item-sm="3" data-owl-item-md="3" data-owl-item-lg="4"
                        data-owl-duration="1000" data-owl-mousedrag="on">
                        <?php
                                          $cmd="select * from creator_data order by id desc LIMIT 5";
                                          $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
                                          while($row=mysqli_fetch_array($result))
                                          {   
                                              $name=$row['c_name'];
                                              $c_ext = substr($name, 0, 1);
                                              $c_ext = strtoupper($c_ext);		
                                    	      
                                              ?>
                                                <div class="ps-product" style="border:none;">
                            <div class="ps-product__thumbnail">
                                <a href=""><img src="../src/creator/<?=$c_ext?>.png" alt=""></a>
                            </div>
                            <div class="ps-product__container">
                                <h4><center><?php echo $row['c_name'].' '.$row['c_lname']; ?></center></h4>
                                                        
                            </div>
                        </div>
                                        <?php
                                            }
                                        ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="ps-home-categories ps-section--furniture">
            <div class="container">
                <div class="ps-section__header" style="text-align: center; border-bottom: none; font-weight: 400; font-size: 24px; text-transform: uppercase; margin-bottom: 0px;"
                    <h3>Subjects By Branch</h3>
                </div>
                <div class="ps-section__content">
                    <div class="row">
                        <?php
              $cmd="select * from branch_data order by id asc LIMIT 12";
              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
              while($rows=mysqli_fetch_array($result))
              {  
                  $b_id=$rows['b_id'];
                  
                  ?>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 ">
                            <div class="ps-block--category">
                                <a href="" data-toggle="modal" data-target="#xyz<?php echo $rows['id'] ?>"></a><img src="../src/branch/<?=$rows['b_bg'];?>" alt="" height="150px" width="168px">
                                <p><?=$rows['b_name'];?></p>
                            </div>
                        </div>
                        
                        <!-- Modal -->
                        
                        <div class="modal fade" id="xyz<?php echo $rows['id'] ?>" role="dialog">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                    <h5>View Package Details</h5>
                    <button type="button" class="close" style="font-size:20pt;" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                            <div class="modal-body">
                            
                                
                                    <div class="row">
                                        <div class="col-md-5">Branch Name</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?=$rows['b_name'];?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Subjects in Branch</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5">
                                    <?php
                                    $sel="select * from course_data where b_id='$b_id' LIMIT 10";
                  $run=mysqli_query($con,$sel);
                  if(mysqli_num_rows($run)>0)
                  {
                  while($row4=mysqli_fetch_array($run))
                  {
                      $coursename=$row4['course_name'];
                      ?>
                      
                                        <?=$coursename;?>
                                    
                      <?php
                  }
                  }
                  else
                  {
                      echo 'No Course Found';
                  }
                  ?>
                                    </div>
                                     </div>
                                    <!--<div class="row">-->
                                    <!--    <div class="col-md-5">Package Discount</div>-->
                                    <!--    <div class="col-md-1">:</div>-->
                                    <!--    <div class="col-md-5"><?=$col['dis'];?></div>-->
                                    <!--</div>-->
                                    <!--<div class="row">-->
                                    <!--    <div class="col-md-5">Package Description</div>-->
                                    <!--    <div class="col-md-1">:</div>-->
                                    <!--    <div class="col-md-5"><?=$col['descr'];?></div>-->
                                    <!--</div>-->
                                    
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
        </div>
        
        <div class="ps-home-promotion-2" style="padding-top: 10px; padding-bottom: 60px;">
            <div class="container">
                <a href="#"><img src="../img/promotions/home-8/3.jpg" alt=""></a>
            </div>
        </div>
        
        <div class="ps-section--furniture ps-home-shop-by-room" style="margin-bottom:20px;">
            <div class="container">
                <div class="ps-section__header" style="text-align: center; border-bottom: none; font-weight: 400; font-size: 24px; text-transform: uppercase; padding-bottom: 20px;"
                    <h3>Combo Offers (Pacages)</h3>
                </div>
                <div class="ps-section__content">
                    <div class="row">
                        <?php
                        $sel="select * from package";
                        $run=mysqli_query($con,$sel);
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
    <script src="ajax/newsletter.js"></script>
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

</body>

</html>