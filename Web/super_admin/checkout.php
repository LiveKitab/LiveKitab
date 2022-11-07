<?php
include("../db/connect.php");

$nsubs=0;
if(isset($_GET['coursedata']) && isset($_GET['creatordata']))
{
    $cs_id = $_GET['coursedata'];
    $cs_id = base64_decode($cs_id);
    $c_id = $_GET['creatordata'];
    $c_id = base64_decode($c_id);
    
    $cmd7="select * from creator_data where c_id='$c_id'";
    $result7=mysqli_query($con,$cmd7) or die(mysqli_error($con));
    while($row7=mysqli_fetch_array($result7))
    {
        $c_name=$row7['c_name'].' '.$row7['c_lname'];
        $ccno=$row7['c_cno'];
        $mid=$row7['mid'];
        $mkey=$row7['m_key'];
    }
    
    $cmd3="select * from course_data where course_id='$cs_id'";
    $result3=mysqli_query($con,$cmd3) or die(mysqli_error($con));
    while($row3=mysqli_fetch_array($result3))
    {
        $course_name=$row3['course_name'];
        $course_price=$row3['course_price'];
        $subcode=$row3['sub_code'];
    }
    
    $cmd2="select purchased_courses.id from purchased_courses,course_data where purchased_courses.course_id=course_data.course_id and course_data.c_id='$c_id'";
              $result2=mysqli_query($con,$cmd2) or die(mysqli_error($con));
              while($row2=mysqli_fetch_array($result2))
              {
                $nsubs=$nsubs+1;    
              }
              
              $cmd5="select * from account_admin where c_id='$c_id'";
              $result5=mysqli_query($con,$cmd5) or die(mysqli_error($con));
              while($row5=mysqli_fetch_array($result5))
              {
                $per=$row5['c_per'];
              }
              
              $cmd4="select * from creator_payment where c_id='$c_id'";
              $result4=mysqli_query($con,$cmd4) or die(mysqli_error($con));
              while($row4=mysqli_fetch_array($result4))
              {
                $amount=$row4['payment_amount'];
                $pm=$row4['payment_method'];
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
    <link rel="stylesheet" href="../plugins/bootstrap4/css/bootstrap.min.css">
    <link rel="stylesheet" href="../plugins/owl-carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="../plugins/slick/slick/slick.css">
    <link rel="stylesheet" href="../plugins/lightGallery-master/dist/css/lightgallery.min.css">
    <link rel="stylesheet" href="../plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css">
    <link rel="stylesheet" href="../plugins/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="../plugins/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/home-photo.css">
    <link rel="stylesheet" href="ajax/toastr/toastr.css">
    <link href="datatable/dataTables.bootstrap4.min.css" rel="stylesheet">

    <style type="text/css">
        .loader
        {
            display:none;
        }
        .loading
        {
            display:none;
        }
        
        #wrapper_1 {
  background-color: pink;
  height: 100px;
  float: left;
  width: 100px;
}
#wrapper_1:after {
  content: "";
  background-color: #000;
  position: absolute;
  width: 5px;
  height: 100px;
  top: 10px;
  left: 50%;
  display: block;
}
#wrapper_2 {
  background-color: brown;
  height: 100px;
  width: 100px;
  float: right;
}
    </style>


</head>

<body>

    <!-- Main Header -->

    <header class="header header--photo" data-sticky="true">
	<?php
	include_once("design/topnav.php");
	?>

    </header>
	
	<!-- Main Header End -->
	
	
	<!-- Mobile Header Start -->
    
	<?php 
	include_once("design/mobilenav.php");
	?>


	
	<!-- Mobile Header End -->

    <!-- Dashboard Data Here -->
    <main id="homepage-photo">
        
        <div class="ps-checkout ps-section--shopping" style="margin-top:35px;">
            <div class="container">
               
                <div class="ps-section__content">
                        <div class="row">
                            <div class="col-md-6" id="wrapper1">
                                <div class="ps-form__billing-info">
                                    <h3 class="ps-form__heading">Creator Details</h3>
                                    <div class="form-group">
                                        <label>Creator Name<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <input class="form-control" type="text" style="background-color:white;" value="<?php echo $c_name; ?>" disabled/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Creator Contact<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <input class="form-control" type="text" style="background-color:white;" value="<?php echo $ccno; ?>" disabled/>
                                        </div>
                                    </div>
                                
                                    <div class="form-group">
                                        <label>Subject Name<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <input class="form-control" type="text" value="<?php echo $course_name; ?>" style="background-color:white;" disabled/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Subject Code<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <input class="form-control" type="text" style="background-color:white;" value="<?php echo $subcode; ?>" disabled/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Subject Price<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <input class="form-control" type="text" style="background-color:white;" value="<?php echo $course_price; ?>" disabled/>
                                        </div>
                                    </div>
                                    
                                    <hr>
                                
                                </div>
                            </div>
                            
                            <div class="col-md-6" id="wrapper2">
                                <div class="ps-form__total">
                                    <h3 class="ps-form__heading">Billing Details</h3>
                                    <div class="content">
                                        <div class="ps-block--checkout-total">
                                            
                                        </div>
                                        
                                        <form action="../payment/PaytmKit/TxnTest.php" id="myform" method="post">
                                            
                                            <input type="hidden" id="ORDER_ID"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo  "ORDS" . rand(10000,99999999)?>">
						
						<input type="hidden" id="mid"
						name="mid" autocomplete="off"
						value="<?php echo $mid; ?>">
						
						<input type="hidden" id="m_key"
						name="m_key" autocomplete="off"
						value="<?php echo $mkey; ?>">
						
						<input type="hidden" id="crt_id"
						name="crt_id" autocomplete="off"
						value="<?php echo $c_id; ?>">
						
						<input type="hidden" id="course_id"
						name="course_id" autocomplete="off"
						value="<?php echo $cs_id; ?>">
						
                                          <div class="form-group">
                  <label for="">Select Month :<sup style="color:red;">*</sup></label>
                  <select class="form-control browser-default custom-select" name="MONTH" id="MONTH" required>
                    <option value="" selected>--Select Month--</option>
                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                  </select>
                </div>
                
                <div class="form-group">
                  <label for="">Select Year :<sup style="color:red;">*</sup></label>
                  <select class="form-control browser-default custom-select" name="YEAR" id="YEAR" required>
                    <option value="" selected>--Select Year--</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                    <option value="2029">2029</option>
                    <option value="2030">2030</option>
                    
                  </select>
                </div>
                                
                                <div class="form-group">
                                <label for="t_date">Amount:<sup style="color:red;">*</sup></label>
                                <input type="number" class="form-control" name="AMOUNT" id="AMOUNT" aria-describedby="helpId" placeholder="Amount" required />

                                </div>
                                
                                
                                
                                
                            
                            <div class="form-group">
                    <label for="">Remark:<sup style="color:red;">*</sup></label>
                      <textarea class="form-control" name="RMK" id="RMK" placeholder="Remarks..." rows="3"></textarea>
                </div>
                    <button type="submit" class="ps-btn ps-btn--fullwidth" name="submit" id="submit">Proceed to checkout</button>
        
                                        </form><br>
                                        <div id="return"></div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <!-- Modal -->
                                             <div class="modal fade" id="ModalId">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Add New Delivery Address</h4>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form onsubmit="return addnew(this);" id="MyForm" method="post">
                    
                    
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label>Enter New Address :</label>
                            <textarea type="text" class="form-control" name="newaddr" id="newaddr" placeholder="Enter New Address..."
                                autocomplete="" maxlength="" required></textarea>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Pin Code :</label>
                            <input type="number" class="form-control" name="pincode" id="pincode" placeholder="Enter PIN Code..."
                                autocomplete="" maxlength="" required />
                        </div>
                        <div class="col-md-6 form-group">
                            <label>State :</label>
                            <input type="text" class="form-control" name="state" id="state" placeholder="State"
                                autocomplete="" maxlength="" required />
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>City :</label>
                            <input type="text" class="form-control" name="city" id="city" placeholder="City"
                                autocomplete="" maxlength="" required />
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Zone :</label>
                            <input type="text" class="form-control" name="zone" id="zone" placeholder="Zone"
                                autocomplete="" maxlength="" required />
                        </div>
                    </div>

<br>



                    <div class="modal-footer">
                        <button type="submit" style="background-color:#28a745;" class="zocarro-btn " name="add" id="add"
                            required>Submit</button>
                        <button type="reset" name="reset" id="reset" value="reset" class="zocarro-btn"
                            style="background-color: #dc3545;" data-dismiss="modal">Close</button>
                        <div class="loading" id="loading">
                            <img src="../loader/form.gif" width="140px" alt="">
                        </div>

                    </div>

                </form>
                <div id="result"></div>
            </div>

        </div>
    </div>
</div>

       
       
	
    <!-- Dashboard End -->



    <!-- Footer Start -->
	<?php
	include_once("design/footer.php");
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
    <script src="ajax/toastr/toastr.min.js"></script>
    <!--<script src="ajax/check_session.js"></script>    -->
    <script src="ajax/themes.js"></script>
    <script src="ajax/checkout.js"></script>
    <script src="ajax/addnewaddr.js"></script>
    <script>
        function myfun(datavalue) {
            $('#staddr').html(datavalue);
            $('#addr').html(datavalue);
            
        }
    </script>
    
</body>

</html>
<?php
}
?>
