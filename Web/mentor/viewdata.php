<?php
include_once("../db/mconnect.php");
include_once("back/function/session.php");
 $sub_id = base64_decode($sub_id);
if(isset($_GET['data']))
{
    $id = mysqli_real_escape_string($con,$_GET['data']);
    $id = base64_decode($id);
    $count=0;
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
                    
                    <li>User Analysis</li>
                </ul>
            </div>
        </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 " style="margin-bottom:30px;">
                            <div class="ps-product__box">
                                <ul class="ps-tab-list">
                                    <li class="active"><a href="#tab-1">Subject Analysis</a></li>
                                   
                                </ul>
                                <div class="ps-tabs">
                                    <div class="ps-tab active" id="tab-1">
                                        <div class="ps-document">
                                            <?php 
                                                  $sel = "select * from user_transaction where bill_id='$id'";
                                                $run=mysqli_query($con,$sel) or die(mysqli_error($con));
                                                while($row=mysqli_fetch_array($run))
                                                {
                                                    $count=$count+1;
                                                    $t_id=$row['transaction_id'];
                                                    $b_id=$row['bill_id'];
                                                    $o_id=$row['order_id'];
                                                    $bank=$row['BankName'];
                                                    $p_mode=$row['payment_mode'];
                                                    $total=$row['amount'];
                                                    $discount=$row['discount'];
                                                    $time=$row['transaction_time'];
                                               
                                                }
                                                
                                                 $sel1="select * from  purchased_courses where bill_id='$id'";
                                                 $run1=mysqli_query($con,$sel1) or die(mysqli_error($con));
                                                 while($rows1=mysqli_fetch_array($run1))
                                                 {
                                                     $mentor_id=$rows1['c_id'];
                                                     $user_id=$rows1['user_id'];
                                                     $sub_id=$rows1['sub_id'];
                                                     
                                                     $sel="select * from user_data where u_id='$user_id'";
                                                $run=mysqli_query($con,$sel) or die(mysqli_error($con));
                                                while($rows=mysqli_fetch_array($run))
                                                {
                                                    $username=$rows['username'];
                                                    $contact=$rows['u_cno'];
                                                    $mail=$rows['u_email'];
                                                    $addrs=$rows['u_addr'];
                                                   
                                                }
                                                
                                                $dis= "select * from creator_data where c_id='$mentor_id'";
                                            $return=mysqli_query($con,$dis) or die(mysqli_error($con));
                                            while($rows1=mysqli_fetch_array($return))
                                            {
                                                $email = $rows1['c_email'];
                                                $no = $rows1['c_cno'];
                                                $addr = $rows1['c_addr'];
                                                $c_name=$row1['c_name'];
                                                $c_lname=$row1['c_lname'];
                                                $name=$c_name . ' ' . $c_lname;
                                            }
                                                                                              
                                                $cmd1="select * from apply_for_subject where sub_id='$sub_id' ";
                                                $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
                                                while($row12=mysqli_fetch_array($result1))
                                                {
                                                    $sub_name=$row12['sub_name'];
                                                    $price=$row12['price'];
                                                }   
    
                                            }
                                            ?>  
                                            <div class="row">
                                              <div class="col-sm-12">
                                                <div class="card">
                                                  <div class="card-body">
                                                      <div class="table-responsive">
                                                      <table class="ps-table ps-table ps-table--vendor-status" style="width:100%;">
                                                          <tr>
                                                              <td><b>User Name</b></td>
                                                              <td><b><?php echo $username; ?></b></td>
                                                          </tr>
                                                          <tr>
                                                              <td>User Contact No.</td>
                                                              <td><?php echo $contact; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>User E-mail</b></td>
                                                              <td><b><?php echo $mail; ?></b></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>Subject Name</b></td>
                                                              <td><b><?php echo $sub_name; ?></b></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>Subject Price</b></td>
                                                              <td><b>₹<?php echo $price; ?></b></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>Discount</b></td>
                                                              <td><b><?php echo $discount; ?>%</b></td>
                                                          </tr>
                                                          
                                                          <tr>
                                                              <td><b>Final Price</b></td>
                                                              <td><b>₹<?php echo $total; ?></b></td>
                                                          </tr>
                                                          
                                                          <tr>
                                                              <td>Transaction Time</td>
                                                              <td><?php echo $time; ?></td>
                                                          </tr>
                                                          
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
            $('#load').DataTable();
        } );
    </script>
     <script>
         $(document).ready( function () {
        $('#load1').DataTable();
    } );
    </script>
</body>

</html>
<?php
}
?>