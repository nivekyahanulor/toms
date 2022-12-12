	<?php 
	include('header.php'); 
	include('nav.php'); 
	include('../controller/index.php');
	?> 
	<div class="main-content">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                    <h4>WELCOME TO TOMS</h4></a>
					    <div class="row">
							<div class="col-12 col-sm-12 col-lg-12">
							 
								<div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel">
								  <ol class="carousel-indicators">
									<li data-target="#carouselExampleIndicators3" data-slide-to="0" class="active"></li>
									<li data-target="#carouselExampleIndicators3" data-slide-to="1"></li>
									<li data-target="#carouselExampleIndicators3" data-slide-to="2"></li>
								  </ol>
								  <div class="carousel-inner">
									<div class="carousel-item active">
									  <img class="d-block w-100" src="../assets/img/slider/1.png"   style="height: 500px;"alt="First slide">
									</div>
									<div class="carousel-item">
									  <img class="d-block w-100" src="../assets/img/slider/2.jpg"   style="height: 500px;"alt="Second slide">
									</div>
									<div class="carousel-item">
									  <img class="d-block w-100" src="../assets/img/slider/3.png"   style="height: 500px;"alt="Third slide">
									</div>
								  </div>
								  <a class="carousel-control-prev" href="#carouselExampleIndicators3" role="button"
									data-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								  </a>
								  <a class="carousel-control-next" href="#carouselExampleIndicators3" role="button"
									data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								  </a>
								</div>
						  </div>
						</div>
						  
						<div style="height:25px;"></div>
					    <div class="row justify-content-center">
						
							<?php while($val1 = $about->fetch_object()){ ?>
							<div class="col-12 col-md-4 col-lg-4">
								<div class="card card-primary">
								  <div class="card-body" style="text-align:center;">
								   <h4><img src="../assets/img/<?php echo $val1->logo ;?>" width="100px"><br><br><?php echo $val1->title ;?></h4>
									<p><?php echo $val1->content ;?> </p>
								  </div>
								</div>
							</div>
							<?php } ?>
							
							<div class="col-12 col-md-4 col-lg-4">
								<div class="card card-primary">
								  <div class="card-body" style="text-align:center;">
								   <h1 style="font-size: 85px!important;">14</h1><br><br>
								   <h4>Barangays in Carmona, Cavite</h4>
									<p>There are 14 Barangays in Carmona, Cavite namely Barangay 1, 2, 3, 4, 5, 6, 7, 8, 9 (Maduya), 10 (Cabilang Baybay), 11 (Mabuhay), 12 (Milagrosa), 13 (Lantic), 14 (Bancal).</p>
								  </div>
								</div>
							</div>
						</div>
						
						<div class="row">
						  <div class="col-12 col-md-6 col-lg-6">
							<div class="card">
							  <div class="card-header">
								<h4>NEWS AND ANNOUNCEMENT</h4>
							  </div>
							  
							  <div class="card-body">
								<?php while($val = $announcements->fetch_object()){ ?>
									  <div class="media">
										  <div class="media-body">
											<h5 class="mt-0"><?php echo $val->title;?> <br> <code>  <?php echo $val->aType;?> </code></h5>
											<p class="mb-0"><?php echo $val->content;?> </p>
										</div>
										</div>
									<hr>
								<?php } ?>
							  </div>
							  
							</div>
							
						  </div>
						  <div class="col-12 col-md-6 col-lg-6">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3866.132535359919!2d121.02496151434688!3d14.303731088118626!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d64e04e76349%3A0xd5df3856120361a0!2sMunicipality%20of%20Carmona!5e0!3m2!1sen!2sph!4v1631243935571!5m2!1sen!2sph" width="100%" height="260px" style="border:1;" allowfullscreen=""></iframe>
						  </div>
						</div>
						
						
                  </div>
              </div>
            </div>
    </div>
    </div>

<?php require('footer.php'); ?> 
