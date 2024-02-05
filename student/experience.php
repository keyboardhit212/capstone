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
			#viewContainer #resumeContainer #experienceContainer {
				width: 800px;
				margin-left: auto;
				margin-right: auto;
				margin-top: 20px;
				height: auto;
				
			}
			#viewContainer #resumeContainer #experienceContainer span {
				font-family: helvetica;
				font-size: 25px;
				font-weight: bold;
				color: #b0e413;
			}
			#viewContainer #resumeContainer #experienceContainer img {
				width: 25px;
				height: 25px;
				position: relative;
				left: 5px;
				top: 5px;
			}
			/*---------------------------------------FORM FIELDS-------------------------------*/
			#resumeContainer form #descriptionField {
				width: 100%;
				font-family: helvetica;
				font-size: 20px;
				border: 1px solid gray;
				height: 145px;
				resize: none;
				border-radius: 5px/5px;
			}
			#resumeContainer #experienceContainer #year {
				height: 25px;
				font-size: 20px;
				width: 30%;
			}
			#resumeContainer #experienceContainer #company {
				height: 25px;
				font-size: 20px;
				width: 100%;
				border: 1px solid gray;
				border-radius: 5px/5px;
			}
			#resumeContainer #experienceContainer #position {
				height: 25px;
				font-size: 20px;
				width: 100%;
				border: 1px solid gray;
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
			<form action="" method="POST">
				<div id="experienceContainer">
						<span>Experiences <img src="../images/add.png" id="addExperienceField"></span><br/><br/><br/>
						<span>From : </span><select name="year1[]" id="year"><option></option></select><span>To : </span>
						<select name="year2[]" id="year"><option></option></select><br/><br/>
						<input type="text" name="company[]" placeholder="Company Name" id="company"/><br/><br/>
						<input type="text" name="position[]" placeholder="Position" id="position"/><br/><br/>
						<textarea name="description[]" id="descriptionField" placeholder="Description"></textarea><br/><br/>
				</div>
				<input type="submit" name="submit" value="Save" id="saveButton"/>
			</form>
		</div>
		<script src="../library/jquery.js"></script>
		<script src="library/js.js"></script>
	</body>
<html>