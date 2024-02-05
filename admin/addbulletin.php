<?php
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
		#viewContainer form #checkBox {
			position: relative;
			left: 120px;
		}
		#viewContainer form #checkBoxLabel {
			font-weight: bold;
			position: relative;
			left: 130px;
		}
		/*------------------------------------------------ERROR MESSAGE------------------------------------*/
		#viewContainer #errorMessage {
			width: 700px;
			height: 30px;
			background: #6db245;
			font-family: helvetica;
			text-align: center;
			font-size: 20px;
			margin-left: auto;
			margin-right: auto;
			margin-top: 20px;
		}
		</style>
	</head>
	<body>
		<div id='informationHeader'><span>Create New Announcement</span></div><br/><br/>
		<?php echo (($result != '') ? "<div id='errorMessage'>Announcement Added Successfully</div>" : "") ?>
		<form action='processes/process.bulletin.add.php' method='POST'>
			<span id='jobIndustry'>What</span><br/>
			<input type="text" name="what" placeholder="Title" id="specialSkillsField"/>
			<br/><br/><br/>
			<span id="jobTitle">Where</span><br/>
			<input type="text" name="where" placeholder="Place" id="specialSkillsField"/>
			<br/><br/><br/>
			<span id="specialSkills">When</span><br/>
			<input type="date" name="when" placeholder="Special Skills" id="specialSkillsField"/><br/><br/><br/>
			<span id="description">Description</span><br/>
			<textarea name="description"></textarea><br/><br/><br/>
			<input type="checkbox" name="student" value="1" id='checkBox'/><span id='checkBoxLabel'>Announcement only for students</span><br/><br/>
			<input type="checkbox" name="employer" value="1" id='checkBox'/><span id='checkBoxLabel'>Announcement only for employers</span><br/>
			<input type="submit" name="submit" value="Create" id="button"/>
		</form>
	</body>
</html>