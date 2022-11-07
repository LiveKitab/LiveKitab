<?php
include_once("../db/mconnect.php");
include_once("back/function/session.php");

if(isset($_GET['unidata']))
	{
	    $university_id = mysqli_real_escape_string($con,$_GET['unidata']);
	    $university_id = base64_decode($university_id);
	    $stream_id = mysqli_real_escape_string($con,$_GET['stramdata']);
	    $stream_id = base64_decode($stream_id);
	    $pr_id = mysqli_real_escape_string($con,$_GET['programdata']);
	    $pr_id = base64_decode($pr_id);
	    $b_id = mysqli_real_escape_string($con,$_GET['branchdata']);
	    $b_id = base64_decode($b_id);
	    $term_id = mysqli_real_escape_string($con,$_GET['termdata']);
	    $term_id = base64_decode($term_id);
	    $sub_id = mysqli_real_escape_string($con,$_GET['subdata']);
	    $sub_id = base64_decode($sub_id);
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
                        <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="ps-layout__left">
                    <aside class="widget widget_shop ps-product__box">
                        <figure class="ps-custom-scrollbar" data-height="250">
                        <h4 class="widget-title"><b>BY Subject Code</b></h4>
                            <div class="ps-form--widget-search">
                        <input class="form-control mb-3 subsrch" type="text" placeholder="Search here...">
                        <button><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                        <div id="scrollbar" class="sublist" style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                            <?php
                                $q = "select distinct sub_code from subject_data order by sub_code asc";
                                $result = mysqli_query($con,$q);
                                while($rows = mysqli_fetch_array($result))
                                {
                                ?>
                                <div class="ps-checkbox">
                                    <input class="form-control filter-checkbox-sub" type="checkbox" id="<?php echo $rows['sub_code']; ?>" name="<?php echo $rows['sub_code']; ?>" value="<?php echo $rows['sub_code']; ?>">
                                    <label for="<?php echo $rows['sub_code']; ?>"><?php echo $rows['sub_code']; ?></label>
                                </div>
                            <?php
                            }               
                            ?>
                            </div>
                        </figure>
                    
                </div>
                    </div>
                    
                    
                        <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12 " style="margin-bottom:30px;">
                            <div class="ps-product__box">
                                <ul class="ps-tab-list">
                                    <li class="active"><a href="#tab-1">Explore Subject</a></li>
                                </ul>
                                <div class="ps-tabs">
                                    <div class="ps-tab active" id="tab-1">
                                        <div class="ps-document">
                                            <div class="table-responsive">
                                            <table id="load" class="table table-hover table-bordered zero-configuration" width="100%">
                                              <thead class="thead-dark" align="center">
                                                <tr>
                                                    <th>Index</th>
                                                    <th style="display:none;">Subject ID</th>
                                                    <th>Subject Name</th>
                                                    <th>Subject Code</th>
                                                    <th>Apply</th>
                                                </tr>
                                              </thead>
                                              <tbody align="center">
                                                <?php
                                            $count = 0; 
                                              $cmd="select * from subject_data where university_id='$university_id' and stream_id='$stream_id' and pr_id='$pr_id' and b_id='$b_id' and term_id='$term_id' ORDER BY id ASC";
                                              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
                                              while($row=mysqli_fetch_array($result))
                                              {     
                                                  $count = $count + 1;
                                                  $id=$row['id'];
                                                  $sub_id=$row['sub_id'];
                                                  $sub_status=$row['sub_status'];
                                                  $sub_name=$row['sub_name'];
                                                  $sub_code=$row['sub_code'];
                                                  $sub_bg=$row['sub_bg'];
                                                  $term_id=$row['term_id'];
                                                  $stream_id=$row['stream_id'];
                                                  $b_id=$row['b_id'];
                                                  $pr_id=$row['pr_id'];
                                                  $university_id = $row['university_id'];
                                                 
                                              ?>
                                                <tr>
                                                    <td><?php echo $count; ?></td>
                                                    <td style="display:none;"><?php echo $sub_id; ?></td>
                                                    <td><?php echo $sub_name;?></td>
                                                    <td><?php echo $sub_code;?></td>
                                                    <td>
                                                    <?php
                                                    $sel = "select admin_status from apply_for_subject where c_id='$c_id' and sub_id='$sub_id'";
                                                    $q = mysqli_query($con,$sel);
                                                    if(mysqli_num_rows($q)>0)
                                                    {
                                                        while($fetch = mysqli_fetch_array($q))
                                                        {
                                                            $as = $fetch['admin_status'];
                                                        }
                                                        if($as == 0)
                                                        {
                                                            ?><span class="badge badge-pill badge-warning">Request Pending</span><?php
                                                        }
                                                        else if($as == 1)
                                                        {
                                                            ?><span class="badge badge-pill badge-primary">Request Approved</span><?php
                                                        }
                                                        else if($as == 2)
                                                        {
                                                            ?><span class="badge badge-pill badge-danger">Request Rejected</span><?php
                                                        }
                                                        
                                                    }
                                                    else
                                                    {
                                                        ?><button type="button" class="ps-btn applycourse" style="background-color:#28a745">Apply</button><?php
                                                    }
                                                    ?>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                                include_once("back/modal/applycourse.php");
                                                ?>
                                              </tbody>
                                              <tfoot align="center" class="thead-dark">
                                                <tr>
                                                    <th>Index</th>
                                                    <th style="display:none;">Subject ID</th>
                                                    <th>Subject Name</th>
                                                    <th>Subject Code</th>
                                                    <th>Apply</th>
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
    <script src="ajax/fetchallcourses.js"></script>
    <script src="ajax/sidebarsearch.js"></script>
    <script src="ajax/toastr/toastr.min.js"></script>
    <script src="ajax/applycourse.js"></script>
    <script src="../js/imgpreview.js"></script>
    <script src="datatable/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/3.3.1/js/dataTables.fixedColumns.min.js"></script>
    <script src="datatable/dataTables.bootstrap4.min.js"></script>
   <script>
    $(document).ready(function() {
    
    var table = $('#load').DataTable( {
        aLengthMenu: [[10, 25, 50, 75, -1], [10, 25, 50, 75, "All"]],
        iDisplayLength: 10
    } );
    
    $('.filter-checkbox-sub').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox-sub'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      table.column(3).search(searchTerms.join('|'), true, false, true).draw();
    });
} );
    </script>
</body>
</html>
<?php
}
?>