<?php
include('../config/database.php');

$announcements	= $mysqli->query("SELECT * FROM announcements limit 5");
$about	 	    = $mysqli->query("SELECT * FROM aboutus");
