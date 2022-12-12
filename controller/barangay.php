<?php
session_start();
include('../config/database.php');

$admin	 	= $mysqli->query("SELECT * FROM skaccount");
//$history	= $mysqli->query("SELECT * FROM mdrrmo_user_history");
if(isset($_POST['add-user'])){
	
	$first_name = $_POST['first_name'];
	$last_name  = $_POST['last_name'];
	$email      = $_POST['email'];
	$user_name  = $_POST['user_name'];
	$password   = md5($_POST['password']);
	
	$sql		= "INSERT INTO mdrrmo_admin (first_name,last_name,email,user_name,password)
		VALUES ('$first_name','$last_name','$email','$user_name','$password')";
	if ($mysqli->query($sql) === TRUE) {
					// SAVE USER ACTION //
					$username		= $_SESSION['username'];
					$mysqli->query("INSERT INTO mdrrmo_user_history (user,actions) VALUES ('$username' , 'Add User $user_name')");
					echo "<script> window.location.href='users.php?added';</script>";
				} else {
					echo "<script> window.location.href='users.php?error';</script>";
	}
}
if(isset($_POST['update-user'])){
	
	$first_name = $_POST['first_name'];
	$last_name  = $_POST['last_name'];
	$user_name  = $_POST['user_name'];
	$password   = md5($_POST['password']);
	$accountID  = $_POST['accountID'];
	$email      = $_POST['email'];

	$sql		= "UPDATE  mdrrmo_admin SET first_name='$first_name',email='$email',last_name ='$last_name',user_name ='$user_name',password ='$password' where accountID='$accountID'";
	if ($mysqli->query($sql) === TRUE) {
			// SAVE USER ACTION //
			$username		= $_SESSION['username'];
			$mysqli->query("INSERT INTO mdrrmo_user_history (user,actions) VALUES ('$username' , 'Update User $user_name')");
			echo "<script> window.location.href='users.php?updated';</script>";
		} else {
			echo "<script> window.location.href='users.php?error';</script>";
		}
}

if(isset($_POST['remove-user'])){
	
	$accountID = $_POST['accountID'];
	
	$sql		= "DELETE from mdrrmo_admin where accountID='$accountID'";
	if ($mysqli->query($sql) === TRUE) {
					// SAVE USER ACTION //
					$username		= $_SESSION['username'];
					$mysqli->query("INSERT INTO mdrrmo_user_history (user,actions) VALUES ('$username' , 'Removed User')");
					echo "<script> window.location.href='users.php?removed';</script>";
				} else {
					echo "<script> window.location.href='users.php?error';</script>";
				}
}

if(isset($_POST['disable-user'])){
	
	$accountID = $_POST['accountID'];
	
	$sql		= "update  mdrrmo_admin set isActive = 1 where accountID='$accountID'";
	if ($mysqli->query($sql) === TRUE) {
					// SAVE USER ACTION //
					$username		= $_SESSION['username'];
					$mysqli->query("INSERT INTO mdrrmo_user_history (user,actions) VALUES ('$username' , 'Disable User')");
					echo "<script> window.location.href='users.php?disbaled';</script>";
				} else {
					echo "<script> window.location.href='users.php?error';</script>";
				}
}

if(isset($_POST['enable-user'])){
	
	$accountID = $_POST['accountID'];
	
	$sql		= "update  mdrrmo_admin set isActive = 0 where accountID='$accountID'";
	if ($mysqli->query($sql) === TRUE) {
					// SAVE USER ACTION //
					$username		= $_SESSION['username'];
					$mysqli->query("INSERT INTO mdrrmo_user_history (user,actions) VALUES ('$username' , 'Disable User')");
					echo "<script> window.location.href='users.php?enabled';</script>";
				} else {
					echo "<script> window.location.href='users.php?error';</script>";
				}
}