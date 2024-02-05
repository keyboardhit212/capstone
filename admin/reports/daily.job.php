<?php
	
	include '../../library/config.php';
	include '../../library/class.report.php';
	include '../../library/class.company.php';
	include '../../library/class.user.php';
	include '../../library/class.profession.php';
	
	$report = new Report();
	$company = new Company();
	$user = new User();
	$profession = new Profession();

	$date = (isset($_GET['date'])) ? $_GET['date'] : ''
?>
<html>
	<head>
		<style>
			#companyText {
				float: right;
				margin-right: 20px;
			}
			#employer {
				float: left;
				display: block;
				margin-left: 10px;
				margin-top: 15px;
				color: black;
				font-family: helvetica;
			}
			#company {
				display: block;
				float: right;
				margin-right: 20px;
				color: black;
				font-family: helvetica;
				margin-top: 15px;
			}
		</style>
	</head>
	<body>
		<div id="title"><span>Profession</span><span id="companyText"></span></div>
		<?php
			foreach($report->job_report("daily", $date) as $reports) {
				echo "<span id='employer'>".$profession->get_profession_name($reports['profession_id'])."</span><span id='company'>".$reports['job']."</span><br/><br/><hr/>";
			}
		?>
	</body>
</html>