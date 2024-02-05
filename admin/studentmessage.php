<html>
	<head>
		<style>
			textarea {
				width: 90%;
				height: 300px;
				resize: none;
				margin: 0 auto;
				display: block;
				border-radius: 10px/10px;
			}
			#sendButton {
				height: 35px;
				border: none;
				border-radius: 10px/10px;
				font-weight: bold;
				background: #83ae00;
				color: white;
				font-size: 13px;
				position: relative;
				left: 700px;
			}
		</style>
	</head>
	<body>
		<textarea id='textarea' placeholder="Enter Your Message Here..."></textarea><br/>
		<input type="submit" name="submit" value="Send Message" id="sendButton" onclick="sendMessage(<?php echo $id; ?>,<?php echo $_SESSION['user_id'] ?>)"/>
		<script type="text/javascript" src="../library/jquery.js"></script>
		<script type="text/javascript" src="library/js.js"></script>
	</body>
</html>