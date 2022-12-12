<?php include('header.php'); ?>       
<?php include('nav.php'); ?>       
<?php include('../controller/sk-dashboard.php'); ?> 
	<div class="main-content">
          <div class="section-body">
            <h2 class="section-title">GOODS</h2>
            <div class="row">
              <div class="col-12 col-md-6 col-lg-3">
                <div class="card">
                  <div class="card-header">
                    <h4>Purchase Request</h4>
                  </div>
                  <div class="card-body">
                    <h2><?php echo $cntgpr;?></h2>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-3">
                <div class="card">
                  <div class="card-header">
                    <h4>BAC Resolution</h4>
                  </div>
                  <div class="card-body">
                    <h2><?php echo $cntgbc;?></h2>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-3">
                <div class="card">
                  <div class="card-header">
                    <h4>Quotation</h4>
                  </div>
                  <div class="card-body">
                    <h2><?php echo $cntgsp;?></h2>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-3">
                <div class="card">
                  <div class="card-header">
                    <h4>Abstract of Quotation</h4>
                  </div>
                  <div class="card-body">
                    <h2><?php echo $cntgsp;?></h2>
                  </div>
                </div>
              </div>
            </div>
			
			 <div class="row">
              <div class="col-12 col-md-6 col-lg-3">
                <div class="card">
                  <div class="card-header">
                    <h4>Purchase Order</h4>
                  </div>
                  <div class="card-body">
                    <h2><?php echo $cntgpo;?></h2>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-3">
                <div class="card">
                  <div class="card-header">
                    <h4>P.A Receipt</h4>
                  </div>
                  <div class="card-body">
                    <h2><?php echo $cntgpa;?></h2>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-3">
                <div class="card">
                  <div class="card-header">
                    <h4>A.I Report</h4>
                  </div>
                  <div class="card-body">
                    <h2><?php echo $cntgai;?></h2>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-3">
                <div class="card">
                  <div class="card-header">
                    <h4>Disbursement Voucher</h4>
                  </div>
                  <div class="card-body">
                    <h2><?php echo $cntgdv;?></h2>
                  </div>
                </div>
              </div>
            </div>
			
			<hr>
			
			<h2 class="section-title">SERVICES</h2>
            <div class="row">
              <div class="col-12 col-md-6 col-lg-3">
                <div class="card">
                  <div class="card-header">
                    <h4>Purchase Request</h4>
                  </div>
                  <div class="card-body">
                    <h2><?php echo $cntspr;?></h2>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-3">
                <div class="card">
                  <div class="card-header">
                    <h4>BAC Resolution</h4>
                  </div>
                  <div class="card-body">
                    <h2><?php echo $cntsbc;?></h2>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-3">
                <div class="card">
                  <div class="card-header">
                    <h4>Quotation</h4>
                  </div>
                  <div class="card-body">
                    <h2><?php echo $cntssp;?></h2>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-3">
                <div class="card">
                  <div class="card-header">
                    <h4>Abstract of Quotation</h4>
                  </div>
                  <div class="card-body">
                    <h2><?php echo $cntssp;?></h2>
                  </div>
                </div>
              </div>
            </div>
			
			 <div class="row">
              <div class="col-12 col-md-6 col-lg-3">
                <div class="card">
                  <div class="card-header">
                    <h4>Purchase Order</h4>
                  </div>
                  <div class="card-body">
                    <h2><?php echo $cntspo;?></h2>
                  </div>
                </div>
              </div>
            
              <div class="col-12 col-md-6 col-lg-3">
                <div class="card">
                  <div class="card-header">
                    <h4>A.I Report</h4>
                  </div>
                  <div class="card-body">
                    <h2><?php echo $cntsai;?></h2>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-3">
                <div class="card">
                  <div class="card-header">
                    <h4>Disbursement Voucher</h4>
                  </div>
                  <div class="card-body">
                    <h2><?php echo $cntsdv;?></h2>
                  </div>
                </div>
              </div>
            </div>
			<hr>
			<h2 class="section-title">OTHERS</h2>
            <div class="row">
              <div class="col-12 col-md-6 col-lg-3">
                <div class="card">
                  <div class="card-header">
                    <h4>Disbursement Voucher</h4>
                  </div>
                  <div class="card-body">
                    <h2><?php echo $cntodv;?></h2>
                  </div>
                </div>
              </div>
            
            </div>
			<hr>
			<div class="row">
              <div class="col-7">
                <div class="card">
                  <div class="card-header">
                    <h4>Scheduled Project and Activities</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table  table-bordered" id="sk-data" >
                        <thead>
                          <tr>
                            <th class="text-center">PROJECT TITLE</th>
                            <th class="text-center">DATE START</th>
                            <th class="text-center">DATE END</th>
                            <th class="text-center">STATUS</th>
                            <th class="text-center">DATE ADDED</th>
                            <th class="text-center">TIME ADDED</th>
                          </tr>
                        </thead>
						<tbody>
						<?php while($val = $events->fetch_object()){ ?>
							<tr> 
								<td class="text-left"> <?php echo $val->title;?> </td>
								<td class="text-left"> <?php echo $val->datetime_start;?> </td>
								<td class="text-left"> <?php echo $val->datetime_end;?> </td>
								<td class="text-left"> <?php echo $val->status;?> </td>
								<td class="text-center"> <?php echo date ('Y-m-d', strtotime($val->date_added));?> </td>
								<td class="text-center"> <?php echo date ('H:i A', strtotime($val->date_added));?> </td>
							</tr>
						<?php } ?>
						</tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
			   <div class="col-5">
                <div class="card">
                  <div class="card-header">
                    <h4>Recent Actions</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table  table-bordered" id="sk-history" >
                        <thead>
                          <tr>
                            <th class="text-center">USER</th>
                            <th class="text-center">ACTION</th>
                            <th class="text-center">DATE</th>
                            <th class="text-center">TIME</th>
                          </tr>
                        </thead>
						<tbody>
						<?php while($val = $history->fetch_object()){ ?>
							<tr> 
								<td class="text-center"> <?php echo $val->user;?> </td>
								<td class="text-center"> <?php echo $val->actions;?> </td>
								<td class="text-center"> <?php echo date ('Y-m-d', strtotime($val->date_recorded));?> </td>
								<td class="text-center"> <?php echo date ('H:i A', strtotime($val->date_recorded));?> </td>
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
