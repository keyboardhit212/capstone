<?php
ob_start();
session_start();

include '../../library/config.php';
include '../../library/class.user.php';

$user = new User();

$user->update_pic($_FILES['pic']['name'], $_SESSION['user_id']);
move_uploaded_file($_FILES['pic']['tmp_name'], "../../images/".$_FILES['pic']['name']);

header("location: ../index.php?page=about");