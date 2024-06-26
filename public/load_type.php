<?php

include ("./connections.php");


?>

<div class="col-12">
    <select id="type" class="form-select" id="validationSelectType" required>
        <option selected disabled value="">Choose from different types</option>
        <?php
        $sql = "select type_desc from type";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <option><?php echo $row['type_desc'] ?></option>
                <?php
            }
        }
        ?>

    </select>
    <div class="invalid-feedback">
        Please choose a type.
    </div>
</div>