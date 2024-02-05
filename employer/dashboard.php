<!DOCTYPE html>
<html>
	<head>
		<style>
			#viewContainer #companyName {
				width: 700px;
				height: auto;
				/*border: 1px solid black;*/
				margin-left: auto;
				margin-right: auto;
				margin-top: 10px;
			}
			#viewContainer #companyName span {
				display: block;
				text-align: center;
				font-weight: bold;
				font-size: 45px;
				font-family: helvetica;
				color: #404340;
			}
			#viewContainer #companyDescription {
				width: 700px;
				height: auto;
				margin-left: auto;
				margin-right: auto;
				margin-top: 10px;
				/*border: 1px solid black;*/
			}
			#viewContainer #companyDescription span {
				display: block;
				text-align: center;
				color: #404340;
				font-family: helvetica;
			}
			#viewContainer #greetings {
				width: 700px;
				height: auto;
				/*border: 1px solid black;*/
				margin-left: auto;
				margin-right: auto;
				margin-top: 20px;
			}	
			#viewContainer #greetings span {
				display: block;
				text-align: center;
				color: #404340;
				font-family: helvetica;
				font-weight: bold;
				font-size: 25px;
			}
			
			/*------------------------------------------------DASHBOARD CONTAINER---------------------------------------------*/
			
			#viewContainer #dashContainer {
				width: 700px;
				height: 700px;
				margin-left: auto;
				margin-right: auto;
				/*border: 1px solid black;*/
			}
			
			#dashContainer .dashWindow {
				width: 300px;
				height: 250px;
				border: 1px solid #b8b8b8;
				border-radius: 10px/10px;
				float: left;
				margin-left: 35px;
				margin-top: 35px;
			}
			
			/*-----------------------------------------------------------IMAGES---------------------------------------------*/
			
			.dashWindow #createJob {
				position: relative;
				left: 60px;
				top: 100px;
			}
			
			.dashWindow #myJob {
				position: relative;
				left: 100px;
				top: 30px;
			}
			
			.dashWindow #myJobText {
				color: #b7b8b2;
				font-family: helvetica;
				font-weight: bold;
				font-size: 40px;
				position: relative;
				top: 50px;
				left: 70px;
			}
			
			.dashWindow #applicant {
				position: relative;
				left: 100px;
				top: 30px;
			}
			
			.dashWindow #applicantText {
				color: #b7b8b2;
				font-family: helvetica;
				font-weight: bold;
				font-size: 40px;
				position: relative;
				top: 50px;
				left: 50px;
			}
			
			.dashWindow #ellipse {
				position: relative;
				left: 100px;
				top: 30px;
			}
			
			.dashWindow #pic {
				width: 70px;
				height: 70px;
				position: relative;
				left: 120px;
				top: -65px;
			}
			
			.dashWindow #companyText {
				color: #b7b8b2;
				font-family: helvetica;
				font-weight: bold;
				font-size: 40px;
				position: relative;
				top: -40px;
				left: 55px;
			}
			
			.dashWindow #pic img {
				width: 100%;
				height: 100%;
			}
			
			/*-----------------------------------------------------------------*/
			
			#viewContainer #errorDiv {
				width: 700px;
				height: 30px;
				background: red;
				margin-left: auto;
				margin-right: auto;
				margin-top: 10px;
				text-align: center;
				font-family: helvetica;
			}
		</style>
	</head>
	<body>
		<?php echo (($_SESSION['status'] == 0) ? "<div id='errorDiv'>Your account has not yet been approved, you are not allowed as of now to search or create job</div>" : '') ?>
		<div id="companyName"><span><?php echo $company->get_name($_SESSION['user_id']); ?></span></div>
		<div id="companyDescription"><span><?php echo $company->get_description($_SESSION['user_id']); ?></span></div>
		<div id="greetings"><span><?php echo 'Welcome, '.$user->get_full_name($_SESSION['user_id']).'!'; ?></span></div>
		<div id="dashContainer">
			<a href="index.php?page=dashboard"><div class="dashWindow">
				<img src="../images/create_job.png" id="createJob"/>
			</div></a>
			<a href="<?php echo (($_SESSION['status'] == 1) ? 'index.php?page=job' : '') ?>"><div class="dashWindow">
				<img src="../images/my_jobs.png" id="myJob"/><br/>
				<span id="myJobText">My Jobs</span>
			</div></a>
			<a href="<?php echo (($_SESSION['status'] == 1) ? 'index.php?page=applicant' : '') ?>"><div class="dashWindow">
				<img src="../images/applicant.png" id="applicant"/><br/>
				<span id="applicantText">Applicants</span>
			</div></a>
			<a href="index.php?page=company"><div class="dashWindow">
				<img src="../images/ellipse.png" id="ellipse"/>
				<div id="pic"><img src="<?php echo $company->get_pic($_SESSION['user_id']); ?>"/></div><br/>
				<span id="companyText">Company</span>
			</div></a>
		</div>
	</body>
</html>