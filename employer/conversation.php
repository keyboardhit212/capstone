<?php
session_start();

include '../library/config.php';
include '../library/class.message.php';
include '../library/class.user.php';

//$to = (isset($_GET['to'])) ? $_GET['to'] : $_SESSION['user_id'];

$message = new Message();
$user = new User();

?>
<!DOCTYPE html>
<html>
	<head>
		<style>
			#messageRow {
				width: 99%;
				height: auto;
				overflow-x: none;
				border-top: 1px solid #c9c5c5;
				padding-bottom: 10px;
				padding-top: 10px;
			}
			#messageRow img {
				width: 50px;
				height: 50px;
				border-radius: 25px/25px;
			}
			#messageRow #messageName {
				font-family: helvetica;
				font-weight: bold;
				position: relative;
				top: -20px;
			}
			#messageRow #textMessage {
				font-family: helvetica;
				display: block;
				margin-left: 80px;
				position: relative;
				top: 10px;
				margin-bottom: 10px;
				display: block;
			}
			#messageRow #date {
				position: relative;
				left: 78px;
				font-size: 12px;
			}
		</style>
	</head>
	<body>
		<?php
			foreach($message->get_message($_SESSION['to'],$_SESSION['user_id']) as $messages) {
				echo "<div id='messageRow'>
							&nbsp;&nbsp;<img src='".$user->get_pic($messages['message_from'])."'/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id='messageName'>".$user->get_full_name($messages['message_from'])."<br/><span id='date'>".$messages['message_date_received']." | ".$messages['message_time_received']."</span></span><br/><br/>
							<span id='textMessage'>".$messages['message']."</span>
						</div>";
			}
		?>
		
	</body>
</html>
