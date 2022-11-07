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
        <div class="mt-5 mb-5 ml-5 mr-5">
            <div class="ps-product--detail ps-product--box">

                <div class="ps-product__content ps-tab-root">
                    <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="dash">Home</a></li>
                    <li>Explore Subject</li>
                </ul>
            </div>
        </div>
                    <div class="row">
                        
                    
                    
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 " style="margin-bottom:30px;">
                            <div class="ps-product__box">
                                <ul class="ps-tab-list">
                                    <li class="active"><a href="#tab-1">Explore Subject</a></li>
                                    
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
                                </div>
                                <div class="modal fade" id="exampleModalCenter">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Upload Excel</h4>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form onsubmit="return uploadexcel(this);" id="myform1" method="post"
                                enctype="multipart/form-data">

                                <input type="file" name="file" id="file" accept="csv/*" style="height:40px;" required />
                                <button type="submit" class="btn btn-warning" style="font-size:15px;color:white;" name="upload" id="upload" value="upload"
                                    required>Upload</button>
                                <center>
                                    <!--<div class="loading" id="loading">-->
                                    <!--    <img src="../loader/form.gif" width="140px" alt="">-->
                                    <!--</div>-->
                                </center>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" name="reset" id="reset" value="reset" class="btn btn-danger"
                                style="font-size:15px;color:white;" data-dismiss="modal">Close</button>
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
    <script src="ajax/sidebarsearch.js"></script>
    <script src="ajax/toastr/toastr.min.js"></script>
    <script src="../js/imgpreview.js"></script>
    <script src="datatable/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/3.3.1/js/dataTables.fixedColumns.min.js"></script>
    <script src="datatable/dataTables.bootstrap4.min.js"></script>
   <script>
    $(document).ready(function() {
    
    var table = $('#load').DataTable( {
        aLengthMenu: [[23, 50, 75, 10], [23, 50, 75, "All"]],
        iDisplayLength: 23
    } );
    
    
    $('.filter-checkbox-uni').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox-uni'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      table.column(1).search(searchTerms.join('|'), true, false, true).draw();
    });
    
    $('.filter-checkbox-stream').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox-stream'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      table.column(2).search(searchTerms.join('|'), true, false, true).draw();
    });
    
    $('.filter-checkbox-prog').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox-prog'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      table.column(3).search(searchTerms.join('|'), true, false, true).draw();
    });
    
    $('.filter-checkbox-branch').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox-branch'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      table.column(4).search(searchTerms.join('|'), true, false, true).draw();
    });
    
    $('.filter-checkbox-term').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox-term'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      table.column(5).search(searchTerms.join('|'), true, false, true).draw();
    });
    
    $('.filter-checkbox-med').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox-med'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      table.column(6).search(searchTerms.join('|'), true, false, true).draw();
    });
    
} );
    </script>
</body>

</html>