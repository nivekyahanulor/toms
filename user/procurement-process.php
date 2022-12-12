<?php include('header.php'); ?>       
<?php include('nav.php'); ?>     
<?php include('../controller/sk-procurement.php'); ?> 
<style>


.stepwizard-step p {
    margin-top: 10px;
}

.stepwizard-row {
    display: table-row;
}

.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}

.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}

.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;

}

.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
</style>
	<div class="main-content">
        <div class="section-body">
            <div class="row justify-content-center">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4><?php echo $_GET['type'];?> </h4>
                  </div>
                  <div class="card-body">
							<?php 
								$data   = $_GET['data'];
								if($_GET['type'] == "PROCUREMENT OF GOODS"){
									$type =1;
								}
								else if($_GET['type'] == "PROCUREMENT OF SERVICES"){
									$type =2;
								}else if($_GET['type'] == "PROCUREMENT OTHERS"){
									$type =3;
								}
								$procurement_goods	= $mysqli->query("SELECT * FROM procurement_goods where pro_id='$data' and pro_type='$type'");
								$row    = $procurement_goods->fetch_assoc();
								$count  = $procurement_goods->num_rows;
								
								$procurement_bac	= $mysqli->query("SELECT * FROM procurement_bac_resolution where pro_id='$data' and pro_type='$type'");
								$row1    = $procurement_bac->fetch_assoc();
								$count1  = $procurement_bac->num_rows;
								
								$procurement_qou	= $mysqli->query("SELECT * FROM supplier where pro_id='$data' and pro_type='$type' and is_process=1");
								$row2    = $procurement_qou->fetch_assoc();
								$count2  = $procurement_qou->num_rows;
								
								$procurement_qou_cnt	= $mysqli->query("SELECT count(*)cnt FROM supplier where pro_id='$data' and pro_type='$type'");
								$row2cnt    = $procurement_qou_cnt->fetch_assoc();
								
								$procurement_po	= $mysqli->query("SELECT * FROM purchase_order where pro_id='$data' and pro_type='$type'");
								$row3    = $procurement_po->fetch_assoc();
								$count3  = $procurement_po->num_rows;
								
								$procurement_pa	= $mysqli->query("SELECT * FROM pa_report where pro_id='$data' and pro_type='$type'");
								$row4    = $procurement_pa->fetch_assoc();
								$count4  = $procurement_pa->num_rows;
								
								$procurement_ai	= $mysqli->query("SELECT * FROM ai_report where pro_id='$data' and pro_type='$type'");
								$row5    = $procurement_ai->fetch_assoc();
								$count5  = $procurement_ai->num_rows;
								
								$procurement_dv	= $mysqli->query("SELECT * FROM dv_report where pro_id='$data' and pro_type='$type' and is_process=1");
								$row6    = $procurement_dv->fetch_assoc();
								$count6  = $procurement_dv->num_rows;
								
								$procurement_dv_cnt	= $mysqli->query("SELECT count(*)cnt FROM dv_report_item where pro_id='$data' and pro_type='$type'");
								$row6cnt    = $procurement_dv_cnt->fetch_assoc();
								
								
							?>
						 <div class="stepwizard">
							<div class="stepwizard-row setup-panel">
							<?php if($_GET['type']=='PROCUREMENT OTHERS'){?>
							<div class="stepwizard-step">
									<a href="#step-7" type="button" class="btn btn-primary" disabled="disabled">1</a>
									<p>DV</p>
								</div>
							<?php } else {?>
							
								<div class="stepwizard-step">
									<a href="#step-1" type="button" class="btn btn-primary ">1</a>
									<p>Purchase Request</p>
								</div>
								
								<div class="stepwizard-step">
									<?php if($count == 0){?>
										<a href="#" type="button" class="btn btn-secondary" disabled="disabled">2</a>
									<?php } else { ?>
										<a href="#step-2" type="button" class="btn btn-primary">2</a>
									<?php } ?>
									<p>BAC Resolution</p>
								</div>
								
								<div class="stepwizard-step">
									<?php if($count1 == 0){?>
										<a href="#" type="button" class="btn btn-secondary" disabled="disabled">3</a>
									<?php } else { ?>
										<a href="#step-3" type="button" class="btn btn-primary">3</a>
									<?php } ?>
									<p>Quotation</p>
								</div>
								
								<div class="stepwizard-step">
									<?php if($count2 == 0){?>
									<a href="#" type="button" class="btn btn-secondary" disabled="disabled">4</a>
									<?php } else { ?>
										<a href="#step-4" type="button" class="btn btn-primary">4</a>
									<?php } ?>
									<p>PO</p>
								</div>
								
								<?php  if($_GET['type'] == "PROCUREMENT OF GOODS"){?>
								<div class="stepwizard-step">
									<?php if($count3 == 0){?>
										<a href="#" type="button" class="btn btn-secondary" disabled="disabled">5</a>
									<?php } else { ?>
										<a href="#step-5" type="button" class="btn btn-primary" disabled="disabled">5</a>
									<?php } ?>
									<p>PA Receipt </p>
								</div>
								
								<div class="stepwizard-step">
									<?php if($count4 == 0){?>
										<a href="#" type="button" class="btn btn-secondary" disabled="disabled">6</a>
									<?php } else { ?>
										<a href="#step-6" type="button" class="btn btn-primary" disabled="disabled">6</a>
									<?php } ?>
									<p>AI Report</p>
								</div>
								
								<div class="stepwizard-step">
									<?php if($count5 == 0){?>
									<a href="#" type="button" class="btn btn-secondary" disabled="disabled">7</a>
									<?php }  else { ?>
									<a href="#step-7" type="button" class="btn btn-primary" disabled="disabled">7</a>
									<?php } ?>
									<p>DV</p>
								</div>
								
								<?php }  else {?>
								
								
								<div class="stepwizard-step">
									<?php if($count3 == 0){?>
										<a href="#" type="button" class="btn btn-secondary" disabled="disabled">5</a>
									<?php } else { ?>
										<a href="#step-6" type="button" class="btn btn-primary" disabled="disabled">5</a>
									<?php } ?>
									<p>AI Report</p>
								</div>
								
								<div class="stepwizard-step">
									<?php if($count5 == 0){?>
									<a href="#" type="button" class="btn btn-secondary" disabled="disabled">6</a>
									<?php }  else { ?>
									<a href="#step-7" type="button" class="btn btn-primary" disabled="disabled">6</a>
									<?php } ?>
									<p>DV</p>
								</div>
								
								
								<?php } }?>
							</div>
						</div>
						<!-- STEP 1 -->
						<div class="row setup-content" id="step-1">
								<div class="col-12">
									<div class="row">
										<div class="col-md-3">
											<div class="form-group ">
												<label class="control-label">PR No.</label>
												<input type="text" required="required" value="<?php if(isset($_GET['pr'])){  echo $_GET['pr']; } else { echo $row['prno']; }?>" class="form-control" id="pr" placeholder="Enter PR Number"  />
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Date</label>
												<input type="date" required="required" value="<?php if(isset($_GET['date'])){  echo $_GET['date']; } else { echo $row['date_goods']; }?>" id="pdate" class="form-control" />
											</div>
										</div>
									</div>
									<hr> <center> <h4> REQUISITION </h4></center>
									
									<div  align="right">
									  <a href="#" data-toggle="modal" data-target="#add-requisition" class="btn btn-primary">
									   <i class="fas fa-plus-circle"></i> ADD REQUISITION
									  </a>
									</div> <br>
									<div class="table-responsive">
									<table class="table table-striped table-bordered" >
										<thead>
										  <tr>
											<th class="text-center"> ITEM NUMBER </th>
											<th class="text-center"> QUANTITY</th>
											<th class="text-center"> UNIT OF MEASUREMENT </th>
											<th class="text-center"> DESCRIPTION </th>
											<th class="text-center"> ESTIMATED UNIT COST</th>
											<th class="text-center"> ESTIMATED COST</th>
											<th class="text-center"> ACTION</th>
										  </tr>
										</thead>
										<tbody>
											<?php 
												$data   = $_GET['data'];
												$goods	= $mysqli->query("SELECT * FROM requisition where pro_id='$data' and pro_type='$type'");
												while($val = $goods->fetch_object()){ 
												$total +=  $val->estimated_cost;
											?>
											<tr> 
												<td class="text-center"> <?php echo $val->item_number;?> </td>
												<td class="text-center"> <?php echo $val->qty ;?> </td>
												<td class="text-center"> <?php echo $val->unit ;?> </td>
												<td class="text-center"> <?php echo $val->description ;?> </td>
												<td class="text-center"> <?php echo number_format($val->unit_cost,2) ;?> </td>
												<td class="text-center"> <?php echo number_format($val->estimated_cost,2) ;?> </td>
												<td class="text-center"> 
												<?php if($count ==0){ ?>
													<button type="button" class="btn btn-warning" data-toggle="modal" id="productupdates" data-target="#removerequistion<?php echo $val->requisitionID;?>" ><i class="fas fa-trash"></i></button>
												<?php } ?>
												</td>
											</tr>
											<div class="modal fade" id="removerequistion<?php echo $val->requisitionID;?>" tabindex="-1" role="dialog"
											  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
											  <div class="modal-dialog modal-dialog-centered" role="document">
												<div class="modal-content">
												  <div class="modal-header">
													<h5 class="modal-title" id="exampleModalCenterTitle">Remove Data</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													  <span aria-hidden="true">&times;</span>
													</button>
												  </div>
												  <div class="modal-body">
													<form  method="post">
													    <input type="hidden" class="form-control" name="requisitionID" value="<?php echo $val->requisitionID;?>" required>
														ARE YOU SURE TO REMOVE THIS DATA? 							  
												  </div>
												  <div class="modal-footer bg-whitesmoke br">
													<button type="submit" class="btn btn-warning" name="remove-requistion">Remove</button>
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												  </div>
												  </form>
												</div>
											  </div>
											</div>
										<?php } ?>
										</tbody>
									  </table>
									  </div>
									  <hr>
									  <div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">TOTAL ESTIMATED COST</label>
												<input type="text" required="required" class="form-control" id="total_estimated" value="<?php echo $total;?>" readonly />
												<input type="hidden" required="required" class="form-control" id="pro_id" value="<?php echo $_GET['data'];?>"  />
												<input type="hidden" required="required" class="form-control" id="p_type" value="<?php echo $_GET['type'];?>"  />
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Requesting SK Official</label>
												<input type="text" required="required" id="purpose"  value="<?php if(isset($_GET['purpose'])){  echo $_GET['purpose']; } else { echo $row['purpose']; }?>" class="form-control" />
											</div>
										</div>
									</div>
									<?php if($count ==0){ ?>
									<button class="btn btn-primary  btn-lg pull-right" id="pr-save" type="button" >PROCESS</button> 
									<button  class="btn btn-primary  btn-lg pull-right" id="goods-process" style="display:none;"><strong><center><i class="fa fa-spinner fa-spin"></i> Processing...!</center></strong>
									<button class="btn btn-primary nextBtn btn-lg pull-right" id="pr-submit" type="button" style="display:none;">NEXT</button>
									<?php } else { ?>
									<button class="btn btn-primary nextBtn btn-lg pull-right" id="pr-submit" type="button">NEXT</button>
									<?php } ?>
								</div>
						</div>
						<!--- STEP 2 -->
						<div class="row setup-content" id="step-2">
									<div class="col-12 ">
									<div class="row justify-content-center">
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Resolution No.</label>
												<input type="text" required="required" value="<?php echo $row1['resolution_no']; ?>" class="form-control" id="reso"   />
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Item Desription</label>
												<input type="text" required="required" value="<?php echo $row1['description']; ?>" id="item_desc" class="form-control" />
											</div>
										</div>
									</div>
									<div class="row justify-content-center">
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">PR No.</label>
												<input type="text" required="required" value="<?php  echo $row1['prno']; ?>" id="prno1" class="form-control" />
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Amount</label>
												<input type="text" required="required" value="<?php echo $row1['amount']; ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"  id="amount1" class="form-control" />
												
												<input type="hidden" required="required" class="form-control" id="pro_id" value="<?php echo $_GET['data'];?>"  />
												<input type="hidden" required="required" class="form-control" id="p_type" value="<?php echo $_GET['type'];?>"  />
											</div>
										</div>
									</div>
									<?php if($row['is_approved'] ==1){?>
										<?php if($count1 ==0){ ?>
										<button class="btn btn-primary  btn-lg pull-right" id="bac-save" type="button" >PROCESS</button> 
										<button  class="btn btn-primary  btn-lg pull-right" id="goods-bac" style="display:none;"><strong><i class="fa fa-spinner fa-spin"></i> Processing</strong>
										<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" id="bac-submit" style="display:none;">Next</button>
										<?php } else { ?>
										<button class="btn btn-primary nextBtn btn-lg pull-right" id="bac-submit" type="button">NEXT</button>
										<?php } ?>
									<?php }  if($row['is_approved'] ==2){?>
										<div class="pull-right"><b> <font color="red"> Purchase Request Process Declined </font></b></div>
									<?php } ?>
									</div>
							</div>
							<div class="row setup-content" id="step-3">
								<div class="col-12 ">
								<?php if($row2cnt['cnt'] ==3){ ?>
									<a href="#" class="btn btn-secondary btn-md pull-right"> <i class="fas fa-user-plus"></i> ADD SUPPLIER </a>
								<?php } else { ?>
									<a href="" class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#add-supplier" disabled> <i class="fas fa-user-plus"></i> ADD SUPPLIER </a>
								<?php } ?>
								</div>
								<hr>
								<br>
								<br>
										<div class="col-md-5">
											<div class="form-group">
												<label class="control-label">Purpose : </label>
												<input type="text" required="required" class="form-control" id="purpose-for" value="<?php if(isset($_GET['purpose'])){ echo $_GET['purpose'];}?>"  />
											</div>
										</div>
										
								<br>
								<br>
								<br>
								<br>
								<div class="col-12 ">
									<?php 
									$data      = $_GET['data'];
									$supplier  = $mysqli->query("SELECT * FROM supplier where pro_id='$data' and pro_type='$type'");
									while($sup = $supplier->fetch_object()){ 
										  $supid = $sup->supplierID;
									?>
									<h4> SUPPLIER : <?php echo $sup->supplier_name;?> 
									<?php if($count2 ==0){ ?>
									<a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#add-qoutation<?php echo $supid;?>" > <i class="fas fa-clipboard"></i> ADD QUOTATION </a>
									<a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#remove-supplier<?php echo $supid;?>" > <i class="fas fa-times-circle"></i>  REMOVE </a>
									<input type="hidden" class="form-control" id="supplierID" value="<?php echo $supid;?>" required>
									<?php } ?>
									</h4>
									
									<hr> <center> <h5> QUOTATION </h5></center>
									<div class="table-responsive">
									<table class="table table-striped table-bordered" >
										<thead>
										  <tr>
											<th class="text-center"> ITEM NUMBER </th>
											<th class="text-center"> DESCRIPTION</th>
											<th class="text-center"> QUANTITY </th>
											<th class="text-center"> UNIT PRICE </th>
											<th class="text-center"> AMOUNT</th>
											<th class="text-center"> ACTION</th>
										  </tr>
										</thead>
										<tbody>
											<?php 
												$data   = $_GET['data'];
												$supcount = 1;
												$goods1	= $mysqli->query("SELECT * FROM supplier_qoutation where supplier_id='$supid'");
												while($gv = $goods1->fetch_object()){ 
												$scnt = $supcount++;
											?>
											<tr> 
												<td class="text-center"> <?php echo $gv->item_no;?> </td>
												<td class="text-center"> <?php echo $gv->description ;?> </td>
												<td class="text-center"> <?php echo $gv->qty ;?> </td>
												<td class="text-center"> <?php echo number_format($gv->unit_price,2) ;?> </td>
												<td class="text-center"> <?php echo number_format($gv->amount,2) ;?> </td>
												<td class="text-center"> 
												<?php if($count2 ==0){ ?>
													<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#removeqoutation<?php echo $gv->sqID;?>" > <i class="fas fa-trash"></i></button>
												<?php } ?>
												</td>
											</tr>
											<div class="modal fade" id="removeqoutation<?php echo $gv->sqID;?>" tabindex="-1" role="dialog"
											  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
											  <div class="modal-dialog modal-dialog-centered" role="document">
												<div class="modal-content">
												  <div class="modal-header">
													<h5 class="modal-title" id="exampleModalCenterTitle">Remove Data</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													  <span aria-hidden="true">&times;</span>
													</button>
												  </div>
												  <div class="modal-body">
													<form  method="post">
													    <input type="hidden" class="form-control" name="sqID" value="<?php echo $gv->sqID;?>" required>
														ARE YOU SURE TO REMOVE THIS DATA? 							  
												  </div>
												  <div class="modal-footer bg-whitesmoke br">
													<button type="submit" class="btn btn-warning" name="remove-qoutation">Remove</button>
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												  </div>
												  </form>
												</div>
											  </div>
											</div>
										<?php } ?>
										</tbody>
									  </table>
									  </div>
									  	  	
											   <div class="modal fade" id="add-qoutation<?php echo $supid;?>" tabindex="-1" role="dialog"
												  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
												  <div class="modal-dialog modal-dialog-centered" role="document">
													<div class="modal-content">
													  <div class="modal-header">
														<h5 class="modal-title" id="exampleModalCenterTitle">QUOTATION  DETAILS</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														  <span aria-hidden="true">&times;</span>
														</button>
													  </div>
													  <div class="modal-body">
														<form  method="get">
															<div class="form-row">
																<div class="form-group col-md-12">
																<label>Item Number: </label>
																<div class="input-group">
																	<input type="text" class="form-control" name="itemnum">
																	<input type="hidden" class="form-control" name="supid" value="<?php echo $supid;?>" required>
																	<input type="hidden" class="form-control" name="pro_id" value="<?php echo $_GET['data'];?>" required>
																	<input type="hidden" class="form-control" name="protype" value="<?php echo $_GET['type'];?>" required>
																	<input type="hidden" class="form-control" name="purpose" value="<?php echo $_GET['purpose'];?>" required>
																	<input type="hidden" class="form-control" name="type" value="<?php echo $_GET['type'];?>" required>
																	<input type="hidden" class="form-control" name="data" value="<?php echo $_GET['data'];?>" required>
																	<input type="hidden" class="form-control" name="pro_type" value="<?php echo $type;?>" required>
																</div>
																</div> 
																<div class="form-group col-md-12">
																	<label>Desription : </label>
																	<div class="input-group">
																	<input type="text" class="form-control" name="desc" >
																</div>
																</div>
																<div class="form-group col-md-12">
																	<label>Quantity  : </label>
																	<div class="input-group">
																	<input type="text" class="form-control qty-q" name="qty" id="qty<?php echo $supid;?>" data-id="<?php echo $supid;?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"  >
																</div>
																</div>
																
																<div class="form-group col-md-12">
																	<label> Unit Price : </label>
																	<div class="input-group">
																	<input type="text" class="form-control unitprice-q" id="unitprice<?php echo $supid;?>" data-id="<?php echo $supid;?>" name="unitprice" class="unitprice" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" >
																</div>
																</div>
																<div class="form-group col-md-12">
																	<label>Amount  : </label>
																	<div class="input-group">
																	<input type="text" class="form-control amount-q" id="amount<?php echo $supid;?>" name="amount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" readonly>
																</div>
																</div>
																
															</div> 
													  </div>
													  <div class="modal-footer bg-whitesmoke br">
														<button type="submit" class="btn btn-primary" name="add-qoutation">Add</button>
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													  </div>
													  </form>
													</div>
												  </div>
												</div>
												
												<!-- REMOVE SUPPLIER  MODAL -->
											    <div class="modal fade" id="remove-supplier<?php echo $supid;?>" tabindex="-1" role="dialog"
												  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
												  <div class="modal-dialog modal-dialog-centered" role="document">
													<div class="modal-content">
													  <div class="modal-header">
														<h5 class="modal-title" id="exampleModalCenterTitle">REMOVE  SUPPLIER</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														  <span aria-hidden="true">&times;</span>
														</button>
													  </div>
													  <div class="modal-body">
														<form  method="post">
															<div class="form-row">
																<strong> ARE YOUR SURE TO REMOVE THIS SUPPLIER ? </strong>
																	<input type="hidden" class="form-control" name="supid" value="<?php echo $supid;?>" required>
																	<input type="hidden" class="form-control" name="pro_id" value="<?php echo $_GET['data'];?>" required>
																	<input type="hidden" class="form-control" name="protype" value="<?php echo $_GET['type'];?>" required>
																	<input type="hidden" class="form-control" name="pro_type" value="<?php echo $type;?>" required>
																
															</div> 
													  </div>
													  <div class="modal-footer bg-whitesmoke br">
														<button type="submit" class="btn btn-warning" name="remove-supplier">YES</button>
														<button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
													  </div>
													  </form>
													</div>
												  </div>
												</div>
									<hr>
									<?php } ?>
										
										<?php if($row1['is_approved'] ==1){?>
										<?php 
											if($count2 ==0){ 
											if($row2cnt['cnt'] !=0 && $scnt!=0){
										?>
										<button class="btn btn-primary  btn-lg pull-right" id="qoutation-save" type="button" >PROCESS</button> 
										<button  class="btn btn-primary  btn-lg pull-right" id="goods-qoutation" style="display:none;"><strong><i class="fa fa-spinner fa-spin"></i> Processing</strong>
										<button type="button" class="btn btn-primary nextBtn btn-lg pull-right" type="button" id="qoutation-submit" style="display:none;">Next</button>
										<?php }} else { ?>
										<button  type="button" class="btn btn-primary nextBtn btn-lg pull-right" id="qoutation-submit" type="button">NEXT</button>
										<?php } ?>
										<?php }  if($row1['is_approved'] ==2){?>
										<div class="pull-right"><b> <font color="red"> BAC Resolution Process Declined </font></b></div>
										<?php } ?>
									
										
									</div>
							</div>
							<!-- STEP - 4 -->
							<div class="row setup-content" id="step-4">
									<div class="col-12 ">
									<div class="row ">
										<div class="col-md-3">
										<?php
										$win	 = $mysqli->query("SELECT a.* , SUM(b.amount)amount FROM 
													supplier a LEFT JOIN supplier_qoutation b on b.supplier_id=a.supplierID 
													where a.pro_id='$data'
													group by a.supplierID ORDER BY amount ASC LIMIT 1
													");

										$winsupp = $win->fetch_assoc();
						
										?>
											<div class="form-group">
												<label class="control-label">Supplier</label>
												<input type="text" required="required" value="<?php if(isset($_GET['po_supplier1'])){  echo $_GET['po_supplier1']; } else { echo $winsupp['supplier_name']; }?>" class="form-control" id="po_supplier"   />
												<input type="hidden" required="required" class="form-control" id="pro_id" value="<?php echo $_GET['data'];?>"  />
												<input type="hidden" required="required" class="form-control" id="p_type" value="<?php echo $_GET['type'];?>"  />
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Address</label>
												<input type="text" required="required" value="<?php if(isset($_GET['po_address1'])){  echo $_GET['po_address1']; } else { echo  $winsupp['address']; }?>" id="po_address" class="form-control" />
											</div>
										</div>
									</div>
									<div class="row ">
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Tel No.</label>
												<input type="text" required="required"  value="<?php if(isset($_GET['po_tel1'])){  echo $_GET['po_tel1']; } else { echo $row3['telno']; }?>" id="po_tel" class="form-control" />
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">TIN</label>
												<input type="text" required="required" value="<?php if(isset($_GET['po_tin1'])){  echo $_GET['po_tin1']; } else { echo $row3['tin']; }?>"id="po_tin" class="form-control" />
												
											</div>
										</div>
									</div>
									<div class="row ">
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">PO No.</label>
												<input type="text" required="required" value="<?php if(isset($_GET['po_pono1'])){  echo $_GET['po_pono1']; } else { echo $row3['pono']; }?>" id="po_pono" class="form-control" />
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Date</label>
												<input type="date" required="required" value="<?php if(isset($_GET['po_date1'])){  echo $_GET['po_date1']; } else { echo $row3['datepo']; }?>"  id="po_date" class="form-control" />
											</div>
										</div>
									</div>
									<div class="row ">
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Mode of Procurement</label>
												<input type="text" required="required" value="<?php if(isset($_GET['po_promode1'])){  echo $_GET['po_promode1']; } else { echo $row3['pro_mode']; }?>" id="po_promode" class="form-control" />
											</div>
										</div>
										
									</div>
									<hr>
									<div class="row ">
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Place of Delivery</label>
												<input type="text" required="required" value="<?php if(isset($_GET['po_delplace1'])){  echo $_GET['po_delplace1']; } else { echo $row3['del_place']; }?>" class="form-control" id="po_delplace"   />
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Date of Delivery</label>
												<input type="date" required="required" value="<?php if(isset($_GET['po_deldate1'])){  echo $_GET['po_deldate1']; } else { echo $row3['del_date']; }?>" id="po_deldate" class="form-control" />
											</div>
										</div>
									</div>
									<div class="row ">
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Term of Delivery</label>
												<input type="text" required="required" value="<?php if(isset($_GET['po_delterm1'])){  echo $_GET['po_delterm1']; } else { echo $row3['del_terms']; }?>" class="form-control" id="po_delterm"   />
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Term of Payment</label>
												<input type="text" required="required" value="<?php if(isset($_GET['po_termpay1'])){  echo $_GET['po_termpay1']; } else { echo $row3['payment_terms']; }?>" id="po_termpay" class="form-control" />
											</div>
										</div>
									</div>
									<hr><center><h5> PURCHASE ORDER </h5></center>
									<?php if($count3 ==0){ ?>
									<div  align="right">
									  <a href="#" data-toggle="modal" data-target="#add-po" class="btn btn-primary">
									   <i class="fas fa-plus-circle"></i> ADD PURCHASE ORDER
									  </a>
									</div> <br>
									<?php } ?>
									<div class="table-responsive">
									<table class="table table-striped table-bordered" >
										<thead>
										  <tr>
											<th class="text-center"> PARTICULARS </th>
											<th class="text-center"> UNIT </th>
											<th class="text-center"> QUANTITY  </th>
											<th class="text-center"> UNIT COST</th>
											<th class="text-center"> AMOUNT</th>
											<th class="text-center"> ACTION</th>
										  </tr>
										</thead>
										<tbody>
											<?php 
												$po	= $mysqli->query("SELECT * FROM purchase_order_item  where pro_id='$data' and pro_type='$type'");
												while($valpo = $po->fetch_object()){ 
											?>
											<tr> 
												<td class="text-center"> <?php echo $valpo->item_number;?> </td>
												<td class="text-center"> <?php echo $valpo->unit ;?> </td>
												<td class="text-center"> <?php echo $valpo->qty ;?> </td>
												<td class="text-center"> <?php echo number_format($valpo->cost,2) ;?> </td>
												<td class="text-center"> <?php echo number_format($valpo->amount,2) ;?> </td>
												<td class="text-center"> 
												<?php if($count3 ==0){ ?>
													<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#removepo<?php echo $valpo->poitemID;?>"><i class="fas fa-trash"></i></button>
												<?php } ?>
												</td>
											</tr>
											<div class="modal fade" id="removepo<?php echo $valpo->poitemID;?>" tabindex="-1" role="dialog"
											  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
											  <div class="modal-dialog modal-dialog-centered" role="document">
												<div class="modal-content">
												  <div class="modal-header">
													<h5 class="modal-title" id="exampleModalCenterTitle">Remove Data</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													  <span aria-hidden="true">&times;</span>
													</button>
												  </div>
												  <div class="modal-body">
													<form  method="post">
													    <input type="hidden" class="form-control" name="poitemID" value="<?php echo $valpo->poitemID;?>" required>
														ARE YOU SURE TO REMOVE THIS DATA? 							  
												  </div>
												  <div class="modal-footer bg-whitesmoke br">
													<button type="submit" class="btn btn-warning" name="remove-po-item">Remove</button>
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												  </div>
												  </form>
												</div>
											  </div>
											</div>
										<?php } ?>
										</tbody>
									  </table>
									  </div>
										<?php if($row2['is_approved'] ==1){?>

										<?php if($count3 ==0){ ?>
										<button class="btn btn-primary  btn-lg pull-right" id="po-save" type="button" >PROCESS</button> 
										<button  class="btn btn-primary  btn-lg pull-right" id="goods-po" style="display:none;"><strong><i class="fa fa-spinner fa-spin"></i> Processing</strong>
										<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" id="po-submit" style="display:none;">Next</button>
										<?php } else { ?>
										<button class="btn btn-primary nextBtn btn-lg pull-right" id="po-submit" type="button">NEXT</button>
										<?php } }  if($row2['is_approved'] ==2){?>
										<div class="pull-right"><b> <font color="red">Quotation Process Declined </font></b></div>
										<?php } ?>
									
										
									</div>
							</div>
							
							<!-- STEP - 5 -->
							<div class="row setup-content" id="step-5">
								<div class="col-12">
									<div class="row">
										<div class="col-md-3">
											<div class="form-group ">
												<label class="control-label">PAR No.</label>
												<input type="text" required="required" value="<?php if(isset($_GET['pr'])){  echo $_GET['pr']; } else { echo $row4['prno']; }?>" class="form-control" id="prno12" placeholder="Enter PR Number"  />
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Date</label>
												<input type="date" required="required" value="<?php if(isset($_GET['date'])){  echo $_GET['date']; } else { echo $row4['date_pa']; }?>" id="date12" class="form-control" />
											</div>
										</div>
									</div>
									<hr> <center> <h4> PROPERTY ACKNOWLEDGMENT  </h4></center>
									<?php if($count4 ==0){ ?>
									<div  align="right">
									  <a href="#" data-toggle="modal" data-target="#add-pa" class="btn btn-primary">
									   <i class="fas fa-plus-circle"></i> ADD PROPERTY ACKNOWLEDGMENT 
									  </a>
									</div> <br>
									<?php } ?>
									<div class="table-responsive">
									<table class="table table-striped table-bordered" >
										<thead>
										  <tr>
											<th class="text-center"> QUANTITY</th>
											<th class="text-center"> UNIT OF MEASUREMENT </th>
											<th class="text-center"> DESCRIPTION </th>
											<th class="text-center"> PROPERTY NO.</th>
											<th class="text-center"> DATE ACQUIRED</th>
											<th class="text-center"> AMOUNT</th>
											<th class="text-center"> ACTION</th>
										  </tr>
										</thead>
										<tbody>
											<?php 
												$data   = $_GET['data'];
												$pas	= $mysqli->query("SELECT * FROM pa_report_item where pro_id='$data' and pro_type='$type'");
												while($pasval = $pas->fetch_object()){ 
											?>
											<tr> 
												<td class="text-center"> <?php echo $pasval->qty ;?> </td>
												<td class="text-center"> <?php echo $pasval->unit ;?> </td>
												<td class="text-center"> <?php echo $pasval->description ;?> </td>
												<td class="text-center"> <?php echo $pasval->property_no ;?> </td>
												<td class="text-center"> <?php echo $pasval->date_aquired ;?> </td>
												<td class="text-center"> <?php echo $pasval->amount ;?> </td>
												<td class="text-center"> 
												<?php if($count4 ==0){ ?>
												<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#removepo<?php echo $pasval->paitemID;?>"><i class="fas fa-trash"></i></button>
												<?php } ?>
												</td>
											</tr>
											<div class="modal fade" id="removepo<?php echo $pasval->paitemID;?>" tabindex="-1" role="dialog"
											  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
											  <div class="modal-dialog modal-dialog-centered" role="document">
												<div class="modal-content">
												  <div class="modal-header">
													<h5 class="modal-title" id="exampleModalCenterTitle">Remove Data</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													  <span aria-hidden="true">&times;</span>
													</button>
												  </div>
												  <div class="modal-body">
													<form  method="post">
													    <input type="hidden" class="form-control" name="paitemID" value="<?php echo $pasval->paitemID;?>" required>
														ARE YOU SURE TO REMOVE THIS DATA? 							  
												  </div>
												  <div class="modal-footer bg-whitesmoke br">
													<button type="submit" class="btn btn-warning" name="remove-pa-item">Remove</button>
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												  </div>
												  </form>
												</div>
											  </div>
											</div>
										<?php } ?>
										</tbody>
									  </table>
									  </div>
									  <hr>
									<?php if($row3['is_approved'] ==1){?>
									<?php if($count4 ==0){ ?>
									<button class="btn btn-primary  btn-lg pull-right" id="pa-save" type="button" >PROCESS</button> 
									<button  class="btn btn-primary  btn-lg pull-right" id="pa-process" style="display:none;"><strong><center><i class="fa fa-spinner fa-spin"></i> Processing...!</center></strong>
									<button class="btn btn-primary nextBtn btn-lg pull-right" id="pa-submit" type="button" style="display:none;">NEXT</button>
									<?php } else { ?>
									<button class="btn btn-primary nextBtn btn-lg pull-right" id="pa-submit" type="button">NEXT</button>
									<?php }  }  if($row3['is_approved'] ==2){?>
									<div class="pull-right"><b> <font color="red"> Purchase Order Process Declined </font></b></div>
									<?php } ?>
								</div>
							</div>
							<!-- STEP - 6 -->
							<div class="row setup-content" id="step-6">
									<div class="col-12">
									<div class="row">
										<div class="col-md-3">
											<div class="form-group ">
												<label class="control-label">IAR No.</label>
												<input type="text" required="required" value="<?php if(isset($_GET['iarno'])){  echo $_GET['iarno']; } else { echo $row5['iarno']; }?>" class="form-control" id="iarno"   />
												<input type="hidden" required="required" class="form-control" id="pro_id" value="<?php echo $_GET['data'];?>"  />
												<input type="hidden" required="required" class="form-control" id="p_type" value="<?php echo $_GET['type'];?>"  />
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Date</label>
												<input type="date" required="required" value="<?php if(isset($_GET['dateiar'])){  echo $_GET['dateiar']; } else { echo $row5['dateiar']; }?>" id="dateiar" class="form-control" />
											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-md-3">
											<div class="form-group ">
												<label class="control-label">Supplier</label>
												<input type="text" required="required" value="<?php if(isset($_GET['supplierai'])){  echo $_GET['supplierai']; } else { echo $row5['supplier']; }?>" class="form-control" id="supplierai"  />
											</div>
										</div>
										
									</div>
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">PO No.</label>
												<input type="text" required="required" value="<?php if(isset($_GET['ponoai'])){  echo $_GET['ponoai']; } else { echo $row5['pono']; }?>" id="ponoai" class="form-control" />
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group ">
												<label class="control-label">Date</label>
												<input type="date" required="required" value="<?php if(isset($_GET['datepo'])){  echo $_GET['datepo']; } else { echo $row5['datepo']; }?>" class="form-control" id="datepo"/>
											</div>
										</div>
									
									</div>
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">RIS No.</label>
												<input type="text" required="required" value="<?php if(isset($_GET['airis'])){  echo $_GET['airis']; } else { echo $row5['ris']; }?>" id="ris" class="form-control" />
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group ">
												<label class="control-label">Date</label>
												<input type="date" required="required" value="<?php if(isset($_GET['aidateris'])){  echo $_GET['aidateris']; } else { echo $row5['dateris']; }?>" class="form-control" id="dateris"/>
											</div>
										</div>
									</div>
									
									<hr>
									<div class="row">
										<div class="col-md-3">
											<div class="form-group ">
												<label class="control-label">Invoice No.</label>
												<input type="text" required="required" value="<?php if(isset($_GET['invoice'])){  echo $_GET['invoice']; } else { echo $row5['invoice']; }?>" class="form-control" id="invoice"/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Date</label>
												<input type="date" required="required" value="<?php if(isset($_GET['dateinvoice'])){  echo $_GET['dateinvoice']; } else { echo $row5['dateinvoice']; }?>" id="dateinvoice" class="form-control" />
											</div>
										</div>
									</div>
									<hr> <center> <h4> ACCEPTANCE AND INSPECTION  </h4></center>
									<?php if($count5 ==0){ ?>
									<div  align="right">
									  <a href="#" data-toggle="modal" data-target="#add-ai" class="btn btn-primary">
									   <i class="fas fa-plus-circle"></i> ADD  ACCEPTANCE AND INSPECTION 
									  </a>
									</div> <br>
									<?php } ?>
									<div class="table-responsive">
									<table class="table table-striped table-bordered" >
										<thead>
										  <tr>
											<th class="text-center"> UNIT</th>
											<th class="text-center"> DESCRIPTION </th>
											<th class="text-center"> QUANTITY</th>
											<th class="text-center"> ACTION</th>
										  </tr>
										</thead>
										<tbody>
											<?php 
												$data   = $_GET['data'];
												$aitem	= $mysqli->query("SELECT * FROM ai_report_item where pro_id='$data' and pro_type='$type'");
												while($aival = $aitem->fetch_object()){ 
											?>
											<tr> 
												<td class="text-center"> <?php echo $aival->unit ;?> </td>
												<td class="text-center"> <?php echo $aival->description ;?> </td>
												<td class="text-center"> <?php echo $aival->qty ;?> </td>
												<td class="text-center">
											    <?php if($count5 ==0){ ?>
												<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#removeai<?php echo $aival->aireportID;?>"><i class="fas fa-trash"></i></button>
												<?php } ?>
												</td>
											</tr>
											<div class="modal fade" id="removeai<?php echo $aival->aireportID;?>" tabindex="-1" role="dialog"
											  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
											  <div class="modal-dialog modal-dialog-centered" role="document">
												<div class="modal-content">
												  <div class="modal-header">
													<h5 class="modal-title" id="exampleModalCenterTitle">Remove Data</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													  <span aria-hidden="true">&times;</span>
													</button>
												  </div>
												  <div class="modal-body">
													<form  method="post">
													    <input type="hidden" class="form-control" name="aireportID" value="<?php echo $aival->aireportID;?>" required>
														ARE YOU SURE TO REMOVE THIS DATA? 							  
												  </div>
												  <div class="modal-footer bg-whitesmoke br">
													<button type="submit" class="btn btn-warning" name="remove-ai-item">Remove</button>
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												  </div>
												  </form>
												</div>
											  </div>
											</div>
										<?php } ?>
										</tbody>
									  </table>
									  </div>
									  <hr>
									<?php if($_GET['type'] == "PROCUREMENT OF SERVICES"){ ?>
									<?php if($row3['is_approved'] ==1){?>
									<?php if($count5 ==0){ ?>
									<button class="btn btn-primary  btn-lg pull-right" id="ai-save" type="button" >PROCESS</button> 
									<button  class="btn btn-primary  btn-lg pull-right" id="ai-process" style="display:none;"><strong><center><i class="fa fa-spinner fa-spin"></i> Processing...!</center></strong>
									<button class="btn btn-primary nextBtn btn-lg pull-right" id="ai-submit" type="button" style="display:none;">NEXT</button>
									<?php } else { ?>
									<button class="btn btn-primary nextBtn btn-lg pull-right" id="ai-submit" type="button">NEXT</button>
									<?php } }  if($row3['is_approved'] ==2){?>
										<div class="pull-right"><b> <font color="red">  Purchase Order Process Declined  </font></b></div>
									<?php } ?>
									<?php } else { ?>
									<?php if($row4['is_approved'] ==1){?>
									<?php if($count5 ==0){ ?>
									<button class="btn btn-primary  btn-lg pull-right" id="ai-save" type="button" >PROCESS</button> 
									<button  class="btn btn-primary  btn-lg pull-right" id="ai-process" style="display:none;"><strong><center><i class="fa fa-spinner fa-spin"></i> Processing...!</center></strong>
									<button class="btn btn-primary nextBtn btn-lg pull-right" id="ai-submit" type="button" style="display:none;">NEXT</button>
									<?php } else { ?>
									<button class="btn btn-primary nextBtn btn-lg pull-right" id="ai-submit" type="button">NEXT</button>
									<?php } }  if($row4['is_approved'] ==2){?>
										<div class="pull-right"><b> <font color="red"> PA Receipt Process Declined </font></b></div>
									<?php } ?>
									<?php } ?>
								</div>
							</div>
							
							<!-- STEP - 7 -->
							<div class="row setup-content" id="step-7">
									<div class="col-12">
									<div class="row">
										<div class="col-md-3">
											<div class="form-group ">
												<label class="control-label">DV No.</label>
												<input type="text" required="required" value="<?php if(isset($_GET['dv_no1'])){  echo $_GET['dv_no1']; } else { echo $row6['dvno']; }?>" class="form-control" id="dv_no"   />
												<input type="hidden" required="required" class="form-control" id="pro_id" value="<?php echo $_GET['data'];?>"  />
												<input type="hidden" required="required" class="form-control" id="p_type" value="<?php echo $_GET['type'];?>"  />
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Date</label>
												<input type="date" required="required" value="<?php if(isset($_GET['dv_dateno1'])){  echo $_GET['dv_dateno1']; } else { echo $row6['datedv']; }?>" id="datedv" class="form-control" />
											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-md-3">
											<div class="form-group ">
												<label class="control-label">Payee</label>
												<input type="text" required="required" value="<?php if(isset($_GET['dv_payee1'])){  echo $_GET['dv_payee1']; } else { echo $row6['payee']; }?>" class="form-control" id="payee"  />
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group ">
												<label class="control-label">TIN</label>
												<input type="text" required="required" value="<?php if(isset($_GET['dv_tin1'])){  echo $_GET['dv_tin1']; } else { echo $row6['tin']; }?>" class="form-control" id="dv_tin"  />
											</div>
										</div>
										
									</div>
									<div class="row">
									
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Address</label>
												<input type="text" required="required" value="<?php if(isset($_GET['dv_address1'])){  echo $_GET['dv_address1']; } else { echo $row6['address']; }?>" id="dv_address" class="form-control" />
											</div>
										</div>
									</div>
								
									<hr> <center> <h4> DISBURSEMENT VOUCHER </h4></center>
									<?php if($count6 ==0){ ?>
									<div  align="right">
									  <a href="#" data-toggle="modal" data-target="#add-dv" class="btn btn-primary">
									   <i class="fas fa-plus-circle"></i> ADD DISBURSEMENT VOUCHER
									  </a>
									</div> <br>
									<?php } ?>
									<div class="table-responsive">
									<table class="table table-striped table-bordered" >
										<thead>
										  <tr>
											<th class="text-center"> PARTICULARS</th>
											<th class="text-center"> AMOUNT </th>
											<th class="text-center"> ACTION</th>
										  </tr>
										</thead>
										<tbody>
											<?php 
												$data   = $_GET['data'];
												$dvcnt  = 1;
												$dvtem	= $mysqli->query("SELECT * FROM dv_report_item where pro_id='$data' and pro_type='$type'");
												while($dvval = $dvtem->fetch_object()){ 
												$countdv = $dvcnt++;
												$dvtotal +=$dvval->amount;
											?>
											<tr> 
												<td class="text-center"> <?php echo $dvval->particular;?> </td>
												<td class="text-center"> <?php echo $dvval->amount ;?> </td>
												<td class="text-center"> 
												<?php if($count6 ==0){ ?>
													<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#remove-ai<?php echo $dvval->dvitemID;?>"><i class="fas fa-trash"></i></button>
												<?php } ?>
												</td>
											</tr>
											<div class="modal fade" id="remove-ai<?php echo $dvval->dvitemID;?>" tabindex="-1" role="dialog"
											  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
											  <div class="modal-dialog modal-dialog-centered" role="document">
												<div class="modal-content">
												  <div class="modal-header">
													<h5 class="modal-title" id="exampleModalCenterTitle">Remove Data</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													  <span aria-hidden="true">&times;</span>
													</button>
												  </div>
												  <div class="modal-body">
													<form  method="post">
													    <input type="hidden" class="form-control" name="dvitemID" value="<?php echo $dvval->dvitemID;?>" required>
														ARE YOU SURE TO REMOVE THIS DATA? 							  
												  </div>
												  <div class="modal-footer bg-whitesmoke br">
													<button type="submit" class="btn btn-warning" name="remove-dv-item">Remove</button>
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												  </div>
												  </form>
												</div>
											  </div>
											</div>
										<?php } ?>
										</tbody>
									  </table>
									  </div>
									  <hr>
									<?php if($_GET['type'] == "PROCUREMENT OTHERS"){ ?>
									<?php if($count6 ==0 && $row6cnt['cnt']!=0){ ?>
										<button class="btn btn-primary  btn-lg pull-right" data-toggle="modal" data-target="#dv-password" id="v-password" type="button" >PROCESS</button> 
										<button  class="btn btn-primary  btn-lg pull-right" id="dv-process" style="display:none;"><strong><center><i class="fa fa-spinner fa-spin"></i> Processing...!</center></strong>
									<?php } } else {?>
									<?php if($row5['is_approved'] ==1){?>
									<?php if($count6 ==0 && $row6cnt['cnt']!=0){ ?>
										<button class="btn btn-primary  btn-lg pull-right" data-toggle="modal" data-target="#dv-password" id="v-password" type="button" >PROCESS</button> 
										<button  class="btn btn-primary  btn-lg pull-right" id="dv-process" style="display:none;"><strong><center><i class="fa fa-spinner fa-spin"></i> Processing...!</center></strong>
									<?php } }  if($row5['is_approved'] ==2){?>
									<div class="pull-right"><b> <font color="red"> AI Report Process Declined </font></b></div>
									<?php } }?>
								</div>
							</div>
                  </div>
                </div>
              </div>
            </div>
		</div>
	</div>  
	<!-- Modal -->
	<div class="modal fade" id="dv-password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Verify Password </h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<div class="col-md-12">
				<div class="form-group ">
					<label class="control-label">Password :</label>
					<input type="password" required="required" id="password" class="form-control" id="dv_datepo"/>
				</div>
			</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-primary" id="dv-save" style="display:none;">Process</button>
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		  </div>
		</div>
	  </div>
	</div>
<?php include('modal.php'); ?> 
<?php require('footer.php'); ?> 
