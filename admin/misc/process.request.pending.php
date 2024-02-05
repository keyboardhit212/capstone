<?php

include '../../library/config.php';
include '../../library/class.notification.php';

$notification = new Notification();

header('Content-Type: application/json');

echo json_encode($notification->get_pending_request());