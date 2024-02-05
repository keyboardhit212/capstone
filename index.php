<?php
	ob_start();
	session_start();
	
	$_SESSION['user_id'] = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : '';
	$_SESSION['account_type'] = (isset($_SESSION['account_type'])) ? $_SESSION['account_type'] : '';
	$_SESSION['login'] = (isset($_SESSION['login'])) ? $_SESSION['login'] : '';

	include 'library/config.php';
	include 'library/class.student.php';
	include 'library/class.employer.php';
	include 'library/class.user.php';
	include 'library/class.block.php';
	include 'library/class.recentjob.php';
	include 'library/class.profession.php';
	include 'library/class.company.php';
	include 'library/class.search.php';
	
	$student = new Student();
	$user = new User();
	$employer = new Employer();
	$block = new Block();
	$recentjob = new RecentJob();
	$profession = new Profession();
	$company = new Company();
	$search = new Search();

	$page = (isset($_GET['page'])) ? $_GET['page'] : '';
	
	if($_SESSION['login'] && $_SESSION['account_type'] == 2) {
		header("location:student/index.php");
	}
	else if($_SESSION['login'] && $_SESSION['account_type'] == 3) {
		header("location:employer/index.php");
	}
	else if($_SESSION['login'] && $_SESSION['account_type'] == 1) {
		header("location:admin/index.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>USLS Job Post</title>
		<link rel="icon" type="image/png" href="images/usls_logo.png"/>
		<style>
			#container {
				width: 100%;
				height: auto;
				margin: 0 auto;
				overflow: hidden;
			}
			#header {
				width: 100%;
				height: 55px;
				background: #404340;
			}
			#headerTitle {
				height: 100%;
				width: 230px;
				float: left;
			}
			#employersContainer {
				width: 117px;
				height: 100%;
				border-left: 1px solid gray;
				border-right: 1px solid gray;
				float: left;
			}
			#employersText {
				color: #e9eae5;
				font-family: HelveticaLight;
				position: relative;
				left: 20px;
				top: 18px;
			}
			#employersText a {
				color: #e9eae5;
				text-decoration: none;
			}
			#employersText a:hover {
				transition-duration: 0.5s;
				color: #c2e853;
			}
			/*Students Div Text*/
			#studentsContainer {
				width: 117px;
				height: 100%;
				border-right: 1px solid gray;
				float: left;
			}
			#studentsText {
				color: #e9eae5;
				font-family: HelveticaLight;
				position: relative;
				left: 27px;
				top: 18px;
			}
			#studentsText a {
				color: #e9eae5;
				text-decoration: none;
			}
			#studentsText a:hover {
				transition-duration: 0.5s;
				color: #c2e853;
			}
			/*Login Container*/
			#loginContainer {
				width: 100px;
				height: 100%;
				border-left: 1px solid gray;
				border-right: 1px solid gray;
				float: right;
				margin-right: 72px;
			}
			#loginText {
				color: #e9eae5;
				font-family: HelveticaLight;
				position: relative;
				left: 30px;
				top: 19px;
			}
			#loginText a {
				color: #e9eae5;
				text-decoration: none;
			}
			#loginText a:hover {
				transition-duration: 0.5s;
				color: #c2e853;
			}
			#body {
				width: 100%;
				height: 545px;
				background: white;
			}
			#headerTitle span {
				color: green;
				font-family: HelveticaBold;
				color: #b0e413;
				font-size: 30px;
				position: relative;
				left: 70px;
				top: 15px;
			}
			#plane img{
				position: absolute;
				height: 47px;
				width: 62px;
				top: 12px;
				left: 20px;
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
		</style>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<a href="index.php?page=home"><div id="headerTitle"><span>nimo jobs</span>
					<div id="plane"><img src="images/plane.png"/></div>
				</div></a>
				<div id="employersContainer"><span id="employersText"><a href="index.php?page=employers">Employers</a></span></div>
				<div id="studentsContainer"><span id="studentsText"><a href="index.php?page=students">Students</a></span></div>
				<div id="loginContainer"><span id="loginText"><a href="index.php?page=home">Login</a></span></div>
			</div>
			<div id="body">
				<?php
					switch($page) {
						case 'home':
							require_once "home.php";
							break;
						case 'students':
							require_once "students.php";
							break;
						case 'employers':
							require_once "employers.php";
							break;
						default:
							require_once "home.php";
					}
				?>
			</div>
		</div>
	</body>
</html>	