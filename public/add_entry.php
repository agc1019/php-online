<?php

session_start();

include ('./connection.php');

$text_scanned = $_POST['text_scanned'];
$text_generated = $_POST['text_generated'];
$collection_id = $_SESSION['collection_id'];
$title_id = $_POST['title_id'];
$page = $_POST['page'];
$entry_name = $_POST['entry_name'];
$email = $_SESSION['email'];
$_SESSION['title_id'] = $title_id;
if ($_POST['feature_chosen'] == '#simplify')
    $feature_chosen = "Simplify";
else if ($_POST['feature_chosen'] == '#paraphrase')
    $feature_chosen = "Paraphrase";
else if ($_POST['feature_chosen'] == '#translate')
    $feature_chosen = "Translate";

$sql = "INSERT INTO entry_texts (feature_chosen, text_scanned, text_generated) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 'sss', $feature_chosen, $text_scanned, $text_generated);
mysqli_stmt_execute($stmt);
    

$sql = "SELECT last_insert_id() AS text_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$text_id = $row["text_id"];
$sql = "INSERT INTO title_entries(title_id,entry_name,page,text_id) VALUES('$title_id','$entry_name','$page','$text_id')";
mysqli_query($conn, $sql);


$sql = "SELECT * from user_collection WHERE user_email='$email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if($row['num_of_entries'] != null){
    $sql = "UPDATE user_collection SET num_of_entries = num_of_entries + 1 WHERE user_email='$email'";
    mysqli_query($conn, $sql);
}else{
    $sql = "UPDATE user_collection SET num_of_entries = 1 WHERE user_email='$email'";
mysqli_query($conn, $sql);
}





$sql = "SELECT * from user_collection WHERE user_email='$email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$_SESSION['num_of_entries'] = $row['num_of_entries'];
?>