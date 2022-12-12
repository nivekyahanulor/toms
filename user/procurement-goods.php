<?php include('header.php'); ?>       
<?php include('nav.php'); ?>     
<?php include('../controller/sk-procurement.php'); ?> 
	<div class="main-content">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>PROCUREMENT OF GOODS </h4>
					<div class="card-header-action">
                      <a href="#" data-toggle="modal" data-target="#add-activity" class="btn btn-primary">
                       <i class="fas fa-plus-circle"></i> ADD NEW ACTIVITY
                      </a>
                    </div>
                  </div>
                  <div class="card-body">
				  
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
							$goods	= $mysqli->query("SELECT * FROM sk_procurement where brgy_id='$data' and procurement_type=1");
							while($val = $goods->fetch_object()){ ?>
							<tr> 
								<td class="text-left"> <?php echo $val->title;?> </td>
								<td class="text-left"> <?php echo $val->nature ;?> </td>
								<td class="text-center"> <?php echo $val->date_start ;?> </td>
								<td class="text-center"> <?php echo $val->date_end ;?> </td>
								<td class="text-center"> <?php if($val->status ==1) { echo '<span class="badge badge-light"> Pending </span>'; } else { echo '<span class="badge badge-success"> Success </span>'; }?> </td>
								<td class="text-center"><?php echo date ('Y-m-d', strtotime($val->date_added));?></td>
								<td class="text-center"> <?php echo date ('H:i:s', strtotime($val->date_added));?> </td>
								<td class="text-center"> 
									<button class="btn btn-info"  data-toggle="modal" data-target="#view-files<?php echo $val->proID;?>"><i class="fas fa-info-circle"></i></button>
									<a href="procurement-process.php?type=PROCUREMENT OF GOODS&data=<?php echo $val->proID;?>"><button class="btn btn-success"><i class="fas fa-file"></i></button></a>
									<button class="btn btn-warning" data-toggle="modal" data-target="#edit-pro<?php echo $val->proID;?>"><i class="fas fa-pencil-alt"></i></button>
									<?php if($val->status != 2) { ?>
										<button class="btn btn-danger" data-toggle="modal" data-target="#removepro<?php echo $val->proID;?>"><i class="fas fa-trash"></i></button>
									<?php } ?>
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
									$pro_type = 1;
									
									$procurement_goods	= $mysqli->query("SELECT * FROM procurement_goods where pro_id='$pro_id' and pro_type='$pro_type'");
									$row    = $procurement_goods->fetch_assoc();
									$count  = $procurement_goods->num_rows;
									
									if($count !=0){
										$card1 =  'card-success';
									} else {
										$card1 =  'card-danger';
										$link1 =  '#';
									}
									
									$procurement_bac	= $mysqli->query("SELECT * FROM procurement_bac_resolution where pro_id='$pro_id' and pro_type='$pro_type'");
									$row1    = $procurement_bac->fetch_assoc();
									$count1  = $procurement_bac->num_rows;
									
									if($count1 !=0){
										$card2 =  'card-success';
									} else {
										$card2 =  'card-danger';
									}
									
									$procurement_qou	= $mysqli->query("SELECT * FROM supplier where pro_id='$pro_id' and pro_type='$pro_type' and is_process=1");
									$row2    = $procurement_qou->fetch_assoc();
									$count2  = $procurement_qou->num_rows;
									
									if($count2 !=0){
										$card3 =  'card-success';
									} else {
										$card3 =  'card-danger';
									}
									;
									$procurement_po	= $mysqli->query("SELECT * FROM purchase_order where pro_id='$pro_id' and pro_type='$pro_type'");
									$row3    = $procurement_po->fetch_assoc();
									$count3  = $procurement_po->num_rows;
									
									if($count3 !=0){
										$card4 =  'card-success';
									} else {
										$card4 =  'card-danger';
									}
									
									$procurement_pa	= $mysqli->query("SELECT * FROM pa_report where pro_id='$pro_id' and pro_type='$pro_type'");
									$row4    = $procurement_pa->fetch_assoc();
									$count4  = $procurement_pa->num_rows;
									
									if($count4 !=0){
										$card5 =  'card-success';
									} else {
										$card5 =  'card-danger';
									}
									
									$procurement_ai	= $mysqli->query("SELECT * FROM ai_report where pro_id='$pro_id' and pro_type='$pro_type'");
									$row5    = $procurement_ai->fetch_assoc();
									$count5  = $procurement_ai->num_rows;
									
									if($count5 !=0){
										$card6 =  'card-success';
									} else {
										$card6=  'card-danger';
									}
									
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
											<div class="col-12 col-md-6 col-lg-3">
											<div class="card <?php echo $card1;?>">
											  <div class="card-body text-center">
													<img src="../assets/icons/1.png" width="100px" height="100px">
													<div style="height:20px;"></div>
													<?php if($count !=0){?>
													<?php if($row['is_approved'] ==1){ $color = 'primary';
														  } else if($row['is_approved'] ==2){ $color = 'warning';
														  } else { $color = 'success'; }
													?>
													<a href="procurement-purchase-request.php?data=<?php echo urlencode(base64_encode($val->proID));?>" target="_blank"><span class="badge badge-<?php echo $color;?>">Purchase Request</span></a>
													<?php } else { ?>
													<a><span class="badge badge-light">Purchase Request</strong></a>
													<?php } ?>
											  </div>
											</div>
										  </div>
										  <div class="col-12 col-md-6 col-lg-3">
											<div class="card  <?php echo $card2;?>">
											  <div class="card-body text-center">
													<img src="../assets/icons/2.png" width="100px" height="100px">
													<div style="height:20px;"></div>
													<?php if($count1 !=0){?>
													<?php if($row1['is_approved'] ==1){ $color1 = 'primary';
														  } else if($row1['is_approved'] ==2){ $color1 = 'warning';
														  } else { $color1 = 'success'; }
													?>
													<a href="procurement-bac-resolution.php?data=<?php echo urlencode(base64_encode($val->proID));?>" target="_blank"><span class="badge badge-<?php echo $color1;?>">BAC Resolution</span></a>
													<?php } else { ?>
													<a><span class="badge badge-light"><strong>BAC Resolution</strong></span></a>
													<?php } ?>
											  </div>
											</div>
										  </div>
										  <div class="col-12 col-md-6 col-lg-3">
											<div class="card <?php echo $card3;?>">
											  <div class="card-body text-center">
													<img src="../assets/icons/3.png" width="100px" height="100px">
													<div style="height:20px;"></div>
													<?php if($count2 !=0){?>
														<?php if($row2['is_approved'] ==1){ $color2 = 'primary';
														  } else if($row2['is_approved'] ==2){ $color2 = 'warning';
														  } else { $color2 = 'success'; }
													?>
													<a href="procurement-qoutation.php?data=<?php echo urlencode(base64_encode($val->proID));?>" target="_blank"><span class="badge badge-<?php echo $color2;?>">Quotation</span></a>
													<?php } else { ?>
													<a><span class="badge badge-light"><strong>Quotation</strong></span></a>
													<?php } ?>
											  </div>
											</div>
										  </div>
										  <div class="col-12 col-md-6 col-lg-3">
											<div class="card <?php echo $card3;?>">
											  <div class="card-body text-center">
													<img src="../assets/icons/3.png" width="100px" height="100px">
													<div style="height:20px;"></div>
													<?php if($count2 !=0){?>
													<?php if($row2['is_approved'] ==1){ $color2 = 'primary';
														  } else if($row2['is_approved'] ==2){ $color2 = 'warning';
														  } else { $color2 = 'success'; }
													?>
													<a href="procurement-abstract-qoutation.php?data=<?php echo urlencode(base64_encode($val->proID));?>" target="_blank"><span class="badge badge-<?php echo $color2;?>">Abstract Of Quotation</span></a>
													<?php } else { ?>
													<a><span class="badge badge-light"><strong>Abstract Of Quotation </strong></span></a>
													<?php } ?>
											  </div>
											</div>
										  </div>
									   </div>
									   <div class="row">
											<div class="col-12 col-md-6 col-lg-3">
											<div class="card <?php echo $card4;?>">
											  <div class="card-body text-center">
													<img src="../assets/icons/4.png" width="100px" height="100px">
													<div style="height:20px;"></div>
													<?php if($count3 !=0){?><?php if($row3['is_approved'] ==1){ $color3 = 'primary';
														  } else if($row3['is_approved'] ==2){ $color3 = 'warning';
														  } else { $color3 = 'success'; }
													?>
													<a href="procurement-purchase-order.php?data=<?php echo urlencode(base64_encode($val->proID));?>" target="_blank"><span class="badge badge-<?php echo $color3;?>">Purchase Order</span></a>
													<?php } else { ?>
													<a><span class="badge badge-light"><strong>Purchase Order</strong></span></a>
													<?php } ?>
											  </div>
											</div>
										  </div>
										  <div class="col-12 col-md-6 col-lg-3">
											<div class="card <?php echo $card5;?>">
											  <div class="card-body text-center">
													<img src="../assets/icons/5.png" width="100px" height="100px">
													<div style="height:20px;"></div>
													<?php if($count4 !=0){?>
													<?php if($row4['is_approved'] ==1){ $color4 = 'primary';
														  } else if($row4['is_approved'] ==2){ $color4 = 'warning';
														  } else { $color4 = 'success'; }
													?>
													<a href="procurement-pa-receipt.php?data=<?php echo urlencode(base64_encode($val->proID));?>" target="_blank"><span class="badge badge-<?php echo $color4;?>">PA Receipt</span></a>
													<?php } else { ?>
													<a><span class="badge badge-light"><strong>PA Receipt</strong></span></a>
													<?php } ?>
											  </div>
											</div>
										  </div>
										  <div class="col-12 col-md-6 col-lg-3">
											<div class="card <?php echo $card6;?>">
											  <div class="card-body text-center">
													<img src="../assets/icons/6.png" width="100px" height="100px">
													<div style="height:20px;"></div>
													<?php if($count5 !=0){?>
													<?php if($row5['is_approved'] ==1){ $color5 = 'primary';
														  } else if($row5['is_approved'] ==2){ $color5 = 'warning';
														  } else { $color5 = 'success'; }
													?>
													<a href="procurement-ai.php?data=<?php echo urlencode(base64_encode($val->proID));?>" target="_blank"><span class="badge badge-<?php echo $color5;?>">Acceptance and Inspection</span></a>
													<?php } else { ?>
													<a><span class="badge badge-light"><strong>Acceptance and Inspection</strong></span></a>
													<?php } ?>
											  </div>
											</div>
										  </div>
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
													<a href="procurement-dv.php?data=<?php echo urlencode(base64_encode($val->proID));?>" target="_blank"><span class="badge badge-<?php echo $color6;?>">Disbursement Voucher</span></a>
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
										<?php
											$data    = $_SESSION['brgyID'];
											$events1 = $mysqli->query("SELECT * FROM events where brgy_id='$data'");
											?>
											<select type="text" class="form-control" name="title" required>
											<option value=""> - Select Title - </option>
											<?php
											while($val = $events1->fetch_object()){ ?>
											
												<option> <?php echo $val->title;?> </option>
											
											<?php } ?>
											</select>
							<input type="hidden" class="form-control" name="brgyid" value="<?php echo $_SESSION['brgyID'];?>" required>
							<input type="hidden" class="form-control" name="ptype" value="1" required>
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
