<?php
	ob_start();
	session_start();
	
	include '../library/config.php';
	include '../library/class.user.php';
	include '../library/class.college.php';
	include '../library/class.course.php';
	include '../library/class.specialization.php';
	include '../library/class.industry.php';
	include '../library/class.profession.php';
	include '../library/class.student.php';
	include '../library/class.resume.php';
	include '../library/class.credential.php';
	include '../library/class.reference.php';
	include '../library/class.job.cart.php';
	include '../library/class.job.php';
	include '../library/class.message.php';
	include '../library/class.notification.php';
	include '../library/class.company.php';
	include '../library/class.applicant.php';
	include '../library/class.skill.php';
	include '../library/class.link.php';
	include '../library/class.bulletin.php';
	
	$page = (isset($_GET['page'])) ? $_GET['page'] : '';
	
	$student = new Student();
	$user = new User();
	$college = new College();
	$course = new Course();
	$major = new Specialization();
	$industry = new Industry();
	$profession = new Profession();
	$resume = new Resume();
	$credential = new Credential();
	$reference = new Reference();
	$cart = new JobCart();
	$job = new Job();
	$message = new Message();
	$notification = new Notification();
	$company = new Company();
	$applicant = new Applicant();
	$skill = new Skill();
	$link = new Link();
	$bulletin = new Bulletin();

	
	if($_SESSION['login'] != 1 || $_SESSION['account_type'] != 2) {
		header("location:../index.php");
	}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<style>
			@font-face{
				font-family: "HelveticaBold";
				src: url('../fonts/HelveticaBold.ttf');
			}
			@font-face{
				font-family: "Helvetica";
				src: url('../fonts/Helvetica.otf');
			}
			@font-face{
				font-family: "HelveticaLight";
				src: url('../fonts/HelveticaBQ-Light.otf');
			}
			#container {
				width: 1300px;
				height: auto;
				/*border: 1px solid black;*/
				margin: 0 auto;
				overflow: hidden;
			}
			#header {
				width: 100%;
				height: 55px;
				background: #404340;
			}
			#footer {
				width: 100%;
				height: 50px;
				background: #404340;
			}
			#headerTitle {
				width: 300px;
				height: 100%;
				margin-left: 50px;
				float: left;
			}
			#headerTitle img {
				position: relative;
				left: -5px;
				top: 5px;
			}
			#headerTitle span {
				color: #b0e413;
				font-family: HelveticaBold;
				font-size: 30px;
				font-style: italic;
				position: relative;
				left: -15px;
				top: -5px;
			}
			#header form {
				float: left;
				
			}
			#header form #searchField {
				background: transparent;
				width: 500px;
				height: 30px;
				position: relative;
				top: -5px;
				border-radius: 10px/10px;
				border: 1px solid #737573;
				font-size: 18px;
				color: white;
				font-family: helvetica;
			}
			#header form #searchButton {
				position: relative;
				left: 5px;
				top: 5px;
				zoom: 150%;
				margin-right: 5px;
			}
			#meSection {
				width: 200px;
				height: 100%;
				border-right: 2px solid #555555;
				border-left: 2px solid #555555;
				float: left;
				margin-left: 90px;
			}
			#meSection #profPic {
				width: 50px;
				height: 50px;
				border-radius: 25px/25px;
				float: left;
				margin-left: 5px;
				overflow: hidden;
			}
			#meSection #profPic img {
				width: 100%;
				height: 100%;
			}
			#meSection span {
				color: #b0e413;
				font-family: helvetica;
				position: relative;
				font-size: 30px;
				left: 35px;
				top: 10px;
			}
			#meSection a {
				position: relative;
				left: 30px;
				zoom: 150%;
			}
			/*-----------------------------------------BODY------------------------------------*/
			#body {
				width: 1100px;
				height: auto;
				/*border: 1px solid black;*/
				margin: 0 auto;
				overflow: hidden;
			}
			#body #heading #headingTitle {
				font-family: helvetica;
				font-size: 40px;
				color: #404340;
			}
			#body #heading #headingDesc {
				font-family: helvetica;
				font-size: 20px;
				color: #404340;
			}
			#body #innerBody {
				width: 100%;
				height: auto;
				/*border: 1px solid red;*/
				overflow: hidden;
			}
			#body #innerBody #navigation {
				width: 100%;
				height: 40px;
				border-bottom: 1px solid #ced3ce;
			}
			#body #innerBody #navigation .navSection {
				color: #404340;
				font-family: helvetica;
				font-size: 18px;
				width: 150px;
				height: 100%;
				border-left: 2px solid #404340;
				border-right: 2px solid #404340;
				border-top: 2px solid #404340;
				border-top-left-radius: 15px;
				border-top-right-radius: 15px;
				margin-right: 20px;
				float: left;
			}
			#body #innerBody #navigation .navSection span {
				position: relative;
				top: 10px;
				left: 30px;
			}
			#body #innerBody #navigation .navSection:hover {
				background: white;
			}
			#body #innerBody #navigation .navSection span:hover {
				position: relative;
				top: 10px;
				left: 30px;
				color: #b0e413;
				transition-duration: 1s;
			}
			#body #innerBody #navigation .navSection a {
				text-decoration: none;
				color: #404340;
			}
			/*--------------------------------------------------------------VIEW CONTAINER------------------------------------------------------*/
			#viewContainer {
				width: 100%;
				height: auto;
				float: left;
			}	
			/*-------------------------------------------------------HEADER NAVIGATION PART---------------------------------------------------*/
			#headerNavigation {
				width: 250px;
				height: 246px;
				background: #252525;
				position: fixed;
				left: 987px;
				top: 63px;
				z-index: 3;
				display: none;
			}
			#headerNavigation .navRow {
				width: 100%;
				height: 40px;
				border-bottom: 1px solid #616161;
				float: left;
				z-index: 3;
				text-align: center;
				color: #636363;
				font-family: helvetica;
				font-size: 20px;
				display: block;
			}
			#headerNavigation .navRow span {
				position: relative;
				top: 10px;
			}
			#headerNavigation .navRow span h6 {
				display: block;
				float: left;
				position: relative;
				left: 40px;
				top: -25px;
				color: red;
			}
			#headerNavigation .navRow:hover {
				background: #a5d31b;
				transition-duration: 0.5s;
			}
			
			/*-------------------------------------------------ERROR MESSAGE-----------------------------------*/
			
			#errorMessage {
				width: 900px;
				height: 30px;
				background: #ff1919;
				margin-left: auto;
				margin-right: auto;
				margin-top: 10px;
				text-align: center;
				font-family: helvetica;
				font-size: 20px;
			}
		</style>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<div id="headerTitle">
					<img src="../images/plane.png"/>
					<span>nimo jobs</span>
				</div>
				<form action="search.php" method="GET">
					<input type="text" name="keyword" placeholder="Job Title or Keywords" id="searchField"/>
					<input type="image" src="../images/search.png" id="searchButton"/>
				</form>
				<div id="meSection">
					<div id="profPic"><img src="<?php echo $user->get_pic($_SESSION['user_id']); ?>"/></div>
					<span>Me</span>
					<a href="" id="toggle"><img src="../images/toggle.png"/></a>
				</div>
				<div id="headerNavigation">
					<a href="index.php?page=notification" onclick="clearNotif()"><div id="notificationDiv" class="navRow"><span><h6 id='notifStat'>56</h6>Notifications</span></div></a>
					<a href="index.php?page=jobconfirmation"><div id="notificationDiv" class="navRow"><span>Job Confirmation</span></div></a>
					<a href="index.php?page=appliedjob"><div id="notificationDiv" class="navRow"><span>Applied Jobs</span></div></a>
					<a href="index.php?page=cart"><div id="notificationDiv" class="navRow"><span>Saved Jobs</span></div></a>
					<a href="index.php?page=messages" onclick="clearMessage()"><div id="notificationDiv" class="navRow"><span><h6 id='messageStat'>76</h6>Messages</span></div></a>
					<a href="index.php?page=logout"><div id="notificationDiv" class="navRow"><span>Logout</span></div></a>
				</div>
			</div>
			<div id="body">
				<div id="heading">
					<?php echo (($_SESSION['status'] != 1) ? "<div id='errorMessage'>Your account has not yet been approved, searching jobs is not yet allowed</div>" : "") ?>
					<br/>
					<span id="headingTitle">My Profile</span><br/><br/>
					<span id="headingDesc">All information being put are visible to employers and and it is what they will use to contact you</span>
				</div><br/><br/>
				<div id="innerBody">
					<div id="navigation">
						<div class="navSection">
							<a href="index.php?page=about"><span>About Me</span></a>
						</div>
						<div class="navSection">
							<a href="index.php?page=credential"><span>Credentials</span></a>
						</div>
						<div class="navSection">
							<a href="index.php?page=reference"><span>References</span></a>
						</div>
						<div class="navSection">
							<a href="index.php?page=introduction"><span>Introduction</span></a>
						</div>
						<div class="navSection">
							<a href="index.php?page=resume"><span>Resume</span></a>
						</div>
						<div class="navSection">
							<a href="index.php?page=bulletin"><span>Bulletin</span></a>
						</div>
					</div>
					<!--This is where the content changes -->
					<div id="viewContainer">
						<?php
							switch($page) {
								case 'about':
									require_once "about.php";
									break;
								case 'credential':
									require_once "credential.php";
									break;
								case 'reference':
									require_once "reference.php";
									break;
								case 'introduction':
									require_once "introduction.php";
									break;
								case 'resume':
									require_once "resume.php";
									break;
								case 'messages':
									require_once 'messages.php';
									break;
								case 'notification':
									require_once 'notification.php';
									break;
								case 'cart':
									require_once 'jobcart.php';
									break;
								case 'appliedjob':
									require_once 'appliedjob.php';
									break;
								case 'jobconfirmation':
									require_once 'jobconfirmation.php';
									break;
								case 'bulletin':
									require_once 'bulletin.php';
									break;
								case 'logout':
									require_once 'logout.php';
									break;
								default:
									require_once "about.php";
							}
						?>
					</div>
					
				</div>
			</div>
			<div id="footer"></div>
		</div>
	</body>
</html>