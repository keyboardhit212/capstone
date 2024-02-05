<?php
ob_start();
session_start();

include '../../library/config.php';
include '../../library/class.reference.php';

$reference = new Reference();

$url = (isset($_POST['link'])) ? $_POST['link'] : '';
$company = (isset($_POST['company'])) ? $_POST['company'] : '';
$contact = (isset($_POST['contact'])) ? $_POST['contact'] : '';
$email = (isset($_POST['email'])) ? $_POST['email'] : '';
$fname = (isset($_POST['fname'])) ? $_POST['fname'] : '';
$mname = (isset($_POST['mname'])) ? $_POST['mname'] : '';
$lname = (isset($_POST['lname'])) ? $_POST['lname'] : '';
$pic = "../images/".$_FILES['pic']['name'];

move_uploaded_file($_FILES['pic']['tmp_name'], "../../images/".$_FILES['pic']['name']);

$reference->add_reference($url,$company,$contact,$email,$fname,$mname,$lname,$pic,$_SESSION['user_id']);

header("Location:../index.php?page=reference");

