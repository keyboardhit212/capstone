<html>
	<head>
		<style>
			#pageContainer #aboutContainer {
				width: 100%;
				height: 100%;
				font-family: helvetica;
				font-size: 20px;
				display: block;
				color: #666666;
			}
			#pageContainer #aboutContainer #labelContainer {
				width: 300px;
				height: 500px;
				float: left;
			}
			#pageContainer #aboutContainer #labelContainer .label {
				float: right;
				margin-right: 100px;
			}
			#pageContainer #aboutContainer #contentContainer {
				width: 500px;
				height: 500px;
				float: left;
				margin-left: 50px;
				margin-right: auto;
			}
			#pageContainer #aboutContainer #contentContainer .content {
				margin-top: 10px;
				float: none;
			}
		</style>
	</head>
	<body>
		<div id="aboutContainer">
			<div id="labelContainer">
				<br/>
				<span class="label">Name:</span><br/><br/>
				<span class="label">Email:</span><br/><br/>
				<span class="label">Phone:</span><br/><br/>
				<span class="label">Education:</span><br/><br/>
				<span class="label">Majoring:</span><br/><br/>
				<span class="label">Industry:</span><br/><br/>
				<span class="label">Job Title:</span><br/><br/>
				<span class="label">URLs:</span><br/><br/>
				<span class="label">Special Skills:</span><br/><br/>
			</div>
			<div id="contentContainer">
				<br/>
				<span class="content"><?php echo $user->get_full_name($id); ?></span><br/><br/>
				<span class="content"><?php echo $student->get_email($id); ?></span><br/><br/>
				<span class="content"><?php echo $student->get_phone($id); ?></span><br/><br/>
				<span class="content"><?php echo $course->get_course_name($student->get_course($id)); ?></span><br/><br/>
				<span class="content"><?php echo $major->get_specialization_name($student->get_specialization($id)); ?></span><br/><br/>
				<span class="content"><?php echo $industry->get_industry_name($student->get_industry($id)); ?></span><br/><br/>
				<span class="content"><?php  echo $profession->get_profession_name($student->get_profession($id)); ?></span><br/><br/>
				<span class="content"><?php  echo $link->get_link($id);?></span><br/><br/>
				<span class="content"><?php echo $skill->get_skill($id); ?></span><br/><br/>
			</div>
		</div>
	</body>
</html>