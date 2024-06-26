<?php

include ('./connection.php');

$test_id = $_SESSION['test_id'];

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
        ROW_NUMBER() OVER(PARTITION BY test_id ORDER BY item_no) as row_num
     FROM 
        question_set 
     WHERE 
        test_id = '$test_id'
    ) q ON a.test_id = q.test_id
JOIN 
    (SELECT 
        test_id, 
        answer, 
        ROW_NUMBER() OVER(PARTITION BY test_id ORDER BY item_no) as row_num
     FROM 
        answer_set 
     WHERE 
        test_id = '$test_id'
    ) r ON a.test_id = r.test_id AND q.row_num = r.row_num
WHERE 
    a.test_id = '$test_id'";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text front-text"><?php echo $row['question'] ?></p>
                            <button class="tts-btn" data-side="front" onclick="speakText(this, event)"><i class="fas fa-volume-up"></i></button>
                        </div>
                    </div>
                </div>
                <div class="flip-card-back">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text back-text"><?php echo $row['answer'] ?></p>
                            <button class="tts-btn" data-side="back" onclick="speakText(this, event)"><i class="fas fa-volume-up"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
?>
