<?php
include('../config/database.php');

$about	 	= $mysqli->query("SELECT * FROM aboutus");


if(isset($_POST['update-about'])){
	$aboutid 		= $_POST['aboutid'];
	$content 		= $_POST['content'];
	$title 		    = $_POST['title'];
	$sql 			= "UPDATE aboutus set content='$content', title='$title' where aboutID ='$aboutid'";

	if ($mysqli->query($sql) === TRUE) {
		// SAVE USER ACTION //
		$username		= $_SESSION['username'];
		$mysqli->query("INSERT INTO user_history (user,actions) VALUES ('$username' , 'Update About Us information')");
		echo "<script> window.location.href='aboutus.php?updated';</script>";

	} else {
		echo "<script> window.location.href='aboutus.php?error';</script>";
	}
	
}