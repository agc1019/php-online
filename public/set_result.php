<?php

session_start();

$_SESSION['test_data'] = $_POST['question'];
$_SESSION['answers'] = $_POST['answers'];

$data = $_SESSION['test_data'];

$answer = $_SESSION['answers'];

$ans = json_decode($answer);

$right_answer= 0;
foreach ($data['questions'] as $index => $question) {
    $condition = false;
    if ($data['questions'][$index]['type'] == 'multiple_choice') {
        $condition = false;
        foreach ($data['questions'][$index]['choices'] as $choiceIndex => $choice) {
            if ($ans[$index] == $choice['option']) {
                if ($condition == false) {
                    if ($choice['is_correct'] == "true") {
                        $div = "test-container";
                        $right_answer++;
                        $condition = true;
                    }
                }
            }
        }
    } else {
        if ($ans[$index] == $data['questions'][$index]['answer']) {
            $right_answer++;
        } 
    }
    $total = $index;
}
$total = $total + 1;

$wrong_answer = $total - $right_answer;

$_SESSION['right_answer'] = $right_answer;
$_SESSION['wrong_answer'] = $wrong_answer;
?>