<!DOCTYPE html>
<html>
	<head>
		<style>
			#list {
				font-family: helvetica;
				font-weight: bold;
				width: 100%;
				color: #666666;
				font-size: 25px;
				text-decoration: none;
			}
		</style>
	</head>
	<body>
		<?php
			foreach($job->get_job_list($company_id) as $jobs) {
				echo "<a href='detail.php?page=jobdetail&job_id=".$jobs['job_id']."&company_id=".$company_id."' id='list'>&bull; ".$profession->get_profession_name($jobs['profession_id'])."</a><br/>";
			}
		?>
	</body>
</html>
