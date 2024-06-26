<?php
session_start();



if(isset($_SESSION['username']) && isset($_SESSION['email'])) {
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Actual Test</title>
        <link rel="icon" href="./logo/symbol_blue.png">

        <meta charset="UTF-8"> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- STYLESHEETS -->
        <link rel="stylesheet" href="./css/actual_test.css">

        <!-- CSS FOR OWL CAROUSEL -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- ICONS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <!-- SCRIPT -->
        <script src="./js/actual_test.js" defer></script>

        <!-- FONTAWESOME -->
        <script src="https://kit.fontawesome.com/ed08dfa832.js" crossorigin="anonymous"></script>
    
    </head>

    <body>
        <header class="header-fixed">
            <div class="row align-items-center">  
                <div class="col">
                    <button class="btn-exit" onclick="window.location.href='flashcards.php'">
                        <i class="fas fa-sign-out-alt"></i> Exit Test
                    </button>
                </div>
                <div class="col test-name">
                    <?php echo $_SESSION['test_name']; ?>
                </div>
                <div class="col print">
                    <button class="btn-print">
                        <i class="fas fa-print"></i> Print Test
                    </button>
                </div>
            </div>
        </header>


        <div class="content mt-5 mb-5">
            <div class="row">

                <!-- COLUMN FOR SIDEBAR -->
                <div class="col-2">
                    <div class="sidebar">
                        <p>
                            <button class="button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
                                Outline <i class="fa-solid fa-caret-down"></i>
                            </button>
                        </p>

                        <div style="min-height: 120px;">
                            <div class="collapse collapse-horizontal" id="collapseWidthExample">
                                <div class="card card-body" style="width: 200px;">
                                    <ul class="list-unstyled">
                                        <li class="text-title">Multiple Choice</li>
                                        <li>1</li>
                                        <li>2</li>
                                        <li>3</li>
                                        <li>4</li>
                                        <li>5</li>
                                        <li class="text-title">Identification</li>
                                        <li>6</li>
                                        <li>7</li>
                                        <li>8</li>
                                        <li>9</li>
                                        <li>10</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                 <!-- COLUMN FOR CARDS -->
                 <div class="col-8">
                    <!-- Question 1 -->
                        <?php include("./generate_exam.php"); ?>

                        <button class="submit-button" data-bs-toggle="modal" onclick="GetAnswers();">Submit</button>
            </div>
        </div>


        <!-- ARE YOU SURE YOU WANT TO SUBMIT -->
        <div class="modal fade" id="confirm-submit-popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body p-5">
                        <div class="text-center mb-4"> <i class="fas fa-question-circle fa-spin fa-3x" style="color: #005CD6;"></i> </div>
                        <h1>Are you sure?</h1>
                        <p>do you want to submit this test?</p>

                        <div class="container-fluid"> <div class="row">
                            <div class="col-6"> <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            </div>
                            <div class="col-6"> <button type="button" class="btn btn-primary" onclick="window.location.href='assessment_result.php'" data-bs-dismiss="modal" aria-label="Exit">Submit</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
        function GetAnswers(){
                let count = 0;
                let selected_answer = [];
                const chosen = document.getElementsByClassName("answer");
                for(const answers of chosen){
                    if(answers.classList.contains("selected")){
                        count++;
                        selected_answer.push(answers.textContent);
                    }else if(answers.classList.contains("field")){
                        count++;
                        selected_answer.push(answers.value);
                    }
                } 
                $.ajax({
                        type: 'POST',
                        url: 'set_result.php',
                        data: {
                            answers: JSON.stringify(selected_answer),
                            question: <?php echo $generated_exam; ?>,
                        },
                        success: function (response) {
                            window.location.replace('./assessment_result.php');
                    }}
                );
            }
        </script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        
    </body>
</html>
<?php
}
else{
    header ("location: ./homepage.php");
}
?>