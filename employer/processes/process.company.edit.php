<?php
ob_start();
session_start();

include '../../library/config.php';
include '../../library/class.company.php';

$company = new Company();

$pic = (isset($_FILES['pic']['name'])) ? $_FILES['pic']['name'] : '';
$name = (isset($_POST['company'])) ? $_POST['company'] : '';
$address = (isset($_POST['address'])) ? $_POST['address'] : '';
$email = (isset($_POST['email'])) ? $_POST['email'] : '';
$phone = (isset($_POST['phone'])) ? $_POST['phone'] : '';
$url = (isset($_POST['url'])) ? $_POST['url'] : '';
$description = (isset($_POST['description'])) ? $_POST['description'] : '';
$link = (isset($_POST['link'])) ? $_POST['link'] : '';

move_uploaded_file($_FILES['pic']['tmp_name'], "../../images/".$_FILES['pic']['name']);

$company->update_pic($pic, $_SESSION['user_id']);
$company->update_name($name, $_SESSION['user_id']);
$company->update_address($address, $_SESSION['user_id']);
$company->update_email($email, $_SESSION['user_id']);
$company->update_phone($phone, $_SESSION['user_id']);
$company->update_url($url, $_SESSION['user_id']);
$company->update_description($description, $_SESSION['user_id']);
$company->update_link($link, $_SESSION['user_id']);

header("location:../index.php?page=company");

