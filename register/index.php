<!DOCTYPE html>
<html>
	<head>
		<style>
			#container {
				width: 700px;
				height: 1500px;
				margin: 0 auto;
				border: 1px solid #898989;
				border-radius: 10px/10px;
			}
			#container #header {
				width: 100%;
				height: 30px;
				border-top-left-radius: 10px;
				border-top-right-radius: 10px;
				background: #414340;
			}
			#container #header span {
				font-family: helvetica;
				font-weight: bold;
				color: white;
				position: relative;
				left: 30px;
				top: 5px;
				font-size: 18px;
			}
			form .label {
				color: #424441;
				font-weight: bold;
				font-family: helvetica;
				position: relative;
				left: 150px;
				font-size: 20px;
			}
			form input {
				width: 500px;
				border: 2px solid #868686;
				border-radius: 5px/5px;
				position: relative;
				left: 100px;
				height: 25px;
				font-size: 20px;
			}
			form select {
				width: 500px;
				border: 2px solid #868686;
				border-radius: 5px/5px;
				position: relative;
				left: 100px;
				height: 25px;
				font-size: 20px;
			}
			form #button {
				width: 200px;
				height: 30px;
				position: relative;
				left: 250px;
				margin-bottom: 50px;
			}
		</style>
	</head>
	<body>
		<div id="container">
			<div id="header"><span>Admin Registration</span></div><br/><br/>
			<form action="process.admin.register.php" method="POST" enctype="multipart/form-data">
				<span class="label">Profile Picture</span><br/><br/>
				<input type="file" name="pic" /><br/><br/><br/>
				<span class="label">First Name</span><br/><br/>
				<input type="text" name="fname" placeholder="First Name" /><br/><br/><br/>
				<span class="label">Middle Name</span><br/><br/>
				<input type="text" name="mname" placeholder="Middle Name" /><br/><br/><br/>
				<span class="label">Last Name</span><br/><br/>
				<input type="text" name="lname" placeholder="Last Name" /><br/><br/><br/>
				<span class="label">Username</span><br/><br/>
				<input type="text" name="username" placeholder="Username" /><br/><br/><br/>
				<span class="label">Password</span><br/><br/>
				<input type="text" name="password" placeholder="Password" /><br/><br/><br/>
				<span class="label">Confirm Password</span><br/><br/>
				<input type="text" name="confirmpassword" placeholder="Confirm Password" /><br/><br/><br/>
				<span class="label">Birthdate</span><br/><br/>
				<input type="date" name="birthdate" placeholder="YYYY-MM-DD" /><br/><br/><br/>
				<span class="label">Gender</span><br/><br/>
				<select name="gender">
					<option>Gender</option>
					<option value="1">Male</option>
					<option value="2">Female</option>
				</select><br/><br/><br/><br/><br/><br/>
				<input type="submit" name="submit" value="Register" id="button"/>
			</form>
		</div>
	</body>
</html>