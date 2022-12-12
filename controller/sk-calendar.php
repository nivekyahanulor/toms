<?php
include('../config/database.php');
$data    = $_SESSION['brgyID'];

$events1 = $mysqli->query("SELECT * FROM events where brgy_id='$data'");

if(isset($_POST['add-event'])){
	
	$title  = $_POST['title'];
	$brgyid = $_SESSION['brgyID'];
	$start  = $_POST['start'];
	$end    = $_POST['end'];
	
	$sql	 = "INSERT INTO events (title,datetime_start,datetime_end,status,brgy_id)
		VALUES ('$title','$start','$end',1,'$brgyid')";
		
	if ($mysqli->query($sql) === TRUE) {
		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO user_history (user,actions , is_sk , brgy_id) VALUES ('$username' , 'Add Event Schedule Barangay $brgyid' , 1 , '$brgyid')");
			echo "<script> window.location.href='calendar.php?added';</script>";
		} else {
			echo "<script> window.location.href='calendar.php?error';</script>";
	}
	
}


if(isset($_POST['edit-event'])){
	
	$title  = $_POST['title'];
	$brgyid = $_SESSION['brgyID'];
	$start  = $_POST['start'];
	$end    = $_POST['end'];
	$id     = $_POST['id'];
	$status = $_POST['status'];
	
	$sql	 = "UPDATE events SET title = '$title', datetime_start='$start', datetime_end = '$end' , status = '$status' where ID ='$id'";
	
	if ($mysqli->query($sql) === TRUE) {
		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO user_history (user,actions , is_sk , brgy_id) VALUES ('$username' , 'Update Event Schedule Barangay $brgyid' , 1 , '$brgyid')");
			echo "<script> window.location.href='calendar.php?updated';</script>";
		} else {
			echo "<script> window.location.href='calendar.php?error';</script>";
	}
	
}



if(isset($_POST['remove-event'])){
	
	$brgyid = $_SESSION['brgyID'];
	$id     = $_POST['id'];
	
	$sql	 = "DELETE FROM events where ID ='$id'";
	
	if ($mysqli->query($sql) === TRUE) {
		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO user_history (user,actions , is_sk , brgy_id) VALUES ('$username' , 'Remove Event Schedule Barangay $brgyid' , 1 , '$brgyid')");
			echo "<script> window.location.href='calendar.php?removed';</script>";
		} else {
			echo "<script> window.location.href='calendar.php?error';</script>";
	}
	
}

