<?php

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

$wrong_answer = $total - $score;

?>
