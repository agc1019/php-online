<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['email'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Assessment Result</title>
    <link rel="icon" href="./logo/symbol_blue.png">
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- STYLESHEETS -->
    <link rel="stylesheet" href="./css/assessment_result.css">

    <!-- CSS FOR OWL CAROUSEL -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- ICONS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- CHART.JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- FONTAWESOME -->
    <script src="https://kit.fontawesome.com/ed08dfa832.js" crossorigin="anonymous"></script>
    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            .printable-content, .printable-content * {
                visibility: visible;
            }
            .printable-content {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }
            .right-side {
                display: none; 
            }
            .result-container {
                display: flex;
                flex-direction: column;
                margin-bottom: 20px; 
            }
            .chart-container {
                margin: 0 auto; 
                height: 60vh; 
                display: flex;
                align-items: center;
                justify-content: center;
                page-break-after: always; 
            }
            .assessment-item {
                page-break-inside: avoid; 
                margin-bottom: 20px; 
            }
            .assessment-item:nth-of-type(2n) {
                page-break-after: always; 
            }
        }

        .chart-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 60vh; 
        }
    </style>
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
    
    <div class="container-fluid mt-3 pt-3">
        <div class="row">
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
                                    <li class="wrong">2</li>
                                    <li>3</li>
                                    <li>4</li>
                                    <li>5</li>
                                    <li class="text-title">Identification</li>
                                    <li>6</li>
                                    <li class="wrong">7</li>
                                    <li class="wrong">8</li>
                                    <li>9</li>
                                    <li>10</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-8 printable-content">

                <div class="container">
                    <h2>Your Test Results</h2>
                    <p>View your score and correct answers</p>
                    <div class="result-container">
                        <div class="left-side">
                            <h1>Time: 30 mins</h1>
                            <div class="chart-container">
                                <canvas id="doughnutChart"></canvas>
                            </div>
                        </div>
                        <div class="right-side">
                            <h1>What to do next:</h1>

                            <div class="btn-container" type="button" onclick="window.location.href='collection.php'">
                                <div class="icon">
                                    <i class="fa-regular fa-file-lines"></i>
                                </div>
                                <div class="text">
                                    <div class="title">Review</div>
                                    <div class="additional-info">Reread Materials</div>
                                </div>
                                <div class="arrow">
                                    <i class="fa-solid fa-angle-right"></i>
                                </div>
                            </div>

                            <div class="btn-container" type="button" onclick="window.location.href='flashcards.php'">
                                <div class="icon">
                                    <i class="fa-solid fa-feather"></i>
                                </div>
                                <div class="text">
                                    <div class="title">Take a new test</div>
                                    <div class="additional-info">Challenge Yourself</div>
                                </div>
                                <div class="arrow">
                                    <i class="fa-solid fa-angle-right"></i>
                                </div>
                            </div>

                        </div>
                    </div> 
                </div>

                
                <!-- Question 1 -->
                <?php include('./generate_result.php'); ?>
                    
            </div>
            
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const ctx = document.getElementById('doughnutChart').getContext('2d');
            const doughnutChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Correct Answers', 'Wrong Answers'],
                    datasets: [{
                        data: [<?php echo $_SESSION['right_answer']; ?>, <?php echo $_SESSION['wrong_answer']; ?>], 
                        backgroundColor: [
                            '#1CE13C', 
                            '#C23249'  
                        ],
                        borderWidth: 0 
                    }]
                },  
                options: {
                    responsive: true,
                    maintainAspectRatio: false, 
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Test Results'
                        }
                    }
                },
            });
        });

        document.querySelector('.btn-print').addEventListener('click', () => {
            const rightSide = document.querySelector('.right-side');
            rightSide.style.display = 'none'; 

            window.print();

            rightSide.style.display = ''; 
        });
    </script>
</body>
</html>
<?php
} else {
    header("location: ./homepage.php");
}
?>
