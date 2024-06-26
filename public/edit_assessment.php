<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['email'])) {

    ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Edit Assessment - Insightify</title>
        <link rel="icon" href="./logo/symbol_blue.png">

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- STYLESHEETS -->
        <link rel="stylesheet" href="./css/edit_assessment.css">
        <link rel="stylesheet" href="./css/sidebar.css">
        <link rel="stylesheet" href="./css/profile_dropdown.css">
        <link rel="stylesheet" href="./css/tools_popup.css">

        <!-- ICONS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
            integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>

        <!-- SCRIPTS -->
        <script src="./js/dropdown_profile.js" defer> </script>
        <script src="./js/edit_assessment.js" defer></script>
        <script src="./js/dashboard.js" defer> </script>
    </head>

    <body>

        <!-- SIDEBAR -->
        <?php include ("sidebar.php"); ?>

        <div class="main">
            <div class="content">

                <div class="title">
                    <div>
                        <p class="title_header">Edit Assessment</p>
                        <p class="subtitle">add, modify, reorder, and delete items</p>
                    </div>
                </div>


                <div class="assessment-list">

                </div>

                <!-- ASSESSMENT LIST -->
                <button class="add-button"><i class="fas fa-plus"></i> Add Item</button>
                <div class="button">
                    <button class="btn-danger" onclick="window.location='./assessment.php';">Cancel</button>
                    <button class="btn-success" onclick="SaveEdit();">Save</button>
                </div>

            </div>


            <!-- ASSESSMENT EDITED POPUP -->
            <div class="modal fade" id="assessment-edited-popup" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content assessment-edited-popup">
                        <div class="modal-body">
                            <i class="fas fa-check-circle fa-2x checkmark-animation mt-3"></i>
                            <h1>Assessment successfully <br> edited!</h1>
                            <button type="button" onclick="window.location.href='flashcards.php'" class="btn btn-primary"
                                data-bs-dismiss="modal" aria-label="Exit">Okay</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <?php include ("edit_assessment_load.php"); ?>

    </body>


    </html>

    <?php
} else {
    header("location: ./homepage.php");
}
?>