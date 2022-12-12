<?php include('header.php'); ?>       
<?php include('nav.php'); ?>       
<?php include('../controller/users.php'); ?> 
	<div class="main-content">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>SYSTEM USERS INFORMATION </h4>
					<div class="card-header-action">
                      <a href="#" data-toggle="modal" data-target="#adduseraccount" class="btn btn-primary">
                       <i class="fas fa-address-card"></i> ADD USER ACCOUNT
                      </a>
                    </div>
                  </div>
                  <div class="card-body">
				  <?php if(isset($_GET['updated'])){ echo '<div class="alert alert-success"> User Account Updated !</div>';}?>
				  <?php if(isset($_GET['added']))  { echo '<div class="alert alert-info"> New User Account Added !</div>';}?>
				  <?php if(isset($_GET['deleted'])){ echo '<div class="alert alert-warning"> User Account Removed !</div>';}?>
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered" id="covid-data">
                        <thead>
                          <tr>
                            <th class="text-center"> NAME</th>
                            <th class="text-center"> USER NAME</th>
                            <th class="text-center"> DATE ADDED </th>
                            <th class="text-center"> TIME ADDED </th>
                            <th class="text-center"></th>
                          </tr>
                        </thead>
						<tbody>
						<?php while($val = $admin->fetch_object()){ ?>
							<tr> 
								<td class="text-left"> <?php echo $val->admin_name;?> </td>
								<td class="text-left"> <?php echo $val->username ;?> </td>
								<td class="text-center"> <?php echo date ('Y-m-d', strtotime($val->date_added));?> </td>
								<td class="text-center"> <?php echo date ('H:i A', strtotime($val->date_added));?> </td>
								<td class="text-center"> 
								<button class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#updateuseraccount<?php echo $val->accountID ;?>"> UPDATE </button>
								<button class="btn btn-warning btn-sm"  data-toggle="modal" data-target="#removeuseaccount<?php echo $val->accountID ;?>"> REMOVE </button>
								<?php if($val->isActive==1){ ?>
									<button class="btn btn-success btn-sm"  data-toggle="modal" data-target="#enableuser<?php echo $val->accountID ;?>"> ENABLE </button>
								<?php } else { ?>
									<button class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#disableuser<?php echo $val->accountID ;?>"> DISABLE </button>
								<?php } ?>
						    	</td>
							</tr>
							<!-- UPDATE USER ACCOUNT--->
								   <div class="modal fade" id="updateuseraccount<?php echo $val->accountID ;?>" tabindex="-1" role="dialog"
									  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
									  <div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
										  <div class="modal-header">
											<h5 class="modal-title" id="exampleModalCenterTitle">Update Account</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true">&times;</span>
											</button>
										  </div>
										  <div class="modal-body">
											<form  method="post" >
												<div class="form-row">
													<div class="form-group col-md-12">
													<label> Administrator Name : </label>
													<div class="input-group">
													 <input type="hidden" class="form-control" name="accountID" value="<?php echo $val->accountID ;?>" required>
													 <input type="text" class="form-control" name="name" value="<?php echo $val->admin_name;?>" required>
													</div>
												</div> 
												<div class="form-group col-md-12">
													<label>User Name: </label>
													<div class="input-group">
													 <input type="text" class="form-control" name="user_name" value="<?php echo $val->username ;?>" required>
													</div>
												</div>
												<div class="form-group col-md-12">
													<label>  Password : </label>
													<br>
													<small> Password that must contain 12 characters that are of at least one number, and one uppercase and lowercase letter: </small>
												<div class="input-group ">
													<input type="password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{12,}"  value="<?php echo $val->password ;?>" name="password" minlength="12" required>
												</div>
												</div>  
												</div> 
										  </div>
										  <div class="modal-footer bg-whitesmoke br">
											<button type="submit" name="update-user" class="btn btn-primary">Save</button>
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										  </div>
										  </form>
										</div>
									  </div>
									</div>
							<!--END-->
							<!-- REMOVE USER ACCOUNT -->
								<div class="modal fade" id="removeuseaccount<?php echo $val->accountID ;?>" tabindex="-1" role="dialog"
									  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
									  <div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
										  <div class="modal-header">
											<h5 class="modal-title" id="exampleModalCenterTitle">Remove Account</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true">&times;</span>
											</button>
										  </div>
										  <div class="modal-body">
											<form  method="post" >
											 <input type="hidden" class="form-control" name="accountID" value="<?php echo $val->accountID ;?>" required>
												ARE YOU SURE TO REMOVE THIS ACCOUNT DATA? 							  
															
										  </div>
										  <div class="modal-footer bg-whitesmoke br">
											<button type="submit" name="remove-user" class="btn btn-warning">Remove</button>
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										  </div>
										  </form>
										</div>
									  </div>
									</div>
							<!-- END -->
								<!-- DISABLE USER ACCOUNT -->
								<div class="modal fade" id="disableuser<?php echo $val->accountID ;?>" tabindex="-1" role="dialog"
									  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
									  <div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
										  <div class="modal-header">
											<h5 class="modal-title" id="exampleModalCenterTitle">Disable Account</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true">&times;</span>
											</button>
										  </div>
										  <div class="modal-body">
											<form  method="post" >
											 <input type="hidden" class="form-control" name="accountID" value="<?php echo $val->accountID ;?>" required>
												ARE YOU SURE TO DISABLE THIS ACCOUNT ? 							  
															
										  </div>
										  <div class="modal-footer bg-whitesmoke br">
											<button type="submit" name="disable-user" class="btn btn-warning">Yes</button>
											<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
										  </div>
										  </form>
										</div>
									  </div>
									</div>
								<!-- ENABLE USER ACCOUNT -->
								<div class="modal fade" id="enableuser<?php echo $val->accountID ;?>" tabindex="-1" role="dialog"
									  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
									  <div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
										  <div class="modal-header">
											<h5 class="modal-title" id="exampleModalCenterTitle">Enable Account</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true">&times;</span>
											</button>
										  </div>
										  <div class="modal-body">
											<form  method="post" >
											 <input type="hidden" class="form-control" name="accountID" value="<?php echo $val->accountID ;?>" required>
												ARE YOU SURE TO ENABLE THIS ACCOUNT ? 							  
															
										  </div>
										  <div class="modal-footer bg-whitesmoke br">
											<button type="submit" name="enable-user" class="btn btn-success">Yes</button>
											<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
										  </div>
										  </form>
										</div>
									  </div>
									</div>
							<!-- END -->
						<?php } ?>
						</tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
         </div>
      </div>  
	  <!-- ADD USER ACCOUNT MODAL -->
	   <div class="modal fade" id="adduseraccount" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add New Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
						<form  method="post">
											<div class="form-row">
											  <div class="form-group col-md-12">
												<label>Administrator Name : </label>
												<div class="input-group">
												  <input type="text" class="form-control" name="name" required>
												</div>
											  </div> 
											  	<div class="form-group col-md-12">
												<label>User Name: </label>
												<div class="input-group">
												  <input type="text" class="form-control" name="user_name" required>
												</div>
											  </div>
											  <div class="form-group col-md-12">
												<label>  Password : </label>
												<br>
												<small> Password that must contain 12 characters that are of at least one number, and one uppercase and lowercase letter: </small>
												<div class="input-group ">
												  <input type="password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{12,}" name="password" maxlength="12" required>
												</div>
											  </div>  
											</div> 
										
								
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-primary" name="add-user">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
			  </form>
            </div>
          </div>
        </div>
	  
	  <!-- END -->
<?php require('footer.php'); ?> 
