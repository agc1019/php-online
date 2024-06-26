<?php
$db_servername = "127.0.0.1";
$db_username = "root";
$db_password = "root";
$dbname = "sql6700012";

// Create connection
$conn = new mysqli($db_servername, $db_username, $db_password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>