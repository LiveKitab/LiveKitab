<?php
include_once("../db/connect.php");
include_once("back/function/session.php");

if(isset($_GET['stringdata']))
	{
	    $c_id = mysqli_real_escape_string($con,$_GET['stringdata']);
	    $c_id = base64_decode($c_id);
	    $sel="select * from creator_data where c_id='$c_id'";
	    $run=mysqli_query($con,$sel);
	    while($col=mysqli_fetch_array($run))
	    {
	        $c_name=$col['c_name'];
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
    <style>
        .loader
        {
            display:none;
        }
        .loader1
        {
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
                    <li>Mentor Name: <a href="selectmentor"><?=$c_name;?></a></li>
                    <li>Account</li>
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
                                    <li class="active"><a href="#tab-1">Account & Analysis</a></li>
                                    <!--<li class=""><a href="#tab-2">Payment Histroy</a></li>-->
                                </ul>
                                <div class="ps-tabs">
                                    <div class="ps-tab active" id="tab-1">
                                        <div class="ps-document">
                                            <div class="table-responsive">
            <table id="load" class="table table-hover table-bordered zero-configuration">
              <thead class="thead-dark" align="center">
                <tr>
                  <th style="display:none;">Index</th>
                    <th style="display:none;">Mentor ID</th>
                    <th style="display:none;">Course ID</th>
                    <th>Index</th>
                    <th>Subject Name</th>
                    <th>Subject Code</th>
                    <th>No of Subscriber</th>
                    <th>Subject Price</th>
                    <th style="display:none;">Number of Video</th>
                    <th style="display:none;">Number of Likes</th>
                    <th>Mentor Percentage</th>
                    <th>Pay</th>
                    <th style="display:none;">University</th>                    
                    <th style="display:none;">Stream</th>
                    <th style="display:none;">Program</th>
                    <th style="display:none;">Branch</th>
                    <th style="display:none;">Medium</th>
                    <th style="display:none;">Semester</th>
                </tr>
              </thead>
              <tbody align="center">
                <?php
            $count = 0; 
            
            $nvideo = 0;
            $nlike = 0;
              $cmd1="select * from course_data where c_id='$c_id'";
              $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
              while($row1=mysqli_fetch_array($result1))
              {
                $nsubs = 0;
                $count=$count+1;
                $index=$row1['id'];
                $course_id=$row1['course_id'];
                $course_name=$row1['course_name'];
                $course_price=$row1['course_price'];
                $subcode=$row1['sub_code'];
                $stream_id=$row1['stream_id'];
                $pr_id=$row1['pr_id'];
                $b_id=$row1['b_id'];
                $term_id=$row1['term_id'];
              
              $cmd2="select purchased_courses.id from purchased_courses,course_data where purchased_courses.course_id=course_data.course_id and course_data.c_id='$c_id' and course_data.course_id='$course_id'";
              $result2=mysqli_query($con,$cmd2) or die(mysqli_error($con));
              while($row2=mysqli_fetch_array($result2))
              {
                $nsubs=$nsubs+1;    
              }
              
              
            $cmd3="select id from final_video where c_id='$c_id'";
            $result3=mysqli_query($con,$cmd3) or die(mysqli_error($con));
            while($row3=mysqli_fetch_array($result3))
            {
                $nvideo=$nvideo+1;
            }
                                                 
            $cmd4="select * from video_like_dislike,course_data where video_like_dislike.course_id=course_data.course_id and course_data.c_id='$c_id' and video_like_dislike.ld_status='1'";
            $result4=mysqli_query($con,$cmd4) or die(mysqli_error($con));
            while($row4=mysqli_fetch_array($result4))
            {
                $nlike=$nlike+1;
            }    
            
              $cmd5="select * from stream_data where stream_id = '$stream_id'";
              $result5=mysqli_query($con,$cmd5) or die(mysqli_error($con));
              while($row5=mysqli_fetch_array($result5))
              {
                  $stream_name=$row5['stream_name'];
                  $uni=$row5['uni'];
              }
                  
                  $cmd6="select * from program_data where pr_id = '$pr_id'";
              $result6=mysqli_query($con,$cmd6) or die(mysqli_error($con));
              while($row6=mysqli_fetch_array($result6))
              {
                  $pr_id=$row6['program_name'];
              }
                  
                  $cmd7="select * from branch_data where b_id = '$b_id'";
              $result7=mysqli_query($con,$cmd7) or die(mysqli_error($con));
              while($row7=mysqli_fetch_array($result7))
              {
                  $b_id=$row7['b_name'];
              }
              
              $cmd8="select * from term_data where term_id = '$term_id'";
              $result8=mysqli_query($con,$cmd8) or die(mysqli_error($con));
              while($row8=mysqli_fetch_array($result8))
              {
                  $term_name=$row8['term_name'];
                  $med=$row8['med'];
              }
              
              $status = 0;
              $cmd9="select c_per from account_admin where c_id ='$c_id' and course_id='$course_id' limit 1";
              $result9=mysqli_query($con,$cmd9) or die(mysqli_error($con));
              if($result9->num_rows>0)
              {
                  $status = 1;
                  while($row9=mysqli_fetch_array($result9))
                  {
                      $per=$row9['c_per'];
                  }   
              }
              else
              {
                  $status = 0;
                  $per='Not Set Yet';
              }
              
              $status1 = 0;
              $cmd10="select mid,m_key from creator_data where c_id ='$c_id' limit 1";
              $result10=mysqli_query($con,$cmd10) or die(mysqli_error($con));
              if($result10->num_rows>0)
              {
                  while($row10=mysqli_fetch_array($result10))
                  {
                      $mid=$row10['mid'];
                      $m_key=$row10['m_key'];
                      
                      if($mid == 'Not Set' || $m_key == 'Not Set')
                      {
                          $status1 = 0;
                      }
                      else
                      {
                          $status1 = 1;
                      }
                  }   
              }
              else
              {
                  $status1 = 0;
              }
              ?>
                <tr>
                    <td style="display:none;"><?php echo $index; ?></td>
                    <td style="display:none;"><?php echo $c_id; ?></td>
                    <td style="display:none;"><?php echo $course_id; ?></td>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $course_name; ?></td>
                    <td><?php echo $subcode; ?></td>
                    <td><?php echo $nsubs; ?></td>
                    <td><?php echo $course_price; ?></td>
                    <td style="display:none;"><?php echo $nvideo; ?></td>
                    <td style="display:none;"><?php echo $nlike; ?></td>
                    <?php
                    if($status == 1)
                    {
                        ?>
                        <td><?php echo $per; ?></td>
                        <?php
                    }
                    else
                    {
                        ?>
                        <td>
                        <button class="ps-btn addper" title="Enter Mentor Percentage" style="background-color:#28a745;">Percentage</button>             
                        </td>
                        <?php
                    }
                    ?>
                    <?php
                    if($status1 == 1 && $status == 1)
                    {
                        ?>
                    <td>
                        <a href="checkout?coursedata=<?=base64_encode($course_id);?>&creatordata=<?=base64_encode($c_id);?>" class="ps-btn" title="Pay">Pay</button>             
                    </td>
                    <?php
                    }
                    else
                    {
                        ?>
                            <td>
                                <a class="ps-btn" title="Pay" onclick="MyFunction()">Pay</button>             
                            </td>
                        <?php
                    }
                    ?>
                    <td style="display:none;"><?php echo $uni; ?></td>
                    <td style="display:none;"><?php echo $stream_name; ?></td>
                    <td style="display:none;"><?php echo $pr_id; ?></td>
                    <td style="display:none;"><?php echo $b_id; ?></td>
                    <td style="display:none;"><?php echo $med; ?></td>
                    <td style="display:none;"><?php echo $term_name; ?></td>
                  </tr>
              <?php
              include_once("back/modal/addmentorpercentage.php");
              include_once("back/modal/payment.php");
            }
            ?>
              </tbody>
              <tfoot align="center" class="thead">
                <tr>
                    <th style="display:none;">Index</th>
                    <th style="display:none;">Mentor ID</th>
                    <th style="display:none;">Course ID</th>
                    <th>Index</th>
                    <th>Subject Name</th>
                    <th>Subject Code</th>
                    <th>No of Subscriber</th>
                    <th>Subject Price</th>
                    <th style="display:none;">Number of Video</th>
                    <th style="display:none;">Number of Likes</th>
                    <th>Mentor Percentage</th>
                    <th>Pay</th>
                    <th style="display:none;">University</th>                    
                    <th style="display:none;">Stream</th>
                    <th style="display:none;">Program</th>
                    <th style="display:none;">Branch</th>
                    <th style="display:none;">Medium</th>
                    <th style="display:none;">Semester</th>
                </tr>
              </tfoot>
            </table>
          </div>
                                            
                                                  </div>
                                                </div>
                                                
                                                <div class="ps-tab" id="tab-2">
                                        <div class="ps-document">
                                            <div class="table-responsive">
            <table id="load1" class="table table-hover table-bordered zero-configuration">
              <thead class="thead-dark" align="center">
                <tr>
                    <th>Index</th>
                    <th>Mentor Name</th>                    
                    <th>Subject Name</th>
                    <th>No of Subscriber</th>
                    <th>Subject Price</th>
                    <th>Mentor Percentage</th>
                    <th>Payment Month</th>
                    <th>Payment Year</th>
                    <th>Payment Method</th>
                    <th>Transaction ID</th>
                    <th>Amount</th>
                    
                </tr>
              </thead>
              <tbody align="center">
                <?php
            $count1 = 0; 
            
              $cmd1="select * from creator_payment where c_id='$c_id'";
              $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
              while($row1=mysqli_fetch_array($result1))
              {
                $count1=$count1+1;
                $index=$row1['id'];
                $cs_id=$row1['course_id'];
                $amount=$row1['payment_amount'];
                $pm=$row1['payment_method'];
                $payment_month=$row1['payment_month'];
                $py=$row1['payment_year'];
                $pid=$row1['payment_id'];
                $status=$row1['status'];
                
              $cmd3="select * from course_data where course_id='$cs_id'";
              $result3=mysqli_query($con,$cmd3) or die(mysqli_error($con));
              while($row3=mysqli_fetch_array($result3))
              {
                $course_name1=$row3['course_name'];
                $course_price1=$row3['course_price'];
              }
              $per=0;
              $cmd4="select * from account_admin where course_id='$cs_id' and c_id='$c_id'";
              $result4=mysqli_query($con,$cmd4) or die(mysqli_error($con));
              while($row4=mysqli_fetch_array($result4))
              {
                $per=$row4['c_per'];
              }
              
              $nsubs1 = 0;
              $cmd2="select purchased_courses.id from purchased_courses,course_data where purchased_courses.course_id=course_data.course_id and course_data.c_id='$c_id' and course_data.course_id='$cs_id'";
              $result2=mysqli_query($con,$cmd2) or die(mysqli_error($con));
              while($row2=mysqli_fetch_array($result2))
              {
                $nsubs1=$nsubs1+1;    
              }

              ?>
                <tr>
                    
                    <td><?php echo $count1; ?></td>
                    <td><?php echo $c_name; ?></td>
                    <td><?php echo $course_name1; ?></td>
                    <td><?php echo $nsubs1; ?></td>
                    <td><?php echo $course_price1; ?></td>
                    <td><?php echo $per; ?></td>
                    <td><?php echo $payment_month; ?></td>
                    <td><?php echo $py; ?></td>
                    <td><?php echo $pm; ?></td>
                    <td><?php echo $pid; ?></td>
                    <td><?php echo $amount; ?></td>
    
                  </tr>
              <?php
            }
            ?>
              </tbody>
              <tfoot align="center" class="thead">
                <tr>
                    <th>Index</th>
                    <th>Mentor Name</th>                    
                    <th>Subject Name</th>
                    <th>No of Subscriber</th>
                    <th>Subject Price</th>
                    <th>Mentor Percentage</th>
                    <th>Payment Month</th>
                    <th>Payment Year</th>
                    <th>Payment Method</th>
                    <th>Transaction ID</th>
                    <th>Amount</th>
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
        
        
        
    
    
    <script src="../plugins/jquery-1.12.4.min.js"></script>
    <script src="../plugins/popper.min.js"></script>
    <script src="../plugins/owl-carousel/owl.carousel.min.js"></script>
    <script src="../plugins/bootstrap4/js/bootstrap.min.js"></script>
    <script src="../plugins/imagesloaded.pkgd.min.js"></script>
    <script src="../plugins/masonry.pkgd.min.js"></script>
    <script src="../plugins/isotope.pkgd.min.js"></script>
    <script src="../plugins/jquery.matchHeight-min.js"></script>
    <script src="../plugins/slick/slick/slick.min.js"></script>
    <script src="../plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
    <script src="../plugins/slick-animation.min.js"></script>
    <script src="../plugins/lightGallery-master/dist/js/lightgallery-all.min.js"></script>
    <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="../plugins/sticky-sidebar/dist/sticky-sidebar.min.js"></script>
    <script src="../plugins/jquery.slimscroll.min.js"></script>
    <script src="../plugins/select2/dist/js/select2.full.min.js"></script>
    <script src="../plugins/gmap3.min.js"></script>  
    <!-- Custom scripts-->
    <script src="../js/main.js"></script>
    <script src="ajax/toastr/toastr.min.js"></script>
    <script src="ajax/mentorpercentage.js"></script>
    <script src="ajax/sidebarsearch.js"></script>
    <script src="ajax/payment.js"></script>
	<script src="datatable/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/3.3.1/js/dataTables.fixedColumns.min.js"></script>
    <script src="datatable/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {

    $(document).on('click', '.addper', function(e) {

        $('#EditModal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#index').val(data[0]);
        $('#mentorid').val(data[1]);
        $('#course_id').val(data[2]);
        $('#m_name').val(data[4]);
        $('#c_name').val(data[5]);
        $('#c_price').val(data[7]);
        $('#video').val(data[8]);
        $('#subs').val(data[6]);
        $('#likes').val(data[9]);

    });

});
    </script>
    <script>
        $(document).ready(function() {

    $(document).on('click', '.payment', function(e) {

        $('#EditModal1').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#index1').val(data[0]);
        $('#c_id1').val(data[1]);
        $('#course_id1').val(data[2]);

    });

});
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
      table.column(12).search(searchTerms.join('|'), true, false, true).draw();
    });
    
    $('.filter-checkbox-stream').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox-stream'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      table.column(13).search(searchTerms.join('|'), true, false, true).draw();
    });
    
    $('.filter-checkbox-prog').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox-prog'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      table.column(14).search(searchTerms.join('|'), true, false, true).draw();
    });
    
    $('.filter-checkbox-branch').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox-branch'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      table.column(15).search(searchTerms.join('|'), true, false, true).draw();
    });
    
    $('.filter-checkbox-term').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox-term'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      table.column(17).search(searchTerms.join('|'), true, false, true).draw();
    });
    
    $('.filter-checkbox-med').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox-med'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      table.column(16).search(searchTerms.join('|'), true, false, true).draw();
    });
    
} );
    </script>
    <script>
    $('#load1').dataTable( {
  "ordering": false
} );    
    </script>
    <script>
              function MyFunction() {
                  toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          }
            toastr["warning"]("Mentor Percentage Not Set OR Mentor Payment Not Set","Warning")
            }
          </script>
    
</body>
</html>
<?php
}
?>