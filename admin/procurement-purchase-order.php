<?php include('header.php'); ?>       
<?php include('nav.php'); ?>       
<?php include('../controller/sk-procurement-reports.php'); ?> 
<?php
function numberTowords($num){

	$ones = array(
	0 =>"ZERO",
	1 => "ONE",
	2 => "TWO",
	3 => "THREE",
	4 => "FOUR",
	5 => "FIVE",
	6 => "SIX",
	7 => "SEVEN",
	8 => "EIGHT",
	9 => "NINE",
	10 => "TEN",
	11 => "ELEVEN",
	12 => "TWELVE",
	13 => "THIRTEEN",
	14 => "FOURTEEN",
	15 => "FIFTEEN",
	16 => "SIXTEEN",
	17 => "SEVENTEEN",
	18 => "EIGHTEEN",
	19 => "NINETEEN",
	"014" => "FOURTEEN"
	);
	$tens = array( 
	0 => "ZERO",
	1 => "TEN",
	2 => "TWENTY",
	3 => "THIRTY", 
	4 => "FORTY", 
	5 => "FIFTY", 
	6 => "SIXTY", 
	7 => "SEVENTY", 
	8 => "EIGHTY", 
	9 => "NINETY" 
	); 
	$hundreds = array( 
	"HUNDRED", 
	"THOUSAND", 
	"MILLION", 
	"BILLION", 
	"TRILLION", 
	"QUARDRILLION" 
	); /*limit t quadrillion */
	$num = number_format($num,2,".",","); 
	$num_arr = explode(".",$num); 
	$wholenum = $num_arr[0]; 
	$decnum = $num_arr[1]; 
	$whole_arr = array_reverse(explode(",",$wholenum)); 
	krsort($whole_arr,1); 
	$rettxt = ""; 
	foreach($whole_arr as $key => $i){
		
	while(substr($i,0,1)=="0")
			$i=substr($i,1,5);
	if($i < 20){ 
	/* echo "getting:".$i; */
	$rettxt .= $ones[$i]; 
	}elseif($i < 100){ 
	if(substr($i,0,1)!="0")  $rettxt .= $tens[substr($i,0,1)]; 
	if(substr($i,1,1)!="0") $rettxt .= " ".$ones[substr($i,1,1)]; 
	}else{ 
	if(substr($i,0,1)!="0") $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
	if(substr($i,1,1)!="0")$rettxt .= " ".$tens[substr($i,1,1)]; 
	if(substr($i,2,1)!="0")$rettxt .= " ".$ones[substr($i,2,1)]; 
	} 
	if($key > 0){ 
		$rettxt .= " ".$hundreds[$key]." "; 
		}
	} 
	if($decnum > 0){
		$rettxt .= " and ";
		if($decnum < 20){
			$rettxt .= $ones[$decnum];
		}elseif($decnum < 100){
			$rettxt .= $tens[substr($decnum,0,1)];
			$rettxt .= " ".$ones[substr($decnum,1,1)];
		}
	}
	return $rettxt;
}

?>
	<div class="main-content">
	<div class="row justify-content-center">
	 <div class="col-7">
		    <div class="card">
                  <div class="card-body">
				  <?php
				  $proid = base64_decode(urldecode($_GET['data'])); 
				  $brgy1  = $_GET['brgy']; 
				  
				  /** GET PR INFO **/
					$pr	   = $mysqli->query("SELECT * FROM purchase_order where brgy_id='$brgy1' and pro_id='$proid'");
					$prres = $pr->fetch_assoc();
					$goodid = $prres['poID'];		
				  ?>
				  <button class="btn btn-info btn-md" type="button" onclick="printDiv('printableArea')"/><i class="fas fa-print"></i> Print </button>
				   <?php if($prres['is_approved'] == 1){ echo " <center> <b> PURCHASE ORDER APPROVED  </b></center>  " ; } 
					else if($prres['is_approved'] == 2){ echo " <center> <b>PURCHASE ORDER DECLINED </b></center> " ; } 
					else{ ?>
						<button class="btn btn-success btn-md" type="button" data-toggle="modal" data-target="#approved"><i class="fas fa-check"></i> Approved </button>
						<button class="btn btn-warning btn-md" type="button" data-toggle="modal" data-target="#declined"> <i class="fas fa-times"></i> Decline </button>
					<?php } ?>
				<br>
				<br>
					<?php
					
					
							
					/** GET BARANGAY INFO **/
							
					$brgy	 = $mysqli->query("SELECT * FROM skaccount where brgyID ='$brgy1'");
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
					  <center><h4> PURCHASE ORDER </h4> </center>
						
					  <table class="table-1" style="border:1px solid black;" >
						<tr> 
							<td colspan="6"> <strong> Barangay : </strong>  <?php echo $brgyres['barangay_name'];?></td>
							<td colspan="6"><strong> City/Municipality :</strong>  <?php echo $brgyres['city'];?></td>
						</tr>
						<tr> 
							<td colspan="6"><strong> Tel No:</strong>  <?php echo $brgyres['contact'];?></td>
							<td colspan="6"><strong> Province : </strong> <?php echo $brgyres['province'];?> </td>
						</tr>
						</tbody>
                      </table>
					   <table class="table-1" style="border:1px solid black;" >
						<tr> 
							<td colspan="6"> <strong> Supplier : </strong>  <?php echo $prres['supplier'];?></td>
							<td colspan="6"><strong> P.O No:</strong>  <?php echo $prres['pono'];?></td>
						</tr>
						<tr> 
							<td colspan="6"><strong> Address</strong>  <?php echo $prres['address'];?></td>
							<td colspan="6"><strong> Date : </strong> <?php echo $prres['datepo'];?> </td>
						</tr>
						<tr> 
							<td colspan="6">
							<strong> Tin No.: </strong>  <?php echo $prres['tin'];?>
							</td>
							<td colspan="6"><strong> Mode of Procurement : </strong> <?php echo $prres['pro_mode'];?> </td>
						
						</tr>
						<tr> 
						<td colspan="6">
							<strong> Tel No.: </strong>  <?php echo $prres['telno'];?>
							</td>
							
									<td colspan="2" > Bidding: </td>
									<td colspan="2"> Negotiated </td>
									<td colspan="2"> Over the Counter </td>
							</tr> 
						
						</tr>
						</tbody>
                      </table>
					   <table class="table-1" style="border:1px solid black;" >
						<tr> 
							<td colspan="6" class="text-center"> Gentlemen: Please deliver to this office the following articles subject to the terms and conditions contained herein:</td>
						</tr>
						</tbody>
                      </table> 
					    <table class="table-1" style="border:1px solid black;" >
						<tr> 
							<td colspan="6"> <strong> Place of Delivery : </strong>  <?php echo $prres['del_place'];?></td>
							<td colspan="6"><strong> Delivery Term :</strong>  <?php echo $prres['del_terms'];?></td>
						</tr>
						<tr> 
							<td colspan="6"><strong> Date of Delivery:</strong>  <?php echo $prres['del_date'];?></td>
							<td colspan="6"><strong> Payment Term : </strong> <?php echo $prres['payment_terms'];?> </td>
						</tr>
						</tbody>
                      </table>
					
					 
                      <table class="table-2" style="border:1px solid black;width: 100%;">
                        <thead>
                          <tr>
                            <th class="text-center">Unit</th>
                            <th class="text-center">Particulars</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Unit Cost</th>
                            <th class="text-center">Amount</th>
                          </tr>
                        </thead>
						<tbody>
						<?php 
							/** GET REQUISITION DATA **/
							$req	   = $mysqli->query("SELECT * FROM purchase_order_item where pro_id='$proid'");
							while($val = $req->fetch_object()){
							$total +=$val->amount;
							?>
							<tr> 
								<td class="text-center"> <?php echo $val->unit;?> </td>
								<td class="text-center"> <?php echo $val->item_number;?> </td>
								<td class="text-center"> <?php echo $val->qty;?> </td>
								<td class="text-center"> ₱ <?php echo number_format($val->cost,2);?> </td>
								<td class="text-center"> ₱ <?php echo number_format($val->amount,2);?> </td>
							</tr>
						<?php } ?>
						<tr><td   colspan="6" class="text-center"></td></tr>
						</tbody>
                      </table>
					   <table class="table-3" style="border:1px solid black;">
						<tr> 
							<td colspan="3"> <strong>(Total Amount in Words): </strong> </td>
							<td colspan="0" class="text-center"> <strong>  ₱  <?php echo number_format($total,2);?></strong> </td>
						</tr>
						</tbody>
                      </table>
					  <table class="table-3" style="border:1px solid black;">
						<tr> 
							<td colspan="5" style="padding:10px;">&nbsp;&nbsp;&nbsp;In case of failure to make full delivery within the time specified above, a penalty of one-tenth (1/10) of one percent for every delay shall be imposed on the undelivered item/s.</td>
						</tr>
							<tr> 
							<td colspan="3"> 
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
							<td colspan="3" class="text-right">  
								  <center>
								  Very truly yours,<br><br>
								 <?php echo strtoupper($brgyres['sk_chairman']);?>
								  <br>
							      Signature over Printed Name
								  <br>
							      SK Chairperson
								   <br>
								   <br>
								  DATE:  <?php echo date('Y-m-d');?>
								  </center>
								 
							</td>
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
							<td colspan="6"> <strong> Conforme: </td>
							<td colspan="6"> <strong> Existence of Available Approriations: <br> (P &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
						</tr>
						<tr> 
							<td colspan="6"  class="text-center">
							 <u>
							 &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
							 &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
							 &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
								<?php echo $prres['supplier'];?>   
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</u>
							<br> Signature over Printed Name  <br> Supplier</td>
							<td colspan="6"  class="text-center">
							 <u>
							 &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
							 &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
							 &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
								<?php echo $brgyres['committee_approriations'];?>   
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</u>
							<br> Signature over Printed Name  <br> Chairman, Committee on Appropriations</td>
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
	<div class="modal fade" id="approved" tabindex="-1" role="dialog"  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalCenterTitle">Purchase Order</h5>
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
									<button type="submit" class="btn btn-success" name="process-approved-po">Approved</button>
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
									<h5 class="modal-title" id="exampleModalCenterTitle">Purchase Order</h5>
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
									<button type="submit" class="btn btn-warning" name="process-decline-po">Declined</button>
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
								</form>
								</div>
								 </div>
							</div>
<?php require('footer.php'); ?> 
