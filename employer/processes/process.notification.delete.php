<?php
ob_start();
session_start();

include '../../library/config.php';
include '../../library/class.notification.php';

$date = (isset($_GET['date'])) ? $_GET['date'] : '';
$time = (isset($_GET['time'])) ? $_GET['time'] : '';

$notification = new Notification();

$notification->delete_notification($_SESSION['user_id'],$date,$time);

header("location:../index.php?page=notification");
