	<?php 
		include('header.php');  
		include('nav.php'); 
		include('../controller/barangay-budget.php');
		$data = base64_decode(urldecode($_GET['data']));
	?>  
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-4">
                <div class="card author-box">
                  <div class="card-body">
                    <div class="author-box-center">
                      <img alt="image" src="../assets/img/sk-logo.png" width="100px;" class="rounded-circle author-box-picture">
                      <div class="clearfix"></div>
                      <div class="author-box-name">
                        <a href="#">BARANGAY <?php echo $data;?></a>
                      </div>
                    </div>
					<div style="height:20px;"></div>
                    <div class="row text-center">
					  <div class="col-12 col-md-6 col-lg-6">
						<div class="card card-primary">
						  <div class="card-header">
							<h6> TOTAL BUDGET</h6>
						  </div>
						  <div class="card-body">
							  <?php 
								while($val1 = $budget->fetch_object()){ 
									$total_budget += $val1->amount;
								}
								?>
								<h4> <?php echo number_format($total_budget,2);?> </h4>
						  </div>
						</div>
					  </div>
					  <div class="col-12 col-md-6 col-lg-6">
						<div class="card card-secondary">
						  <div class="card-header">
							<h6> REMAINING FUNDS</h6>
						  </div>
						  <div class="card-body">
							<p>Card <code>.card-primary</code></p>
						  </div>
						</div>
					  </div>
					  <div class="col-12 col-md-6 col-lg-6">
						<div class="card card-warning">
						  <div class="card-header">
							<h6> TOTAL EXPENSES</h6>
						  </div>
						  <div class="card-body">
							<p>Card <code>.card-primary</code></p>
						  </div>
						</div>
					  </div>
					   <div class="col-12 col-md-6 col-lg-6">
						<div class="card card-success">
						  <div class="card-header">
							<h6>TOTAL ACTIVITIES</h6>
						  </div>
						  <div class="card-body">
							<p>Card <code>.card-primary</code></p>
						  </div>
						</div>
					  </div>
					  </div>
					</div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h4>SK OFFICERS</h4>
                  </div>
                  <div class="card-body">
                    <div class="py-4">
                      <p class="clearfix">
                        <span class="float-left">
                          Birthday
                        </span>
                        <span class="float-right text-muted">
                          30-05-1998
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Phone
                        </span>
                        <span class="float-right text-muted">
                          (0123)123456789
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Mail
                        </span>
                        <span class="float-right text-muted">
                          test@example.com
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Facebook
                        </span>
                        <span class="float-right text-muted">
                          <a href="#">John Deo</a>
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Twitter
                        </span>
                        <span class="float-right text-muted">
                          <a href="#">@johndeo</a>
                        </span>
                      </p>
                    </div>
                  </div>
                </div>
         
              </div>
              <div class="col-12 col-md-12 col-lg-8">
                <div class="card">
                  <div class="padding-20">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
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
								  <div class="card-header" style="background-color:#23a255 !important;">
									<h4>BARANGAY <?php echo $data;?> BUDGET DATA</h4>
									<div class="card-header-action">
									  <a href="#" data-toggle="modal" data-target="#addfund" class="btn btn-primary">
									   <i class="fas fa-address-card"></i> ADD FUND
									  </a>
									</div>
								  </div>
								  <div class="card-body">
								  <?php if(isset($_GET['updated'])){ echo '<div class="alert alert-success"> User Account Updated !</div>';}?>
								  <?php if(isset($_GET['added']))  { echo '<div class="alert alert-info"> New Fund Added !</div>';}?>
								  <?php if(isset($_GET['deleted'])){ echo '<div class="alert alert-warning"> User Account Removed !</div>';}?>
									<div class="table-responsive">
									  <table class="table  table-bordered" id="covid-data">
										<thead>
										  <tr>
											<th class="text-center"> TRANSACTION NAME</th>
											<th class="text-center"> AMOUNT</th>
											<th class="text-center"> TRANSACTION DATE</th>
										  </tr>
										</thead>
										<tbody>
										<?php while($val = $budget->fetch_object()){ ?>
											<tr> 
												<td class="text-center"> <?php echo $val->transaction_name;?> </td>
												<td class="text-center"> <?php echo $val->amount;?> </td>
												<td class="text-center"> <?php echo $val->date_added;?> </td>
												
											</tr>
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
								  <?php if(isset($_GET['updated'])){ echo '<div class="alert alert-success"> User Account Updated !</div>';}?>
								  <?php if(isset($_GET['added']))  { echo '<div class="alert alert-info"> New Fund Added !</div>';}?>
								  <?php if(isset($_GET['deleted'])){ echo '<div class="alert alert-warning"> User Account Removed !</div>';}?>
									<div class="table-responsive">
									  <table class="table  table-bordered" id="covid-data">
										<thead>
										  <tr>
											<th class="text-center"> TRANSACTION NAME</th>
											<th class="text-center"> AMOUNT</th>
											<th class="text-center"> TRANSACTION DATE</th>
										  </tr>
										</thead>
										<tbody>
										<?php while($val = $budget->fetch_object()){ ?>
											<tr> 
												<td class="text-center"> <?php echo $val->transaction_name;?> </td>
												<td class="text-center"> <?php echo $val->amount;?> </td>
												<td class="text-center"> <?php echo $val->date_added;?> </td>
												
											</tr>
										<?php } ?>
										</tbody>
									  </table>
									</div>
								  </div>
								</div>
                      </div>
                      <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
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
	  
<?php require('footer.php'); ?> 
