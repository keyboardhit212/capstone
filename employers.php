<?php
	ob_start();
	$feedback = (isset($_GET['feedback'])) ? $_GET['feedback'] : '';
	$result = (isset($_GET['result'])) ? $_GET['result'] : '';
	$keyword = (isset($_POST['keyword'])) ? $_POST['keyword'] : '';
	
?>
<html>
	<head>
		<style>
			#loginSection {
				width: 400px;
				height: 750px;
				float: right;
				border-radius: 10px/10px;
				margin-right: 80px;
				margin-top: 30px;
				border: 1px solid #cccccc;
				font-family: helvetica;
				margin-left: 10px;
			}
			#loginSection #animoJobsLabel {
				font-size: 25px;
				font-weight: bold;
				color: #b0e413;
				display: block;
				text-align: center;
			}
			#loginSection form .textfield {
				width: 350px;
				height: 30px;
				margin-top: 20px;
				border: 1px solid #999999;
				border-radius: 5px/5px;
				margin-left: 25px;
			}
			#loginSection form .checkbox {
				margin-top: 20px;
				border: 1px solid #999999;
				border-radius: 5px/5px;
				margin-left: 25px;
			}
			#loginSection form #button {
				width: 100px;
				height: 30px;
				background: #b0e413;
				border: none;
				border-radius: 5px/5px;
				font-weight: bold;
				position: relative;
				left: 25px;
			}
			#loginSection hr {
				width: 340px;
				position: relative;
				left: -30px;
			}
			#loginSection #contactLabel {
				color: #414340;
				font-size: 18px
				position: relative;
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
			
			/*---------------------------------------------------ERROR DIV-------------------------------------------*/
			#errorDiv {
				width: 1200px;
				height: 30px;
				font-family: helvetica;
				font-weight: bold;
				text-align: center;
				margin-left: auto;
				margin-right: auto;
				margin-top: 10px;
				background: black;
			}
			#errorDiv span {
				position: relative;
				top: 5px;
				font-weight: normal;
			}
		</style>
	</head>
	<body>
		<?php echo (($result != '') ? "<div id='errorDiv' style='background: ".(($result == 0) ? '#f44d32' : '#7dcc56')."'><span>".$feedback."</span></div>" : '') ?>
		<div id="loginSection">
			<span id="animoJobsLabel">Create Your Free Employer Account Now</span><br/>
			<form action="" method="POST">
				<input type="text" name="fname" placeholder="First Name" required class="textfield"/><br/>
				<input type="text" name="mname" placeholder="Middle Name" required class="textfield"/><br/>
				<input type="text" name="lname" placeholder="Last Name" required class="textfield"/><br/>
				<input type="email" name="email" placeholder="Email" required class="textfield"/><br/>
				<input type="text" name="phone" placeholder="Phone No." required class="textfield"/><br/>
				<input type="text" name="username" placeholder="Username" required class="textfield"/><br/>
				<input type="password" name="password" placeholder="Password" required class="textfield"/><br/>
				<input type="password" name="confirmPassword" placeholder="Confirm Password" required class="textfield"/><br/>
				<input type="checkbox"  required class="checkbox"/>I agree to the animo jobs terms of use
				<br/><br/>
				<input type="submit" name="submit" value="Register" required id="button"/>
			</form><br/><br/><br/>
			<hr/>
			<span id="contactLabel">Contact Us</span>
			<a href=""><img src="images/fb.png"/></a>
			<a href=""><img src="images/twitter.png"/></a>
			<a href=""><img src="images/instagram.png"/></a>
			<a href=""><img src="images/g+.png"/></a>
		</div>
		<div id="searchSection">
			<span id="searchLabel"><img src="images/search.png"/>&nbsp;Search For Applicants</span></br/><br/>
			<form action="index.php?page=employers" method="POST">
				<input type="text" name="keyword" class="textfield" placeholder="Job title or Keywords"/>
				<input type="submit" value="Search" class="button"/>
			</form><br/>
			<span id="exampleLabel">e.g Accountant, Sales Manager, Application Developer</span>
			<?php echo (($keyword != '') ? "<span id='exampleLabel' style='color:red'>".$search->employer_applicant_search($keyword)." Results Found</span>" : '') ?>
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
	if(isset($_REQUEST['submit'])) {
		extract($_REQUEST);
		if($password == $confirmPassword) {
			if($employer->insert_initial_employer($fname,$mname,$lname,$username,md5($password))) {
				$employer->register_employer($username,md5($password),$email,$phone);
				header("location:index.php?page=employers&result=1&feedback=Registered Successfully");
			}
			else {
				header("location:index.php?page=employers&result=0&feedback=Unable to register, Server error");
			}
		}
		else {
			header("location:index.php?page=employers&result=0&feedback=Unable to register, password does not match!");
		}
	}
?>