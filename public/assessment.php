<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['email'])) {


    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Assessment</title>

        <link rel="icon" href="./logo/symbol_blue.png">
        <link rel="stylesheet" href="./css/assessment.css">
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

        <!-- SCRIPT -->
        <script src="./js/assessment.js" defer> </script>

    </head>

    <body>

        <?php include ("sidebar.php"); ?>


        <!-- CONTENT SIDE-->
        <div class="main">

            <div class="content">
                <div class="title">
                    <div>
                        <p class="title_header">Your Assessments</p>
                        <p class="subtitle">create, edit, and view your assessments</p>
                    </div>
                </div>

                <div class="container_btn d-flex my-5 ms-3">

                    <div class="btn_holder">
                        <button class="btn_assessType" onclick="redirectToPage('ai_assessment.php')">
                            <i class="fa-solid fa-robot fa-2xl " style="color: rgb(52, 204, 88);"></i>
                        </button>
                        <h1>AI Generated</h1>
                    </div>

                    <div class="btn_holder">
                        <button class="btn_assessType" onclick="redirectToPage('manual_assessment.php')">
                            <i class="fa-solid fa-pen-to-square fa-2xl" style="color: #FDBC59;"></i>
                        </button>
                        <h1>Manual</h1>
                    </div>

                </div>

                <!-- START OF NAVIGATION -->
                <ul class="nav mb-5 border-bottom fw-semibold" id="pills-tab" role="tablist">
                    <li class="nav-item mx-5" role="presentation">
                        <button class="nav-link active" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all"
                            type="button" role="tab" aria-controls="pills-all" aria-selected="true">All</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-aig-tab" data-bs-toggle="pill" data-bs-target="#pills-aig"
                            type="button" role="tab" aria-controls="pills-aig" aria-selected="false">AI Generated</button>
                    </li>
                    <li class="nav-item mx-5" role="presentation">
                        <button class="nav-link" id="pills-manual-tab" data-bs-toggle="pill" data-bs-target="#pills-manual"
                            type="button" role="tab" aria-controls="pills-manual" aria-selected="false">Manual</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-favorite-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-favorite" type="button" role="tab" aria-controls="pills-favorite"
                            aria-selected="false">Favorites</button>
                    </li>
                </ul>
                <!-- END OF NAVIGATION -->

                <!-- START OF CATEGORIZE AND SEARCH -->
                <div class="categorize_and_search">
                    <div class="categorize_dropdown">
                        <button class="categorize_btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Recent <i class="fa-solid fa-angle-down"></i>
                        </button>

                        <ul class="dropdown-menu" role="tablist">

                            <li><a class="dropdown-item" href="#">Recent</a></li>
                            <li><a class="dropdown-item" href="#">Old?</a></li>
                            <li><a class="dropdown-item" href="#">Ancient??</a></li>

                        </ul>

                    </div>

                    <div class="search-container">
                        <input type="search" placeholder="Search your tests">
                        <i class="fas fa-search"></i>
                    </div>
                </div>
                <!-- END OF CATEGORIZE AND SEARCH -->

                <!-- START OF CARDS ASESSMENT -->
                <div class="tab-content mt-5" id="pills-tabContent">

                    <div class="tab-pane fade show active " id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab"
                        tabindex="0">

                        <?php include ('./assessment_all.php'); ?>

                    </div>

                    <div class="tab-pane fade" id="pills-aig" role="tabpanel" aria-labelledby="pills-profile-aig"
                        tabindex="0">

                        <div class="test card mb-3 p-3"> <!-- card -->
                            <div class="card-body p-0 pb-4 border-bottom row">
                                <div class="col ">
                                    <h1 class="card-title fw-bold">AI Generated Test 1</h1>
                                    <div class="d-flex align-content-center " style="height: 30px; color: #005CD6;">

                                        <p class="card-text fw-bold">20 items</p>
                                        <div class="mx-3" style="width: 2px;height: 100% ; background-color: #005CD6;">
                                        </div>
                                        <p class="card-text ">Title Name</p>

                                    </div>

                                </div>
                                <div class="col-2 d-flex align-items-center justify-content-center">
                                    <button class="btn btn-link p-0 heart-btn" style="color: #005CD6;">
                                        <i class="fa-solid fa-heart fa-xl"></i>
                                    </button>
                                    <button class="btn btn-link p-0 mx-3 pencil-btn" style="color: #FDBC59;"
                                        onclick="window.location.href='edit_assessment.php'">
                                        <i class="fa-solid fa-pencil fa-xl"></i>
                                    </button>
                                    <button class="btn btn-link p-0 trash-btn" style="color: #FF5757;"
                                        data-bs-toggle="modal" data-bs-target="#delete-test-popup">
                                        <i class="fa-solid fa-trash fa-xl"></i>
                                    </button>
                                </div>

                            </div>
                            <div class="card-body p-0 d-flex mt-3 lh-1" style="height: 90px;">
                                <div class="col-2 lh-1 ">
                                    <p class="card-text fw-semibold">
                                        Recent Score:
                                    </p>
                                    <h1 class="card-title fw-bold" style="color: #005CD6; font-size: 30px">
                                        8/10
                                    </h1>
                                </div>
                                <div class="col-2 lh-1 ">
                                    <p class="card-text fw-semibold">
                                        Highest Score:
                                    </p>
                                    <h1 class="card-title fw-bold" style="color: #005CD6; font-size: 30px">
                                        10/10
                                    </h1>
                                </div>
                                <div class="col d-flex flex-column align-items-end me-3">

                                    <div>
                                        <p class="card-text fw-semibold">
                                            Last Modified:
                                        </p>
                                        <p class="card-text fw-semibold">
                                            Date Created:
                                        </p>
                                        <p class="card-text fw-semibold">
                                            Test Type:
                                        </p>
                                    </div>

                                </div>
                                <div class="col">
                                    <p class="card-text fw-medium">
                                        6/2/2024
                                    </p>
                                    <p class="card-text fw-medium">
                                        6/2/2024
                                    </p>
                                    <p class="card-text fw-medium">
                                        AI Generated
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="test card mb-3 p-3"> <!-- card -->
                            <div class="card-body p-0 pb-4 border-bottom row">
                                <div class="col ">
                                    <h1 class="card-title fw-bold">AI Generated Test 2</h1>
                                    <div class="d-flex align-content-center " style="height: 30px; color: #005CD6;">

                                        <p class="card-text fw-bold">20 items</p>
                                        <div class="mx-3" style="width: 2px;height: 100% ; background-color: #005CD6;">
                                        </div>
                                        <p class="card-text ">Title Name</p>

                                    </div>

                                </div>
                                <div class="col-2 d-flex align-items-center justify-content-center">
                                    <button class="btn btn-link p-0 heart-btn" style="color: #005CD6;">
                                        <i class="fa-solid fa-heart fa-xl"></i>
                                    </button>
                                    <button class="btn btn-link p-0 mx-3 pencil-btn" style="color: #FDBC59;"
                                        onclick="window.location.href='edit_assessment.php'">
                                        <i class="fa-solid fa-pencil fa-xl"></i>
                                    </button>
                                    <button class="btn btn-link p-0 trash-btn" style="color: #FF5757;"
                                        data-bs-toggle="modal" data-bs-target="#delete-test-popup">
                                        <i class="fa-solid fa-trash fa-xl"></i>
                                    </button>
                                </div>

                            </div>
                            <div class="card-body p-0 d-flex mt-3 lh-1" style="height: 90px;">
                                <div class="col-2 lh-1 ">
                                    <p class="card-text fw-semibold">
                                        Recent Score:
                                    </p>
                                    <h1 class="card-title fw-bold" style="color: #005CD6; font-size: 30px">
                                        8/10
                                    </h1>
                                </div>
                                <div class="col-2 lh-1 ">
                                    <p class="card-text fw-semibold">
                                        Highest Score:
                                    </p>
                                    <h1 class="card-title fw-bold" style="color: #005CD6; font-size: 30px">
                                        10/10
                                    </h1>
                                </div>
                                <div class="col d-flex flex-column align-items-end me-3">

                                    <div>
                                        <p class="card-text fw-semibold">
                                            Last Modified:
                                        </p>
                                        <p class="card-text fw-semibold">
                                            Date Created:
                                        </p>
                                        <p class="card-text fw-semibold">
                                            Test Type:
                                        </p>
                                    </div>

                                </div>
                                <div class="col">
                                    <p class="card-text fw-medium">
                                        6/2/2024
                                    </p>
                                    <p class="card-text fw-medium">
                                        6/2/2024
                                    </p>
                                    <p class="card-text fw-medium">
                                        AI Generated
                                    </p>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade  " id="pills-manual" role="tabpanel" aria-labelledby="pills-manual-tab"
                        tabindex="0">

                        <div class="test card mb-3 p-3"> <!-- card -->
                            <div class="card-body p-0 pb-4 border-bottom row">
                                <div class="col ">
                                    <h1 class="card-title fw-bold">Manual Test 1</h1>
                                    <div class="d-flex align-content-center " style="height: 30px; color: #005CD6;">

                                        <p class="card-text fw-bold">10 items</p>
                                        <div class="mx-3" style="width: 2px;height: 100% ; background-color: #005CD6;">
                                        </div>
                                        <p class="card-text ">Title Name</p>

                                    </div>

                                </div>
                                <div class="col-2 d-flex align-items-center justify-content-center">
                                    <button class="btn btn-link p-0 heart-btn" style="color: #005CD6;">
                                        <i class="fa-solid fa-heart fa-xl"></i>
                                    </button>
                                    <button class="btn btn-link p-0 mx-3 pencil-btn" style="color: #FDBC59;"
                                        onclick="window.location.href='edit_assessment.php'">
                                        <i class="fa-solid fa-pencil fa-xl"></i>
                                    </button>
                                    <button class="btn btn-link p-0 trash-btn" style="color: #FF5757;"
                                        data-bs-toggle="modal" data-bs-target="#delete-test-popup">
                                        <i class="fa-solid fa-trash fa-xl"></i>
                                    </button>
                                </div>

                            </div>
                            <div class="card-body p-0 d-flex mt-3 lh-1" style="height: 90px;">
                                <div class="col-2 lh-1 ">
                                    <p class="card-text fw-semibold">
                                        Recent Score:
                                    </p>
                                    <h1 class="card-title fw-bold" style="color: #005CD6; font-size: 30px">
                                        8/10
                                    </h1>
                                </div>
                                <div class="col-2 lh-1 ">
                                    <p class="card-text fw-semibold">
                                        Highest Score:
                                    </p>
                                    <h1 class="card-title fw-bold" style="color: #005CD6; font-size: 30px">
                                        10/10
                                    </h1>
                                </div>
                                <div class="col d-flex flex-column align-items-end me-3">

                                    <div>
                                        <p class="card-text fw-semibold">
                                            Last Modified:
                                        </p>
                                        <p class="card-text fw-semibold">
                                            Date Created:
                                        </p>
                                        <p class="card-text fw-semibold">
                                            Test Type:
                                        </p>
                                    </div>

                                </div>
                                <div class="col">
                                    <p class="card-text fw-medium">
                                        6/2/2024
                                    </p>
                                    <p class="card-text fw-medium">
                                        6/2/2024
                                    </p>
                                    <p class="card-text fw-medium">
                                        Manual
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="test card mb-3 p-3"> <!-- card -->
                            <div class="card-body p-0 pb-4 border-bottom row">
                                <div class="col ">
                                    <h1 class="card-title fw-bold">Manual Test 2</h1>
                                    <div class="d-flex align-content-center " style="height: 30px; color: #005CD6;">

                                        <p class="card-text fw-bold">20 items</p>
                                        <div class="mx-3" style="width: 2px;height: 100% ; background-color: #005CD6;">
                                        </div>
                                        <p class="card-text ">Title Name</p>

                                    </div>

                                </div>
                                <div class="col-2 d-flex align-items-center justify-content-center">
                                    <button class="btn btn-link p-0 heart-btn" style="color: #005CD6;">
                                        <i class="fa-solid fa-heart fa-xl"></i>
                                    </button>
                                    <button class="btn btn-link p-0 mx-3 pencil-btn" style="color: #FDBC59;"
                                        onclick="window.location.href='edit_assessment.php'">
                                        <i class="fa-solid fa-pencil fa-xl"></i>
                                    </button>
                                    <button class="btn btn-link p-0 trash-btn" style="color: #FF5757;"
                                        data-bs-toggle="modal" data-bs-target="#delete-test-popup">
                                        <i class="fa-solid fa-trash fa-xl"></i>
                                    </button>
                                </div>

                            </div>
                            <div class="card-body p-0 d-flex mt-3 lh-1" style="height: 90px;">
                                <div class="col-2 lh-1 ">
                                    <p class="card-text fw-semibold">
                                        Recent Score:
                                    </p>
                                    <h1 class="card-title fw-bold" style="color: #005CD6; font-size: 30px">
                                        18/20
                                    </h1>
                                </div>
                                <div class="col-2 lh-1 ">
                                    <p class="card-text fw-semibold">
                                        Highest Score:
                                    </p>
                                    <h1 class="card-title fw-bold" style="color: #005CD6; font-size: 30px">
                                        20/20
                                    </h1>
                                </div>
                                <div class="col d-flex flex-column align-items-end me-3">

                                    <div>
                                        <p class="card-text fw-semibold">
                                            Last Modified:
                                        </p>
                                        <p class="card-text fw-semibold">
                                            Date Created:
                                        </p>
                                        <p class="card-text fw-semibold">
                                            Test Type:
                                        </p>
                                    </div>

                                </div>
                                <div class="col">
                                    <p class="card-text fw-medium">
                                        6/2/2024
                                    </p>
                                    <p class="card-text fw-medium">
                                        6/2/2024
                                    </p>
                                    <p class="card-text fw-medium">
                                        Manual
                                    </p>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade " id="pills-favorite" role="tabpanel" aria-labelledby="pills-favorite-tab"
                        tabindex="0">

                        <div class="empty card text-center">
                            <img src="./graphics/empty.svg" alt="">

                            <p class="card-text mt-3 fw-bold lh-1">Create assessments based <br> on your titles and entries
                            </p>

                            <button type="button" class="btn btn-primary fw-bold mx-auto fs-5 " style="width: fit-content; "
                                data-bs-toggle="modal" data-bs-target="#empty">Create Test</button>
                        </div>

                    </div>


                </div>
                <!-- END OF CARDS ASESSMENT -->




                <!-- START OF CREATE TEST MODAL -->
                <div class="modal modal_empty fade" id="empty" data-bs-backdrop="dynamic" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

                    <div class="modal-dialog modal-dialog-centered">

                        <div class="modal-content" style="height: fit-content;">

                            <div class="modal-header p-0" style="height: fit-content; background-color: #005CD6;">

                                <h4 class="fw-bold mx-auto text-center lh-1 my-3" style="color: white;">
                                    How do you want to <br> create your test?
                                </h4>

                                <button class="btn-close border-none" type="button" data-bs-dismiss="modal"></button>

                            </div>
                            <div class="modal-body">

                                <div class="d-flex my-2 justify-content-evenly">
                                    <div class="btn_holder ">
                                        <button onclick="redirectToPage('ai_assessment.php')">
                                            <i class="fa-solid fa-robot fa-2xl " style="color: rgb(52, 204, 88);"></i>
                                        </button>
                                        <h3 class="fw-bold fs-4">AI Generated</h3>
                                    </div>
                                    <div class="btn_holder ">
                                        <button onclick="redirectToPage('manual_assessment.php')">
                                            <i class="fa-solid fa-pen-to-square fa-2xl " style="color:  #FDBC59;"></i>
                                        </button>
                                        <h3 class="fw-bold fs-4">Manual</h3>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>
                <!-- END OF MODAL -->


                <!-- DELETE TEST POPUP -->
                <div class="modal fade" id="delete-test-popup" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body p-5">
                                <div class="text-center mb-4"> <i class="fas fa-question-circle fa-spin fa-3x"
                                        style="color: #005CD6;"></i> </div>
                                <h1>Are you sure?</h1>
                                <p>do you really want to delete this test? this process cannot be undone.</p>

                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-6"> <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                        <div class="col-6"> <button type="button" class="btn btn-danger"
                                                data-bs-toggle="modal" onclick="ConfirmDelete();">Delete</button>
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
                                <button type="button" id="exit-saved" class="btn btn-primary" data-bs-dismiss="modal"
                                    aria-label="Exit" onclick="redirectToPage('./assessment.php')">Okay</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <script src="./js/dropdown_profile.js"></script>

        <!-- JS FOR BOOTSTRAP -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>


    </body>

    <style>
        .sidebar ul li .nav_assess {
            background-color: white;
            color: #005CD6;
        }
    </style>


    <script>
        let sidebar = document.querySelector('.sidebar');

        function setActiveSideBar() {
            sidebar.classList.toggle('active');
        }
        function DeleteTest(test_id) {
            delete_test = test_id;
            const DeleteModal = new bootstrap.Modal(document.getElementById('delete-test-popup'));
            DeleteModal.show();
        }
        function ConfirmDelete() {
            const test_id = delete_test;

            const DeleteModals = new bootstrap.Modal(document.getElementById('test-deleted-popup'));

            $.ajax({
                type: 'POST',
                url: './delete_test.php',
                data: {
                    test_id: test_id,
                },
                success: function (response) {
                    DeleteModals.show();
                }
            });

        }

    </script>

    </html>

    <?php
} else {
    header("location: ./homepage.php");
}
?>