<?php include('header.php'); ?>       
<?php include('nav.php'); ?>       
<?php include('../controller/users.php'); ?> 
	<div class="main-content">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>SYSTEM USERS LOGGED HISTORY </h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered" id="covid-data">
                        <thead>
                          <tr>
                            <th class="text-center"> USER </th>
                            <th class="text-center"> ACTION</th>
                            <th class="text-center"> DATE LOGGED </th>
                          </tr>
                        </thead>
						<tbody>
						<?php while($val = $history->fetch_object()){ ?>
							<tr> 
								<td class="text-center"> <?php echo $val->user;?> </td>
								<td class="text-center"> <?php echo $val->actions ;?> </td>
								<td class="text-center"> <?php echo $val->date_recorded ;?> </td>
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
	 
	  <!-- END -->
<?php require('footer.php'); ?> 
