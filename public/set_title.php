<?php
session_start();
if(isset($_POST['title_id'])){
    $_SESSION['title_id'] = $_POST['title_id'];
    echo $_SESSION['title_id'];
}

else{
    exit();
}
?>