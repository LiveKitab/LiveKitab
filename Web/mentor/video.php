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
   <main id="homepage-photo">
        
        <div class="ps-page--product ps-page--product-box">
         <div class="mt-5 mb-5 ml-5 mr-5">
            <div class="ps-product--detail ps-product--box">

                <div class="ps-product__content ps-tab-root">
                    <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="dash">Home</a></li>
                    <li>Select Subject</li>
                </ul>
            </div>
        </div>
                    <div class="row">
                        <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="ps-layout__left">
                    <aside class="widget widget_shop ps-product__box">
                        <figure class="ps-custom-scrollbar" data-height="250">
                        <h4 class="widget-title"><b>BY Subject</b></h4>
                            <div class="ps-form--widget-search">
                        <input class="form-control mb-3 subsrch" type="text" placeholder="Search here...">
                        <button><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                        <div id="scrollbar" class="sublist" style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                            <?php
                                $q = "select distinct sub_name from apply_for_subject order by sub_name asc";
                                $result = mysqli_query($con,$q);
                                while($rows = mysqli_fetch_array($result))
                                {
                                ?>
                                <div class="ps-checkbox">
                                    <input class="form-control filter-checkbox-sub" type="checkbox" id="<?php echo $rows['sub_name']; ?>" name="<?php echo $rows['sub_name']; ?>" value="<?php echo $rows['sub_name']; ?>">
                                    <label for="<?php echo $rows['sub_name']; ?>"><?php echo $rows['sub_name']; ?></label>
                                </div>
                            <?php
                            }               
                            ?>
                            </div>
                        </figure>
                        
                        <figure class="ps-custom-scrollbar" data-height="250">
                        <h4 class="widget-title"><b>BY University</b></h4>
                            <div class="ps-form--widget-search">
                        <input class="form-control mb-3 unisrch" type="text" placeholder="Search here...">
                        <button><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                        <div id="scrollbar" class="unilist" style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                            <?php
                                $q = "select distinct uni_name from university_data order by uni_name asc";
                                $result = mysqli_query($con,$q);
                                while($rows = mysqli_fetch_array($result))
                                {
                                ?>
                                <div class="ps-checkbox">
                                    <input class="form-control filter-checkbox-uni" type="checkbox" id="<?php echo $rows['uni_name']; ?>" name="<?php echo $rows['uni_name']; ?>" value="<?php echo $rows['uni_name']; ?>">
                                    <label for="<?php echo $rows['uni_name']; ?>"><?php echo $rows['uni_name']; ?></label>
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
                        <h4 class="widget-title"><b>BY Semester/Year</b></h4>
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
                                    <li class="active"><a href="#tab-1">Select Subject</a></li>
                                </ul>
                                <div class="ps-tabs">
                                    <div class="ps-tab active" id="tab-1">
                                        <div class="ps-document">
                                            <div class="table-responsive">
                                            <table id="load" class="table table-hover table-bordered zero-configuration">
                                              <thead class="thead-dark" align="center">
                                                <tr>
                                                    <th>Index</th>
                                                    <th>University</th>                    
                                                    <th>Stream</th>
                                                    <th>Program</th>
                                                    <th>Branch</th>
                                                    <th style="display:none;">Medium</th>
                                                    <th>Semester/<br>Year</th>
                                                    <th>Subject</th>
                                                    <th>Manage</th>
                                                </tr>
                                              </thead>
                                              <tbody align="center">
                                                <?php
                                            $count = 0; 
                                              $cmd="select * from apply_for_subject where c_id='$c_id' and admin_status='1' ORDER BY id ASC";
                                              $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
                                              while($row=mysqli_fetch_array($result))
                                              {     
                                                  $count = $count + 1;
                                                  $id=$row['id'];
                                                  $sub_id=$row['sub_id'];
                                                   
                                                  $sel1="select * from subject_data where sub_id='$sub_id'";
                                                  $run1=mysqli_query($con,$sel1) or die(mysqli_error($con));
                                                  while($rows1=mysqli_fetch_array($run1))
                                                  {
                                                      $sub_name=$rows1['sub_name'];
                                                      $university_id=$rows1['university_id'];
                                                      $stream_id=$rows1['stream_id'];
                                                      $pr_id=$rows1['pr_id'];
                                                      $b_id=$rows1['b_id'];
                                                      $term_id=$rows1['term_id'];
                                                  }
                                                  
                                                  $sel="select * from term_data where term_id='$term_id'";
                                                  $run=mysqli_query($con,$sel) or die(mysqli_error($con));
                                                  while($rows=mysqli_fetch_array($run))
                                                  {
                                                      $t_name=$rows['term_name'];
                                                      $med=$rows['med'];
                                                  }
                                                  
                                                  $cmd1="select * from stream_data where stream_id='$stream_id' LIMIT 1";
                                                  $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
                                                  while($row1=mysqli_fetch_array($result1))
                                                  {
                                                    $stream_name=$row1['stream_name'];
                                                  }
                                                  
                                                  
                                                    $cmd2="select * from program_data where pr_id='$pr_id' LIMIT 1";
                                                    $result2=mysqli_query($con,$cmd2) or die(mysqli_error($con));
                                                    while($row2=mysqli_fetch_array($result2))
                                                    {
                                                        $program_name=$row2['program_name'];
                                                    }
                                                    
                                                    $cmd2="select * from branch_data where b_id='$b_id' LIMIT 1";
                                                    $result2=mysqli_query($con,$cmd2) or die(mysqli_error($con));
                                                    while($row2=mysqli_fetch_array($result2))
                                                    {
                                                        $branch_name=$row2['b_name'];
                                                    }
                                                    
                                                    $cmd21="select uni_name from university_data where university_id='$university_id' LIMIT 1";
                                                    $result21=mysqli_query($con,$cmd21) or die(mysqli_error($con));
                                                    while($row21=mysqli_fetch_array($result21))
                                                    {
                                                        $uni_name=$row21['uni_name'];
                                                    }
                                                 
                                              ?>
                                                <tr>
                                                    <td><?php echo $count; ?></td>
                                                    <td><?php echo $uni_name; ?></td>
                                                    <td><?php echo $stream_name; ?></td>
                                                    <td><?php echo $program_name; ?></td>
                                                    <td><?php echo $branch_name; ?></td>
                                                    <td style="display:none;"><?php echo $med; ?></td>
                                                    <td><?php echo $t_name; ?></td>
                                                    <td><?php echo $sub_name; ?></td>
                                                    
                                                    <td>
                                                      <a role="button" class="ps-btn" href="addvideo?videodata=<?=base64_encode($sub_id);?>"><i class="fa fa-plus"></i></a>             
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                                ?>
                                              </tbody>
                                              <tfoot align="center" class="thead-dark">
                                                <tr>
                                                    <th>Index</th>
                                                    <th>University</th>                    
                                                    <th>Stream</th>
                                                    <th>Program</th>
                                                    <th>Branch</th>
                                                    <th style="display:none;">Medium</th>
                                                    <th>Semester/<br>Year</th>
                                                    <th>Subject</th>
                                                    <th>Manage</th>
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
    <script src="ajax/toastr/toastr.min.js"></script>
    <script src="../js/confirm.js"></script>
    <script src="ajax/cardsearch.js"></script>
    <script src="ajax/sidebarsearch.js"></script>
    <script src="datatable/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/3.3.1/js/dataTables.fixedColumns.min.js"></script>
    <script src="datatable/dataTables.bootstrap4.min.js"></script>
    <script>
    $(document).ready(function() {
    
    var table = $('#load').DataTable( {
        aLengthMenu: [[10, 50, 100, -1], [10, 50, 100, "All"]],
        iDisplayLength: 10
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
      table.column(6).search(searchTerms.join('|'), true, false, true).draw();
    });
    
    $('.filter-checkbox-med').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox-med'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      table.column(5).search(searchTerms.join('|'), true, false, true).draw();
    });
    
    $('.filter-checkbox-sub').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox-sub'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      table.column(7).search(searchTerms.join('|'), true, false, true).draw();
    });
    
} );
    </script>
</body>

</html>