<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['email'])) {

    ?>

    <!DOCTYPE html>

    <html>

    <head>
        <title>Titles - Insightify</title>
        <link rel="icon" href="./logo/symbol_blue.png">

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- STYLESHEETS -->
        <link rel="stylesheet" href="./css/collection.css">
        <link rel="stylesheet" href="./css/sidebar.css">
        <link rel="stylesheet" href="./css/profile_dropdown.css">
        <link rel="stylesheet" href="./css/tools_popup.css">

        <!-- CSS FOR OWL CAROUSEL -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
            integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- ICONS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
            integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    </head>



    <body>

        <!-- SIDEBAR -->
        <?php include ("sidebar.php"); ?>



        <div class="main">
            <!-- ACTUAL CONTENT -->
            <div class="content">
                <div class="title">
                    <div>
                        <p class="title_header">Your Titles</p>
                        <p class="subtitle">create and view your titles</p>
                    </div>

                    <!-- Button trigger modal -->
                    <button type="button" data-bs-toggle="modal" data-bs-target="#addTitle">
                        <i class="fas fa-plus"></i> Add Title
                    </button>
                </div>


                <!-- RECENTLY OPENED -->
                <br>
                <p style="font-weight: 700;">recently opened</p>

                <div class="recently_opened">

                    <div class="btn_scroll  position-absolute top-50 start-0 translate-middle z-3"
                        onclick="scrollTitlePrev('#owl_title')">
                        <i class="fa-solid fa-arrow-left" style="color: #005CD6;"></i>
                    </div>

                    <div class="owl-carousel" id="owl_title">

                        <div class="card mb-3" style="max-width: 540px;">

                            <div class="row g-0">
                                <div class="col-md-4">
                                    <!-- <img src="./img/map.jpg" class="img-fluid rounded-start" alt="..."> -->
                                    <div class="default overflow-hidden bg-primary"style="height: 12rem; border: none;">
                                        <img src="https://th.bing.com/th/id/R.36a41659b82c009fe7d9be66c288c71b?rik=Ilzr9naYYeOs6Q&riu=http%3a%2f%2forig01.deviantart.net%2fce57%2ff%2f2013%2f038%2f0%2f5%2fdoodle__cat_by_pian_no-d5u4498.png&ehk=Elg27KtcepH%2b%2f1Iel4S8o%2bZn2vBjF%2frspyFyeZKhm%2b8%3d&risl=&pid=ImgRaw&r=0" class="card-img rounded-4 opacity-25" alt="chae" style="width: 80%; height: auto;">
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Harry Potter and the Sorcerer's Stone</h5>
                                        <div class="card-text">
                                            <p><i class="fas fa-user"></i> JK Rowling</p>
                                        </div>

                                        <div class="type_and_genre">
                                            <p>Book</p>
                                            <p>Others</p>
                                        </div>

                                        <p class="card-text"><small class="text-body-secondary">Last opened 1 min ago</small></p>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card mb-3" style="max-width: 540px;">

                            <div class="row g-0">
                                <div class="col-md-4">
                                    <!-- <img src="./img/map.jpg" class="img-fluid rounded-start" alt="..."> -->
                                    <div class="default overflow-hidden bg-primary"style="height: 12rem; border: none;">
                                        <img src="https://th.bing.com/th/id/R.36a41659b82c009fe7d9be66c288c71b?rik=Ilzr9naYYeOs6Q&riu=http%3a%2f%2forig01.deviantart.net%2fce57%2ff%2f2013%2f038%2f0%2f5%2fdoodle__cat_by_pian_no-d5u4498.png&ehk=Elg27KtcepH%2b%2f1Iel4S8o%2bZn2vBjF%2frspyFyeZKhm%2b8%3d&risl=&pid=ImgRaw&r=0" class="card-img rounded-4 opacity-25" alt="chae" style="width: 80%; height: auto;">
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Thinking, Fast and Slow</h5>
                                        <div class="card-text">
                                            <p><i class="fas fa-user"></i> Daniel Kahneman</p>
                                        </div>

                                        <div class="type_and_genre">
                                            <p>Book</p>
                                            <p>Non-Fiction</p>
                                        </div>

                                        <p class="card-text"><small class="text-body-secondary">Last opened 2 mins ago</small></p>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card mb-3" style="max-width: 540px;">

                            <div class="row g-0">
                                <div class="col-md-4">
                                    <!-- <img src="./img/map.jpg" class="img-fluid rounded-start" alt="..."> -->
                                    <div class="default overflow-hidden bg-primary"style="height: 12rem; border: none;">
                                        <img src="https://th.bing.com/th/id/R.36a41659b82c009fe7d9be66c288c71b?rik=Ilzr9naYYeOs6Q&riu=http%3a%2f%2forig01.deviantart.net%2fce57%2ff%2f2013%2f038%2f0%2f5%2fdoodle__cat_by_pian_no-d5u4498.png&ehk=Elg27KtcepH%2b%2f1Iel4S8o%2bZn2vBjF%2frspyFyeZKhm%2b8%3d&risl=&pid=ImgRaw&r=0" class="card-img rounded-4 opacity-25" alt="chae" style="width: 80%; height: auto;">
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Mindset: The New Psychology of Success</h5>
                                        <div class="card-text">
                                            <p><i class="fas fa-user"></i> Carol S. Dweck</p>
                                        </div>

                                        <div class="type_and_genre">
                                            <p>Book</p>
                                            <p>Non-Fiction</p>
                                        </div>

                                        <p class="card-text"><small class="text-body-secondary">Last opened 3 mins ago</small></p>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card mb-3" style="max-width: 540px;">

                            <div class="row g-0">
                                <div class="col-md-4">
                                    <div class="default overflow-hidden bg-primary"style="height: 12rem; border: none;">
                                        <img src="https://th.bing.com/th/id/R.36a41659b82c009fe7d9be66c288c71b?rik=Ilzr9naYYeOs6Q&riu=http%3a%2f%2forig01.deviantart.net%2fce57%2ff%2f2013%2f038%2f0%2f5%2fdoodle__cat_by_pian_no-d5u4498.png&ehk=Elg27KtcepH%2b%2f1Iel4S8o%2bZn2vBjF%2frspyFyeZKhm%2b8%3d&risl=&pid=ImgRaw&r=0" class="card-img rounded-4 opacity-25" alt="chae" style="width: 80%; height: auto;">
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Grit: The Power of Passion and Perseverance</h5>
                                        <div class="card-text">
                                            <p><i class="fas fa-user"></i> Angela Duckworth</p>
                                        </div>

                                        <div class="type_and_genre">
                                            <p>Book</p>
                                            <p>Others</p>
                                        </div>

                                        <p class="card-text"><small class="text-body-secondary">Last opened 3 mins ago</small></p>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div>
                            <!-- blank space -->
                        </div>


                    </div>

                    <div class="btn_scroll position-absolute top-50 start-100 translate-middle z-3"
                        onclick="scrollTitleNext('#owl_title')">
                        <i class="fa-solid fa-arrow-right" style="color: #005CD6;"></i>
                    </div>

                </div>



                <!-- CATEGORIZE AND SEARCH -->
                <div class="categorize_and_search">

                    <div class="categorize_dropdown">
                        <button class="categorize_btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            All <i class="fa-solid fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">All</a></li>
                            <li><a class="dropdown-item" href="#">Favorites</a></li>
                            <li><a class="dropdown-item" href="#">Recent</a></li>
                        </ul>
                    </div>

                    <div class="search-container">
                        <input type="search" placeholder="Search your titles">
                        <i class="fas fa-search"></i>
                    </div>
                </div>



                <!-- HEADERS -->
                <div class="headers_and_sort">
                    <div class="text">
                        <p>Title <i class="fas fa-sort"></i></p>
                        <p>Date <i class="fas fa-sort"></i></p>
                        <p>Author <i class="fas fa-sort"></i></p>
                        <p>Type <i class="fas fa-sort"></i></p>
                        <p>Genre <i class="fas fa-sort"></i></p>
                    </div>
                    <hr class="divider">
                </div>

                <!-- TITLE LIST CARDS -->
                <div class="list_cards">
                    <?php include ('load_collections.php'); ?>

                    <!-- Button trigger modal -->
                    <button type="button" class="list_add_title" data-bs-toggle="modal" data-bs-target="#addTitle">
                        <i class="fas fa-plus"></i> Add Title
                    </button>
                </div>
            </div>
        </div>




        <!-- ADD TITLE POPUP -->
        <div class="modal fade" id="addTitle" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Create a new title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body pt-5 ps-5 pe-5 pb-3">
                        <p class="bluetext">categorize your entries</p>
                        <br>
                        <h2>What type of text are you saving?</h2>

                        <form class="row g-3 needs-validation" novalidate>
                            <div class="col-12">
                                <select id="type" class="form-select" id="validationSelectType" required>
                                <option selected disabled value="">Choose from different types</option>
                                <option>Blog</option>
                                <option>Book</option>
                                <option>Conference</option>
                                <option>Encyclopedia</option>
                                <option>Journal</option>
                                <option>Magazine</option>
                                <option>Newspaper</option>
                                <option>Others</option>
                                <option>Thesis</option>
                                <option>Website</option>
                                </select>
                                <div class="invalid-feedback">
                                Please choose a type.
                                </div>
                            </div>

                            <div class="col-12">
                                <br>
                                <h2 style="text-align: center;">Fill title details below</h2>
                                <hr>
                            </div>

                            <div class="col-12">
                                <label for="validationTitleName" class="form-label"><b>title name</b></label>
                                <input id="title"type="text" class="form-control" id="validationTitleName"  required>
                                <div class="invalid-feedback">
                                            Please enter a title name.
                                            </div>
                                <div class="valid-feedback">
                                Looks good!
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="validationAuthorName" class="form-label"><b>author name</b></label>
                                <input id="author"type="text" class="form-control" id="validationAuthorName" required>
                                <div class="invalid-feedback">
                                    Please enter an author name.
                                    </div>
                                <div class="valid-feedback">
                                Looks good!
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="validationSelectGenre" class="form-label"><b>genre</b></label>
                                <select id="genre" class="form-select" id="validationSelectGenre" required>
                                <option selected disabled value="">Choose from different genres</option>
                                <option>Comedy</option>
                                <option>Crime and Mystery</option>
                                <option>Drama</option>
                                <option>Fantasy</option>
                                <option>History</option>
                                <option>Horror</option>
                                <option>Nonfiction</option>
                                <option>Others</option>
                                <option>Persuasive</option>
                                <option>Romance</option>
                                </select>
                                <div class="invalid-feedback">
                                Please choose a genre.
                                </div>
                            </div>

                            <div class="modal-footer-button mt-5 mb-4">
                                <button class="btn btn-primary" type="submit">Finish</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL/POPUP -->


        <!-- TITLE SAVED POPUP -->
        <div class="modal fade" id="title-saved-popup" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content title-saved">
                    <div class="modal-body">
                        <i class="fas fa-check-circle fa-2x checkmark-animation mt-3"></i>
                        <h1>Title successfully <br> saved!</h1>
                        <button type="button" id="exit-saved" class="btn btn-primary" data-bs-dismiss="modal"
                            aria-label="Exit"onclick="redirectToPage('./entries.php')">Okay</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- DELETE TITLE POPUP -->
        <div class="modal fade" id="delete-title-popup" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body p-5">
                        <div class="text-center mb-4"> <i class="fas fa-question-circle fa-spin fa-3x"
                                style="color: #005CD6;"></i> </div>
                        <h1>Are you sure?</h1>
                        <p>do you really want to delete this title? this process cannot be undone.</p>

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-6"> <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                </div>
                                <div class="col-6"> <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#title-deleted-popup" onclick="ConfirmDelete();" >Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- TITLE DELETED POPUP -->
        <div class="modal fade" id="title-deleted-popup" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content title-deleted">
                    <div class="modal-body">
                        <i class="fas fa-trash-alt fa-2x trash-animation"></i>
                        <h1>Title successfully <br> deleted!</h1>
                        <button type="button" id="exit-saved" class="btn btn-primary" data-bs-dismiss="modal"
                            aria-label="Exit" onclick="redirectToPage('./collection.php')">Okay</button>
                    </div>
                </div>
            </div>
        </div>

    </body>




    <script src="./js/collection.js"> </script>
    <script src="./js/dashboard.js"></script>
    <script src="./js/dropdown_profile.js"></script>

    <!-- JS FOR BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <!-- SCRIPTS OWL-CAROUSEL START-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>

        $(document).ready(function () {
            $('.owl-carousel').owlCarousel(
                {
                    loop: false,
                    margin: 0,
                    nav: true,
                    dots: false,
                    mouseDrag: true,
                    navSpeed: 700,
                    items: 4,
                    responsive: {
                        0: {
                            items: 1
                        },
                        800: {
                            items: 2
                        },
                        1200: {
                            items: 3
                        },
                        1800: {
                            items: 4
                        }
                    }
                }
            );
        });

        function Toentries(clicked_id) {

            $.ajax({
                type: "POST",
                url: "set_title.php",
                data: { title_id: clicked_id },
                success: function (res) {
                    location.href="./entries.php";

                }
            });

 
        }
        var delete_item = "";
        function AddTitle(titleSavedModal){
        var title = document.getElementById("title").value;
        var author = document.getElementById("author").value;
        var genre = document.getElementById("genre").value;
        var type = document.getElementById("type").value;
        var email = "<?php echo $_SESSION['email']; ?>";
        var collection_id = "<?php echo $_SESSION['collection_id']; ?>";
        $.ajax({
            type : "POST",
            url  : "./add_title.php", 
            data : { title : title, author : author, genre : genre, type : type, email : email, collection_id : collection_id },
            success: function(res){ 
                        titleSavedModal.show();
                    }
        }); 
    }
    function DeleteTitles(title_id){
        delete_item = title_id;
        const DeleteModal = new bootstrap.Modal(document.getElementById('delete-title-popup'));
        DeleteModal.show(); 
    }
    function ConfirmDelete(){
        const title_id = delete_item;
        const DeleteModal = new bootstrap.Modal(document.getElementById('title-deleted-popup'));
        $.ajax({
            type: 'POST',
            url: './delete_title.php',
            data: {
                title_id: title_id,
            },
            success: function (response) {
            DeleteModal.show(); 
            }
        });

    }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- SCRIPTS OWL-CAROUSEL END-->

    <style>
        .sidebar ul li .nav_coll {
            background-color: white;
            color: #005CD6;
        }
    </style>

    </html>


    <?php
} else {
    header("Location: ./homepage.php");
    exit();
}
?>