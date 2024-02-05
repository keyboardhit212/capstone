<?php

include '../library/config.php';
include '../library/class.notification.php';
include '../library/class.user.php';

$id = (isset($_GET['id'])) ? $_GET['id'] : '';

$notification = new Notification();
$user = new User();

header("Content-type: application/json");

$array = array();

foreach($notification->get_notification($id) as $notifications) {
	$array[] = array('notifier'=>$user->get_full_name($notifications['notification_notifier']),'content'=>$notifications['notification_description'],
	'date'=>$notifications['notification_date_added'],'time'=>$notifications['notification_time_added']);
}

echo "{\"notification\" : ".json_encode($array)."}";

