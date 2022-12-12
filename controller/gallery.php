<?php
include('../config/database.php');

$album	 	= $mysqli->query("SELECT * FROM mdrrmo_album");

$data 		= $_GET['data'];
$gallery	= $mysqli->query("SELECT * FROM mdrrmo_gallery where albumID='$data'");

	
if(isset($_POST['add-album'])){
	
	$albumName =  $_POST['albumName'];
	$sql	   = "INSERT INTO mdrrmo_album (albumName)
		VALUES ('$albumName')";
	if ($mysqli->query($sql) === TRUE) {
		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO mdrrmo_user_history (user,actions) VALUES ('$username' , 'Add Album $albumName Data')");
		echo "<script> window.location.href='gallery.php?added';</script>";
	} else {
		echo "<script> window.location.href='gallery.php?error';</script>";
	}
	
}

if(isset($_POST['remove-album'])){
	$albumID =  $_POST['albumID'];
	$sql	   = "DELETE FROM mdrrmo_album where albumID='$albumID'";
	if ($mysqli->query($sql) === TRUE) {
		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO mdrrmo_user_history (user,actions) VALUES ('$username' , 'Remove Album Data')");
		echo "<script> window.location.href='gallery.php?removed';</script>";
	} else {
		echo "<script> window.location.href='gallery.php?error';</script>";
	}
	
}

if(isset($_POST['remove-gallery'])){
	$galleryID   =  $_POST['id'];
	$name 		 =  $_POST['name'];
	$id          =  $_POST['galleryID'];
	$sql	   = "DELETE FROM mdrrmo_gallery where galleryID='$id'";
	if ($mysqli->query($sql) === TRUE) {
		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO mdrrmo_user_history (user,actions) VALUES ('$username' , 'Remove Image Gallery')");
		echo "<script> window.location.href='album_gallery.php?data=".$galleryID."&name=".$name."';</script>";
	} else {
		echo "<script> window.location.href='album_gallery.php?error&data=".$galleryID."&name=".$name."';</script>";
	}
	
}
if(isset($_POST['update-album'])){
	$albumID   =  $_POST['albumID'];
	$albumName =  $_POST['albumName'];
	$sql	   = "UPDATE  mdrrmo_album set albumName='$albumName' where albumID='$albumID'";
	if ($mysqli->query($sql) === TRUE) {
		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO mdrrmo_user_history (user,actions) VALUES ('$username' , 'Update Album $albumName')");
		echo "<script> window.location.href='gallery.php?updated';</script>";
	} else {
		echo "<script> window.location.href='gallery.php?error';</script>";
	}
	
}
if(isset($_POST['upload-gallery'])){

	 // Count total files
	 $countfiles = count($_FILES['image']['name']);

	$galleryID   =  $_POST['id'];
	$name 		 =  $_POST['name'];

	for($i=0;$i<$countfiles;$i++){
		$location   =  $_FILES["image"]["name"][$i];
		$image = addslashes(file_get_contents($_FILES['image']['tmp_name'][$i]));
		$image_name = addslashes($_FILES['image']['name'][$i]);
		$image_size = getimagesize($_FILES['image']['tmp_name'][$i]);
		if(move_uploaded_file($_FILES["image"]["tmp_name"][$i], "../assets/img/gallery/" . $_FILES["image"]["name"][$i])){
		
			$sql	    = "INSERT INTO mdrrmo_gallery (albumID,gPhoto) VALUES ('$galleryID' ,'$location')";
			if ($mysqli->query($sql) === TRUE) {
				// SAVE USER ACTION //
				$username		= $_SESSION['username'];
				$mysqli->query("INSERT INTO mdrrmo_user_history (user,actions) VALUES ('$username' , 'Upload Photo Gallery')");
				echo "<script> window.location.href='album_gallery.php?data=".$galleryID."&name=".$name."';</script>";
			} else {
				echo "<script> window.location.href='album_gallery.php?error&data=".$galleryID."&name=".$name."';</script>";
			}
		}
	}

	
	
}