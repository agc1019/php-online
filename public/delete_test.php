<?php

session_start();
include ("./connection.php");

$test_id = $_POST['test_id'];
$collection_id = $_SESSION['collection_id'];

$sql = "DELETE FROM answer_set WHERE test_id='$test_id'";
mysqli_query($conn, $sql);
$sql = "DELETE FROM question_set WHERE test_id='$test_id'";
mysqli_query($conn, $sql);
$sql = "DELETE FROM test_score WHERE test_id='$test_id'";
mysqli_query($conn, $sql);
$sql = "DELETE FROM test WHERE test_id='$test_id'";
mysqli_query($conn, $sql);


$sql = "SELECT COUNT(test_id) as test_count FROM test where collection_id='$collection_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$_SESSION['test_count'] = $row['test_count'];