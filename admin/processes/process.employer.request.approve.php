<?php
ob_start();
session_start();

include '../../library/config.php';
include '../../library/class.employer.php';
include '../../library/class.notification.php';

$employer= new Employer();
$notification = new Notification();

$id = (isset($_GET['id'])) ? $_GET['id'] : '';

$employer->approve($id);
$notification->notify($id,$_SESSION['user_id'],"Your account has been approved by the administrator, You are now allowed to search for job candidates. Congratulations!");

header("location:../index.php?page=request");


