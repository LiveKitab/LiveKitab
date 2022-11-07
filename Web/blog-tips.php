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
    <div class="container container-xl d-flex align-items-center justify-content-between">

      <a href="default" class="logo d-flex align-items-center">
        <img src="images/a.png" alt="">
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="https://livekitab.com">Home</a></li>
          <li><a class="nav-link scrollto" href="https://livekitab.com">About</a></li>
          <li><a class="nav-link scrollto" href="https://livekitab.com">Services</a></li>
          <!--<li><a class="nav-link scrollto" href="https://livekitab.com">Portfolio</a></li>-->
          <li><a class="nav-link scrollto" href="https://livekitab.com">Team</a></li>
          <li><a target="_blank" href="blog">Blog</a></li>
         
          
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
                <img src="assets/img/blog/1.jpg" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="blog-tips"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;Tips for Successful Online Learning</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-tips">Aayushi Vora</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-tips"><time datetime="2020-01-01">August 1st, 2021</time></a></li>
                  <?php
                  $cmd="Select * from comment";
                  $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
                  $no=mysqli_num_rows($result);
                  ?>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-tips.php"><?php echo $no; ?>&nbsp;Comments</a></li>
                </ul>
              </div>

              <div class="entry-content">
                  <h1>Tips for Successful Online Learning</h1>
                <p>
                 If you’re new to online learning, first of all, WELCOME! Learning online is a fantastic way to increase your knowledge and skills in a unique, flexible environment with its own distinct strengths and opportunities.
                </p>

                <p>
                 Whether you’re trying online classes for the first time or looking for ways to strengthen your current habits and approaches, there are a few key areas to consider to set yourself up for success and take full advantage of all online learning has to offer.
                </p>
                 <p>
                  In this collection of online learning tips and best practices from our team of learning designers, industry experts, and fellow learners, we share strategies to help you succeed in your learning journey, including ways to:
                </p>
                <p>
                    1.Get the most out of your learning<br/>
                    2.Keep your mind and body healthy<br/>
                    3.Effectively manage your time and minimize distractions<br/>
                    4.Forge connections with your virtual learning community<br/>
                    5.Conquer logistics<br/>
                </p>
                 <blockquote>
                  <p>
                    "Success in learning is dependent on good study habits and study methods, not some innate ability."
                  </p>
                </blockquote>

                <h2><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;&nbsp;Online Learning Tips</h2>
                <blockquote>
                  <p>
                    "I realized that some of the best students have very good study habits and study methods. I used to think success in learning was dependent on some innate ability, but then I realized the techniques you use are even more important," said Olav Shewe, Educas CEO and instructor for Learn Like a Pro on edX."
                    </p>
                </blockquote>
                <h2><i class="fa fa-graduation-cap" aria-hidden="true"></i>&nbsp;&nbsp;Learning Strategies</h2>
                <p>
                  In our modern learning landscape there is vast amounts of content about virtually any topic to watch, read, and listen to, but knowing is different from doing. To get the most out of online learning, make sure you develop new knowledge and skills in a way that you can retain, apply repeatedly, and adapt to new contexts.
                </p>
                <h3>1.Video strategies:</h3>
                <p>For recorded video, pause and write a brief summary of what you have heard in notes every few minutes. For live video, especially if the video is available to watch later, avoid taking notes. Pay attention to what you are hearing and participate in the discussion to help keep your focus. Raise your virtual hand or ask a question in the chat.</p>
                
                <h3>2.Take advantage of video break-out groups:</h3>
                <p>If offered, these live, small group discussions will give you a chance to hear other perspectives or review challenging material as a group.</p>
                
                
                
                <img src="assets/img/blog/2.jpg" class="img-fluid" alt="">

                <h2 style="margin-top:2%;"><i class="fa fa-heart" aria-hidden="true"></i>&nbsp;&nbsp;Self Care</h2>
                <blockquote>
                  <p>
                    "Self-care is important to your successful learning experience. A healthy mind (and body) is a mind ready for learning."
                  </p>
                </blockquote>
                <h3>1.Advocate for your learning needs</h3>
                <p>Ask for flexible ways of participating in the class that work for you. This is important for learners who require specific accommodations, such as a note taker or extended test time, but is also important for all learners.</p>
                
                <h3>2.Schedule breaks:</h3>
                <p>Get up and walk around, go outside, schedule your distractions, don’t forget to move. Plenty of apps exist to keep you on task and turn off distractions, as well as remind you to get up and take breaks.</p>
                  
                <h3>3.Maintain healthy habits:</h3>
                <p>Your brain, like your body, needs rest and exercise. Get sleep, stay hydrated, go outside, eat well.</p>
                
                <h2><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;Time Management</h2>
                <blockquote>
                  <p>
                    "One of the biggest benefits of online learning is flexibility, but too much freedom can pose new challenges. Find ways to structure and optimize your time for when and where you learn best and keep your learning on track."
                  </p>
                </blockquote>
                <h3>1.Track deadlines: </h3>
                <p>Add important due dates to a calendar so you don’t miss important deadlines.</p>
                
                <h3>2.Minimize distractions:</h3>
                <p>As much as you can, minimize distractions both in your physical environment and your digital environment. Close web browser windows not relevant to your learning, keep the TV off, etc.</p>
                
                <h3>3.Set aside time for learning:</h3>
                <p>This doesn’t mean you need to find four-hour blocks, three days a week. Online learning is designed to be modular and flexible. You may find 15 minutes to watch a short video lecture and write a three-sentence reflection post. But of course, other learning activities will require more time. Be planful and dedicate time to learn as you would to exercise or spending time with friends.</p>
                
               <h2><i class="fa fa-users" aria-hidden="true"></i>&nbsp;&nbsp;Community and Social Learning</h2>
                 <blockquote>
                  <p>
                    "Online learning comes with connections to both world-class professors and a global community of passionate classmates. Find ways to connect with these rich learning communities, from participating in forums to networking with peers."</p>
                </blockquote>
                
                 <h3>1.Keep your instructor informed:</h3>
                <p>Ask your instructor for help when you need it—let them know if you are ill, unable to log on, etc.</p>
                
                <h3>2.Virtually meet and interact with your learning peers:</h3>
                <p>You are not alone! Introduce yourself, answer questions posted by the instructor in the discussion forums, and respond to your peers’ posts.</p>
                
                <h3>3.Create a social network group:</h3>
                <p>In addition to forums, create a distinct space, such as a Facebook group or a Whatsapp chat, for you and your fellow students to connect, share interests, and support each other.</p>
                
                <h3>4.Create virtual study groups:</h3>
                <p>Keep the line open and find ways to connect with your learning peers in small study groups. Video chat apps are a great way to do this.</p>
                
                <h3>5.Give and expect respect:</h3>
                <p>Especially during asynchronous communication like discussion boards and email, it can be easy to misconstrue someone’s meaning. Like you, your peers are real people. Do your part to foster a respectful, supportive community.</p>
              
              <h2><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;&nbsp;Logistics</h2>
              <blockquote>
                  <p>
                    "Last but not least: logistics. Nailing the details of your learning experience can pay back dividends."</p>
                </blockquote>
                <h3>1.Make relevant information easily accessible:</h3>
                <p>Collect the phone numbers, email addresses, and support links for your institution in one place so, if and when you need it, you don’t have to go hunting. </p>
                
                <h3>2.Gather your tech:</h3>
                <p>If the course requires video conferencing software, download the app and test well before a live lecture begins. If assignments are uploaded to a cloud service (e.g., Google Drive, Dropbox), make sure you have the required account details or access information in advance of a deadline.</p>
                
                <h3>3.Minimize reliance on WiFi:</h3>
                <p>If possible, use an ethernet cable and download course materials to work offline. Many online courses work in mobile, too, but others do not. Have a plan for Internet access.</p>
                
                <h3>4.Always save your work:</h3>
                <p>Save your work locally on your computer and/or in the cloud where you can easily access it. For example, draft essays in a word processing application or in an email to yourself then cut and paste your work into the course LMS (learning management system) to turn in your assignment.</p>
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
            <!-- End sidebar -->

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