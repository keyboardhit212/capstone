<!DOCTYPE html>
<html>
	<head>
		<style>
			#searchContainer {
				width: 700px;
				height: 50px;
				/*border: 1px solid black;*/
				margin-left: auto;
				margin-right: auto;
				margin-top: 20px;
			}
			#searchContainer form #jobField {
				width: 300px;
				height: 20px;
			}
			#searchContainer form #searchButton {
				position: relative;
				left: 10px;
				top: 8px;
			}
			#searchContainer form select {
				width: 250px;
				height: 25px;
				position: relative;
				left: 100px;
			}
			
			/*------------------------------------------LIST CONTAINER-------------------------------------*/
			
			#listContainer {
				width: 700px;
				height: 600px;
				border: 1px solid #cdcdcb;
				margin-left: auto;
				margin-right: auto;
				margin-top: 0px;
			}
			#listContainer #title {
				width: 100%;
				height: 50px;
				border-bottom: 1px solid #cdcdcb;
			}
			#listContainer #title .left {
				font-family: helvetica;
				font-size: 25px;
				position: relative;
				top: 10px;
				left: 10px;
			}
			#listContainer #title .right {
				font-family: helvetica;
				font-size: 25px;
				position: relative;
				top: 10px;
				left: 200px;
			}
			#listContainer #list {
				width: 100%;
				height: 550px;
				overflow-y: auto;
			}
			#listContainer #list #name {
				width: 343px;
				height: 30px;
				border-bottom: 1px solid #dcdcdc;
				float: left;
				font-size: 18px;
				font-family: helvetica;
			}
			#listContainer #list #edit {
				width: 50px;
				height: 30px;
				border-bottom: 1px solid #dcdcdc;
				float: left;
			}
			#listContainer #list #delete {
				width: 50px;
				height: 30px;
				border-bottom: 1px solid #dcdcdc;
				float: left;
			}
			#listContainer #list img {
				position: relative;
				top: 8px;
				left: 20px;
			}
			#listContainer #list #name span {
				margin-left: 5px;
				position: relative;
				top: 5px;
			}
			#listContainer #list #name a {
				text-decoration: none;
				color: black;
			}
			#listContainer #list #name a:hover {
				color: green;
				transition-duration: 0.5s;
			}
			#listContainer #list #job {
				height: 30px;
				width: 250px;
				float: left;
				font-size: 18px;
				font-family: helvetica;
				border-bottom: 1px solid #dcdcdc;
			}
		</style>
	</head>
	<body>
		<div id="searchContainer">
			<!--<form action="nothing.php" method="POST">
				<input type="text" name="job" placeholder="Search Title" id="jobField"/>
				<input type="image" src="../images/search.png" id="searchButton"/>
				<select name="sort">
					<option>Sort By</option>
				</select>
			</form>!-->
		</div>
		<div id="listContainer">
			<div id="title"><span class="left">Job Inquirer</span><span class="right">Job Inquiring</span></div>
			<div id="list"> 
			<?php
					foreach($applicant->get_applicant($_SESSION['user_id']) as $applicant) {
						echo "<div id='name' ".(($applicant['status'] == true) ? 'style=background:#9acd32' : '')."><a href='detail.php?page=current&id=".$applicant['student_id']."&job_id=".$applicant['job_id']."'><span>".$user->get_full_name($applicant['student_id'])."</span></a></div><div id='job' ".(($applicant['status'] == true) ? 'style=background:#9acd32' : '').">".$profession->get_profession_name($job->get_profession_id($applicant['job_id']))."</div><div id='edit' ".(($applicant['status'] == true) ? 'style=background:#9acd32' : '').">".(($job->is_required($applicant['job_id']) == true /*$message->has_message($applicant['student_id'],$_SESSION['user_id']) == true*/) ? (($message->has_message($applicant['student_id'],$_SESSION['user_id']) == true) ? "<a href='processes/process.application.approve.php?&job_id=".$applicant['job_id']."&stud_id=".$applicant['student_id']."'><img src='../images/edit.png'/></a>"  : '') : "<a href='processes/process.application.approve.php?&job_id=".$applicant['job_id']."&stud_id=".$applicant['student_id']."'><img src='../images/edit.png'/></a>")."</div><div id='delete' ".(($applicant['status'] == true) ? 'style=background:#9acd32' : '')."><a href='processes/process.application.reject.php?job_id=".$applicant['job_id']."&stud_id=".$applicant['student_id']."'><img src='../images/delete.png'/></a></div>";
					}
				?>
			</div>
		</div>
	</body>
</html>