<?php
session_start();

include ("./connection.php");

if(isset($_SESSION['username']) && isset($_SESSION['email'])) {

    $test_id = $_SESSION['test_id'];
    $sql = "SELECT * FROM test where test_id='$test_id'";
    $result = mysqli_query($conn, $sql);
    $values = mysqli_fetch_assoc($result);
    $_SESSION['test_name'] = $values['test_name'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Flashcards - Insightify</title>
        <link rel="icon" href="./logo/symbol_blue.png">
 
        <meta charset="UTF-8"> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- STYLESHEETS -->
        <link rel="stylesheet" href="./css/flashcards.css">
        <link rel="stylesheet" href="./css/sidebar.css">
        <link rel="stylesheet" href="./css/profile_dropdown.css">
        <link rel="stylesheet" href="./css/tools_popup.css">

        <!-- CSS FOR OWL CAROUSEL -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- ICONS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
       
        <!-- BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <!-- SCRIPTS -->
        <script src="./js/flashcards.js" defer> </script>
        <script src="./js/dropdown_profile.js" defer></script>
        <script src="./js/dashboard.js" defer></script>
    </head>





    <body>

        <!-- SIDEBAR -->
        <?php include("./sidebar.php"); ?>

         <!-- CONTENT SIDE-->
        <div class="main">

            <div class="content">
                <div class="title d-flex justify-content-space-between">
                    <div>
                        <p class="title_header"><?php echo $values['test_name']; ?></p>
                        <p class="subtitle">Multiple titles</p>
                    </div>

                    <div>
                        <div class="col d-flex align-items-center justify-content-center">
                            <button class="btn btn-link p-0 heart-btn" style="color: #005CD6;">
                                <i class="fa-solid fa-heart fa-xl"></i>
                            </button>
                            <button class="btn btn-link p-0 mx-3 pencil-btn" style="color: #FDBC59;" onclick="window.location.href='edit_assessment.php'">
                                <i class="fa-solid fa-pencil fa-xl"></i>
                            </button>
                            <button class="btn btn-link p-0 trash-btn" style="color: #FF5757;" data-bs-toggle="modal" data-bs-target="#delete-test-popup">
                                <i class="fa-solid fa-trash fa-xl"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="flashcard_fullscreen_container" id="Flashcards">
                    <div class="container mt-5">
                        <div class="row">
                            <!-- PREVIOUS BUTTON -->
                            <div class="col-md-2 prev-btn-col">
                                <button class="prev-btn"><i class="fas fa-arrow-left"></i></button>
                            </div>

                            <!-- CARDS -->
                            <div class="col-md-8 card-container">
                                        <?php include("./flashcards_card.php"); ?>
                            </div>

                            <!-- NEXT BUTTON -->
                            <div class="col-md-2 next-btn-col">
                                <button class="next-btn"><i class="fas fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>


                <br>
                <div class="card-controls">
                    <div class="icon-group">
                        <button class="icon-btn" title="Play" id="Play"><i class="fas fa-play"></i></button>
                        <button class="icon-btn" title="Shuffle"><i class="fas fa-random"></i></button>
                        <button class="icon-btn" title="Fullscreen"><i class="fas fa-expand"></i></button>
                    </div>

                    <div class="counter"><span id="card-number">1</span> of <span id="total-cards">4</span></div>

                    <button class="take-test-btn" data-bs-toggle="modal" data-bs-target="#takeTest">
                        <i class="fas fa-rocket"></i>Take Test
                    </button>
                </div>

                <hr>


                <!-- FLASHCARDS LIST -->
                <div class="flashcard-list mt-5">

                <?php include('./flashcards_card_2.php'); ?>
    </div>
            </div>
        </div>


        <!-- TEST POPUP -->
        <div class="modal fade" id="takeTest" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-header">
                        <div>
                            <p><?php echo $values['test_name'] ?></p>
                            <h1 class="modal-title" id="staticBackdropLabel">Set up your test</h1>
                        </div>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
 
                    <div class="modal-body pt-4 pb-4 ps-5 pe-5">
                        
                        <form class="row g-3 needs-validation mt-3" novalidate id="testPopup">
                            <h5><b>type of test</b></h5>

                            <div class="col-12" id="checkboxContainer">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="written" id="written" required>
                                    <label class="form-check-label" for="written">Written</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="multipleChoice" id="multipleChoice" required>
                                    <label class="form-check-label" for="multipleChoice">Multiple Choice</label>
                                </div>
                            </div>
                            <div id="checkboxError" class="invalid-feedback">Please select at least one test type.</div>

                            <div class="row mt-4 p-2">
                                <div class="col-8">
                                    <div class="text">
                                        <h5><b>number of questions</b></h5>
                                        <p class="bluetext" style="margin-top: -8px;">max number of items: <b><?php echo $values['no_of_items']; ?></b></p>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="counter-container">
                                        <button class="counter-btn" id="decreaseBtn" type="button">-</button>
                                        <input type="number" id="counter" class="counter-input" value="1" min="1" max="99" required>
                                        <button class="counter-btn" id="increaseBtn" type="button">+</button>
                                    </div>
                                    <div id="counterError" class="mt-2"></div>
                                </div>
                            </div>

                                <button type="submit" class="btn btn-primary mt-5 mb-4" id="takeTest" onclick="GotoTest()">Take Test</button>

                                <!-- onclick="window.location.href='actual_test.php'" -->

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL/POPUP -->


        <!-- DELETE TEST POPUP -->
        <div class="modal fade" id="delete-test-popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body p-5">
                            <div class="text-center mb-4"> <i class="fas fa-question-circle fa-spin fa-3x" style="color: #005CD6;"></i> </div>
                            <h1>Are you sure?</h1>
                            <p>do you really want to delete this test? this process cannot be undone.</p>

                            <div class="container-fluid"> <div class="row">
                                <div class="col-6"> <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                </div>
                                <div class="col-6"> <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#test-deleted-popup">Delete</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- TEST DELETED POPUP -->
            <div class="modal fade" id="test-deleted-popup" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content test-deleted">
                        <div class="modal-body">
                            <i class="fas fa-trash-alt fa-2x trash-animation"></i>
                            <h1>Test successfully <br> deleted!</h1>
                            <button type="button" id="exit-saved" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Exit" onclick="window.location.href='assessment.php'">Okay</button>
                        </div>
                    </div>
                </div>
            </div>

    </body>
    <script>
        function GotoTest(){
            const values = "";
            const written = document.getElementById("written");
            const multiple = document.getElementById("multipleChoice");
            const number = document.getElementById("counter").value;
            if(written.checked && multiple.checked ){
                value = 3;
    
            }
            else if(written.checked && !multiple.checked){
                value = 1;
  
            }
            else if(!written.checked && multiple.checked){
                value = 2;

            }
            $.ajax({
                        type: 'POST',
                        url: './set_exam.php',
                        data: {
                            type: value,
                            number: number,
                        },
                        success: function (response) {
                            window.location.href='./actual_test.php';
                    }}
                );
        }
    </script>

    
</html>
<?php
}
else{
    header ("location: ./homepage.php");
}
?>