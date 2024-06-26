<?php

include ("./connection.php");

?>



<script>
    var qDel = [];
    var aDel = [];
    function createAssessmentContainer(question, question_id, answer, answer_id) {
        // Count the number of existing assessment containers
        const numContainers = document.querySelectorAll('.assessment-container').length;

        // Create a new assessment container
        const newAssessmentContainer = document.createElement('div');
        newAssessmentContainer.classList.add('assessment-container');
        newAssessmentContainer.draggable = true;

        if (question == undefined || question == null || answer == undefined || answer == null) {
            question = "";
            question_id = "";
            answer = "";
            answer_id = "";
        }
        // Set the HTML content for the new assessment container
        newAssessmentContainer.innerHTML = `
        <div class="title-row">
            <h1><b>${numContainers + 1}</b></h1>
            <div class="icon-container">
                <button class="drag-button" aria-label="Drag">
                    <img class="icon" src="./img/ic_drag.png">
                </button>
                <button class="delete-button" aria-label="Delete" question="${question_id}" answer="${answer_id}">
                    <img class="icon" src="./img/ic_delete.png">
                </button>
            </div>
        </div>
        <div class="divider"></div>
        <div class="assessment-list">
            <div class="question">
                <h1><b>question</b></h1>
                <textarea id="${question_id}"class="question-textarea questions" placeholder="Enter question here">${question}</textarea>
            </div>
            <div class="answer">
                <h1><b>answer</b></h1>
                <textarea id="${answer_id}"class="answer-textarea answers" placeholder="Enter answer here">${answer}</textarea>
            </div>
        </div>
    `;

        // Append the new assessment container above the "Add Item" button
        const addButton = document.querySelector('.add-button');
        addButton.parentNode.insertBefore(newAssessmentContainer, addButton);

        // Update numbering for all assessment containers
        updateNumbering();

        // Add event listener for delete button
        const deleteButton = newAssessmentContainer.querySelector('.delete-button');
        deleteButton.addEventListener('click', function () {
            const container = deleteButton.closest('.assessment-container');

            if (deleteButton.getAttribute('question') != null || deleteButton.getAttribute('question') != undefined || deleteButton.getAttribute('question') != "")
                qDel.push(deleteButton.getAttribute('question'));

            if (deleteButton.getAttribute('answer') != null || deleteButton.getAttribute('answer') != undefined || deleteButton.getAttribute('answer') != "")
                aDel.push(deleteButton.getAttribute('answer'));

            container.remove();
            // Update numbering for all assessment containers
            updateNumbering();
        });

        // Add drag event listeners
        addDragAndDrop(newAssessmentContainer);
    }

    // Event listener for "Add Item" button
    const addButton = document.querySelector('.add-button');
    addButton.addEventListener('click', createAssessmentContainer);

    // Function to update numbering for all assessment containers
    function updateNumbering() {
        const assessmentContainers = document.querySelectorAll('.assessment-container');
        assessmentContainers.forEach((container, index) => {
            container.querySelector('h1').textContent = index + 1;
        });
    }

    // Function to add drag and drop event listeners
    function addDragAndDrop(container) {
        container.addEventListener('dragstart', function (e) {
            e.dataTransfer.setData('text/plain', container.querySelector('h1').textContent);
            container.classList.add('dragging');
        });

        container.addEventListener('dragend', function () {
            container.classList.remove('dragging');
        });

        container.addEventListener('dragover', function (e) {
            e.preventDefault();
            const draggingContainer = document.querySelector('.dragging');
            const currentContainers = [...document.querySelectorAll('.assessment-container:not(.dragging)')];
            const nextContainer = currentContainers.find(child => {
                const rect = child.getBoundingClientRect();
                return e.clientY < rect.top + rect.height / 2;
            });
            if (!nextContainer) {
                container.parentNode.insertBefore(draggingContainer, addButton);
            } else {
                container.parentNode.insertBefore(draggingContainer, nextContainer);
            }
        });

        container.addEventListener('drop', function () {
            updateNumbering();
        });
    }

    // Initialize drag and drop for existing containers
    document.querySelectorAll('.assessment-container').forEach(addDragAndDrop);

    <?php

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
            createAssessmentContainer("<?php echo $row['question']; ?>", "<?php echo $row['q_item']; ?>", "<?php echo $row['answer']; ?>", "<?php echo $row['a_item']; ?>");

            <?php
        }
    }
    ?>

    function SaveEdit() {
        questions_list = [];
        question_id_list = [];
        answers_list = [];
        answers_id_list = [];

        questions = document.querySelectorAll('.questions');
        answers = document.querySelectorAll('.answers');
        //QUESTION
        questions.forEach(question => {
            questions_list.push(question.value);
            if (question.id != 0)
                question_id_list.push(question.id);
            else
                question_id_list.push(0);
        })
        //ANSWER
        answers.forEach(answer => {
            answers_list.push(answer.value);
            if (answer.id != 0)
                answers_id_list.push(answer.id);
            else
                answers_id_list.push(0);
        })

        $.ajax({
            type: 'POST',
            url: 'edit_assessment_save.php',
            data: {
                questions: JSON.stringify(questions_list),
                questions_id: JSON.stringify(question_id_list),
                answers: JSON.stringify(answers_list),
                answers_id: JSON.stringify(answers_id_list),
                delete_question: JSON.stringify(qDel),
                delete_answer: JSON.stringify(aDel),
            },
            success: function (response) {
                const Edit = new bootstrap.Modal(document.getElementById('assessment-edited-popup'));
                Edit.show();
            }
        });
    }


</script>