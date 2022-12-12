<?php include('header.php'); ?>       
<?php include('nav.php'); ?>       
<?php include('../controller/barangay.php'); ?> 
<style>
.highcharts-figure,
.highcharts-data-table table {
    min-width: 360px;
    max-width: 100%;
    margin: 1em auto;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}

.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}

.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
    padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}

.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

</style>
	<div class="main-content">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4> DASHBOARDS </h4>
                  </div>
					<div class="card-body">
					<h5> OVER ALL DATA </h5>
					<div class="row">
					
					
					  <div class="col-6">
						<div class="card">
						  <div class="card-header">
							<h4>TRANSACTION (CHART) </h4>
						  </div>
						  <div class="card-body">
						  <figure class="highcharts-figure">
							<div id="overall-1"></div>
						</figure>

						</div>
					  </div>
					</div>
					
					<div class="col-6">
						<div class="card">
						  <div class="card-header">
							<h4>BUDGET (CHART) </h4>
						  </div>
						  <div class="card-body">
						  <figure class="highcharts-figure">
							<div id="overall-2"></div>
						</figure>

						</div>
					  </div>
					</div>
					
					<div class="col-6">
						<div class="card">
						  <div class="card-header">
							<h4>EXPENSES (CHART) </h4>
						  </div>
						  <div class="card-body">
						  <figure class="highcharts-figure">
							<div id="overall-3"></div>
						</figure>

						</div>
					  </div>
					</div>
					
					<div class="col-6">
						<div class="card">
						  <div class="card-header">
							<h4>TRUST FUND (CHART) </h4>
						  </div>
						  <div class="card-body">
						  <figure class="highcharts-figure">
							<div id="overall-4"></div>
						</figure>

						</div>
					  </div>
					</div>
					
					
					</div>
				  
				  <hr>
				  
				  
					   <form class="row g-3" method="POST">
						<br>
						<div class="row justify-content-center">
						<div class="col-10">
						  <label class="form-label">Filter :</label>
						   <select class="form-control" name="brgyid" required>
								  <option value=""> - Select Barangay -</option>
									<?php while($val = $admin->fetch_object()){ ?>
									<option value="<?php echo $val->brgyID;?>"> <?php echo $val->barangay_name;?> </option>
								<?php } ?>
							  </select>
						</div>
						<div class="col-2">
						  <label class="form-label">&nbsp;&nbsp;&nbsp;&nbsp;</label><br>
						   <button type="submit" class="btn btn-primary btn-md" name="filter"> <i class="bi bi-search"></i> FILTER </button>
						</div>
						</div>
						</form>
					
					<hr>
					<div class="row justify-content-center">
					  <div class="col-3">
						<div class="card">
						  <div class="card-header">
							<h4> TRANSACTION </h4>
						  </div>
						  <div class="card-body text-center">
							<?php 
								$id      = $_POST['brgyid'];
								$gpr	 = $mysqli->query("SELECT * FROM sk_procurement where brgy_id='$id'");
								$cntgpr  = $gpr->num_rows;
							?>
							<h2>
								<?php echo $cntgpr;?>
							</h2>
						  </div>
					  </div> 
					  </div> 
					  <div class="col-3">
						<div class="card">
						  <div class="card-header">
							<h4> BUDGET </h4>
						  </div>
						  <div class="card-body text-center">
						  <?php 
								$budget	 = $mysqli->query("SELECT sum(amount)amount FROM sk_budget_record where brgyID='$id' and isExpenses=0 and is_trust_fund =0");
								$bres    = $budget->fetch_assoc();
						  
								$expenses	 = $mysqli->query("SELECT sum(amount)amount FROM sk_budget_record where brgyID='$id' and isExpenses=1");
								$eres    = $expenses->fetch_assoc();
								
								$tf	   = $mysqli->query("SELECT sum(amount)amount FROM sk_trust_fund where brgy_id='$id'");
								$tfres = $tf->fetch_assoc();
							?>
							
							<h2>
								₱ <?php echo number_format(($bres['amount']-$eres['amount'])-$tfres['amount'],2);?>
							</h2>
						  </div>
					  </div>
					 </div> 
					 <div class="col-3">
						<div class="card">
						  <div class="card-header">
							<h4> EXPENSES </h4>
						  </div>
						  <div class="card-body text-center">
							
							<h2>
								₱ <?php echo number_format($eres['amount'],2);?>
							</h2>
						  </div>
					  </div>
					 </div> 
					 <div class="col-3">
						<div class="card">
						  <div class="card-header">
							<h4> TRUST FUND </h4>
						  </div>
						  <div class="card-body text-center">
							
							<h2>
								₱ <?php echo number_format($tfres['amount'],2);?>
							</h2>
						  </div>
					  </div>
					 </div> 
					 
                  </div>
				    <div class="row">
					  <div class="col-6">
						<div class="card">
						  <div class="card-header">
							<h4>TRANSACTIONS (CHART) </h4>
						  </div>
						  <div class="card-body">
						  
						  <figure class="highcharts-figure">
							<div id="container"></div>
						
						</figure>

						</div>
					  </div>
					</div>
					<div class="col-6">
						<div class="card">
						  <div class="card-header">
							<h4>BUDGETS(CHART) </h4>
						  </div>
						  <div class="card-body">
						  
						  <figure class="highcharts-figure">
							<div id="container-1"></div>
						
						</figure>

						</div>
					  </div>
					</div>
					<div class="col-6">
						<div class="card">
						  <div class="card-header">
							<h4>EXPENSES (CHART) </h4>
						  </div>
						  <div class="card-body">
						  
						  <figure class="highcharts-figure">
							<div id="container-2"></div>
						
						</figure>

						</div>
					  </div>
					</div>
					<div class="col-6">
						<div class="card">
						  <div class="card-header">
							<h4>TRUST FUND (CHART) </h4>
						  </div>
						  <div class="card-body">
						  
						  <figure class="highcharts-figure">
							<div id="container-3"></div>
						
						</figure>

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
	
<?php  
	

require('footer.php'); ?> 
