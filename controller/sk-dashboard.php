<?php
include('../config/database.php');
error_reporting(0);
$data     = $_SESSION['brgyID'];
$events	  = $mysqli->query("SELECT * FROM events where brgy_id='$data' ");
$history  = $mysqli->query("SELECT * FROM user_history where is_sk=1 and brgy_id='$data'");
$settings = $mysqli->query("SELECT * FROM skaccount where brgyID ='$data'");
$adminsettings = $mysqli->query("SELECT * FROM settings ");

// ** GOODS **//
$gpr	 = $mysqli->query("SELECT * FROM procurement_goods where brgy_id='$data' and pro_type='1'");
$cntgpr  = $gpr->num_rows;

$gbc	 = $mysqli->query("SELECT * FROM procurement_bac_resolution where brgy_id='$data' and pro_type='1'");
$cntgbc  = $gbc->num_rows;

$gsp	 = $mysqli->query("SELECT * FROM supplier where brgy_id='$data' and pro_type='1' group by pro_id  ");
$cntgsp  = $gsp->num_rows;

$gpo	 = $mysqli->query("SELECT * FROM purchase_order where brgy_id='$data' and pro_type='1'");
$cntgpo  = $gpo->num_rows;

$gpa	 = $mysqli->query("SELECT * FROM pa_report where brgy_id='$data' and pro_type='1'");
$cntgpa  = $gpa->num_rows;

$gai	 = $mysqli->query("SELECT * FROM ai_report where brgy_id='$data' and pro_type='1'");
$cntgai  = $gai->num_rows;

$gdv	 = $mysqli->query("SELECT * FROM dv_report where brgy_id='$data' and pro_type='1' and is_process=1 group by pro_id");
$cntgdv  = $gdv->num_rows;

// ** SERVICES **//
$spr	 = $mysqli->query("SELECT * FROM procurement_goods where brgy_id='$data' and pro_type='2'");
$cntspr  = $spr->num_rows;

$sbc	 = $mysqli->query("SELECT * FROM procurement_bac_resolution where brgy_id='$data' and pro_type='2'");
$cntsbc  = $sbc->num_rows;

$ssp	 = $mysqli->query("SELECT * FROM supplier where brgy_id='$data' and pro_type='2' group by pro_id  ");
$cntssp  = $ssp->num_rows;

$spo	 = $mysqli->query("SELECT * FROM purchase_order where brgy_id='$data' and pro_type='2'");
$cntspo  = $spo->num_rows;

$spa	 = $mysqli->query("SELECT * FROM pa_report where brgy_id='$data' and pro_type='2'");
$cntspa  = $spa->num_rows;

$sai	 = $mysqli->query("SELECT * FROM ai_report where brgy_id='$data' and pro_type='2'");
$cntsai  = $sai->num_rows;

$sdv	 = $mysqli->query("SELECT * FROM dv_report where brgy_id='$data' and pro_type='2' and is_process=1 group by pro_id");
$cntsdv  = $sdv->num_rows;

$odv	 = $mysqli->query("SELECT * FROM dv_report where brgy_id='$data' and pro_type='3' and is_process=1 group by pro_id");
$cntodv  = $odv->num_rows;

if(isset($_POST['update-information'])){
		
		$sk_chairman = $_POST['sk_chairman'];
		$vice 		 = $_POST['vice'];
		$sec 		 = $_POST['sec'];
		$mem1 		 = $_POST['mem1'];
		$mem2 		 = $_POST['mem2'];
		$mem3 		 = $_POST['mem3'];
		$procuring   = $_POST['procuring'];
		$barangay_name	 = $_POST['barangay_name'];
		$city 		 = $_POST['city'];
		$province 	 = $_POST['province'];
		$contact 	 = $_POST['contact'];
		$committee_approriations 	 = $_POST['committee_approriations'];
		$sk_treasurer 	 = $_POST['sk_treasurer'];
		$ai_committee 	 = $_POST['ai_committee'];
		$budget_officer  = $_POST['budget_officer'];
		$logo	 	     = $_POST['logo'];
		
		if($logo ==""){
			$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name = addslashes($_FILES['image']['name']);
			$image_size = getimagesize($_FILES['image']['tmp_name']);
			move_uploaded_file($_FILES["image"]["tmp_name"], "../assets/img/barangay/" . $_FILES["image"]["name"]);
			$location   =  $_FILES["image"]["name"];
		} else{
			if( $_FILES["image"]["name"] == ""){
					$location = $logo;
				} else {
					$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
					$image_name = addslashes($_FILES['image']['name']);
					$image_size = getimagesize($_FILES['image']['tmp_name']);
					move_uploaded_file($_FILES["image"]["tmp_name"], "../assets/img/barangay/" . $_FILES["image"]["name"]);
					$location   =  $_FILES["image"]["name"];
			}
		}
		
		$sql		= "UPDATE skaccount SET 
							sk_chairman		=	'$sk_chairman' , 
							vice_chairman	=	'$vice' , 
							secretary		=	'$sec' , 
							member1			=	'$mem1' , 
							member2			=	'$mem2' , 
							member3			=	'$mem3' , 
							procuring		=	'$procuring' , 
							barangay_name	=	'$barangay_name' , 
							city			=	'$city' , 
							province		=	'$province' , 
							contact			=	'$contact' , 
							committee_approriations =	'$committee_approriations' , 
							sk_treasurer =	'$sk_treasurer' , 
							ai_committee =	'$ai_committee' , 
							budget_officer =	'$budget_officer' , 
							img_profile		=	'$location' 
							where brgyID= '$data' ";
							

		if ($mysqli->query($sql) === TRUE) {
			// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO user_history (user,actions , is_sk , brgy_id) VALUES ('$username' , 'Update  Barangay $brgyid Information' , 1 , '$brgyid')");
			echo "<script> window.location.href='settings.php?updated';</script>";
		} else {
			echo "<script> window.location.href='settings.php?error';</script>";
		}
	
	
}

if(isset($_POST['update-settings'])){
		
		$vat    = $_POST['vat'];
		$cwt    = $_POST['cwt'];
		$nonvat = $_POST['nonvat'];
		$noncwt = $_POST['noncwt'];
		$termscondition = $_POST['termscondition'];
		
		
		$sql		= "UPDATE settings SET 
							vat		    =	'$vat' , 
							cwt     	=	'$cwt' , 
							nonvat		=	'$nonvat' , 
							noncwt		=	'$noncwt',
							termscondition		=	'$termscondition'
						 ";
							

		if ($mysqli->query($sql) === TRUE) {
			echo "<script> window.location.href='settings.php?updated';</script>";
		} else {
			echo "<script> window.location.href='settings.php?error';</script>";
		}
	
	
}