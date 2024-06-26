<?php

session_start();

include('./connection.php');


$questions = $_POST['questions'];
$answers = $_POST['answers'];
$count = $_POST['count'];
$collection_id = $_SESSION['collection_id'];
$title_id = $_POST['title_id'];
$test_name = $_POST['test_name'];

//Creating new Test
$timestamp = time();
$currentDate = gmdate('Y-m-d', $timestamp);
$sql = "INSERT INTO test(collection_id, title_id, test_name, test_type, no_of_items, date_created, last_modified) VALUES('$collection_id','$title_id','$test_name','Fill in the Blanks','$count','$currentDate','$currentDate')";
mysqli_query($conn, $sql);

$sql = "SELECT last_insert_id() AS test_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$test_id = $row['test_id'];
$_SESSION['test_id'] = $test_id;

$quest = json_decode($questions,true);

$ans = json_decode($answers,true);

//Adding Questions
foreach ($quest as $question) {
    $sql = "INSERT INTO question_set(test_id, question) VALUES(?,?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'is', $test_id, $question);
    mysqli_stmt_execute($stmt);

}

foreach ($ans as $answer) {
    $sql = "INSERT INTO answer_set(test_id, answer) VALUES(?,?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'is', $test_id, $answer);
    mysqli_stmt_execute($stmt);
}
$sql = "SELECT COUNT(test_id) as test_count FROM test where collection_id='$collection_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$_SESSION['test_count'] = $row['test_count'];
?>