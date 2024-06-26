<?php

session_start();

include ("./connection.php");

$text_id = $_POST['text_id'];
$email = $_SESSION['email'];

$sql = "DELETE FROM title_entries where text_id='$text_id'";
mysqli_query($conn, $sql);
$sql = "DELETE FROM entry_texts where text_id='$text_id'";
mysqli_query($conn, $sql);
$sql = "UPDATE user_collection SET num_of_entries = num_of_entries - 1 WHERE user_email='$email'";
mysqli_query($conn, $sql);
$sql = "SELECT * from user_collection where user_email='$email'";
$result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $_SESSION['num_of_entries'] = $row['num_of_entries'];