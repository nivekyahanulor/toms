<?php include('header.php'); ?>       
<?php include('nav.php'); ?> 
<?php include('../controller/about.php'); ?> 
	<div class="main-content">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>ABOUT INFORMATION </h4>
                  </div>
                  <div class="card-body">
				  <?php if(isset($_GET['updated'])){ echo '<div class="alert alert-success"> Data successfully change !</div>';}?>
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered" id="covid-data">
                        <thead>
                          <tr>
                            <th class="text-center"> LOGO </th>
                            <th class="text-center"> TITLE </th>
                            <th class="text-center"> CONTENT </th>
                            <th class="text-center"></th>
                          </tr>
                        </thead>
						<tbody>
						<?php while($val = $about->fetch_object()){ ?>
							<tr> 
								<td class="text-center"> <img src="../assets/img/<?php echo $val->logo ;?>" width="100px"><br><br><?php echo $val1->title ;?> </td>
								<td class="text-left"> <?php echo $val->title ;?> </td>
								<td class="text-left"> <?php echo $val->content ;?> </td>
								<td  class="text-center"><button class="btn btn-primary btn-md" data-toggle="modal" id="membersinfo" data-target="#about<?php echo $val->aboutID;?>"> <i class="fas fa-pencil-alt"></i> UPDATE </button></td>
							</tr>
								<div class="modal fade" id="about<?php echo $val->aboutID;?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
										  <div class="modal-dialog modal-lg" role="document">
												  <div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="deleteModalLabel">Data Information </h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
													</div>
													<div class="modal-body">
													<hr>
															<form  method="post">
																	<input type="hidden" name="aboutid"  value="<?php echo $val->aboutID;?>" class="form-control" placeholder="">
																	<div class="form-row">
																	  <div class="form-group col-md-12">
																		<input class="form-control"  type="text" name="title" value="<?php echo $val->title;?>"  class="form-control" >
																	  </div>
																	</div> 
																	<div class="form-row">
																	  <div class="form-group col-md-12">
																		  <textarea class="form-control" name="content" id ="summernote1" style="height:400px !important;"><?php echo $val->content;?></textarea>
																	  </div>
																	</div> 
																	<div class="modal-footer">
																	<button type="submit" name="update-about"  class="btn btn-primary">UPDATE</button>
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
<?php require('footer.php'); ?> 
