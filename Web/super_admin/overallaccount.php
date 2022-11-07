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
                    <li>Overall Accounting</li>
                </ul>
            </div>
        </div>
                    <div class="row">
                        <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="ps-layout__left">
                    <aside class="widget widget_shop ps-product__box">
                        <figure class="ps-custom-scrollbar" data-height="250">
                        <h4 class="widget-title"><b>BY Mentor</b></h4>
                         <div class="ps-form--widget-search">
                        <input class="form-control mb-3 mentsrch" type="text" placeholder="Search here...">
                        <button><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                        <div id="scrollbar" class="mentlist" style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                        
                            <?php
                                $q = "select distinct c_name,c_fname,c_lname from creator_data order by c_name asc";
                                $result = mysqli_query($con,$q);
                                while($rows = mysqli_fetch_array($result))
                                {
                                    
                                ?>
                                <div class="ps-checkbox">
                                    <input class="form-control filter-checkbox-c_name" type="checkbox" id="<?php echo $rows['c_name'].' '.$rows['c_fname'].' '.$rows['c_lname']; ?>" name="<?php echo $rows['c_name'].' '.$rows['c_fname'].' '.$rows['c_lname']; ?>" value="<?php echo $rows['c_name'].' '.$rows['c_fname'].' '.$rows['c_lname']; ?>">
                                    <label for="<?php echo $rows['c_name'].' '.$rows['c_fname'].' '.$rows['c_lname']; ?>"><?php echo $rows['c_name'].' '.$rows['c_fname'].' '.$rows['c_lname']; ?></label>
                                </div>
                            <?php
                            }               
                            ?>
                            </div>
                        </figure>
                        <figure class="ps-custom-scrollbar" data-height="250">
                        <h4 class="widget-title"><b>BY Subject Code</b></h4>
                         <div class="ps-form--widget-search">
                        <input class="form-control mb-3 sbjsrch" type="text" placeholder="Search here...">
                        <button><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                        <div id="scrollbar" class="sbjlist" style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                            <?php
                                $q = "select distinct sub_code from course_data order by sub_code asc";
                                $result = mysqli_query($con,$q);
                                while($rows = mysqli_fetch_array($result))
                                {
                                    
                                ?>
                                <div class="ps-checkbox">
                                    <input class="form-control filter-checkbox-sub_code" type="checkbox" id="<?php echo $rows['sub_code']; ?>" name="<?php echo $rows['sub_code']; ?>" value="<?php echo $rows['sub_code']; ?>">
                                    <label for="<?php echo $rows['sub_code']; ?>"><?php echo $rows['sub_code']; ?></label>
                                </div>
                            <?php
                            }               
                            ?>
                            </div>
                        </figure>
                        <figure class="ps-custom-scrollbar" data-height="250">
                        <h4 class="widget-title"><b>BY Date Of Payment</b></h4>
                        <div class="ps-form--widget-search">
                        <input class="form-control mb-3 datesrch" type="text" placeholder="Search here...">
                        <button><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                        <div id="scrollbar" class="datelist" style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                        
                            <?php
                                $q = "select distinct payment_month,payment_year from creator_payment order by payment_month asc";
                                $result = mysqli_query($con,$q);
                                while($rows = mysqli_fetch_array($result))
                                {
                                    
                                ?>
                                <div class="ps-checkbox">
                                    <input class="form-control filter-checkbox-payment_month" type="checkbox" id="<?php echo $rows['payment_month'].' / '.$rows['payment_year']; ?>" name="<?php echo $rows['payment_month'].' / '.$rows['payment_year']; ?>" value="<?php echo $rows['payment_month'].' / '.$rows['payment_year']; ?>">
                                    <label for="<?php echo $rows['payment_month'].' / '.$rows['payment_year']; ?>"><?php echo $rows['payment_month'].' / '.$rows['payment_year']; ?></label>
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
                                    <li class="active"><a href="#tab-1">Payment Reports</a></li>
                                </ul>
                                <div class="ps-tabs">
    
                                    
                                    <div class="ps-tab active" id="tab-1">
                                        <div class="ps-document">
                                            <div class="table-responsive">
            <table id="load" class="table table-hover table-bordered zero-configuration" width="100%">
              <thead align="center" class="thead-dark">
                <tr>
                    <th>Index</th>
                    <th>Subject Code</th>
                    <th>Subject Name</th>
                    <th style="display:none;">Mentor Name</th>     
                    <th>Percentage</th> 
                    <th>Date Of Payment</th>
                    <th>Payment Type</th>
                    <th>Transaction Id</th>
                    <th>Amount</th> 
                    <th>Invoice</th>
                </tr>
              </thead>
              <tbody align="center">
                <?php
                $count=0;
            $cmd="select * from creator_payment";
            $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
            while($row=mysqli_fetch_array($result))
            {
                $count=$count+1;
                $c_id=$row['c_id'];
                $course_id=$row['course_id'];
                $payment_id=$row['payment_id'];
                $payment_month=$row['payment_month'];
                $payment_year=$row['payment_year'];
                $payment_method=$row['payment_method'];
                $payment_amount=$row['payment_amount'];
                $remark=$row['remark'];
                $status=$row['status'];
                
                $cmd1="select * from course_data where course_id='$course_id' and c_id='$c_id' limit 1";
                $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
                while($row1=mysqli_fetch_array($result1))
                {
                    $sub_code=$row1['sub_code'];
                    $course_name=$row1['course_name'];
                }
                
                $cmd2="select * from creator_data where c_id='$c_id' limit 1";
                $result2=mysqli_query($con,$cmd2) or die(mysqli_error($con));
                while($row2=mysqli_fetch_array($result2))
                {
                    $c_name=$row2['c_name'].' '.$row2['c_fname'].' '.$row2['c_lname'];
                }
                
                $cmd3="select * from account_admin where c_id='$c_id' and course_id='$course_id' limit 1";
                $result3=mysqli_query($con,$cmd3) or die(mysqli_error($con));
                while($row3=mysqli_fetch_array($result3))
                {
                    $c_per=$row3['c_per'];
                }
                
              ?>
                <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $sub_code; ?></td>
                    <td><?php echo $course_name; ?></td>
                    <td style="display:none;"><?php echo $c_name; ?></td>
                    <td><?php echo $c_per; ?></td>
                    <td><?php echo $payment_month.' / '.$payment_year; ?></td>
                    <td><?php echo $payment_method; ?></td>
                    <td><?php echo $payment_id; ?></td>
                    <td><?php echo $payment_amount; ?></td>
                    <td><a href="invoice?qstringdata=<?php echo base64_encode($course_id); ?>&qstringdata1=<?php echo base64_encode($c_per); ?>&qstringdata2=<?php echo base64_encode($c_id); ?>" class="ps-btn"><i class="fas fa-file-invoice"></i></a></td>
                  </tr>
              <?php
            }
            ?>
              </tbody>
              <tfoot align="center">
                <tr>
                    <th>Index</th>
                    <th>Subject Code</th>
                    <th>Subject Name</th>
                    <th style="display:none;">Mentor Name</th>     
                    <th>Percentage</th> 
                    <th>Date Of Payment</th>
                    <th>Payment Type</th>
                    <th>Transaction Id</th>
                    <th>Amount</th> 
                    <th>Invoice</th>
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
    <script src="ajax/sidebarsearch.js"></script>
    <script src="ajax/toastr/toastr.min.js"></script>
    <script src="../js/confirm.js"></script>
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
    
    
    $('.filter-checkbox-c_name').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox-c_name'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      table.column(3).search(searchTerms.join('|'), true, false, true).draw();
    });
    
    $('.filter-checkbox-sub_code').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox-sub_code'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      table.column(1).search(searchTerms.join('|'), true, false, true).draw();
    });
    
    $('.filter-checkbox-payment_month').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox-payment_month'), function(i,elem){
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