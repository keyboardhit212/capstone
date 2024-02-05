<?php
ob_start();
session_start();

include '../../library/config.php';
include '../../library/class.credential.php';

$title = (isset($_POST['title'])) ? $_POST['title'] : '';
$type = (isset($_POST['type'])) ? $_POST['type'] : '';

$credential = new Credential();

$credential->insert_credential($title, "../files/".$_FILES['file']['name'], $_SESSION['user_id'], $type);

move_uploaded_file($_FILES['file']['tmp_name'], "../../files/".$_FILES['file']['name']);

header("location: ../index.php?page=credential");