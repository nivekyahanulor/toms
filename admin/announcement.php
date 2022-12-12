<?php include('header.php'); ?>       
<?php include('nav.php'); ?>       
<?php include('../controller/announcement.php'); ?> 
	<div class="main-content">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>NEWS AND ANNOUNCEMENT </h4>
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
                            <th class="text-center"> TITLE </th>
                            <th class="text-center"> CONTENT </th>
                            <th class="text-center"> TYPE </th>
                            <th class="text-center"></th>
                          </tr>
                        </thead>
						<tbody>
						<?php while($val = $about->fetch_object()){ ?>
									<tr> 
										<td class="text-left"> <?php echo $val->title;?> </td>
										<td class="text-left"> <?php echo $val->content;?> </td>
										<td class="text-left"> <?php echo $val->aType;?> </td>
										<td  class="text-center">
										<button class="productupdates btn btn-primary btn-md"  data-toggle="modal" data-target="#productupdate<?php echo $val->announcementID ;?>" data-id="<?php echo $val->announcementID;?>" > <i class="fas fa-pencil-alt"></i>  </button>
										<br>
										<br>
										<button class="btn btn-warning btn-md"  data-toggle="modal" id="productupdates" data-target="#productremove<?php echo $val->announcementID;?>" > <i class="fas fa-times-circle"></i>  </button>
										</td>
									</tr>
									<div class="modal fade" id="productremove<?php echo $val->announcementID ;?>" tabindex="-1" role="dialog"
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
												 <input type="hidden" class="form-control" name="announcementID" value="<?php echo $val->announcementID;?>" required>
													ARE YOU SURE TO REMOVE THIS DATA? 							  
											  </div>
											  <div class="modal-footer bg-whitesmoke br">
												<button type="submit" class="btn btn-warning" name="remove-announcement">Remove</button>
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											  </div>
											  </form>
											</div>
										  </div>
										</div>
										<!-- END -->
										<div class="modal fade" id="productupdate<?php echo $val->announcementID;?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
										  <div class="modal-dialog" role="document">
												  <div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="deleteModalLabel">Data Information </h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
													</div>
													<div class="modal-body">
													<hr>
																<form  method="post" enctype="multipart/form-data">
																	<div class="form-row">
																	  <div class="form-group col-md-12">
																		<label>Category : </label>
																		<div class="input-group">
																		  <select  class="form-control" name="aType" required>
																			<option select> -- SELECT CATEGORY -- </option>
																			<?php if($val->aType == 'News'){ 
																						echo '  <option value="News" selected> News</option>
																						<option value="Announcement"> Announcement</option>	';
																				     } else if($val->aType == 'Announcement'){ 
																						echo '  <option value="News" > News</option>
																						<option value="Announcement" selected> Announcement</option>';
																					 }
																			?>
																		  </select>
																		</div>
																	  </div> 
																	</div> 
																	<div class="form-row">
																	  <div class="form-group col-md-12">
																		<label>Title: </label>
																		<div class="input-group">
																		  <input type="text" class="form-control" name="title" value="<?php echo $val->title;?>" required>
																		  <input type="hidden" class="form-control" name="announcementID" value="<?php echo $val->announcementID;?>" required>
																		</div>
																	  </div> 
																	</div> 
																	<div class="form-row">
																	  <div class="form-group col-md-12">
																		<label>Content : </label>
																		<div class="input-group">
																		  <textarea type="text" class="form-control" name="content"  id="summernote2<?php echo $val->announcementID;?>" ><?php echo $val->content;?></textarea>
																		</div>
																	  </div> 
																	</div> 
								
															</div>
														<div class="modal-footer bg-whitesmoke br">
														<button type="submit" class="btn btn-primary" name="update-announcement">Update</button>
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
					<form  method="post"  enctype="multipart/form-data">
											<div class="form-row">
											  <div class="form-group col-md-12">
												<label>Category : </label>
												<div class="input-group">
												  <select  class="form-control" name="aType" required>
													<option select> -- SELECT CATEGORY -- </option>
													<option value="News"> News</option>
													<option value="Announcement"> Announcement</option>
												  </select>
												</div>
											  </div> 
											</div> 
											
											<div class="form-row">
											  <div class="form-group col-md-12">
												<label>Title: </label>
												<div class="input-group">
												  <input type="text" class="form-control" name="title" required>
												</div>
											  </div> 
											</div> 
											<div class="form-row">
											  <div class="form-group col-md-12">
												<label>Content : </label>
												<div class="input-group">
												  <textarea type="text" class="form-control" id="summernote1" name="content" style="width:100% !important;" ></textarea>
												</div>
											  </div> 
											</div> 
								
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" name="add-announcement" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
			  </form>
            </div>
          </div>
        </div>
	  
	  <!-- END -->
<?php require('footer.php'); ?> 
