<!DOCTYPE html>
<html>
	<head>
		<style>
			#viewContainer #pic {
				width: 150px;
				height: 150px;
				border: 1px solid black;
				margin-left: auto;
				margin-right: auto;
				border-radius: 75px/75px;
				margin-top: 30px;
				overflow: hidden;
			}
			#viewContainer #pic img {
				width: 100%;
				height: 100%;
				border-radius: 75px/75px;
			}
			
				/*------------------------------------JOB FORM---------------------------*/
			
		#viewContainer form {
			font-family: helvetica;
			position: relative;
			top: 50px;
		}		
		#viewContainer form .text {
			position: relative;
			left: 150px;
			color: #414340;
			font-size: 20px;
			font-weight: bold;
		}
		#viewContainer form .textField {
			width: 600px;
			height: 25px;
			position: relative;
			top: 5px;
			left: 120px;
			border: 2px solid #868686;
			font-size: 20px;
			border-radius: 10px;
		}
		
		#viewContainer form textarea {
			width: 600px;
			height: 150px;
			position: relative;
			top: 5px;
			left: 120px;
			border: 2px solid #868686;
			font-size: 20px;
			border-radius: 10px;
			resize: none;
		}
		
		#viewContainer form select {
			width: 600px;
			height: 25px;
			position: relative;
			top: 5px;
			left: 120px;
			border: 2px solid #868686;
			font-size: 20px;
			border-radius: 10px;
		}
	
		#viewContainer form #button {
			position: relative;
			top: 100px;
			left: 560px;
			width: 150px;
			height: 30px;
			border-radius: 5px/5px;
			font-size: 20px;
			color: #3f4440;
			font-weight: bold;
			background: #aee702;
		}
		
		/*----------------------------------------------------LOWER CONTAINER-------------------------------------------*/
			
			#lowerContainer {
				width: 700px;
				height: auto;
				/*border: 1px solid black;*/
				margin-left: auto;
				margin-right: auto;
				margin-top: 20px;
				overflow: hidden;
			}
			
			#lowerContainer #contactText {
				font-family: helvetica;
				font-weight: bold;
				color: #404340;
				display: block;
				text-align: center;
				font-size: 22px;
			}
			
			#lowerContainer #email {
				width: 700px;
				height: auto;
				/*border: 1px solid black;*/
				float: left;
				margin-top: 25px;
			}
			
			#lowerContainer #email .left {
				font-family: helvetica;
				color: #404340;
				float: left;
				margin-left: 30px;
			}
			
			#lowerContainer #email .right {
				font-family: helvetica;
				color: #404340;
				float: right;
				font-weight: bold;
				margin-right: 30px;
			}
			
			#lowerContainer #contact {
				width: 700px;
				height: auto;
				/*border: 1px solid black;*/
				float: left;
				margin-top: 25px;
			}
			
			#lowerContainer #contact .left {
				font-family: helvetica;
				color: #404340;
				float: left;
				margin-left: 30px;
			}
			
			#lowerContainer #contact .right {
				font-family: helvetica;
				color: #404340;
				float: right;
				font-weight: bold;
				margin-right: 30px;
			}
			
			#lowerContainer #contact .right #links {
				width: 100px;
				height: auto;
				/*border: 1px solid black;*/
				position: relative;
				left: -100px;
			}
			
			#lowerContainer #edit {
				width: 190px;
				height: 40px;
				float: left;
				margin-left: 270px;
				margin-top: 70px;
				margin-bottom: 20px;
				background: #aee702;
				border-radius: 5px/5px;
			}
			
			#lowerContainer #edit span {
				font-family: helvetica;
				font-weight: bold;
				color: #404340;
				text-align: center;
				display: block;
				font-size: 22px;
				margin-top: 7px;
			}
		</style>
	</head>
	<body>
		<div id="pic"><img src="<?php echo $user->get_pic($_SESSION['user_id']); ?>"/></div>
		<div id="lowerContainer">
			<span id="contactText">Personal Information</span><br/>
			<div id="email">
				<span class="left">Name</span><span class="right"><?php echo $user->get_full_name($_SESSION['user_id']); ?></span>
			</div>
			<div id="contact">
				<span class="left">Birthdate</span><span class="right"><?php echo $user->get_birthdate($_SESSION['user_id']); ?></span>
			</div>
			<div id="contact">
				<span class="left">Gender</span><span class="right"><?php echo ($user->get_gender($_SESSION['user_id']) == 1) ? 'Male' : 'Female'; ?></span>
			</div>
			<div id="contact">
				<span class="left">Email</span><span class="right"><?php echo $employer->get_email($_SESSION['user_id']); ?></span>
			</div>
			<div id="contact">
				<span class="left">Phone No.</span><span class="right"><?php echo $employer->get_phone($_SESSION['user_id']); ?></span>
			</div>
			<div id="contact">
				<span class="left">Skype Name</span><span class="right"><?php echo $employer->get_skype($_SESSION['user_id']); ?></span>
			</div>
			<a href="index.php?page=editprofile"><div id="edit"><span>Edit Profile</span></div></a>
		</div>
	</body>
</html>