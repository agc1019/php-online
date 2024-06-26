<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['email'])) {

    ?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Assessment AI Generated - Insightify</title>
        <link rel="icon" href="./logo/symbol_blue.png">

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Link for Fontawesome -->
        <script src="https://kit.fontawesome.com/ed08dfa832.js" crossorigin="anonymous"></script>
        <!-- Link for CSS -->
        <link rel="stylesheet" href="./css/ai_assessment.css">
        <!-- External JS -->
        <script src="./js/ai_assessment.js" defer></script>

        <!-- FOR SIDEBAR -->
        <script src="./js/dashboard.js" defer></script>
        <script src="./js/dropdown_profile.js" defer></script>
        <link rel="stylesheet" href="./css/sidebar.css">
        <link rel="stylesheet" href="./css/tools_popup.css">

        <!-- BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        
        


    </head>

    <body>
        <!-- SIDEBAR -->
        <?php include ("sidebar.php"); ?>


        <!-- CONTENT SIDE-->
        <div class="main">

            <div class="content">
                <div class="title">
                    <div>
                        <p class="title_header">AI Generated</p>
                        <p class="subtitle">generate an assessment throught AI</p>
                    </div>
                </div>

                <br>

                <!-- ASSESSMENT -->
                <form class="row g-3 needs-validation" novalidate id="">
                    <div class="row-title">
                        <h1 class="mini-title"><b>test name</b> </h1>
                        <img class="ic_num" src="./img/ic_1.png" alt="icon">
                    </div>

                    <div class="col-12">
                        <input type="text" class="form-control title-input" id="test_name" value="" required onfocus="this.style.background = '#BFD6F5'; this.style.boxShadow = '0 0 4px grey'; this.style.border = 'none';">

                        <div class="invalid-feedback">
                            Please enter a name.
                        </div>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>


                    <div class="row-container">
                    <p>pick content to include in the test</p>
                    <div class="column-container">
                        <div class="left-column">
                            <div class="row-title">
                                <h1 class="big-title"><b>choose from your</b>
                                    <span>
                                        <button>titles</button>
                                    </span>
                                </h1>
                                <img class="ic_num" src="./img/ic_2.png" alt="icon" style="margin-top: -6px; margin-left: 2px;">
                            </div>

                            <div class="checkboxes" id="titleCheckboxes">
                                <!-- <label class="switch">
                                    <input type="checkbox" id="select-all-title" onchange="selectAll('titleCheckboxes');">
                                    <span class="checkbox-container"></span>
                                    Select All
                                </label> -->

                                <!-- Title checkboxes will be here -->
                                <?php include('ai_choose_title.php'); ?>
                            </div>

                        </div>
                        <div class="right-column">
                            <div class="row-title">
                                <h1 class="big-title"><b>choose from your</b>
                                    <span>
                                        <button>entries</button>
                                    </span>
                                </h1>
                                <img class="ic_num" src="./img/ic_3.png" alt="icon"  style="margin-top: -6px; margin-left: 2px;">
                            </div>

                            <div class="checkboxes" id="entryCheckboxes">
                                <!-- <label class="switch">
                                    <input type="checkbox" id="select-all-entry" onchange="selectAll('entryCheckboxes');">
                                    <span class="checkbox-container"></span>
                                    Select All
                                </label> -->

                                <!-- Entry checkboxes will be here -->
                                <?php include('ai_choose_entries.php'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="column-container mt-5">
                        <div class="right-column">
                            <div class="row-title">
                                <h1 class="mini-title"><b>number of items</b></h1>
                                <img class="ic_num" src="./img/ic_4.png" alt="icon">
                            </div>

                            <div class="counter-container">
                                <button class="counter-btn" onclick="decreaseCount()" type="button">-</button>
                                <input type="text" id="counter" class="counter-input" value="1" onchange="updateCount()" required>
                                <button class="counter-btn" onclick="increaseCount()" type="button">+</button>
                            </div>
                        </div>
                    </div>

                    
                    <div class="button">
                        <button class="btn-success" type="submit" id="createBtn">Create</button>
                        <button class="btn-danger" type="button"
                            data-bs-target="#generated-ass-popup" id="cancelBtn" onclick="window.location='./assessment.php';">Cancel</button>
                    </div>
                </form>

                


                <!-- GENERATING ASSESSMENT POPUP -->
                <div class="modal fade" id="generating-ass-popup" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="generating-container">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <h1>Generating assessment...</h1>
                            <p>please wait</p>
                        </div>
                    </div>
                </div>

                <!-- TEST GENERATED POPUP -->
                <div class="modal fade" id="generated-ass-popup" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content generated-container">
                            <div class="modal-body">
                                <div class="generated-container">
                                    <img class="ic-popup" src="./img/ic_check.png">
                                    <h1>Assessment successfully <br> generated!</h1>
                                    <p>do you want to view the test?</p>
                                    <div class="button-container">
                                        <button type="button" id="editTestBtn" class="btn btn-secondary" onclick="window.location='./edit_assessment.php';">
                                            <i class="fas fa-edit"></i> I want to edit 
                                        </button>

                                        <button type="button" id="viewTestBtn" class="btn btn-primary" onclick="window.location='./flashcards.php';">
                                            <i class="fas fa-eye"></i> View the test
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <!-- MODAL POPUP FOR ENTER TEXT -->
            <div class="modal fade" id="enterText" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Type your text here</b></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body pt-5 ps-5 pe-5 pb-1">
                            <div class="enter-text-container">
                                <h1>Your text</h1>
                                <textarea id="input-text" name="message"
                                    placeholder="Enter or paste your text here..."></textarea>
                            </div>
                        </div>

                        <div class="modal-container">
                            <div class="file-upload-container">
                                <input type="file" id="uploadBtn" accept=".jpeg,.jpg,.png,.pdf,.doc,.docx">
                                <label for="uploadBtn"><i class="fa-solid fa-upload"></i>Upload File</label>
                                <div class="progress-bar" id="progressBar"></div>
                            </div>

                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <button id="simplifyBtn" type="button" class="simplify">Simplify</button>
                                <button id="paraphraseBtn" type="button" class="paraphrase">Paraphrase</button>
                                <button id="translateBtn" type="button" class="translate">Translate</button>
                            </div>
                        </div>

                        <div class="modal-body p-5">
                            <h1>Paraphrased text:</h1>
                            <textarea name="message" readonly></textarea>

                            <div class="icon-container">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="copyDropdown"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-copy icon"></i> Copy
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="copyDropdown">
                                        <li><a class="dropdown-item copy-your-text" href="#">Your Text</a></li>
                                        <li><a class="dropdown-item copy-paraphrased-text" href="#">Paraphrased Text</a>
                                        </li>
                                    </ul>
                                </div>
                                <button class="delete-button"><i class="fa-solid fa-trash-alt icon"></i>Reset</button>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save Entry</button>
                        </div>
                    </div>
                </div>
            </div>

            <script>

                function toggleEntries(entry_identify) {
                    const elements = document.getElementsByClassName(entry_identify);
                    for (const element of elements) {
                        element.style.display = element.style.display === 'block' ? 'none' : 'block';
                    }
                }

                document.addEventListener('DOMContentLoaded', () => {
                'use strict';

                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                const forms = document.querySelectorAll('.needs-validation');

                // Loop over them and prevent submission
                Array.from(forms).forEach(form => {
                    form.addEventListener('submit', event => {
                        event.preventDefault();
                        event.stopPropagation();

                        if (form.checkValidity() && validateCheckboxes()) {
                            // Form is valid, and checkboxes are validated
                            $('#generating-ass-popup').modal('show'); // Show the generating assessment modal

                            // Simulate async operation for generating test
                            GenerateTest().then(() => {
                                console.log("Test generation successful");
                                $('#generating-ass-popup').modal('hide'); // Hide generating modal
                                setTimeout(() => {
                                    $('#generated-ass-popup').modal('show'); // Show generated assessment modal
                                }, 1000);
                            }).catch(error => {
                                console.error("Error generating test:", error);
                                $('#generating-ass-popup').modal('hide'); // Hide generating modal in case of error
                                alert("Failed to generate the test. Please try again.");
                            });
                        } else {
                            // Form is not valid
                            form.classList.add('was-validated');
                            alert("Please fill out the form correctly and select at least one title and entry.");
                        }
                    }, false);
                });

                function validateCheckboxes() {
                    const titleCheckboxes = document.querySelectorAll('#titleCheckboxes input[type="checkbox"]');
                    const entryCheckboxes = document.querySelectorAll('#entryCheckboxes input[type="checkbox"]');

                    const titleChecked = Array.from(titleCheckboxes).some(checkbox => checkbox.checked);
                    const entryChecked = Array.from(entryCheckboxes).some(checkbox => checkbox.checked);

                    return titleChecked && entryChecked;
                }

                async function GenerateTest() {
                    try {
                        const titles = [];
                        const test_name = document.getElementById("test_name").value;
                        const counter = document.getElementById("counter").value;
                        const entries = document.querySelectorAll('.entries');

                        entries.forEach(entry => {
                            if (entry.style.display === "block" && entry.children[0].checked) {
                                titles.push(entry.id);
                            }
                        });

                        if (titles.length > 0 && test_name) {
                            console.log('Making AJAX request with data:', {
                                result: JSON.stringify(titles),
                                collection_id: "<?php echo $_SESSION['collection_id']; ?>",
                                test_name: test_name,
                                counter: counter,
                            });

                            const response = await $.ajax({
                                type: 'POST',
                                url: 'generate_test.php',
                                data: {
                                    result: JSON.stringify(titles),
                                    collection_id: "<?php echo $_SESSION['collection_id']; ?>",
                                    test_name: test_name,
                                    counter: counter,
                                }
                            });

                            console.log('Response from server:', response);

                            if (response === "Success") {
                                return Promise.resolve(); // Resolve the promise
                            } else {
                                throw new Error("Failed to generate test: " + response); // Reject the promise if there's an error
                            }
                        } else {
                            alert('Choose an entry and provide a test name');
                            throw new Error("Validation error: No titles selected or test name is missing.");
                        }
                    } catch (error) {
                        console.error('Error generating test:', error);
                        return Promise.reject(error); // Reject the promise with the error
                    }
                }

            });

    
            </script>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

        <!-- Bootstrap JS and dependencies (e.g., Popper.js) -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    </body>

    </html>

    <?php
} else {
    header("location: ./homepage.php");
}
?>