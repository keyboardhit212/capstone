<!DOCTYPE html>
<html>
	<head>
		<style>
			#viewContainer #cartContainer {
				width: 70%;
				height: 500px;
				margin-left: auto;
				margin-right: auto;
				margin-top: 20px;
			}
			#viewContainer #cartRow {
				width: 100%;
				height: 30px;
				border: 1px solid #a1a1a1;
			}
			#viewContainer #cartRow #content {
				width: 90%;
				height: 100%;
				float: left;
			}
			#viewContainer #cartRow #option {
				width: 10%;
				height: 100%;
				float: left;
			}
			#viewContainer #cartRow #content a {
				text-decoration: none;
				color: black;
				font-weight: bold;
				font-family: helvetica;
				position: relative;
				left: 20px;
				top: 5px;
			}
			#viewContainer #cartRow #option a img{
				position: relative;
				left: 30px;
				top: 5px;
			}
			#viewContainer #cartRow #date {
				margin-left: 100px;
				font-weight: bold;
				font-family: helvetica;
				position: relative;
				top: 5px;
			}
			#viewContainer #cartRow #time {
				margin-left: 100px;
				font-weight: bold;
				font-family: helvetica;
				position: relative;
				top: 5px;
			}
		</style>
	</head>
	<body>
		<div id="cartContainer">
			<?php
				foreach($cart->get_saved_job($_SESSION['user_id']) as $carts) {
					echo "<div id='cartRow'><div id='content'><a href='detail.php?page=jobdetail&job_id=".$carts['job_id']."&company_id=".$job->get_employer_id($carts['job_id'])."'>".$profession->get_profession_name($job->get_profession_id($carts['job_id']))."</a><span id='date'>".$company->get_name($job->get_employer_id($carts['job_id']))."</span><span id='time'>".$carts['job_date_added']."</span></div><div id='option'><a href='processes/process.jobcart.delete.php?job_id=".$carts['job_id']."'><img src='../images/delete.png'/></a></div></div>";
				}
			?>
			
		</div>
		<script src="../library/jquery.js" type="text/javascript"></script>
		<script src="library/js.js" type="text/javascript"></script>  
	</body>	
</html>