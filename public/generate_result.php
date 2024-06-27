<?php



$data = $_SESSION['test_data'];

$answer = $_SESSION['answers'];

$ans = json_decode($answer);


foreach ($data['questions'] as $index => $question) {

    $condition = false;
    if ($data['questions'][$index]['type'] == 'multiple_choice') {
        $condition = false;
        foreach ($data['questions'][$index]['choices'] as $choiceIndex => $choice) {
            if ($ans[$index] == $choice['option']) {
                if ($condition == false) {
                    if ($choice['is_correct'] == "true") {
                        $div = "test-container";
                        $condition = true;
                        $wrong = false;
                    } else {
                        $div = "wrong-test-container";
                        $condition = true;
                        $wrong = true;
                    }
                }
            }
        }
    } else {
        if ($ans[$index] == $data['questions'][$index]['answer']) {
            $div = "test-container";
        } else {
            $div = "wrong-test-container";
        }
    }


    echo '<div class="' . ${'div'} . '">';
    echo '    <div class="question-header">';
    echo '        <h1>Question</h1>';
    echo '        <h1>' . ($index + 1) . '/' . count($data['questions']) . '</h1>';
    echo '        <i class="fa-solid fa-volume-high"></i>';
    echo '    </div>';
    echo '    <h2><span class="span-text-bold">Question: </span>' . $question['question'] . '</h2>';

    if ($data['questions'][$index]['type'] == 'multiple_choice') {
        echo '<div class="choices-container">';

        // Split choices into two columns for display
 

        $half = ceil(count($data['questions'][$index]['choices']) / 2);
        $chunks = array_chunk($data['questions'][$index]['choices'], $half);

        foreach ($chunks as $chunk) {
            echo '<div class="choices-column">';
            foreach ($chunk as $choice) {
                if($wrong == false){
                    if($ans[$index] == $choice['option']){
                        echo '<button class="check-button answer">' . $choice['option'] . '</button>';
                    }else{
                        echo '<button class="choice-button answer">' . $choice['option'] . '</button>';
                    }
                } else if($wrong == true){
                    if($ans[$index] == $choice['option'] && $choice['is_correct'] == "false"){
                        echo '<button class="wrong-button answer">' . $choice['option'] . '</button>';
                    }else{
                        if($choice['is_correct'] == "true"){
                    echo '<button class="check-button answer">' . $choice['option'] . '</button>';
                   }
                   else{
                    echo '<button class="choice-button answer">' . $choice['option'] . '</button>';
                   }
                    }
                   
                        
                       
                }
                
                 
            }
            echo '</div>';
        }
        echo '</div>';
    } else if ($data['questions'][$index]['type'] == 'written') {
        echo '<input class="answer field" type="text" placeholder="Input your answer here" value="'. $data['questions'][$index]['answer'] .'">';
    }

    echo '</div>';
}

?>