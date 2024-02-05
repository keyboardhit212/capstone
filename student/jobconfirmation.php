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
				min-height: 130px;
				border: 1px solid #c6c6c4;
				float: left;
				overflow: hidden;
				padding-bottom: 10px;
			}
			#viewContainer #notificationContainer #notificationRow div {
				height: 100%;
				width: 130px;
				float: left;
				overflow: hidden;
			}
			#viewContainer #notificationContainer #notificationRow span {
				position: relative;
				top: 10px;
				left: 10px;
				width: 800px;
			}
			#viewContainer #notificationContainer div #pic {
				width: 100px;
				height: 100px;
				border-radius: 50px/50px;
				display: block;
				margin-left: auto;
				margin-right: auto;
				margin-top: 10px;
			}
			#viewContainer #notificationContainer #notificationRow #name {
				font-weight: bold;
			}
			#viewContainer #notificationContainer #notificationRow #date {
				font-weight: bold;
			}
			#viewContainer #notificationContainer #notificationRow #description {
				width: 700px;
				min-height: 50px;
				float: left;
				overflow: hidden;
				padding-bottom: 10px;
				text-align: justify;
				text-indent: 20px;
				letter-spacing: 1px;
				padding-right: 10px;
			}
			#viewContainer #notificationContainer #notificationRow #delete {
				float: right;
				display: block;
				margin-right: 30px;
				margin-top: 10px;
			}
			#viewContainer #notificationContainer #notificationRow #delete input {
				height: 30px;
				width: 100px;
				border: none;
				font-weight: bold;
				color: white;
				font-size: 15px;
				border-radius: 5px/5px;
				background: #84b000;
			}
			#viewContainer #notificationContainer #notificationRow #delete input:hover {
				height: 30px;
				width: 100px;
				border: none;
				font-weight: bold;
				color: white;
				font-size: 15px;
				border-radius: 5px/5px;
				transition-duration: 0.5s;
				background: #aee40a;
			}
		</style>
	</head>
	<body>
		<div id="notificationContainer">
			<?php
				foreach($applicant->get_job_approval($_SESSION['user_id']) as $approved) {
					echo "<div id='notificationRow'><div><img src='".$user->get_pic($job->get_employer_id($approved['job_id']))."' id='pic'/></div><span id='name'>".$company->get_name($job->get_employer_id($approved['job_id']))."</span><a href='processes/process.offer.accept.php?job_id=".$approved['job_id']."' id='delete'><input type='submit' value='Accept'/></a><br/><br/><span id='date'>".$approved['applicant_date_approved']." | ".$approved['applicant_time_approved']."</span><br/><br/><div id='description'><span>Congratulations! Your application has been approved by the ".$company->get_name($job->get_employer_id($approved['job_id']))." and you were hired as an ".$profession->get_profession_name($job->get_profession_id($approved['job_id']))."!. Please click the accept button to notify the employer that you are accepting the offer.</span></div></div>";
				}
			?>
		</div>
		<script src="../library/jquery.js" type="text/javascript"></script>
		<script src="library/js.js" type="text/javascript"></script>  
	</body>
</html>