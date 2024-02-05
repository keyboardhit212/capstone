<?php
ob_start();
session_start();

include '../../library/config.php';
include '../../library/class.notification.php';

$notification = new Notification();

$notification->clear($_SESSION['user_id']);
