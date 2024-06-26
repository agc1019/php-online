<?php

include ("./connection.php");
require "vendor/autoload.php";

use GeminiAPI\Client;
use GeminiAPI\Resources\Parts\TextPart;

//Generating prompt

$test_id = $_SESSION['test_id'];
$item_no = $_SESSION['exam_number'];
$prompt = $_SESSION['prompt'];
$type = $_SESSION['type'];

$sql = "SELECT 
    a.test_id, 
    q.question, 
    r.answer
FROM 
    test a
JOIN 
    (SELECT 
        test_id, 
        question, 
        @row_num_q := IF(@current_test_q = test_id, @row_num_q + 1, 1) AS row_num,
        @current_test_q := test_id
     FROM 
        question_set 
     CROSS JOIN (SELECT @row_num_q := 0, @current_test_q := NULL) vars
     WHERE 
        test_id = '$test_id'
     ORDER BY 
        test_id, item_no
    ) q ON a.test_id = q.test_id
JOIN 
    (SELECT 
        test_id, 
        answer, 
        @row_num_r := IF(@current_test_r = test_id, @row_num_r + 1, 1) AS row_num,
        @current_test_r := test_id
     FROM 
        answer_set 
     CROSS JOIN (SELECT @row_num_r := 0, @current_test_r := NULL) vars
     WHERE 
        test_id = '$test_id'
     ORDER BY 
        test_id, item_no
    ) r ON a.test_id = r.test_id AND q.row_num = r.row_num
WHERE 
    a.test_id = '$test_id'";

if ($type == 3) {
  $mnw = "Multiple choices type and written questions and answer type";
  $prompting = '{
  "questions": [
    {
      "type": "multiple_choice",
      "question": "What is the capital of France?",
      "choices": [
        {
          "option": "Kuala Lumpur",
          "is_correct": "false"
        },
        {
          "option": "USA",
          "is_correct": "false"
        },
        {
          "option": "Paris",
          "is_correct": true
        },
        {
          "option": "Manila",
          "is_correct": "false"
        }
      ]
    },
    {
      "type": "written",
      "question": "Question here",
      "answer": "put the answer here one word"
    }
  ]
}';
} else if ($type == 1) {
  $mnw = "Written written questions and answer type";
  $prompting = '{
  "questions": [
    {
      "type": "written",
      "question": "Question here",
      "answer": "put the answer here one word"
    }
  ]
}';
} else if ($type == 2) {
  $mnw = "Multiple Choices type";
  $prompting = '{
  "questions": [
    {
      "type": "multiple_choice",
      "question": "What is the capital of France?",
      "choices": [
        { "option": "Kuala Lumpur", "is_correct": false },
        { "option": "USA", "is_correct": false },
        { "option": "Paris", "is_correct": true },
        { "option": "Manila", "is_correct": false }
      ]
    }
  ]
}';
}


$prompt = 'Make a total of' . $item_no . ' questions that should have ' . $mnw . ' based on These Question and Answers:[';

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $question = $row["question"];
    $answer = $row["answer"];
    $prompt = $prompt . 'question:' . ${'question'} . ',answer:' . ${'question'};
  }
}

$prompt = $prompt . '] Strictly use the given format also do not add anything on the output aside from the given format: ' . $prompting;


//Generation
$client = new Client("AIzaSyCZGsHy_foVvgC1EQGONy4HdEiYswFVM0Q");
$response = $client->geminiPro()->generateContent(
  new TextPart($prompt),
);

$generated_exam = $response->text();

$data = json_decode($generated_exam, true);

foreach ($data['questions'] as $index => $question) {
  echo '<div class="test-container">';
  echo '    <div class="question-header">';
  echo '        <h1>Question</h1>';
  echo '        <h1>' . ($index + 1) . '/' . count($data['questions']) . '</h1>';
  echo '        <i class="fa-solid fa-volume-high"></i>';
  echo '    </div>';
  echo '    <h2><span class="span-text-bold">Question: </span>' . $question['question'] . '</h2>';

  if ($question['type'] == 'multiple_choice') {
    echo '<div class="choices-container">';

    // Split choices into two columns for display
    $half = ceil(count($question['choices']) / 2);
    $chunks = array_chunk($question['choices'], $half);

    foreach ($chunks as $chunk) {
      echo '<div class="choices-column">';
      foreach ($chunk as $choice) {
        echo '<button class="choice-button answer" onclick="selectButton(this)">' . $choice['option'] . '</button>';
      }
      echo '</div>';
    }

    echo '</div>';
  } elseif ($question['type'] == 'written') {
    echo '<input class="answer field" type="text" placeholder="Input your answer here">';
  }
  echo '</div>';
}

?>

<script>

</script>