<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['email'])) {

    ?>

<!DOCTYPE html>

<head>
    <title>Assessment Creation Manual- Insightify</title>
    <link rel="icon" href="./logo/symbol_blue.png">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Link for Fontawesome -->
    <script src="https://kit.fontawesome.com/ed08dfa832.js" crossorigin="anonymous"></script>

     <!-- STYLESHEETS -->
     <link rel="stylesheet" href="./css/manual_assessment.css">
    <link rel="stylesheet" href="./css/sidebar.css">
    <link rel="stylesheet" href="./css/profile_dropdown.css">
    <link rel="stylesheet" href="./css/tools_popup.css">

    <!-- ICONS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- SCRIPTS -->
    <script src="./js/dropdown_profile.js" defer> </script>
    <script src="./js/manual_assessment.js" defer></script>
    <script src="./js/dashboard.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js" integrity="sha512-7ugB6mXvh8clpBIlFnvjUshfwP9oR9scvH6T5DwW3LzwOYlPxeQGBkIcSmfa1J4B+8fj8Y9GQa6W0G4Z3sFSpA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
</head>

<body>
    <!-- SIDEBAR -->
    <?php include("./sidebar.php"); ?>

    <div class="main">
        <div class="content">
            <!-- AI Generated -->

            <div class="title">
                <div>
                    <p class="title_header">Manual Assessment</p>
                    <p class="subtitle">create an assessment by your own</p>
                </div>
            </div>

            <br>
            

            <!-- FORM VALIDATION MANUAL ASSESSMENT -->
            <form class="row g-3 needs-validation" novalidate id="manualAssessmentForm">
                <div class="row-title">
                    <h1 class="mini-title"><b>test name</b></h1>
                    <img class="ic_num" src="./img/ic_1.png" alt="icon">
                </div>

                <div class="col-12">
                    <input type="text" class="form-control test-input" id="test_name" value="" required
                    onfocus="this.style.background = '#BFD6F5'; this.style.boxShadow = '0 0 4px grey'; this.style.border = 'none';">

                   

                    <div class="invalid-feedback">
                        Please enter a name.
                    </div>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="row-container">
                    <p>categorize and know the content of your test</p>
                    <div class="column-container">
                        <div class="left-column">
                            <div class="row-title">
                                <h1 class="big-title"><b>choose from your</b>
                                    <span>
                                        <button>titles</button>
                                    </span>
                                </h1>
                                <img class="ic_num" src="./img/ic_2.png" alt="icon">
                            </div>
                            <div class="checkboxes">
                                <!-- <label class="switch">
                                    <input type="checkbox" id="select-all-left">
                                    <span class="checkbox-container"></span>
                                    Select All
                                </label> -->
                                <?php include('./manual_titles.php'); ?>
                            </div>
                        </div>
                    </div>
                </div>

                
            </form>
            <br><br>
                <div class="row-title" style="margin-bottom: -18px; margin-top: -8px;">
                    <h1 class="mini-title"><b>create cards</b></h1>
                    <img class="ic_num" src="./img/ic_3.png" alt="icon">
                </div>
                
                <!-- FOR ASSESSMENT LIST -->
                <div id="assessment-list">
                    <!-- Initial item to be dynamically added by JS -->
                </div>
                <button class="add-button"><i class="fas fa-plus"></i> Add Item</button>

                <div class="button">
                    <button class="btn-success" data-bs-toggle="modal" type="submit" id="createBtn">Create</button>
                    <button class="btn-danger" onclick="window.location='./assessment.php';">Cancel</button>
                </div>
                        
            </div>

        </div>


        <!-- Toast Notification -->
        <div class="toast-empty-textarea">
            <div class="toast-container position-fixed top-0 start-50 translate-middle-x p-3">
                <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <img src="./logo/symbol_blue.png" class="rounded me-2 logo-img-toast" alt="Insightify">
                        <strong class="me-auto">Insightify</strong>
                        <small>Now</small>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        <!-- Toast message will be updated dynamically -->
                    </div>
                </div>
            </div>
        </div>


        <!-- ASSESSMENT CREATED POPUP -->
        <div class="modal fade" id="assessment-created-popup" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content assessment-created-popup">
                    <div class="modal-body">
                        <i class="fas fa-check-circle fa-2x checkmark-animation mt-3"></i>
                        <h1>Assessment successfully <br> created!</h1>
                        <button type="button" onclick="window.location.href='flashcards.php'" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Exit">Okay</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
<script>
    const createBtn = document.getElementById('createBtn');
    
    function CreateTest(modal){
        const answer_list = [];
        const question_list = [];

        var count = 0;
        const questions = document.getElementsByClassName("question-textarea");
        const answers = document.getElementsByClassName("answer-textarea");
        const titles = document.getElementsByClassName("left-checkbox");
        const test_name =document.getElementById("test_name").value;
        var title_id = 0;
        for (const question of questions) {
            question_list.push(question.value);
            count++;
        }
        for (const answer of answers) {
            answer_list.push(answer.value);
        }
        for(const title of titles){
            if(title.checked){
                title_id = title.id;
            }
        }
        $.ajax({
                        type: 'POST',
                        url: './generate_manual_test.php',
                        async:'false',
                        data: {
                            questions: JSON.stringify(question_list),
                            answers: JSON.stringify(answer_list),
                            count: count,
                            title_id: title_id,
                            test_name: test_name,
                        },
                        success: function (response) {
                            modal.show();
                    }}
                );
    }
</script>

</html>

<?php
} else {
    header("location: ./homepage.php");
}
?>