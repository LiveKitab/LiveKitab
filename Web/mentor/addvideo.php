<?php
include_once("../db/mconnect.php");

if(isset($_GET['videodata']))
	{
	    $subject_id = mysqli_real_escape_string($con,$_GET['videodata']);
	    $subject_id = base64_decode($subject_id);
	    
	    $cmd3="select * from apply_for_subject where sub_id='$subject_id'";
        $result3=mysqli_query($con,$cmd3) or die(mysqli_error($con));
        while($row=mysqli_fetch_array($result3))
        {
            $subcode=$row['sub_code'];
            $sub_name=$row['sub_name'];
        }
        
        $q12 = "select * from creator_video where subject_id='$subject_id'";
        $result12 = mysqli_query($con,$q12);
        while($rows1 = mysqli_fetch_array($result12))
        {
            $chap_id = $rows1['ch_id']; 
            $seq = $rows1['ch_id'];
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
        <div class="container">
            <div class="ps-product--detail ps-product--box">

                <div class="ps-product__content ps-tab-root">
                           <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="dash">Home</a></li>
                    <li>Subject Name : <a href="video"><?php echo  $sub_name; ?></a>&nbsp;&nbsp;Subject Code : <a href="video"><?php echo $subcode; ?></a></li>
                    <li>Add Video</li>
                </ul>
            </div>
        </div>
                    
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 " style="margin-bottom:30px;">
                            <div class="ps-product__box">
                                <ul class="ps-tab-list">
                                    <li><a href="#tab-1">Subject Analysis</a></li>
                                    <li class="active"><a href="#tab-2">View Video Content</a></li>
                                    <li><a href="#tab-3">Send Video Content</a></li>
                                </ul>
                                <div class="ps-tabs">
                                    
                                    <div class="ps-tab" id="tab-1">
                                        <div class="ps-document" id="refresh">
                                            <?php 
                                            include_once('back/display/displaysubdata.php');
                                            ?>  
                                        </div>
                                    </div>
                                    
                                    <div class="ps-tab active" id="tab-2">
                                        <div class="ps-document">
                                            <?php 
                                            include_once('back/display/displayvideo.php');
                                            ?>  
                                        </div>
                                    </div>
                                    
                                    <div class="ps-tab" id="tab-3">
                                        <div class="ps-document">
                                              
                                              <form onsubmit="return video(this);" method="post" id="myform" enctype="multipart/form-data">
                                   
                                   <input type="hidden" name="subject_id" id="subject_id" value="<?php echo $subject_id; ?>">

                                 <div class="form-group">
                                    <label for="header">Chapter No. :<sup style="color:red;">*</sup></label>  
                                <select class="form-control browser-default custom-select" name="ch_no" id="ch_no" required>
                                    <option value="">--Select Chapter Name.--</option>
                                    
                                    <?php
                                      $q = "select * from chapter_data where sub_id='$subject_id'";
                                      $result = mysqli_query($con,$q);
                                      while($rows = mysqli_fetch_array($result))
                                      {
                                          
                                      $chapter= $rows['ch_no'].'-'.$rows['ch_name'];
                                    
                                     
                                      ?>
                                    <option value="<?php echo $rows['ch_id'];?>"><?=$chapter;?></option>
                                    <?php
                                      }
                                     
                                    ?>
                                </select>
                                </div>
<div class="form-group">
  <label for="header">Video Title :<sup style="color:red;">*</sup></label>
  <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Title Name" required />
</div>


<div class="form-group">
  <label for="header">Video Link:<sup style="color:red;">*</sup></label>
  <input type="text" class="form-control" name="link" id="link" aria-describedby="helpId" placeholder="Video Link" required />
</div>



<div class="form-group">
                    <label for="">Description:<sup style="color:red;">*</sup></label>
                      <textarea class="form-control" name="v_des" id="v_des" placeholder="Description here..." rows="3"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="">Remarks Of Editing:<sup style="color:red;">*</sup></label>
                      <textarea class="form-control" name="remark" id="remark" placeholder="Remarks Of Editing here..." rows="3"></textarea>
                </div>

<small id="helpId" class="form-text" style="color:red; font-size:10pt;">* Fields are
                        Mandatory</small><br>

<button type="submit" name="video_submit" id="video_submit" class="ps-btn" style="background-color:#28a745;">Add </button>
<button type="reset"  name="reset1" id="reset1" class="ps-btn" style="background-color:#dc3545;">Reset</button>
<div class="loader" id="loader">
                                    <img src="../loader/form.gif" width="140px" alt="">
                            </div>

</form>
											<br>
											<div id="video"></div>
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
    <script src="ajax/addvideo.js"></script>
    <script src="ajax/toastr/toastr.min.js"></script>
    <script src="../js/imgpreview.js"></script>
    <script src="datatable/jquery.dataTables.min.js"></script>
    <script src="datatable/dataTables.bootstrap4.min.js"></script>
    <script src="datatable/datatable-basic.min.js"></script>
    <script>
    $('#load').dataTable( {
      "ordering": false
    } );    
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('dblclick', '.showmodal', function(e) {
            $('#viewmodal').modal('show');
            
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
            return $(this).text();
            }).get();
            
            $('#vid').val(data[0]);
            $('#vcname').val(data[1]);
            $('#vcprice').val(data[2]);
            $('#vcpd').val(data[3]);
            $('#vcdes').val(data[8]);
            $('#vcsdate').val(data[5]);
            $('#vcedate').val(data[6]);
        
        });
});
    </script>
    
</body>

</html>
<?php
}
?>