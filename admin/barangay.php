<?php include('header.php'); ?>       
<?php include('nav.php'); ?>       
<?php include('../controller/barangay.php'); ?> 
	<div class="main-content">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header" style="background-color:#23a255 !important;">
                    <h4>(14) BARANGAY DATA </h4>
                  </div>
                  <div class="card-body">
				  <?php if(isset($_GET['updated'])){ echo '<div class="alert alert-success"> User Account Updated !</div>';}?>
				  <?php if(isset($_GET['added']))  { echo '<div class="alert alert-info"> New User Account Added !</div>';}?>
				  <?php if(isset($_GET['deleted'])){ echo '<div class="alert alert-warning"> User Account Removed !</div>';}?>
                    <div class="table-responsive">
                      <table class="table  table-bordered" >
                        <thead>
                          <tr>
                            <th class="text-center"> BARANGAY NAME</th>
                            <th class="text-center"></th>
                          </tr>
                        </thead>
						<tbody>
						<?php while($val = $admin->fetch_object()){ ?>
							<tr> 
								<td class="text-left"> <?php echo $val->barangay_name;?> </td>
								<td class="text-center"> 
									<a href="view-barangay-details.php?data=<?php echo urlencode(base64_encode($val->brgyID));?>"><button class="btn btn-primary btn-sm" > VISIT  </button></a>
						    	</td>
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
