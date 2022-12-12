<?php include('header.php'); ?>       
<?php include('nav.php'); ?>       
<?php include('../controller/awards.php'); ?> 
	<div class="main-content">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>AWARDS  </h4>
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
                            <th class="text-center"> AWARD TITLE </th>
                            <th class="text-center"> AWARD IMAGE</th>
                            <th class="text-center"> DATE ADDED</th>
                            <th class="text-center"> </th>
                          </tr>
                        </thead>
						<tbody>
						<?php while($val = $awards->fetch_object()){ ?>
							<tr> 
								<td class="text-center"> <?php echo $val->awardTitle;?> </td>
								<td class="text-center"> <img src="<?php echo '../assets/img/awards/'.$val->awards_image;?>" width="250px"> </td>
								<td class="text-center"> <?php echo $val->date_added;?> </td>
							
								<td  class="text-center">
								<button class="btn btn-warning btn-md"  data-toggle="modal" data-target="#removeawards<?php echo $val->awardsID;?>" > <i class="fas fa-times-circle"></i> REMOVE </button>
								</td>
							</tr>
									<!-- REMOVE PRODUCT  -->
									<div class="modal fade" id="removeawards<?php echo $val->awardsID;?>" tabindex="-1" role="dialog"
										  aria-labelledby="exampleModalCenterTitle" aria-hidden=">">
										  <div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
											  <div class="modal-header">
												<h5 class="modal-title" id="exampleModalCenterTitle">Remove Data</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												  <span aria-hidden="true">&times;</span>
												</button>
											  </div>
											  <div class="modal-body">
												<form  method="post">
												 <input type="hidden" class="form-control" name="awardsID" value="<?php echo $val->awardsID;?>" required>
													ARE YOU SURE TO REMOVE THIS DATA? 							  
																
											  </div>
											  <div class="modal-footer bg-whitesmoke br">
												<button type="submit" name="remove-awards" class="btn btn-warning">Remove</button>
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
          <div class="modal-dialog  modal-dialog-centered" role="document">
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
										<label> AWARD TITLE : </label>
										<div class="input-group">
											<input type="text" class="form-control" name="title" required>
										</div>
									 </div> 
									
									 <div class="form-group col-md-12">
										<label>PHOTO : </label>
										<div class="input-group">
											<input type="file" class="form-control" name="image" accept="image/x-png,image/gif,image/jpeg" required>
										</div>
									 </div> 
								</div> 
				  </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" name="add-awards" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
			  </form>
            </div>
          </div>
        </div>
	  
	  <!-- END -->
<?php require('footer.php'); ?> 
