<?php
include('../config/database.php');

$data      = base64_decode(urldecode($_GET['data']));

$budget	      = $mysqli->query("SELECT * FROM sk_budget_record where brgyID='$data' and isExpenses = 0");
$budget1	  = $mysqli->query("SELECT * FROM sk_budget_record where brgyID='$data' and isExpenses = 0");
$expenses     = $mysqli->query("SELECT a.*,b.title FROM sk_budget_record  a
										LEFT JOIN sk_procurement b on a.pro_id = b.proID
										where a.brgyID='$data' and a.isExpenses = 1 or a.isExpenses = 3");
$total        = $mysqli->query("SELECT * FROM sk_budget_record where brgyID='$data'");
$events       = $mysqli->query("SELECT * FROM events where brgy_id='$data'");
$events1      = $mysqli->query("SELECT count(*) total_event FROM events where brgy_id='$data'");
$information  = $mysqli->query("SELECT * FROM skaccount where brgyID ='$data'");
$information1 = $mysqli->query("SELECT * FROM skaccount where brgyID ='$data'");
$information2 = $mysqli->query("SELECT * FROM skaccount where brgyID ='$data'");
$expenses1    = $mysqli->query("SELECT * FROM sk_budget_record where brgyID='$data' and isExpenses = 1");
$trustfund    = $mysqli->query("SELECT * FROM sk_budget_record where brgyID='$data'  and isExpenses = 2");
$trustfund1    = $mysqli->query("SELECT * FROM sk_trust_fund where brgy_id='$data' ");

if(isset($_POST['add-fund'])){
	
	$transname = $_POST['transaction_name'];
	$brgyid    = $_POST['brgyid'];
	$amount    = $_POST['amount'];
	
	$sql	   = "INSERT INTO sk_budget_record (transaction_name,amount,brgyID , is_admin)
		VALUES ('$transname','$amount','$brgyid' ,1)";
	if ($mysqli->query($sql) === TRUE) {
		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO user_history (user,actions) VALUES ('$username' , 'Add Fund for Barangay $brgyid')");
		echo "<script> window.location.href='view-barangay-details.php?data=".urlencode(base64_encode($brgyid))."&added';</script>";
		} else {
		echo "<script> window.location.href='view-barangay-details.php?data=".urlencode(base64_encode($brgyid))."&error';</script>";
	}
}
if(isset($_POST['process-fund'])){
	
	$brgyid    = $_POST['brgyid'];
	$amount    = $_POST['amount'];
	
	
	$check = $mysqli->query("select * from sk_trust_fund where brgy_id='$brgyid'");
	$cnt   = $check->num_rows;
	
	if($cnt == 0){
			$mysqli->query("INSERT INTO sk_trust_fund (amount,brgy_id) VALUES ('$amount' , '$brgyid')");
	} else {
			$mysqli->query("UPDATE sk_trust_fund set amount=amount + '$amount' where brgy_id='$brgyid'");
	}

	
	$sql	   = "INSERT INTO sk_budget_record (transaction_name,amount,brgyID , is_admin,isExpenses,is_trust_fund)
		VALUES ('Trust Fund','$amount','$brgyid' ,1,2,1)";
		
	if ($mysqli->query($sql) === TRUE) {
		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO user_history (user,actions) VALUES ('$username' , 'Process Trust fund for Barangay $brgyid')");
		echo "<script> window.location.href='view-barangay-details.php?data=".urlencode(base64_encode($brgyid))."&added';</script>";
		} else {
		echo "<script> window.location.href='view-barangay-details.php?data=".urlencode(base64_encode($brgyid))."&error';</script>";
	}
}

if(isset($_POST['update-account'])){
	
	$brgyid    = $_POST['brgyid'];
	$username  = $_POST['username'];
	$password  = md5($_POST['password']);
	$sql	   = "UPDATE skaccount SET username='$username' ,  password='$password' where brgyID = '$brgyid'";
	if ($mysqli->query($sql) === TRUE) {
		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO user_history (user,actions) VALUES ('$username' , 'Update Account for Barangay $brgyid')");
			echo "<script> window.location.href='view-barangay-details.php?data=".urlencode(base64_encode($brgyid))."&account-updated';</script>";
		} else {
		echo "<script> window.location.href='view-barangay-details.php?data=".urlencode(base64_encode($brgyid))."&error';</script>";
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
		$mysqli->query("INSERT INTO user_history (user,actions ) VALUES ('$username' , 'Update Fund for Barangay $brgyid')");
			echo "<script> window.location.href='view-barangay-details.php?data=".urlencode(base64_encode($brgyid))."&updated';</script>";
		} else {
			echo "<script> window.location.href='view-barangay-details.php?data=".urlencode(base64_encode($brgyid))."&error';</script>";
	}
}

if(isset($_POST['remove-fund'])){
	
	$brgyid    = $_POST['brgyid'];
	$id        = $_POST['id'];
	$sql	   = "DELETE from sk_budget_record where bID='$id'";
	if ($mysqli->query($sql) === TRUE) {
		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO user_history (user,actions) VALUES ('$username' , 'Remove Fund Data for Barangay $brgyid')");
			echo "<script> window.location.href='view-barangay-details.php?data=".urlencode(base64_encode($brgyid))."&removed';</script>";
		} else {
			echo "<script> window.location.href='view-barangay-details.php?data=".urlencode(base64_encode($brgyid))."&error';</script>";
	}
}