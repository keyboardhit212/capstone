<?php 
	$college_id = (isset($_GET['college_id'])) ? $_GET['college_id'] : '0000';
	$course_id = (isset($_GET['course_id'])) ? $_GET['course_id'] : '';
	$industry_id = (isset($_GET['industry_id'])) ? $_GET['industry_id'] : '';
?>
<!DOCTYPE html>
<html>
	<head>
		<style>
			#viewContainer #basicInfo {
				width: 900px;
				height: 300px;
				margin-left: auto;
				margin-right: auto;
				margin-top: 30px;
				border: 1px solid #ced3ce;
				border-radius: 15px/15px;
				
			}
			#viewContainer #basicInfo #profilePic {
				width: 300px;
				height: 100%;
				float: left;
			}
			#viewContainer #basicInfo #profilePic #picContainer {
				width: 200px;
				height: 200px;
				border: 1px solid #ced3ce;
				border-radius: 100px/100px;
				position: relative;
				left: 50px;
				top: 10px;
				float: left;
				overflow: hidden;
			}
			#viewContainer #basicInfo #profilePic #picContainer img{
				width: 100%;
				height: 100%;
			}
			#viewContainer #basicInfo #profilePic #editPhoto {
				font-family: helvetica;
				float: left;
				margin-left: 30px;
				margin-top: 30px;
			}
			#viewContainer #basicInfo #profilePic #editPhoto a {
				text-decoration: none;
				color: #404340;
				font-weight: bold;
			}
			#viewContainer #basicInfo #profilePic #deletePhoto {
				font-family: helvetica;
				float: left;
				margin-left: 30px;
				margin-top: 30px;
			}
			#viewContainer #basicInfo #profilePic #deletePhoto a {
				text-decoration: none;
				color: #404340;
				font-weight: bold;
			}
			#viewContainer #basicInfo #names {
				width: 590px;
				height: 250px;
				float: left;
				border-left: 1px solid #5f5f5f;
				margin-top: 25px;
			}
			#viewContainer #basicInfo #names #fullName {
				width: 590px;
				height: 70px;
				float: left;
			}
			#viewContainer #basicInfo #names #fullName span {
				font-family: helvetica;
				font-weight: bold;
				color: #666666;
				font-size: 40px;
				position: relative;
				left: 20px;
				top: 20px;
			}
			#viewContainer #basicInfo #names #profession {
				width: 590px;
				height: 50px;
				float: left;
			}
			#viewContainer #basicInfo #names #profession span {
				font-family: helvetica;
				font-weight: bold;
				color: #a0d404;
				font-size: 30px;
				position: relative;
				left: 20px;
				top: -5px;
			}
			#viewContainer #basicInfo #names #industry {
				width: 590px;
				height: 30px;
				float: left;
				margin-top: 50px;
			}
			#viewContainer #basicInfo #names #industry span{
				font-family: helvetica;
				font-weight: bold;
				color: #666666;
				font-size: 20px;
				position: relative;
				left: 20px;
			}
			#viewContainer #basicInfo #names #email {
				width: 590px;
				height: 30px;
				float: left;
			}
			#viewContainer #basicInfo #names #email span{
				font-family: helvetica;
				color: #666666;
				font-size: 18px;
				position: relative;
				left: 20px;
			}
			#viewContainer #fields {
				width: 800px;
				height: 1150px;
				/*border: 1px solid green;*/
				margin-left: auto;
				margin-right: auto;
				margin-top: 20px;
			}
			#viewContainer #fields form input {
				width: 100%;
				height: 25px;
				border-radius: 5px/5px;
				border: 1px solid gray;
				font-size: 20px;
			}
			#viewContainer #fields form select {
				width: 100%;
				height: 25px;
				border-radius: 5px/5px;
				border: 1px solid gray;
				font-size: 20px;
			}
			#viewContainer #fields form span{
				font-family: helvetica;
				font-weight: bold;
				position: relative;
				left: 20px;
				font-size: 20px;
				color: #666666;
			}
			#viewContainer #fields form #submitButton {
				width: 150px;
				height: 35px;
				border-radius: 5px/5px;
				border: 1px solid transparent;
				font-size: 20px;
				background: #aee40a;
				color: #404340;
				position: relative;
				left: 300px;
				
			}
			#formUpload {
				display: none;
			}	
		</style>
	</head>
	<body>
		<div id="basicInfo">
			<div id="profilePic">
				<div id="picContainer"><img src="<?php echo $user->get_pic($_SESSION['user_id']); ?>"/></div><br/>
				<div id="editPhoto"><a href=""><img src="../images/edit.png"/>&nbsp;Edit Photo</a></div>
				<div id="deletePhoto"><a href="processes/process.student.photo.delete.php"><img src="../images/delete.png"/>&nbsp;Delete Photo</a></div>
			</div>
			<div id="names">
				<div id="fullName"><span><?php echo $user->get_full_name($_SESSION['user_id']) ?></span></div>
				<div id="profession"><span><?php echo $profession->get_profession_name($student->get_profession($_SESSION['user_id'])); ?></span></div>
				<div id="industry"><span><?php echo $industry->get_industry_name($student->get_industry($_SESSION['user_id'])); ?></span></div>
				<div id="email"><span><?php echo $student->get_email($_SESSION['user_id']); ?></span></div>
			</div>
		</div>
		<div id="fields">
			<form action="processes/process.student.info.php" method="POST">
				<span>First Name</span><br/>
				<input type="text" name="fname" placeholder="First Name" value="<?php echo $user->get_fname($_SESSION['user_id']); ?>"/><br/><br/>
				<span>Middle Name</span><br/>
				<input type="text" name="mname" placeholder="Middle Name" value="<?php echo $user->get_mname($_SESSION['user_id']) ?>"/><br/><br/>
				<span>Last Name</span><br/>
				<input type="text" name="lname" placeholder="Last Name" value="<?php echo $user->get_lname($_SESSION['user_id']) ?>"/><br/><br/>
				<span>Birthdate</span><br/>
				<input type="date" name="birthdate" placeholder="YYYY-MM-DD" value="<?php echo $user->get_birthdate($_SESSION['user_id']) ?>"/><br/><br/>
				<span>Email Address</span><br/>
				<input type="email" name="email" placeholder="Email" value="<?php echo $student->get_email($_SESSION['user_id']) ?>"/><br/><br/>
				<span>Phone Number</span><br/>
				<input type="number" name="phone" placeholder="Phone Number" value="<?php echo $student->get_phone($_SESSION['user_id']) ?>"/><br/><br/>
				<span>Gender</span><br/>
				<select name="gender">
					<option value='00000'>Select Gender</option>
					<option value='1' <?php echo ($user->get_gender($_SESSION['user_id']) == 1) ? 'selected' : ''; ?> >Male</option>
					<option value='2' <?php echo ($user->get_gender($_SESSION['user_id']) == 2) ? 'selected' : ''; ?> >Female</option>
				</select><br/><br/>
				<span>College</span><br/>
				<select name="college" id="college">
					<option value='00000'>Select College</option>
					<?php
						foreach($college->get_all_college() as $colleges) {
							echo "<option value='".$colleges['college_id']."' ".(($student->get_college($_SESSION['user_id']) == $colleges['college_id']) ? 'selected' : '')." >".$colleges['college_name']."</option>";
						}
					?>
				</select><br/><br/>
				<span>Course</span><br/>
				<select name="course" id="course">
					<option value='00000'>Select Course</option>
					<?php
						foreach($course->get_all_course() as $courses) {
							echo "<option value='".$courses['course_id']."' ".(($student->get_course($_SESSION['user_id']) == $courses['course_id']) ? 'selected' : '')." >".$courses['course_name']."</option>";
						}
					?>
				</select><br/><br/>
				<span>Major</span><br/>
				<select name="specialization" id="specialization">
					<option value='00000'>Select Major</option>
					<?php
						foreach($major->get_all_specialization() as $majors) {
							echo "<option value='".$majors['specialization_id']."' ".(($student->get_specialization($_SESSION['user_id']) == $majors['specialization_id']) ? 'selected' : '')." >".$majors['specialization_name']."</option>";
						}
					?>
				</select><br/><br/>
				<span>Industry</span><br/>
				<select name="industry" id="industries">
					<option value='00000'>Select Industry</option>
					<?php
						foreach($industry->get_all_industry() as $industries) {
							echo "<option value='".$industries['industry_id']."' ".(($student->get_industry($_SESSION['user_id']) == $industries['industry_id']) ? 'selected' : '')." >".$industries['industry_name']."</option>";
						}
					?>
				</select><br/><br/>
				<span>Job Title</span><br/>
				<select name="profession" id="professions">
					<option value='00000'>Select Profession</option>
					<?php
						foreach($profession->get_all_profession() as $professions) {
							echo "<option value='".$professions['profession_id']."' ".(($student->get_profession($_SESSION['user_id']) == $professions['profession_id']) ? 'selected' : '')." >".$professions['profession_name']."</option>";
						}
					?>
				</select><br/><br/>
				<span>Special Skills</span><br/>
				<input type="text" name="skill" placeholder="Special Skills" value="<?php echo $skill->get_skill($_SESSION['user_id']) ?>"/><br/><br/>
				<span>Skype Name</span><br/>
				<input type="text" name="skype" placeholder="Skype Name" value="<?php echo $student->get_skype($_SESSION['user_id'])?>"/><br/><br/>
				<span>Links</span><br/>
				<input type="text" name="link" placeholder="Links" value="<?php echo $link->get_link($_SESSION['user_id']) ?>"/><br/><br/>
				<br/><br/>
				<input type="submit" name="submit" value="Save Profile" id="submitButton" />
			</form>
		</div>                                                                                                                 
		<form action="processes/process.student.profile.pic.php" method="POST" id="formUpload" enctype="multipart/form-data">
			<input type="file" name="pic" id="uploadButton" onchange="this.form.submit();"/>
		</form>
		<script src="../library/jquery.js" type="text/javascript"></script>
		<script src="library/js.js" type="text/javascript"></script>  
	</body>
</html>