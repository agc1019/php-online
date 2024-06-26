<?php

include('connection.php');

$collection_id = $_SESSION['collection_id'];

$sql = "SELECT * FROM collection_titles WHERE collection_id='$collection_id'";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
?>


<label class="switch" id="<?php echo $row['title_id'] ?>">
 <input type="checkbox" class="left-checkbox " id="<?php echo $row['title_id'] ?>" onchange="toggleEntries(this.id)">
        <span class="checkbox-container"></span>
        <?php echo $row['title_name']; ?>
    </label>

    <?php
}
}
    ?> 