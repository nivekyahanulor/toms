<?php
error_reporting(0);
session_start();
include('../config/database.php');
date_default_timezone_set('Asia/Manila');

$data   = $_SESSION['brgyID'];

if(isset($_POST['verify'])){
	
	$password =  md5($_POST['password']);
	$check    = $mysqli->query("select * from skaccount where brgyID ='$data' and password = '$password'");
	$num      = $check->num_rows;
	echo $num;
}

if(isset($_POST['add-goods'])){
	
	$title      = $_POST['title'];
	$brgyid     = $_POST['brgyid'];
	$nature     = $_POST['nature'];
	$date_start = $_POST['date_start'];
	$date_end   = $_POST['date_end'];
	$ptype      = $_POST['ptype'];
	
	$sql	    = "INSERT INTO sk_procurement (title,nature,date_start,date_end,status,procurement_type,brgy_id)
		VALUES ('$title','$nature','$date_start','$date_end','1','$ptype','$brgyid')";
	if ($mysqli->query($sql) === TRUE) {
		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO user_history (user,actions , is_sk , brgy_id) VALUES ('$username' , 'Add New Procurement Activity ' , 1 , '$brgyid')");
			// if($ptype == 1){
			// echo "<script> window.location.href='procurement-goods.php?added';</script>";
			// } else if($ptype==2){
			// echo "<script> window.location.href='procurement-services.php?added';</script>";
			// }else if($ptype==3){
			// echo "<script> window.location.href='procurement-services.php?added';</script>";
			// }
		} else {
			// if($ptype == 1){
			// echo "<script> window.location.href='procurement-goods.php?error';</script>";
			// } else if($ptype==2){
			// echo "<script> window.location.href='procurement-services.php?error';</script>";
			// } else if($ptype==3){
			// echo "<script> window.location.href='procurement-services.php?error';</script>";
			// }
	}
}

if(isset($_POST['add-requisition'])){
	
	$itemnum    = $_POST['itemnum'];
	$pro_id     = $_POST['pro_id'];
	$protype    = $_POST['protype'];
	$qty        = $_POST['qty'];
	$unit       = $_POST['unit'];
	$desc       = $_POST['desc'];
	$estiunit   = $_POST['estiunit'];
	$esticost   = $_POST['esticost'];
	$prno  		= $_POST['prno'];
	$date  		= $_POST['date'];
	$pro_type   = $_POST['pro_type'];
	$purpose    = $_POST['purpose'];
	
	$sql	    = "INSERT INTO requisition (item_number,qty,unit,description,unit_cost,estimated_cost,pro_id,pro_type)
		VALUES ('$itemnum','$qty','$unit','$desc','$estiunit','$esticost','$pro_id' ,'$pro_type')";
	if ($mysqli->query($sql) === TRUE) {
		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO user_history (user,actions , is_sk , brgy_id) VALUES ('$username' , 'Add New Requisition Data ' , 1 , '$brgyid')");
			echo "<script> window.location.href='procurement-process.php?type=".$protype."&data=".$pro_id."&pr=".$prno."&date=".$date."&purpose=".$purpose."';</script>";
		} else {
			echo "<script> window.location.href='procurement-process.php?type=".$protype."&data=".$pro_id."&pr=".$prno."&date=".$date."&purpose=".$purpose."';</script>";
	}
}

if(isset($_POST['add-pa'])){
	
	$pro_id       = $_POST['pro_id'];
	$protype      = $_POST['protype'];
	$qty          = $_POST['qty'];
	$unit         = $_POST['unit'];
	$desc         = $_POST['desc'];
	$pronum       = $_POST['pronum'];
	$dateacquired = $_POST['dateacquired'];
	$prno  	  	  = $_POST['prno'];
	$date  		  = $_POST['date'];
	$amount  	  = $_POST['amount'];
	$pro_type     = $_POST['pro_type'];
	
	$sql	    = "INSERT INTO pa_report_item (qty,unit,description,property_no,date_aquired,amount,pro_id,pro_type)
		VALUES ('$qty','$unit','$desc','$pronum','$dateacquired','$amount','$pro_id' ,'$pro_type')";
	if ($mysqli->query($sql) === TRUE) {
		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO user_history (user,actions , is_sk , brgy_id) VALUES ('$username' , 'Add New PA Data ' , 1 , '$brgyid')");
			echo "<script> window.location.href='procurement-process.php?type=".$protype."&data=".$pro_id."&pr=".$prno."&date=".$date."';</script>";
		} else {
			echo "<script> window.location.href='procurement-process.php?type=".$protype."&data=".$pro_id."&pr=".$prno."&date=".$date."';</script>";
	}
}

if(isset($_GET['add-ai'])){
	
	$pro_id       = $_GET['pro_id'];
	$protype      = $_GET['protype'];
	$qty          = $_GET['qty'];
	$unit         = $_GET['unit'];
	$desc         = $_GET['desc'];
	$amount       = '0';
	$dateacquired = '0';
	$pro_type     = $_GET['pro_type'];
	$itemno       = '';
	
	$sql	    = "INSERT INTO ai_report_item (itemno,description,unit,qty,amount,date_acquired,pro_id,pro_type)
		VALUES ('$itemno','$desc','$unit','$qty','$amount','$dateacquired','$pro_id' ,'$pro_type')";
	if ($mysqli->query($sql) === TRUE) {
		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO user_history (user,actions , is_sk , brgy_id) VALUES ('$username' , 'Add New AI Data ' , 1 , '$brgyid')");
		} else {
	}
}

if(isset($_GET['add-po'])){
	
	$itemnum  = $_GET['itemnum'];
	$qty      = $_GET['qty'];
	$unit     = $_GET['unit'];
	if($unit == 'OTHER'){
		$units     = $_GET['other'];
	} else {
		$units     = $unit;
	}
	$esticost = $_GET['esticost'];
	$pro_type = $_GET['pro_type'];
	$pro_id   = $_GET['pro_id'];
	$protype  = $_GET['protype'];
	$amount   = $_GET['amount'];
	$sql	  = "INSERT INTO purchase_order_item (item_number,qty,unit,cost,amount,pro_id,pro_type)
		VALUES ('$itemnum','$qty','$units','$esticost','$amount','$pro_id' ,'$pro_type')";
	if ($mysqli->query($sql) === TRUE) {
		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO user_history (user,actions , is_sk , brgy_id) VALUES ('$username' , 'Add New Purchase Order Data ' , 1 , '$brgyid')");
		} else {
	}
}

if(isset($_GET['add-supplier'])){
	
	$suppliername  = $_GET['suppliername'];
	$address       = $_GET['address'];
	$date          = $_GET['date'];
	$pro_id        = $_GET['pro_id'];
	$pro_type      = $_GET['pro_type'];
	$protype       = $_GET['protype'];
	
	$sql	    = "INSERT INTO supplier (supplier_name,address,date_process,pro_id,pro_type,brgy_id)
		VALUES ('$suppliername','$address','$date','$pro_id' ,'$pro_type','$data')";
	if ($mysqli->query($sql) === TRUE) {
		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO user_history (user,actions , is_sk , brgy_id) VALUES ('$username' , 'Add New Supplier Data ' , 1 , '$brgyid')");
			// echo "<script> window.location.href='procurement-process.php?type=".$protype."&data=".$pro_id."';</script>";
		} else {
			// echo "<script> window.location.href='procurement-process.php?type=".$protype."&data=".$pro_id."';</script>";
	}
}

if(isset($_GET['add-qoutation'])){
	
	$itemnum       = $_GET['itemnum'];
	$supid         = $_GET['supid'];
	$desc          = $_GET['desc'];
	$qty           = $_GET['qty'];
	$unitprice     = $_GET['unitprice'];
	$amount        = $_GET['amount'];
	$pro_id        = $_GET['pro_id'];
	$pro_type      = $_GET['pro_type'];
	$protype       = $_GET['protype'];
	
	$sql	    = "INSERT INTO supplier_qoutation (item_no,description,qty,unit_price, amount, supplier_id)
		VALUES ('$itemnum','$desc','$qty','$unitprice' ,'$amount','$supid')";
	if ($mysqli->query($sql) === TRUE) {
		header("Location: {$_SERVER['HTTP_REFERER']}");
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO user_history (user,actions , is_sk , brgy_id) VALUES ('$username' , 'Add  Supplier Qoutation Data ' , 1 , '$brgyid')");
		} else {
			echo "<script> window.location.href='procurement-process.php?type=".$protype."&data=".$pro_id."';</script>";
	}
}

if(isset($_GET['add-dv'])){
	
	$particular     = $_GET['particular'];
	$amount         = $_GET['amount'];
	$pro_id         = $_GET['pro_id'];
	$pro_type       = $_GET['pro_type'];
	$protype        = $_GET['protype'];
	
	$sql	    = "INSERT INTO dv_report_item (particular,amount ,pro_id,pro_type)
		VALUES ('$particular','$amount','$pro_id' ,'$protype')";
	if ($mysqli->query($sql) === TRUE) {
		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO user_history (user,actions , is_sk , brgy_id) VALUES ('$username' , 'Add  Disbursement Voucher List Data ' , 1 , '$brgyid')");
		} else {
	}
}

if(isset($_POST['remove-supplier'])){
	
	$supid         = $_POST['supid'];
	$pro_id        = $_POST['pro_id'];
	$pro_type      = $_POST['pro_type'];
	$protype       = $_POST['protype'];
	
	$sql	    = "DELETE FROM  supplier_qoutation where supplier_id= '$supid'";
	$mysqli->query($sql);
	
	$sql1	    = "DELETE FROM  supplier where supplierID = '$supid'";
	$mysqli->query($sql1);
	
	if ($mysqli->query($sql) === TRUE) {
		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO user_history (user,actions , is_sk , brgy_id) VALUES ('$username' , 'Remove  Supplier Data ' , 1 , '$brgyid')");
			// echo "<script> window.location.href='procurement-process.php?type=".$protype."&data=".$pro_id."';</script>";
		} else {
			// echo "<script> window.location.href='procurement-process.php?type=".$protype."&data=".$pro_id."';</script>";
	}
}

if(isset($_POST['submit-bac'])){
	
	$reso      = $_POST['reso'];
	$item_desc = $_POST['item_desc'];
	$prno1     = $_POST['prno1'];
	$amount1   = $_POST['amount1'];
	$pro_id    = $_POST['pro_id'];
	$p_type    = $_POST['p_type'];
	
	if($p_type == "PROCUREMENT OF GOODS"){
		$type =1;
	}
	else if($p_type == "PROCUREMENT OF SERVICES"){
		$type =2;
	}
	
	$sql	    = "INSERT INTO procurement_bac_resolution (resolution_no,description,prno,amount,pro_id,pro_type , brgy_id)
		VALUES ('$reso','$item_desc','$prno1','$amount1','$pro_id','$type','$data')";
	if ($mysqli->query($sql) === TRUE) {
		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO user_history (user,actions , is_sk , brgy_id) VALUES ('$username' , 'Process BAC Resolution ' , 1 , '$brgyid')");
			echo 'success';
		} else {
			echo 'error';
		}
}
if(isset($_POST['submit-qoutation'])){
	
	$pro_id     = $_POST['pro_id'];
	$p_type     = $_POST['p_type'];
	$supplierID = $_POST['supplierID'];
	$purpose    = $_POST['purpose'];
	
	if($p_type == "PROCUREMENT OF GOODS"){
		$type =1;
	}
	
	$sql	    = "UPDATE supplier set is_process = 1 , purpose='$purpose' where supplierID = '$supplierID'";
	if ($mysqli->query($sql) === TRUE) {
		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO user_history (user,actions , is_sk , brgy_id) VALUES ('$username' , 'Process Qoutation ' , 1 , '$brgyid')");
			echo 'success';
		} else {
			echo 'error';
		}
}

if(isset($_POST['submit-goods'])){
	
	$prno    = $_POST['prno'];
	$pdate   = $_POST['date_goods'];
	$totale  = $_POST['totale'];
	$purpose = $_POST['purpose'];
	$pro_id  = $_POST['pro_id'];
	$p_type  = $_POST['p_type'];
	
	if($p_type == "PROCUREMENT OF GOODS"){
		$type =1;
	}
	else if($p_type == "PROCUREMENT OF SERVICES"){
		$type =2;
	}
	
	$sql	    = "INSERT INTO procurement_goods (prno,date_goods,total_estimated,purpose,pro_id,pro_type, brgy_id)
		VALUES ('$prno','$pdate','$totale','$purpose','$pro_id','$type','$data')";
	if ($mysqli->query($sql) === TRUE) {
		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO user_history (user,actions , is_sk , brgy_id) VALUES ('$username' , 'Process Purchase Request ' , 1 , '$brgyid')");
			echo 'success';
		} else {
			echo 'error';
		}
}

if(isset($_POST['submit-pa'])){
	
	$prno    = $_POST['prno'];
	$pdate   = $_POST['date_goods'];
	$pro_id  = $_POST['pro_id'];
	$p_type  = $_POST['p_type'];
	
	if($p_type == "PROCUREMENT OF GOODS"){
		$type =1;
	}
	else if($p_type == "PROCUREMENT OF SERVICES"){
		$type =2;
	}
	
	$sql	    = "INSERT INTO pa_report (prno,date_pa,pro_id,pro_type, brgy_id)
		VALUES ('$prno','$pdate','$pro_id','$type','$data')";
	if ($mysqli->query($sql) === TRUE) {
		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO user_history (user,actions , is_sk , brgy_id) VALUES ('$username' , 'Process Property Acknowledgemenr ' , 1 , '$brgyid')");
			echo 'success';
		} else {
			echo 'error';
		}
}

if(isset($_POST['submit-po'])){
	
	$po_supplier = $_POST['po_supplier'];
	$po_address  = $_POST['po_address'];
	$po_tel      = $_POST['po_tel'];
	$po_tin      = $_POST['po_tin'];
	$po_pono     = $_POST['po_pono'];
	$po_date     = $_POST['po_date'];
	$po_promode  = $_POST['po_promode'];
	$po_delplace = $_POST['po_delplace'];
	$po_deldate  = $_POST['po_deldate'];
	$po_delterm  = $_POST['po_delterm'];
	$po_termpay  = $_POST['po_termpay'];
	$pro_id  	 = $_POST['pro_id'];
	$p_type  	 = $_POST['p_type'];
	
	if($p_type == "PROCUREMENT OF GOODS"){
		$type =1;
	}
	else if($p_type == "PROCUREMENT OF SERVICES"){
		$type =2;
	}
	
	
	$sql	    = "INSERT INTO purchase_order (supplier,address,telno,tin,pono,datepo,pro_mode,del_place,del_date,del_terms,payment_terms,pro_id,pro_type, brgy_id)
		VALUES ('$po_supplier','$po_address','$po_tel','$po_tin','$po_pono','$po_date','$po_promode','$po_delplace','$po_deldate','$po_delterm','$po_termpay','$pro_id','$type','$data')";
	if ($mysqli->query($sql) === TRUE) {
		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO user_history (user,actions , is_sk , brgy_id) VALUES ('$username' , 'Process Purchase Order ' , 1 , '$brgyid')");
			echo 'success';
		} else {
			echo 'error';
		}
}

if(isset($_POST['submit-ai'])){
	
	$iarno       = $_POST['iarno'];
	$dateiar     = $_POST['dateiar'];
	$supplierai  = $_POST['supplierai'];
	$ponoai      = $_POST['ponoai'];
	$datepo      = $_POST['datepo'];
	$sk 	     = $_POST['sk'];
	$invoice	 = $_POST['invoice'];
	$dateinvoice = $_POST['dateinvoice'];
	$pro_id  	 = $_POST['pro_id'];
	$p_type  	 = $_POST['p_type'];
	$ris  	     = $_POST['ris'];
	$dateris  	 = $_POST['dateris'];
	
	if($p_type == "PROCUREMENT OF GOODS"){
		$type =1;
	}
	else if($p_type == "PROCUREMENT OF SERVICES"){
		$type =2;
	}
	
	$sql	    = "INSERT INTO ai_report (iarno,dateiar,supplier,pono,datepo,sk,invoice,dateinvoice,ris,ris_date,pro_id,pro_type, brgy_id)
		VALUES ('$iarno','$dateiar','$supplierai','$ponoai','$datepo','$sk','$invoice','$dateinvoice','$ris','$dateris','$pro_id','$type','$data')";
	if ($mysqli->query($sql) === TRUE) {
		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO user_history (user,actions , is_sk , brgy_id) VALUES ('$username' , 'Process Acceptance and Inspection  ' , 1 , '$brgyid')");
			echo 'success';
		} else {
			echo 'error';
		}
}

if(isset($_POST['submit-dv'])){
	
	$dv_no        = $_POST['dv_no'];
	$datedv       = $_POST['datedv'];
	$payee        = $_POST['payee'];
	$dv_tin       = $_POST['dv_tin'];
	$dv_address   = $_POST['dv_address'];
	$pro_id  	  = $_POST['pro_id'];
	$p_type  	  = $_POST['p_type'];
	
	if($p_type == "PROCUREMENT OF GOODS"){
		$type =1;
	}
	else if($p_type == "PROCUREMENT OF SERVICES"){
		$type =2;
	}
	else if($p_type == "PROCUREMENT OTHERS"){
		$type =3;
	}
	
	$sql	    = "INSERT INTO dv_report (dvno,datedv,payee,tin,address,pro_id,pro_type, brgy_id)
		VALUES ('$dv_no','$datedv','$payee','$dv_tin','$dv_address','$pro_id','$type','$data')";
	if ($mysqli->query($sql) === TRUE) {
		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO user_history (user,actions , is_sk , brgy_id) VALUES ('$username' , 'Process DV   ' , 1 , '$brgyid')");
			echo 'success';
		} else {
			echo 'error';
		}
}

if(isset($_POST['remove-requistion'])){
	$requisitionID   = $_POST['requisitionID'];
	$sql	         = "DELETE from requisition where requisitionID ='$requisitionID'";
		if ($mysqli->query($sql) === TRUE) {
		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO user_history (user,actions , is_sk , brgy_id) VALUES ('$username' , 'Delete Requisition Data  ' , 1 , '$brgyid')");
		} else {
		}
}

if(isset($_POST['remove-qoutation'])){
	$sqID   = $_POST['sqID'];
	$sql	         = "DELETE from supplier_qoutation where sqID  ='$sqID'";
		if ($mysqli->query($sql) === TRUE) {
		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO user_history (user,actions , is_sk , brgy_id) VALUES ('$username' , 'Delete Supplier Qoutation Data  ' , 1 , '$brgyid')");
		} else {
		}
}

if(isset($_POST['remove-po-item'])){
	$poitemID   = $_POST['poitemID'];
	$sql	    = "DELETE from purchase_order_item where poitemID  ='$poitemID'";
		if ($mysqli->query($sql) === TRUE) {
		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO user_history (user,actions , is_sk , brgy_id) VALUES ('$username' , 'Delete Purchase Order Item Data  ' , 1 , '$brgyid')");
		} else {
		}
}

if(isset($_POST['remove-pa-item'])){
	$paitemID   = $_POST['paitemID'];
	$sql	    = "DELETE from pa_report_item where paitemID   ='$paitemID'";
		if ($mysqli->query($sql) === TRUE) {
		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO user_history (user,actions , is_sk , brgy_id) VALUES ('$username' , 'Delete Property Acknowledgement Item Data  ' , 1 , '$brgyid')");
		} else {
		}
}
if(isset($_POST['remove-ai-item'])){
	$aireportID   = $_POST['aireportID'];
	$sql	    = "DELETE from ai_report_item where aireportID='$aireportID'";
		if ($mysqli->query($sql) === TRUE) {
		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO user_history (user,actions , is_sk , brgy_id) VALUES ('$username' , 'Delete AI Item Data  ' , 1 , '$brgyid')");
		} else {
		}
}
if(isset($_POST['remove-dv-item'])){
	$dvitemID   = $_POST['dvitemID'];
	$sql	    = "DELETE from dv_report_item where dvitemID='$dvitemID'";
		if ($mysqli->query($sql) === TRUE) {
		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO user_history (user,actions , is_sk , brgy_id) VALUES ('$username' , 'Delete DV Item Data  ' , 1 , '$brgyid')");
		} else {
		}
}

if(isset($_POST['check-fund'])){
	$dvtem1   = $mysqli->query("SELECT sum(amount)amount FROM sk_budget_record where brgyID='$data' and isExpenses='2'");
	$res2     = $dvtem1->fetch_assoc();
	
	$dvtem   = $mysqli->query("SELECT sum(amount)amount FROM sk_budget_record where brgyID='$data' and isExpenses='0'");
	$res     = $dvtem->fetch_assoc();
	
	$dvtem1	= $mysqli->query("SELECT sum(amount)expenses FROM sk_budget_record where brgyID='$data' and isExpenses='1'");
	$res1    = $dvtem1->fetch_assoc();
	echo ($res['amount'] - $res1['expenses']) - $res2['amount'];	
}
if(isset($_POST['check-fund-2'])){
	$dvtem	= $mysqli->query("SELECT sum(amount)amount FROM sk_trust_fund where brgy_id='$data'");
	$res    = $dvtem->fetch_assoc();
	echo $res['amount'];
}


if(isset($_POST['process-dv'])){
	
	$dv_no       = $_POST['dv_no'];
	$dv          = 'DV No.' . $dv_no;
	$dvtotal     = $_POST['dvtotal'];
	$dv_netpay   = $_POST['dv_netpay'];
	$fund_amount = $_POST['fund_amount'];
	$vat         = $_POST['vat'];
	$fund        = $_POST['fund'];
	$pro_id      = $_POST['pro_id'];
	$protype     = $_POST['protype'];
	$total       = $fund_amount - $dv_netpay;
	$mysqli->query("UPDATE sk_procurement set status=2 where proID ='$pro_id'");
	$sql	= "UPDATE dv_report set dvtotal='$dvtotal' , fund_amount='$fund_amount', dv_netpay='$dv_netpay' ,vat='$vat', fund='$fund' , is_process=1 where pro_id='$pro_id' and pro_type='$protype'";
	
	if($fund == 2){
		$mysqli->query("UPDATE sk_trust_fund set amount = amount - '$dvtotal' where brgy_id ='$data'");
		$mysqli->query("INSERT INTO  sk_budget_record (transaction_name , amount , brgyID , isExpenses,pro_id) values ('$dv' , '$dvtotal'  , '$data','3','$pro_id')");
	} else {
		$mysqli->query("INSERT INTO  sk_budget_record (transaction_name , amount , brgyID , isExpenses,pro_id) values ('$dv'  , '$dvtotal'  , '$data','1','$pro_id')");
	}
	
	if ($mysqli->query($sql) === TRUE) {
		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO user_history (user,actions , is_sk , brgy_id) VALUES ('$username' , 'Process DV Report' , 1 , '$brgyid')");
		if($protype ==1){
			echo "<script> window.location.href='procurement-goods.php?process-done ';</script>";
		} else if($protype ==2){
			echo "<script> window.location.href='procurement-services.php?process-done ';</script>";
		} else if($protype ==3){
			echo "<script> window.location.href='procurement-others.php?process-done ';</script>";
		}
		} else {
			// echo "<script> window.location.href='procurement-goods.php?error';</script>";
		}
}

if(isset($_POST['remove-pro'])){
	$proID   = $_POST['proID'];
	$sql	    = "DELETE from sk_procurement where proID  ='$proID'";
		if ($mysqli->query($sql) === TRUE) {
		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO user_history (user,actions , is_sk , brgy_id) VALUES ('$username' , 'Delete Procurement Data  ' , 1 , '$brgyid')");

		} else {
		}
}

if(isset($_POST['edit-pro'])){
	
	$proID      = $_POST['proID'];
	$title      = $_POST['title'];
	$nature     = $_POST['nature'];
	$date_start = $_POST['date_start'];
	$date_end   = $_POST['date_end'];

	$sql	    = "UPDATE sk_procurement set title='$title' , nature='$nature' , date_start='$date_start' ,  date_end ='$date_end'	where proID ='$proID'";
	if ($mysqli->query($sql) === TRUE) {
		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO user_history (user,actions , is_sk , brgy_id) VALUES ('$username' , 'Update Procurement Details' , 1 , '$brgyid')");
		} else {
	}
}