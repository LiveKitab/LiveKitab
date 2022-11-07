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
    <br><br>
   <main id="homepage-photo">
        
        <div class="ps-page--product ps-page--product-box">
        <div class="mt-5 mb-5 ml-5 mr-5">
            <div class="ps-product--detail ps-product--box">

                <div class="ps-product__content ps-tab-root">
                    <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="dash">Home</a></li>
                    <li>Account</li>
                </ul>
            </div>
        </div>
                    <div class="row">
                      
                    
                    
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 " style="margin-bottom:30px;">
                            <div class="ps-product__box">
                                <ul class="ps-tab-list">
                                    <li class="active"><a href="#tab-1">Account & Analysis</a></li>
                                    <!--<li class=""><a href="#tab-2">Payment History</a></li>-->
                                </ul>
                                <div class="ps-tabs">
                                    <div class="ps-tab active" id="tab-1">
                                        <div class="ps-document">
                                            <div class="table-responsive">
             <table id="load" class="table table-hover table-bordered zero-configuration">
                                              <thead class="thead-dark" align="center">
                                                <tr>
                                                    <th>Index</th>
                                                    <th>Mentor Name</th>                    
                                                    <th>User Name</th>
                                                    <th>Subject Name</th>
                                                    <th>Transaction ID</th>
                                                    <th>Order ID</th>
                                                    <th>Bill ID</th>
                                                    <th>Date</th>
                                                    <!--<th>Paytm Transaction ID</th>-->
                                                    <!--<th>Time</th>-->
                                                    <!--<th>Status</th>-->
                                                    <th>Bill</th>
                                                </tr>
                                              </thead>
                                              <tbody align="center">
                                                <?php
                                              $count = 0; 
                                              $cmd="select * from purchased_courses ORDER BY id ASC";
                                              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
                                              while($row=mysqli_fetch_array($result))
                                              {     
                                                  $count = $count + 1;
                                                  $id=$row['id'];
                                                  $mentor_id=$row['c_id'];
                                                  $user_id=$row['user_id'];
                                                  $sub_id=$row['sub_id'];
                                                  $transaction_id=$row['transaction_id'];
                                                  $order_id=$row['order_id'];
                                                  $bill_id=$row['bill_id'];
                                                  $date=$row['date'];
                                                //   $TXNIDPAYTM=$row['TXNIDPAYTM'];
                                                //   $time=$row['transaction_time'];
                                                //   $status=$row['status'];
                                              
                                                  $sel="select * from user_data where u_id='$user_id'";
                                                  $run=mysqli_query($con,$sel) or die(mysqli_error($con));
                                                  while($rows=mysqli_fetch_array($run))
                                                  {
                                                      $username=$rows['username'];
                                                    //   $med=$rows['med'];
                                                  }
                                                  
                                                  $cmd1="select * from apply_for_subject where sub_id='$sub_id' ";
                                                  $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
                                                  while($row1=mysqli_fetch_array($result1))
                                                  {
                                                    $sub_name=$row1['sub_name'];
                                                  }
                                                  
                                                  
                                                    $cmd2="select * from creator_data where c_id='$mentor_id'";
                                                    $result2=mysqli_query($con,$cmd2) or die(mysqli_error($con));
                                                    while($row2=mysqli_fetch_array($result2))
                                                    {
                                                        $c_name=$row2['c_name'];
                                                        $c_lname=$row2['c_lname'];
                                                        $name=$c_name . ' ' . $c_lname;
                                                      
                                                    }
                                                    
                                                    // $cmd2="select * from branch_data where b_id='$b_id' LIMIT 1";
                                                    // $result2=mysqli_query($con,$cmd2) or die(mysqli_error($con));
                                                    // while($row2=mysqli_fetch_array($result2))
                                                    // {
                                                    //     $branch_name=$row2['b_name'];
                                                    // }
                                                    
                                                    // $cmd21="select uni_name from university_data where university_id='$university_id' LIMIT 1";
                                                    // $result21=mysqli_query($con,$cmd21) or die(mysqli_error($con));
                                                    // while($row21=mysqli_fetch_array($result21))
                                                    // {
                                                    //     $uni_name=$row21['uni_name'];
                                                    // }
                                                 
                                              ?>
                                                <tr>
                                                    <td><?php echo $count; ?></td>
                                                    <td><?php echo $name; ?></td>
                                                    <td><?php echo $username; ?></td>
                                                    <td><?php echo $sub_name; ?></td>
                                                    <td><?php echo $transaction_id; ?></td>
                                                    <td><?php echo $order_id; ?></td>
                                                    <td><?php echo $bill_id; ?></td>
                                                    <td><?php echo $date; ?></td>
                                                    <!--<td><?php echo $discount; ?></td>-->
                                                    <!--<td><?php echo $TXNIDPAYTM; ?></td>-->
                                                    <!--<td><?php echo $time; ?></td>-->
                                                    <!--<td><?php echo $status; ?></td>-->
                                                    <td>
                                                       <a role="button" class="ps-btn" href="invoice?data=<?=base64_encode($bill_id);?>">Bill</a>             
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                                ?>
                                              </tbody>
                                              <tfoot align="center" class="thead-dark">
                                                <tr>
                                                    <th>Index</th>
                                                    <th>Mentor Name</th>                    
                                                    <th>User Name</th>
                                                    <th>Subject Name</th>
                                                    <th>Transaction ID</th>
                                                    <th>Order ID</th>
                                                    <th>Bill ID</th>
                                                    <th>Date</th>
                                                    <!--<th>Paytm Transaction ID</th>-->
                                                    <!--<th>Time</th>-->
                                                    <!--<th>Status</th>-->
                                                    <th>Bill</th>
                                                </tr>
                                              </tfoot>
                                            </table>
          </div>
          
                                            
                                                  </div>
                                                </div>
                                                
                                                <div class="ps-tab" id="tab-2">
                                        <div class="ps-document">
                                            <div class="table-responsive">
            <table id="load1" class="table table-hover table-bordered zero-configuration" width="100%">
              <thead class="thead-dark" align="center">
                <tr>
                    <th>Index</th>
                    <th>Subject Name</th>
                    <th style="display:none;">Subject Code</th>
                    <th>No of Subscriber</th>
                    <th>Subject Price</th>
                    <th>Mentor Percentage</th>
                    <th>Payment Method</th>
                    <th>Transaction ID</th>
                    <th>Amount to be Paid</th>
                    <th>Bill</th>
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
            $count1 = 0; 
            $nsubs1 = 0;
              $cmd4="select * from creator_payment where c_id='$c_id'";
              $result4=mysqli_query($con,$cmd4) or die(mysqli_error($con));
              while($row4=mysqli_fetch_array($result4))
              {
                $count1=$count1+1;
                $index=$row4['id'];
                $cs_id=$row4['sub_id'];
                $cs_id1=$row4['sub_id'];
                $cs_id1=base64_encode($cs_id1);
                $amount=$row4['payment_amount'];
                $pm=$row4['payment_method'];
                $pid=$row4['payment_id'];
                $status=$row4['status'];

              $cmd3="select * from apply_for_subject where sub_id='$cs_id'";
              $result3=mysqli_query($con,$cmd3) or die(mysqli_error($con));
              while($row3=mysqli_fetch_array($result3))
              {
                $course_name1=$row3['sub_name'];
                $course_price1=$row3['price'];
                $sub_code=$row3['sub_code'];
              }
              $per1=0;
              $sendper=0;
              $cmd5="select * from account_admin where c_id='$c_id'";
              $result5=mysqli_query($con,$cmd5) or die(mysqli_error($con));
              while($row5=mysqli_fetch_array($result5))
              {
                $per1=$row5['c_per'];
                $sendper=$row5['c_per'];
                $sendper=base64_encode($sendper);
              }
              
              $nsubs1 = 0;
              $cmd2="select purchased_courses.id from purchased_courses,course_data where purchased_courses.course_id=course_data.course_id and course_data.c_id='$c_id'  and course_data.course_id='$cs_id'";
              $result2=mysqli_query($con,$cmd2) or die(mysqli_error($con));
              while($row2=mysqli_fetch_array($result2))
              {
                $nsubs1=$nsubs1+1;    
              }
              $cmd5="select * from stream_data where stream_id = '$stream_id'";
              $result5=mysqli_query($con,$cmd5) or die(mysqli_error($con));
              while($row5=mysqli_fetch_array($result5))
              {
                  $stream_name=$row5['stream_name'];
                  //$uni=$row5['uni'];
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
              
              $cmd9="select * from university_data where university_id = '$uni'";
              $result9=mysqli_query($con,$cmd9) or die(mysqli_error($con));
              while($row9=mysqli_fetch_array($result9))
              {
                  $uni=$row9['uni_name'];
              }
              ?>
                <tr>
                    
                    <td><?php echo $count1; ?></td>
                    <td><?php echo $course_name1; ?></td>
                    <td style="display:none;"><?php echo $sub_code; ?></td>
                    <td><?php echo $nsubs1; ?></td>
                    <td><?php echo $course_price1; ?></td>
                    <td><?php echo $per1; ?></td>
                    <td><?php echo $pm; ?></td>
                    <td><?php echo $pid; ?></td>
                    <td><?php echo $amount; ?></td>
                    <td>        
                        <a type="button" target="_blank" href="bill?qstringdata=<?php echo $cs_id1; ?>&qstringdata1=<?php echo $sendper; ?>" class="ps-btn"><i class="fas fa-file-invoice"></i></a>
                    </td>
                    <td style="display:none;"><?php echo $uni; ?></td>
                    <td style="display:none;"><?php echo $stream_name; ?></td>
                    <td style="display:none;"><?php echo $pr_id; ?></td>
                    <td style="display:none;"><?php echo $b_id; ?></td>
                    <td style="display:none;"><?php echo $med; ?></td>
                    <td style="display:none;"><?php echo $term_name; ?></td>
                  </tr>
              <?php
            }
            ?>
              </tbody>
              <tfoot align="center" class="thead">
                <tr>
                    <th>Index</th>
                    <th>Subject Name</th>
                    <th style="display:none;">Subject Code</th>
                    <th>No of Subscriber</th>
                    <th>Subject Price</th>
                    <th>Mentor Percentage</th>
                    <th>Payment Method</th>
                    <th>Transaction ID</th>
                    <th>Amount Paid</th>
                    <th>Bill</th>
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
     <script src="ajax/payment.js"></script>
    <script src="ajax/toastr/toastr.min.js"></script>
    <script src="ajax/sidebarsearch.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="datatable/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/3.3.1/js/dataTables.fixedColumns.min.js"></script>
    <script src="datatable/dataTables.bootstrap4.min.js"></script>
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
    
    $('.filter-checkbox-sub_code').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox-sub_code'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      table.column(5).search(searchTerms.join('|'), true, false, true).draw();
    });
    
} );
  </script>
  
  
  <script>
    $(document).ready(function() {
    
 
    var table = $('#load1').DataTable( {
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
      table.column(10).search(searchTerms.join('|'), true, false, true).draw();
    });
    
    $('.filter-checkbox-stream').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox-stream'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      table.column(11).search(searchTerms.join('|'), true, false, true).draw();
    });
    
    $('.filter-checkbox-prog').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox-prog'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      table.column(12).search(searchTerms.join('|'), true, false, true).draw();
    });
    
    $('.filter-checkbox-branch').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox-branch'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      table.column(13).search(searchTerms.join('|'), true, false, true).draw();
    });
    
    $('.filter-checkbox-term').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox-term'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      table.column(15).search(searchTerms.join('|'), true, false, true).draw();
    });
    
    $('.filter-checkbox-med').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox-med'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      table.column(14).search(searchTerms.join('|'), true, false, true).draw();
    });
    
    $('.filter-checkbox-sub_code').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox-sub_code'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      table.column(2).search(searchTerms.join('|'), true, false, true).draw();
    });
    
} );

    </script>
</body>
</html>