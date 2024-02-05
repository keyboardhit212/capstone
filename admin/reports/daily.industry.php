<?php
	
	include '../../library/config.php';
	include '../../library/class.report.php';
	include '../../library/class.company.php';
	include '../../library/class.user.php';
	include '../../library/class.industry.php';
	
	$report = new Report();
	$company = new Company();
	$user = new User();
	$industry = new Industry();

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
		<div id="title"><span>Name</span><span id="companyText"></span></div>
		<?php
			foreach($report->industry_report("daily", $date) as $reports) {
				echo "<span id='employer'>".$industry->get_industry_name($reports['industry_id'])."</span><span id='company'>".$reports['industry']."</span><br/><br/><hr/>";
			}
		?>
	</body>
</html>