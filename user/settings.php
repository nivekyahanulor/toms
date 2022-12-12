	<?php 
	include('header.php');
	include('nav.php');
	include('../controller/sk-dashboard.php'); 
	?> 
	<div class="main-content">
			<div class="row justify-content-center">
			   <div class="col-5">
                <div class="card">
                  <div class="card-header">
                    <h4>SK OFFICERS</h4>
                  </div>
                  <div class="card-body">
                     <form method="post" enctype="multipart/form-data">
					 <?php while($val = $settings->fetch_object()){ ?>
							<div class="form-group">
								<label class="control-label">SK CHAIRMAN:</label>
								<input type="text" class="form-control" name="sk_chairman" value="<?php echo $val->sk_chairman;?>" required>
							</div>
							
							<div class="form-group">
								<label class="control-label">VICE CHAIRMAN:</label>
								<input type="text" class="form-control" name="vice" value="<?php echo $val->vice_chairman;?>" required>
							</div>
							
							<div class="form-group">
								<label class="control-label">BAC SECRETARIAT:</label>
								<input type="text" class="form-control" name="sec" value="<?php echo $val->secretary;?>" required>
							</div>
							
							<div class="form-group">
								<label class="control-label">BAC MEMBER 1:</label>
								<input type="text" class="form-control" name="mem1" value="<?php echo $val->member1;?>"  required>
							</div>
							<div class="form-group">
								<label class="control-label">BAC MEMBER 2:</label>
								<input type="text" class="form-control" name="mem2" value="<?php echo $val->member2;?>" required>
							</div>
							<div class="form-group">
								<label class="control-label">BAC MEMBER 3:</label>
								<input type="text" class="form-control" name="mem3" value="<?php echo $val->member3;?>" required>
							</div>
							<div class="form-group">
								<label class="control-label">SK TREASURER:</label>
								<input type="text" class="form-control" name="sk_treasurer" value="<?php echo $val->sk_treasurer;?>" required>
							</div>
							<div class="form-group">
								<label class="control-label">HEAD OF PROCURING :</label>
								<input type="text" class="form-control" name="procuring" value="<?php echo $val->procuring;?>" required>
							</div>
							<div class="form-group">
								<label class="control-label">CHAIRMAN, COMMITTEE ON APPROPRIATIONS :</label>
								<input type="text" class="form-control" name="committee_approriations" value="<?php echo $val->committee_approriations;?>" required>
							</div>
							<div class="form-group">
								<label class="control-label">HEAD INSPECTION AND APPRAISAL COMMITTEE :</label>
								<input type="text" class="form-control" name="ai_committee" value="<?php echo $val->ai_committee;?>" required>
							</div>		
							<div class="form-group">
								<label class="control-label">BUDGET MONITORING OFFICER:</label>
								<input type="text" class="form-control" name="budget_officer" value="<?php echo $val->budget_officer;?>" required>
							</div>
                  </div>
                </div>
              </div>
			   <div class="col-5">
                <div class="card">
                  <div class="card-header">
                    <h4>BARANGAY INFORMATION</h4>
                  </div>
                  <div class="card-body">
							<div class="form-group">
								<label class="control-label">BARANGAY NAME:</label>
								<input type="text" class="form-control" name="barangay_name" value="<?php echo $val->barangay_name;?>"  required>
							</div>
							<div class="form-group">
								<label class="control-label">CITY / MUNICIPALITY:</label>
								<input type="text" class="form-control" name="city"  value="<?php echo $val->city;?>" required>
							</div>
							<div class="form-group">
								<label class="control-label">PROVINCE:</label>
								<input type="text" class="form-control" name="province" value="<?php echo $val->province;?>" required>
							</div>
							<div class="form-group">
								<label class="control-label">CONTACT NUMBER:</label>
								<input type="text" class="form-control" name="contact" value="<?php echo $val->contact;?>" required>
							</div>
							<div class="form-group">
								<label class="control-label">LOGO:</label>
								<input type="file" class="form-control" name="image" >
								<input type="hidden" class="form-control" name="logo" value="<?php echo $val->img_profile;?>" >
							</div>
							<div class="form-group">
								<img src="../assets/img/barangay/<?php echo $val->img_profile;?>" width="100px;">
							</div>
                  </div>
				  
                </div>
				<?php } ?>
				<div class="text-right"> <button type="submit" name="update-information" class="btn btn-info btn-lg"> UPDATE INFORMATION</button> </div>
				</form>
              </div>
			 
              </div>
              
      </div>  
	
<?php require('footer.php'); ?> 
