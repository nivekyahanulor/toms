<?php
include('../config/database.php');
error_reporting(0);

$data  = $_SESSION['brgyID'];
$proid = base64_decode(urldecode($_GET['data']));

//** GET PURCHASE REQUEST **//
$pr	= $mysqli->query("SELECT * FROM procurement_goods where brgy_id='$data' and pro_id='$prodid'");



if(isset($_POST['process-approved'])){
	
	$data   = $_POST['data'];
	$goodid = $_POST['goodid'];
	$brgy   = $_POST['brgy'];
	
	$mysqli->query("UPDATE procurement_goods set is_approved = 1 where goodID ='$goodid'");
	
	
	
	echo "<script> window.location.href='procurement-purchase-request.php?data=".$data."&brgy=".$brgy."';</script>";

}

if(isset($_POST['process-decline'])){
	
	$data   = $_POST['data'];
	$goodid = $_POST['goodid'];
	$brgy   = $_POST['brgy'];
	
	$mysqli->query("UPDATE procurement_goods set is_approved = 2 where goodID ='$goodid'");
	
	
	
	echo "<script> window.location.href='procurement-purchase-request.php?data=".$data."&brgy=".$brgy."';</script>";

}


if(isset($_POST['process-approved-bac'])){
	
	$data   = $_POST['data'];
	$goodid = $_POST['goodid'];
	$brgy   = $_POST['brgy'];
	
	$mysqli->query("UPDATE procurement_bac_resolution set is_approved = 1 where resoID  ='$goodid'");
	
	
	
	echo "<script> window.location.href='procurement-bac-resolution.php?data=".$data."&brgy=".$brgy."';</script>";

}

if(isset($_POST['process-decline-bac'])){
	
	$data   = $_POST['data'];
	$goodid = $_POST['goodid'];
	$brgy   = $_POST['brgy'];
	
	$mysqli->query("UPDATE procurement_bac_resolution set is_approved = 2 where resoID  ='$goodid'");
	
	
	
	echo "<script> window.location.href='procurement-bac-resolution.php?data=".$data."&brgy=".$brgy."';</script>";

}

if(isset($_POST['process-approved-q'])){
	
	$data   = $_POST['data'];
	$goodid = $_POST['goodid'];
	$brgy   = $_POST['brgy'];
	
	$mysqli->query("UPDATE supplier set is_approved = 1  where  pro_id='$goodid' and brgy_id='$brgy' ");
	
	
	
	echo "<script> window.location.href='procurement-qoutation.php?data=".$data."&brgy=".$brgy."';</script>";

}

if(isset($_POST['process-decline-q'])){
	
	$data   = $_POST['data'];
	$goodid = $_POST['goodid'];
	$brgy   = $_POST['brgy'];
	
	$mysqli->query("UPDATE supplier set is_approved = 2 where  pro_id='$goodid' and brgy_id='$brgy' ");
	
	
	
	echo "<script> window.location.href='procurement-qoutation.php?data=".$data."&brgy=".$brgy."';</script>";

}

if(isset($_POST['process-approved-po'])){
	
	$data   = $_POST['data'];
	$goodid = $_POST['goodid'];
	$brgy   = $_POST['brgy'];
	
	$mysqli->query("UPDATE purchase_order set is_approved = 1  where  poID='$goodid'  ");
	
	
	
	echo "<script> window.location.href='procurement-purchase-order.php?data=".$data."&brgy=".$brgy."';</script>";

}

if(isset($_POST['process-decline-po'])){
	
	$data   = $_POST['data'];
	$goodid = $_POST['goodid'];
	$brgy   = $_POST['brgy'];
	
	$mysqli->query("UPDATE purchase_order set is_approved = 2 where  poID='$goodid' ");
	
	
	
	echo "<script> window.location.href='procurement-purchase-order.php?data=".$data."&brgy=".$brgy."';</script>";

}

if(isset($_POST['process-approved-pa'])){
	
	$data   = $_POST['data'];
	$goodid = $_POST['goodid'];
	$brgy   = $_POST['brgy'];
	
	$mysqli->query("UPDATE pa_report set is_approved = 1  where  paID='$goodid'");
	
	
	
	echo "<script> window.location.href='procurement-pa-receipt.php?data=".$data."&brgy=".$brgy."';</script>";

}

if(isset($_POST['process-decline-pa'])){
	
	$data   = $_POST['data'];
	$goodid = $_POST['goodid'];
	$brgy   = $_POST['brgy'];
	
	$mysqli->query("UPDATE pa_report set is_approved = 2 where  paID='$goodid'");
	
	
	
	echo "<script> window.location.href='procurement-pa-receipt.php?data=".$data."&brgy=".$brgy."';</script>";

}


if(isset($_POST['process-approved-ai'])){
	
	$data   = $_POST['data'];
	$goodid = $_POST['goodid'];
	$brgy   = $_POST['brgy'];
	
	$mysqli->query("UPDATE ai_report set is_approved = 1  where  aiID='$goodid'");
	
	
	
	echo "<script> window.location.href='procurement-ai.php?data=".$data."&brgy=".$brgy."';</script>";

}

if(isset($_POST['process-decline-ai'])){
	
	$data   = $_POST['data'];
	$goodid = $_POST['goodid'];
	$brgy   = $_POST['brgy'];
	
	$mysqli->query("UPDATE ai_report set is_approved = 2 where  aiID='$goodid'");
	
	
	
	echo "<script> window.location.href='procurement-ai.php?data=".$data."&brgy=".$brgy."';</script>";

}

if(isset($_POST['process-approved-dv'])){
	
	$data   = $_POST['data'];
	$goodid = $_POST['goodid'];
	$brgy   = $_POST['brgy'];
	
	$mysqli->query("UPDATE dv_report set is_approved = 1  where  aiID='$goodid'");
	
	
	
	echo "<script> window.location.href='procurement-dv.php?data=".$data."&brgy=".$brgy."';</script>";

}

if(isset($_POST['process-decline-dv'])){
	
	$data   = $_POST['data'];
	$goodid = $_POST['goodid'];
	$brgy   = $_POST['brgy'];
	
	$mysqli->query("UPDATE dv_report set is_approved = 2 where  aiID='$goodid'");
	
	
	
	echo "<script> window.location.href='procurement-dv.php?data=".$data."&brgy=".$brgy."';</script>";

}