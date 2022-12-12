<?php
session_start();
if(!isset($_SESSION['brgyID'])){
header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>SK : ACCOUNT</title>
  <link rel="stylesheet" href="../assets/admin/css/app.min.css">
  <link rel="stylesheet" href="../assets/admin/bundles/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../assets/admin/css/admin.css">
  <link rel="stylesheet" href="../assets/admin/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="../assets/admin/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/admin/bundles/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="../assets/admin/bundles/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="../assets/admin/css/components.css">
  <link rel="stylesheet" href="../assets/admin/bundles/fullcalendar/fullcalendar.min.css">

  <link rel='shortcut icon' type='image/x-icon' href='../assets/admin/img/favicon.ico' />
  
</head>