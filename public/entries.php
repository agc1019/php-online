<?php
session_start();

if(isset($_SESSION['username']) && isset($_SESSION['email'])) {
if(isset($_SESSION['title_id'])){
if($_SESSION['title_id'] != 0){

    include ('./connection.php');

?>


<html>

    <head>
        <title>Entries - Insightify</title>
        <link rel="icon" href="./logo/symbol_blue.png">

        <meta charset="UTF-8"> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- STYLESHEETS -->
        <link rel="stylesheet" href="./css/entries.css">
        <link rel="stylesheet" href="./css/sidebar.css">
        <link rel="stylesheet" href="./css/profile_dropdown.css">
        <link rel="stylesheet" href="./css/tools_popup.css">

        <!-- ICONS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
       
        <!-- BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        
        

        <!-- SCRIPTS -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="./js/dropdown_header.js" defer> </script>
        <script src="./js/dashboard.js" defer></script>
        <script src="./js/entries.js" defer></script>
    </head>



    <body>
        
        <!-- SIDEBAR & Navigation bar-->
        <?php include("./sidebar.php"); ?>

        <div class="main">

            <!-- ACTUAL CONTENT -->
            <div class="content">

                <div class="title">
                    <div>
                        <p class="title_header">Your Entries</p>
                        <p class="subtitle">add and view entries from your title</p>
                    </div>
                </div>

                 
                <?php include("./entries_title_header.php"); ?>


                <!-- ENTRIES LIST HEADER & entries list & OFFCANVAS -->

                <?php include("./entries_content.php"); ?>

                <br><hr><br>

                <p style="font-weight: 700; font-size: 25px;">try out these tools</p>

                <!-- OTHER TOOLS -->
                 <div class="tools_container">

                    <div class="row">
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
            
        </div>

        <?php include("./tools_popup.php"); ?>

        <!-- DELETE TITLE POPUP -->
        <div class="modal fade" id="delete-title-popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body p-5">
                        <div class="text-center mb-4"> <i class="fas fa-question-circle fa-spin fa-3x" style="color: #005CD6;"></i> </div>
                        <h1>Are you sure?</h1>
                        <p>do you really want to delete this title? this process cannot be undone.</p>

                        <div class="container-fluid"> <div class="row">
                            <div class="col-6"> <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            </div>
                            <div class="col-6"> <button type="button" class="btn btn-danger" data-bs-toggle="modal" onclick="DeleteTitles();">Delete</button>
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
                            <button type="button" id="exit-saved" class="btn btn-primary" onclick="window.location.href='collection.php'" data-bs-dismiss="modal" aria-label="Exit">Okay</button>
                        </div>
                    </div>
                </div>
            </div>
        </body>


        <!-- DELETE ENTRY POPUP -->
        <div class="modal fade" id="delete-entry-popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body p-5">
                        <div class="text-center mb-4"> <i class="fas fa-question-circle fa-spin fa-3x" style="color: #005CD6;"></i> </div>
                        <h1>Are you sure?</h1>
                        <p>do you really want to delete this entry? this process cannot be undone.</p>

                        <div class="container-fluid"> <div class="row">
                            <div class="col-6"> <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            </div>
                            <div class="col-6"> <button type="button" class="btn btn-danger" data-bs-toggle="modal">Delete</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


            <!-- ENTRY DELETED POPUP -->
            <div class="modal fade" id="entry-deleted-popup" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content title-deleted">
                        <div class="modal-body">
                            <i class="fas fa-trash-alt fa-2x trash-animation"></i>
                            <h1>Entry successfully <br> deleted!</h1>
                            <button type="button" id="exit-saved" class="btn btn-primary" onclick="window.location.href='entries.php'" data-bs-dismiss="modal" aria-label="Exit">Okay</button>
                        </div>
                    </div>
                </div>
            </div>
        </body>


</html>
<script>
    function DeleteTitles(){
        const title_id = '<?php echo $_SESSION['title_id']; ?>';
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

    function DeleteEntry(){
        const DeleteModal = new bootstrap.Modal(document.getElementById('entry-deleted-popup'));
        DeleteModal.show(); 
        var text_id = document.getElementById('delete_text_id').textContent;
        $.ajax({
            type: 'POST',
            url: './delete_entry.php',
            data: {
                text_id: text_id,
            },
            success: function (response) {
            DeleteModal.show(); 
            }
        });
    }
</script>
<?php
}else{
header("location: ./collection.php");
}
}
else{
 header("location: ./collection.php");
}
}
else{
    header("location: ./homepage.php");
}

?>