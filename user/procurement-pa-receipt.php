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
					$pr	   = $mysqli->query("SELECT * FROM pa_report where brgy_id='$data' and pro_id='$proid'");
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
					  <center><h4>PROPERTY ACKNOWLEDGEMENT RECEIPT</h4> </center>
						
					  <table class="table-1" style="border:1px solid black;" >
						<tr> 
							<td colspan="6"> <strong> Barangay : </strong>  <?php echo $brgyres['barangay_name'];?></td>
							<td colspan="6"><strong> PAR No:</strong>  <?php echo $prres['prno'];?></td>
						</tr>
						<tr> 
							<td colspan="6"><strong> City/Municipality :</strong>  <?php echo $brgyres['city'];?></td>
							<td colspan="6"><strong> Date : </strong> <?php echo $prres['date_pa'];?> </td>
						</tr>
						</tbody>
                      </table> 
					  <table class="table-1" style="border:1px solid black;" >
						<tr> 
							<td colspan="6"> <strong> Province : </strong>  <?php echo $brgyres['province'];?></td>
						</tr>
					
						</tbody>
                      </table>

					 
                      <table class="table-2" style="border:1px solid black;width: 100%;">
                        <thead>
                          <tr>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Unit of Measurement</th>
                            <th class="text-center">Item Description</th>
                            <th class="text-center">Property No.</th>
                            <th class="text-center">Date Acquired</th>
                            <th class="text-center">Amount</th>
                          </tr>
                        </thead>
						<tbody>
						<?php 
							/** GET REQUISITION DATA **/
							$req	   = $mysqli->query("SELECT * FROM pa_report_item where pro_id='$proid'");
							while($val = $req->fetch_object()){
							?>
							<tr> 
								<td class="text-center"> <?php echo $val->qty;?> </td>
								<td class="text-center"> <?php echo $val->unit;?> </td>
								<td class="text-center"> <?php echo $val->description;?> </td>
								<td class="text-center"> <?php echo $val->property_no;?> </td>
								<td class="text-center"> <?php echo $val->date_aquired;?> </td>
								<td class="text-center"> <?php echo $val->amount;?> </td>
							</tr>
						<?php } ?>
						<tr><td   colspan="6" class="text-center"></td></tr>
						</tbody>
                      </table>
					
					
					    <table class="table" style="border:1px solid black;" >
						<tr> 
							<td colspan="6"> <strong>Received By:</td>
							<td colspan="6"> <strong>Issued By:</td>
						</tr>
					
						<tr style=" height: 100px;"> 
							<?php
							$date  = date_create(date('Y-m-d'));
							$today = date_format($date,"M d , Y ");
							?>
							<td colspan="6" class="text-center"> 
							<span style="border-bottom: 1px solid black; padding-left: 220px">&nbsp;</span>
							<br> Signature over Printed Name <br>Designation of Recipient/End-user
							<br>
							<br>
							<span style="border-bottom: 1px solid black; padding-left: 220px">&nbsp;</span>
							<br>
							Date
							<br>
							<br>
							</td>
							<td colspan="6" class="text-center"> 
							<u>
							 &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
							 &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
							 &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<?php echo strtoupper($brgyres['sk_treasurer']);?>
							 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</u>
							<br> Signature over Printed Name <br> SK Treasurer
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
                  </div>
                </div>
                </div>
           </div>
           </div>
   </div>  
	
<?php require('footer.php'); ?> 
