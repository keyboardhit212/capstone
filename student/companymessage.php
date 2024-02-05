<?php
	$company_id = (isset($_GET['company_id'])) ? $_GET['company_id'] : '';
?>
<!DOCTYPE html>
<html>
	<head>
		<style>
			#textarea {
				width: 99%;
				height: 75%;
				border-radius: 10px/10px;
				resize: none;
				display: block;
				margin: 0 auto;
			}
			button {
				height: 30px;
				background: #769b07;
				color: white;
				border: none;
				font-family: helvetica;
				border-radius: 5px/5px;
				font-weight: bold;
				margin-left: 550px;
			}
		</style>
	</head>
	<body>
		<textarea id="textarea" placeholder="Write Your Message Here"></textarea><br/>
		<button onclick="message(<?php echo $_SESSION['user_id']; ?>,<?php echo $company_id; ?>)">Send Message </button>
		<script type="text/javascript" src="../library/jquery.js"></script>
		<script type="text/javascript" src="library/js.js"></script>
	</body>
<html>