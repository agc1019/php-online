<?php

include ('./connection.php');


$test_id = $_SESSION['test_id'];

$numbering = 1;

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

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        ?>


        <div class="card mb-4">
            <button class="tts-btn" data-type="qa" onclick="speakText(this)"><i class="fas fa-volume-up"></i></button>
            <div class="row g-0">
                <div class="col-md-1">
                    <p><?php echo $numbering?></p>
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <h5 class="card-title">question</h5>
                        <p class="card-text"><?php echo $row['question']; ?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-body">
                        <h5 class="card-title">answer</h5>
                        <p class="card-text"><?php echo $row['answer']; ?></p>
                    </div>
                </div>
            </div>
        </div>

        <?php
$numbering++;
    }
}
?>