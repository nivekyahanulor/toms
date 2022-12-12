<?php include('header.php'); ?>       
<?php include('nav.php'); ?>       
<?php include('../controller/sk-procurement-reports.php'); ?> 

	<div class="main-content">
	<div class="row justify-content-center">
	 <div class="col-7">
	 <?php
			$proid = base64_decode(urldecode($_GET['data'])); 
			$brgy1  = $_GET['brgy']; 
		 ?>
	 <button class="btn btn-info btn-md" type="button" onclick="printDiv('printableArea')"/><i class="fas fa-print"></i> Print </button>
	 	<?php 
					/** GET BARANGAY INFO **/
					$brgy	 = $mysqli->query("SELECT * FROM skaccount where brgyID ='$brgy1'");
					$brgyres = $brgy->fetch_assoc();
					
					/** GET BAC INFO **/
					$pr	   = $mysqli->query("SELECT * FROM supplier where brgy_id='$brgy1' and pro_id='$proid' and purpose !=''");
					$prres = $pr->fetch_assoc();
					?>
					<?php if($prres['is_approved'] == 1){ echo " <center> <b> ABSTRACT OF QUOTATIONS APPROVED  </b></center>  " ; } 
					else if($prres['is_approved'] == 2){ echo " <center> <b>ABSTRACT OF QUOTATIONS DECLINED </b></center> " ; } 
					else{ ?>
						<button class="btn btn-success btn-md" type="button" data-toggle="modal" data-target="#approved"><i class="fas fa-check"></i> Approved </button>
						<button class="btn btn-warning btn-md" type="button" data-toggle="modal" data-target="#declined"> <i class="fas fa-times"></i> Decline </button>
					<?php } ?>
	 <br>
	 <br>
	 <br>
		 
		<div id="printableArea">
		<div style="break-after:page"></div>

		    <div class="card">
                  <div class="card-body">
				  
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
					  <center><h5> ABSTRACT OF QUOTATIONS<h5> </center>
					   <br> <br>
					  <table class="table-1"  cellspacing="1" cellpadding="10">
						<tr> 
							<td colspan="1"> </td>
							<td colspan="9">  For : 
							<u> 
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<?php echo $prres['purpose'];?> 
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</u>
							</td>
						</tr>
					
						</tbody>
                      </table>
					 <br>
						  <p align="justify" style="padding-left:120px; font-size:16px;">
								The following are the result of quotations:
						  </p>
						<br>
					    <table class="table" style="width: 100%;">
                        <thead>
                          <tr>
                            <th class="text-center">SUPPLIERS</th>
                            <th class="text-center">AMOUNT QUOTED</th>
                          </tr>
                        </thead>
						<tbody>
						<?php 
							$req = $mysqli->query("SELECT a.* , b.* , sum(b.amount)amount  FROM supplier a
										LEFT JOIN supplier_qoutation b on b.supplier_id=a.supplierID
										where a.pro_id='$proid' and a.brgy_id ='$brgy1' group by a.supplierID ");
							while($val = $req->fetch_object()){
							?>
							<tr> 
								<td class="text-center"> <?php echo $val->supplier_name;?> </td>
								<td class="text-center"> ₱ <?php echo number_format($val->amount,2);?> </td>
							</tr>
						<?php } ?>
						</tbody>
                      </table>
					    <br><br>
						<?php 
						$win	 = $mysqli->query("SELECT a.* , SUM(b.amount)amount FROM 
													supplier a LEFT JOIN supplier_qoutation b on b.supplier_id=a.supplierID 
													where a.pro_id='$proid'  and a.brgy_id ='$brgy1'
													group by a.supplierID ORDER BY amount ASC LIMIT 1
													");
												
													

						$winsupp = $win->fetch_assoc();
						
						
						?>
					    <p align="justify" style="padding-left:120px; font-size:16px;" >
						Recommending the Awards to 
						<u> 
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<?php echo $winsupp['supplier_name'];?>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</u>
						<br> In the amount of
						<u>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						₱ <?php echo number_format($winsupp['amount'],2);?>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</u>
						said quotation is considered to be reasonable and 
						<br>
						most advantageous to the government.
						</p>
						<br><br>
					  <table class="table" >
						
						</tbody>
                      </table>
					  <table class="table" >
						<tr> 
							<td colspan="6" class="text-center"> <strong> Hon. <?php echo strtoupper($brgyres['vice_chairman']);?> <br> Vice Chairperson  </td>
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
							<td colspan="6" class="text-center"> <strong>  Hon. <?php echo strtoupper($brgyres['sk_chairman']);?> <br> Chairperson   </td>
						</tr>
						
						</tbody>
                      </table>
					
                  </div>
				
                </div> 
				
                </div>
           </div>
           </div>
	</div>  
	
<?php require('footer.php'); ?> 
