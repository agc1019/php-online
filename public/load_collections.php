<?php
include ('./connection.php');


if ($_SESSION['collection_id'] !== NULL) {
    $collection_id = $_SESSION['collection_id'];
    $sql = "SELECT * from collection_titles where collection_id='$collection_id' ORDER BY title_id DESC";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>

            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-1">
                        <img src="./img/default.jpg" class="img-fluid rounded-start" alt="...">
                    </div>

                    <div class="col-md-11">
                        <div class="card-body">
                            <table id="<?php echo $row['title_id'] ?>" onclick="Toentries(this.id);">
                                <tr>
                                    <td class="title_and_date">
                                        <p id="" style="justify-content: left;"> <?php echo $row['title_name']; ?> </p>
                                        <p class="card-text" style="justify-content: left; font-weight: 400;"><small
                                                class="text-body-secondary">Last opened 3 mins ago</small></p>

                                    </td>

                                    <td class="author">
                                        <p><?php echo $row['author']; ?></p>
                                    </td>

                                    <td class="type">
                                        <p><?php echo $row['type']; ?></p>
                                    </td>

                                    <td class="genre">
                                        <p><?php echo $row['genre']; ?></p>
                                    </td>
                                </tr>
                            </table>

                            <div class="buttons">
                                <button class="heart"><i class="fas fa-heart"></i></button>
                                <button class="delete" data-bs-toggle="modal" value="<?php echo $row['title_id'] ?>" onclick="DeleteTitles(this.value);"><i
                                        class="fas fa-trash-alt"></i></button>
                            </div>


                        </div>

                    </div>
                </div>
            </div>

            <?php
        }
    }
} else {
    ?>

    <div class="empty-container text-center mt-3 mb-5">
        <img src="./graphics/empty.svg" alt="">

        <p class="card-text mt-3 fw-bold lh-1">Add new titles to fill your collection <br> and save future entries </p>
    </div>



    </div>
<?php
}
mysqli_close($conn);

?>