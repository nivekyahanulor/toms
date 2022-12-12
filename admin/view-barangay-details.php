	<?php 
		include('header.php');  
		include('nav.php'); 
		include('../controller/barangay-budget.php');
		$data = base64_decode(urldecode($_GET['data']));
	?>  
      <!-- Main Content -->
      <div class="main-content">
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-4">
			  
                <div class="card author-box">
				
                  <div class="card-body">
				  
                    <div class="author-box-center">
						<?php while($info1 = $information1->fetch_object()){ 
							if($info1->img_profile == ""){
						?>
						  <img alt="image" src="../assets/img/sk-logo.png" width="100px;" class="rounded-circle author-box-picture">
						<?php } else { ?>
						  <img alt="image" src="../assets/img/barangay/<?php echo $info1->img_profile;?>" width="100px;" class="rounded-circle author-box-picture">
						<?php } ?>
					<?php }?>
                      <div class="clearfix"></div>
                      <div class="author-box-name">
                        <a href="#">BARANGAY <?php echo $data;?></a>
                      </div>
                    </div>
					<div style="height:20px;"></div>
                    <div class="row text-center">
					  <div class="col-12 col-md-12 col-lg-12">
						<div class="card card-primary">
						  <div class="card-header text-center">
							<h6> TOTAL BUDGET</h6>
						  </div>
						  <div class="card-body">
							  <?php 
							  
							    while($tf = $trustfund->fetch_object()){ 
									$total_tf += $tf->amount;
								}
								
								while($tf1 = $trustfund1->fetch_object()){ 
									$total_tf1 += $tf1->amount;
								}
								
								while($val2 = $budget->fetch_object()){ 
									$total_budget += $val2->amount;
								}
								?>
								<h4> ₱ <?php echo number_format($total_budget-$total_tf,2);?> </h4>
						  </div>
						</div>
					  </div>
					  <div class="col-12 col-md-12 col-lg-12">
						<div class="card card-warning">
						  <div class="card-header text-center">
							<h6> TOTAL EXPENSES</h6>
						  </div>
						  <div class="card-body">
							 <?php 
								while($exp = $expenses1->fetch_object()){ 
									$total_exp += $exp->amount;
								}
								?>
								<h4> ₱ <?php echo number_format($total_exp,2);?> </h4>
						  </div>
						</div>
					  </div>
					  <div class="col-12 col-md-12 col-lg-12">
						<div class="card card-secondary">
						  <div class="card-header text-center">
							<h6> REMAINING FUNDS</h6>
						  </div>
						  <div class="card-body">
							<h4> ₱ <?php echo number_format(($total_budget-$total_exp)-$total_tf,2);?> </h4>
						  </div>
						</div>
					  </div> 
					  <div class="col-12 col-md-12 col-lg-12">
						<div class="card card-secondary">
						  <div class="card-header">
							<h6> TRUST FUNDS</h6>
						  </div>
						  <div class="card-body">
							<h4> ₱ <?php echo number_format($total_tf1,2);?> </h4>
						  </div>
						</div>
					  </div>
					 
					  <div class="col-12 col-md-12 col-lg-12">
						<div class="card card-success">
						  <div class="card-header text-center">
							<h6>TOTAL ACTIVITIES</h6>
						  </div>
						  <div class="card-body">
							 <?php 
								while($ev1 = $events1->fetch_object()){ 
									echo "<h4>". $ev1->total_event . " </h4>";
								}
								?>
						  </div>
						</div>
					  </div>
					  </div>
					</div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h4>SK OFFICERS</h4>
					<div class="card-header-action">
						 <a href="#" data-toggle="modal" data-target="#sk-account" class="btn btn-primary">
							<i class="fas fa-pencil-alt"> </i> UPDATE ACCOUNT 
						</a>
					</div>
                  </div>
                  <div class="card-body">
					<?php if(isset($_GET['account-updated'])){ echo '<div class="alert alert-success"> User Account Updated !</div>';}?>
                    <div class="py-4">
					<?php while($info = $information->fetch_object()){ ?>
					
                      <p class="clearfix">
                        <span class="float-left">
                         SK CHAIRMAN:
                        </span>
                        <span class="float-right">
							<strong> <?php echo strtoupper($info->sk_chairman);?> </strong>
                        </span>
                      </p> 
					  
					  <p class="clearfix">
                        <span class="float-left">
                         SK VICE CHAIRMAN:
                        </span>
                        <span class="float-right">
							<strong> <?php echo strtoupper($info->vice_chairman);?> </strong>
                        </span>
                      </p> 
					  
					  <p class="clearfix">
                        <span class="float-left">
                         BAC SECRETARIAT:
                        </span>
                        <span class="float-right">
							<strong> <?php echo strtoupper($info->secretary);?> </strong>
                        </span>
                      </p>
					    <p class="clearfix">
                        <span class="float-left">
                       SK TREASURER:
                        </span>
                        <span class="float-right">
							<strong> <?php echo strtoupper($info->sk_treasurer);?> </strong>
                        </span>
                      </p>
					  
					   <p class="clearfix">
                        <span class="float-left">
                         BAC MEMBER 1:
                        </span>
                        <span class="float-right">
							<strong> <?php echo strtoupper($info->member1);?> </strong>
                        </span>
                      </p>
					  
					   <p class="clearfix">
                        <span class="float-left">
                         BAC MEMBER 2:
                        </span>
                        <span class="float-right">
							<strong> <?php echo strtoupper($info->member2);?> </strong>
                        </span>
                      </p>
					  
					   <p class="clearfix">
                        <span class="float-left">
                         BAC MEMBER 3
                        </span>
                        <span class="float-right">
							<strong> <?php echo strtoupper($info->member3);?> </strong>
                        </span>
                      </p>
					  
					   <p class="clearfix">
                        <span class="float-left">
                         HEAD OF PROCURING:
                        </span>
                        <span class="float-right">
							<strong> <?php echo strtoupper($info->procuring);?> </strong>
                        </span>
                      </p> 
					  <p class="clearfix">
                        <span class="float-left">
                         CHAIRMAN, COMMITTEE ON APPROPRIATIONS :
                        </span>
                        <span class="float-right">
							<strong> <?php echo strtoupper($info->committee_approriations);?> </strong>
                        </span>
                      </p> 
					  <p class="clearfix">
                        <span class="float-left">
                        INSPECTION AND APPRAISAL COMMITTEE :
                        </span>
                        <span class="float-right">
							<strong> <?php echo strtoupper($info->ai_committee);?> </strong>
                        </span>
                      </p> 
					  <p class="clearfix">
                        <span class="float-left">
                        BUDGET MONITORING OFFICER:
                        </span>
                        <span class="float-right">
							<strong> <?php echo strtoupper($info->budget_officer);?> </strong>
                        </span>
                      </p> 
                  
                     
					<?php } ?>
                    </div>
                  </div>
                </div>
         
              </div>
              <div class="col-12 col-md-12 col-lg-8">
                <div class="card">
                  <div class="padding-20">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
					  <li class="nav-item">
                        <a href="procurement-goods.php?data=<?php echo $_GET['data'];?>" class="nav-link" >GOODS</a>
                      </li>
					  <li class="nav-item">
                        <a href="procurement-services.php?data=<?php echo $_GET['data'];?>"  class="nav-link" >SERVICES</a>
                      </li>
					  <li class="nav-item">
                        <a href="procurement-others.php?data=<?php echo $_GET['data'];?>"  class="nav-link" >OTHERS</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#budgets" role="tab"
                          aria-selected="true">BUDGETS</a>
                      </li>
					   <li class="nav-item">
                        <a class="nav-link" id="expenses-tab2" data-toggle="tab" href="#expenses" role="tab"
                          aria-selected="false">EXPENSES</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings" role="tab"
                          aria-selected="false">CALENDARS</a>
                      </li>
					
                    </ul>
                    <div class="tab-content tab-bordered" id="myTab3Content">
					  
                      <div class="tab-pane fade show active" id="budgets" role="tabpanel" aria-labelledby="home-tab2">
							<div class="card">
								  <div class="card-header" >
									<h4>BARANGAY <?php echo $data;?> BUDGET DATA</h4>
									<div class="card-header-action">
									  <a href="#" data-toggle="modal" data-target="#addfund" class="btn btn-primary">
									   <i class="fas fa-circle"></i> ADD FUND
									  </a>  
									  <a href="#" data-toggle="modal" data-target="#pfund" class="btn btn-success">
									   <i class="fas fa-redo"></i> PROCESS TRUST FUND
									  </a>
									</div>
								  </div>
								  <div class="card-body">
								  <?php if(isset($_GET['updated'])){ echo '<div class="alert alert-success"> Fund Data Updated !</div>';}?>
								  <?php if(isset($_GET['added']))  { echo '<div class="alert alert-info"> New Fund Added !</div>';}?>
								  <?php if(isset($_GET['removed'])){ echo '<div class="alert alert-warning"> Fund Data Removed !</div>';}?>
									<div class="table-responsive">
									  <table class="table  table-bordered" id="budget-data">
										<thead>
										  <tr>
											<th class="text-center"> TRANSACTION NAME</th>
											<th class="text-center"> AMOUNT</th>
											<th class="text-center"> DATE</th>
											<th class="text-center">  TIME</th>
											<th class="text-center"> ACTION</th>
										  </tr>
										</thead>
										<tbody>
										<?php while($val = $budget1->fetch_object()){ 
											
											$date =date_create($val->date_added);
										
										?>
											<tr> 
												<td class="text-left"> <?php echo $val->transaction_name;?> </td>
												<td class="text-right"> ₱ <?php echo number_format($val->amount,2);?> </td>
												<td class="text-center"> <?php echo date_format($date,"Y/m/d");?> </td>
												<td class="text-center"> <?php echo date_format($date,"H:i:s");?> </td>
												<td class="text-center"><?php if($val->is_admin==1){ ?>
														<button class="btn btn-success btn-md" data-toggle="modal" data-target="#editfund<?php echo $val->bID;?>" > <i class="fas fa-pencil-alt"> </i></button>
														<button class="btn btn-warning btn-md" data-toggle="modal" data-target="#removefund<?php echo $val->bID;?>"> <i class="fas fa-trash-alt"> </i></button>
												<?php } ?> </td>
											</tr>
											<!--- EDIT FUND --->
												 <div class="modal fade" id="editfund<?php echo $val->bID;?>" tabindex="-1" role="dialog"
													  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
													  <div class="modal-dialog modal-dialog-centered" role="document">
														<div class="modal-content">
														  <div class="modal-header">
															<h5 class="modal-title" id="exampleModalCenterTitle">Update Fund Details</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															  <span aria-hidden="true">&times;</span>
															</button>
														  </div>
														  <div class="modal-body">
															<form  method="post">
																<div class="form-row">
																	<div class="form-group col-md-12">
																	<label>Transaction Name : </label>
																	<div class="input-group">
																		<input type="text" class="form-control" name="transaction_name" value="<?php echo $val->transaction_name;?>" required>
																		<input type="hidden" class="form-control" name="brgyid" value="<?php echo $val->brgyID;?>" required>
																		<input type="hidden" class="form-control" name="id" value="<?php echo $val->bID;?>" required>
																	</div>
																	</div> 
																	<div class="form-group col-md-12">
																		<label>Amount  : </label>
																		<div class="input-group">
																		<input type="text" class="form-control" name="amount" value="<?php echo $val->amount;?>" required>
																	</div>
																	</div>
																</div> 
														  </div>
														  <div class="modal-footer bg-whitesmoke br">
															<button type="submit" class="btn btn-success" name="edit-fund">Update</button>
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
														  </div>
														  </form>
														</div>
													  </div>
													</div>
												<!--- END EDIT FUND --->
												<!--- REMOVE FUND --->
												 <div class="modal fade" id="removefund<?php echo $val->bID;?>" tabindex="-1" role="dialog"
													  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
													  <div class="modal-dialog modal-dialog-centered" role="document">
														<div class="modal-content">
														  <div class="modal-header">
															<h5 class="modal-title" id="exampleModalCenterTitle">Remove Fund Details</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															  <span aria-hidden="true">&times;</span>
															</button>
														  </div>
														  <div class="modal-body">
															<form  method="post">
																<strong> ARE YOU SURE TO REMOVE THIS DATA ? </strong>
																<input type="hidden" class="form-control" name="brgyid" value="<?php echo $val->brgyID;?>" required>
																<input type="hidden" class="form-control" name="id" value="<?php echo $val->bID;?>" required>
														  </div>
														  <div class="modal-footer bg-whitesmoke br">
															<button type="submit" class="btn btn-warning" name="remove-fund">Yes</button>
															<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
														  </div>
														  </form>
														</div>
													  </div>
													</div>
												<!--- END EDIT FUND --->
										<?php } ?>
										</tbody>
									  </table>
									</div>
								  </div>
								</div>
							</div>
					  <div class="tab-pane fade" id="expenses" role="tabpanel" aria-labelledby="expenses-tab2">
					  		<div class="card">
								  <div class="card-header" style="background-color:#23a255 !important;">
									<h4>BARANGAY <?php echo $data;?> EXPENSES DATA </h4>
								  </div>
								  <div class="card-body">
								
									<div class="table-responsive">
									  <table class="table  table-bordered" id="expenses1-data">
										<thead>
										  <tr>
											<th class="text-center"> TRANSACTION NAME</th>
											<th class="text-center"> AMOUNT</th>
											<th class="text-center">  DATE</th>
											<th class="text-center">  TIME</th>
										  </tr>
										</thead>
										<tbody>
										<?php while($val1 = $expenses->fetch_object()){ 
											$date1 =date_create($val1->date_added);
										?>
											<tr> 
												<td class="text-left"> <?php echo $val1->title;?> </td>
												<td class="text-right"> ₱ <?php echo number_format($val1->amount,2);?> </td>
												<td class="text-center"> <?php echo date_format($date1,"Y/m/d");?> </td>
												<td class="text-center"> <?php echo date_format($date1,"H:i:s");?> </td>
											</tr>
										<?php } ?>
										</tbody>
									  </table>
									</div>
								  </div>
								</div>
                      </div>
                      <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
							<div class="card">
								  <div class="card-header" style="background-color:#23a255 !important;">
									<h4>BARANGAY <?php echo $data;?> CALENDAR DATA </h4>
								  </div>
								  <div class="card-body">
								
									<div class="table-responsive">
									 						<table class="table  table-bordered" id="calendar-data">
										<thead>
										  <tr>
											<th class="text-center"> EVENT NAME</th>
											<th class="text-center"> START DATE</th>
											<th class="text-center"> END DATE</th>
											<th class="text-center"> STATUS</th>
										  </tr>
										</thead>
										<tbody>
										<?php while($val = $events->fetch_object()){ 
											$date =date_create($val->date_added);
										?>
											<tr> 
												<td class="text-left"> <?php echo $val->title;?> </td>
												<td class="text-center"> <?php echo date ('Y-m-d', strtotime($val->datetime_start));?> </td>
												<td class="text-center"> <?php echo date ('Y-m-d', strtotime($val->datetime_end));?> </td>
												<td class="text-center"> 
													<?php 
														if($val->status == 1){ echo '<span class="badge badge-primary">On-going</span>'; } 
														else if($val->status==2){ echo '<span class="badge badge-success">Finished</span>'; } 
														else { echo '<span class="badge badge-warning">Cancelled</span>';}
													?> 
												</td>
												
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
          </div>
		</div>
		<!-- RPCOESS  MODAL -->
		<div class="modal fade" id="pfund" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">PROCESS TRUST FUND</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
				<form  method="post">
					ARE YOU SURE TO PROCESS TRUST FUND ?
					<input type="hidden" class="form-control" name="brgyid" value="<?php echo $data;?>" required>
					<input type="hidden" class="form-control" name="amount" value="<?php echo ($total_budget-$total_exp)-$total_tf;?>" required>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-primary" name="process-fund">YES</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
			  </form>
            </div>
          </div>
        </div>
		<!-- ADD FUND  MODAL -->
		<div class="modal fade" id="addfund" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add Fund Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
				<form  method="post">
					<div class="form-row">
						<div class="form-group col-md-12">
						<label>Transaction Name : </label>
						<div class="input-group">
							<input type="text" class="form-control" name="transaction_name" required>
							<input type="hidden" class="form-control" name="brgyid" value="<?php echo $data;?>" required>
						</div>
						</div> 
						<div class="form-group col-md-12">
							<label>Amount  : </label>
							<div class="input-group">
							<input type="text" class="form-control" name="amount" required>
						</div>
						</div>
					</div> 
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-primary" name="add-fund">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
			  </form>
            </div>
          </div>
        </div>
		
		<!-- SK ACCOUNT  MODAL -->
		<div class="modal fade" id="sk-account" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">SK ACCOUNT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
				<form  method="post">
					<div class="form-row">
					<?php while($info2 = $information2->fetch_object()){ ?>
						<div class="form-group col-md-12">
						<label>User Name : </label>
						<div class="input-group">
							<input type="text" class="form-control" name="username" value="<?php echo $info2->username;?>" required>
							<input type="hidden" class="form-control" name="brgyid" value="<?php echo $data;?>" required>
						</div>
						</div> 
						<div class="form-group col-md-12">
							<label>Password  : </label>
							<div class="input-group">
							<input type="password" class="form-control"  name="password" required>
						</div>
						</div>
					<?php } ?>
					</div> 
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-primary" name="update-account">Update</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
			  </form>
            </div>
          </div>
        </div>
	  
<?php require('footer.php'); ?> 
