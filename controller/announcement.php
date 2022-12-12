<?php
include('../config/database.php');

/** Query SMS Data **/
$about	 	= $mysqli->query("SELECT * FROM announcements");


if(isset($_POST['add-announcement'])){
	$title	 	= $_POST['title'];
	$content 	= $_POST['content'];
	$aType 	 	= $_POST['aType'];
	// $countfiles = count($_FILES['files']['name']);
	// $aPhoto     = $_FILES['files']['name'];
	
	// $filename = $_FILES['files']['name'];
	// move_uploaded_file($_FILES['files']['tmp_name'],"../assets/img/news/".$filename);
	 
	 $sql			= "INSERT INTO announcements (title, content, aType)
		VALUES ('$title', '$content', '$aType')";

		if ($mysqli->query($sql) === TRUE) {
			// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO mdrrmo_user_history (user,actions) VALUES ('$username' , 'Add News and Announcement Data')");
			echo "<script> window.location.href='announcement.php?added';</script>";
		} else {
			echo "<script> window.location.href='announcement.php?error';</script>";
		}
	
}

if(isset($_POST['update-announcement'])){
	$title	 	= $_POST['title'];
	$content 	= $_POST['content'];
	$aType 	 	= $_POST['aType'];
	$announcementID = $_POST['announcementID'];
	 
	 $sql			= "UPDATE  announcements  set title = '$title', content ='$content', aType ='$aType' where announcementID='$announcementID'";
		if ($mysqli->query($sql) === TRUE) {
			// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO mdrrmo_user_history (user,actions) VALUES ('$username' , 'Update News and Announcement Data')");
			echo "<script> window.location.href='announcement.php?updated';</script>";
		} else {
			echo "<script> window.location.href='announcement.php?error';</script>";
		}
	
}

if(isset($_POST['remove-announcement'])){
	$announcementID = $_POST['announcementID'];
	 
	 $sql			= "DELETE FROM  announcements where announcementID='$announcementID'";

		if ($mysqli->query($sql) === TRUE) {
			// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO mdrrmo_user_history (user,actions) VALUES ('$username' , 'Remove News and Announcement Data')");
			echo "<script> window.location.href='announcement.php?removed';</script>";
		} else {
			echo "<script> window.location.href='announcement.php?error';</script>";
		}
	
}