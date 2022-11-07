<?php
include_once("../db/connect.php");
include_once("back/function/session.php");
if(isset($_GET['astringdata']))
	{
	    $sub_id = mysqli_real_escape_string($con,$_GET['astringdata']);
	    $sub_id = base64_decode($sub_id);
	    
	    $cmd3="select * from subject_data where sub_id='$sub_id'";
        $result3=mysqli_query($con,$cmd3) or die(mysqli_error($con));
        while($row=mysqli_fetch_array($result3))
        {
            $subcode=$row['sub_code'];
            $course_name=$row['sub_name'];
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
                    <li>Subject Name:<a href="analysis"><?php echo $course_name; ?></a>&nbsp;&nbsp;Subject Code:<a href="analysis"><?php echo $subcode; ?></a></li>
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
                                    <li><a href="#tab-3">Enroll Students</a></li>
                                    <li><a href="#tab-4">Feedback</a></li>
                                </ul>
                                <div class="ps-tabs">
                                    <div class="ps-tab active" id="tab-1">
                                        <div class="ps-document">
                                            <?php 
                                                 $cmd="select * from subject_data where sub_id='$sub_id'";
                                                 $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
                                                 while($row=mysqli_fetch_array($result))
                                                 {
                                                     $nsubs=0;
                                                    $stream_id=$row['stream_id'];
                                                    $pr_id=$row['pr_id'];
                                                    $b_id=$row['b_id'];
                                                    $term_id=$row['term_id'];
                                                    $e_id=$row['e_id'];
                                                    $uni_id=$row['university_id'];
                                                    
                                                    
                                                    $cmd="select * from apply_for_subject where sub_id='$sub_id'";
                                                    $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
                                                    while($rows=mysqli_fetch_array($result))
                                                    {
                                                        $course_dis=$rows['discount'];
                                                        $course_name=$rows['sub_name'];
                                                        $course_price=$rows['price'];
                                                        $course_des=$rows['des'];
                                                        $course_plan_duration=$rows['sub_duration'];
                                                        $c_id=$rows['c_id'];
                                                    }
                                                    
                                                    // $upvote=$row['upvote'];
                                                    // $downvote=$row['downvote'];
                                                    
                                                    $cmd="select * from stream_data where stream_id='$stream_id' limit 1";
                                                    $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
                                                    while($row=mysqli_fetch_array($result))
                                                    {
                                                        //$uni=$row['uni'];
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
                                                    
                                                    $cmd2="select uni_name from university_data where university_id='$uni_id' LIMIT 1";
                                                    $result2=mysqli_query($con,$cmd2) or die(mysqli_error($con));
                                                    while($row2=mysqli_fetch_array($result2))
                                                    {
                                                        $uni_name=$row2['uni_name'];
                                                    }
                                                    
                                                    $cmd="select * from creator_data where c_id='$c_id' limit 1";
                                                    $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
                                                    while($row=mysqli_fetch_array($result))
                                                    {
                                                        $cname=$row['c_name'].' '.$row['c_fname'].' '.$row['c_lname'];
                                                    }
                                                    
                                                    
                                                    
                                                    $cmd2="select purchased_courses.id from purchased_courses,apply_for_subject where purchased_courses.sub_id=apply_for_subject.sub_id and apply_for_subject.c_id='$c_id' and apply_for_subject.sub_id='$course_id'";
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
                                                      <table align="center" class="ps-table ps-table ps-table--vendor-status" style="width:100%;">
                                                          <tr>
                                                              <td><b>University</b></td>
                                                              <td><b><?php echo $uni_name; ?></b></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>Stream</b></td>
                                                              <td><b><?php echo $stream_name; ?></b></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>Program</b></td>
                                                              <td><b><?php echo $program_name; ?></b></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>Branch</b></td>
                                                              <td><b><?php echo $b_name; ?></b></td>
                                                          </tr>
                                                          <tr>
                                                              <td>Medium</td>
                                                              <td><?php echo $med; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>Semester</b></td>
                                                              <td><b><?php echo $term_name; ?></b></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>Subject</b></td>
                                                              <td><b><?php echo $course_name; ?></b></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>Mentor</b></td>
                                                              <td><b><?php echo $cname; ?></b></td>
                                                          </tr>
                                                          
                                                          <tr>
                                                              <td><b>Description</td>
                                                              <td><b><p class="text-justify"><?php echo $course_des; ?></p></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>Subject Duration</b></td>
                                                              <td><b><?php echo $course_plan_duration.' Hours'; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>Number of Subscriber</b></td>
                                                              <td><b><?php echo $nsubs; ?></b></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>Price</b></td>
                                                              <td><b><?php echo $course_price. 'Rs/-'; ?></b></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>Discount</b></td>
                                                              <td><b><?php echo $course_dis. '%'; ?></b></td>
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
                                                        <th style="">Index</th>
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
                                                  $cmd="select * from creator_video where subject_id='$sub_id' ORDER BY sequence ASC";
                                                  $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
                                                  while($row=mysqli_fetch_array($result))
                                                  {     
                                                      $count = $count + 1;
                                                      $id=$row['id'];
                                                      $v_id=$row['v_id'];
                                                      $ch_id=$row['ch_id'];
                                                      $course_id=$row['course_id'];
                                                      $v_title=$row['v_title'];
                                                      $v_link1=$row['v_link'];
                                                      $v_date=$row['v_date'];
                                                      $v_status=$row['v_status'];
                                                      $v_attach=$row['v_attach'];
                                                      $ch_name=$row['ch_name'];
                                                      $sequence=$row['sequence'];
                                                      $cmd1="select * from chapter_data where ch_id='$ch_id' ";
                                                     $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
                                                     while($row1=mysqli_fetch_array($result1))
                                                     {
                                                         $chapter= $row1['ch_no'].' - '.$row1['ch_name'];
                                                     }
                                                  ?>
                                                    <tr id="delete<?php echo $row['id'] ?>" class="showmodal" >
                                                        <td ><?php echo $id; ?></td>
                                                        <td style="display:none;"><?php echo $count = $count + 1; ?></td>
                                                        <td><?php echo $sequence;?></td>
                                                        <td><?php echo $v_title;?></td>
                                                        <td><?php echo $chapter;?></td>
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
                                                                        <button type="submit" title="View" class="ps-btn" disabled><i class="icon-eye"></i></button>
                                                                    <?php
                                                                }
                                                                else
                                                                {
                                                                    ?>
                                                                      <form action="analysisdatavideo" target="_blank" method="post">
                                                                        <input type="hidden" name="v_id" id="v_id" value="<?php echo $v_id;?>">
                                                                        <button type="submit" name="go" id="go" title="View" class="ps-btn"><i class="icon-eye"></i></button>
                                                                      </form>     
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
                                                        <th >Index</th>
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
                                    
                                    <div class="ps-tab" id="tab-3">
                                        <div class="ps-document">
                                            <div class="row">
                       
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 " style="margin-bottom:30px;">
                                            <div class="table-responsive">
                                                <table id="load2" class="table table-hover table-bordered zero-configuration" style="width:100%;">
                                                  <thead class="thead-dark" align="center">
                                                    <tr>
                                                        <th>Index</th>
                                                        <th>Student Name</th>
                                                        <th>Contact Number</th>
                                                        <th>Email Address</th>
                                                        <th>Type</th>
                                                        <th style="display:none;">State</th>
                                                        <th style="display:none;">City</th>
                                                        <th style="display:none;">University</th>                    
                                                        <th style="display:none;">Stream</th>
                                                        <th style="display:none;">Program</th>
                                                        <th style="display:none;">Branch</th>
                                                        <th style="display:none;">Medium</th>
                                                        <th style="display:none;">Semester</th>
                                                        <th>Transaction ID</th>
                                                        <th>Order ID</th>
                                                        <th>Bill ID</th>
                                                        <th>Date</th>
                                                        <th>Bill</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody align="center">
                                                    <?php
                                                  $count = 0; 
                                                  $cmd="select * from purchased_courses where sub_id='$sub_id' ORDER BY id ASC";
                                                  $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
                                                  while($row=mysqli_fetch_array($result))
                                                  {     
                                                      $id=$row['id'];
                                                      $user_id=$row['user_id'];
                                                      $type=$row['type'];
                                                      $transaction_id=$row['transaction_id'];
                                                      $order_id=$row['order_id'];
                                                      $bill_id=$row['bill_id'];
                                                      $date=$row['date'];
                                                      
                                                    $cmd1="select * from user_data where u_id='$user_id' Limit 1";
                                                    $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
                                                    while($row1=mysqli_fetch_array($result1))
                                                    {     
                                                      $username=$row1['username'];
                                                      $u_cno=$row1['u_cno'];
                                                      $u_email=$row1['u_email'];
                                                      $u_state=$row1['u_state'];
                                                      $u_city=$row1['u_city'];
                                                      $stream=$row1['stream'];
                                                      $program=$row1['program'];
                                                      $department=$row1['department'];
                                                      $term_id=$row1['term_id'];
                                                      $university=$row1['university'];
                                                    }
                                                    $cmd1="select * from stream_data where stream_id = '$stream'";
                                                      $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
                                                      while($row1=mysqli_fetch_array($result1))
                                                      {
                                                          $stream_name=$row1['stream_name'];
                                                          //$uni=$row1['uni'];
                                                      }
                                                          
                                                          $cmd2="select * from program_data where pr_id = '$program'";
                                                      $result2=mysqli_query($con,$cmd2) or die(mysqli_error($con));
                                                      while($row2=mysqli_fetch_array($result2))
                                                      {
                                                          $pr_id=$row2['program_name'];
                                                      }
                                                          
                                                          $cmd3="select * from branch_data where b_id = '$department'";
                                                      $result3=mysqli_query($con,$cmd3) or die(mysqli_error($con));
                                                      while($row3=mysqli_fetch_array($result3))
                                                      {
                                                          $b_id=$row3['b_name'];
                                                      }
                                                      
                                                      $cmd4="select * from term_data where term_id = '$term_id'";
                                                      $result4=mysqli_query($con,$cmd4) or die(mysqli_error($con));
                                                      while($row4=mysqli_fetch_array($result4))
                                                      {
                                                          $term_name=$row4['term_name'];
                                                          $med=$row4['med'];
                                                      }
                                                      
                                                      $cmd2="select uni_name from university_data where university_id='$university' LIMIT 1";
                                                        $result2=mysqli_query($con,$cmd2) or die(mysqli_error($con));
                                                        while($row2=mysqli_fetch_array($result2))
                                                        {
                                                            $uni_name=$row2['uni_name'];
                                                        }
                                                        
                                                  ?>
                                                      <tr>
                                                        <td><?php echo $count = $count + 1; ?></td>
                                                        <td><?php echo $username; ?></td>
                                                        <td><?php echo $u_cno;?></td>
                                                        <td><?php echo $u_email;?></td>
                                                        <td><?php echo $type;?></td>
                                                        <td style="display:none;"><?php echo $u_state; ?></td>
                                                        <td style="display:none;"><?php echo $u_city; ?></td>
                                                        <td style="display:none;"><?php echo $university; ?></td>
                                                        <td style="display:none;"><?php echo $stream_name; ?></td>
                                                        <td style="display:none;"><?php echo $pr_id; ?></td>
                                                        <td style="display:none;"><?php echo $b_id; ?></td>
                                                        <td style="display:none;"><?php echo $med; ?></td>
                                                        <td style="display:none;"><?php echo $term_name; ?></td>
                                                        <td><?php echo $transaction_id;?></td>
                                                        <td><?php echo $order_id;?></td>
                                                        <td><?php echo $bill_id;?></td>
                                                        <td><?php echo $date;?></td>
                                                        <td>
                                                       <a role="button" class="ps-btn" href="invoice?data=<?=base64_encode($bill_id);?>">Bill</a>             
                                                    </td>
                                                      </tr>
                                                  <?php
                                                }
                                                ?>
                                                  </tbody>
                                                  <tfoot align="center" class="thead">
                                                    <tr>
                                                        <th>Index</th>
                                                        <th>Student Name</th>
                                                        <th>Contact Number</th>
                                                        <th>Email Address</th>
                                                        <th>Type</th>
                                                        <th style="display:none;">State</th>
                                                        <th style="display:none;">City</th>
                                                        <th style="display:none;">University</th>                    
                                                        <th style="display:none;">Stream</th>
                                                        <th style="display:none;">Program</th>
                                                        <th style="display:none;">Branch</th>
                                                        <th style="display:none;">Medium</th>
                                                        <th style="display:none;">Semester</th>
                                                        <th>Transaction ID</th>
                                                        <th>Order ID</th>
                                                        <th>Bill ID</th>
                                                        <th>Date</th>
                                                        <th>Bill</th>
                                                    </tr>
                                                  </tfoot>
                                                </table>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                        </div>
                                   
                                    
                                    <div class="ps-tab" id="tab-4">
                                        <div class="ps-document">
                                            <div class="table-responsive">
                                                <table id="load3" class="table table-hover table-bordered zero-configuration" style="width:100%;">
                                                  <thead class="thead-dark" align="center">
                                                    <tr>
                                                        <th style="display:none;">id</th>
                                                        <th >Index</th>
                                                        <th>Comment</th>
                                                        <th>Mentor's Comment</th>
                                                        <!--<th>Publisher's Comment</th>-->
                                                        <th>Timestamp</th>
                                                       
                                                    </tr>
                                                  </thead>
                                                  <tbody align="center">
                                                    <?php
                                                    $cmd="select comment_video.id,comment_video.comment,comment_video.comment_mentor,comment_video.comment_publisher,comment_video.date,user_data.username from comment_video,user_data where comment_video.u_id=user_data.u_id and comment_video.v_id='$v_id' ORDER BY comment_video.id ASC";
                                                    $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
                                                    while($row=mysqli_fetch_array($result))
                                                    {     
                                                      $id=$row['id'];
                                               
                                                      $username=$row['username'];
                                                      $comment=$row['comment'];
                                                      $comment_mentor=$row['comment_mentor'];
                                                    //   $comment_publisher=$row['comment_publisher'];
                                                      $index=$row['id'];
                                                      $timestamp=$row['date'];
                                                  ?>
                                                    <tr>
                                                        <td ><?php echo $id; ?></td>
                                                        <td style="display:none;"><?php echo $count = $count + 1; ?></td>
                                                        <td><?php echo $comment;?></td>
                                                        <td><?php echo $comment_mentor;?></td>
                                                        <!--<td><?php // echo $comment_publisher;?></td>-->
                                                        <td><?php echo $timestamp;?></td>
                                                        
                                                      </tr>
                                                  <?php
                                                }
                                                ?>
                                                  </tbody>
                                                  <tfoot align="center" class="thead">
                                                    <tr>
                                                        <th style="display:none;">id</th>
                                                        <th>Index</th>
                                                        <th>Comment</th>
                                                        <th>Comment Mentor</th>
                                                        <!--<th>Comment Publisher</th>-->
                                                        <th>Timestamp</th>
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
    <script src="ajax/sidebarsearch.js"></script>
    <script src="ajax/toastr/toastr.min.js"></script>
	<script src="datatable/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/3.3.1/js/dataTables.fixedColumns.min.js"></script>
    <script src="datatable/dataTables.bootstrap4.min.js"></script>
    <script>
    $(document).ready(function() {
    
    var table = $('#load1').DataTable( {
        orderCellsTop: true,
        fixedHeader: true
    } );
    
    
    $('.filter-checkbox-u_state').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox-u_state'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      table.column(5).search(searchTerms.join('|'), true, false, true).draw();
    });
    
    $('.filter-checkbox-u_city').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox-u_city'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      table.column(6).search(searchTerms.join('|'), true, false, true).draw();
    });
    
    $('.filter-checkbox-uni').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox-uni'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      table.column(7).search(searchTerms.join('|'), true, false, true).draw();
    });
    
    $('.filter-checkbox-stream').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox-stream'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      table.column(8).search(searchTerms.join('|'), true, false, true).draw();
    });
    
    $('.filter-checkbox-prog').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox-prog'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      table.column(9).search(searchTerms.join('|'), true, false, true).draw();
    });
    
    $('.filter-checkbox-branch').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox-branch'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      table.column(10).search(searchTerms.join('|'), true, false, true).draw();
    });
    
    $('.filter-checkbox-term').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox-term'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      table.column(12).search(searchTerms.join('|'), true, false, true).draw();
    });
    
    $('.filter-checkbox-med').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox-med'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      table.column(11).search(searchTerms.join('|'), true, false, true).draw();
    });
    
} );
    </script>
    <script>
         $(document).ready( function () {
         $('#load1').DataTable();
        } );
    </script>
    <script>
         $(document).ready( function () {
         $('#load2').DataTable();
        } );
    </script>
    <script>
         $(document).ready( function () {
         $('#load3').DataTable();
        } );
    </script>
     <script>
         $(document).ready( function () {
         $('#load').DataTable();
        } );
    </script>
</body>

</html>
<?php
}
?>