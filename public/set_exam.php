<?php

session_start();

$_SESSION['exam_number'] = $_POST['number'];
$_SESSION['prompt'] = $_POST['prompt'];
$_SESSION['type'] = $_POST['type'];


?> 