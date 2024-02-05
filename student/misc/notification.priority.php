<?php
	session_start();
	
	include '../../library/config.php';
	include '../../library/class.user.php';
	include '../../library/class.notification.php';
	
	$user = new User();
	$notification = new Notification();

	foreach($notification->get_prioritized_notification($_SESSION['user_id']) as $notifications) {
		echo "<div id='notificationRow'><div><img src='".$user->get_pic($notifications['notification_notifier'])."' id='pic'/></div><span id='name'>".$user->get_full_name($notifications['notification_notifier'])."</span><a href='processes/process.notification.delete.php?date=".$notifications['notification_date_added']."&time=".$notifications['notification_time_added']."' id='delete'><img src='../images/reject.png'/></a><br/><br/><span id='date'>".$notifications['notification_date_added']." | ".$notifications['notification_time_added']."</span><br/><br/><div id='description'><span>".$notifications['notification_description']."</span></div></div>";
	}
?>