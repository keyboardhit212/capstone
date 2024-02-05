<?php
ob_start();
session_start();

include '../../library/config.php';
include '../../library/class.employer.php';
include '../../library/class.user.php';

$user = new User();
$employer = new Employer();

$pic = (isset($_FILES['pic']['name'])) ? $_FILES['pic']['name'] : '';
$fname = (isset($_POST['fname'])) ? $_POST['fname'] : '';
$mname = (isset($_POST['mname'])) ? $_POST['mname'] : '';
$lname = (isset($_POST['lname'])) ? $_POST['lname'] : '';
$birthdate = (isset($_POST['birthdate'])) ? $_POST['birthdate'] : '';
$gender = (isset($_POST['gender'])) ? $_POST['gender'] : '';
$email = (isset($_POST['email'])) ? $_POST['email'] : '';
$phone = (isset($_POST['phone'])) ? $_POST['phone'] : '';
$skype = (isset($_POST['skype'])) ? $_POST['skype'] : '';

move_uploaded_file($_FILES['pic']['tmp_name'], "../../images/".$_FILES['pic']['name']);

$user->update_pic($pic, $_SESSION['user_id']);
$user->update_name($fname, $mname, $lname, $_SESSION['user_id']);
$user->update_birthdate($birthdate, $_SESSION['user_id']);
$user->update_age($_SESSION['user_id']);
$user->update_gender($gender, $_SESSION['user_id']);
$employer->update_phone($phone, $_SESSION['user_id']);
$employer->update_email($email, $_SESSION['user_id']);
$employer->update_skype($skype, $_SESSION['user_id']);

header("location:../index.php?page=profile");


