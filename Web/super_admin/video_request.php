<?php
include_once("../db/connect.php");
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
                    <li>New Mentor Request</li>
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
                                $q = "select distinct c_name,c_fname,c_lname from creator_data where c_status='1' order by c_name asc";
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
                                $q = "select distinct sub_code from apply_for_subject order by sub_code asc";
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
                        <figure class="ps-custom" data-height="250">
                        <h4 class="widget-title"><b>BY Status </b></h4>
                            
                                <div class="ps-checkbox">
                                    <input class="form-control filter-checkbox-sts" type="checkbox" id="Request Pending" name="Request Pending" value="Request Pending">
                                    <label for="Request Pending">Request Pending</label>
                                </div>
                                
                                <div class="ps-checkbox">
                                    <input class="form-control filter-checkbox-sts" type="checkbox" id="Request Approved" name="Request Approved" value="Request Approved">
                                    <label for="Request Approved">Request Approved</label>
                                </div>
                                
                                <div class="ps-checkbox">
                                    <input class="form-control filter-checkbox-sts" type="checkbox" id="Request Rejected" name="Request Rejected" value="Request Rejected">
                                    <label for="Request Rejected">Request Rejected</label>
                                </div>
                        </figure>
                        
                    </aside>
                    
                </div>
                    </div>
                    
                    
                        <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12 " style="margin-bottom:30px;">
                            <div class="ps-product__box">
                                <ul class="ps-tab-list">
                                    <li class="active"><a href="#tab-1">Video Request</a></li>
                                    
                                </ul>
                                <div class="ps-tabs">
                                    <div class="ps-tab active" id="tab-1">
                                        <div class="ps-document">
                                                      <div class="table-responsive">
                                                <table id="load" class="table table-hover table-bordered zero-configuration">
                                                  <thead class="thead-dark" align="center">
                                                    <tr>
                                                        <th style="display:none;">Id</th>
                                                        <th>Index</th>
                                                        <th>Title</th>
                                                        <th>Mentor Name</th> 
                                                        <th>Video Limit</th>
                                                        <th>Test Limit</th>
                                                        <th>Subject Name</th>
                                                        <th>Subject Code</th>
                                                        <th>Remarks</th>
                                                        <th>Action</th>
                                                        <th style="display:none;">Status</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody align="center">
                                                    <?php
                                                  $count = 0; 
                                                  $sel="select * from apply_for_subject ORDER BY id DESC";
                                                  $query=mysqli_query($con,$sel) or die(mysqli_error($con));
                                                  while($temp=mysqli_fetch_array($query))
                                                  {
                                                      $id = $temp['id'];
                                                      $c_id = $temp['c_id'];
                                                      $sub_id = $temp['sub_id'];
                                                      $sub_name = $temp['sub_name'];
                                                      $sub_code = $temp['sub_code'];
                                                      $remarks = $temp['remarks'];
                                                      $admin_status = $temp['admin_status'];
                                                      $title = $temp['title'];
                                                      $no_of_video = $temp['no_of_video'];
                                                      $no_of_test = $temp['no_of_test'];
                                                
                                                  $cmd="select * from creator_data where c_id='$c_id' ORDER BY id DESC";
                                                  $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
                                                  while($row=mysqli_fetch_array($result))
                                                  {     
                                                      
                                                      $c_name=$row['c_name'];
                                                      $c_fname=$row['c_fname'];
                                                      $c_lname=$row['c_lname'];
                                                  }
                                                      
                                                  ?>
                                                    <tr id="delete<?php echo $row['id'] ?>">
                                                        <td style="display:none;"><?php echo $id; ?></td>
                                                        <td><?php echo $count=$count+1; ?></td>
                                                        <td><?php echo $title; ?></td>
                                                        <td><?php echo $c_name; echo ' '; echo $c_fname; echo ' ';    echo $c_lname;?></td>
                                                        <td><?php echo $no_of_video; ?></td>
                                                        <td><?php echo $no_of_test; ?></td>
                                                        <td><?php echo $sub_name; ?></td>
                                                        <td><?php echo $sub_code; ?></td>
                                                        <td><?php echo $remarks; ?></td>
                                                        <td>
                                                            <?php
                                                            if($admin_status == '0')
                                                            {
                                                                ?>
                                                                <button type="button" class="ps-btn apprcourse" title="Approve" style="background-color:#28a745;"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> </button>             
                                                                <button onclick="rejvdeo(<?php echo $temp['id'];  ?>)" class="ps-btn" title="Reject" style="background-color:#dc3545;"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> </button>
                                                                <?php
                                                            }
                                                            else if($admin_status == '1')
                                                            {
                                                                ?><a href="viewsubdata?subdata=<?=base64_encode($sub_id);?>"><span class="badge badge-pill badge-success">Request Approve</span></a><?php
                                                            }
                                                            else if($admin_status == '2')
                                                            {
                                                                ?><span class="badge badge-pill badge-danger">Request Rejected</span><?php
                                                            }
                                                            ?>           
                                                        </td>
                                                        <td style="display:none;">
                                                            <?php
                                                                if($admin_status == '0')
                                                                {
                                                            ?> 
                                                                <p>Request Pending</p>
                                                            <?php
                                                                }
                                                                if($admin_status == '1')
                                                                {
                                                            ?>
                                                                <p>Request Approved</p>
                                                            <?php 
                                                                } 
                                                                if($admin_status == '2')
                                                                {
                                                            ?>
                                                                <p>Request Rejected</p>
                                                            <?php
                                                                }
                                                            ?>
                                                        </td>
                                                      </tr>
                                                  <?php
                                                }
                                                include_once("back/modal/apprcourse.php");
                                                ?>
                                                  </tbody>
                                                  <tfoot align="center" class="thead">
                                                    <tr>
                                                        <th style="display:none;">Id</th>
                                                        <th>Index</th>
                                                        <th>Title</th>
                                                        <th>Mentor Name</th> 
                                                        <th>Video Limit</th>
                                                        <th>Test Limit</th>
                                                        <th>Subject Name</th>
                                                        <th>Subject Code</th>
                                                        <th>Remarks</th>
                                                        <th>Action</th> 
                                                        <th style="display:none;">Status</th>
                                                    </tr>
                                                  </tfoot>
                                                </table>
                                              </div>
       
      
                                            <div id="return"></div>     
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
    <script src="ajax/apprejvideo.js"></script>
    <script src="ajax/fetchapprvideo.js"></script>
    <script src="ajax/sidebarsearch.js"></script>
    <script src="ajax/toastr/toastr.min.js"></script>
    <script src="../js/confirm.js"></script>
    <script src="datatable/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/3.3.1/js/dataTables.fixedColumns.min.js"></script>
    <script src="datatable/dataTables.bootstrap4.min.js"></script>
    <script>
    $(document).ready(function() {
    
    var table = $('#load').DataTable( {
        orderCellsTop: true,
        fixedHeader: true,
        ordering: false
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
      table.column(7).search(searchTerms.join('|'), true, false, true).draw();
    });
    
    $('.filter-checkbox-sts').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox-sts'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      table.column(10).search(searchTerms.join('|'), true, false, true).draw();
    });
    
} );
    </script>
</body>

</html>