<!DOCTYPE html>
<html>
	<head>
		<style>
			#searchContainer {
				width: 700px;
				height: 50px;
				/*border: 1px solid black;*/
				margin-left: auto;
				margin-right: auto;
				margin-top: 20px;
			}
			#searchContainer img {
				margin-left: 0px;
			}
			#searchContainer span {
				font-family: helvetica;
				color: #b7b8b2;
				font-size: 25px;
				position: relative;
				left: 20px;
				top: -10px;
			}
			#searchContainer form select {
				width: 250px;
				height: 30px;
				position: relative;
				left: 190px;
				top: -10px;
				color: #b7b8b2;
				font-size: 18px;
			}
			
			/*------------------------------------------LIST CONTAINER-------------------------------------*/
			
			#listContainer {
				width: 700px;
				height: 600px;
				border: 1px solid #cdcdcb;
				margin-left: auto;
				margin-right: auto;
				margin-top: 20px;
			}
			#listContainer #title {
				width: 100%;
				height: 50px;
				border-bottom: 1px solid #cdcdcb;
				color: #b7b8b2;
			}
			#listContainer #title span {
				font-family: helvetica;
				font-size: 25px;
				position: relative;
				top: 10px;
				left: 10px;
			}
			#listContainer #requestLists {
				width: 100%;
				height: 550px;
				overflow-y: auto;
			}
			#listContainer #requestLists div {
				border-bottom: 1px solid #b2b2b2;
				font-family: helvetica;
				font-size: 20px;
			}
			#listContainer #requestLists div span {
				float: right;
				margin-right: 50px;
			}
			#listContainer #requestLists div a {
				color: black;
				text-decoration: none;
				margin-left: 10px;
			}
			#listContainer #requestLists div a:hover {
				transition-duration: 0.5s;
				color: #3d9f00;
			}
			
			/*--------------------------------------------------------------SELECT TOGGLE--------------------------------*/
			
			#approveToggle {
				font-family: helvetica;
				width: 200px;
				height: 25px;
				position: relative;
				top: -35px;
				left: 490px;
				font-size: 20px;
			}
		</style>
	</head>
	<body>
		<div id="searchContainer">
			<form action="nothing.php" method="POST">
				<img src="../images/request-dashboard.png"/><span>Approved Users</span>
			</form>
			<select id="approveToggle">
				<option>Student</option>
				<option>Employer</option>
			</select>
		</div>
		<div id="listContainer">
			<div id="title"><span>Name</span></div>
			<div id="requestLists"><br/>
				<?php
					foreach($user->get_approved_student() as $approved) {
						echo "<div><a href='".'detail.php?page=about&id='.$approved['student_id']."'>".$user->get_full_name($approved['student_id'])."</a><span></span></div><br/>";
					}
				?>
			</div>
		</div>
	</body>
</html>