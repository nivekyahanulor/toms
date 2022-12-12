<?php
include('../config/database.php');

$admin	 	= $mysqli->query("SELECT * FROM adminaccount");
$history	= $mysqli->query("SELECT * FROM user_history");
if(isset($_POST['add-user'])){
	
	$name       = $_POST['name'];
	$user_name  = $_POST['user_name'];
	$password   = md5($_POST['password']);
	
	$sql		= "INSERT INTO adminaccount (admin_name,username,password)
		VALUES ('$name','$user_name','$password')";
	if ($mysqli->query($sql) === TRUE) {
					// SAVE USER ACTION //
					$username		= $_SESSION['username'];
					$mysqli->query("INSERT INTO user_history (user,actions) VALUES ('$username' , 'Add User $user_name')");
					echo "<script> window.location.href='users.php?added';</script>";
				} else {
					echo "<script> window.location.href='users.php?error';</script>";
	}
}
if(isset($_POST['update-user'])){
	
	$name       = $_POST['name'];
	$user_name  = $_POST['user_name'];
	$password   = md5($_POST['password']);
	$accountID  = $_POST['accountID'];

	$sql		= "UPDATE  adminaccount SET admin_name='$name',username ='$user_name',password ='$password' where accountID  ='$accountID'";
	if ($mysqli->query($sql) === TRUE) {
			// SAVE USER ACTION //
			$username		= $_SESSION['username'];
			$mysqli->query("INSERT INTO user_history (user,actions) VALUES ('$username' , 'Update User $user_name')");
			echo "<script> window.location.href='users.php?updated';</script>";
		} else {
			echo "<script> window.location.href='users.php?error';</script>";
		}
}

if(isset($_POST['remove-user'])){
	
	$accountID = $_POST['accountID'];
	
	$sql		= "DELETE from adminaccount where accountID='$accountID'";
	if ($mysqli->query($sql) === TRUE) {
					// SAVE USER ACTION //
					$username		= $_SESSION['username'];
					$mysqli->query("INSERT INTO user_history (user,actions) VALUES ('$username' , 'Removed User')");
					echo "<script> window.location.href='users.php?removed';</script>";
				} else {
					echo "<script> window.location.href='users.php?error';</script>";
				}
}

if(isset($_POST['disable-user'])){
	
	$accountID = $_POST['accountID'];
	
	$sql		= "update  adminaccount set isActive = 1 where accountID='$accountID'";
	if ($mysqli->query($sql) === TRUE) {
					// SAVE USER ACTION //
					$username		= $_SESSION['username'];
					$mysqli->query("INSERT INTO user_history (user,actions) VALUES ('$username' , 'Disable User')");
					echo "<script> window.location.href='users.php?disbaled';</script>";
				} else {
					echo "<script> window.location.href='users.php?error';</script>";
				}
}

if(isset($_POST['enable-user'])){
	
	$accountID = $_POST['accountID'];
	
	$sql		= "update  adminaccount set isActive = 0 where accountID='$accountID'";
	if ($mysqli->query($sql) === TRUE) {
					// SAVE USER ACTION //
					$username		= $_SESSION['username'];
					$mysqli->query("INSERT INTO user_history (user,actions) VALUES ('$username' , 'Disable User')");
					echo "<script> window.location.href='users.php?enabled';</script>";
				} else {
					echo "<script> window.location.href='users.php?error';</script>";
				}
}