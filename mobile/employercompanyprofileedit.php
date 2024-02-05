<?php

include '../library/config.php';
include '../library/class.company.php';

$company = new Company();

$id = (isset($_GET['id'])) ? $_GET['id'] : '';
$name = (isset($_POST['name'])) ? $_POST['name'] : '';
$address = (isset($_POST['address'])) ? $_POST['address'] : '';
$email = (isset($_POST['email'])) ? $_POST['email'] : '';
$phone = (isset($_POST['phone'])) ? $_POST['phone'] : '';
$website = (isset($_POST['website'])) ? $_POST['website'] : '';
$description = (isset($_POST['description'])) ? $_POST['description'] : '';
$link = (isset($_POST['link'])) ? $_POST['link'] : '';

$company->update_name($name, $id);
$company->update_address($address, $id);
$company->update_email($email, $id);
$company->update_phone($phone, $id);
$company->update_url($website, $id);
$company->update_description($description, $id);
$company->update_link($link, $id); 