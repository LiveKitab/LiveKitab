<?php
include_once("../db/connect.php");
include_once("back/function/session.php");
if(isset($_GET['ststringdata']) && isset($_GET['prstringdata']) && isset($_GET['bstringdata']) && isset($_GET['tstringdata']))
	{
	    $stream_id = mysqli_real_escape_string($con,$_GET['ststringdata']);
	    $stream_id = base64_decode($stream_id);
	    
	    $pr_id = mysqli_real_escape_string($con,$_GET['prstringdata']);
	    $pr_id = base64_decode($pr_id);
	    
	    $b_id = mysqli_real_escape_string($con,$_GET['bstringdata']);
	    $b_id = base64_decode($b_id);
	    
	    $t_id = mysqli_real_escape_string($con,$_GET['tstringdata']);
	    $t_id = base64_decode($t_id);
	    
	    $cmd="select * from term_data where term_id='$t_id' LIMIT 1";
             $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
              while($row=mysqli_fetch_array($result))
              {
                  $t_name=$row['term_name'];
                  $med=$row['med'];
              }
              
              $cmd1="select * from stream_data where stream_id='$stream_id' LIMIT 1";
              $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
              while($row1=mysqli_fetch_array($result1))
              {
                $stream_name=$row1['stream_name'];
                $uni_name=$row1['uni'];
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
    <link rel="stylesheet" href="../css/imgpreview.css"></script>
    <style>
        .loader
        {
            display:none;
        }
        .card {
          margin: 1em 1em 1em 1.8em;
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
                    <li><a href="selectstructure">Select Structure</a></li>
                    <li>Add Subject</li>
                </ul>
            </div>
        </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 " style="margin-bottom:30px;">
                            <div class="ps-product__box">
                                <ul class="ps-tab-list">
                                    <li class="active"><a href="#tab-1">View Subject</a></li>
                                    <li><a href="#tab-2">Add Subject</a></li>
                                </ul>
                                <div class="ps-tabs">
                                    <div class="ps-tab active" id="tab-1">
                                        <div class="ps-document">
                                            <?php 
                                            include_once('back/display/displaycourses.php');
                                            ?>  
                                                 
                                        </div>
                                    </div>
                                    
                                    <div class="ps-tab" id="tab-2">
                                        <div class="ps-document">
                                              
                                              <form onsubmit="return courses(this);" method="post" id="myform" enctype="multipart/form-data">
                <input type="hidden" name="stream_id" id="stream_id" value="<?php echo $stream_id; ?>">
                <input type="hidden" name="pr_id" id="pr_id" value="<?php echo $pr_id; ?>">
                <input type="hidden" name="b_id" id="b_id" value="<?php echo $b_id; ?>">
                <input type="hidden" name="t_id" id="t_id" value="<?php echo $t_id; ?>">
                
                <div class="form-group">
                  <label for="">Mentor :<sup style="color:red;">*</sup></label>
                  <select class="form-control browser-default custom-select" name="mentor" id="mentor" required>
                    <option value="">-- Select Mentor --</option>
                    <?php
                            $q = "select * from creator_data order by id asc";
                            $result = mysqli_query($con,$q);
                            while($rows = mysqli_fetch_array($result))
                    {
                    ?>
                            
                            <option value="<?php echo $rows['c_id'];?>"><?php echo $rows['c_name'].' '.$rows['c_fname'].' '.$rows['c_lname']; ?></option>
                    <?php
                    }               
                    ?>
                  </select>
                </div>
                
                <div class="form-group">
                  <label for="">Publisher :<sup style="color:red;">*</sup></label>
                  <select class="form-control browser-default custom-select" name="publisher" id="publisher" required>
                    <option value="">-- Select Publisher --</option>
                    <?php
                            $q = "select * from editor_data order by id asc";
                            $result = mysqli_query($con,$q);
                            while($rows1 = mysqli_fetch_array($result))
                    {
                    ?>
                            
                            <option value="<?php echo $rows1['e_id']; ?>"><?php echo $rows1['e_name']; ?></option>
                    <?php
                    }               
                    ?>
                  </select>
                </div>
                
                
<div class="form-group">
  <label for="header">Subject Name:<sup style="color:red;">*</sup></label>
  <input type="text" class="form-control" name="cname" id="cname" aria-describedby="helpId" placeholder="Subject Name" required />
</div>

<div class="form-group">
  <label for="header">Subject Code:<sup style="color:red;">*</sup></label>
  <input type="number" class="form-control" name="scode" id="scode" aria-describedby="helpId" placeholder="Subject Code" required />
</div>

<div class="form-group">
  <label for="header">Subject Credit:<sup style="color:red;">*</sup></label>
  <input type="number" class="form-control" name="scredit" id="scredit" aria-describedby="helpId" placeholder="Subject Credit" required />
</div>


<div class="form-group">
  <label for="header">Subject Price:<sup style="color:red;">*</sup></label>
  <input type="number" class="form-control" name="cprice" id="cprice" aria-describedby="helpId" placeholder="Subject Price" required />
</div>

<div class="form-group">
  <label for="header">Subject Discount in %:<sup style="color:red;">*</sup></label>
  <input type="number" class="form-control" name="cdis" id="cdis" aria-describedby="helpId" placeholder="Subject Discount in %" required />
</div>

<div class="form-group">
  <label for="header">Subject Plan Duration In Hours:<sup style="color:red;">*</sup></label>
  <input type="number" class="form-control" name="c_duration" id="c_duration" aria-describedby="helpId" placeholder="Subject Plan Duration In Hours" required />
</div>

<div class="form-group">
                    <label for="">Subject Description:<sup style="color:red;">*</sup></label>
                      <textarea class="form-control" name="c_des" id="c_des" placeholder="Subject Description here..." rows="3"></textarea>
                </div>
                
                <div class="form-group">
  <label for="header">Subject Video Limit:<sup style="color:red;">*</sup></label>
  <input type="number" class="form-control" name="limit" id="limit" aria-describedby="helpId" placeholder="Subject Video Limit" required />
</div>
                
                <label for="">Subject Background:<sup style="color:red;">*</sup></label>        
  <div class="col-sm-2 imgUp">
    <div class="imagePreview"></div>

				<input type="file" class="uploadFile img" style="height:45px; border:none;" name="bg_img" id="bg_img">
				
  </div>
  
  <label for="">Subject Booklet:<sup style="color:red;">*</sup></label>        
  <div class="col-sm-2 imgUp">
    <div class="imagePreview"></div>

				<input type="file" class="uploadFile img" style="height:45px; border:none;" name="bk_img" id="bk_img">
				
  </div>




<small id="helpId" class="form-text" style="color:red; font-size:10pt;">* Fields are
                        Mandatory</small><br>

<button type="submit" name="submit" id="submit" class="ps-btn" style="background-color:#28a745;">Add</button>
<button type="reset"  name="cancel" id="cancel" class="ps-btn" style="background-color:#dc3545;">Reset</button>
<div class="loader" id="loader">
                                    <img src="../loader/form.gif" width="140px" alt="">
                            </div>

</form>
											<br>
											<div id="courses"></div>
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
    
    <script src="ajax/addcourses.js"></script>
    <script src="ajax/toastr/toastr.min.js"></script>
    <script src="../js/imgpreview.js"></script>
    <script src="datatable/jquery.dataTables.min.js"></script>
    <script src="datatable/dataTables.bootstrap4.min.js"></script>
    <script src="datatable/datatable-basic.min.js"></script>
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
    <script>
        function myfun(datavalue) {
    $.ajax({
        url: 'back/operation/structuredropdown.php',
        type: 'POST',
        data: { datapost: datavalue },
        success: function(cat) {
            $('#program').html(cat);
        }
    });
}
    </script>
    
</body>

</html>
<?php
}
?>