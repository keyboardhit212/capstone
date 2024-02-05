<?php
	$job_id = (isset($_GET['job_id'])) ? $_GET['job_id'] : '';
	$result = (isset($_GET['result'])) ? $_GET['result'] : '';
?>
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
		#viewContainer form #requirementField {
			width: 20px;
			height: 20px;
			position: relative;
			left: 120px;
			top: 40px;
		}
		#viewContainer form #checkboxField {
			position: relative;
			top: 40px;
			left: 150px;
			font-family: helvetica;
			font-size: 20px;
			width: 50px;
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
		<div id="informationHeader"><span>Update Job</span></div><br/><br/>
		<?php echo (($result != '') ? "<div id='errorMessage'>Job Created Successfully</div>" : "") ?>
		<form action="processes/process.job.update.php?job_id=<?php echo $job_id; ?>" method="POST">
			<span id="jobIndustry">Job Industry</span><br/>
			<select name="industry" id="industry" >
				<?php
					echo "<option value='".$job->get_industry_id($job_id)."'>".$industry->get_industry_name($job->get_industry_id($job_id))."</option>";
				?>
			</select><br/><br/><br/>
			<span id="jobTitle">Job Title</span><br/>
			<select name="profession" id="profession">
				<?php
					echo "<option value='".$job->get_profession_id($job_id)."'>".$profession->get_profession_name($job->get_profession_id($job_id))."</option>";
				?>
			</select><br/><br/><br/>
			<span id="specialSkills">Special Skills</span><br/>
			<input type="text" name="skills" placeholder="Special Skills" id="specialSkillsField" value="<?php echo $job->get_skill($job_id); ?>"/><br/><br/><br/>
			<span id="description">Description</span><br/>
			<textarea name="description"><?php echo $job->get_description($job_id); ?></textarea><br/><br/><br/>
			<span id="offeredSalary">Offered Salary</span><br/>
			<input type="text" name="salary" placeholder="Offered Salary" id="salaryField" value="<?php echo $job->get_salary($job_id); ?>"/><br/>
			<input type="checkbox" name="requirement" value="1" id="requirementField" /><span id="checkboxField">Requires additional requirements, prevent from approving student<br/> without messaging</span><br/>
			<input type="submit" name="submit" value="Update Job" id="button"/>
		</form>
	</body>
</html>