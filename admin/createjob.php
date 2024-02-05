<!DOCTYPE html>
<html>
	<head>
		<style>
			#viewContainer #informationHeader {
				float: left;
				width: 100%;
				height: 40px;
				background: #414340;
				border-top-left-radius: 10px;
				border-top-right-radius: 10px;
			}
			#viewContainer #informationHeader span {
				color: white;
				font-family: helvetica;
				font-weight: bold;
				font-size: 25px;
				position: relative;
				left: 70px;
				top: 5px;
			}
			
			/*------------------------------------JOB FORM---------------------------*/
			
		#viewContainer form {
			font-family: helvetica;
			position: relative;
			top: 50px;
		}		
		#viewContainer form #jobTitle {
			position: relative;
			left: 150px;
			color: #414340;
			font-size: 20px;
			font-weight: bold;
		}
		#viewContainer form #jobTitleField {
			width: 600px;
			height: 25px;
			position: relative;
			top: 5px;
			left: 120px;
			border: 2px solid #868686;
			font-size: 20px;
			border-radius: 10px;
		}
		#viewContainer form #jobIndustry {
			position: relative;
			left: 150px;
			color: #414340;
			font-size: 20px;
			font-weight: bold;
		}
		#viewContainer form select {
			width: 600px;
			height: 30px;
			position: relative;
			top: 5px;
			left: 120px;
			border: 2px solid #868686;
			font-size: 20px;
			border-radius: 10px;
		}
		#viewContainer form #specialSkills {
			position: relative;
			left: 150px;
			color: #414340;
			font-size: 20px;
			font-weight: bold;
		}
		#viewContainer form #specialSkillsField {
			width: 600px;
			height: 25px;
			position: relative;
			top: 5px;
			left: 120px;
			border: 2px solid #868686;
			font-size: 20px;
			border-radius: 10px;
		}
		#viewContainer form #description {
			position: relative;
			left: 150px;
			color: #414340;
			font-size: 20px;
			font-weight: bold;
		}
		#viewContainer form textarea {
			width: 600px;
			height: 170px;
			position: relative;
			top: 5px;
			left: 120px;
			border: 2px solid #868686;
			font-size: 20px;
			border-radius: 10px;
			resize: none;
		}
		#viewContainer form #offeredSalary {
			position: relative;
			left: 150px;
			color: #414340;
			font-size: 20px;
			font-weight: bold;
		}
		#viewContainer form #salaryField {
			width: 600px;
			height: 25px;
			position: relative;
			top: 5px;
			left: 120px;
			border: 2px solid #868686;
			font-size: 20px;
			border-radius: 10px;
		}
		#viewContainer form #button {
			position: relative;
			top: 100px;
			left: 560px;
			width: 150px;
			height: 30px;
			border-radius: 5px/5px;
			font-size: 20px;
			color: #3f4440;
			font-weight: bold;
			background: #aee702;
		}
		</style>
	</head>
	<body>
		<div id="informationHeader"><span>Create New Job</span></div>
		<form action="index.php?page=job" method="POST">
			<span id="jobIndustry">Job Industry</span><br/>
			<select name="industry">
				<option>Job Industry</option>
				<?php
					foreach($industry->get_all_industry() as $industries) {
						echo "<option value='".$industries['industry_id']."'>".$industries['industry_name']."</option>";
					}
					
				?>
			</select><br/><br/><br/>
			<span id="jobTitle">Job Title</span><br/>
			<select name="profession">
				<option>Job Title</option>
				<?php
					foreach($profession->get_all_profession() as $professions) {
						echo "<option value='".$professions['profession_id']."'>".$professions['profession_name']."</option>";
					}
				?>
			</select><br/><br/><br/>
			<span id="specialSkills">Special Skills</span><br/>
			<input type="text" name="skills" placeholder="Special Skills" id="specialSkillsField"/><br/><br/><br/>
			<span id="description">Description</span><br/>
			<textarea name="description"></textarea><br/><br/><br/>
			<span id="offeredSalary">Offered Salary</span><br/>
			<input type="text" name="salary" placeholder="Offered Salary" id="salaryField"/><br/>
			<input type="submit" name="submit" value="Create Job" id="button"/>
		</form>
	</body>
</html>