<?php
	$keyword = (isset($_POST['keyword'])) ? $_POST['keyword'] : '';
?>
<html>
	<head>
		<style>
			#loginSection {
				width: 400px;
				height: 550px;
				float: right;
				border-radius: 10px/10px;
				margin-right: 80px;
				margin-top: 30px;
				border: 1px solid #cccccc;
				font-family: helvetica;
				margin-left: 10px;
			}
			#loginSection #animoJobsLabel {
				font-size: 60px;
				font-weight: bold;
				color: #b0e413;
				display: block;
				text-align: center;
			}
			#loginSection #sublabel {
				font-size: 25px;
				font-weight: bold;
				display: block;
				text-align: right;
				position: relative;
				left: -30px;
				top: -15px;
			}
			#loginSection #signinlabel {
				font-size: 25px;
				font-weight: bold;
				color: #b0e413;
				position: relative;
				left: 25px;
			}
			#loginSection form .textfield {
				width: 350px;
				height: 30px;
				margin-top: 20px;
				border: 1px solid #999999;
				border-radius: 5px/5px;
			}
			#loginSection form #button {
				width: 100px;
				height: 30px;
				background: #b0e413;
				border: none;
				border-radius: 5px/5px;
				font-weight: bold;
			}
			#loginSection hr {
				width: 340px;
				position: relative;
				left: -30px;
			}
			#loginSection #contactLabel {
				color: #414340;
				font-size: 18px;
			}
			#loginSection a {
				margin-left: 10px;
				position: relative;
				top: 10px;
				left: 10px;
			}
			/*-------------------------------------------SEARCH SECTION-------------------------------------------------*/
			#searchSection {
				width: 700px;
				height: 150px;
				float: left;
				border: 1px solid #cccccc;
				border-radius: 10px/10px;
				margin-left: 100px;
				margin-top: 30px;
				font-family: helvetica;
			}
			#searchSection #searchLabel {
				font-weight: bold;
				font-size: 30px;
				color: #9bcb05;
				position: relative;
				left: 50px;
				top: 10px;
			}
			#searchSection form {
				position: relative;
				left: 50px;
			}
			#searchSection form .textfield {
				width: 450px;
				height: 30px;
				border-radius: 5px/5px;
				border: 1px solid #676966;
			}
			#searchSection form .button {
				width: 100px;
				height: 30px;
				margin-left: 30px;
				font-weight: bold;
				color: white;
				background: #b0e413;
				border: none;
				border-radius: 5px/5px;
				font-size: 20px;
			}
			#searchSection #exampleLabel {
				display: block;
				margin-left: 50px;
			}
			/*------------------------------------------RECENT JOB SECTION---------------------------------------------*/
			#recentjobSection {
				width: 700px;
				height: 380px;
				border: 1px solid #cccccc;
				border-radius: 10px/10px;
				float: left;
				margin-left: 100px;
				margin-top: 20px;
				font-family: helvetica;
			}
			#recentjobSection #recentLabel {
				width: 200px;
				height: 30px;
				font-weight: bold;
				display: block;
				text-align: center;
				background: #b0e413;
				position: relative;
				left: 50px;
			}
			#recentjobSection #innerDiv {
				width: 600px;
				height: 250px;
				/*border: 1px solid black;*/
				position: relative;
				left: 50px;
				top: 20px;
				overflow-y: auto;
			}
			#recentjobSection #findjobLabel {
				width: 180px;
				height: 40px;
				background: #b0e413;
				font-weight: bold;
				text-align: center;
				border-radius: 10px/10px;
				position: relative;
				left: 250px;
				top: 40px;
			}
			#recentjobSection #findjobLabel span {
				position: relative;
				top: 10px;
			}
		</style>
	</head>
	<body>
		<div id="loginSection">
			<span id="animoJobsLabel">Animo Jobs</span><br/>
			<span id="sublabel"><i>Take the opportunity<br/>Join now and get hired</i></span><br/>
			<span id="signinlabel">Sign in your Account:</a>
			<form action="" method="POST">
				<input type="text" name="username" placeholder="Username" class="textfield"/><br/>
				<input type="password" name="password" placeholder="Password" class="textfield"/><br/><br/>
				<input type="submit" value="Log In" name="Login" id="button"/>
			</form><br/><br/><br/>
			<hr/>
			<span id="contactLabel">Contact Us</span>
			<a href=""><img src="images/fb.png"/></a>
			<a href=""><img src="images/twitter.png"/></a>
			<a href=""><img src="images/instagram.png"/></a>
			<a href=""><img src="images/g+.png"/></a>
		</div>
		<div id="searchSection">
			<span id="searchLabel"><img src="images/search.png"/>&nbsp;Search For Jobs</span></br/><br/>
			<form action="index.php?page=students" method="POST">
				<input type="text" name="keyword" class="textfield" placeholder="Job title or Keywords"/>
				<input type="submit" value="Search" class="button"/>
			</form><br/>
			<span id="exampleLabel">e.g Accountant, Sales Manager, Application Developer</span>
			<?php echo (($keyword != '') ? "<span id='exampleLabel' style='color:red'>".$search->student_job_search($keyword)." Results Found</span>" : '') ?>
		</div>
		<div id="recentjobSection">
			<div id="recentLabel">Recently Posted Jobs</div>
			<div id="innerDiv">
				<?php
					foreach($recentjob->get_jobs() as $jobs) {
						echo $profession->get_profession_name($jobs['profession_id'])." - ".$company->get_name($jobs['employer_id'])."<br/><hr/>";
					}
				?>
			</div>
			<div id="findjobLabel"><span>Find A Job Now</span></div>
		</div>
		
	</body>
</html>




<?php
	if(isset($_REQUEST['Login'])) {
		extract($_REQUEST);
		if($student->login($username,$password)) {
			if(!$block->check($_SESSION['user_id'])) {
				$_SESSION['login'] = 1;
				header("location:student/index.php");
			}
		}
		else {
			header("location:index.php");
		}
	}
	echo "<br/>";
?>