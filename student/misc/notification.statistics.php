<?php
session_start();

include '../../library/config.php';
include '../../library/class.notification.php';
include '../../library/class.message.php';

$notification = new Notification();
$message = new Message();

$array[] = array('notification'=>$notification->notification_count($_SESSION['user_id']),'message'=>$message->message_count($_SESSION['user_id']));

header('Content-Type: application/json');

echo json_encode($array);

