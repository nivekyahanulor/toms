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
                    <h4>PROCUREMENT OF GOODS (CHART) </h4>
                  </div>
                  <div class="card-body">
				  
				  <figure class="highcharts-figure">
					<div id="container"></div>
				
				</figure>

                </div>
              </div>
            </div>
         </div> 
		 <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>PROCUREMENT OF GOODS DATA </h4>
                  </div>
                  <div class="card-body">
                      <table class="table table-striped table-bordered" id="table_id">
                        <thead>
                          <tr>
                            <th class="text-center"> TITLE </th>
                            <th class="text-center"> NATURE</th>
                            <th class="text-center"> DATE START </th>
                            <th class="text-center"> DATE END </th>
                            <th class="text-center"> STATUS</th>
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
	

<?php require('footer.php'); ?> 
