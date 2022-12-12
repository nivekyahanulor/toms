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
					$brgy  = $_GET['brgy']; 
					/** GET BAC INFO **/
					$pr	   = $mysqli->query("SELECT * FROM procurement_bac_resolution where brgy_id='$brgy' and pro_id='$proid'");
					$prres = $pr->fetch_assoc();
					$goodid = $prres['resoID'];		
							
					/** GET BARANGAY INFO **/
							
					$brgy	 = $mysqli->query("SELECT * FROM skaccount where brgyID ='$brgy'");
					$brgyres = $brgy->fetch_assoc();

					?>
					 <?php if($prres['is_approved'] == 1){ echo " <center> <b> BIDS AND AWARDS COMMITTEE APPROVED  </b></center>  " ; } 
					else if($prres['is_approved'] == 2){ echo " <center> <b>BIDS AND AWARDS COMMITTEE DECLINED </b></center> " ; } 
					else{ ?>
						<button class="btn btn-success btn-md" type="button" data-toggle="modal" data-target="#approved"><i class="fas fa-check"></i> Approved </button>
						<button class="btn btn-warning btn-md" type="button" data-toggle="modal" data-target="#declined"> <i class="fas fa-times"></i> Decline </button>
					<?php } ?>
					<br>
				    <br>
					<div id="printableArea">
					<style>
					.table-1 
					{
						width: 100%;
						table-layout: fixed;
					}
					</style>
					   <table class="table-1" >
						<tr> 
							<td  class="text-right"><img src="../assets/img/carmona.png" width="100px;"> </td>
							<td class="text-center"> <strong>  Republic of the Philippines <br> Province of Cavite <br>MUNICIPALITY OF CARMONA<br> <?php echo $brgyres['barangay_name'];?> </td>
							<td  class="text-left"><img src="../assets/img/barangay/<?php echo $brgyres['img_profile'];?>" width="100px;"> </td>				  
						</tr>
						
						</tbody>
                      </table>
					  <br> <br> <br>
					  <center><h4> BIDS AND AWARDS COMMITTEE</h4> </center>
					  <center>RESOLUTION <?php echo $prres['resolution_no'];?>  </center>
					   <br> <br>
					  <p align="justify">
						<strong> WHEREAS </strong>, <?php echo $brgyres['barangay_name'];?> intends to procure <?php echo $prres['description'];?>  as per Purchase Request No. <?php echo $prres['prno'];?> amounting to  <?php echo $prres['amount'];?> PHP 
						<br>
						<strong> WHEREAS </strong>, as provide for in Rule XVI Section 48 of the Implementing Rules and Regulations (IRR) of Republic of Republic Act No. 9184 otherwise known as Government Procurement Act, the Bids and Awards Committee (BAC) may resort to alternative methods of procurement for as long as in all instances, the procuring entity may 	promote economy and efficiency and shall ensure that the most advantageous price for the government is obtained at the time of purchase:
						<br><br>
						<strong> WHEREAS</strong>, Section 539 of the Revised IRR of RA 9184 under Government Procurement Policy Board (GPPB) Resolution No.: 03-2009 dated July 22, 2009, the procuring entity shall draw up a list of at least three (3) suppliers, contractors of known qualification which will be invited to submit proposals, in the case of goods and infrastructure projects or curriculum vitae, in case of consulting services, and provided however that the procurement does not result in splitting of contracts and provided further, that the procurement does not fall under shopping.
						<br><br>
						<strong>NOW, THEREFORE</strong>, We, the Members of the Bids and Awards Committee, hereby RESOLVE, as it is hereby RESOLVE to recommend negotiated procurement mode under Section 539 (Small Value Procurement) in this kind of purchase/ services.

						<br>
						RESOLVED :  ________________ 
					  
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
								  I hereby certify to the correctness of the <br>
							      foregoing resolution.
								  <br>
								  <br>
								  <?php echo strtoupper($brgyres['secretary']);?>
								  <br>
							      BAC Secretariat 
								  </center>
							</td>
						</tr>
						
                      </table>
					  Recommend Approval:
					  <table class="table" >
						<tr> 
							<td colspan="6" class="text-center"> <strong>  Hon. <?php echo strtoupper($brgyres['sk_chairman']);?> <br> Chairman  </td>
						</tr>
						
						</tbody>
                      </table>
					  <table class="table" >
						<tr> 
							<td colspan="6" class="text-center"> <strong> Hon. <?php echo strtoupper($brgyres['vice_chairman']);?> <br> Vice-Chairman  </td>
							<td colspan="6"  class="text-center"> <strong>Hon. <?php echo strtoupper($brgyres['member1']);?><br> Member</td>
						</tr>
						<tr> 
							<td colspan="6" class="text-center"> <strong> Hon. <?php echo strtoupper($brgyres['member2']);?><br> Member  </td>
							<td colspan="6"  class="text-center"> <strong>Hon. <?php echo strtoupper($brgyres['member3']);?><br> Member</td>
						</tr>
						</tbody>
                      </table>
					   <table class="table" >
						<tr> 
							<td colspan="6" class="text-center"> Approved : <br><br><br><strong>  Hon.  <?php echo strtoupper($brgyres['procuring']);?> <br>  Head of Procuring  </td>
						</tr>
						
						</tbody>
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
									<h5 class="modal-title" id="exampleModalCenterTitle">BIDS AND AWARDS COMMITTEE</h5>
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
									<button type="submit" class="btn btn-success" name="process-approved-bac">Approved</button>
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
										<input type="hidden" class="form-control" name="goodid" value="<?php echo $goodid;?>" required>
										<input type="hidden" class="form-control" name="data" value="<?php echo $_GET['data'];?>" required>
										<input type="hidden" class="form-control" name="brgy" value="<?php echo  $_GET['brgy'];?>" required>
									</div> 
								</div>
								<div class="modal-footer bg-whitesmoke br">
									<button type="submit" class="btn btn-warning" name="process-decline-bac">Declined</button>
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
								</form>
								</div>
								 </div>
							</div>
<?php require('footer.php'); ?> 
