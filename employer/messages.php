<?php 
	$_SESSION['to'] = (isset($_GET['to'])) ? $_GET['to'] : $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html>
	<head>
		<style>
			#viewContainer #messageContainer {
				width: 100%;
				height: 500px;
			}
			#viewContainer #messageContainer #recipientContainer {
				width: 299px;
				height: 100%;
				float: left;
				overflow-y: auto;
				border-right: 1px solid #bababa;
			}
			#viewContainer #messageContainer #conversationContainer {
				width: 500px;
				height: 350px;
				float: left;
				overflow-y: auto;
			}
			#viewContainer textarea {
				width: 494px;
				height: 145px;
				float: left;
				resize: none;
			}
			#viewContainer #messageContainer #recipientContainer a {
				text-decoration: none;
				color: black;
			}
			#viewContainer #messageContainer #recipientContainer #recipientRow {
				width: 100%;
				height: 75px;
				border-bottom: 1px solid #bababa;
			}
			#viewContainer #messageContainer #recipientContainer #recipientRow:hover {
				transition-duration: 0.5s;
				background: #b0e413;
			}
			#viewContainer #messageContainer #recipientContainer #recipientRow img {
				width: 50px;
				height: 50px;
				border-radius: 40px/40px;
				position: relative;
				top: 5px;
			}
			#viewContainer #messageContainer #recipientContainer #recipientRow span {
				font-family: helvetica;
				font-weight: bold;
				position: relative;
				top: -25px;
				left: 10px;
				font-size: 15px;
			}
		</style>
	</head>
	<body>
		<div id="messageContainer">
			<div id="recipientContainer">
				<?php	
					foreach ($message->get_chatmate($_SESSION['user_id']) as $chatmate) {
							echo "<a href='index.php?page=messages&to=".$chatmate['message_to']."'><div id='recipientRow'><img src='".$user->get_pic($chatmate['message_to'])."'/><span>".$user->get_full_name($chatmate['message_to'])."</span></div></a>";
					}
				?>
			</div>
			<div id="conversationContainer">
			
			</div>
			<textarea id="textarea" placeholder="Enter Your Message Here..." onkeypress="send(<?php echo $_SESSION['to'] ?>,<?php echo $_SESSION['user_id'] ?>)"></textarea>
		</div>
		
	</body>
</html>