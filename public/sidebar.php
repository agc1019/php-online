<!-- SIDEBAR -->
<div class="sidebar active" >       

    <div class="top ">
        <img src="./logo/symbol-cropped.png" alt="logo" class="logo" id="logo" style="width: 160px; margin: 10px 0 10px"> 


        <i class="fa-solid fa-bars" id="menu_btn" onclick="setActiveSideBar()"></i>
        <i class="fa-solid fa-arrow-left" id="back_btn" onclick="setActiveSideBar()"></i>
    </div>

    <!-- START OF NAV LIST -->
    <ul >
        <li>
            <a class="nav_dash" href="./dashboard.php">
                <i class="fa-solid fa-house"></i>
                <span class="nav-list overflow-hidden">Dashboard</span>
            </a>
            
        </li>
        <li>
            <a class="nav_coll"href="./collection.php">
                <i class="fa-solid fa-layer-group"></i>
                <span class="nav-list overflow-hidden">Collection</span>
            </a>
            
        </li>
            
        <li>
            <a class="nav_assess" href="./assessment.php" >
                <i class="fa-solid fa-check-double"></i>
                <span class="nav-list overflow-hidden">Assessment</span>
            </a>
        </li>

        <li class="dropdown dropend"> 
            <a href="#" class="nav_tool dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-tools"></i></i>
                <span class="nav-list" style="margin-right: 5px;">Tools</span>
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#multiTabModal" data-tab="#simplify-tab"><i class="fas fa-magic"></i> Simplify</a></li>
                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#multiTabModal" data-tab="#paraphrase-tab"><i class="fas fa-retweet"></i> Paraphrase</a></li>
                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#multiTabModal" data-tab="#translate-tab"><i class="fas fa-language"></i> Translate</a></li>
                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#cite-popup"><i class="fas fa-pen-to-square"></i> Cite</a></li>
            </ul>
        </li>
        

    </ul>
    <!-- START OF NAV LIST -->

    <!-- START OF OVERVIEW -->
    <div class="overview ">
        <h1>Overview</h1>
        <div class="divider"></div>
        <div class="container">
            <div class="fig">
                <p>titles</p>
                <h1> <?php if($_SESSION['num_of_titles'] == null)
                        echo "0";
                        else
                        echo $_SESSION['num_of_titles'];?></h1></h1>
            </div>
            <div class="fig">
                <p>entries</p>
                <h1><?php if($_SESSION['num_of_entries'] == null)
                        echo "0";
                        else
                        echo $_SESSION['num_of_entries']; ?></h1>
            </div>
            <div class="fig">
                <p>tests</p>
                <h1><?php if($_SESSION['test_count'] == null)
                        echo "0";
                        else
                        echo $_SESSION['test_count']; ?></h1>
            </div>
        </div>
        <div class="download">
            <a href="./get_app.php">
                <i class="fa-solid fa-download"></i>
                <span>Download Insightify</span>
            </a>            
        </div>
    </div>
    <!-- END OF OVERVIEW -->

    <div class="profile">
        <button class="dropdown_button">
            <img src="./img/profile.png" alt="Profile Icon" style="margin-right: 5px">
        </button>

        <div class="details">
            <h3 class="card-text fw-semibold">@<?php echo $_SESSION['username']; ?></h3>
            <p class="card-text"><?php echo $_SESSION['email']; ?></p>
        </div>
        
    </div>

    <div class="dropdown_content">

                <div class="user_container">
                    <img src="./img/profile.png" alt="Profile Icon">

                    <div class="user_info_dropdown">
                        <p style="font-weight: 700; font-size: 20px;"> @<?php echo $_SESSION['username']; ?></p>
                        <p class="email_dropdown"><?php echo $_SESSION['email']; ?></p>
                    </div>
                    
                </div>

                <hr class="divider1">

                <a href="./account_settings.php">Account Settings</a>
                <a href="./about.php">About Insightify</a> 
                <a href="./get_app.php">Get Insightify App</a>
                <a href="./privacy_policy.php">Privacy Policy</a>
                <a href="./contact.php">Contact Us</a>
                <a href="./terms.php">Terms and Condition</a>

                <hr class="divider2">

                <a href="./logout.php" style=" margin: 8px 0px;">Log Out</a> 
            </div>
            
    </div>
    

</div>

<?php include("./tools_popup.php"); ?>

<script>
    // // Add event listener for dropdown items that open the modal tab
    // const dropdownItems = document.querySelectorAll('.dropdown.dropend .dropdown-item[data-bs-toggle="modal"]');
    // dropdownItems.forEach(item => {
    //     item.addEventListener('click', function(event) {
    //         event.preventDefault();
    //         const tabToShow = this.getAttribute('data-tab');
    //         const multiTabModal = document.getElementById('multiTabModal');
    //         const tabContent = multiTabModal.querySelector(tabToShow);
    //         if (tabContent) {
    //             // Show modal if not already shown
    //             if (!multiTabModal.classList.contains('show')) {
    //                 const modal = new bootstrap.Modal(multiTabModal);
    //                 modal.show();
    //             }
    //             // Activate the tab
    //             const tab = new bootstrap.Tab(tabContent);
    //             tab.show();
    //         }
    //     });
    // });

    
</script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    function fitTextToContainer(container, textElement, maxFontSize, minFontSize) {
        const containerWidth = container.clientWidth;
        let fontSize = maxFontSize;

        textElement.style.fontSize = fontSize + "px";
        
        while (textElement.scrollWidth > containerWidth && fontSize > minFontSize) {
            fontSize -= 1;
            textElement.style.fontSize = fontSize + "px";
        }
    }

    // Target elements
    const profileDetails = document.querySelector('.sidebar .profile .details');
    const profileUsername = document.querySelector('.sidebar .profile .details h3');
    const profileEmail = document.querySelector('.sidebar .profile .details p');

    // Adjust font size for each element
    fitTextToContainer(profileDetails, profileUsername, 20, 8); // Adjust font size between 16px and 8px
    fitTextToContainer(profileDetails, profileEmail, 14, 8); // Adjust font size between 14px and 8px
});
</script>

