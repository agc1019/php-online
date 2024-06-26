<?php
include ('connection.php');


    $collection_id = $_SESSION['collection_id'];
    $sql = "SELECT * from collection_titles where collection_id='$collection_id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>

<option value="<?php echo $row['title_id'] ?>"><?php echo $row['title_name'] ?> </option>

<?php
        }
    }
    ?>