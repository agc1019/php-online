<?php

session_start();

include ("./connection.php");


$title = $_POST['title'];
$author = $_POST['author'];
$type = $_POST['type'];
$genre = $_POST['genre'];
$collection_id = $_POST['collection_id'];
$email = $_POST['email'];
$sql = "SELECT * FROM user_collection WHERE user_email = '$email'";
$time = date('Y-m-d');
$result = $conn->query($sql);
 
if ($result->num_rows > 0) {

  $sql = "UPDATE user_collection SET num_of_titles = num_of_titles + 1 WHERE user_email='$email'";

  $result = $conn->query($sql);

  $sql = "INSERT INTO collection_titles (collection_id, title_name, author, type, genre, last_updated) VALUES (?,?,?,?,?,?)";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, 'isssss', $collection_id,$title,$author,$type,$genre,$time);
  mysqli_stmt_execute($stmt);
  
  $sql = "SELECT last_insert_id() AS title_id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $_SESSION['title_id'] = $row['title_id'];
  
  $sql = "SELECT * from user_collection WHERE user_email='$email'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $_SESSION['num_of_titles'] = $row['num_of_titles'];
  echo "Success";

} else {
  $sql = "INSERT INTO user_collection (user_email,num_of_titles,num_of_entries,last_updated) VALUES ('$email',1,NULL,'$time')";
  $result = $conn->query($sql);
  $sql = "SELECT collection_id FROM user_collection where user_email='$email'";
  $result = $conn->query($sql);
  $row = mysqli_fetch_assoc($result);
  $collection_id = $row['collection_id'];
  $sql = "INSERT INTO collection_titles (collection_id, title_name, author, type, genre, last_updated) VALUES (?,?,?,?,?,?)";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, 'isssss', $collection_id,$title,$author,$type,$genre,$time);
  mysqli_stmt_execute($stmt);

  $_SESSION['collection_id'] = $collection_id;

  $sql = "SELECT last_insert_id() AS title_id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $_SESSION['title_id'] = $row['title_id'];

  $sql = "SELECT * from user_collection WHERE user_email='$email'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $_SESSION['num_of_titles'] = $row['num_of_titles'];
  echo "Success";

}

?>