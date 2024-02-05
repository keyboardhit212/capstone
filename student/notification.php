<!DOCTYPE html>
<html>
	<head>
		<style>
			#viewContainer #notificationContainer {
				width: 80%;
				height: 1000px;
				margin-left: auto;
				margin-right: auto;
				margin-bottom: 20px;
				margin-top: 20px;
				font-family: helvetica;
				display: block;
				overflow-y: auto;
			}
			#viewContainer #notificationContainer #notificationRow {
				width: 100%;
				min-height: 130px;
				border: 1px solid #c6c6c4;
				float: left;
				overflow: hidden;
				padding-bottom: 10px;
			}
			#viewContainer #notificationContainer #notificationRow div {
				height: 100%;
				width: 130px;
				float: left;
				overflow: hidden;
			}
			#viewContainer #notificationContainer #notificationRow span {
				position: relative;
				top: 10px;
				left: 10px;
				width: 800px;
			}
			#viewContainer #notificationContainer div #pic {
				width: 100px;
				height: 100px;
				border-radius: 50px/50px;
				display: block;
				margin-left: auto;
				margin-right: auto;
				margin-top: 10px;
			}
			#viewContainer #notificationContainer #notificationRow #name {
				font-weight: bold;
			}
			#viewContainer #notificationContainer #notificationRow #date {
				font-weight: bold;
			}
			#viewContainer #notificationContainer #notificationRow #description {
				width: 700px;
				min-height: 50px;
				float: left;
				overflow: hidden;
				padding-bottom: 10px;
				text-align: justify;
				text-indent: 20px;
				letter-spacing: 1px;
				padding-right: 10px;
			}
			
			#viewContainer #notificationContainer #notificationRow #delete {
				float: right;
				display: block;
				margin-right: 20px;
				margin-top: 10px;
			}
			
			/*------------------------NOTIFICATION TOGGLE--------------------*/
			
			#studentNotificationToggle {
				width: 150px;
				position: relative;
				left: 840px;
				top: 10px;
			}
		</style>
	</head>
	<body>
		<select id="studentNotificationToggle">
			<option value="All">All</option>
			<option value="Important">Important</option>
		</select>
		<div id="notificationContainer">
			<?php
				foreach($notification->get_notification($_SESSION['user_id']) as $notifications) {
					echo "<div id='notificationRow'><div><img src='".$user->get_pic($notifications['notification_notifier'])."' id='pic'/></div><span id='name'>".$user->get_full_name($notifications['notification_notifier'])."</span><a href='processes/process.notification.delete.php?date=".$notifications['notification_date_added']."&time=".$notifications['notification_time_added']."' id='delete'><img src='../images/reject.png'/></a><br/><br/><span id='date'>".$notifications['notification_date_added']." | ".$notifications['notification_time_added']."</span><br/><br/><div id='description'><span>".$notifications['notification_description']."</span></div></div>";
				}
			?>
		</div>
		<script src="../library/jquery.js" type="text/javascript"></script>
		<script src="library/js.js" type="text/javascript"></script>  
	</body>
</html>