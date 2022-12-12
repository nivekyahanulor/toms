<?php
// $mysqli = new mysqli("localhost","u582317762_tomscarmona","@Tomscarmona2022","u582317762_tomscarmona");
$mysqli = new mysqli("localhost","root","","tomsdb");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

