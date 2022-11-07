<?php
include_once("db/mconnect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

 <title>Zocarro | Live Kitab</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
 <link href="img/icons/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">  
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: FlexStart - v1.4.0
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="default.php" class="logo d-flex align-items-center">
        <img src="images/a.png" alt="">
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="https://livekitab.com">Home</a></li>
          <li><a class="nav-link scrollto" href="https://livekitab.com">About</a></li>
          <li><a class="nav-link scrollto" href="https://livekitab.com">Services</a></li>
          <!--<li><a class="nav-link scrollto" href="https://livekitab.com">Portfolio</a></li>-->
          <li><a class="nav-link scrollto" href="https://livekitab.com">Team</a></li>
          <li><a target="_blank" href="blog.php">Blog</a></li>
         
          
          <li><a class="nav-link scrollto" href="https://livekitab.com">Contact</a></li>
          <li><a target="_blank" class="getstarted scrollto" href="https://livekitab.com/videobook/Web/mentor/">Login As Mentor</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="default">Home</a></li>
          <li><a href="blog">Blog</a></li>
          <li>Blog Single</li>
        </ol>
        <h2>Blog Single</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry entry-single">

              <div class="entry-img" >
                <img src="assets/img/blog/ab.jpg" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="blog-single.php"><i class="fa fa-video-camera" aria-hidden="true"></i>&nbsp;Key Benefits of online learning</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.php">Rohit Shihora</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.php"><time datetime="2020-01-01">July 1st, 2021</time></a></li>
                  <?php
                  $cmd="Select * from comment";
                  $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
                  $no=mysqli_num_rows($result);
                  ?>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.php"><?php echo $no;?>&nbsp;Comments</a></li>
                </ul>
              </div>

              <div class="entry-content">
                  <h2><i class="fa fa-leanpub" aria-hidden="true"></i>&nbsp;Learn from anywhere, any time</h2>
                <p>
                  It gives the best flexibility and allows every student to learn at his/her own pace. This is the great benefit of online education for students with many duties to balance with. Since everything is available online, accessing class materials and submitting work is very convenient. Exactly when and where this takes place is up to the student.
                </p>

                <!--<p>-->
                <!--  Sit repellat hic cupiditate hic ut nemo. Quis nihil sunt non reiciendis. Sequi in accusamus harum vel aspernatur. Excepturi numquam nihil cumque odio. Et voluptate cupiditate.-->
                <!--</p>-->

                <!--<blockquote>-->
                <!--  <p>-->
                <!--    Et vero doloremque tempore voluptatem ratione vel aut. Deleniti sunt animi aut. Aut eos aliquam doloribus minus autem quos.-->
                <!--  </p>-->
                <!--</blockquote>-->

                <!--<p>-->
                <!--  Sed quo laboriosam qui architecto. Occaecati repellendus omnis dicta inventore tempore provident voluptas mollitia aliquid. Id repellendus quia. Asperiores nihil magni dicta est suscipit perspiciatis. Voluptate ex rerum assumenda dolores nihil quaerat.-->
                <!--  Dolor porro tempora et quibusdam voluptas. Beatae aut at ad qui tempore corrupti velit quisquam rerum. Omnis dolorum exercitationem harum qui qui blanditiis neque.-->
                <!--  Iusto autem itaque. Repudiandae hic quae aspernatur ea neque qui. Architecto voluptatem magni. Vel magnam quod et tempora deleniti error rerum nihil tempora.-->
                <!--</p>-->

                <h3><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;Flexible schedule </h3>
                <p>
                  Students may have to go to in-person classes that last hours in offline classes. While not all online programs are built the same, many use PowerPoint presentations and other media that students can digest in pieces. In other words, a student can experience half of a lesson one day, and the second half the next day. This can be especially helpful for those who don’t enjoy sitting in one place for too long.
                  </p>
                <img src="assets/img/blog/abc.jpg" class="img-fluid" alt="">

                <h3><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Diversity</h3>
                <p>
                  Traditional students are often limited to courses and teachers close to home. In the online system, students can take any course from a teacher in a different area/city so they don't need to leave the home. 
                  </p>
               <h3><i class="fa fa-inr" aria-hidden="true"></i>&nbsp;Cost-effective</h3>
                <p>
                 Students can save money by avoiding many fees typical of classes-based education, including travelling costs, fuel costs, etc. Imagine living in Saraspur but going to classes in Bopal everyday.
                 </p>
                  <h3><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;Instructor availability</h3>
                <p>
                  At traditional classes, talking to a professor after class can be challenging. Yes, they have limited hours, with too many students waiting for attention. Professors can also be present online at night or during intermissions to address questions, leave comments and more.
                  </p>
                
                <p>
                  In recent years online forms of education have evolved and are widely accepted. You monitor your study environment with an online class, which allows you to gain a more profound understanding of your course. 
                New learning models are constantly emerging on the market and give students various ways to fashion their education into something that suits them, not the rest. This also gives individuals a chance to complete a degree that they may have started and have not been able to continue for whatever reason. The future of online learning is exciting and opens education for a significant number of people.
                </p>

              </div>

              <div class="entry-footer">
                <i class="bi bi-folder"></i>
                <ul class="cats">
                  <li><a href="#">Business</a></li>
                </ul>

                <i class="bi bi-tags"></i>
                <ul class="tags">
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li>
                </ul>
              </div>

            </article><!-- End blog entry -->
            
            <h2><i class="fa fa-comments" aria-hidden="true"></i>&nbsp;Comments From Users</h2><hr/>
            <?php
            $cmd1="select * from comment";
            $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
            while($rows1=mysqli_fetch_array($result1))
            {  
                $name=$rows1['name'];
                $date=$rows1['date'];
                $comment=$rows1['comment'];
            ?>
            <div class="blog-author d-flex align-items-center">
              <img src="src/creator/images.png" class="rounded-circle float-left" alt="">
              <div>
                <h4><?php echo $name;?></h4>
                <h5><?php echo $date;?></h5>
                <!--<div class="social-links">-->
                <!--  <a href="https://twitters.com/#"><i class="bi bi-twitter"></i></a>-->
                <!--  <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>-->
                <!--  <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>-->
                <!--</div>-->
                <p><?php echo $comment;?></p>
              </div>
            </div><!-- End blog author bio -->
            <?php
                }
            ?>
            <div class="blog-comments">

              <!--<h4 class="comments-count">8 Comments</h4>-->

              <!--<div id="comment-1" class="comment">-->
              <!--  <div class="d-flex">-->
              <!--    <div class="comment-img"><img src="assets/img/blog/comments-1.jpg" alt=""></div>-->
              <!--    <div>-->
              <!--      <h5><a href="">Georgia Reader</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>-->
              <!--      <time datetime="2020-01-01">01 Jan, 2020</time>-->
              <!--      <p>-->
              <!--        Et rerum totam nisi. Molestiae vel quam dolorum vel voluptatem et et. Est ad aut sapiente quis molestiae est qui cum soluta.-->
              <!--        Vero aut rerum vel. Rerum quos laboriosam placeat ex qui. Sint qui facilis et.-->
              <!--      </p>-->
              <!--    </div>-->
              <!--  </div>-->
              <!--</div>-->
              <!-- End comment #1 -->

              <!--<div id="comment-2" class="comment">-->
              <!--  <div class="d-flex">-->
              <!--    <div class="comment-img"><img src="assets/img/blog/comments-2.jpg" alt=""></div>-->
              <!--    <div>-->
              <!--      <h5><a href="">Aron Alvarado</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>-->
              <!--      <time datetime="2020-01-01">01 Jan, 2020</time>-->
              <!--      <p>-->
              <!--        Ipsam tempora sequi voluptatem quis sapiente non. Autem itaque eveniet saepe. Officiis illo ut beatae.-->
              <!--      </p>-->
              <!--    </div>-->
              <!--  </div>-->

              <!--  <div id="comment-reply-1" class="comment comment-reply">-->
              <!--    <div class="d-flex">-->
              <!--      <div class="comment-img"><img src="assets/img/blog/comments-3.jpg" alt=""></div>-->
              <!--      <div>-->
              <!--        <h5><a href="">Lynda Small</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>-->
              <!--        <time datetime="2020-01-01">01 Jan, 2020</time>-->
              <!--        <p>-->
              <!--          Enim ipsa eum fugiat fuga repellat. Commodi quo quo dicta. Est ullam aspernatur ut vitae quia mollitia id non. Qui ad quas nostrum rerum sed necessitatibus aut est. Eum officiis sed repellat maxime vero nisi natus. Amet nesciunt nesciunt qui illum omnis est et dolor recusandae.-->

              <!--          Recusandae sit ad aut impedit et. Ipsa labore dolor impedit et natus in porro aut. Magnam qui cum. Illo similique occaecati nihil modi eligendi. Pariatur distinctio labore omnis incidunt et illum. Expedita et dignissimos distinctio laborum minima fugiat.-->

              <!--          Libero corporis qui. Nam illo odio beatae enim ducimus. Harum reiciendis error dolorum non autem quisquam vero rerum neque.-->
              <!--        </p>-->
              <!--      </div>-->
              <!--    </div>-->

              <!--    <div id="comment-reply-2" class="comment comment-reply">-->
              <!--      <div class="d-flex">-->
              <!--        <div class="comment-img"><img src="assets/img/blog/comments-4.jpg" alt=""></div>-->
              <!--        <div>-->
              <!--          <h5><a href="">Sianna Ramsay</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>-->
              <!--          <time datetime="2020-01-01">01 Jan, 2020</time>-->
              <!--          <p>-->
              <!--            Et dignissimos impedit nulla et quo distinctio ex nemo. Omnis quia dolores cupiditate et. Ut unde qui eligendi sapiente omnis ullam. Placeat porro est commodi est officiis voluptas repellat quisquam possimus. Perferendis id consectetur necessitatibus.-->
              <!--          </p>-->
              <!--        </div>-->
              <!--      </div>-->

                  <!--</div>-->
                  <!-- End comment reply #2-->

                <!--</div>-->
                <!-- End comment reply #1-->

              <!--</div>-->
              <!-- End comment #2-->

              <!--<div id="comment-3" class="comment">-->
              <!--  <div class="d-flex">-->
              <!--    <div class="comment-img"><img src="assets/img/blog/comments-5.jpg" alt=""></div>-->
              <!--    <div>-->
              <!--      <h5><a href="">Nolan Davidson</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>-->
              <!--      <time datetime="2020-01-01">01 Jan, 2020</time>-->
              <!--      <p>-->
              <!--        Distinctio nesciunt rerum reprehenderit sed. Iste omnis eius repellendus quia nihil ut accusantium tempore. Nesciunt expedita id dolor exercitationem aspernatur aut quam ut. Voluptatem est accusamus iste at.-->
              <!--        Non aut et et esse qui sit modi neque. Exercitationem et eos aspernatur. Ea est consequuntur officia beatae ea aut eos soluta. Non qui dolorum voluptatibus et optio veniam. Quam officia sit nostrum dolorem.-->
              <!--      </p>-->
              <!--    </div>-->
              <!--  </div>-->

              <!--</div>-->
              <!-- End comment #3 -->

              <!--<div id="comment-4" class="comment">-->
              <!--  <div class="d-flex">-->
              <!--    <div class="comment-img"><img src="assets/img/blog/comments-6.jpg" alt=""></div>-->
              <!--    <div>-->
              <!--      <h5><a href="">Kay Duggan</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>-->
              <!--      <time datetime="2020-01-01">01 Jan, 2020</time>-->
              <!--      <p>-->
              <!--        Dolorem atque aut. Omnis doloremque blanditiis quia eum porro quis ut velit tempore. Cumque sed quia ut maxime. Est ad aut cum. Ut exercitationem non in fugiat.-->
              <!--      </p>-->
              <!--    </div>-->
              <!--  </div>-->

              <!--</div>-->
              <!-- End comment #4 -->

              <div class="reply-form">
                <h4>Leave a Reply</h4>
                <p>Your email address will not be published. Required fields are marked * </p>
                <form onsubmit="return sendcomment(this);" id="myform" method="post">
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input name="name" id="name" type="text" class="form-control" placeholder="Your Name*">
                    </div>
                    <div class="col-md-6 form-group">
                      <input name="email" id="email" type="text" class="form-control" placeholder="Your Email*">
                    </div>
                  </div>
                  <!--<div class="row">-->
                  <!--  <div class="col form-group">-->
                  <!--    <input name="website" type="text" class="form-control" placeholder="Your Website">-->
                  <!--  </div>-->
                  <!--</div>-->
                  <div class="row">
                    <div class="col form-group">
                      <textarea name="comment" id="comment" class="form-control" placeholder="Your Comment*"></textarea>
                    </div>
                  </div>
                  <button type="submit" name="submit" id="submit" class="btn btn-primary">Post Comment</button>

                </form>
                <div id="data"></div>
              </div>

            </div>
            <!-- End blog comments -->

          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">

              <!--<h3 class="sidebar-title">Search</h3>-->
              <!--<div class="sidebar-item search-form">-->
              <!--  <form action="">-->
              <!--    <input type="text">-->
              <!--    <button type="submit"><i class="bi bi-search"></i></button>-->
              <!--  </form>-->
              <!--</div>-->
          <!-- End sidebar search formn-->

              <!--<h3 class="sidebar-title">Categories</h3>-->
              <!--<div class="sidebar-item categories">-->
              <!--  <ul>-->
              <!--    <li><a href="#">General <span>(25)</span></a></li>-->
              <!--    <li><a href="#">Lifestyle <span>(12)</span></a></li>-->
              <!--    <li><a href="#">Travel <span>(5)</span></a></li>-->
              <!--    <li><a href="#">Design <span>(22)</span></a></li>-->
              <!--    <li><a href="#">Creative <span>(8)</span></a></li>-->
              <!--    <li><a href="#">Educaion <span>(14)</span></a></li>-->
              <!--  </ul>-->
              <!--</div>-->
          <!-- End sidebar categories-->

              <h3 class="sidebar-title">Recent Posts</h3>
              <div class="sidebar-item recent-posts">
                <div class="post-item clearfix">
                  <img src="assets/img/blog/abc.jpg" alt="">
                  <h4><a href="blog-single">Key Benefits of online learning</a></h4>
                  <time datetime="2020-01-01">July 1st, 2021</time>
                </div>

                <div class="post-item clearfix">
                  <img src="assets/img/blog/1.jpg" alt="">
                  <h4><a href="blog-tips">Tips for Successful Online Learning</a></h4>
                  <time datetime="2020-01-01">August 1st, 2021</time>
                </div>

                <!--<div class="post-item clearfix">-->
                <!--  <img src="assets/img/blog/blog-recent-3.jpg" alt="">-->
                <!--  <h4><a href="blog-single.html">Id quia et et ut maxime similique occaecati ut</a></h4>-->
                <!--  <time datetime="2020-01-01">Jan 1, 2020</time>-->
                <!--</div>-->

                <!--<div class="post-item clearfix">-->
                <!--  <img src="assets/img/blog/blog-recent-4.jpg" alt="">-->
                <!--  <h4><a href="blog-single.html">Laborum corporis quo dara net para</a></h4>-->
                <!--  <time datetime="2020-01-01">Jan 1, 2020</time>-->
                <!--</div>-->

                <!--<div class="post-item clearfix">-->
                <!--  <img src="assets/img/blog/blog-recent-5.jpg" alt="">-->
                <!--  <h4><a href="blog-single.html">Et dolores corrupti quae illo quod dolor</a></h4>-->
                <!--  <time datetime="2020-01-01">Jan 1, 2020</time>-->
                <!--</div>-->

              </div>
           <!--End sidebar recent posts-->

              <h3 class="sidebar-title">Tags</h3>
              <div class="sidebar-item tags">
                <ul>
                  <li><a href="#">App</a></li>
                  <li><a href="#">IT</a></li>
                  <li><a href="#">Business</a></li>
                  <li><a href="#">Mac</a></li>
                  <li><a href="#">Design</a></li>
                  <li><a href="#">Office</a></li>
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Studio</a></li>
                  <li><a href="#">Smart</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li>
                </ul>
              </div>
               <!--End sidebar tags-->

            </div>
             <!--End sidebar -->

          </div>
          <!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Single Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12 text-center">
            <h4>Our Newsletter</h4>
            <p>Join our subscribers list to get the latest news, updates and special offers delivered directly in your inbox.</p>
          </div>
          <div class="col-lg-6">
            <form onsubmit="return newsletter(this);" id="newsletter" method="post">
              <input type="email" name="newsemail" id="newsemail" placeholder="Your Email ID"><input type="submit" value="Subscribe">
            </form><br>
            <div id="return1"></div>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="default.php" class="logo d-flex align-items-center">
              <img style="margin-left:-3%;"src="images/a.png" alt="">
              
            </a>
            <p>A platform that is cost-effective and more importantly localized. A platform that could answer any questions or problems of students that are coming their way. A great platform, tons of features, and very user friendly as well.</p>
            <div class="social-links mt-3">
              <a href="https://twitter.com/livekitabapp" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="https://fb.me/livekitabapp" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="https://www.instagram.com/livekitabapp/" class="instagram"><i class="bi bi-instagram bx bxl-instagram"></i></a>
              <a href="https://www.linkedin.com/company/livekitabapp" class="linkedin"><i class="bi bi-linkedin bx bxl-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="default">Home</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="default">About us</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="default">Services</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="default">Team</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="blog.php">Blog</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="default">Contact Us</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Terms of Services</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a target="_blank" href="terms_services/TermsOfService">Terms of Services</a></li>
              <li><i class="bi bi-chevron-right"></i> <a target="_blank" href="terms_services/TermsOfSales">Terms of Sales</a></li>
              <li><i class="bi bi-chevron-right"></i> <a target="_blank" href="terms_services/PrivacyPolicy">Privacy Policy</a></li>
              <li><i class="bi bi-chevron-right"></i> <a target="_blank" href="terms_services/InfrigmentPolicy">Infrigment Policy</a></li>
              <li><i class="bi bi-chevron-right"></i> <a target="_blank" href="terms_services/backuppolicy">Backup Policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Contact Us</h4>
            <p>
             307-Capital Complex <br>
              Bhavnagr, Gujarat<br>
              INDIA <br><br>
              <strong>Phone:</strong> <a href="tel:+91 9099535481">(+91) 9099535481</a><br>
              <strong>Email:</strong> support@livekitab.com<br>
            </p>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>ENCENDER TECHNOLOGIES PRIVATE LIMITED</span></strong>. All Rights Reserved
      </div>
      
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="js/addcomment.js"></script>  
</body>

</html>