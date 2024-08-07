<?php
session_start();

if(isset($_SESSION['username']) && isset($_SESSION['email'])) {

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <title>Dashboard</title>
    <link rel="icon" href="./logo/symbol_blue.png">

    <link rel="stylesheet" href="./css/dashboard.css">
    <link rel="stylesheet" href="./css/sidebar.css">
    <link rel="stylesheet" href="./css/profile_dropdown.css">
    
    <!-- CSS FOR OWL CAROUSEL -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS FOR BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- ICONS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- SCRIPT -->
    <!-- <script src="./js/tools.js" defer></script> -->
</head>



<body>

    <!-- SIDEBAR -->
    <?php include("sidebar.php"); ?>

    <div class="main">

        <div class="content">
            <h1>Popular</h1>

            <!-- CAROUSEL FOR POPULAR -->
            <div id="carouselExampleCaptions" class="carousel slide">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>

                    <div class="carousel-inner">
                    <div class="carousel-item active">
                            <div class="img-gradient-overlay"></div><img src="./img/pop_book3.jpg" class="d-block w-100" alt="...">

                            <div class="carousel-caption d-none d-md-block">
                                <h2 style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Atomic Habits</h2>
                                <p class="author">James Clear</p>

                                <div class="type_and_genre">
                                    <p>Book</p> <p>Non-fiction</p> <p>Psychology</p>
                                </div>

                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="img-gradient-overlay"></div><img src="./img/pop_book2.jpg" class="d-block w-100" alt="..." >

                            <div class="carousel-caption d-none d-md-block">
                                <h2 style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Ego is the Enemy</h2>
                                <p class="author">Ryan Holiday</p>

                                <div class="type_and_genre">
                                    <p>Book</p> <p>Non-fiction</p> <p>Philosophy</p>
                                </div>

                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="img-gradient-overlay"></div><img src="./img/pop_book1.jpg" class="d-block w-100" alt="...">

                            <div class="carousel-caption d-none d-md-block">
                                <h2 style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">A Short History of Nearly Everything</h2>
                                <p class="author">Bill Bryson</p>

                                <div class="type_and_genre">
                                    <p>Book</p> <p>Non-fiction</p> <p>Science</p>
                                </div>

                            </div>
                        </div>

                    </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>

            </div>


 
            <!-- TOOLS -->
            <h1>Tools</h1>
            <div class="tools_container">

                <div class="row">
                    <div class="col btn_holder">
                        <button class="btn_assessType" type="button" data-bs-toggle="modal" data-bs-target="#addTitle">
                            <i class="fas fa-plus-square"></i> 
                        </button>
                        <p>Add Title</p>
                    </div>

                    <div class="col btn_holder">  
                        <button class="btn_assessType" type="button" data-bs-toggle="modal" data-bs-target="#multiTabModal" data-tab="#simplify-tab">
                            <i class="fas fa-magic"></i>
                        </button>
                        <p>Simplify</p>
                    </div>

                    <div class="col btn_holder"> 
                        <button class="btn_assessType" type="button" data-bs-toggle="modal" data-bs-target="#multiTabModal" data-tab="#paraphrase-tab">
                            <i class="fas fa-retweet"></i>
                        </button>
                        <p>Paraphrase</p>
                    </div>

                    <div class="col btn_holder"> 
                        <button class="btn_assessType" type="button" data-bs-toggle="modal" data-bs-target="#multiTabModal" data-tab="#translate-tab">
                            <i class="fas fa-language"></i>
                        </button>
                        <p>Translate</p>
                    </div>

                    <div class="col btn_holder"> 
                        <button class="btn_assessType" type="button" data-bs-toggle="modal" data-bs-target="#cite-popup">
                            <i class="fas fa-pen-to-square"></i> 
                        </button>
                        <p>Cite</p>
                    </div>
                </div>
            </div>

            <hr><br>
            
            <!-- HEADER FOR RECENT TITLES -->
            <div class="title">
                <div>
                    <p class="title_header">Recent Titles</p>
                    <p class="subtitle">view your recently opened titles</p>
                </div>

                <!-- BUTTON TO COLLECTION -->
                <button type="button" class="view-all" onclick="redirectToPage('collection.php')">
                    View All <i class="fas fa-chevron-right"></i>
                </button>
            </div>
            

            <!-- RECENT TITLES -->
            <div class="title_container mt-3" >

                <div class="btn_scroll  position-absolute top-50 start-0 translate-middle z-3" onclick="scrollTitlePrev('#owl_title')">
                    <i class="fa-solid fa-arrow-left" style="color: #005CD6;"></i>
                </div>

                <div class="owl-carousel" id="owl_title">

                    <div class="card text-end text-secondary overflow-hidden bg-primary" style="width: 18rem ; height: 10rem; border: none;">
                        <img src="https://th.bing.com/th/id/R.36a41659b82c009fe7d9be66c288c71b?rik=Ilzr9naYYeOs6Q&riu=http%3a%2f%2forig01.deviantart.net%2fce57%2ff%2f2013%2f038%2f0%2f5%2fdoodle__cat_by_pian_no-d5u4498.png&ehk=Elg27KtcepH%2b%2f1Iel4S8o%2bZn2vBjF%2frspyFyeZKhm%2b8%3d&risl=&pid=ImgRaw&r=0" class="card-img rounded-4 opacity-25" alt="chae" style="width: 50%; height: auto;">
                        <div class="card-img-overlay d-flex flex-column-reverse p-2">
                            <p class="card-text my-0"><small>Last updated 3 mins ago</small></p>
                            <h5 class="card-title my-0 text-black">Card title1</h5>
                        </div>
                    </div>

                    <div class="card text-end text-secondary overflow-hidden bg-primary" style="width: 18rem ; height: 10rem; border: none;">
                        <img src="https://th.bing.com/th/id/R.36a41659b82c009fe7d9be66c288c71b?rik=Ilzr9naYYeOs6Q&riu=http%3a%2f%2forig01.deviantart.net%2fce57%2ff%2f2013%2f038%2f0%2f5%2fdoodle__cat_by_pian_no-d5u4498.png&ehk=Elg27KtcepH%2b%2f1Iel4S8o%2bZn2vBjF%2frspyFyeZKhm%2b8%3d&risl=&pid=ImgRaw&r=0" class="card-img rounded-4 opacity-25" alt="chae" style="width: 50%; height: auto;">
                        <div class="card-img-overlay d-flex flex-column-reverse p-2">
                            <p class="card-text my-0"><small>Last updated 3 mins ago</small></p>
                            <h5 class="card-title my-0">Card title2</h5>
                        </div>
                    </div>
                    <div class="card text-end text-secondary overflow-hidden bg-primary" style="width: 18rem ; height: 10rem; border: none;">
                        <img src="https://th.bing.com/th/id/R.36a41659b82c009fe7d9be66c288c71b?rik=Ilzr9naYYeOs6Q&riu=http%3a%2f%2forig01.deviantart.net%2fce57%2ff%2f2013%2f038%2f0%2f5%2fdoodle__cat_by_pian_no-d5u4498.png&ehk=Elg27KtcepH%2b%2f1Iel4S8o%2bZn2vBjF%2frspyFyeZKhm%2b8%3d&risl=&pid=ImgRaw&r=0" class="card-img rounded-4 opacity-25" alt="chae" style="width: 50%; height: auto;">
                        <div class="card-img-overlay d-flex flex-column-reverse p-2">
                            <p class="card-text my-0"><small>Last updated 3 mins ago</small></p>
                            <h5 class="card-title my-0">Card title3</h5>
                        </div>
                    </div>
                    <div class="card text-end text-secondary overflow-hidden bg-primary" style="width: 18rem ; height: 10rem; border: none;">
                        <img src="https://th.bing.com/th/id/R.36a41659b82c009fe7d9be66c288c71b?rik=Ilzr9naYYeOs6Q&riu=http%3a%2f%2forig01.deviantart.net%2fce57%2ff%2f2013%2f038%2f0%2f5%2fdoodle__cat_by_pian_no-d5u4498.png&ehk=Elg27KtcepH%2b%2f1Iel4S8o%2bZn2vBjF%2frspyFyeZKhm%2b8%3d&risl=&pid=ImgRaw&r=0" class="card-img rounded-4 opacity-25" alt="chae" style="width: 50%; height: auto;">
                        <div class="card-img-overlay d-flex flex-column-reverse p-2">
                            <p class="card-text my-0"><small>Last updated 3 mins ago</small></p>
                            <h5 class="card-title my-0">Card title4</h5>
                        </div>
                    </div>
                    <div class="card text-end text-secondary overflow-hidden bg-primary" style="width: 18rem ; height: 10rem; border: none;">
                        <img src="https://th.bing.com/th/id/R.36a41659b82c009fe7d9be66c288c71b?rik=Ilzr9naYYeOs6Q&riu=http%3a%2f%2forig01.deviantart.net%2fce57%2ff%2f2013%2f038%2f0%2f5%2fdoodle__cat_by_pian_no-d5u4498.png&ehk=Elg27KtcepH%2b%2f1Iel4S8o%2bZn2vBjF%2frspyFyeZKhm%2b8%3d&risl=&pid=ImgRaw&r=0" class="card-img rounded-4 opacity-25" alt="chae" style="width: 50%; height: auto;">
                        <div class="card-img-overlay d-flex flex-column-reverse p-2">
                            <p class="card-text my-0"><small>Last updated 3 mins ago</small></p>
                            <h5 class="card-title my-0">Card title5</h5>
                        </div>
                    </div>
                    <div class="card text-end text-secondary overflow-hidden bg-primary" style="width: 18rem ; height: 10rem; border: none;">
                        <img src="https://th.bing.com/th/id/R.36a41659b82c009fe7d9be66c288c71b?rik=Ilzr9naYYeOs6Q&riu=http%3a%2f%2forig01.deviantart.net%2fce57%2ff%2f2013%2f038%2f0%2f5%2fdoodle__cat_by_pian_no-d5u4498.png&ehk=Elg27KtcepH%2b%2f1Iel4S8o%2bZn2vBjF%2frspyFyeZKhm%2b8%3d&risl=&pid=ImgRaw&r=0" class="card-img rounded-4 opacity-25" alt="chae" style="width: 50%; height: auto;">
                        <div class="card-img-overlay d-flex flex-column-reverse p-2">
                            <p class="card-text my-0"><small>Last updated 3 mins ago</small></p>
                            <h5 class="card-title my-0">Card title6</h5>
                        </div>
                    </div>

                </div>
                
                <div class="btn_scroll position-absolute top-50 start-100 translate-middle z-3" onclick="scrollTitleNext('#owl_title')">
                    <i class="fa-solid fa-arrow-right" style="color: #005CD6;"></i>
                </div>

            </div>


            <br><br>
            <!-- HEADER FOR RECENT ASSESSMENTS -->
            <div class="title">
                <div>
                    <p class="title_header">Recent Assessments</p>
                    <p class="subtitle">view your recently taken assessments</p>
                </div>

                <!-- BUTTON TO ASSESSMENTS -->
                <button type="button" class="view-all" onclick="redirectToPage('assessment.php')">
                    View All <i class="fas fa-chevron-right"></i>
                </button>
            </div>
            

            <!-- ASSESSMENTS -->
            <div class="assesment_container mt-3">
                <div class="btn_scroll  position-absolute top-50 start-0 translate-middle z-3" onclick="scrollTitlePrev('#owl_assessment')">
                    <i class="fa-solid fa-arrow-left" style="color: #005CD6;"></i>
                </div>

                <div class="owl-carousel overflow-hidden border-0 rounded-2" id="owl_assessment">

                    <div class="card text-dark border-dark border-1 border-opacity-25 p-4">
                            <h5 class="card-title my-0">Card title1</h5>
                            <p class="card-text my-0"><small>Subject</small></p>

                            <div class="badges d-md-block">
                                <span class="badge text-bg-primary rounded-pill">20 items</span>
                                <span class="badge text-bg-primary rounded-pill">AI Generated</span>
                            </div>
                    </div>

                    <div class="card text-dark border-dark border-1 border-opacity-25 p-4">
                        <h5 class="card-title my-0">Card title1</h5>
                        <p class="card-text my-0"><small>Subject</small></p>

                        <div class="badges d-md-block">
                            <span class="badge text-bg-primary rounded-pill">20 items</span>
                            <span class="badge text-bg-primary rounded-pill">AI Generated</span>
                        </div>
                    </div>

                    <div class="card text-dark border-dark border-1 border-opacity-25 p-4">
                        <h5 class="card-title my-0">Card title1</h5>
                        <p class="card-text my-0"><small>Subject</small></p>

                        <div class="badges d-md-block">
                            <span class="badge text-bg-primary rounded-pill">20 items</span>
                            <span class="badge text-bg-primary rounded-pill">AI Generated</span>
                        </div>
                    </div>

                    <div class="card text-dark border-dark border-1 border-opacity-25 p-4">
                        <h5 class="card-title my-0">Card title1</h5>
                        <p class="card-text my-0"><small>Subject</small></p>

                        <div class="badges d-md-block">
                            <span class="badge text-bg-primary rounded-pill">20 items</span>
                            <span class="badge text-bg-primary rounded-pill">AI Generated</span>
                        </div>
                    </div>

                    <div class="card text-dark border-dark border-1 border-opacity-25 p-4">
                        <h5 class="card-title my-0">Card title1</h5>
                        <p class="card-text my-0"><small>Subject</small></p>

                        <div class="badges d-md-block">
                            <span class="badge text-bg-primary rounded-pill">20 items</span>
                            <span class="badge text-bg-primary rounded-pill">AI Generated</span>
                        </div>
                    </div>

                    <div class="card text-dark border-dark border-1 border-opacity-25 p-4">
                        <h5 class="card-title my-0">Card title1</h5>
                        <p class="card-text my-0"><small>Subject</small></p>

                        <div class="badges d-md-block">
                            <span class="badge text-bg-primary rounded-pill">20 items</span>
                            <span class="badge text-bg-primary rounded-pill">AI Generated</span>
                        </div>
                    </div>

                </div>
                
                <div class="btn_scroll position-absolute top-50 start-100 translate-middle z-3" onclick="scrollTitleNext('#owl_assessment')">
                    <i class="fa-solid fa-arrow-right" style="color: #005CD6;"></i>
                </div>
            </div>

            <h1>Favorites</h1>
            <div class="title_container" >

                <div class="btn_scroll position-absolute top-50 start-0 translate-middle z-3" onclick="scrollTitlePrev('#owl_favorite')">
                    <i class="fa-solid fa-arrow-left" style="color: #005CD6;"></i>
                </div>

                <div class="owl-carousel" id="owl_favorite">

                    <div class="card text-end text-secondary overflow-hidden bg-primary" style="width: 18rem ; height: 10rem; border: none;">
                        <img src="https://th.bing.com/th/id/R.36a41659b82c009fe7d9be66c288c71b?rik=Ilzr9naYYeOs6Q&riu=http%3a%2f%2forig01.deviantart.net%2fce57%2ff%2f2013%2f038%2f0%2f5%2fdoodle__cat_by_pian_no-d5u4498.png&ehk=Elg27KtcepH%2b%2f1Iel4S8o%2bZn2vBjF%2frspyFyeZKhm%2b8%3d&risl=&pid=ImgRaw&r=0" class="card-img rounded-4 opacity-25" alt="chae" style="width: 50%; height: auto;">
                        <div class="card-img-overlay d-flex flex-column-reverse p-2">
                            <p class="card-text my-0"><small>Last updated 3 mins ago</small></p>
                            <h5 class="card-title my-0">Card title1</h5>
                        </div>
                    </div>
                    <div class="card text-end text-secondary overflow-hidden bg-primary" style="width: 18rem ; height: 10rem; border: none;">
                        <img src="https://th.bing.com/th/id/R.36a41659b82c009fe7d9be66c288c71b?rik=Ilzr9naYYeOs6Q&riu=http%3a%2f%2forig01.deviantart.net%2fce57%2ff%2f2013%2f038%2f0%2f5%2fdoodle__cat_by_pian_no-d5u4498.png&ehk=Elg27KtcepH%2b%2f1Iel4S8o%2bZn2vBjF%2frspyFyeZKhm%2b8%3d&risl=&pid=ImgRaw&r=0" class="card-img rounded-4 opacity-25" alt="chae" style="width: 50%; height: auto;">
                        <div class="card-img-overlay d-flex flex-column-reverse p-2">
                            <p class="card-text my-0"><small>Last updated 3 mins ago</small></p>
                            <h5 class="card-title my-0">Card title2</h5>
                        </div>
                    </div>
                    <div class="card text-end text-secondary overflow-hidden bg-primary" style="width: 18rem ; height: 10rem; border: none;">
                        <img src="https://th.bing.com/th/id/R.36a41659b82c009fe7d9be66c288c71b?rik=Ilzr9naYYeOs6Q&riu=http%3a%2f%2forig01.deviantart.net%2fce57%2ff%2f2013%2f038%2f0%2f5%2fdoodle__cat_by_pian_no-d5u4498.png&ehk=Elg27KtcepH%2b%2f1Iel4S8o%2bZn2vBjF%2frspyFyeZKhm%2b8%3d&risl=&pid=ImgRaw&r=0" class="card-img rounded-4 opacity-25" alt="chae" style="width: 50%; height: auto;">
                        <div class="card-img-overlay d-flex flex-column-reverse p-2">
                            <p class="card-text my-0"><small>Last updated 3 mins ago</small></p>
                            <h5 class="card-title my-0">Card title3</h5>
                        </div>
                    </div>
                    <div class="card text-end text-secondary overflow-hidden bg-primary" style="width: 18rem ; height: 10rem; border: none;">
                        <img src="https://th.bing.com/th/id/R.36a41659b82c009fe7d9be66c288c71b?rik=Ilzr9naYYeOs6Q&riu=http%3a%2f%2forig01.deviantart.net%2fce57%2ff%2f2013%2f038%2f0%2f5%2fdoodle__cat_by_pian_no-d5u4498.png&ehk=Elg27KtcepH%2b%2f1Iel4S8o%2bZn2vBjF%2frspyFyeZKhm%2b8%3d&risl=&pid=ImgRaw&r=0" class="card-img rounded-4 opacity-25" alt="chae" style="width: 50%; height: auto;">
                        <div class="card-img-overlay d-flex flex-column-reverse p-2">
                            <p class="card-text my-0"><small>Last updated 3 mins ago</small></p>
                            <h5 class="card-title my-0">Card title4</h5>
                        </div>
                    </div>
                    <div class="card text-end text-secondary overflow-hidden bg-primary" style="width: 18rem ; height: 10rem; border: none;">
                        <img src="https://th.bing.com/th/id/R.36a41659b82c009fe7d9be66c288c71b?rik=Ilzr9naYYeOs6Q&riu=http%3a%2f%2forig01.deviantart.net%2fce57%2ff%2f2013%2f038%2f0%2f5%2fdoodle__cat_by_pian_no-d5u4498.png&ehk=Elg27KtcepH%2b%2f1Iel4S8o%2bZn2vBjF%2frspyFyeZKhm%2b8%3d&risl=&pid=ImgRaw&r=0" class="card-img rounded-4 opacity-25" alt="chae" style="width: 50%; height: auto;">
                        <div class="card-img-overlay d-flex flex-column-reverse p-2">
                            <p class="card-text my-0"><small>Last updated 3 mins ago</small></p>
                            <h5 class="card-title my-0">Card title5</h5>
                        </div>
                    </div>
                    <div class="card text-end text-secondary overflow-hidden bg-primary" style="width: 18rem ; height: 10rem; border: none;">
                        <img src="https://th.bing.com/th/id/R.36a41659b82c009fe7d9be66c288c71b?rik=Ilzr9naYYeOs6Q&riu=http%3a%2f%2forig01.deviantart.net%2fce57%2ff%2f2013%2f038%2f0%2f5%2fdoodle__cat_by_pian_no-d5u4498.png&ehk=Elg27KtcepH%2b%2f1Iel4S8o%2bZn2vBjF%2frspyFyeZKhm%2b8%3d&risl=&pid=ImgRaw&r=0" class="card-img rounded-4 opacity-25" alt="chae" style="width: 50%; height: auto;">
                        <div class="card-img-overlay d-flex flex-column-reverse p-2">
                            <p class="card-text my-0"><small>Last updated 3 mins ago</small></p>
                            <h5 class="card-title my-0">Card title6</h5>
                        </div>
                    </div>
                    
                    
                    

                </div>
                
                <div class="btn_scroll btn_scroll position-absolute top-50 start-100 translate-middle z-3" onclick="scrollTitleNext('#owl_favorite')">
                    <i class="fa-solid fa-arrow-right" style="color: #005CD6;"></i>
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


   





        <?php include("tools_popup.php"); ?>
    </div>

    
    <script src="./js/dashboard.js"></script>
    <script src="./js/dropdown_profile.js"></script>
    <script src="./js/feature_popup.js"></script>

    <!-- Tesseract.js -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/tesseract.js@2.1.4/dist/tesseract.min.js"></script> -->
    <!-- PDF.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
    <!-- Mammoth.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mammoth/1.4.2/mammoth.browser.min.js"></script>

    <!-- JS FOR BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- SCRIPTS OWL-CAROUSEL START-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>               

        $(document).ready(function(){
            $('.owl-carousel').owlCarousel(
                {
                margin: 0,
                nav:false,
                dots:false,
                mouseDrag:true,
                navSpeed: 700,
                responsive:{
                    0:{
                        items:1
                    },
                    800:{
                        items:2
                    },
                    1200:{
                        items:3
                    },
                    1800:{
                        items:4
                    }
                }
            }
        );
        });

        const addTitleModal = new bootstrap.Modal(document.getElementById('addTitle'));
const titleSavedModal = new bootstrap.Modal(document.getElementById('title-saved-popup'));

// Form submission handling for addTitleModal
const addTitleForm = document.querySelector('#addTitle form');

// Define the event handler function
function handleAddTitleFormSubmit(event) {
    event.preventDefault();
    event.stopPropagation();

    if (addTitleForm.checkValidity()) {
        // Form is valid, proceed to hide addTitle modal
        addTitleModal.hide();
        titleSavedModal.show();
        AddTitle(titleSavedModal); // Ensure this function is defined somewhere in your code
    } else {
        // Form is invalid, show validation feedback
        addTitleForm.classList.add('was-validated');
    }
}

// Check if the event listener is already attached
const isEventListenerAttached = addTitleForm.getAttribute('data-listener-attached');
if (!isEventListenerAttached) {
    addTitleForm.addEventListener('submit', handleAddTitleFormSubmit);
    addTitleForm.setAttribute('data-listener-attached', 'true');
}

    
    // Remove any existing event listeners (optional but ensures no duplication)
    addTitleForm.removeEventListener('submit', handleAddTitleFormSubmit);
    addTitleForm.addEventListener('submit', handleAddTitleFormSubmit);

  
    // Close button for titleSavedModal
    document.getElementById('exit-saved').addEventListener('click', function() {
        titleSavedModal.hide();
    });
  
    // Remove modal backdrop on hide
    titleSavedModal._element.addEventListener('hidden.bs.modal', function () {
        document.querySelector('.modal-backdrop').remove();
    });
  
  
        // Add event listener for buttons that open the modal
        document.querySelectorAll('.btn_assessType').forEach(button => {
            button.addEventListener('click', function() {
                // Get the tab to show from the data attribute
                var tabToShow = this.getAttribute('data-tab');
                // When the modal is shown, switch to the specified tab
                document.getElementById('multiTabModal').addEventListener('shown.bs.modal', function () {
                    var myTab = new bootstrap.Tab(document.querySelector(tabToShow));
                    myTab.show();
                }, { once: true });
            });
        });
    
    // Remove modal backdrop on hide
    titleSavedModal._element.addEventListener('hidden.bs.modal', function () {
        document.querySelector('.modal-backdrop').remove();
    });

        function AddTitle(titleSavedModal){
            let title = document.getElementById("title").value;
            let author = document.getElementById("author").value;
            let genre = document.getElementById("genre").value;
            let type = document.getElementById("type").value;
            let email = "<?php echo $_SESSION['email']; ?>";
            let collection_id = "<?php echo $_SESSION['collection_id']; ?>";
            $.ajax({
                type : "POST",
                url  : "add_title.php", 
                data : { title : title, author : author, genre : genre, type : type, email : email, collection_id : collection_id },
                success: function(res){ 
                            titleSavedModal.show();
                        }
            }); 
        }
    
        
    

    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- SCRIPTS OWL-CAROUSEL END-->

</body>

<style>
    .sidebar ul li .nav_dash{
        background-color: white ;
        color: #005CD6;
    }
</style>


</html>

<?php

}
else{
    header("Location: ./homepage.php");
    exit();
}
?>