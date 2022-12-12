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
							
					/** GET PR INFO **/
					$pr	   = $mysqli->query("SELECT * FROM procurement_goods where brgy_id='$data' and pro_id='$proid'");
					$prres = $pr->fetch_assoc();
							
							
					/** GET BARANGAY INFO **/
							
					$brgy	 = $mysqli->query("SELECT * FROM skaccount where brgyID ='$data'");
					$brgyres = $brgy->fetch_assoc();

					?>
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

					</style>
					  <center><h4> PURCHASE REQUEST </h4> </center>
						
					  <table class="table-1" style="border:1px solid black;" >
						<tr> 
							<td colspan="6"> <strong> Barangay : </strong>  <?php echo $brgyres['barangay_name'];?></td>
							<td colspan="6"><strong> P.R No : </strong> <?php echo $prres['prno'];?></td>
						</tr>
						<tr> 
							<td colspan="6"><strong> City/Municipality :</strong>  <?php echo $brgyres['city'];?></td>
							<td colspan="6"><strong> Date : </strong> <?php echo $prres['date_goods'];?> </td>
						</tr>
						</tbody>
                      </table>
					   <table class="table-1" style="border:1px solid black;" >
						<tr> 
							<td colspan="6" class="text-center"><strong>  REQUISITION </strong></td>
						</tr>
						</tbody>
                      </table>
					 
                      <table class="table-2" style="border:1px solid black;width: 100%;">
                        <thead>
                          <tr>
                            <th class="text-center">Item No.</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Unit of Measurement</th>
                            <th class="text-center">Item Description</th>
                            <th class="text-center">Estimated Unit Cost</th>
                            <th class="text-center">Estimated Cost</th>
                          </tr>
                        </thead>
						<tbody>
						<?php 
							/** GET REQUISITION DATA **/
							$req	   = $mysqli->query("SELECT * FROM requisition where pro_id='$proid'");
							while($val = $req->fetch_object()){
							$total +=$val->estimated_cost;
							?>
							<tr> 
								<td class="text-center"> <?php echo $val->item_number;?> </td>
								<td class="text-center"> <?php echo $val->qty;?> </td>
								<td class="text-center"> <?php echo $val->unit;?> </td>
								<td class="text-center"> <?php echo $val->description;?> </td>
								<td class="text-center"> ₱ <?php echo number_format($val->unit_cost,2);?> </td>
								<td class="text-center"> ₱ <?php echo number_format($val->estimated_cost,2);?> </td>
							</tr>
						<?php } ?>
						<tr><td   colspan="6" class="text-center"></td></tr>
						</tbody>
                      </table>
					   <table class="table-3" style="border:1px solid black;">
						<tr> 
							<td colspan="5"> <strong> Total Estimated : </strong> </td>
							<td colspan="0" class="text-center"> <strong> ₱ <?php echo number_format($total,2);?></strong> </td>
						</tr>
						</tbody>
                      </table>
					  <table class="table-3" style="border:1px solid black;">
						<tr> 
							<td colspan="6">&nbsp;&nbsp;&nbsp;</td>
						</tr>
						</tbody>
                      </table>
					  <table class="table-3" style="border:1px solid black;">
						<tr> 
							<td colspan="6">&nbsp;&nbsp;&nbsp;</td>
							<td colspan="0" class="text-center">#</td>
						</tr>
						</tbody>
                      </table>
					   <table class="table-3" style="border:1px solid black;">
						<tr> 
							<td colspan="6">&nbsp;&nbsp;&nbsp;</td>
						</tr>
						</tbody>
                      </table>
					    <table class="table" style="border:1px solid black;" >
						<tr> 
							<td colspan="6"> <strong> Requested By : </td>
							<td colspan="6"> <strong> Approved By : </td>
						</tr>
						<tr> 
							<td colspan="6"  class="text-center"><strong> 
							<u>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<?php echo $prres['purpose'];?>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><br> Signature over Printed Name 
							<br> Requesting SK Official</td>
							<td colspan="6"  class="text-center"><strong><u> <?php echo $brgyres['sk_chairman'];?></u><br> Signature over Printed Name  <br> SK Chairperson</td>
						</tr>
						<tr style=" height: 100px;"> 
							<?php
							$date  = date_create(date('Y-m-d'));
							$today = date_format($date,"M d , Y ");
							?>
							<td colspan="6" class="text-center"> <strong>  <u>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<?php echo $today;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><br> Date </td>
							<td colspan="6" class="text-center"> <strong>  <u>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<?php echo $today;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><br> Date </td>
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
