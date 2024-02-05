<?php
	
	include '../../library/config.php';
	include '../../library/class.report.php';
	include '../../library/class.company.php';
	include '../../library/class.user.php';
	
	$report = new Report();
	$company = new Company();
	$user = new User();

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
		<div id="title"><span>Name</span><span id="companyText">Company</span></div>
		<?php
			foreach($report->employer_report("daily", $date) as $reports) {
				echo "<span id='employer'>".$user->get_full_name($reports['employer_id'])."</span><span id='company'>".$company->get_name($reports['employer_id'])."</span><br/><br/><hr/>";
			}
		?>
	</body>
</html>