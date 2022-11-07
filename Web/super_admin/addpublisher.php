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
    <link rel="stylesheet" href="ajax/toastr/toastr.css">
    <link href="datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        .loader{
            display:none;
        }
    </style>
    <script>
            function random_function()
            {
                var a=document.getElementById("state").value;
                if(a==="Gujarat")
                {
                    var arr=["Bhavnagar","Ahemdabad","Surat"];
                }
                
               
                var string="";
               
                for(i=0;i<arr.length;i++)
                {
                    string=string+"<option>"+arr[i]+"</option>";
                }
                string="<select class='form-control browser-default custom-select' name='any_name'>"+string+"</select>";
                document.getElementById("city").innerHTML=string;
            }
        </script>
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
                    <li>Add Publisher</li>
                </ul>
            </div>
        </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 " style="margin-bottom:30px;">
                            <div class="ps-product__box">
                                <ul class="ps-tab-list">
                                    <li class="active"><a href="#tab-1">View Publisher</a></li>
                                    <li><a href="#tab-2">Add Publisher</a></li>
                                </ul>
                                <div class="ps-tabs">
                                    <div class="ps-tab active" id="tab-1">
                                        <div class="ps-document">
                                            <?php 
                                            include_once('back/display/displaypublisher.php');
                                        ?>  
                                                 
                                        </div>
                                    </div>
                                    
                                    <div class="ps-tab" id="tab-2">
                                        <div class="ps-document">
                                            <form method="post" id="myform">
                                         
                
                
                
                <div class="row">
                <div class="col-md-4 form-group">
                    <label for="">Name:<sup style="color:red;">*</sup></label><br>
					<input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="Name" required />
                </div>
                
                <div class="col-md-4 form-group">
                    <label for="">Contact:<sup style="color:red;">*</sup></label><br>
					<input type="number" class="form-control" name="contact" id="contact" aria-describedby="helpId" placeholder="Contact" required />
                </div>
                
                <div class="col-md-4 form-group">
                    <label for="">Email:<sup style="color:red;">*</sup></label><br>
					<input type="email" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="Email" required />
                </div>
                </div>
                
                <div class="form-group">
                    <label for="">Address:<sup style="color:red;">*</sup></label>
                      <textarea class="form-control" name="addr" id="addr" placeholder="Address here..." rows="3"></textarea>
                </div>
                
                <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="a_name">State<sup style="color:red;">*</sup> </label>
                            <select  class="form-control browser-default custom-select" name="state" id="state" onchange="random_function()">
                                <option>--Select State--</option>
                                <option>Gujarat</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="a_name">City<sup style="color:red;">*</sup> </label>
                            <select  class="form-control browser-default custom-select" name="city" id="city">
                                <option>--Select City--</option>
                            </select>
                        </div>

                    </div>
                
                <div class="form-group">
                    <label for="">Description:<sup style="color:red;">*</sup></label>
                      <textarea class="form-control" name="des" id="des" placeholder="Description here..." rows="3"></textarea>
                </div>
                
                <div class="row">
                <div class="col-md-6 form-group">
                    <label for="">Password:<sup style="color:red;">*</sup></label><br>
					<input type="password" class="form-control" name="pass" id="pass" aria-describedby="helpId" placeholder="Password" required />
                </div>
                
                <div class="col-md-6 form-group">
                    <label for="">Confirm Password:<sup style="color:red;">*</sup></label><br>
					<input type="password" class="form-control" name="pass1" id="pass1" aria-describedby="helpId" placeholder="Confirm Password" required />
                </div>
                </div>
                
                <small id="helpId" class="form-text" style="color:red; font-size:10pt;">* Fields are
                        Mandatory</small>

                <hr>
                    <button type="submit"  name="submit" id="submit"
                        value="submit" class="ps-btn">Add</button>
                    <button class="ps-btn" type="reset" name="reset" value="reset" id="reset"
                        style="background-color:#28a745;">Cancel</button>
                <div class="loader" id="loader">
                <img src="../loader/form.gif" width="150px" alt="">
                </div>
            </form>
											<br>
											<div id="editor"></div>
											
										
                                           
                                    
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
    <script src="ajax/addpublisher.js"></script>
    <script src="ajax/toastr/toastr.min.js"></script>
    <script src="datatable/jquery.dataTables.min.js"></script>
    <script src="datatable/dataTables.bootstrap4.min.js"></script>
    <script src="datatable/datatable-basic.min.js"></script>
</body>

</html>