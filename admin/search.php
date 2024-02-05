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
	include '../library/class.search.php';
	include '../library/class.job.php';
	include '../library/class.company.php';
	
	$page = (isset($_GET['page'])) ? $_GET['page'] : '';
	
	$student = new Student();
	$user = new User();
	$college = new College();
	$course = new Course();
	$major = new Specialization();
	$industry = new Industry();
	$profession = new Profession();
	$job = new Job();
	$company = new Company();
	$search = new Search();
	$resume = new Resume();
	
	$keyword = (isset($_GET['keyword'])) ? $_GET['keyword'] : '';
	$sort = (isset($_GET['sort'])) ? $_GET['sort'] : '';
	
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
				margin-left: 600px;
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
			#meSection #profileLink {
				position: relative;
				left: 0px;
			}
			/*-----------------------------------------BODY------------------------------------*/
			#body {
				width: 1100px;
				height: auto;
				margin: 0 auto;
				overflow: hidden;
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
			
			/*------------------------------------------------------SEARCH PART--------------------------------------*/
			
			#searchBar {
				width: 1000px;
				height: 100px;
				margin-left: auto;
				margin-right: auto;
				margin-top: 20px;
			}
			#jobText {
				font-family: helvetica;
				color: #404340;
				font-size: 25px;
				font-weight: bold;
				position: relative;
				left: 35px;
				top: 10px;
			}
			form img {
				zoom: 150%;
				position: relative;
				left: 0px;
			}
			form #searchField {
				width: 800px;
				border: 1px solid #c0e942;
				height: 35px;
				border-radius: 10px/10px;
				position: relative;
				top: -10px;
				left: 10px;
				font-size: 20px;
			}
			form #button {
				background: #b0e413;
				width: 100px;
				height: 25px;
				color: white;
				font-weight: bold;
				border-radius: 10px/10px;
				position: relative;
				left: 25px;
				top: -10px;
				border: none;
			}
			#skillField {
				border-radius: 5px/5px;
				border: 1px solid #d3d3d3;
				height: 25px;
				width: 200px;
				color: black;
				font-size: 15px;
			}
			
			/*--------------------------------------------------------------FILTERS--------------------------------------------*/
			
			#filters {
				width: 250px;
				height: 900px;
				float: left;
				margin-top: 30px;
				margin-left: 30px;
			}
			#filters #sorting {
				width: 92%;
				height: 90px;
				border: 1px solid #c6c6c6;
				padding: 10px 10px;
				font-family: helvetica;
				font-weight: bold;
				color: #404340;
				border-radius: 5px/5px;
			}
			#filters #sorting a button {
				background: transparent;
				border: 1px solid #d3d3d3;
				width: 100px;
				height: 30px;
			}
			#filters #sorting a .left {
				border-top-left-radius: 5px;
				border-bottom-left-radius: 5px;
			}
			#filters #sorting a .right {
				border-top-right-radius: 5px;
				border-bottom-right-radius: 5px;
			}
			#filters #guide {
				width: 92%;
				height: 250px;
				border: 1px solid #c6c6c6;
				padding: 10px 10px;
				font-family: helvetica;
				font-weight: bold;
				color: #404340;
				border-radius: 5px/5px;
				margin-top: 20px;
			}
			#filters #guide #instruction {
				font-weight: normal;
			}
			#filters #guide a {
				text-decoration: none;
				color: black;
			}
			#filters #guide #contact {
				display: block;
				text-align: center;
			}
			#filter #guide a {
				text-align: center;
			}
			/*---------------------------------------------------------RESULTS--------------------------------------------*/
			
			#results {
				width: 750px;
				height: 800px;
				float: right;
				margin-top: 30px;
				margin-right: 40px;
				border: 1px solid #d4d4d4;
				border-radius: 10px/10px;
			}
			#results #banner {
				width: 100%;
				height: 50px;
			}
			#results #banner #job {
				font-size: 30px;
				font-weight: bold;
				color: #494c49;
				font-family: helvetica;
				position: relative;
				top: -10px;
				left:	20px;
			}
			#results #banner #percentage {
				float: right;
				position: relative;
				left: -10px;
				top: 15px;
				font-family: helvetica;
				color: #404340;
			}
			
			/*-----------------------------------------------INNER RESULTS---------------------------------------*/
			#results #innerResults {
				width: 100%;
				/*border: 1px solid red;*/
				height: 100%;
				overflow-y: auto;
			}
			#results #innerResults .row {
				width: 100%;
				height: 150px;
				margin-bottom: 5px;
			}
			#results #innerResults .row #jobName {
				width: 100%;
				height: 30px;
			}
			#results #innerResults .row #jobName #jobText {
				font-family: helvetica;
				font-weight: bold;
				font-size: 18px;
				position: relative;
				left: 10px;
				top: 2px;
				color: #648fc3;
			}
			#results #innerResults .row #jobName a {
				text-decoration: none;
			}
			#results #innerResults .row #companyName {
				width: 100%;
				height: 30px;
			}
			#results #innerResults .row #companyName #companyText {
				font-family: helvetica;
				font-weight: bold;
				font-size: 18px;
				position: relative;
				left: 10px;
				top: 2px;
				color: #769b07;
			}
			#results #innerResults .row #jobName a {
				position: relative;
			}
			#results #innerResults .row #jobName div {
				background: #aee40a;
				width: 100px;
				display: block;
				float: right;
				text-align: center;
				height: 20px;
				border-radius: 5px/5px;
				text-decoration: none;
				color: #494c49;
				font-weight: bold;
				font-family: helvetica;
				position: relative;
				top: 5px;
				left: -10px;
			}
			#results #innerResults .row #jobName div span {
				position: relative;
				top: -14px;
				left: 3px;
			}
			#results #innerResults .row #jobName div img {
				zoom: 140%;
				position: relative;
				left: 5px;
				top: -3px;
			}
			#results #innerResults .row #companyName a {
				position: relative;
				text-decoration: none;
			}
			#results #innerResults .row #companyName div {
				background: #aee40a;
				width: 100px;
				display: block;
				float: right;
				text-align: center;
				height: 20px;
				border-radius: 5px/5px;
				text-decoration: none;
				color: #494c49;
				font-weight: bold;
				font-family: helvetica;
				position: relative;
				top: 5px;
				left: -10px;
			}
			#results #innerResults .row #companyName div span {
				position: relative;
				top: -14px;
				left: 3px;
			}
			#results #innerResults .row #companyName div img {
				zoom: 140%;
				position: relative;
				left: 14px;
				top: -3px;
			}
			#results #innerResults .row #description {
				font-family: helvetica;
				color: #494c49;
				width: 730px;
				height: 85px;
				text-align: justify;
				font-size: 15px;
				text-overflow: ellipsis;
				overflow: hidden;
				border-bottom: 1px solid #686868;
				margin: 0 auto;
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
				<div id="meSection">
					<div id="profPic"><a href="index.php" id="profileLink"><img src="<?php echo $user->get_pic($_SESSION['user_id']); ?>"/></a></div>
					<span>Me</span>
					<a href="" id="toggle"><img src="../images/toggle.png"/></a>
				</div>
				<div id="headerNavigation">
					<a href="index.php?page=messages"><div id="notificationDiv" class="navRow"><span><h6 id='messageStat'>76</h6>Messages</span></div></a>
					<a href="index.php?page=logout"><div id="notificationDiv" class="navRow"><span>Logout</span></div></a>
				</div>
			</div>
			<div id="body">
				<div id="searchBar">
					<span id="jobText">Find Job Boards At Once!</span><br/><br/>
					<form action="search.php" method="GET">
						<img src="../images/search.png"/>
						<input type="text" name="keyword" placeholder="Search Employers and Students" id="searchField"/>
						<input type="submit" value="Search Now" id="button"/>
					
				</div>
				<div id="filters">
					<div id="sorting">
						<span><img src="../images/sort.png"/>&nbsp;&nbsp;Sort Results By Name</span><br/><br/>
						<a><button type="button" onclick="location.href='search.php?keyword=<?php echo $keyword ?>'" class="left">A - Z</button></a><a><button type="button" onclick="location.href='search.php?keyword=<?php echo $keyword ?>&sort=DESC'" class="right">Z - A</button></a><br/><br/>
						<!--<span><img src="../images/filter.png"/>&nbsp;&nbsp;Filter Results</span><br/><br/>
						<input type="text" name="skill" placeholder="Special Skills" id="skillField"/>!-->
					</form>
					</div>
					<div id="guide">
						<span><img src="../images/advice.png"/>&nbsp;&nbsp;Job Seeker Advice</span><br/><br/>
						<span id="instruction">Read articles, tips and advices to help you get a job faster<br/><a href="">read here</a></span><br/><hr/>
						<span><img src="../images/device.png"/>&nbsp;&nbsp;Get this on your device</span><br/><hr/>
						<span id="contact">Contact Us</span><br/>
						<a href="" id="fb"><img src="../images/fb.png"/></a>
						<a href="" ><img src="../images/twitter.png"/></a>
						<a href=""><img src="../images/g+.png"/></a>
						<a href=""><img src="../images/instagram.png"/></a>
					</div>
				</div>
				<div id="results">
					<div id="bann+er"><img src="../images/resultslogan.png"/><span id="job"><?php //echo $keyword ?></span><!--<span id="percentage">100% Matches</span>!--></div>
					<div id="innerResults">
						<?php
							foreach($search->admin_search($keyword,$sort) as $admin) {
								echo "<div class='row'>
											<div id='jobName'><a href='".(($admin['user_category_type'] == 2) ? 'detail.php?page=about&id='.$admin['user_id'] : 'detail.php?page=companydetail&company_id='.$admin['user_id'])."'><span id='jobText'>".$user->get_full_name($admin['user_id'])."</span></a></div>
											<div id='companyName'><a href='' disable><span id='companyText'>".(($admin['user_category_type'] == 2) ? 'Student' : 'Employer')."</span></a></div>
											<div id='description'>".(($admin['user_category_type'] == 2) ? $resume->get_objective($admin['user_id']) : $company->get_description($admin['user_id']))."</div>
										</div>";
							}
						?>
						
					</div>
				</div>
			</div>
			<div id="footer"></div>
		</div>
		<script type="text/javascript" src="../library/jquery.js"></script>
		<script type="text/javascript" src="library/js.js"></script>
	</body>
</html>