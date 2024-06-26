<?php

include ('connection.php');

$collection_id = $_SESSION['collection_id'];

$sql = "SELECT b.entry_id, a.title_id, b.entry_name
FROM collection_titles a
LEFT JOIN title_entries b ON b.title_id = a.title_id WHERE a.collection_id='$collection_id';";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['entry_id'] != NULL) {
            ?>
            <label class="switch <?php echo $row['title_id']; ?> entries" id="<?php echo $row['entry_id'] ?>" style="display: none;">
                <input type="checkbox" class="left-checkbox">
                <span class="checkbox-container"></span>
                <?php echo $row['entry_name']; ?>
            </label>
            <?php
        }
    }
}
?>