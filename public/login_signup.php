<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['email'])) {
    header("Location: ./dashboard.php");
} else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign In - Insightify</title>
    <link rel="icon" href="./logo/symbol_blue.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Insightify">
    <meta name="description" content="The website is an application simplify, translate, and paraphrase words using Google's Gemini.">
    <meta name="keywords" content="Insightify, NLP, OCR, ">
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <script src="./js/login_signup.js" defer></script>
    <link rel="stylesheet" href="./css/login_signup.css">
    <style>
        .error-modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 80%;
            max-width: 400px;
            background-color: #f44336;
            color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .error-modal .modal-content {
            padding: 20px;
            text-align: center;
        }

        .error-modal .close-btn {
            margin-top: 30px;
            padding: 5px 0px;
            background-color: white;
            color: #f44336;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            font-weight: 700;
            width: 100%;
        }

        .error-modal .close-btn:hover {
            background-color: #ddd;
        }

        #errorModal .modal-content i {
            display: block;        
            text-align: center;     
            margin-bottom: 5px;   
            margin-top: 15px;
        }


        /* ACCOUNT REGISTERED POPUP */
        .registered-modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 80%;
            max-width: 400px;
            background-color: #fff;
            color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .registered-modal .modal-content {
            padding: 20px;
            text-align: center;
        }

        .registered-modal .close-btn {
            margin-top: 30px;
            padding: 5px 0px;
            background-color: #7ED957;
            color: black;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            font-weight: 700;
            width: 100%;
        }

        .registered-modal .close-btn:hover {
            background-color: #ddd;
        }

        #registeredModal .modal-content i {
            display: block;        
            text-align: center;     
            margin-bottom: 5px;   
            margin-top: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="login_function.php" class="sign-in-form" method="post">
                    <img src="./img/img_insightifylogo.png" class="logo-image" alt="">
                    <h2 class="title">Log in to your account</h2>
                    <p class="text-field">email</p>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Input Email" name="email">
                    </div>
                    <p class="text-field">password</p>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Input Password" name="password">
                    </div>
                    <a href="#" class="forgot-password">Forgot Password?</a>
                    <button type="submit" class="btn solid" style="font-family: Poppins;">Sign In</button>
                    <p class="social-text">────────── or continue with ──────────</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                </form>
                <form action="register.php" class="sign-up-form" method="post">
                    <h2 class="title">Create new account</h2>
                    <p class="text-field" name="register">username</p>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="username" placeholder="Insert Username">
                    </div>
                    <p class="text-field">email</p>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="text" name="email" placeholder="Insert Email">
                    </div>
                    <p class="text-field">password</p>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Insert Password">
                    </div>
                    <p class="text-field">confirm password</p>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                    </div>
                    <p class="text-field">date of birth</p>
                    <div class="input-field">
                        <i class="fas fa-calendar"></i>
                        <input type="date" name="dateofbirth" placeholder="MM/DD/YYYY">
                    </div>
                    <input type="submit" value="Sign up" class="btn solid">
                </form>
            </div>
            <div class="panels-container">
                <div class="panel left-panel">
                    <div class="content">
                        <h3>Don't have an account?</h3>
                        <button class="btn transparent" id="sign-up-btn">Sign up here!</button>
                        <p>Join our vibrant community to unlock a wealth of knowledge and personalized insights tailored to your interests and needs. 
                            Elevate your literacy and understanding—take the first step and sign up now!</p>
                    </div>
                    <img src="./img/log.svg" class="image" alt="">
                </div>
                <div class="panel right-panel">
                    <div class="content">
                        <h3>Already registered?</h3>
                        <button class="btn transparent" id="sign-in-btn">Sign in here.</button>
                        <p>Continue your journey of learning with Insightify. Explore new topics, and expand your knowledge base effortlessly. 
                            Don't miss out on the latest insights—log in today and discover something new!</p>
                    </div>
                    <img src="./img/register.svg" class="image" alt="">
                </div>
            </div>
        </div>

        <!-- Error Modal -->
        <div id="errorModal" class="error-modal">
            <div class="modal-content">
                <i class="fas fa-exclamation-triangle fa-beat fa-2x" style="color: white;"></i> 
                <p style="font-size: 28px;">Error</p>
                <p id="errorMessage"></p>
                <button class="close-btn" onclick="closeErrorModal()">Close</button>
            </div>
        </div>

        <!-- ACCOUNT REGISTERED POPUP -->
        <div id="registeredModal" class="registered-modal">
            <div class="modal-content">
                <i class="fas fa-check-circle fa-2x checkmark-animation mt-3" style="color:#28a745;"></i> 
                <p style="font-size: 28px; line-height: 1; color: black;">Account succesfully registered!</p>
                <button class="close-btn" onclick="closeRegisteredModal()">Close</button>
            </div>
        </div>

        <script>
            function showErrorModal(message) {
                var errorMessage = document.getElementById("errorMessage");
                errorMessage.innerText = message;
                var errorModal = document.getElementById("errorModal");
                errorModal.style.display = "block";
            }

            function closeErrorModal() {
                var errorModal = document.getElementById("errorModal");
                errorModal.style.display = "none";
            }

            function showRegisteredModal(message) {
                var registeredModal = document.getElementById("registeredModal");
                registeredModal.style.display = "block";
            }

            function closeRegisteredModal() {
                var registeredModal = document.getElementById("registeredModal");
                registeredModal.style.display = "none";
            }

            function switchPanel(panel) {
                var container = document.querySelector('.container');
                if (panel === 'sign-up') {
                    container.classList.add("sign-up-mode");
                } else {
                    container.classList.remove("sign-up-mode");
                }
            }



            window.onload = function() {
                var urlParams = new URLSearchParams(window.location.search);
                var currentPanel = localStorage.getItem('currentPanel') || 'sign-in';

                if (urlParams.has('error_blank')) {
                    showErrorModal("Please fill up all the blank fields.");
                } else if (urlParams.has('error')) {
                    showErrorModal("Incorrect Password/Email.");
                } else if (urlParams.has('error_register')) {
                    showRegisteredModal();
                } else if (urlParams.has('error_register_register')) {
                    showErrorModal("Please fill up all the blank fields.");
                    currentPanel = 'sign-up';
                }

                switchPanel(currentPanel);
                localStorage.setItem('currentPanel', currentPanel);

                // Clear URL parameters to prevent modal from showing again on refresh
                history.replaceState({}, document.title, window.location.pathname);
            }

            document.getElementById('sign-up-btn').addEventListener('click', function() {
                switchPanel('sign-up');
                localStorage.setItem('currentPanel', 'sign-up');
            });

            document.getElementById('sign-in-btn').addEventListener('click', function() {
                switchPanel('sign-in');
                localStorage.setItem('currentPanel', 'sign-in');
            });
        </script>
    </div>
</body>
</html>

<?php } ?>
