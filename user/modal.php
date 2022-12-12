
	   <!-- ADD AI  MODAL -->
	   <div class="modal fade" id="add-dv" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">DISBURSEMENT VOUCHER </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
				<form  method="GET">
					<div class="form-row">
						
						<div class="form-group col-md-12">
							<label>Particular  : </label>
							<div class="input-group">
							<input type="text" class="form-control" name="particular" required>
							<input type="hidden" class="form-control" name="pro_id" value="<?php echo $_GET['data'];?>" required>
							<input type="hidden" class="form-control" name="protype" value="<?php echo $type;?>" required>
							<input type="hidden" class="form-control" name="data" value="<?php echo $_GET['data'];?>" required>
							<input type="hidden" class="form-control" name="type" value="<?php echo $_GET['type'];?>" required>
							<input type="hidden" class="form-control" name="dv_no1" id="dv_no1" required>
							<input type="hidden" class="form-control" name="dv_dateno1" id="dv_dateno1" required>
							<input type="hidden" class="form-control" name="dv_payee1" id="dv_payee1" required>
							<input type="hidden" class="form-control" name="dv_tin1" id="dv_tin1" required>
							<input type="hidden" class="form-control" name="dv_address1" id="dv_address1" required>
						</div>
						</div>
					
						<div class="form-group col-md-12">
							<label>Amount : </label>
							<div class="input-group">
							<input type="text" class="form-control" name="amount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
						</div>
						</div>
					
						
					</div> 
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-primary" name="add-dv">Add</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
			  </form>
            </div>
          </div>
        </div>
	 	<!-- ADD AI  MODAL -->
	   <div class="modal fade" id="add-ai" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">ACCEPTANCE AND INSPECTION </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
				<form  method="GET">
					<div class="form-row">
						
						<div class="form-group col-md-12">
							<label>Quantity  : </label>
							<div class="input-group">
							<input type="text" class="form-control" name="qty" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"  required>
							<input type="hidden" class="form-control" name="pro_id" value="<?php echo $_GET['data'];?>" required>
							<input type="hidden" class="form-control" name="protype" value="<?php echo $_GET['type'];?>" required>
							<input type="hidden" class="form-control" name="data" value="<?php echo $_GET['data'];?>" required>
							<input type="hidden" class="form-control" name="type" value="<?php echo $_GET['type'];?>" required>
							<input type="hidden" class="form-control" name="iarno" id="iarnoai" required>
							<input type="hidden" class="form-control" name="dateiar" id="dateiarai" required>
							<input type="hidden" class="form-control" name="supplierai" id="supplierai1" required>
							<input type="hidden" class="form-control" name="ponoai" id="ponoai1" required>
							<input type="hidden" class="form-control" name="datepo" id="datepoai" required>
							<input type="hidden" class="form-control" name="invoice" id="invoice1" required>
							<input type="hidden" class="form-control" name="dateinvoice" id="dateinvoice" required>
							<input type="hidden" class="form-control" name="aidateris" id="aidateris" required>
							<input type="hidden" class="form-control" name="airis" id="airis" required>
						</div>
						</div>
						<div class="form-group col-md-12">
							<label>Unit : </label>
							<div class="input-group">
							<input type="text" class="form-control" name="unit" required>
							<input type="hidden" class="form-control" name="pro_type" value="<?php echo $type;?>" required>
						</div>
						</div>
						<div class="form-group col-md-12">
							<label>Desription : </label>
							<div class="input-group">
							<input type="text" class="form-control" name="desc" required>
						</div>
						</div>
						
					</div> 
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-primary" name="add-ai">Add</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
			  </form>
            </div>
          </div>
        </div>
		
		<!-- ADD PA  MODAL -->
	   <div class="modal fade" id="add-pa" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">PROPERTY ACKNOWLEDGMENT DETAILS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
				<form  method="post">
					<div class="form-row">
						
						<div class="form-group col-md-12">
							<label>Quantity  : </label>
							<div class="input-group">
							<input type="text" class="form-control" name="qty" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"  required>
							<input type="hidden" class="form-control" name="pro_id" value="<?php echo $_GET['data'];?>" required>
							<input type="hidden" class="form-control" name="protype" value="<?php echo $_GET['type'];?>" required>
							<input type="hidden" class="form-control" name="prno" id="prno122" required>
							<input type="hidden" class="form-control" name="date" id="date122" required>
						</div>
						</div>
						<div class="form-group col-md-12">
							<label>Unit of Measurement  : </label>
							
							<select class="form-control" name="unit" id="units" required>
								<option value =""> - Select Unit </option>
								<option> PACKS </option>
								<option> PCS </option>
								<option> KG </option>
								<option> M </option>
								<option> CM </option>
								<option> UNIT </option>
								<option> LITER </option>
								<option> OTHER </option>
							</select>
							<input type="hidden" class="form-control" name="pro_type" value="<?php echo $type;?>" required>
						</div>
						<div class="form-group col-md-12">
							<div class="input-group">
							<input type="text" class="form-control" name="other" style="display:none;" id="other-unit" >
						</div>
						</div>
						<div class="form-group col-md-12">
							<label>Desription : </label>
							<div class="input-group">
							<input type="text" class="form-control" name="desc" required>
						</div>
						</div>
						<div class="form-group col-md-12">
							<label>Property Number : </label>
							<div class="input-group">
							<input type="text" class="form-control" name="pronum" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
						</div>
						</div>
						<div class="form-group col-md-12">
							<label>Date Acquired  : </label>
							<div class="input-group">
							<input type="date" class="form-control" name="dateacquired" required>
						</div>
						</div>
						<div class="form-group col-md-12">
							<label>Amount: </label>
							<div class="input-group">
							<input type="text" class="form-control" name="amount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
						</div>
						</div>
						
					</div> 
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-primary" name="add-pa">Add</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
			  </form>
            </div>
          </div>
        </div>
		
	  	<!-- ADD REQUISITION  MODAL -->
	   <div class="modal fade" id="add-requisition" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">REQUISITION  DETAILS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
				<form  method="post">
					<div class="form-row">
						<div class="form-group col-md-12">
						<label>Item Number: </label>
						<div class="input-group">
							<input type="text" class="form-control" name="itemnum" required>
							<input type="hidden" class="form-control" name="pro_id" value="<?php echo $_GET['data'];?>" required>
							<input type="hidden" class="form-control" name="protype" value="<?php echo $_GET['type'];?>" required>
							<input type="hidden" class="form-control" name="prno" id="prno" required>
							<input type="hidden" class="form-control" name="date" id="date" required>
							<input type="hidden" class="form-control" name="purpose" id="purpose1" required>
						</div>
						</div> 
						<div class="form-group col-md-12">
							<label>Quantity  : </label>
							<div class="input-group">
							<input type="text" class="form-control" name="qty" id="r-qty" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"  required>
						</div>
						</div>
						<div class="form-group col-md-12">
							<label>Unit of Measurement: </label>
							<div class="input-group">
							<select class="form-control" name="unit" id="units1" required>
								<option value =""> - Select Unit </option>
								<option> PACKS </option>
								<option> PCS </option>
								<option> KG </option>
								<option> M </option>
								<option> CM </option>
								<option> UNIT </option>
								<option> LITER </option>
								<option> OTHER </option>
							</select>
							<input type="hidden" class="form-control" name="pro_type" value="<?php echo $type;?>" required>
						</div>
						</div>
					
						<div class="form-group col-md-12">
							<div class="input-group">
							<input type="text" class="form-control" name="other" style="display:none;" id="other-unit1" >
						</div>
						</div>
						<div class="form-group col-md-12">
							<label>Desription : </label>
							<div class="input-group">
							<input type="text" class="form-control" name="desc" required>
						</div>
						</div>
						<div class="form-group col-md-12">
							<label>Estimated Unit Cost : </label>
							<div class="input-group">
							<input type="text" class="form-control" name="estiunit"   id="r-unit" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
						</div>
						</div>
						<div class="form-group col-md-12">
							<label>Estimated Cost : </label>
							<div class="input-group">
							<input type="text" class="form-control" name="esticost" readonly  id="r-amount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
						</div>
						</div>
						
					</div> 
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-primary" name="add-requisition">Add</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
			  </form>
            </div>
          </div>
        </div>
		
		<!-- ADD PO  MODAL -->
	    <div class="modal fade" id="add-po" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">PURCHASE ORDER  DETAILS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
				<form  method="get">
					<div class="form-row">
						<div class="form-group col-md-12">
						<label>Particular: </label>
						<div class="input-group">
							<input type="text" class="form-control" name="itemnum" required>
							<input type="hidden" class="form-control" name="pro_id" value="<?php echo $_GET['data'];?>" required>
							<input type="hidden" class="form-control" name="protype" value="<?php echo $_GET['type'];?>" required>
							<input type="hidden" class="form-control" name="type" value="<?php echo $_GET['type'];?>" required>
							<input type="hidden" class="form-control" name="data" value="<?php echo $_GET['data'];?>" required>
							<input type="hidden" class="form-control" name="po_supplier1" id="po_supplier1" required>
							<input type="hidden" class="form-control" name="po_address1" id="po_address1" required>
							<input type="hidden" class="form-control" name="po_tel1" id="po_tel1" required>
							<input type="hidden" class="form-control" name="po_tin1" id="po_tin1" required>
							<input type="hidden" class="form-control" name="po_pono1" id="po_pono1" required>
							<input type="hidden" class="form-control" name="po_date1" id="po_date1" required>
							<input type="hidden" class="form-control" name="po_promode1" id="po_promode1" required>
							<input type="hidden" class="form-control" name="po_delplace1" id="po_delplace1" required>
							<input type="hidden" class="form-control" name="po_deldate1" id="po_deldate1" required>
							<input type="hidden" class="form-control" name="po_delterm1" id="po_delterm1" required>
							<input type="hidden" class="form-control" name="po_termpay1" id="po_termpay1" required>
						</div>
						</div> 
						<div class="form-group col-md-12">
							<label>Quantity  : </label>
							<div class="input-group">
							<input type="text" class="form-control" name="qty" id="po-qty" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"  required>
						</div>
						</div>
						<div class="form-group col-md-12">
							<label>Unit : </label>
							<div class="input-group">
							<select class="form-control" name="unit" id="units2" required>
								<option value =""> - Select Unit </option>
								<option> PACKS </option>
								<option> PCS </option>
								<option> KG </option>
								<option> M </option>
								<option> CM </option>
								<option> UNIT </option>
								<option> LITER </option>
								<option> OTHER </option>
							</select>
							<input type="hidden" class="form-control" name="pro_type" value="<?php echo $type;?>" required>
						</div>
						</div>
					
						<div class="form-group col-md-12">
							<div class="input-group">
							<input type="text" class="form-control" name="other" style="display:none;" id="other-unit2" >
						</div>
						</div><div class="form-group col-md-12">
							<label>Unit Cost : </label>
							<div class="input-group">
							<input type="text" class="form-control" name="esticost" id="po-unit" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
						</div>
						</div>
						<div class="form-group col-md-12">
							<label>Amount: </label>
							<div class="input-group">
							<input type="text" class="form-control" name="amount" id="po-amount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" readonly required>
						</div>
						</div>
						
					</div> 
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-primary" name="add-po" value="add-po">Add</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
			  </form>
            </div>
          </div>
        </div>
		
		<!-- ADD SUPPLIER  MODAL -->
	   <div class="modal fade" id="add-supplier" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">SUPPLIER  DETAILS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
				<form  method="get">
					<div class="form-row">
						<div class="form-group col-md-12">
						<label>Supplier Name: </label>
						<div class="input-group">
							<input type="text" class="form-control" name="suppliername" required>
							<input type="hidden" class="form-control" name="pro_id" value="<?php echo $_GET['data'];?>" required>
							<input type="hidden" class="form-control" name="protype" value="<?php echo $_GET['type'];?>" required>
							<input type="hidden" class="form-control" name="type" value="<?php echo $_GET['type'];?>" required>
							<input type="hidden" class="form-control" name="data" value="<?php echo $_GET['data'];?>" required>
							<input type="hidden" class="form-control" name="purpose" id="purpose-1" required>
						</div>
						</div> 
						
						<div class="form-group col-md-12">
							<label>Address  : </label>
							<div class="input-group">
							<input type="text" class="form-control" name="address" required>
							<input type="hidden" class="form-control" name="pro_type" value="<?php echo $type;?>" required>
						</div>
						</div>
						<div class="form-group col-md-12">
							<label>Date : </label>
							<div class="input-group">
							<input type="date" class="form-control" value="<?php echo date('Y-m-d');?>" name="date" required>
						</div>
						</div>
						
						
					</div> 
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-primary" name="add-supplier">Add</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
			  </form>
            </div>
          </div>
        </div>
		
	

	   <div class="modal fade" id="dvmodal" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">DISBURSEMENT VOUCHER</h5>
              </div>
              <div class="modal-body">
				<form  method="post">
					<div class="form-row">
						<div class="form-group col-md-12">
						<label>TOTAL: </label>
						<div class="input-group">
							<input type="text" class="form-control" name="dvtotal" value="<?php echo $dvtotal;?>" id="dvtotal" readonly required>
							<input type="hidden" class="form-control" name="dv_no" value="<?php echo $_GET['dv_no1'];?>" id="dv_no" readonly required>
							<input type="hidden" class="form-control" name="pro_id" id="dv_pro_id" value="<?php echo $_GET['data'];?>" required>
							<input type="hidden" class="form-control" name="protype" id="dv_pro_type" value="<?php echo $type;?>" required>
							<input type="hidden" class="form-control" name="dv_netpay" id="dv_netpay" required>
							<input type="hidden" class="form-control" name="fund_amount" id="fund_amount" required>
						</div>
						</div> 
						<div class="form-group col-md-12">
						<label>VAT CATEGORY: </label>
						<div class="input-group">
							<select  class="form-control" name="vat" id="vat" required>
								<?php if($type ==3){?>
									<option value=""> -- SELECT -- </option>
									<option value="1"> No Tax </option>
									<option value="2">Professional Tax</option>
								<?php } else { ?>
									<option value=""> -- SELECT -- </option>
									<option value="1"> Vatable </option>
									<option value="2"> Non-Vatable</option>
								<?php } ?>
							</select>
						</div>
						</div> 
						  <table class="table table-border table-stripe" id="vatcomputation" style="display:none;border:1;">
							  <thead>
								<th class="text-center"> (%) </th>
								<th class="text-center"> TOTAL </th>
							  </thead>
							  <tbody>
								  <tr>
									  <td id="ewt" class="text-center"></td>
									  <td id="ewttotal" class="text-center"></td>
								  </tr>
								  <tr>
									  <td id="cwt" class="text-center"></td>
									  <td id="cwttotal" class="text-center"></td>
								  </tr>
								  <tr>
									  <td class="text-center"><strong> TOTAL </strong></td>
									  <td id="ovtotal" class="text-center"></td>
								  </tr>
								  <tr>
									  <td class="text-center"><strong> NET PAY </strong></td>
									  <td id="netpay" class="text-center"></td>
								  </tr>
							  </tbody>
						  </table>
						<div class="form-group col-md-12" id="fund-cat" style="display:none;">
						<label>FUND CATEGORY: </label>
						<div class="input-group">
							<select  class="form-control" name="fund" id="fund" required>
								<option value=""> -- SELECT -- </option>
								<option value="1"> Current Fund</option>
								<option value="2"> Trust Fund</option>
							</select>
						</div>
						</div> 
						<div class="form-group col-md-12" id="fund-res" style="display:none;">
							<div id="res-fund"></div>
						</div> 
					
					</div> 
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-primary" name="process-dv" id="process-dv" style="display:none;">PROCESS</button>
              </div>
			  </form>
            </div>
          </div>
        </div>
		