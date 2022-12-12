<?php

	session_start();
	include('../config/database.php');
	
	$smsID	= $_POST['smsID'];
	$sql 	= "DELETE from mdrrmo_sms_details  where smsID='$smsID'";

	if ($mysqli->query($sql) === TRUE) {
		
		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO mdrrmo_user_history (user,actions) VALUES ('$username' , 'Delete Contact for SMS')");

		header("location:index.php?removed");
	} else {
		header("location:index.php?error");
	}