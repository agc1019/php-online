<html>

    <head>
        <title>Account Settings - Insightify</title>
        <link rel="icon" href="./logo/symbol_blue.png">

        <meta charset="UTF-8"> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="title" content="Insightify">
        <meta name="description" content="The website is an application simplify, translate, and paraphrase words using Google's Gemini.">
        <meta name="keywords" content="Insightify, NLP, OCR, ">
        <meta name="robots" content="noindex, nofollow">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="English">
        <meta charset="UTF-8"> 
        <link rel="stylesheet" href="./css/account_settings.css">
        <link rel="stylesheet" href="./css/header.css">

        <script src="./js/account_settings.js" defer> </script>
        <script src="./js/dropdown_header.js" defer> </script>

        <script src="https://kit.fontawesome.com/ed08dfa832.js" crossorigin="anonymous"></script>
    </head>



    <body>

        <header>
            <div class="logo_container">
                <a href="">
                    <img class="logo" src="./logo/symbol+full_blue2.png" alt="logo"></img>
                </a>
            </div>
                    
            <nav class="nav">
    
                <div class="nav_links_container">
    
                    <ul class="nav_list">
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li><a href="collection.php">Collection</a></li>
                        <li><a href="homepage.php">About</a></li>
                        <li><a href="html_tools.php">Tools</a></li>
                    </ul>
    
                </div>
    
                <div class="dropdown_container"> 
                    <button class="dropdown_button">
                        <img src="./img/profile.png" alt="Profile Icon">
                        <i class="fa-solid fa-angle-down"></i>
                    </button>
    
                    <div class="dropdown_content">
    
                        <div class="user_container">
                            <img src="./img/profile.png" alt="Profile Icon">
    
                            <div class="user_info_dropdown">
                                <p style="font-weight: 700; font-size: 20px;"> @red.pogi</p>
                                <p class="email_dropdown">email@gmail.com</p>
                            </div>
                            
                        </div>
    
                        <hr class="divider1">
    
                        <a href="account_settings.php">Account Settings</a>
                        <a href="about.php">About Insightify</a> 
                        <a href="store_link_3">Get Insightify App</a>
                        <a href="privacy_policy.php">Privacy Policy</a>
                        <a href="contact.php">Contact Us</a>
                        <a href="terms.php">Terms and Condition</a>
    
                        <hr class="divider2">
    
                        <a href="login_signup.php" style=" margin: 8px 0px;">Log Out</a>
                    </div>
                </div>
            </nav>
        </header>


        <div class="tab_container">

            <p>Account Settings</p>

            <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'Personal')" id="defaultOpen">
                    <i class="fas fa-user"></i> Profile
                </button>
                <button class="tablinks" onclick="openCity(event, 'Account')">
                    <i class="fas fa-cog"></i> Account
                </button>
                <button class="tablinks" onclick="openCity(event, 'Privacy')">
                    <i class="fas fa-lock"></i> Data
                </button>
              </div>

            <div class="logout">
                <button onclick="logoutAndRedirect()">
                    <i class="fas fa-sign-out-alt"></i> Log Out 
                </button>
            </div>

        </div>



        <div id="Personal" class="tabcontent">

            <div class="user_profile_container">
                <img src="./img/profile.png">
                
                <div class="username_container">
                    <p class="username_user">@red.pogi</p>
                    <p>joined 1 week ago</p>
                </div>
                
            </div>

            <h3>Personal Information</h3>
            <div class="user_details_container">

                <div class="user_details_row1">

                    <div class="user_details_header">
                        <p> First Name</p>
                        <p>Last Name</p>
                    </div>

                    <div class="user_details_input">
                        <input type="text" value="Red">
                        <input type="text" value="Ochavillo">
                    </div>

                </div>


                <div class="user_details_row2">

                    <div class="user_details_header">
                        <p>Address</p>
                        <p>Phone</p>
                    </div>

                    <div class="user_details_input">
                        <input type="text" value="Dasmariñas City">
                        <input type="text" value="0123456789">
                    </div>
                </div>
            </div>

            <div class="button_container">
                <button class="cancelbtn">Cancel</button>
                <button class="savebtn">Save Changes</button>
            </div>
            
        </div>


        
        <div id="Account" class="tabcontent">
            <h3>Account Management</h3>
            <div class="account_container">

                <div class="account_email">
                    <p>Email</p>
                    <input type="text" value="red@gmail.com">
                </div>

                <div class="account_password">
                    <p>Password</p>
                    <input type="password">
                    <button>Change</button>
                </div>

            </div>
        </div>
        


        <div id="Privacy" class="tabcontent">
            <h3>Privacy and Data</h3>
            <p>Manage the data that you have.</p>
            <br>
        
            <div class="data_container">

                <h3>Request Data</h3>
                <div class="data_row">
                    <p>You can request a copy of the info Insightify collects about you. You'll receive an email to complete your request.</p>
                    <button class="bluebtn">Request</button>
                </div>
                <br>

                <h3>Deactivate</h3>
                <div class="data_row">
                    <p>Deactivate your account</p>
                    <button class="redbtn">Deactivate Account</button>
                </div>

                <h3>Delete</h3>
                <div class="data_row">
                    <p>Delete your data and account</p>
                    <button class="redbtn">Delete Account</button>
                </div>
                
            </div>
            
        </div>
        
          
            

    </body>


</html>