

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Fake Certificate</title>
       <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/fontawesome.min.css" />

  </head>

  <body>
<div class="container"> 
  <div class="d-flex align-items-center">
    <div class="site-logo">
      <a href="index.php" class="d-block logo">
        <img src="images/certified-logo.png" alt="Image" width="100" class="img-fluid" />
      </a>
    </div>
    <div class="mr-auto">
      <nav class="site-navigation position-relative text-right" role="navigation">
        <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
          <?php if (!isset($_SESSION['user_id'])): ?>
            <li class="<?= ($activePage === 'home') ? 'active' : ''; ?>">
              <a href="index.php" class="nav-link text-left"><span class="icon-home"></span> Home</a>
            </li>
            <li class="<?= ($activePage === 'login') ? 'active' : ''; ?>">
              <a href="login.php" class="nav-link text-left"><span class="icon-lock"></span> Login</a>
            </li>
            <li class="<?= ($activePage === 'register') ? 'active' : ''; ?>">
              <a href="register.php" class="nav-link text-left"><span class="icon-users"></span> Register</a>
            </li>
          <?php else: ?>
            <li class="<?= ($activePage === 'dashboard') ? 'active' : ''; ?>">
              <a href="dashboard.php" class="nav-link text-left"> <i class="fa-solid fa-grip"></i> Dashboard</a>
            </li>

            <li class="<?= ($activePage === 'addcertificates') ? 'active' : ''; ?>">
              <a href="addcertificates.php" class="nav-link text-left"><i class="fa-solid fa-plus"></i> Add Certificates</a>
            </li>
             <li>
                    <a href="logout.php" class="nav-link text-left"
                      > <i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a
                    >
                  </li>
          <?php endif; ?>
        </ul>
      </nav>
    </div>
    <div class="ml-auto">
      <div class="social-wrap">
        <a href="#"><span class="icon-facebook"></span></a>
        <a href="#"><span class="icon-twitter"></span></a>
        <a href="#"><span class="icon-linkedin"></span></a>
        <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black">
          <span class="icon-menu h3"></span>
        </a>
      </div>
    </div>
  </div>
</div>
          </body>
          </html>
