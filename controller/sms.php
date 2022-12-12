<?php
session_start();
include('../config/database.php');

/** Query SMS Data **/
$sms	 	= $mysqli->query("SELECT * FROM mdrrmo_sms_details");


if(isset($_POST['add-new-sms'])){
	
	$fullname 		= $_POST['fullname'];
	$address	 	= $_POST['address'];
	$contact_number = '+63'.$_POST['contact_number'];
	$sql			= "INSERT INTO mdrrmo_sms_details (fullname, address, contact_number)
	VALUES ('$fullname', '$address', '$contact_number')";

	if ($mysqli->query($sql) === TRUE) {

	// SAVE USER ACTION //
	$username		= $_SESSION['username'];
	$mysqli->query("INSERT INTO mdrrmo_user_history (user,actions) VALUES ('$username' , 'Add New Contact for SMS')");
	
	echo "<script> window.location.href='index.php?added';</script>";
} else {
	echo "<script> window.location.href='index.php?error';</script>";
	}
	
}

if(isset($_POST['update-sms'])){
	$fullname 		= $_POST['fullname'];
	$address	 	= $_POST['address'];
	$contact_number = $_POST['contact_number'];
	$smsID 			= $_POST['smsID'];
	$sql 			= "UPDATE mdrrmo_sms_details set fullname='$fullname', address ='$address', contact_number='$contact_number' where smsID='$smsID'";

	if ($mysqli->query($sql) === TRUE) {

		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO mdrrmo_user_history (user,actions) VALUES ('$username' , 'Update Contact for SMS')");

		echo "<script> window.location.href='index.php?updated';</script>";
	} else {
		echo "<script> window.location.href='index.php?error';</script>";
	}
	
}
if(isset($_POST['remove-sms'])){
	$smsID	= $_POST['smsID'];
	$sql 	= "DELETE from mdrrmo_sms_details  where smsID='$smsID'";

	if ($mysqli->query($sql) === TRUE) {
		
		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO mdrrmo_user_history (user,actions) VALUES ('$username' , 'Delete Contact for SMS')");
		echo "<script> window.location.href='index.php?removed';</script>";
	} else {
		echo "<script> window.location.href='index.php?error';</script>";
	}
	
}
