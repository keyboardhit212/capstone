<!DOCTYPE html>
<html>
	<head>
		<style>
			#viewContainer #resumeContainer {
				width: 900px;
				height: auto;
				margin: 0 auto;
				font-family: helvetica;
			}
			#viewContainer #resumeContainer #objectiveContainer {
				width: 800px;
				margin-left: auto;
				margin-right: auto;
				margin-top: 20px;
				height: 200px;
			}
			#viewContainer #resumeContainer #objectiveContainer span {
				font-family: helvetica;
				font-size: 25px;
				font-weight: bold;
				color: #b0e413;
			}
			#viewContainer #resumeContainer #interestContainer {
				width: 800px;
				margin-left: auto;
				margin-right: auto;
				margin-top: 20px;
				height: 200px;
			}
			#viewContainer #resumeContainer #interestContainer span {
				font-family: helvetica;
				font-size: 25px;
				font-weight: bold;
				color: #b0e413;
			}
			#viewContainer #resumeContainer #achievementContainer {
				width: 800px;
				margin-left: auto;
				margin-right: auto;
				margin-top: 20px;
				height: 200px;
			}
			#viewContainer #resumeContainer #achievementContainer span {
				font-family: helvetica;
				font-size: 25px;
				font-weight: bold;
				color: #b0e413;
			}
			#viewContainer #resumeContainer #educationContainer {
				width: 800px;
				margin-left: auto;
				margin-right: auto;
				margin-top: 20px;
				height: auto;
				border: 1px solid black;
			}
			#viewContainer #resumeContainer #educationContainer span {
				font-family: helvetica;
				font-size: 25px;
				font-weight: bold;
				color: #b0e413;
			}
			#viewContainer #resumeContainer #educationContainer #innerEducationContainer{
				width: 700px;
				margin-left: auto;
				margin-right: auto;
				margin-top: 20px;
				height: 300px;
				border: 1px solid black;
			}
			/*-----------------------------------------FORM SECTION---------------------------------------------*/
			#resumeContainer form #objectiveField {
				width: 100%;
				font-family: helvetica;
				font-size: 20px;
				border: 1px solid gray;
				height: 145px;
				resize: none;
				border-radius: 5px/5px;
			}
			#resumeContainer form #interestField {
				width: 100%;
				font-family: helvetica;
				font-size: 20px;
				border: 1px solid gray;
				height: 145px;
				resize: none;
				border-radius: 5px/5px;
			}
			#resumeContainer #saveButton {
				width: 150px;
				height: 35px;
				margin-top: 50px;
				margin-bottom: 20px;
				border-radius: 5px/5px;
				border: 1px solid transparent;
				font-size: 20px;
				background: #aee40a;
				color: #404340;
				position: relative;
				left: 370px;
			}
		</style>
	</head>
	<body>
		<div id="resumeContainer">
			<form action="processes/process.student.resume.php" method="POST">
				<div id="objectiveContainer">
					<span>Objective</span><br/><br/>
					<textarea name="objective" id="objectiveField"><?php echo $resume->get_objective($_SESSION['user_id']); ?></textarea>
				</div>
				<div id="interestContainer">
					<span>Interests/Hobbies</span><br/><br/>
					<textarea name="interest" id="interestField"><?php echo $resume->get_interest($_SESSION['user_id']); ?></textarea>
				</div>
				<div id="achievementContainer">
					<span>Achievements</span><br/><br/>
					<textarea name="achievement" id="interestField"><?php echo $resume->get_achievement($_SESSION['user_id']); ?></textarea>
				</div>
				<div id="achievementContainer">
					<span>Experiences</span><br/><br/>
					<textarea name="experience" id="interestField"><?php echo $resume->get_experience($_SESSION['user_id']); ?></textarea>
				</div>
				<input type="submit" name="submit" value="Save" id="saveButton"/>
			</form>
		</div>
		<script src="../library/jquery.js" type="text/javascript"></script>
		<script src="library/js.js" type="text/javascript"></script>
	</body>
</html>