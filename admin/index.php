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
	include '../library/class.company.php';
	include '../library/class.employer.php';
	include '../library/class.company.link.php';
	include '../library/class.message.php';
	include '../library/class.block.php';
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
	$company = new Company();
	$employer = new Employer();
	$company_link = new CompanyLink();
	$message = new Message();
	$block = new Block();
	$bulletin = new Bulletin();
	
	$company->insert_company($_SESSION['user_id']);
	
	if($_SESSION['login'] != 1 || $_SESSION['account_type'] != 1) {
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
				float: left;
			}
			#headerTitle {
				width: 300px;
				height: 100%;
				margin-left: 50px;
				float: left;
			}
			#headerTitle img {
				position: relative;
				top: 5px;
				left: -5px;
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
			/*---------------------------------------------------------------BODY SECTION---------------------------------------------------------*/
			#body #dashboard {
				width: 300px;
				height: 500px;
				border: 1px solid #cdcecc;
				margin-top: 50px;
				border-top-right-radius: 15px;
				margin-left: 50px;
				float: left;
			}
			#body #dashboard a .navRow {
				width: 100%;
				height: 60px;
				border-bottom: 1px solid #c0c0c0;
				float: left;
			}
			#body #dashboard  a {
				text-decoration: none;
				color: black;
				font-family: helvetica;
			}
			#body #dashboard .navRow span {
				float: right;
				margin-right: 40px;
				margin-top: 20px;
				font-size: 18px;
			}
			#body #dashboard .navRow img {
				position: relative;
				float: left;
				margin-left: 20px;
				margin-top: 10px;
			}
			#body #dashboard a:hover {
				color: #aee40a;
				transition-duration: 0.5s;
			}
			/*--------------------------------------------------------------VIEW CONTAINER------------------------------------------------------*/
			#viewContainer {
				width: 800px;
				height: 1500px;
				float: left;
				margin-left: 45px;
				margin-top: 50px;
				margin-bottom: 20px;
				border-radius: 15px;
				border: 1px solid #cdcecc;
			}	
			/*-------------------------------------------------------HEADER NAVIGATION PART---------------------------------------------------*/
			#headerNavigation {
				width: 250px;
				height: 85px;
				background: #252525;
				position: fixed;
				left: 1000px;
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
			#headerNavigation .navRow:hover {
				background: #a5d31b;
				transition-duration: 0.5s;
			}
			#headerNavigation .navRow span h6 {
				display: block;
				float: left;
				position: relative;
				left: 40px;
				top: -25px;
				color: red;
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
				<form action="search.php" method="GET"/>
					<input type="text" name="keyword" placeholder="Job Title or Keywords" id="searchField"/>
					<input type="image" src="../images/search.png" id="searchButton"/>
				</form>
				<div id="meSection">
					<div id="profPic"><img src="<?php echo $user->get_pic($_SESSION['user_id']) ?>"/></div>
					<span>Me</span>
					<a href="" id="toggle"><img src="../images/toggle.png"/></a>
				</div>
				<div id="headerNavigation">
					<a href="index.php?page=messages" onclick="clearMessage()"><div id="notificationDiv" class="navRow"><span><h6 id='messageStat'>76</h6>Messages</span></div></a>
					<a href="index.php?page=logout"><div id="notificationDiv" class="navRow"><span>Logout</span></div></a>
				</div>
			</div>
			<div id="body">
				<div id="dashboard">
					<a href="index.php?page=dashboard"><div class="navRow"><img src="../images/dashboard.png"/><span>Dashboard</span></div></a>
					<a href="index.php?page=request"><div class="navRow"><img src="../images/request-dashboard.png"/><span>Pending Requests</span></div></a>
					<a href="index.php?page=block"><div class="navRow"><img src="../images/block-dashboard.png"/><span>Blocked Accounts</span></div></a>
					<a href="index.php?page=approved"><div class="navRow"><img src="../images/request-dashboard.png"/><span>Approved Accounts</span></div></a>
					<a href="index.php?page=report"><div class="navRow"><img src="../images/reports-dashboard.png"/><span>Check Reports</span></div></a>
					<a href="index.php?page=bulletin"><div class="navRow"><img src="../images/reports-dashboard.png"/><span>Bulletin</span></div></a>
					<a href="index.php?page=addbulletin"><div class="navRow"><img src="../images/reports-dashboard.png"/><span>Add Announcement</span></div></a>
					<a href="index.php?page=logout"><div class="navRow"><img src="../images/logout-dashboard.png"/><span>Logout</span></div></a>
				</div>
				<div id="viewContainer">
					<?php
						switch($page) {
							case 'dashboard':
								require_once 'dashboard.php';
								break;
							case 'request':
								require_once 'request.php';
								break;
							case 'block':
								require_once 'block.php';
								break;
							case 'report':
								require_once 'report.php';
								break;
							case 'messages':
								require_once 'messages.php';
								break;
							case 'approved':
								require_once 'approvedapplicant.php';
								break;
							case 'addbulletin':
								require_once 'addbulletin.php';
								break;
							case 'bulletin':
								require_once 'bulletin.php';
								break;
							case 'logout':
								require_once 'logout.php';
								break;
							default:
								require_once 'dashboard.php';
								break;	
						}
					?>
				</div>
			</div>
			<div id="footer"></div>
		</div>
		<script type="text/javascript" src="../library/jquery.js"></script>
		<script type="text/javascript" src="library/js.js"></script>
	</body>
</html>