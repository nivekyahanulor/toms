<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn"> <i data-feather="align-justify"></i></a></li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="../assets/img/sk-logo.png"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello, <?php echo $_SESSION['username'];?></div>
              <div class="dropdown-divider"></div>
              <a href="logout.php" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper" >
          <div class="sidebar-brand">
            <a href="#"> <img alt="image" src="../assets/img/sk-logo.png" class="header-logo" /> <span
                class="logo-name"></span>
            </a>
          </div>
          <ul class="sidebar-menu" style="background-color:#23a255 !important;">
            <li class="menu-header"><center>SK CARMONA</center></li>
			<?php
			$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
		    $uri_segments = explode('/', $uri_path);
			$page =  $uri_segments[3];
			if($page =='index.php')  { $index   = 'active'; }
			else if($page =='dashboard.php'){ $dashboard = 'active'; }
			else if($page =='aboutus.php'){ $aboutus = 'active'; }
			else if($page =='announcement.php'){ $announcement = 'active'; }
			else if($page =='barangay.php' || $page =='view-barangay-details.php'){ $barangay = 'active'; }
			else if($page =='contactus.php'){ $contactus = 'active'; }
			else if($page =='awards.php'){ $awards = 'active'; }
			else if($page =='users.php'){ $users = 'active'; }
			else if($page =='news'){ $news = 'active'; }
			else if($page =='orgchart.php'){ $orgchart = 'active'; }
			else if($page =='history.php'){ $history = 'active'; }
			else if($page =='settings.php'){ $settings = 'active'; }
			?>
            <li class="dropdown <?php echo $index;?>">
              <a href="index.php" class="nav-link"><i data-feather="home"></i><span>HOME</span></a>
            </li>
			<li class="dropdown <?php echo $dashboard;?>">
              <a href="dashboard.php" class="nav-link"><i data-feather="monitor"></i><span>DASHBOARD</span></a>
            </li>
			<li class="dropdown <?php echo $barangay;?>">
              <a href="barangay.php" class="nav-link"><i data-feather="clipboard"></i><span>MONITOR</span></a>
            </li>
			<li class="dropdown <?php echo $aboutus;?>">
              <a href="aboutus.php" class="nav-link"><i data-feather="alert-circle"></i><span>ABOUT US </span></a>
            </li>
			<li class="dropdown <?php echo $announcement;?>">
              <a href="announcement.php" class="nav-link"><i data-feather="flag"></i><span>ANNOUNCEMENT </span></a>
            </li>
			<li class="dropdown <?php echo $users;?>">
              <a href="users.php" class="nav-link"><i data-feather="users"></i><span>MANAGE USERS  </span></a>
            </li>
			<li class="dropdown <?php echo $history;?>">
              <a href="history.php" class="nav-link"><i data-feather="alert-circle"></i><span> USERS HISTORY </span></a>
            </li>
			<li class="dropdown <?php echo $settings;?>">
              <a href="settings.php" class="nav-link"><i data-feather="settings"></i><span> SETTINGS</span></a>
            </li>
			<li class="dropdown ">
              <a href="logout.php" class="nav-link"><i data-feather="arrow-right-circle"></i><span>LOGOUT</span></a>
            </li>
          </ul>
        </aside>
      </div>