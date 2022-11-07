<?php
include_once("../db/pconnect.php");
include_once("back/function/session.php");
	if(isset($_GET['videostringdata']))
	{
	    $v_id = mysqli_real_escape_string($con,$_GET['videostringdata']);
	    $v_id = base64_decode($v_id);
	    
	    $cmd="select * from final_video where v_id='$v_id' ORDER BY id ASC";
        $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
        while($row=mysqli_fetch_array($result))
        {     
            $id=$row['id'];
            $course_id=$row['course_id'];
            $v_title=$row['v_title'];
            $v_link=$row['v_link'];
            $v_des=$row['v_des'];
            $v_status=$row['v_status'];
        }
        $like = 0;
        $dislike = 0;
        $rating = 0;
        $count = 0;
        $avg = 0;
        $cmd="select * from video_like_dislike where v_id='$v_id' ORDER BY id ASC";
        $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
        while($row=mysqli_fetch_array($result))
        {     
            $ld_status=$row['ld_status'];
            $count = $count + 1;
            if($ld_status == '1')
            {
                $like = $like + 1;
            }
            if($ld_status == '2')
            {
                $dislike = $dislike + 1;
            }
            $rating=$row['rating'];
            
            $avg = $avg + $rating;
        }
        $rating = $avg/$count;
?>

<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
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
    <link href="datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="ajax/toastr/toastr.css">
    <link rel="stylesheet" href="../css/confirm.css">
    <style>
        .loader
        {
            display:none;
        }
    </style>



    <!-- Main Header -->

<header class="header header--photo" data-sticky="true">
        <?php
        include("design/topnav.php");
        ?>
    </header>
	
	<!-- Main Header End -->
	
	
	<!-- Mobile Header Start -->
    
	<?php
    include("design/mobilenav.php");
    ?>
	
	<!-- Mobile Header End -->
	

   <!-- Dashboard Data Here -->
<main id="homepage-photo">
        
        <div class="container-fluid">
                <center>
                        <iframe src="<?php echo $v_link; ?>" style="margin-top:8%;" width="1920" height="720" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                </center>
                <hr>
                <div class="row"><p class="col-md-3 text-info" style="font-size:18pt;"><i class="fa fa-thumbs-up" aria-hidden="true"></i> <span> </span> <?php echo ' '.$like; ?></p><p class="col-md-3 text-danger" style="font-size:18pt;"><i class="fa fa-thumbs-down" aria-hidden="true"></i>  <?php echo ' '.$dislike; ?></p><p class="col-md-6 text-warning" style="font-size:18pt;"><i class="fa fa-star-half-o" aria-hidden="true"></i> <?php echo ' '.$rating; ?></p></div>
                <hr>
                <div>
                    <p class="text-justify"><b>Description : </b><?php echo $v_des; ?></p>
                </div>
                <hr>
                <div class="table-responsive">
                <table id="comment" class="table table-hover table-bordered zero-configuration">
                    <thead>
                        <tr>
                            <td style="display:none;">id</td>
                            <td>Comments Section</td>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                    $cmd="select comment_video.id,comment_video.comment,comment_video.comment_mentor,comment_video.comment_publisher,comment_video.date,user_data.username from comment_video,user_data where comment_video.u_id=user_data.u_id and comment_video.v_id='$v_id' ORDER BY comment_video.id DESC";
                    $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
                    while($row=mysqli_fetch_array($result))
                    {     
                        $index=$row['id'];
                        $username=$row['username'];
                        $comment=$row['comment'];
                        $timestamp=$row['date'];
                        $comment_mentor=$row['comment_mentor'];
                        $comment_publisher=$row['comment_publisher'];
                        ?>
                        <tr>
                            <td style="display:none;"><?=$index;?></td>
                            <td>
                                <div>
                                    <p class="text-justify"><b><?php echo $username; ?></b><br><small style="font-size:8pt;"><?php echo $timestamp; ?></small><br><?php echo $comment; ?></p>
                                    <?php
                                        if($comment_mentor != 'Not Set')
                                        {
                                            ?>
                                            <p class="text-justify"><b><?php echo 'Mentor'; ?></b><br><?php echo $comment_mentor; ?></p>
                                            <?php
                                        }
                                        if($comment_publisher != 'Not Set')
                                        {
                                            ?>
                                            <p class="text-justify"><b><?php echo 'Publisher'; ?></b><br><?php echo $comment_publisher; ?></p>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                                <button class="ps-btn reply" style="background-color:#dc3545;color:white;">Reply</button>
                                            <?php
                                        }
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <?php
                    }
                    include("back/modal/replyvideo.php");
                ?>
                </tbody>
                </table>
                </div>
        </div>



    <!-- Dashboard End -->




    <!-- Footer Start -->
	<?php
    include("design/footer.php");
    ?>
	<!-- Footer End -->


   <!--include shared/cart-sidebar-->
    <!-- Plugins-->
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
    <script src="ajax/fetchvideo.js"></script>
    <script src="ajax/replyvideo.js"></script>
	<script src="datatable/jquery.dataTables.min.js"></script>
    <script src="datatable/dataTables.bootstrap4.min.js"></script>
    <script src="datatable/datatable-basic.min.js"></script>
    <script src="ajax/toastr/toastr.min.js"></script>
    <script>
        $('#comment').dataTable( {
          "searching": false,
          "bLengthChange": false,
          "ordering": false
        } );
    </script>
</body>

</html>

<?php
}
else
{
    header('location:../../404');
}
?>