<?php 
	$_SESSION['to'] = (isset($_GET['to'])) ? $_GET['to'] : $_SESSION['user_id'];
?>
<html>
	<head>
		<style>
			#viewContainer #messageContainer {
				width: 95%;
				height: 500px;
				border: 1px solid #8d8d8d;
				margin-left: auto;
				margin-right: auto;
				margin-bottom: 20px;
				margin-top: 20px;
				border-radius: 5px/5px;
			}
			#viewContainer #messageContainer #recipientContainer {
				width: 400px;
				height: 100%;
				border: 1px solid #bdbcbc;
				overflow-y: auto;
				overflow-x: hidden;
				float: left;
			}
			#viewContainer #messageContainer #recipientContainer a {
				text-decoration: none;
				color: black;
			}
			#viewContainer #messageContainer #recipientContainer #recipientRow {
				width: 100%;
				height: 100px;
				border-bottom: 1px solid #bdbcbc;
			}
			#viewContainer #messageContainer #recipientContainer #recipientRow:hover {
				transition-duration: 0.5s;
				background: #b0e413;
			}
			#viewContainer #messageContainer #recipientContainer #recipientRow img {
				width: 80px;
				height: 80px;
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
			}
			/*-------------------------------------CONVERSATION CONTAINER-----------------------------*/
			
			#viewContainer #messageContainer #conversationContainer {
				width: 640px;
				height: 363px;
				float: left;
				border-bottom: 1px solid black;
				overflow-y: auto;
			}
			
			/*-----------------------------------TEXT AREA------------------------------------------------------*/
			
			#viewContainer #messageContainer textarea {
				width: 635px;
				height: 130px;
				float: left;
				resize: none;
				font-family: helvetica;
				font-size: 15px;
				position: relative;
				top: 0px;
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
			<textarea id="textarea" placeholder="Enter your message here" onkeypress="send(<?php echo $_SESSION['to'] ?>,<?php echo $_SESSION['user_id'] ?>)"></textarea>
		</div>
		<script type="text/javascript" src="../library/jquery.js"></script>
		<script type="text/javascript" src="library/js.js"></script>
	</body>
</html>