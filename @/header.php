<?php 
if (basename($_SERVER['SCRIPT_FILENAME']) == basename(__FILE__)) {exit("NOT ALLOWED");}
ob_start();
require_once '@/config.php';
require_once '@/init.php';
if (!(empty($maintaince))) {
die($maintaince);
}
if (!($user -> LoggedIn()) || !($user -> notBanned($odb)))
{
	header('location: login.php');
	die();
}


$SQL = $odb -> prepare("UPDATE `users` SET `membership`='0' WHERE `membership`='0'");
$SQL -> execute(array(':id' => $id));
$update = true;

$SQL = $odb -> prepare("UPDATE `users` SET `expire`='0' WHERE `expire`='0'");
$SQL -> execute(array(':id' => $id));
$update = true;




?>


<head>
 <title><?php echo htmlspecialchars($sitename); ?></title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- CSRF Token -->
  <meta name="_token" content="str5hm5z8d6ux1jpmcILUXYo2rVyGNeI2uayBt35"> 
  <link rel="shortcut icon" href="favicon/favicon.ico">
  <!-- plugin css -->
  <link media="all" type="text/css" rel="stylesheet" href="assets/fonts/feather-font/css/iconfont.css">
  <link media="all" type="text/css" rel="stylesheet" href="assets/plugins/perfect-scrollbar/perfect-scrollbar.css">
  <!-- end plugin css -->
   <link media="all" type="text/css" rel="stylesheet" href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
  <!-- common css -->
  <link media="all" type="text/css" rel="stylesheet" href="css/app.css">
  <!-- end common css -->
   
  <!-- Global site tag (gtag.js) - Google Analytics start -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-146586338-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-146586338-1');
  </script>
    </head>
    <body>
      <nav class="navbar">
  <a href="#" class="sidebar-toggler">
    <i data-feather="menu"></i>
  </a>
  <div class="navbar-content">
    <ul class="navbar-nav">
      <li class="nav-item dropdown nav-profile">
        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="assets/images/faces/astronaut.png" width="200" height="200" alt="profile" />
		            <div class="indicator">
            <div class="circle"></div>
          </div>
        </a>
        <div class="dropdown-menu" aria-labelledby="profileDropdown">
          <div class="dropdown-header d-flex flex-column align-items-center">
            <div class="figure mb-3">
              <img src="assets/images/faces/astronaut.png" width="200" height="200" alt="">
            </div>
          </div>
          <div class="dropdown-body">
            <ul class="profile-nav p-0 pt-3">
              <li class="nav-item">
                <a href="profile.php" class="nav-link">
                  <i data-feather="user"></i>
                  <span>Profile</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="logout.php"" class="nav-link">
                  <i data-feather="log-out"></i>
                  <span>Log Out</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </li>
    </ul>
  </div>
</nav>
  <script src="assets/js/spinner.js"></script>
  <div class="main-wrapper" id="app">
    <nav class="sidebar">
  <div class="sidebar-header">
    <a href="index.php" class="sidebar-brand" >
    <?php echo htmlspecialchars($sitename); ?>.
    <span style="color:#440aaa">city</span>
    </a>	
  </div>
  <div class="sidebar-body">
    <ul class="nav">
      <li class="nav-item nav-category">Main</li>
      <li class="nav-item">
        <a href="index.php" class="nav-link">
          <i class="link-icon" data-feather="airplay"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item nav-category">Upgrade</li>
      <li class="nav-item ">
        <a href="plans.php" class="nav-link">
          <i class="link-icon" data-feather="shopping-cart"></i>
          <span class="link-title">Purchase</span>
        </a>
      </li>
      <li class="nav-item ">
        <a href="redeem.php" class="nav-link">
          <i class="link-icon" data-feather="gift"></i>
          <span class="link-title">Redeem</span>
        </a>
      </li>
      <li class="nav-item nav-category">Hub</li>
       <li class="nav-item ">
        <a href="hubl4.php" class="nav-link">
          <i class="link-icon" data-feather="zap"></i>
          <span class="link-title">Layer 4 Hub</span>
        </a>
      </li>
	       <li class="nav-item ">
        <a href="hubl7.php" class="nav-link">
          <i class="link-icon" data-feather="zap"></i>
          <span class="link-title">Layer 7 Hub
		  </span>
        </a>
      </li>
      </li>
	       <li class="nav-item ">
        <a href="api.php" class="nav-link">
          <i class="link-icon" data-feather="link"></i>
          <span class="link-title">API Manager
		  </span>
        </a>
      </li>
      <li class="nav-item nav-category">Others</li>
      <li class="nav-item ">     
      <li class="nav-item ">
        <a href="https://t.me/stressercity" class="nav-link">
          <i class="link-icon" data-feather="inbox"></i>
          <span class="link-title">Telegram</span>
        </a>
      </li>
      <li class="nav-item ">
        <a href="monitoring.php" class="nav-link">
          <i class="link-icon" data-feather="server"></i>
          <span class="link-title">Monitoring</span>
        </a>
      </li>       
      </li>
   
      						<?php
						if ($user -> isAdmin($odb)) {
						echo '      <li class="nav-item ">
        <a href="admin/index.php" class="nav-link">
          <i class="link-icon" data-feather="settings"></i>
          <span class="link-title">Admin Manager</span>
        </a>
      </li> 
							</li>';
						}
						?>
    </ul>
  </div>
</nav>

  <!-- base js -->
    <script src="js/app.js"></script>
    <script src="assets/plugins/feather-icons/feather.min.js"></script>
    <script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!-- end base js -->

    <!-- plugin js -->
  <script src="assets/plugins/chartjs/Chart.min.js"></script>
  <script src="assets/plugins/jquery.flot/jquery.flot.js"></script>
  <script src="assets/plugins/jquery.flot/jquery.flot.resize.js"></script>
  <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
  <script src="assets/plugins/apexcharts/apexcharts.min.js"></script>
  <script src="assets/plugins/progressbar-js/progressbar.min.js"></script>
    <!-- end plugin js -->

    <!-- common js -->
    <script src="assets/js/template.js"></script>
    <!-- end common js -->

