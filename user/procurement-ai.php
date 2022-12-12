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
				  <button class="btn btn-info btn-md" type="button" onclick="printDiv('printableArea')"/><i class="fas fa-print"></i> Print </button>
					<?php
					$proid = base64_decode(urldecode($_GET['data'])); 
							
					/** GET PR INFO **/
					$pr	   = $mysqli->query("SELECT * FROM ai_report where brgy_id='$data' and pro_id='$proid'");
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
					  <center><h4> ACCEPTANCE AND INSPECTION REPORT</h4> </center>
						
					  <table class="table-1" style="border:1px solid black;" >
						<tr> 
							<td colspan="6"> <strong> Barangay : </strong>  <?php echo $brgyres['barangay_name'];?></td>
							<td colspan="6"><strong> IAR No:</strong>  <?php echo $prres['iarno'];?></td>
						</tr>
						<tr> 
							<td colspan="6"><strong> City/Municipality :</strong>  <?php echo $brgyres['city'];?></td>
							<td colspan="6"><strong> Date : </strong> <?php echo $prres['dateiar'];?> </td>
						</tr>
						</tbody>
                      </table> 
					  <table class="table-1" style="border:1px solid black;" >
						<tr> 
							<td colspan="6"> <strong> Province : </strong>  <?php echo $brgyres['province'];?></td>
						</tr>
					
						</tbody>
                      </table>
					   <table class="table-1" style="border:1px solid black;" >
						<tr> 
							<td colspan="6"> <strong> Supplier : </strong>  <?php echo $prres['supplier'];?></td>
							<td colspan="6"><strong> Invoice No.</strong>  <?php echo $prres['invoice'];?></td>
						</tr>
						<tr> 
							<td colspan="6">
							<strong> PO No.</strong>  <?php echo $prres['pono'];?>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<strong> Date : </strong> <?php echo $prres['datepo'];?> 
							</td>
							<td colspan="6"><strong> Date : </strong> <?php echo $prres['dateinvoice'];?> </td>
						</tr>
						
						<tr> 
							<td colspan="6">
							<strong> RIS  No.</strong> <?php echo $prres['ris'];?>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<strong> Date : </strong> <?php echo $prres['datepo'];?> 
							</td>
						</tr>
						
						</tbody>
                      </table>
					
					 
                      <table class="table-2" style="border:1px solid black;width: 100%;">
                        <thead>
                          <tr>
                            <th class="text-center">Unit</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Quantity</th>
                          </tr>
                        </thead>
						<tbody>
						<?php 
							/** GET REQUISITION DATA **/
							$req	   = $mysqli->query("SELECT * FROM ai_report_item where pro_id='$proid'");
							while($val = $req->fetch_object()){
							?>
							<tr> 
								<td class="text-center"> <?php echo $val->unit;?> </td>
								<td class="text-center"> <?php echo $val->description;?> </td>
								<td class="text-center"> <?php echo $val->qty;?> </td>
							</tr>
						<?php } ?>
						<tr><td   colspan="6" class="text-center"></td></tr>
						</tbody>
                      </table>
					
					  <table class="table-3" style="border:1px solid black;">
						<tr> 
							<td colspan="6"  class="text-center">INSPECTION</td>
							<td colspan="6" class="text-center">ACCEPTANCE</td>
						</tr>
						</tbody>
                      </table>
					 
					    <table class="table" style="border:1px solid black;" >
						<tr> 
							<td colspan="6"> <strong> Date Inspected:  __________________ </td>
							<td colspan="6"> <strong>Date Received: __________________</td>
						</tr>
						<tr> 
							<td colspan="6"  class="text-center">
								<span><input type="checkbox" ></input> &nbsp;&nbsp;&nbsp;&nbsp;Inspected, verified as to quantity <br> and specification
							</td>
							<td colspan="6"  class="text-">
								<input type="checkbox" ></input> &nbsp;&nbsp;&nbsp;&nbsp;COMPLETE<br><br>
								<input type="checkbox" ></input> &nbsp;&nbsp;&nbsp;&nbsp;Partial (Pls. specify quantity Received)
							</td>
						</tr>
						<tr style=" height: 100px;"> 
							<?php
							$date  = date_create(date('Y-m-d'));
							$today = date_format($date,"M d , Y ");
							?>
							<td colspan="6" class="text-center"> 
							 <u>
							 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							 <?php echo $brgyres['ai_committee'];?>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							 </u>
							<br> Signature over Printed Name <br> Head Inspection and Appraisal Committee
							</td>
							<td colspan="6" class="text-center"> 
							 <u>
							 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							 <?php echo $brgyres['sk_treasurer'];?>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							 </u>
							<br> Signature over Printed Name <br> SK Treasurer
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
