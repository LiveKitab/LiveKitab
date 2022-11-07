<?php
include_once("../db/pconnect.php");
include_once("back/function/session.php");
if(isset($_GET['astringdata']))
	{
	    $course_id = mysqli_real_escape_string($con,$_GET['astringdata']);
	    $course_id = base64_decode($course_id);
	    
	    $cmd3="select * from course_data where course_id='$course_id'";
        $result3=mysqli_query($con,$cmd3) or die(mysqli_error($con));
        while($row=mysqli_fetch_array($result3))
        {
            $subcode=$row['sub_code'];
            $course_name=$row['course_name'];
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
    <style>
        .loader
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
        <div class="container">
            <div class="ps-product--detail ps-product--box">

                <div class="ps-product__content ps-tab-root">
                    <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="dash">Home</a></li>
                    <li>Subject Name:<a href="complete"><?php echo $course_name; ?></a>&nbsp;&nbsp;Subject Code:<a href="complete"><?php echo $subcode; ?></a></li>
                    <li>Subject-Video Analysis</li>
                </ul>
            </div>
        </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 " style="margin-bottom:30px;">
                            <div class="ps-product__box">
                                <ul class="ps-tab-list">
                                    <li class="active"><a href="#tab-1">Subject Analysis</a></li>
                                    <li><a href="#tab-2">Video Analysis</a></li>
                                </ul>
                                <div class="ps-tabs">
                                    <div class="ps-tab active" id="tab-1">
                                        <div class="ps-document">
                                            <?php 
                                                 $cmd="select * from course_data where e_id='$e_id' and course_id='$course_id'";
                                                 $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
                                                 while($row=mysqli_fetch_array($result))
                                                 {
                                                     $nsubs=0;
                                                   $stream_id=$row['stream_id'];
                                                   $pr_id=$row['pr_id'];
                                                   $b_id=$row['b_id'];
                                                   $term_id=$row['term_id'];
                                                   $e_id=$row['e_id'];
                                                   $c_id=$row['c_id'];
                                                   $course_dis=$row['course_dis'];
                                                   $course_name=$row['course_name'];
                                                   $course_price=$row['course_price'];
                                                   $course_des=$row['course_des'];
                                                   $course_plan_duration=$row['course_plan_duration'];
                                                   $upvote=$row['upvote'];
                                                   $downvote=$row['downvote'];
                                                   
                                                   $cmd="select * from stream_data where stream_id='$stream_id' limit 1";
                                                    $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
                                                    while($row=mysqli_fetch_array($result))
                                                    {
                                                        $uni=$row['uni'];
                                                        $stream_name=$row['stream_name'];
                                                    }
                                                    
                                                    $cmd="select * from program_data where pr_id='$pr_id' limit 1";
                                                    $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
                                                    while($row=mysqli_fetch_array($result))
                                                    {
                                                        $program_name=$row['program_name'];
                                                    }
                                                    
                                                    $cmd="select * from branch_data where b_id='$b_id' limit 1";
                                                    $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
                                                    while($row=mysqli_fetch_array($result))
                                                    {
                                                        $b_name=$row['b_name'];
                                                    }
                                                    
                                                    $cmd="select * from term_data where term_id='$term_id' limit 1";
                                                    $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
                                                    while($row=mysqli_fetch_array($result))
                                                    {
                                                        $med=$row['med'];
                                                        $term_name=$row['term_name'];
                                                    }
                                                    
                                                    $cmd="select * from creator_data where c_id='$c_id' limit 1";
                                                    $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
                                                    while($row=mysqli_fetch_array($result))
                                                    {
                                                        $cname=$row['c_name'].' '.$row['c_fname'].' '.$row['c_lname'];
                                                    }
                                                    
                                                    $cmd="select * from editor_data where e_id='$e_id' limit 1";
                                                    $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
                                                    while($row=mysqli_fetch_array($result))
                                                    {
                                                        $e_name=$row['e_name'];
                                                    }
                                                    
                                                    $cmd2="select purchased_courses.id from purchased_courses,course_data where purchased_courses.course_id=course_data.course_id and course_data.c_id='$c_id' and course_data.course_id='$course_id'";
                                                      $result2=mysqli_query($con,$cmd2) or die(mysqli_error($con));
                                                      while($row2=mysqli_fetch_array($result2))
                                                      {
                                                        $nsubs=$nsubs+1;    
                                                      }
                                                    
                                                 }
                                            ?>  
                                            <div class="row">
                                              <div class="col-sm-12">
                                                <div class="card">
                                                  <div class="card-body">
                                                      <div class="table-responsive">
                                                      <table class="ps-table ps-table--vendor-status" style="width:100%;">
                                                          <tr>
                                                              <td>University</td>
                                                              <td><?php echo $uni; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td>Stream</td>
                                                              <td><?php echo $stream_name; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td>Program</td>
                                                              <td><?php echo $program_name; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td>Branch</td>
                                                              <td><?php echo $b_name; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td>Medium</td>
                                                              <td><?php echo $med; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td>Semester</td>
                                                              <td><?php echo $term_name; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td>Subject</td>
                                                              <td><?php echo $course_name; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td>Mentor</td>
                                                              <td><?php echo $cname; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td>Publisher</td>
                                                              <td><?php echo $e_name; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td>Description</td>
                                                              <td><p class="text-justify"><?php echo $course_des; ?></p></td>
                                                          </tr>
                                                          <tr>
                                                              <td>Subject Duration</td>
                                                              <td><?php echo $course_plan_duration.' Hours'; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td>Number of Subscriber</td>
                                                              <td><?php echo $nsubs; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td>Price</td>
                                                              <td><?php echo $course_price. 'Rs/-'; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td>Discount</td>
                                                              <td><?php echo $course_dis. '%'; ?></td>
                                                          </tr>
                                                      </table>
                                                      </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="ps-tab" id="tab-2">
                                        <div class="ps-document">
                                            
                                            <div class="table-responsive">
                                                <table id="load" class="table table-hover table-bordered zero-configuration" style="width:100%;">
                                                  <thead class="thead-dark" align="center">
                                                    <tr>
                                                        <th style="display:none;">id</th>
                                                        <th style="display:none;">Index</th>
                                                        <th>Video Sequence</th>
                                                        <th>Title</th>
                                                        <th>Chapter Name</th>
                                                        <th>Status</th>
                                                        <th>View</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody align="center">
                                                    <?php
                                                  $count = 0; 
                                                  $cmd="select * from final_video where e_id='$e_id' and course_id='$course_id' ORDER BY sequence ASC";
                                                  $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
                                                  while($row=mysqli_fetch_array($result))
                                                  {     
                                                      $id=$row['id'];
                                                      $course_id=$row['course_id'];
                                                      $v_title=$row['v_title'];
                                                      $v_link1=$row['v_link'];
                                                      $v_des=$row['v_des'];
                                                      $v_status=$row['v_status'];
                                                      $v_id=$row['v_id'];
                                                      $v_id = base64_encode($v_id);
                                                      $chname = $row['ch_name'];
                                                      $sequence=$row['sequence'];
                                                     
                                                  ?>
                                                    <tr id="delete<?php echo $row['id'] ?>" class="showmodal" >
                                                        <td style="display:none;"><?php echo $id; ?></td>
                                                        <td style="display:none;"><?php echo $count = $count + 1; ?></td>
                                                        <td><?php echo $sequence;?></td>
                                                        <td><?php echo $v_title;?></td>
                                                        <td><?=$chname;?></td>
                                                        <td>
                                                            <?php
                                                                if($v_status === '0')
                                                                {
                                                                    echo'<p style="color:orange">Under Editing</p>';
                                                                }
                                                                elseif($v_status === '1')
                                                                {
                                                                    echo'<p style="color:green">On Platform</p>';
                                                                }
                                                                elseif($v_status === '2')
                                                                {
                                                                    echo'<p style="color:red">Off Platform</p>';
                                                                }
                                                            ?>
                                                        </td>
                                                         <td>
                                                             <?php
                                                                if($v_status === '0')
                                                                {
                                                                    ?>
                                                                        <a type="button" class="ps-btn"><i class="fa fa-eye"></i></a>
                                                                    <?php
                                                                }
                                                                else
                                                                {
                                                                    ?>
                                                                        <a type="button" href="analysisdatavideo?videostringdata=<?php echo $v_id; ?>" class="ps-btn"><i class="icon-eye"></i></a>        
                                                                    <?php
                                                                }
                                                             ?>
                                                            
                                                         </td>
                                                      </tr>
                                                  <?php
                                                }
                                                ?>
                                                  </tbody>
                                                  <tfoot align="center" class="thead">
                                                    <tr>
                                                       <th style="display:none;">id</th>
                                                        <th style="display:none;">Index</th>
                                                        <th>Video Sequence</th>
                                                        <th>Title</th>
                                                        <th>Chapter Name</th>
                                                        <th>Status</th>
                                                        <th>View</th>
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
	<script src="datatable/jquery.dataTables.min.js"></script>
    <script src="datatable/dataTables.bootstrap4.min.js"></script>
    <script src="datatable/datatable-basic.min.js"></script>
    <script>
    $('#load').dataTable( {
  "ordering": false
} );    
    </script>
</body>

</html>
<?php
}
?>