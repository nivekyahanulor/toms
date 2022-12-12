<?php include('header.php'); ?>       
<?php include('nav.php'); ?>       
<?php include('../controller/sk-calendar.php'); ?> 
	<div class="main-content">
          <div class="section-body">
            <div class="row">
              <div class="col-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Calendar</h4>
                  </div>
                  <div class="card-body">
                    <div class="fc-overflow">
                      <div id="myEvent"></div>
                    </div>
                  </div>
                </div>
              </div>
			   <div class="col-6">
                <div class="card">
                  <div class="card-header">
                    <h4>SCHEDULE  LIST</h4>
					<div class="card-header-action">
                      <a href="#" data-toggle="modal" data-target="#addevent" class="btn btn-primary">
                       <i class="fas fa-plus-circle"></i> ADD NEW EVENT SCHEDULE
                      </a>
                    </div>
                  </div>
                  <div class="card-body">
				  
						<?php if(isset($_GET['added'])){ echo '<div class="alert alert-info"> New Schedule successfully Added !</div>';}?>
						<?php if(isset($_GET['updated'])){ echo '<div class="alert alert-success"> Data successfully change !</div>';}?>
						<?php if(isset($_GET['removed'])){ echo '<div class="alert alert-warning"> Data successfully Removed !</div>';}?>
						
						<div class="table-responsive">
						<table class="table  table-bordered" id="covid-data">
										<thead>
										  <tr>
											<th class="text-center"> EVENT NAME</th>
											<th class="text-center"> START DATE</th>
											<th class="text-center"> END DATE</th>
											<th class="text-center"> STATUS</th>
											<th class="text-center"> DATE</th>
											<th class="text-center"> TIME</th>
											<th class="text-center"> ACTION</th>
										  </tr>
										</thead>
										<tbody>
										<?php while($val = $events1->fetch_object()){ ?>
											<tr> 
												<td class="text-center"> <?php echo $val->title;?> </td>
												<td class="text-center"> <?php echo date ('Y-m-d', strtotime($val->datetime_start));?> </td>
												<td class="text-center"> <?php echo date ('Y-m-d', strtotime($val->datetime_end));?> </td>
												<td class="text-center"> <?php if($val->status == 1){ echo '<span class="badge badge-primary">On-going</span>'; } else if($val->status==2){ echo '<span class="badge badge-success">Finished</span>'; } else { echo '<span class="badge badge-warning">Cancelled</span>';}?> </td>
												<td class="text-center"><?php echo date ('Y-m-d', strtotime($val->date_added));?></td>
											    <td class="text-center"><?php echo date ('H:i A', strtotime($val->date_added));?></td>
												<td class="text-center">
													<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#editevent<?php echo $val->ID;?>" > <i class="fas fa-pencil-alt"> </i></button>
													<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#removeevent<?php echo $val->ID;?>"> <i class="fas fa-trash-alt"> </i></button>
												</td>	
												<!--- EDIT FUND --->
												 <div class="modal fade" id="editevent<?php echo $val->ID;?>" tabindex="-1" role="dialog"
													  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
													  <div class="modal-dialog modal-dialog-centered" role="document">
														<div class="modal-content">
														  <div class="modal-header">
															<h5 class="modal-title" id="exampleModalCenterTitle">Update Event Details</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															  <span aria-hidden="true">&times;</span>
															</button>
														  </div>
														  <div class="modal-body">
															<form  method="post">
																	<div class="form-group">
																		<label for="schedule_remarks" class="control-label">Project:</label>
																		<textarea rows="3" class="form-control" name="title" id="title" required> <?php echo $val->title;?></textarea>
																		<input type="hidden" class="form-control" name="id" value="<?php echo $val->ID;?>">
																	</div>
																	<div class="form-group">
																		<label for="datetime_start" class="control-label">Date Time Start:</label>
																		<input type="datetime-local" class="form-control" name="start" value="<?php echo $val->datetime_start;?>" id="datetime_start" required>
																	</div>
																	<div class="form-group">
																		<label for="datetime_end" class="control-label">Date Time End:</label>
																		<input type="datetime-local" class="form-control" name="end" value="<?php echo $val->datetime_end;?>" id="datetime_end" required>
																	</div>
																	<div class="form-group">
																		<label for="datetime_end" class="control-label">Status:</label>
																		<select class="form-control" name="status">
																			<?php if($val->status == 1){?>
																				<option value="1" selected> On-going </option>
																				<option value="2"> Finish </option>
																				<option value="3"> Cancel </option>
																			<?php } else if ($val->status == 2){?>
																				<option value="1"> On-going </option>
																				<option value="2" selected> Finish </option>
																				<option value="3"> Cancel </option>
																			<?php } else if ($val->status == 3){?>
																				<option value="1"> On-going </option>
																				<option value="2"> Finish </option>
																				<option value="3" selected> Cancel </option>
																			<?php } ?>
																		</select>
																	</div>
														  </div>
														  <div class="modal-footer bg-whitesmoke br">
															<button type="submit" class="btn btn-success" name="edit-event">Update</button>
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
														  </div>
														  </form>
														</div>
													  </div>
													</div>
												<!--- END EDIT FUND --->
												<!--- REMOVE FUND --->
												 <div class="modal fade" id="removeevent<?php echo $val->ID;?>" tabindex="-1" role="dialog"
													  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
													  <div class="modal-dialog modal-dialog-centered" role="document">
														<div class="modal-content">
														  <div class="modal-header">
															<h5 class="modal-title" id="exampleModalCenterTitle">Remove Event Data</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															  <span aria-hidden="true">&times;</span>
															</button>
														  </div>
														  <div class="modal-body">
															<form  method="post">
																<strong> ARE YOU SURE TO REMOVE THIS DATA ? </strong>
																<input type="hidden" class="form-control" name="id" value="<?php echo $val->ID;?>" required>
														  </div>
														  <div class="modal-footer bg-whitesmoke br">
															<button type="submit" class="btn btn-warning" name="remove-event">Yes</button>
															<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
														  </div>
														  </form>
														</div>
													  </div>
													</div>
												<!--- END EDIT FUND --->
											</tr>
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
         </div>
      </div>  
		<!-- ADD FUND  MODAL -->
	   <div class="modal fade" id="addevent" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add Event Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
				<form method="post">
							<div class="form-group">
								<label for="schedule_remarks" class="control-label">Project:</label>
								<textarea rows="3" class="form-control" name="title" id="title" required> </textarea>
							</div>
							<div class="form-group">
								<label for="datetime_start" class="control-label">Date Time Start:</label>
								<input type="datetime-local" class="form-control" name="start" id="datetime_start" required>
							</div>
							<div class="form-group">
								<label for="datetime_end" class="control-label">Date Time End:</label>
								<input type="datetime-local" class="form-control" name="end" id="datetime_end" required>
							</div>
							
              </div>
              <div class="modal-footer bg-whitesmoke br">
				<button class="btn btn-flat btn-primary btn-sm mr-2" name="add-event" type="submit">Add Event</button>
				<button class="btn btn-flat btn-warning btn-sm" type="reset">Reset</button>
                <button type="button" class="btn btn-flat btn-secondary  btn-sm" data-dismiss="modal">Close</button>
              </div>
			  </form>
            </div>
          </div>
        </div>
	  
	  <!-- END -->
<?php require('footer.php'); ?> 
