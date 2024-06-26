<?php

session_start();
include ("./connection.php");
 

$questions = $_POST['questions'];
$questions_id = $_POST['questions_id'];
$answers = $_POST['answers'];
$answers_id = $_POST['answers_id'];
$delete_question = $_POST['delete_question'];
$delete_answer = $_POST['delete_answer'];
$test_id = $_SESSION['test_id'];


$ans = json_decode($answers);
$quest = json_decode($questions);
$quest_id = json_decode($questions_id);
$ans_id = json_decode($answers_id);
$del_quest = json_decode($delete_question);
$del_ans = json_decode($delete_answer);
if($del_quest != null){
foreach ($del_quest as $questt) {
    $sql = "DELETE FROM question_set WHERE item_no='$questt'";
    $result = mysqli_query($conn, $sql);
}
}
if($del_ans != null){
foreach ($del_ans as $anss) {
    $sql = "DELETE FROM answer_set WHERE item_no='$anss'";
    $result = mysqli_query($conn, $sql);
}
}

foreach ($quest_id as $index => $question) {
    if ($quest[$index] >= 0 && $quest_id[$index] >= 0 && $ans[$index] >= 0 && $ans_id[$index] >= 0) {
        $q = $quest[$index];
        $qi = $quest_id[$index];
        $a = $ans[$index];
        $ai = $ans_id[$index];
    }

    if ($qi != "0" && $ai != "0") {
        $sql = "UPDATE question_set SET question=? WHERE item_no=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'si', $q, $qi);
        mysqli_stmt_execute($stmt);


        $sql = "UPDATE answer_set SET answer=? WHERE item_no=?";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'si', $a, $ai);
        mysqli_stmt_execute($stmt);

    } else if ($qi == "0" && $ai == "0") {
        //QUESTION
        $sql = "INSERT INTO question_set(test_id, question) VALUES(?,?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'is', $test_id, $q);
        mysqli_stmt_execute($stmt);
        //ANSWER
        $sql = "INSERT INTO answer_set(test_id, answer) VALUES(?,?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'is', $test_id, $a);
        mysqli_stmt_execute($stmt);
    }
    echo $quest_id[$index];
}
?>