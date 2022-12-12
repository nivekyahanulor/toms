<?php include('header.php'); ?>       
<?php include('nav.php'); ?>       
<?php include('../controller/sk-procurement-reports.php'); ?> 

	<div class="main-content">
	<div class="row justify-content-center">
	 <div class="col-7">
	  <?php
			$proid = base64_decode(urldecode($_GET['data'])); 
			$brgy1  = $_GET['brgy']; 
						/** GET SUPPLIER DATA **/
		?>
	 <button class="btn btn-info btn-md" type="button" onclick="printDiv('printableArea')"/><i class="fas fa-print"></i> Print </button>
	   <?php			$supplier1  = $mysqli->query("SELECT * FROM supplier where pro_id='$proid' and brgy_id='$brgy1' ");
						$prres = $supplier1->fetch_assoc();
		?>
			<?php if($prres['is_approved'] == 1){ echo " <center> <b> BIDS AND AWARDS COMMITTEE APPROVED  </b></center>  " ; } 
					else if($prres['is_approved'] == 2){ echo " <center> <b>BIDS AND AWARDS COMMITTEE DECLINED </b></center> " ; } 
					else{ ?>
						<button class="btn btn-success btn-md" type="button" data-toggle="modal" data-target="#approved"><i class="fas fa-check"></i> Approved </button>
						<button class="btn btn-warning btn-md" type="button" data-toggle="modal" data-target="#declined"> <i class="fas fa-times"></i> Decline </button>
			<?php } ?>
	 <br>
	 <br>
	 <br>
		
		
		
		<?php
						$supplier  = $mysqli->query("SELECT * FROM supplier where pro_id='$proid' and brgy_id='$brgy1' ");
						while($supval = $supplier->fetch_object()){
						 $supplier_id = $supval->supplierID;
								
		 
		 ?>
		<div id="printableArea">
		<div style="break-after:page"></div>

		    <div class="card">
                  <div class="card-body">
			
				  	<?php 
					
				
							
					/** GET BAC INFO **/
					$pr	   = $mysqli->query("SELECT * FROM supplier where brgy_id='$brgy1' and pro_id='$proid'");
					$prres = $pr->fetch_assoc();
							
							
					/** GET BARANGAY INFO **/
							
					$brgy	 = $mysqli->query("SELECT * FROM skaccount where brgyID ='$brgy1'");
					$brgyres = $brgy->fetch_assoc();

					?>
					
				
					<style>
					@media print {
						.printableArea { page-break-before: always; } /* page-break-after works, as well */
					}
					.table-1 
					{
						width: 100%;
						table-layout: fixed;
					}

					.table-2  td {
					  border: 1pt solid black;
					 
					}
					</style>
					   <table class="table-1" >
						<tr> 
							<td class="text-center"> <strong>  Republic of the Philippines <br> Province of Cavite <br>MUNICIPALITY OF CARMONA<br> <?php echo $brgyres['barangay_name'];?> </td>
						</tr>
						
						</tbody>
                      </table>
					  <br> <br> <br>
					  <center><h4> BIDS AND AWARDS COMMITTEE</h4> </center>
					  <center><h5> REQUEST FOR QUOTATION OF PRICES<h5> </center>
					   <br> <br>
					  <table class="table-1"  cellspacing="1" cellpadding="10">
						<tr> 
							<td colspan="1"> </td>
							<td colspan="9"> <strong> Supplier : </strong>  <?php echo $supval->supplier_name;?></td>
							<td colspan="6"><strong>Date : </strong> <?php echo $supval->date_process;?></td>
						</tr>
						<tr> 
							<td colspan="1"> </td>
							<td colspan="6"><strong> Address :</strong>  <?php echo $supval->address;?></td>
						</tr>
						</tbody>
                      </table>
					 <br>
						  <p align="justify" style="padding-left:80px; font-size:18px;">
							  Please quote your lowest price on the item/s listed below, subject to the conditions mentioned, 
							  <br> 
							  stating the shortest time of delivery and submit your quotation duly signed by you or your representative 
							  <br>
							  not later than _________________________________ in the return envelope attached herewith.
						  </p>
						<br>
					    <table class="table"  >
						<tr> 
							<td colspan="12"> 
							&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
							&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
							&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
							&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
							&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
							&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
							&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
							&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
							&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
							</td>
							<td colspan="0" class="text-right">  
								  <center>
								
								  <?php echo strtoupper($brgyres['secretary']);?>
								  <br>
								     _________________________________
								   <br>
							      BAC Secretariat 
								  </center>
						</td>
						</tr>
					  
                      </table>
					  <table width="80%;">
						<tr>
							<td>Note:</td>
						
							<td>1. All entries must be typewritten.</td>
						</tr>
						<tr>
							<td></td><td>	2. Delivery period within _________ calendar days.</td>
						</tr>
						<tr>
							<td></td><td>	3. Warranty shall be for a period of six (6) months for supplies & materials, one (1) year <br>
										       for equipment, from date of acceptance by the procuring entity.</td>
						</tr>
						<tr>
						<td></td><td>	4. Price validity shall be for a period __________ calendar days.</td>
						</tr>
					  </table>
					  <br>
					    <table class="table" style="border:1px solid black;width: 100%;">
                        <thead>
                          <tr>
                            <th class="text-center">Item No.</th>
                            <th class="text-center">Item Description</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center"> Unit Price</th>
                            <th class="text-center">Amount</th>
                          </tr>
                        </thead>
						<tbody>
							<?php 
							/** GET REQUISITION DATA **/
							$req	   = $mysqli->query("SELECT  *  FROM supplier_qoutation where supplier_id='$supplier_id' ");
							while($val = $req->fetch_object()){
							?>
							<tr> 
								<td class="text-center"> <?php echo $val->item_no;?> </td>
								<td class="text-center"> <?php echo $val->description;?> </td>
								<td class="text-center"> <?php echo $val->qty;?> </td>
								<td class="text-center"> ₱ <?php echo number_format($val->unit_price,2);?> </td>
								<td class="text-center"> ₱ <?php echo number_format($val->amount,2);?> </td>
							</tr>
						<?php } ?>
						<tr style=" height: 100px;"> 
							<?php 
							/** GET REQUISITION DATA **/
							$sss   = $mysqli->query("SELECT  sum(amount)total  FROM supplier_qoutation where supplier_id='$supplier_id' group by supplier_id ");
							$sss1  = $sss->fetch_assoc();
							?>
							<td colspan="4" class="text-center"> </td>
							<td colspan="" class="text-center"> <strong> ₱ <?php echo number_format($sss1['total'],2) ;?></td>
						</tr>
						</tbody>
                      </table>
					    <br><br>
					    <p align="justify"> After having carefully read and accepted your conditions.  I/We quote you on the item at Prices noted above. </p>
						<br><br>
					  <table class="table"  >
						<tr> 
							<td colspan="12"> 
							&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
							&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
							&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
							&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
							&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
							&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
							&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
							&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
							&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
							</td>
							<td colspan="0" class="text-right">  
								  <center>
								    _________________________________
									<br>
								    Printed Name/Signature
									<br>
									<br>
									 _________________________________
									 <br>
									Telephone/Cellphone
									<br>
									<br>
									_________________________________
									<br>
						      		Date

								  </center>
						</td>
						</tr>
						
                      </table>
					
                  </div>
				
                </div> 
				
				  <?php } ?>
                </div>
           </div>
           </div>
	</div>  
	<div class="modal fade" id="approved" tabindex="-1" role="dialog"  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalCenterTitle">BIDS AND AWARDS COMMITTEE</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
								<form  method="post">
									<div class="form-row">
										ARE YOU SURE TO APPROVE THIS PROCESS ?
										<input type="hidden" class="form-control" name="goodid" value="<?php echo $proid;?>" required>
										<input type="hidden" class="form-control" name="data" value="<?php echo $_GET['data'];?>" required>
										<input type="hidden" class="form-control" name="brgy" value="<?php echo  $_GET['brgy'];?>" required>
									</div> 
								</div>
								<div class="modal-footer bg-whitesmoke br">
									<button type="submit" class="btn btn-success" name="process-approved-q">Approved</button>
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
									<h5 class="modal-title" id="exampleModalCenterTitle">BIDS AND AWARDS COMMITTEE</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
								<form  method="post">
									<div class="form-row">
										ARE YOU SURE TO DECLINE THIS PROCESS ?
										<input type="hidden" class="form-control" name="goodid" value="<?php echo $proid;?>" required>
										<input type="hidden" class="form-control" name="data" value="<?php echo $_GET['data'];?>" required>
										<input type="hidden" class="form-control" name="brgy" value="<?php echo  $_GET['brgy'];?>" required>
									</div> 
								</div>
								<div class="modal-footer bg-whitesmoke br">
									<button type="submit" class="btn btn-warning" name="process-decline-q">Declined</button>
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
								</form>
								</div>
								 </div>
							</div>
<?php require('footer.php'); ?> 
