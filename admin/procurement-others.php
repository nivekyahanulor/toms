<?php include('header.php'); ?>       
<?php include('nav.php'); ?>     
<?php include('../controller/sk-procurement.php'); ?> 
	<div class="main-content">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>PROCUREMENT (OTHERS) </h4>
				
                  </div>
                  <div class="card-body">
				    <?php $data = base64_decode(urldecode($_GET['data'])); ?>
				    <?php if(isset($_GET['updated'])){ echo '<div class="alert alert-success"> Data successfully change !</div>';}?>
					<?php if(isset($_GET['added'])){ echo '<div class="alert alert-info"> Data successfully Added !</div>';}?>
					<?php if(isset($_GET['removed'])){ echo '<div class="alert alert-warning"> Data successfully Removed !</div>';}?>
					<?php if(isset($_GET['process-done'])){ echo '<div class="alert alert-success">Process Successfully Done!</div>';}?>
					
                      <table class="table table-striped table-bordered" id="sk-data">
                        <thead>
                          <tr>
                            <th class="text-center"> TITLE </th>
                            <th class="text-center"> NATURE</th>
                            <th class="text-center"> DATE START </th>
                            <th class="text-center"> DATE END </th>
                            <th class="text-center"> STATUS</th>
                            <th class="text-center"> DATE CREATED</th>
                            <th class="text-center"> TIME CREATED</th>
                            <th class="text-center"> ACTION</th>
                          </tr>
                        </thead>
						<tbody>
						<?php 
							$goods	= $mysqli->query("SELECT * FROM sk_procurement where brgy_id='$data' and procurement_type=3");
							while($val = $goods->fetch_object()){ ?>
							<tr> 
								<td class="text-left"> <?php echo $val->title;?> </td>
								<td class="text-left"> <?php echo $val->nature ;?> </td>
								<td class="text-center"> <?php echo $val->date_start ;?> </td>
								<td class="text-center"> <?php echo $val->date_end ;?> </td>
								<td class="text-center"> <?php if($val->status ==1) { echo '<span class="badge badge-light"> Pending </span>'; } else { echo '<span class="badge badge-success"> Success </span>'; }?> </td>
								<td class="text-center"> <?php echo date ('Y-m-d', strtotime($val->date_added));?> </td>
								<td class="text-center"> <?php echo date ('H:i A', strtotime($val->date_added));?> </td>
								<td class="text-center"> 
									<button class="btn btn-info"  data-toggle="modal" data-target="#view-files<?php echo $val->proID;?>"><i class="fas fa-info-circle"></i></button>
								</td>
							</tr>
							<!--- EDIT PROCUREMENT --->
							<div class="modal fade" id="edit-pro<?php echo $val->proID;?>" tabindex="-1" role="dialog"  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalCenterTitle">Update Information  Details</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
								<form  method="post">
									<div class="form-row">
										<div class="form-group col-md-12">
										<label>Title Name : </label>
											<div class="input-group">
												<input type="text" class="form-control" name="title" value="<?php echo $val->title;?>" required>
												<input type="hidden" class="form-control" name="proID" value="<?php echo $val->proID;?>" required>

											</div>
										</div> 
										<div class="form-group col-md-12">
										<label>Nature  : </label>
											<div class="input-group">
												<input type="text" class="form-control" name="nature" value="<?php echo $val->nature;?>" required>
											</div>
										</div>
										<div class="form-group col-md-12">
										<label>Date Start  : </label>
											<div class="input-group">
												<input type="date" class="form-control" name="date_start" value="<?php echo $val->date_start;?>" required>
											</div>
										</div>
										<div class="form-group col-md-12">
										<label>Date End  : </label>
											<div class="input-group">
												<input type="date" class="form-control" name="date_end" value="<?php echo $val->date_end;?>" required>
											</div>
										</div>
									</div> 
								</div>
								<div class="modal-footer bg-whitesmoke br">
									<button type="submit" class="btn btn-success" name="edit-pro">Update</button>
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
								</form>
								</div>
								 </div>
							</div>
								<!--- END EDIT PROCUREMENT --->							
								<!--- REMOVE PROCUREMENT --->
								<div class="modal fade" id="removepro<?php echo $val->proID;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalCenterTitle">Remove Procurement Data</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
										<form  method="post">
											<strong> ARE YOU SURE TO REMOVE THIS DATA ? </strong>
											<input type="hidden" class="form-control" name="proID" value="<?php echo $val->proID;?>" required>
										</div>
										<div class="modal-footer bg-whitesmoke br">
											<button type="submit" class="btn btn-warning" name="remove-pro">Yes</button>
											<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
										</div>
										</form>
										</div>
									</div>
								</div>
								<?php 
									$pro_id   =  $val->proID;
									$pro_type = 3;
									
									
									
									$procurement_dv	= $mysqli->query("SELECT * FROM dv_report where pro_id='$pro_id' and pro_type='$pro_type'");
									$row6    = $procurement_dv->fetch_assoc();
									$count6  = $procurement_dv->num_rows;
									
									if($count6 !=0){
										$card7 =  'card-success';
									} else {
										$card7 =  'card-danger';
									}
									
									?>
								<div class="modal fade" id="view-files<?php echo $val->proID;?>" tabindex="-1" role="dialog"
								  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
								  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
									<div class="modal-content">
									  <div class="modal-header">
										<h5 class="modal-title" id="exampleModalCenterTitle">Documents  Details</h5>
										&nbsp;&nbsp;
										<span class="badge badge-primary">Admin Approved</span>&nbsp;&nbsp;
										<span class="badge badge-warning">Admin Declined</span>&nbsp;&nbsp;
										<span class="badge badge-success">Done Process (For Admin Approval)</span>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									  </div>
									  <div class="modal-body">
										<div class="row">
										<div class="col-12">
									   <div class="row justify-content-center">
											
										  <div class="col-12 col-md-6 col-lg-3">
											<div class="card <?php echo $card7;?>">
											  <div class="card-body text-center">
													<img src="../assets/icons/7.png" width="100px" height="100px">
													<div style="height:20px;"></div>
													<?php if($count6 !=0){?>
														<?php if($row6['is_approved'] ==1){ $color6 = 'primary';
														  } else if($row6['is_approved'] ==2){ $color6 = 'warning';
														  } else { $color6 = 'success'; }
													?>
													<a href="procurement-dv.php?data=<?php echo urlencode(base64_encode($val->proID));?>&brgy=<?php echo $data;?>" target="_blank"><span class="badge badge-<?php echo $color6;?>">Disbursement Voucher</span></a>
													<?php } else { ?>
													<a><span class="badge badge-light"><strong>Disbursement Voucher</strong></span></a>
													<?php } ?>
											  </div>
											</div>
										  </div>
									   </div>
									</div>
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
	 
	  	<!-- ADD ACTIVITY  MODAL -->
	   <div class="modal fade" id="add-activity" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Activity  Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
				<form  method="post">
					<div class="form-row">
						<div class="form-group col-md-12">
						<label>Title: </label>
						<div class="input-group">
							<input type="text" class="form-control" name="title" required>
							<input type="hidden" class="form-control" name="brgyid" value="<?php echo $_SESSION['brgyID'];?>" required>
							<input type="hidden" class="form-control" name="ptype" value="3" required>
						</div>
						</div> 
						<div class="form-group col-md-12">
							<label>Nature  : </label>
							<div class="input-group">
							<input type="text" class="form-control" name="nature" required>
						</div>
						</div>
						<div class="form-group col-md-12">
							<label>Date Start  : </label>
							<div class="input-group">
							<input type="date" class="form-control" name="date_start" required>
						</div>
						</div>
						<div class="form-group col-md-12">
							<label>Date End  : </label>
							<div class="input-group">
							<input type="date" class="form-control" name="date_end" required>
						</div>
						</div>
						
					</div> 
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-primary" name="add-goods">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
			  </form>
            </div>
          </div>
        </div>
	  
	  <!-- END -->
<?php require('footer.php'); ?> 
