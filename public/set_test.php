<?php
session_start();
if(isset($_POST['test_id'])){
    $_SESSION['test_id'] = $_POST['test_id'];
    exit();
}

else{
    exit();
}
?>