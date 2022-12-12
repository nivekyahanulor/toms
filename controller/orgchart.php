<?php
session_start();
include('../config/database.php');

$orgchart	 	= $mysqli->query("SELECT * FROM mdrrmo_org_chart");

if(isset($_POST['add-orgchart'])){
	
	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $image_name = addslashes($_FILES['image']['name']);
    $image_size = getimagesize($_FILES['image']['tmp_name']);
    move_uploaded_file($_FILES["image"]["tmp_name"], "../assets/img/orgchart/" . $_FILES["image"]["name"]);
	$location   =  $_FILES["image"]["name"];
	$sql		= "INSERT INTO mdrrmo_org_chart (orgPhoto)
		VALUES ('$location')";
	if ($mysqli->query($sql) === TRUE) {
			// SAVE USER ACTION //
			$username		= $_SESSION['username'];
			$mysqli->query("INSERT INTO mdrrmo_user_history (user,actions) VALUES ('$username' , 'Add Organizational Chart Data')");
			echo "<script> window.location.href='orgchart.php?added';</script>";
	} else {
		echo "<script> window.location.href='orgchart.php?error';</script>";
	}
}

if(isset($_POST['remove-orgchart'])){
	
	$orgID = $_POST['orgID'];
	
	$sql		= "DELETE from mdrrmo_org_chart where orgID='$orgID'";
	if ($mysqli->query($sql) === TRUE) {
			// SAVE USER ACTION //
			$username		= $_SESSION['username'];
			$mysqli->query("INSERT INTO mdrrmo_user_history (user,actions) VALUES ('$username' , 'Removed Organizational Chart Data')");
			echo "<script> window.location.href='orgchart.php?removed';</script>";
	} else {
		echo "<script> window.location.href='orgchart.php?error';</script>";
	}
}