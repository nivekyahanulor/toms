<?php include('header.php'); ?>       
<?php include('nav.php'); ?>       
<?php include('../controller/sk-budget.php'); ?> 
	<div class="main-content">
          <div class="section-body">
			<div class="row justify-content-center">
              <div class="col-12 col-md-6 col-lg-3">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4>CURRENT BUDGET </h4>
                  </div>
                  <div class="card-body text-center">
                    	<?php echo "<h3> ₱ " . number_format($currentfund,2) ."</h3>";?>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-3">
                <div class="card card-secondary">
                  <div class="card-header">
                    <h4>TOTAL EXPENSES</h4>
                  </div>
                  <div class="card-body text-center">
						<?php echo "<h3> ₱ " . number_format($totalexpenses,2) ."</h3>";?>
                  </div>
                </div>
              </div>
			  <div class="col-12 col-md-6 col-lg-3">
                <div class="card card-secondary">
                  <div class="card-header">
                    <h4>TRUST FUND</h4>
                  </div>
                  <div class="card-body text-center">
						<?php while($rem = $fund->fetch_object()){ 
							echo "<h3> ₱ " . number_format($rem->totalfund,2) ."</h3>";
						} ?>
                  </div>
                </div>
              </div>
			  </div>
              <div class="col-12">
			
                <div class="card">
                  <div class="card-header">
                    <h4> BUDGET RECORD  </h4>
					<div class="card-header-action">
                      <a href="#" data-toggle="modal" data-target="#addfund" class="btn btn-primary">
                       <i class="fas fa-plus-circle"></i> ADD NEW FUND
                      </a>  
					  <a href="#" data-toggle="modal" data-target="#addexpenses" class="btn btn-warning">
                       <i class="fas fa-plus-circle"></i> ADD EXPENSES
                      </a>
                    </div>
                  </div>
				  
				     <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                          aria-controls="home" aria-selected="true">BUDGET</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                          aria-controls="profile" aria-selected="false">EXPENSES</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                          aria-controls="contact" aria-selected="false">TRUST FUND</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
							<?php if(isset($_GET['updated'])){ echo '<div class="alert alert-success"> Data successfully change !</div>';}?>
							<?php if(isset($_GET['added'])){ echo '<div class="alert alert-info"> Data successfully Added !</div>';}?>
							<?php if(isset($_GET['removed'])){ echo '<div class="alert alert-warning"> Data successfully Removed !</div>';}?>
					
									<div class="table-responsive">
									<table class="table  table-bordered" id="table_id" style="width:100%">
										<thead>
										  <tr>
											<th class="text-center"> TRANSACTION NAME</th>
											<th class="text-center"> AMOUNT</th>
											<th class="text-center"> STATUS</th>
											<th class="text-center"> TRANSACTION DATE</th>
											<th class="text-center"> TRANSACTION TIME</th>
											<th class="text-center"> ACTION</th>
										  </tr>
										</thead>
										<tbody>
										<?php 
											$budget= $mysqli->query("SELECT * FROM sk_budget_record where brgyID='$data' and isExpenses = 0 and is_trust_fund=0");
											while($val = $budget->fetch_object()){ ?>
											<tr> 
												<td class="text-left"> <?php echo $val->transaction_name;?> </td>
												<td class="text-right"> ₱ <?php echo number_format($val->amount,2);?> </td>
												<td class="text-left"> <?php  if($val->isExpenses ==1){ echo "EXPENSES"; }  else { echo "FUND";}?> </td>
											    <td class="text-center"><?php echo date ('Y-m-d', strtotime($val->date_added));?></td>
											    <td class="text-center"><?php echo date ('H:i:s', strtotime($val->date_added));?></td>
												<td class="text-center">
													<?php if($val->is_admin!=1 && $val->isExpenses !=1){ ?>
														<button class="btn btn-success btn-md" data-toggle="modal" data-target="#editfund<?php echo $val->bID;?>" > <i class="fas fa-pencil-alt"> </i></button>
														<button class="btn btn-warning btn-md" data-toggle="modal" data-target="#removefund<?php echo $val->bID;?>"> <i class="fas fa-trash-alt"> </i></button>
													<?php } ?>
												</td>	
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
																		<input type="hidden" class="form-control" name="brgyid" value="<?php echo $_SESSION['brgyID'];?>" required>
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
																<input type="hidden" class="form-control" name="brgyid" value="<?php echo $_SESSION['brgyID'];?>" required>
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
											</tr>
										<?php } ?>
										</tbody>
									  </table>
									</div>
							</div>
								<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                       				<div class="table-responsive">
									<table class="table  table-bordered" id="table_id-1" style="width:100%">
										<thead>
										  <tr>
											<th class="text-center"> TRANSACTION NAME</th>
											<th class="text-center"> AMOUNT</th>
											<th class="text-center"> TRANSACTION DATE</th>
											<th class="text-center"> TRANSACTION TIME</th>
										  </tr>
										</thead>
										<tbody>
										<?php 
										$budget1= $mysqli->query("SELECT a.*,b.title FROM sk_budget_record  a
										LEFT JOIN sk_procurement b on a.pro_id = b.proID
										where a.brgyID='$data' and a.isExpenses = 1 or a.isExpenses = 3");
										while($val = $budget1->fetch_object()){ ?>
											<tr> 
												<td class="text-center"> <?php  if($val->title==''){ echo $val->transaction_name;} else { echo $val->title;}?> </td>
												<td class="text-center"> ₱ <?php echo number_format($val->amount,2);?> </td>
												<td class="text-center"><?php echo date ('Y-m-d', strtotime($val->date_added));?></td>
											    <td class="text-center"><?php echo date ('H:i:s', strtotime($val->date_added));?></td>
											</tr>
										<?php } ?>
										</tbody>
									  </table>
									</div>
                      </div>
                      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                      <div class="table-responsive">
									<table class="table  table-bordered" id="table_id-2" style="width:100%">
										<thead>
										  <tr>
											<th class="text-center"> TRANSACTION NAME</th>
											<th class="text-center"> AMOUNT</th>
											<th class="text-center"> TRANSACTION DATE</th>
											<th class="text-center"> TRANSACTION TIME</th>
										  </tr>
										</thead>
										<tbody>
										<?php 
										$budget1= $mysqli->query("SELECT * FROM sk_budget_record where brgyID='$data' and isExpenses = 2");
										while($val = $budget1->fetch_object()){ ?>
											<tr> 
												<td class="text-center"> <?php echo $val->transaction_name;?> </td>
												<td class="text-center"> ₱ <?php echo number_format($val->amount,2);?> </td>
												<td class="text-center"><?php echo date ('Y-m-d', strtotime($val->date_added));?></td>
											    <td class="text-center"><?php echo date ('H:i:s', strtotime($val->date_added));?></td>
											</tr>
										<?php } ?>
										</tbody>
									  </table>
									</div>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
				  
			
                  </div>
                </div>
              </div>
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
							<input type="hidden" class="form-control" name="brgyid" value="<?php echo $_SESSION['brgyID'];?>" required>
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
		<!-- ADD EXPENSES  MODAL -->
	   <div class="modal fade" id="addexpenses" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add Expenses Details</h5>
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
							<input type="hidden" class="form-control" name="brgyid" value="<?php echo $_SESSION['brgyID'];?>" required>
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
                <button type="submit" class="btn btn-primary" name="add-expenses">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
			  </form>
            </div>
          </div>
        </div>
	  
	  <!-- END -->
<?php require('footer.php'); ?> 
