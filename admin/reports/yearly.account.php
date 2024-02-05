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
		<div id="title"><span>Data Info</span><span id="companyText"></span></div>
		<?php
			foreach($report->account_report("yearly", $date) as $reports) {
				echo "<span id='employer'>".'Registered Students'."</span><span id='company'>".$reports['registered_students']."</span><br/><br/><hr/>";
				echo "<span id='employer'>".'Registered Employers'."</span><span id='company'>".$reports['registered_employers']."</span><br/><br/><hr/>";
				echo "<span id='employer'>".'Active Students'."</span><span id='company'>".$reports['active_students']."</span><br/><br/><hr/>";
				echo "<span id='employer'>".'Active Employers'."</span><span id='company'>".$reports['active_employers']."</span><br/><br/><hr/>";
				echo "<span id='employer'>".'Blocked Students'."</span><span id='company'>".$reports['blocked_students']."</span><br/><br/><hr/>";
				echo "<span id='employer'>".'Blocked Employers'."</span><span id='company'>".$reports['blocked_employers']."</span><br/><br/><hr/>";
				echo "<span id='employer'>".'Total Users'."</span><span id='company'>".$reports['total_users']."</span><br/><br/><hr/>";
				echo "<span id='employer'>".'Student Achiever'."</span><span id='company'>".$reports['student_achiever']."</span><br/><br/><hr/>";
				echo "<span id='employer'>".'Total Approved Users'."</span><span id='company'>".$reports['active_users']."</span><br/><br/><hr/>";
				echo "<span id='employer'>".'Total Unapproved Users'."</span><span id='company'>".$reports['inactive_users']."</span><br/><br/><hr/>";
				echo "<span id='employer'>".'Total Hired Students'."</span><span id='company'>".$reports['hired_student']."</span><br/><br/><hr/>";
				echo "<span id='employer'>".'Total Job Posted'."</span><span id='company'>".$reports['job_posted']."</span><br/><br/><hr/>";
			}
		?>
	</body>
</html>