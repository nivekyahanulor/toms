<?php
include('../config/database.php');

$awards	 	= $mysqli->query("SELECT * FROM mdrrmo_awards");

if(isset($_POST['add-awards'])){
	
	$title = $_POST['title'];
	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $image_name = addslashes($_FILES['image']['name']);
    $image_size = getimagesize($_FILES['image']['tmp_name']);
    move_uploaded_file($_FILES["image"]["tmp_name"], "../assets/img/awards/" . $_FILES["image"]["name"]);
	$location   =  $_FILES["image"]["name"];
	$sql		= "INSERT INTO mdrrmo_awards (awardTitle, awards_image)
		VALUES ('$title', '$location')";
	if ($mysqli->query($sql) === TRUE) {
			// SAVE USER ACTION //
			$username		= $_SESSION['username'];
			$mysqli->query("INSERT INTO mdrrmo_user_history (user,actions) VALUES ('$username' , 'Add Awards Data')");
			$mysqli->query("INSERT INTO mdrrmo_user_history (user,actions) VALUES ('$username' , 'Remove Album Data')");
			echo "<script> window.location.href='awards.php?added';</script>";
	} else {
		echo "<script> window.location.href='awards.php?error';</script>";
	}
}

if(isset($_POST['remove-awards'])){
	
	$awardsID = $_POST['awardsID'];
	
	$sql		= "DELETE from mdrrmo_awards where awardsID='$awardsID'";
	if ($mysqli->query($sql) === TRUE) {
			// SAVE USER ACTION //
			$username		= $_SESSION['username'];
			$mysqli->query("INSERT INTO mdrrmo_user_history (user,actions) VALUES ('$username' , 'Removed Awards Data')");
			echo "<script> window.location.href='awards.php?removed';</script>";
	} else {
		echo "<script> window.location.href='awards.php?error';</script>";
	}
}