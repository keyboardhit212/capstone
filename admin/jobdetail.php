<?php

$job_id = (isset($_GET['job_id'])) ? $_GET['job_id'] : '';
$company_id = (isset($_GET['company_id'])) ? $_GET['company_id'] : '';

?>
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
			
			/*---------------------------------------------------------------------COMPANY DETAILS----------------------------------------------*/
			
			#viewContainer #companyDetails {
				width: 700px;
				height: auto;
				overflow: hidden;
				border: 1px solid #ced3cd;
				margin-left: auto;
				margin-right: auto;
				margin-top: 60px;
				border-radius: 10px/10px;
				
			}
			#viewContainer #companyDetails #pic {
				width: 200px;
				height: 170px;
				border-right: 1px solid #b7b7b7;
				margin-top: 10px;
				margin-bottom: 10px;
				float: left;
			}
			#viewContainer #companyDetails #pic #ellipse {
				float: left;
				position: relative;
				left: 50px;
				top: 10px;
			}
			#viewContainer #companyDetails #logo {
				width: 75px;
				height: 75px;
				float: left;
				position: relative;
				left: -43px;
				top: 25px;
			}
			#viewContainer #companyDetails #pic a {
				text-decoration: none;
				font-family: helvetica;
				color: #2160c9;
				position: relative;
				top: 30px;
				display: block;
				text-align: center;
			}
			#viewContainer #companyDetails #logo img {
				width: 100%;
				height: 100%;
			}
			#viewContainer #companyDetails #companyName {
				display: block;
				text-align: center;
				margin-top: 10px;
				font-family: helvetica;
				font-weight: bold;
				color: #666666;
				font-size: 30px;
			}
			#viewContainer #companyDetails #companyDescription {
				display: block;
				text-align: center;
				margin-top: 10px;
				font-family: helvetica;
				color: #666666;
				font-size: 16px;
			}
			#viewContainer #companyDetails #companyAddress {
				display: block;
				text-align: center;
				margin-top: 10px;
				font-family: helvetica;
				color: #666666;
				font-size: 16px;
				font-weight: bold;
			}
			
			/*-----------------------------------------------------JOB DETAIL-----------------------------------*/
			
			#viewContainer #jobDetail {
				width: 300px;
				height: 300px;
				/*border: 1px solid black;*/
				margin-left: 150px;
				margin-top: 20px;
				float: left;
			}
			#viewContainer #jobDetail #profession {
				color: #313234;
				font-weight: bold;
				text-align: center;
				display: block;
				font-size: 25px;
				font-family: helvetica;
				font-style: italic;
			}	
			#viewContainer #jobDetail #industry {
				color: #313234;
				text-align: center;
				display: block;
				font-size: 16px;
				font-family: helvetica;
				font-style: italic;
			}
			#viewContainer #jobDetail #status {
				color: #313234;
				text-align: center;
				display: block;
				font-size: 16px;
				font-family: helvetica;
				font-style: italic;
			}
			#viewContainer #jobDetail #status span {
				font-weight: bold;
			}
			#viewContainer #jobDetail #closeJob {
				width: 150px;
				height: 35px;
				text-align: center;
				font-family: helvetica;
				background: #aee40a;
				border-radius: 5px/5px;
				position: relative;
				margin-left: auto;
				margin-right: auto;
				margin-top: 30px;
			}
			#viewContainer #jobDetail a {
				text-decoration: none;
			}
			#viewContainer #jobDetail #closeJob:hover {
				transition-duration: 0.5s;
				background: red;
			}
			#viewContainer #jobDetail #closeJob span {
				position: relative;
				top: 5px;
				font-weight: bold;
				color: #303435;
				font-size: 20px;
			}
			#viewContainer #jobDescription {
				width: 370px;
				height: 250px;
				border: 1px solid #dcdcdc;
				float: right;
				margin-right: 150px;
				margin-top: 5px;
				overflow-y: auto;
				font-family: helvetica;
				color: #313234;
				font-size: 15px;
				font-weight: bold;
				border-radius: 10px/10px;
			}
			#viewContainer #label {
				font-size: 20px;
				color: black;
				font-family: helvetica;
				margin-top: 15px;
				display: block;
				position: relative;
				left: 20px;
				font-weight: bold;
				color: #313234;
			}
			#viewContainer #skills {
				float: right;
				width: 370px;
				height: auto;
				border: 1px solid #dcdcdc;
				margin-right: 150px;
				margin-top: 20px;
				border-radius: 10px/10px;
				padding-bottom: 10px;
			}
			#viewContainer #skills #label {
				font-weight: bold;
				font-family: helvetica;	
				display: block;
				text-align: left;
				position: relative;
				left: 0px;
				top: 0px;
			}
			#viewContainer #skills #label #content {
				font-family: helvetica;
				color: #313234;
				font-weight: normal;
				font-size: 18px;
			}
		</style>
	</head>
	<body>
		<div id="informationHeader"><span>Job Details</span></div>
		<div id="companyDetails">
			<div id="pic">
				<img src="../images/ellipse.png" id="ellipse"/><div id="logo"><img src="<?php echo $company->get_pic($company_id); ?>"/></div><br/>
				<a href="">www.youtube.com</a>
			</div>
			<span id="companyName">Hammyster Production</span>
			<span id="companyDescription"><?php echo $company->get_description($company_id); ?></span>
			<span id="companyAddress"><?php echo $company->get_address($company_id); ?>
		</div>
		<div id="jobDetail">
			<span id="profession"><?php echo $profession->get_profession_name($job->get_profession_id($job_id)); ?></span>
			<span id="industry"><?php echo $industry->get_industry_name($job->get_industry_id($job_id));?></span><br/><br/><br/>
			<a href="" onclick="applyJob(<?php echo $job_id ?>,<?php echo $_SESSION['user_id'] ?>)"><div id="closeJob"><span>Apply</span></div></a>
			<a href="" onclick="saveJob(<?php echo $job_id ?>,<?php echo $_SESSION['user_id'] ?>)"><div id="closeJob"><span>Save Job</span></div></a>
			<a href="detail.php?page=companydetail&company_id=<?php echo $company_id ?>&company_page=message"><div id="closeJob"><span>Message</span></div></a>
		</div>
		<span id="label">Job Description</span>
		<div id="jobDescription">
			<?php echo $job->get_description($job_id); ?>
		</div>
		<div id="skills"><span id="label">Special Skills: <span id="content">PHP, CSS, JAVA</span></span></div>
		<div id="skills"><span id="label">Salary: <span id="content"><?php echo $job->get_salary($job_id); ?></span></span></div>
		<script type="text/javascript" src="../library/jquery.js"></script>
		<script type="text/javascript" src="library/js.js"></script>
	</body>
</html>