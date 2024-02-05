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
			#listContainer #title span {
				font-family: helvetica;
				font-size: 25px;
				position: relative;
				top: 10px;
				left: 10px;
			}
			#listContainer #list {
				width: 100%;
				height: 550px;
				overflow-y: auto;

			}
			#listContainer #list #name {
				width: 590px;
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
			<div id="title"><span>Job Title</span></div>
			<div id="list">
				<?php
					foreach($job->get_job_list($_SESSION['user_id']) as $jobs) {
						echo "<div id='name'><a href='index.php?page=jobdetail&job_id=".$jobs['job_id']."'><span>".$profession->get_profession_name($jobs['profession_id'])."</span></a></div><div id='edit'><a href='index.php?page=editjob&job_id=".$jobs['job_id']."'><img src='../images/edit.png'/></a></div><div id='delete'><!--<a href='processes/process.job.delete.php?job_id=".$jobs['job_id']."'><img src='../images/delete.png'/></a>!--></div>";
					}
				?>
				
			</div>
		</div>
	</body>
</html>