<?php

session_start();

include ("./connection.php");

$title_id = $_POST['title_id'];
$email = $_SESSION['email'];
$collection_id = $_SESSION['collection_id'];

$sql = "SELECT * from title_entries WHERE title_id ='$title_id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $text_id = $row['text_id'];
        $sql = "DELETE FROM title_entries where text_id='$text_id'";
        mysqli_query($conn, $sql);
        $sql = "DELETE FROM entry_texts where text_id='$text_id'";
        mysqli_query($conn, $sql);
        $sql = "UPDATE user_collection SET num_of_entries = num_of_entries - 1 WHERE user_email='$email'";
        mysqli_query($conn, $sql);
    }
}

$sql = "SELECT * from test WHERE title_id ='$title_id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $test_id = $row['test_id'];
        $sql = "DELETE FROM answer_set WHERE test_id='$test_id'";
        mysqli_query($conn, $sql);
        $sql = "DELETE FROM question_set WHERE test_id='$test_id'";
        mysqli_query($conn, $sql);
        $sql = "DELETE FROM test_score WHERE test_id='$test_id'";
        mysqli_query($conn, $sql);
        $sql = "DELETE FROM test WHERE test_id='$test_id'";
        mysqli_query($conn, $sql);
    }
    $sql = "SELECT COUNT(test_id) as test_count FROM test where collection_id='$collection_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$_SESSION['test_count'] = $row['test_count'];
}



$sql = "DELETE from collection_titles WHERE title_id ='$title_id'";
    mysqli_query($conn, $sql);
    $sql = "UPDATE user_collection SET num_of_titles = num_of_titles - 1 WHERE user_email='$email'";
    mysqli_query($conn, $sql);

$sql = "SELECT * from user_collection where user_email='$email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$_SESSION['num_of_entries'] = $row['num_of_entries'];
$_SESSION['num_of_titles'] = $row['num_of_titles'];
$_SESSION['title_id'] = 0;

