<?php
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
	include '../library/class.job.php';
	include '../library/class.skill.php';
	include '../library/class.link.php';
	include '../library/class.block.php';
	include '../library/class.applicant.php';

	$page = (isset($_GET['page'])) ? $_GET['page'] : '';
	$id = (isset($_GET['id'])) ? $_GET['id'] : '';
	
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
	$job = new Job();
	$skill = new Skill();
	$link = new Link();
	$block = new Block();
	$applicant = new Applicant();

	
?>
<!DOCTYPE html>
<html>
	<head>
		<style>
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
			#headerTitle span {
				color: #b0e413;
				font-family: helvetica;
				font-size: 30px;
				font-style: italic;
				position: relative;
				left: -10px;
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
			#meSection #profPic a img {
				width: 100%;
				height: 100%;
				position: relative;
				left: -30px;
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
				width: 90%;
				height: auto;
				margin-left: auto;
				margin-right: auto;
				margin-top: 30px;
				margin-bottom: 20px;
				border-radius: 15px;
				overflow: hidden;
				padding-bottom: 50px;
				
			}	
			/*-------------------------------------------------------HEADER NAVIGATION PART---------------------------------------------------*/
			#headerNavigation {
				width: 250px;
				height: 83px;
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
				<form action="search.php" method="GET">
					<input type="text" name="keyword" placeholder="Job Title or Keywords" id="searchField"/>
					<input type="image" src="../images/search.png" id="searchButton"/>
				</form>
				<div id="meSection">
					<div id="profPic"><a href="index.php"><img src="<?php echo $user->get_pic($_SESSION['user_id']); ?>"/></a></div>
					<span>Me</span>
					<a href="" id="toggle"><img src="../images/toggle.png"/></a>
				</div>
				<div id="headerNavigation">
					<a href="index.php?page=messages" onclick="clearMessage()"><div id="notificationDiv" class="navRow"><span><h6 id='messageStat'>76</h6>Messages</span></div></a>
					<a href="index.php?page=logout"><div id="notificationDiv" class="navRow"><span>Logout</span></div></a>
				</div>
			</div>
			<div id="body">
				<div id="viewContainer">
					<?php
						switch($page) {
							case 'companydetail':
								require_once 'companydetail.php';
								break;
							case 'about':
								require_once 'about.php';
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