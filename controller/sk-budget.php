<?php
include('../config/database.php');

$data     = $_SESSION['brgyID'];

$budget	 = $mysqli->query("SELECT * FROM sk_budget_record where brgyID='$data'");
$fund	 = $mysqli->query("SELECT sum(amount)totalfund FROM sk_trust_fund where brgy_id='$data'");
$fund1	 = $mysqli->query("SELECT sum(amount)totaltf FROM sk_trust_fund where brgy_id='$data'");
$resf    = $fund1->fetch_assoc();

//** GET CURRENT FUND **/
$dvtem0   = $mysqli->query("SELECT sum(amount)amount FROM sk_budget_record where brgyID='$data' and isExpenses=0 group by isExpenses='0' and isExpenses!='2' and is_trust_fund=0");
$res0     = $dvtem0->fetch_assoc();
	
$dvtem1	= $mysqli->query("SELECT sum(amount)expenses FROM sk_budget_record where brgyID='$data' and isExpenses=1 group by  isExpenses='1'");
$res1    = $dvtem1->fetch_assoc();

$dvtem2	= $mysqli->query("SELECT sum(amount)totaltf FROM sk_budget_record where brgyID='$data' and is_trust_fund=1 group by  is_trust_fund='1'");
$res11    = $dvtem2->fetch_assoc();

$currentfund   =  ($res0['amount'] - $res1['expenses']) - $res11['totaltf'];	
$totalexpenses =  $res1['expenses'];	

if(isset($_POST['add-fund'])){
	
	$transname = $_POST['transaction_name'];
	$brgyid    = $_POST['brgyid'];
	$amount    = $_POST['amount'];
	$sql	   = "INSERT INTO sk_budget_record (transaction_name,amount,brgyID)
		VALUES ('$transname','$amount','$brgyid')";
	if ($mysqli->query($sql) === TRUE) {
		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO user_history (user,actions , is_sk , brgy_id) VALUES ('$username' , 'Add Fund for Barangay $brgyid' , 1 , '$brgyid')");
			echo "<script> window.location.href='budget.php?added';</script>";
		} else {
			echo "<script> window.location.href='budget.php?error';</script>";
	}
}


if(isset($_POST['add-expenses'])){
	
	$transname = $_POST['transaction_name'];
	$brgyid    = $_POST['brgyid'];
	$amount    = $_POST['amount'];
	$sql	   = "INSERT INTO sk_budget_record (transaction_name,amount,brgyID,isExpenses)
		VALUES ('$transname','$amount','$brgyid',1)";
	if ($mysqli->query($sql) === TRUE) {
		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO user_history (user,actions , is_sk , brgy_id) VALUES ('$username' , 'Add Expenses for Barangay $brgyid' , 1 , '$brgyid')");
			echo "<script> window.location.href='budget.php?added';</script>";
		} else {
			echo "<script> window.location.href='budget.php?error';</script>";
	}
}

if(isset($_POST['edit-fund'])){
	
	$transname = $_POST['transaction_name'];
	$brgyid    = $_POST['brgyid'];
	$amount    = $_POST['amount'];
	$id        = $_POST['id'];
	$sql	   = "UPDATE sk_budget_record SET transaction_name =  '$transname' ,amount = '$amount' where bID='$id'";
	if ($mysqli->query($sql) === TRUE) {
		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO user_history (user,actions , is_sk , brgy_id) VALUES ('$username' , 'Update Fund for Barangay $brgyid' , 1 , '$brgyid')");
			echo "<script> window.location.href='budget.php?updated';</script>";
		} else {
			echo "<script> window.location.href='budget.php?error';</script>";
	}
}


if(isset($_POST['remove-fund'])){
	
	$brgyid    = $_POST['brgyid'];
	$id        = $_POST['id'];
	$sql	   = "DELETE from sk_budget_record where bID='$id'";
	if ($mysqli->query($sql) === TRUE) {
		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO user_history (user,actions , is_sk , brgy_id) VALUES ('$username' , 'Remove Fund Data for Barangay $brgyid' , 1 , '$brgyid')");
			echo "<script> window.location.href='budget.php?removed';</script>";
		} else {
			echo "<script> window.location.href='budget.php?error';</script>";
	}
}