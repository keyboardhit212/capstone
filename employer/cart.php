<!DOCTYPE html>
<html>
	<head>
		<style>
			#viewContainer #cartHeader {
				width: 100%;
				height: 40px;
				background: #292222;
				font-family: helvetica;
			}
			#viewContainer #cartHeader span {
				color: white;
				font-size: 23px;
				position: relative;
				left: 50px;
				top: 5px;
			}
			#viewContainer #row {
				font-family: helvetica;
				font-size: 18px;
				border-bottom: 1px solid gray;
				height: 30px;
			}
			#viewContainer #row a {
				position: relative;
				top: 5px;
				text-decoration: none;
			}
			#viewContainer #row a #name {
				margin-left: 10px;
				color: black;
			}
			#viewContainer #row a #name:hover {
				transition-duration: 0.5s;
				color: green;
			}
			#viewContainer #row #profession {
				margin-left: 50px;
				position: relative;
				top: 5px;
			}
			#viewContainer #row #deleteRecord {
				float: right;
				margin-right: 50px;
			}
		</style>
	</head>
	<body>
		<div id="cartHeader"><span>Shortlist</span></div>
		<br/>
		<?php
			foreach($cart->get_saved_student($_SESSION['user_id']) as $students) {
				echo "<div id='row'><a href='detail.php?page=about&id=".$students['student_id']."'><span id='name'>".$user->get_full_name($students['student_id'])."</span></a><span id='profession'>Application Developer</span><a href='processes/process.cart.delete.php?stud_id=".$students['student_id']."' id='deleteRecord'><img src='../images/delete.png'/></a></div><br/>";
			}
		?>
	</body>
</html>