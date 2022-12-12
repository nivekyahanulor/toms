<?php 
include('../config/database.php');
$data     = $_SESSION['brgyID'];
$settings1 = $mysqli->query("SELECT * FROM skaccount where brgyID ='$data'");
while($val1 = $settings1->fetch_object()){ 
	$profile =  $val1->img_profile;
}
?>
<body>
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
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="../assets/img/barangay/<?php echo $profile;?>"
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
			else if($page =='budget.php'){ $budget = 'active'; }
			else if($page =='calendar.php'){ $calendar = 'active'; }
			else if($page =='settings.php'){ $settings = 'active'; }
			else if($page =='procurement-services.php'){ $procurement = 'active'; }
			else if($page == 'procurement-goods.php' || $page =='procurement-others.php'){ $procurement = 'active'; }
			else if($page =='reports-goods.php' || $page =='reports-services.php' || $page=='reports-others.php' || $page=='reports-budget.php'){ $reports = 'active'; }
			
			?>
            <li class="dropdown <?php echo $index;?>">
              <a href="index.php" class="nav-link"><i data-feather="home"></i><span>HOME</span></a>
            </li>
			<li class="dropdown <?php echo $dashboard;?>">
              <a href="dashboard.php" class="nav-link"><i data-feather="monitor"></i><span>DASHBOARD</span></a>
            </li>
			<li class="dropdown <?php echo $procurement;?>">
              <a href="procurement.php" class="menu-toggle nav-link has-dropdown"><i data-feather="clipboard"></i><span>PROCUREMENT</span></a>
			  <ul class="dropdown-menu">
                <li><a class="nav-link" href="procurement-goods.php">GOODS</a></li>
                <li><a class="nav-link" href="procurement-services.php">SERVICES</a></li>
                <li><a class="nav-link" href="procurement-others.php">OTHERS</a></li>
              </ul>
            </li>
			<li class="dropdown <?php echo $budget;?>">
              <a href="budget.php" class="nav-link"><i data-feather="award"></i><span>BUDGET </span></a>
            </li>
			<li class="dropdown <?php echo $calendar;?>">
              <a href="calendar.php" class="nav-link"><i data-feather="calendar"></i><span>CALENDAR </span></a>
            </li>
			<li class="dropdown <?php echo $reports;?>">
              <a href="announcement.php" class="menu-toggle nav-link has-dropdown"><i data-feather="bar-chart"></i><span>REPORTS </span></a>
			  <ul class="dropdown-menu">
                <li><a class="nav-link" href="reports-goods.php"> Procurement  Goods</a></li>
                <li><a class="nav-link" href="reports-services.php">Procurement  Services</a></li>
                <li><a class="nav-link" href="reports-others.php">Procurement  Others</a></li>
                <li><a class="nav-link" href="reports-budget.php">Budget</a></li>
              </ul>
            </li>
			
			<li class="dropdown <?php echo $settings;?>">
              <a href="settings.php" class="nav-link"><i data-feather="settings"></i><span> SETTINGS </span></a>
            </li>
				
			<li class="dropdown ">
              <a href="logout.php" class="nav-link"><i data-feather="arrow-right-circle"></i><span>LOGOUT</span></a>
            </li>
          </ul>
        </aside>
      </div>