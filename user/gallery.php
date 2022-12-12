<?php include('header.php'); ?>       
<?php include('nav.php'); ?>       
<?php include('../controller/gallery.php'); ?> 
	<div class="main-content">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>GALLERY  </h4>
					<div class="card-header-action">
                      <a href="#" data-toggle="modal" data-target="#addnewdata" class="btn btn-primary">
                       <i class="fas fa-plus-circle"></i> ADD NEW ALBUM
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
                            <th class="text-center"> ALBUM </th>
                            <th class="text-center"></th>
                          </tr>
                        </thead>
						<tbody>
						<?php while($val = $album->fetch_object()){ ?>
							<tr> 
								<td class="text-center">  <a href="<?php echo 'album_gallery.php?data='.$val->albumID.'&name='.$val->albumName;?>"> <i class="fas fas fa-file-image"></i> <?php echo $val->albumName;?> </a> </td>
								<td  class="text-center">
									<button class="btn btn-info btn-sm"  data-toggle="modal" data-target="#updatealbum<?php echo $val->albumID;?>" > <i class="fas fa-pencil-alt"></i> UPDATE </button>
									<button class="btn btn-warning btn-sm"  data-toggle="modal" data-target="#removealbum<?php echo $val->albumID;?>" > <i class="fas fa-times-circle"></i> REMOVE </button>
								</td>
							</tr>
									<div class="modal fade" id="removealbum<?php echo $val->albumID;?>" tabindex="-1" role="dialog"
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
												<form method="post">
												 <input type="hidden" class="form-control" name="albumID" value="<?php echo $val->albumID;?>" required>
													ARE YOU SURE TO REMOVE THIS DATA? 							  
																
											  </div>
											  <div class="modal-footer bg-whitesmoke br">
												<button type="submit" name="remove-album" class="btn btn-warning">Remove</button>
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											  </div>
											  </form>
											</div>
										  </div>
										</div>
										
										<div class="modal fade" id="updatealbum<?php echo $val->albumID ;?>" tabindex="-1" role="dialog"
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
												<form  method="post">
																<div class="form-row">
																<div class="form-group col-md-12">
																	<label>ALBUM NAME : </label>
																	<div class="input-group">
																	 <input type="text" class="form-control" name="albumName" value="<?php echo $val->albumName;?>" required>
																	 <input type="hidden" class="form-control" name="albumID" value="<?php echo $val->albumID;?>" required>
																	</div>
																</div> 
																</div> 
																	
												  </div>
											  <div class="modal-footer bg-whitesmoke br">
												<button type="submit" name="update-album" class="btn btn-primary">Update</button>
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
							<form  method="post">
								<div class="form-row">
								<div class="form-group col-md-12">
									<label>ALBUM NAME : </label>
									<div class="input-group">
									 <input type="text" class="form-control" name="albumName" required>
									</div>
								</div> 
								</div> 
									
				  </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" name="add-album" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
			  </form>
            </div>
          </div>
        </div>
	  
	  <!-- END -->
<?php require('footer.php'); ?> 
