<?php
session_start();
include('../config/database.php');

$contactus	 	= $mysqli->query("SELECT * FROM mdrrmo_contact_us");

if(isset($_POST['add-new-contact'])){
	
	$contact_name 	 = $_POST['contact_name'];
	$contact_details = $_POST['contact_details'];
	$position 		 = $_POST['position'];

	$sql		= "INSERT INTO mdrrmo_contact_us (contact_name,contact_details,position)
		VALUES ('$contact_name','$contact_details','$position')";
	if ($mysqli->query($sql) === TRUE) {
			// SAVE USER ACTION //
			$username		= $_SESSION['username'];
			$mysqli->query("INSERT INTO mdrrmo_user_history (user,actions) VALUES ('$username' , 'Add Contact $contact_name')");
			echo "<script> window.location.href='contactus.php?added';</script>";
	} else {
		echo "<script> window.location.href='contactus.php?error';</script>";
	}
}
if(isset($_POST['update-contact'])){
	
	$contact_name 	 = $_POST['contact_name'];
	$contact_details = $_POST['contact_details'];
	$contactID 		 = $_POST['contactID'];
	$position 		 = $_POST['position'];

	$sql		= "UPDATE  mdrrmo_contact_us SET contact_name='$contact_name',contact_details ='$contact_details',position ='$position' where contactID='$contactID'";
	if ($mysqli->query($sql) === TRUE) {
			// SAVE USER ACTION //
			$username		= $_SESSION['username'];
			$mysqli->query("INSERT INTO mdrrmo_user_history (user,actions) VALUES ('$username' , 'Update Contact $contact_name')");	
			echo "<script> window.location.href='contactus.php?updated';</script>";
	} else {
		echo "<script> window.location.href='contactus.php?error';</script>";
	}
}

if(isset($_POST['remove-contact'])){
	
	$contactID = $_POST['contactID'];
	
	$sql		= "DELETE from mdrrmo_contact_us where contactID='$contactID'";
	if ($mysqli->query($sql) === TRUE) {
					// SAVE USER ACTION //
					$username		= $_SESSION['username'];
					$mysqli->query("INSERT INTO mdrrmo_user_history (user,actions) VALUES ('$username' , 'Removed Contact ')");	
					echo "<script> window.location.href='contactus.php?removed';</script>";
				} else {
					echo "<script> window.location.href='contactus.php?error';</script>";
				}
}