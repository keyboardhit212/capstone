<?php
ob_start();
session_start();

include '../../library/config.php';
include '../../library/class.student.php';
include '../../library/class.notification.php';

$student = new Student();
$notification = new Notification();

$id = (isset($_GET['id'])) ? $_GET['id'] : '';
$achiever = (isset($_GET['achiever'])) ? $_GET['achiever'] : '';

$student->approve($id);
(($achiever == 'on') ? $student->achiever($id) : '' );
$notification->notify($id,$_SESSION['user_id'],"Your account has been approved by the administrator, You are now allowed to search for job related information that suits you well. Congratulations!");

header("location:../index.php?page=request");


