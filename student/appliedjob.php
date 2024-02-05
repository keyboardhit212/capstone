<!DOCTYPE html>
<html>
	<head>
		<style>
			#viewContainer #notificationContainer {
				width: 80%;
				height: 1000px;
				margin-left: auto;
				margin-right: auto;
				margin-bottom: 20px;
				margin-top: 20px;
				font-family: helvetica;
				display: block;
				overflow-y: auto;
			}
			#viewContainer #notificationContainer #notificationRow {
				width: 99%;
				min-height: 30px;
				border: 1px solid #c6c6c4;
				float: left;
				overflow: hidden;
				padding-bottom: 10px;
			}
			#viewContainer #notificationContainer #notificationRow #jobLabel {
				float: left;
				margin-left: 20px;
				font-size: 20px;
				color: black;
				text-decoration: none;
				position: relative;
				top: 5px;
				font-weight: bold;
			}
			#viewContainer #notificationContainer #notificationRow #jobLabel:hover {
				transition-duration: 0.5s;
				color: #4eb21c;
			}
			#viewContainer #notificationContainer #notificationRow #professionLabel {
				float: left;
				margin-left: 150px;
				font-size: 20px;
				color: black;
				text-decoration: none;
				position: relative;
				top: 5px;
				font-weight: bold;
			}
			#viewContainer #notificationContainer #notificationRow #professionLabel:hover {
				transition-duration: 0.5s;
				color: #4eb21c;
			}
			#viewContainer #notificationContainer #notificationRow #statusLabel {
				float: right;
				margin-right: 20px;
				font-family: helvetica;
				font-weight: bold;
				font-size: 20px;
				position: relative;
				top: 5px;
			}
		</style>
	</head>
	<body>
		<div id="notificationContainer">
			<?php
				foreach($applicant->get_applied_job($_SESSION['user_id']) as $applied) {
					echo "<div id='notificationRow' ".(($applied['status'] == 1) ? 'style=background:#adff2f' : '')."><a href='detail.php?page=jobdetail&job_id=".$applied['job_id']."&company_id=".$job->get_employer_id($applied['job_id'])."' id='jobLabel'>".$profession->get_profession_name($job->get_profession_id($applied['job_id']))."</a><a href='detail.php?page=companydetail&company_id=".$job->get_employer_id($applied['job_id'])."' id='professionLabel'>".$company->get_name($job->get_employer_id($applied['job_id']))."</a><a id='statusLabel'>".(($applied['status'] == 1) ? 'Approved' : 'Pending')."</a></div>";
				}
			?>
		</div>
		<script src="../library/jquery.js" type="text/javascript"></script>
		<script src="library/js.js" type="text/javascript"></script>  
	</body>
</html>