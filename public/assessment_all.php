<?php

include ('connection.php');

if ($_SESSION['collection_id'] != NULL) {
    $collection_id = $_SESSION['collection_id'];
    $sql = "SELECT a.test_id,a.collection_id,a.title_id,b.score_id,a.test_name, c.title_name, b.score, a.no_of_items, a.date_created, a.last_modified, a.test_type
FROM test a
LEFT JOIN test_score b ON b.test_id = a.test_id
LEFT JOIN collection_titles c ON c.title_id = a.title_id WHERE a.collection_id='$collection_id' ORDER BY a.test_id DESC";

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>


 

            <div class="test card mb-3 p-3"> <!-- card -->
                <div class="card-body p-0 pb-4 border-bottom row">
                    <div id="<?php echo $row['test_id']; ?>" class="col" onclick="NextPage(this.id)">
                        <h1 class="card-title fw-bold" style="font-size: 30px;"><?php echo $row['test_name']; ?></h1>
                        <div class="d-flex align-content-center " style="height: 30px; color: #005CD6;">

                            <p class="card-text fw-bold"><?php echo $row['no_of_items']; ?> items</p>
                            <div class="mx-3" style="width: 2px;height: 100% ; background-color: #005CD6;"></div>
                            <p class="card-text"><?php echo $row['title_name']; ?></p>

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
                        <button class="btn btn-link p-0 trash-btn" style="color: #FF5757;" data-bs-toggle="modal"
                            onclick="DeleteTest(this.value);" value="<?php echo $row['test_id']; ?>">
                            <i class="fa-solid fa-trash fa-xl"></i>
                        </button>
                    </div>

                </div>
                <div class="card-body p-0 d-flex mt-3 lh-1" style="height: 90px;">
                    <div class="col-2 lh-1 ">
                        <p class="card-text fw-semibold">
                            Recent Score:
                        </p>
                        <h1 class="card-title fw-bold" style="color: #005CD6; font-size: 30px;">
                            <?php if ($row['score'] !== null) {
                                echo $row['score'];
                            } else {
                                echo 0;
                            } ?>/20
                        </h1>
                    </div>
                    <div class="col-2 lh-1 ">
                        <p class="card-text fw-semibold">
                            Highest Score:
                        </p>
                        <h1 class="card-title fw-bold" style="color: #005CD6; font-size: 30px;">
                            <?php if ($row['score'] !== null) {
                                echo $row['score'];
                            } else {
                                echo 0;
                            } ?>/20
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
                            <?php echo $row['last_modified']; ?>
                        </p>
                        <p class="card-text fw-medium">
                            <?php echo $row['date_created']; ?>
                        </p>
                        <p class="card-text fw-medium">
                            <?php echo $row['test_type']; ?>
                        </p>

                    </div>
                </div>
            </div>

            <?php
        }
    } else {

        ?>
        <div class="empty card text-center">
            <img src="./graphics/empty.svg" alt="">
            
            <p class="card-text mt-3 fw-bold lh-1">Create assessments based <br> on your titles and entries</p>

            <button type="button" class="btn btn-primary fw-bold mx-auto fs-5 " style="width: fit-content; " data-bs-toggle="modal" data-bs-target="#empty">Create Test</button> 
        </div>
    <?php 

    }
 
} else {

    
}
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
               var delete_test = "";
                function NextPage(clicked_id) {
                    $.ajax({
                        type: "POST",  //type of method
                        url: "set_test.php",  //your page
                        data: { test_id: clicked_id },// passing the values
                        success: function (res) {
                            location.href = "./flashcards.php";
                        }
                    });
                }
                
            </script>
            