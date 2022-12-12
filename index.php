<?php include('config/database.php'); ?>       
<?php include('controller/login.php'); ?>    
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>SK -TOMS </title>
  <link rel="stylesheet" href="assets/admin/css/app.min.css">
  <link rel="stylesheet" href="assets/admin/bundles/bootstrap-social/bootstrap-social.css">
  <link rel="stylesheet" href="assets/admin/css/style.css">
  <link rel="stylesheet" href="assets/admin/css/components.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/admin/img/favicon.ico' />
</head>
<style>
.login-background{
	height: 100%;
	width: 100%;
	background-size: cover;
	opacity: 0.2;
	position: fixed;
	z-index: -4;
	
}

.wave{
	position: fixed;
	bottom: 0;
	left: 0;
	height: 100%;
	z-index: -1;
}

.img{
	float:left;
    display: inline-block;
    width: 400px;
    overflow:hidden;
	margin-top: 130px;
	margin-left: -370px;	
	margin-right: 50px;
}
.img1{
	float:left;
    display: inline-block;
    overflow:hidden;
}
.btn1{
	display: block;
	width: 100%;
	height: 50px;
	border-radius: 25px;
	outline: none;
	border: none;
	background-image: linear-gradient(to right, #23a255, #38d39f, #23a255);
	background-size: 200%;
	font-size: 1.2rem;
	color: #fff;
	font-family: 'Poppins', sans-serif;
	text-transform: uppercase;
	margin: 1rem 0;
	cursor: pointer;
	transition: .5s;
}
.btn1:hover{
	background-position: right;
}
</style>
<body class="wrapper">
  <div class="loader"></div>
  <Img class="login-background" src="assets/img/SK-Login-BG.jpg">
<img class="wave" src="assets/img/wave.png">
  <div id="app" >
      <div style="height:100px;"></div>
	  <section class="section " >
		<div class="container  mt-5">
        <div class="row justify-content-center">
			<div class="col-lg-1">
            <center>
			<div class="img">
					<img class="img1" src="assets/img/carmona.png"  width="200px" alt="">
					<br>
					<br><br>
					<br>
					<img src="assets/img/sk-logo.png"  width="200px" alt="">
			</div>
             </center>
			</div>
          <div class="col-12 col-sm-8  col-md-6  col-lg-6 col-xl-4 float-right">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Login</h4>
              </div>
              <div class="card-body">
                <form method="POST" >
                  <div class="form-group">
                    <label for="email">User Name</label>
                    <input id="email"  name="username" type="text" class="form-control text-center" tabindex="1"  required autofocus autocomplete="off">
                    <div class="invalid-feedback">
                      Please fill in your User Name
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                    
                    </div>
                    <input id="password"  type="password" class="form-control  text-center" name="password" tabindex="2" required autocomplete="off" >
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                    <small> * Please Log-In using your Valid User Account </small>
                    </div>
                  </div>
                  <div class="form-group">
				  <center>
					     <small><input type="checkbox" required> I Agree to the <a href="" type="button" data-toggle="modal" data-target="#squarespaceModal"> Terms and Condition </a>
					   <div class="invalid-feedback">Agree to the Terms and Condition</div></small>
                    </div>
                  <div class="form-group">
                    <button type="submit" name="login" class="btn1 btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
            </div>
           
          </div>
        </div>
      </div>
    </section>
  </div>
  
  	<!-- line modal -->
			<div class="modal fade" id="squarespaceModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">TERMS AND CONDITION</h5>
                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     <?php 
						$tbl_about = $mysqli->query("SELECT * from settings");
						$info1     = $tbl_about->fetch_assoc();
						echo $info1['termscondition'];
						?>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
					</form>
                  </div>
                </div>
             </div>
  <!-- General JS Scripts -->
  <script src="assets/admin/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="assets/admin/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/admin/js/custom.js"></script>
</body>


</html>