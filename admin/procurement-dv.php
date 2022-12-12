<?php include('header.php'); ?>       
<?php include('nav.php'); ?>       
<?php include('../controller/sk-procurement-reports.php'); ?> 

	<div class="main-content">
	<div class="row justify-content-center">
	 <div class="col-7">
		    <div class="card">
                  <div class="card-body">
				  <button class="btn btn-info btn-md" type="button" onclick="printDiv('printableArea')"/><i class="fas fa-print"></i> Print </button>
					<?php
					$proid = base64_decode(urldecode($_GET['data'])); 
					$brgy1  = $_GET['brgy']; 
					
					
					/** GET PR INFO **/
					$pr	   = $mysqli->query("SELECT * FROM dv_report where brgy_id='$brgy1' and pro_id='$proid'");
					$prres = $pr->fetch_assoc();
					$goodid = $prres['aiID'];		
							
					/** GET BARANGAY INFO **/
							
					$brgy	 = $mysqli->query("SELECT * FROM skaccount where brgyID ='$brgy1'");
					$brgyres = $brgy->fetch_assoc();

					?>
					 <?php if($prres['is_approved'] == 1){ echo " <center> <b> DISBURSEMENT VOUCHER APPROVED  </b></center>  " ; } 
					else if($prres['is_approved'] == 2){ echo " <center> <b>DISBURSEMENT VOUCHER DECLINED </b></center> " ; } 
					else{ ?>
						<button class="btn btn-success btn-md" type="button" data-toggle="modal" data-target="#approved"><i class="fas fa-check"></i> Approved </button>
						<button class="btn btn-warning btn-md" type="button" data-toggle="modal" data-target="#declined"> <i class="fas fa-times"></i> Decline </button>
					<?php } ?>
					<br><br>
				  <div id="printableArea">
					<style>
					.table-1 
					{
						width: 100%;
						table-layout: fixed;
					}

					.table-1  td {
					  border: 1pt solid black;
					  padding-left: 10px;
					}
					
					.table-2 tbody tr:last-child { height:300px; }

					.table-3 
					{
						width: 100%;
						table-layout: fixed;
					}
					input[type=checkbox]
					{
					  /* Double-sized Checkboxes */
					  -ms-transform: scale(2); /* IE */
					  -moz-transform: scale(2); /* FF */
					  -webkit-transform: scale(2); /* Safari and Chrome */
					  -o-transform: scale(2); /* Opera */
					  transform: scale(2);
					  padding: 10px;
					}
					</style>
					  <center><h4>DISBURSEMENT VOUCHER</h4> </center>
						
					  <table class="table-1" style="border:1px solid black;" >
						<tr> 
							<td colspan="6"> <strong> Barangay : </strong>  <?php echo $brgyres['barangay_name'];?></td>
							<td colspan="6"><strong> DV No.:</strong>  <?php echo $prres['dvno'];?></td>
						</tr>
						<tr> 
							<td colspan="6"><strong> City/Municipality :</strong>  <?php echo $brgyres['city'];?></td>
							<td colspan="6"><strong> Date : </strong> <?php echo $prres['datedv'];?> </td>
						</tr>
						</tbody>
                      </table> 
					  <table class="table-1" style="border:0px solid black;" >
						<tr> 
							<td colspan="6"> <strong> Province : </strong>  <?php echo $brgyres['province'];?></td>
						</tr>
					
						</tbody>
                      </table>

					  <table class="table-1" style="border:0px solid black;" >
						<tr> 
							<td colspan="6"> <strong> Payee : </strong>  <?php echo $prres['payee'];?></td>
						</tr>
					
						</tbody>
                      </table>

					  <table class="table-1" style="border:0px solid black;" >
						<tr> 
							<td colspan="6"> <strong> Address : </strong>  <?php echo $prres['address'];?></td>
						</tr>
					
						</tbody>
                      </table>

					  <table class="table-1" style="border:0px solid black;" >
						<tr> 
							<td colspan="6"> <strong> TIN : </strong>  <?php echo $prres['tin'];?></td>
						</tr>
					
						</tbody>
                      </table>

					 
                      <table class="table-2" style="border:1px solid black;width: 100%;">
                        <thead>
                          <tr>
                            <th class="text-center">Particulars</th>
                            <th class="text-center">Amount</th>
                          </tr>
                        </thead>
						<tbody>
						<?php 
							/** GET REQUISITION DATA **/
							$req	   = $mysqli->query("SELECT * FROM dv_report_item where pro_id='$proid'");
							while($val = $req->fetch_object()){
							?>
							<tr> 
								<td class="text-center"> <?php echo $val->particular;?> </td>
								<td class="text-center"> 
									<?php echo number_format($val->amount,2);?> 
									<?php
									if($prres['vat'] ==1){
										$a = ($val->amount/ 1.12) * 0.05;
										$b = ($val->amount/ 1.12) * 0.01;
									} else {
										$a = ($val->amount/ 1.12) * 0.05;
										$b = ($val->amount/ 1.12) * 0.2;
									}
									?>
									<?php
									if($prres['vat'] ==1){ ?>
										<br>
										5% - <?php echo number_format(($val->amount/ 1.12) * 0.05,2);?> 
										<br>
										1% - <?php echo number_format(($val->amount/ 1.12) * 0.01,2);?> 
										<br>
										<span style="border-bottom: 1px solid black; padding-left: 120px">&nbsp;</span>
										<br>
										<?php echo number_format($prres['dv_netpay'],2);?>
									<?php } else { ?>
										<br>
										5% - <?php echo number_format(($val->amount/ 1.12) * 0.05,2);?> 
										<br>
										2% - <?php echo number_format(($val->amount/ 1.12) * 0.02,2);?> 
										<br>
										<span style="border-bottom: 1px solid black; padding-left: 120px">&nbsp;</span>
										<br>
										<?php echo number_format($prres['dv_netpay'],2);?>
									<?php } ?>
								</td>
							</tr>
						<?php } ?>
						<tr><td   colspan="6" class="text-center"></td></tr>
						</tbody>
                      </table>
					
					
					    <table class="table-1" style="border:1px solid black;" >
						<tr style=" height: 310px;"> 
							<?php
							$date  = date_create(date('Y-m-d'));
							$today = date_format($date,"M d , Y ");
							?>
							<td colspan="6" class="text-center"> 
									A. Certified as to availability of the budget or funds received for specific purposes
									<br><br>
									<span style="border-bottom: 1px solid black; padding-left: 50px"><?php echo $brgyres['budget_officer'];?></span><span style="border-bottom: 1px solid black; padding-left: 50px"></span>
									<br> (Signature over Printed Name) <br>Budget Monitoring Officer
								<br>
								<br>
								<span style="border-bottom: 1px solid black; padding-left: 220px">&nbsp;</span>
								<br>
								Date
								<br>
								<br>
							</td>
							<td colspan="6" class="text-center"> 
								B. Certified as to availability of cash and completeness and propriety of supporting documents
								<br><br>
									<span style="border-bottom: 1px solid black; padding-left: 50px"><?php echo $brgyres['sk_treasurer'];?></span><span style="border-bottom: 1px solid black; padding-left: 50px"></span>
								<br> (Signature over Printed Name) <br> SK Treasurer
								<br>
								<br>
								<span style="border-bottom: 1px solid black; padding-left: 220px">&nbsp;</span>
								<br>
								Date
								<br>
								<br>
							</td>
							<td colspan="6" class="text-center"> 
								C. Certified as to necessity validity, propriety, and legality of claim; and Approved for payment.
								<br><br>
									<span style="border-bottom: 1px solid black; padding-left: 50px"><?php echo $brgyres['sk_chairman'];?></span><span style="border-bottom: 1px solid black; padding-left: 50px"></span>
								<br> (Signature over Printed Name) <br> SK Chairperson
								<br>
								<br>
								<span style="border-bottom: 1px solid black; padding-left: 220px">&nbsp;</span>
								<br>
								Date
								<br>
								<br>
							</td>
						</tr>
						</tbody>
                      </table>
					    <table class="table-1" style="border:1px solid black;" >
						<tr> 
							<td colspan="6"> <strong> D. Received Payment: </strong> </td>
							<td colspan="0"> <strong>Check No. </strong> </td>
							<td colspan="0"> <strong></strong> </td>
						</tr>
                      </table> 
					  
					  <table class="table-1" >
					  
					  <tr >
						<td rowspan="5" colspan="6" class="text-center"><br><br>
									<span style="border-bottom: 1px solid black; padding-left: 250px"></span>
								<br>(Signature over Printed Name of PayeeAuthorized Representative)

								<br>
								<br>
								<span style="border-bottom: 1px solid black; padding-left: 220px">&nbsp;</span>
								<br>
								Date
								<br>
								<br></td>
					  <td>Date: </td>
					  <td></td>
					  </tr> 
					   <tr>
						 <td>Bank Name:</td>
						  <td></td>
					  </tr>
						<tr>
						 <td>Bank Branch:</td>
					  	 <td></td>
					  </tr>
						<tr>
						 <td>OR No:</td>
					  	 <td></td>
					  </tr>
					  <tr>
						 <td>Date:</td>
					  	 <td></td>
					  </tr>
 
					</table>

                  </div>
                </div>
                </div>
           </div>
           </div>
   </div>  
	
	<div class="modal fade" id="approved" tabindex="-1" role="dialog"  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalCenterTitle">DISBURSEMENT VOUCHER</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
								<form  method="post">
									<div class="form-row">
										ARE YOU SURE TO APPROVE THIS PROCESS ?
										<input type="hidden" class="form-control" name="goodid" value="<?php echo $goodid;?>" required>
										<input type="hidden" class="form-control" name="data" value="<?php echo $_GET['data'];?>" required>
										<input type="hidden" class="form-control" name="brgy" value="<?php echo  $_GET['brgy'];?>" required>
									</div> 
								</div>
								<div class="modal-footer bg-whitesmoke br">
									<button type="submit" class="btn btn-success" name="process-approved-dv">Approved</button>
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
								</form>
								</div>
								 </div>
						</div>
						<div class="modal fade" id="declined" tabindex="-1" role="dialog"  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalCenterTitle">DISBURSEMENT VOUCHER</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
								<form  method="post">
									<div class="form-row">
										ARE YOU SURE TO DECLINE THIS PROCESS ?
										<input type="hidden" class="form-control" name="goodid" value="<?php echo $goodid;?>" required>
										<input type="hidden" class="form-control" name="data" value="<?php echo $_GET['data'];?>" required>
										<input type="hidden" class="form-control" name="brgy" value="<?php echo  $_GET['brgy'];?>" required>
									</div> 
								</div>
								<div class="modal-footer bg-whitesmoke br">
									<button type="submit" class="btn btn-warning" name="process-decline-dv">Declined</button>
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
								</form>
								</div>
								 </div>
							</div>
<?php require('footer.php'); ?> 
