<?php
require 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Fake certificate</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <link
      href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="fonts/icomoon/style.css" />

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/jquery-ui.css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="css/owl.theme.default.min.css" />

    <link rel="stylesheet" href="css/jquery.fancybox.min.css" />

    <link rel="stylesheet" href="css/bootstrap-datepicker.css" />

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css" />

    <link rel="stylesheet" href="css/aos.css" />
    <link
      href="css/jquery.mb.YTPlayer.min.css"
      media="all"
      rel="stylesheet"
      type="text/css"
    />

    <link rel="stylesheet" href="css/style.css" />
  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div class="site-wrap">
      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>

      <!-- <div class="py-2 bg-light">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-9 d-none d-lg-block">
              <a href="#" class="small mr-3"
                ><span class="icon-question-circle-o mr-2"></span> Have a
                questions?</a
              >
              <a href="#" class="small mr-3"
                ><span class="icon-phone2 mr-2"></span> 10 20 123 456</a
              >
              <a href="#" class="small mr-3"
                ><span class="icon-envelope-o mr-2"></span> info@mydomain.com</a
              >
            </div>
            <div class="col-lg-3 text-right">
              <a href="login.php" class="small mr-3"
                ><span class="icon-unlock-alt"></span> Log In</a
              >
              <a
                href="register.php"
                class="small btn btn-primary px-4 py-2 rounded-0"
                ><span class="icon-users"></span> Register</a
              >
            </div>
          </div>
        </div>
      </div> -->
       <div class="bg-top-header padding-top-30 padding-bottom-30">

</div>
      <header
        class="site-navbar py-4 js-sticky-header site-navbar-target"
        role="banner"
      >
    
         <?php $activePage = 'register';
       include 'menu.php'; ?>
      </header>

      <div
        class="site-section ftco-subscribe-1 site-blocks-cover pb-4"
        style="background-image: url('images/bg_1.jpg')"
      >
        <div class="container">
          <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
              <h2 class="mb-0">Register</h2>
              <p></p>
            </div>
          </div>
        </div>
      </div>

      <div class="custom-breadcrumns border-bottom">
        <div class="container">
          <a href="index.php">Home</a>
          <span class="mx-3 icon-keyboard_arrow_right"></span>
          <span class="current">Register</span>
        </div>
      </div>

      <div class="site-section">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-5">
              <form name="name" method="post">
              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="name">Name</label>
                  <input
                    type="text"
                    id="name"
                    name="name"
                    class="form-control form-control-lg"
                  />
                </div>
                <div class="col-md-12 form-group">
                  <label for="email">Email</label>
                  <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-control form-control-lg"
                  />
                </div>
                  <div class="col-md-12 form-group">
                  <label for="mobile">Mobile</label>
                  <input
                    type="number"
                    id="mobile"
                    name="mobile"
                    class="form-control form-control-lg"
                  />
                </div>
                <div class="col-md-12 form-group">
                  <label for="pword">Password</label>
                  <input
                    type="password"
                    id="pword"
                    name="pwd"
                    class="form-control form-control-lg"
                  />
                </div>
                <!-- <div class="col-md-12 form-group">
                  <label for="pword2">Re-type Password</label>
                  <input
                    type="password"
                    id="pword2"
                    class="form-control form-control-lg"
                  />
                </div>         -->
              </div>
              <div class="row">
                <div class="col-12">
                  <input
                    type="submit"
                    value="Register"
                    name="submit"
                    class="btn btn-primary btn-lg px-5"
                  />
                </div>
              </div>
</form>
            </div>
          </div>
        </div>
      </div>
      <?php
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $mobile = mysqli_real_escape_string($connect, $_POST['mobile']);
    $pwd = mysqli_real_escape_string($connect, $_POST['pwd']);

    // Check if email or mobile already exists
    $checkQuery = "SELECT * FROM register WHERE email = '$email' OR mobile = '$mobile'";
    $checkResult = mysqli_query($connect, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        echo "<script>alert('Email or Mobile number already exists');</script>";
    } else {
        // Insert only if not exists
        $reg_id = strval(rand(100000, 999999)); 
        $qry = "INSERT INTO register (reg_id,name, email, mobile, pwd) VALUES ('$reg_id','$name', '$email', '$mobile', '$pwd')";
        $result = mysqli_query($connect, $qry);

        if ($result) {
            echo "<script>alert('Added successfully');</script>";
        } else {
            echo "<script>alert('Not added: " . mysqli_error($connect) . "');</script>";
        }
    }
}
      ?>

      <div class="footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-3">
              <p class="mb-4">
               <img src="images/certified-logo.png" alt="Image" width="100" class="img-fluid" />
              </p>
              <p>
              this application fake ceritifates is about the checking the validation 
                of cetificates with the help of third party agency to complete the viritual check before
                moving to original document check in live ....
              </p>
              <p><a href="#">Learn More</a></p>
            </div>
            <div class="col-lg-3">
              <h3 class="footer-heading"><span>Our Campus</span></h3>
              <ul class="list-unstyled">
                <li><a href="#">Acedemic</a></li>
                <li><a href="#">News</a></li>
                <li><a href="#">Our Interns</a></li>
                <li><a href="#">Our Leadership</a></li>
                <li><a href="#">Careers</a></li>
                <li><a href="#">Human Resources</a></li>
              </ul>
            </div>
            <div class="col-lg-3">
              <h3 class="footer-heading"><span>Our Courses</span></h3>
              <ul class="list-unstyled">
                <li><a href="#">Math</a></li>
                <li><a href="#">Science &amp; Engineering</a></li>
                <li><a href="#">Arts &amp; Humanities</a></li>
                <li><a href="#">Economics &amp; Finance</a></li>
                <li><a href="#">Business Administration</a></li>
                <li><a href="#">Computer Science</a></li>
              </ul>
            </div>
            <div class="col-lg-3">
              <h3 class="footer-heading"><span>Contact</span></h3>
              <ul class="list-unstyled">
                <li><a href="#">Help Center</a></li>
                <li><a href="#">Support Community</a></li>
                <li><a href="#">Press</a></li>
                <li><a href="#">Share Your Story</a></li>
                <li><a href="#">Our Supporters</a></li>
              </ul>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <div class="copyright">
                <p>
              
                  Copyright &copy;
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  All rights reserved 
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- .site-wrap -->

    <!-- loader -->
    <div id="loader" class="show fullscreen">
      <svg class="circular" width="48px" height="48px">
        <circle
          class="path-bg"
          cx="24"
          cy="24"
          r="22"
          fill="none"
          stroke-width="4"
          stroke="#eeeeee"
        />
        <circle
          class="path"
          cx="24"
          cy="24"
          r="22"
          fill="none"
          stroke-width="4"
          stroke-miterlimit="10"
          stroke="#51be78"
        />
      </svg>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.mb.YTPlayer.min.js"></script>

    <script src="js/main.js"></script>
  </body>
</html>
