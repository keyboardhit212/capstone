<!DOCTYPE html>
<html>
	<head>
		<style>
			#applicantRow {
				width: 100%;
				height: 30px;
				border-bottom: 1px solid gray;
				font-family: helvetica;
			}
			#applicantRow a {
				text-decoration: none;
				position: relative;
				top: 5px;
				margin-left: 10px;
			}
			#applicantRow a:hover {
				transition-duration: 0.5s;
				color: #9ec129;
			}
			#applicantRow span {
				float: right;
				position: relative;
				top: 5px;
				font-weight: bold;
				margin-right: 30px;
			}
		</style>
	</head>
	<body>
		<?php
			foreach($applicant->get_approved_applicant($company_id) as $applicants) {
				echo "<div id='applicantRow'><a href='detail.php?page=about&id=".$applicants['student_id']."'>".$user->get_full_name($applicants['student_id'])."</a><span>".$profession->get_profession_name($job->get_profession_id($applicants['job_id']))."</span></div><br/>";
			}
		?>
		
	</body>
</html>