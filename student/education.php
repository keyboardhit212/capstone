<!DOCTYPE html>
<html>
	<head>
		<style>
			#viewContainer #educationContainer {
				width: 800px;
				margin-left: auto;
				margin-right: auto;
				margin-top: 20px;
				height: auto;
				border: 1px solid black;
			}
			#viewContainer #educationContainer span {
				font-family: helvetica;
				font-size: 25px;
				font-weight: bold;
				color: #b0e413;
			}
			#viewContainer #educationContainer #innerEducationContainer{
				width: 700px;
				margin-left: auto;
				margin-right: auto;
				margin-top: 20px;
				height: 300px;
				border: 1px solid black;
			}
		
		</style>
	</head>
	<body>
		<form action="" method="POST">
		<div id="educationContainer">
			<span>Education</span><br/><br/>
			<div id="innerEducationContainer">
				<span>Elementary Education</span><br/><br/>
				<span>From : </span><select name="year1[]" id="year"><option></option></select><span>To : </span>
				<select name="year2[]" id="year"><option></option></select><br/><br/>
				<input type="text" name="school" placeholder="School"/>
			</div>
		</div>
		</form>
	</body>
</html>