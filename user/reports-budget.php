<?php include('header.php'); ?>       
<?php include('nav.php'); ?>       
<?php include('../controller/sk-dashboard.php'); ?> 

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
                    <h4>BUDGET (CHART) </h4>
                  </div>
                  <div class="card-body">
				  
				  <figure class="highcharts-figure">
					<div id="container-budget"></div>
				
				</figure>

                </div>
              </div>
            </div>
         </div> 
		 <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>BUDGET DATA </h4>
                  </div>
                  <div class="card-body">
				  
				     <div class="table-responsive">
                      <table class="table table-striped table-bordered"id="table_id">
                        <thead>
                          <tr>
                            <th class="text-center"> TRANSACTION NAME </th>
                            <th class="text-center"> AMOUNT</th>
                          </tr>
                        </thead>
						<tbody>
							<?php 
										$budget1= $mysqli->query("SELECT a.*,b.title FROM sk_budget_record  a
										LEFT JOIN sk_procurement b on a.pro_id = b.proID
										where a.brgyID='$data' and a.isExpenses = 1 or a.isExpenses = 3");
										while($val = $budget1->fetch_object()){ ?>
							<tr> 
								<td class="text-left"> <?php echo $val->title;?> </td>
								<td class="text-right"> <?php echo $val->amount ;?> </td>
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
	

<?php require('footer.php'); ?> 
