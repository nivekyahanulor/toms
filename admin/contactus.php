<?php include('header.php'); ?>       
<?php include('nav.php'); ?>       
<?php include('../controller/contactus.php'); ?> 
	<div class="main-content">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
			  
                <div class="card">
                  <div class="card-header">
                    <h4>CONTACT INFORMATION</h4></a>
					<div class="card-header-action">
                      <a href="#" data-toggle="modal" data-target="#addnewdata" class="btn btn-primary">
                       <i class="fas fa-plus-circle"></i> ADD NEW DATA
                      </a>
                    </div>
                  </div>
                  <div class="card-body">
				    <?php if(isset($_GET['updated'])){ echo '<div class="alert alert-success"> Data successfully change !</div>';}?>
					<?php if(isset($_GET['added'])){ echo '<div class="alert alert-info"> Data successfully Added !</div>';}?>
					<?php if(isset($_GET['removed'])){ echo '<div class="alert alert-warning"> Data successfully Removed !</div>';}?>
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered" id="covid-data">
                        <thead>
                          <tr>
                            <th class="text-center"> CONTACT NAME </th>
                            <th class="text-center"> POSITION </th>
                            <th class="text-center"> CONTACT DETAILS </th>
                            <th class="text-center"> DATE </th>
                            <th class="text-center">  </th>
                          </tr>
                        </thead>
						<tbody>
						<?php while($val = $contactus->fetch_object()){ ?>
							<tr> 
								<td class="text-center"> <?php echo $val->contact_name ;?> </td>
								<td class="text-center"> <?php echo $val->position ;?> </td>
								<td class="text-center"> <?php echo $val->contact_details ;?> </td>
								<td class="text-center"> <?php echo $val->date_added;?> </td>
								<td  class="text-center">
								<button class="btn btn-primary btn-sm"  data-toggle="modal" id="productupdates" data-target="#updatecontact<?php echo $val->contactID;?>" > <i class="fas fa-pencil-alt"></i> UPDATE </button>
								<br>
								<br>
								<button class="btn btn-warning btn-sm"  data-toggle="modal" id="productupdates" data-target="#removecontact<?php echo $val->contactID;?>" > <i class="fas fa-times-circle"></i> REMOVE </button>
								</td>
							</tr>
										<div class="modal fade" id="removecontact<?php echo $val->contactID ;?>" tabindex="-1" role="dialog"
										  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
										  <div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
											  <div class="modal-header">
												<h5 class="modal-title" id="exampleModalCenterTitle">Remove Data</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												  <span aria-hidden="true">&times;</span>
												</button>
											  </div>
											  <div class="modal-body">
												<form  method="post" >
												 <input type="hidden" class="form-control" name="contactID" value="<?php echo $val->contactID;?>" required>
													ARE YOU SURE TO REMOVE THIS DATA? 							  
											  </div>
											  <div class="modal-footer bg-whitesmoke br">
												<button type="submit" name="remove-contact" class="btn btn-warning">Remove</button>
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											  </div>
											  </form>
											</div>
										  </div>
										</div>
										
										<div class="modal fade" id="updatecontact<?php echo $val->contactID ;?>" tabindex="-1" role="dialog"
										  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
										  <div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
											  <div class="modal-header">
												<h5 class="modal-title" id="exampleModalCenterTitle">Update Data</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												  <span aria-hidden="true">&times;</span>
												</button>
											  </div>
											  <div class="modal-body">
												<form  method="post" >
												 <input type="hidden" class="form-control" name="contactID" value="<?php echo $val->contactID;?>" required>
												<div class="form-row">
													<div class="form-group col-md-12">
														<label> CONTACT NAME : </label>
														<div class="input-group">
															<input type="text" class="form-control" name="contact_name"  value="<?php echo $val->contact_name;?>" required>
														</div>
													 </div> 
													 <div class="form-group col-md-12">
														<label> POSITION  : </label>
														<div class="input-group">
															<input type="text" class="form-control" name="position"  value="<?php echo $val->position;?>" required>
														</div>
													 </div> 
													
													 <div class="form-group col-md-12">
														<label>CONTACT DETAILS : </label>
														<div class="input-group">
															<textarea class="form-control" name="contact_details" required><?php echo $val->contact_details;?></textarea>
														</div>
													 </div> 
												</div> 
												  </div>
											  <div class="modal-footer bg-whitesmoke br">
												<button type="submit" name="update-contact" class="btn btn-primary">Save</button>
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											  </div>
											  </form>
											</div>
										  </div>
										</div>
									</div>  
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
		<!-- ADD NEW DATA MODAL -->
	   <div class="modal fade" id="addnewdata" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add New Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
				  <div class="modal-body">
							<form  method="post" enctype="multipart/form-data">
								<div class="form-row">
									<div class="form-group col-md-12">
										<label> CONTACT NAME : </label>
										<div class="input-group">
											<input type="text" class="form-control" name="contact_name" required>
										</div>
									 </div> 
									 <div class="form-group col-md-12">
														<label> POSITION  : </label>
														<div class="input-group">
															<input type="text" class="form-control" name="position"  required>
														</div>
													 </div> 
									 <div class="form-group col-md-12">
										<label>CONTACT DETAILS : </label>
										<div class="input-group">
											<textarea class="form-control" name="contact_details" required></textarea>
										</div>
									 </div> 
								</div> 
				  </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" name="add-new-contact" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
			  </form>
            </div>
          </div>
        </div>
	  
	  <!-- END -->
<?php require('footer.php'); ?> 
