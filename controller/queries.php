<?php

/** for front-end data **/
$aboutus	 	= $mysqli->query("SELECT * FROM mdrrmo_aboutus");
$announcement 	= $mysqli->query("SELECT * FROM mdrrmo_announcements");
$album 			= $mysqli->query("SELECT * FROM mdrrmo_album");
$gallery		= $mysqli->query("SELECT * FROM mdrrmo_gallery");
$awards 		= $mysqli->query("SELECT * FROM mdrrmo_awards");
$organizational = $mysqli->query("SELECT * FROM mdrrmo_org_chart");
$contactus 		= $mysqli->query("SELECT * FROM mdrrmo_contact_us");
$location 		= $mysqli->query("SELECT * FROM mdrrmo_gelocation");
/** end front-end data **/

