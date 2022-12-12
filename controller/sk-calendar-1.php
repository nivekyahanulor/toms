<?php
include('../config/database.php');
$data    = $_SESSION['brgyID'];

$events	 = $mysqli->query("SELECT * FROM events where brgy_id='$data'");