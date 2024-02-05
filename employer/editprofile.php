<!DOCTYPE html>
<html>
	<head>
		<style>
			#viewContainer #informationHeader {
				float: left;
				width: 100%;
				height: 40px;
				background: #414340;
				border-top-left-radius: 10px;
				border-top-right-radius: 10px;
			}
			
			#viewContainer #informationHeader span {
				color: white;
				font-family: helvetica;
				font-weight: bold;
				font-size: 25px;
				position: relative;
				left: 70px;
				top: 5px;
			}
		
			#viewContainer #pic {
				width: 150px;
				height: 150px;
				margin-left: auto;
				margin-right: auto;
				border-radius: 75px/75px;
				margin-top: 70px;
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
		</style>
	</head>
	<body>
		<div id="informationHeader"><span>Edit Profile</span></div>
		<div id="pic"><img src="<?php echo $user->get_pic($_SESSION['user_id']); ?>"/></div>
		<form action="processes/process.profile.edit.php" method="POST" enctype="multipart/form-data">
			<span class="text">Profile Picture</span><br/>
			<input type="file" name="pic" class="textField" /><br/><br/><br/>
			<span class="text">First Name</span><br/>
			<input type="text" name="fname" placeholder="First Name" required class="textField" value="<?php echo $user->get_fname($_SESSION['user_id']); ?>"/><br/><br/><br/>
			<span class="text">Middle Name</span><br/>
			<input type="text" name="mname" placeholder="Middle Name" required class="textField" value="<?php echo $user->get_mname($_SESSION['user_id']); ?>"/><br/><br/><br/>
			<span class="text">Last Name</span><br/>
			<input type="text" name="lname" placeholder="Last Name" required class="textField" value="<?php echo $user->get_lname($_SESSION['user_id']); ?>"/><br/><br/><br/>
			<span class="text">Birthdate</span><br/>
			<input type="date" name="birthdate" placeholder="Birth Date" required class="textField" value="<?php echo $user->get_birthdate($_SESSION['user_id']); ?>"/><br/><br/><br/>
			<span class="text">Gender</span><br/>
			<select name="gender" required>
				<option value="0">Gender</option>
				<option value="1" <?php echo ('1' == $user->get_gender($_SESSION['user_id'])) ? 'selected' : '' ?>>Male</option>
				<option value="2" <?php echo ('2' == $user->get_gender($_SESSION['user_id'])) ? 'selected' : '' ?>>Female</option>
			</select><br/><br/><br/>
			<span class="text">Email</span><br/>
			<input type="email" name="email" placeholder="Email" required class="textField" value="<?php echo $employer->get_email($_SESSION['user_id']); ?>"/><br/><br/><br/>
			<span class="text">Phone No.</span><br/>
			<input type="text" name="phone" placeholder="Phone No." required class="textField" value="<?php echo $employer->get_phone($_SESSION['user_id']); ?>"/><br/><br/><br/>
			<span class="text">Skype Name</span><br/>
			<input type="text" name="skype" placeholder="Skype Name" required class="textField" value="<?php echo $employer->get_skype($_SESSION['user_id']); ?>"/><br/><br/><br/>
			<input type="submit" value="Submit" id="button"/>
		</form>
	</body>
</html>