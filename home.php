<?php
	
?>
<!DOCTYPE html>
<html>
	<head>
		<style>
		#fieldcontainer{
			width: 300px;
			height: 160px;
			position: absolute;
			top: 190px;
			left: 550px;
		}
		#LogUser{
				width: 240px;
				height: 30px;
				position: absolute;
				left: 23px;
				border: 0;
				border-radius: 5px/5px;
				padding-left: 10px;
				font-family: HelveticaLight;
				font-size: 16px;
		}
		#LogPass{
				width: 240px;
				height: 30px;
				position: absolute;
				left: 23px;
				top: 40px;
				border: 0;
				border-radius: 5px/5px;
				padding-left: 10px;
				font-family: HelveticaLight;
				font-size: 16px;
		}
		#LogSub{
				width: 250px;
				height: 40px;
				position: absolute;
				left: 23px;
				top: 100px;
				border: 0;
				border-radius: 5px/5px;
				padding-left: 10px;
				font-family: HelveticaBold;
				font-size: 18px;
				background: white;
				color: #404340;
				text-decoration: none;
		}
		#LogSub:hover {
				transition-duration: 0.5s;
				background: #84af01;
		}
		#loginBG{
			width: 436px;
			height: 360px;
			position: absolute;
			left: 480px;
			top: 63px;
			background: url('images/LoginBG.png') no-repeat;
		}
		#LogTitle{
			background: url('images/LogoLasalle.png') no-repeat;
			width: 200px;
			height: 89px;
			position: absolute;
			left: 116px;
			top: 15px;
		}
		#LogCreate{
			font-family: HelveticaLight;
			font-size: 14px;
			color: #404340;
			position: absolute;
			left: 91px;
			bottom: 30px;
			text-decoration: none;
		}
		#LogCreate:hover {
				transition-duration: 0.3s;
				color: #e9eae4;
		}
		#LogForgot{
			font-family: HelveticaLight;
			font-size: 14px;
			color: #404340;
			position: absolute;
			left: 166px;
			bottom: 50px;
			text-decoration: none;
		}
		#LogForgot:hover {
				transition-duration: 0.3s;
				color: #e9eae4;
		}
					@font-face{
				font-family: "HelveticaBold";
				src: url('fonts/HelveticaBold.ttf');
			}
			@font-face{
				font-family: "Helvetica";
				src: url('fonts/Helvetica.otf');
			}
			@font-face{
				font-family: "HelveticaLight";
				src: url('fonts/HelveticaBQ-Light.otf');
			}
		#ribbon{
			width: 354px;
			height: 79px;
			position: absolute;
			bottom: 80px;
			background: url(images/ribbon.png)no-repeat;
			
		}
		#LogFollow{
			font-family: HelveticaLight;
			font-size: 14px;
			color: #404340;
			position: absolute;
			left: 12px;
			bottom: 50px;
			text-decoration: none;
		}
		#LogInsta{
			width: 33px;
			height: 33px;
			position:absolute;
			top: 42px;
			left: 120px;
			background: url('images/blackinsta.png')no-repeat;
		}
		#LogFb{
			width: 33px;
			height: 33px;
			position:absolute;
			top: 42px;
			left: 160px;
			background: url('images/blackfb.png')no-repeat;
		}
		#LogTwitter{
			width: 33px;
			height: 33px;
			position:absolute;
			top: 42px;
			left: 196px;
			background: url('images/blacktw.png')no-repeat;
		}
		#LogGmail{
			width: 33px;
			height: 33px;
			position:absolute;
			top: 42px;
			left: 234px;
			background: url('images/blackgmail.png')no-repeat;
		}
		#LogOr{
			font-family: HelveticaLight;
			font-size: 14px;
			color: #404340;
			position: absolute;
			left: 12px;
			bottom: 20px;
			text-decoration: none;	
		}
		#LogWeb{
			font-family: HelveticaLight;
			font-size: 14px;
			font-style: italic;
			color: #404340;
			position: absolute;
			left: 140px;
			bottom: 20px;
			color: #227898;
			text-decoration: none;	
		}
		#BGdesign{
			width: 442px;
			height: 394px;
			background: url(images/DesignBG.png)no-repeat;
			position: absolute;
			right: 0px;
			bottom: 0px;
			
		}
		</style>
	</head>
	<body>
				<div id="loginBG">
					<div id="LogTitle"></div>
					<a href="#"><div id="LogForgot"></div></a>
					<a href="index.php?page=employers"><div id="LogCreate">No Employer's Account Yet? Register Now!</div></a>
				</div>
				<div id="BGdesign"></div>
				<div id="ribbon">
					<div id="LogFollow">Follow us on:</div>
					<a href="http://www.instagram.com/mikecolmore" target="_blank"><div id="LogInsta"></div></a>
					<a href="http://www.facebook.com/imikecool" target="_blank"><div id="LogFb"></div></a>
					<a href="http://www.twitter.com/imikecool" target="_blank"><div id="LogTwitter"></div></a>
					<a href="http://www.google.com/+MikecolTitong" target="_blank"><div id="LogGmail"></div></a>
				</div>
				<div id="LogOr">or visit our website:</div>
				<a href="http://www.usls.edu.ph" target="_blank"><div id="LogWeb">www.usls.edu.ph</div></a>
		<form action="" method="POST" id="fieldcontainer">
			<input type="text" name="username" placeholder="Username" id="LogUser"	required /><br/>
			<input type="password" name="password" placeholder="Password" id="LogPass" required +/><br/>
			<input type="submit" value="Login" name="Login" id="LogSub"/>
		</form>
	</body>
</html>


<?php
	if(isset($_REQUEST['Login'])) {
		extract($_REQUEST);
		$user->login($username,$password);
		if($_SESSION['account_type'] == 2) { //Checks for Student
			if(!$block->check($_SESSION['user_id'])) { //If Student Is Not Blocked
				$_SESSION['login'] = 1;
				header("location: student/index.php");
			}
			else { // If Student Is Blocked
				header("location:index.php");
			}
		}
		else if($_SESSION['account_type'] == 3) { //Checks for Employer
			if(!$block->check($_SESSION['user_id'])) { //If Employer is Not Blocked
				$_SESSION['login'] = 1;
				header("location: employer/index.php");
			}
			else { // If Employer is Blocked
				header("location:index.php");
			}
		}
		else if($_SESSION['account_type'] == 1) { //For Admin
			$_SESSION['login'] = 1;
			header("location: admin/index.php");
		}
		else {
			header("location:index.php");
		}
	}
	echo "<br/>";
?>