<?php
session_start();
include ("connection.php");
require "vendor/autoload.php";

use GeminiAPI\Client;
use GeminiAPI\Resources\Parts\TextPart;

$QnApost = $_POST['result'];
$collection_id = $_POST['collection_id'];
$test_name = $_POST['test_name'];
$counter = $_POST['counter'];

$decodedArray = json_decode($QnApost, true);

//Accumulating the prompt
$prompt = 'Create an exactly '. $counter .' questions with answers each Using these passages [';

foreach ($decodedArray as $key => $value) {
    $sql = "SELECT b.text_id, a.entry_id, b.text_generated, a.title_id
            FROM title_entries a
            INNER JOIN entry_texts b ON a.text_id = b.text_id where a.entry_id ='$value'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $title_id = $row['title_id'];
    $passage = $row['text_generated'];
    $prompt = $prompt . $passage . ',';
}
$prompt = $prompt . '] return the prompt with these format:{"question":[question here seperated by comma with quotation],"answer":[answer on each question separated by comma with quotation]} do not remove the bracket at the final.';

//Prompting

$client = new Client("AIzaSyCZGsHy_foVvgC1EQGONy4HdEiYswFVM0Q");
$response = $client->geminiPro()->generateContent(
    new TextPart($prompt),
);

$value = $response->text();
$decodedQnA = json_decode($value, true);
$count = 0;
foreach ($decodedQnA['question'] as $value) {
    $count = $count + 1;

}

$test = "Fill in the Blanks";
//Creating new test_name
$time = date('y-m-d');
$sql = "INSERT INTO test(collection_id, title_id, test_name, test_type, no_of_items, date_created, last_modified) VALUES('$collection_id','$title_id','$test_name','Fill in the Blanks','$count','$time','$time')";
mysqli_query($conn, $sql);

$sql = "SELECT last_insert_id() AS test_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$test_id = $row['test_id'];
$_SESSION['test_id'] = $test_id;

 
// Decoding and inputting to table


foreach ($decodedQnA['question'] as $value) {
    $sql = "INSERT INTO question_set(test_id, question) VALUES(?,?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'is', $test_id, $value);
    mysqli_stmt_execute($stmt);

}

foreach ($decodedQnA['answer'] as $value) {
    $sql = "INSERT INTO answer_set(test_id, answer) VALUES(?,?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'is', $test_id, $value);
    mysqli_stmt_execute($stmt);
}

$sql = "SELECT COUNT(test_id) as test_count FROM test where collection_id='$collection_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$_SESSION['test_count'] = $row['test_count'];

echo "Success";