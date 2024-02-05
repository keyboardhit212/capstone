<!DOCTYPE html>
<html>
	<head>
		<style>
			#viewContainer #addContainer {
				width: 200px;
				height: 30px;
				margin-left: 100px;
				margin-top: 20px;
			}
			#viewContainer #addContainer img {
				width: 30px;
				height: 30px;
				float: left;
			}
			#viewContainer #addContainer a {
				font-family: helvetica;
				text-decoration: none;
				color: black;
				float: left;
				position: relative;
				left: 10px;
				top: 7px;
				font-weight: bold;
			}
			#viewContainer #addContainer a:hover {
				color: #b0e413;
				transition-duration: 1s;
				font-weight: bold;
			}
			#viewContainer #formContainer {
				width: 900px;
				margin-left: auto;
				margin-right: auto;
				margin-top: 10px;
				display: none;
			}
			#viewContainer #formContainer span {
				font-weight: bold;
				font-family: helvetica;
			}
			#viewContainer #formContainer #fileButton {
				position: relative;
				left: 50px;
			}
			#viewContainer #formContainer #submitButton {
				position: relative;
				left: 50px;
			}
			/*-----------------------------------------------CERTIFICATE SECTION------------------------------*/
			#viewContainer #credentialContainer {
				width: 900px;
				height: auto;
				margin-left: auto;
				margin-right: auto;
				margin-top: 10px;
				margin-bottom: 20px;
				overflow: hidden;s
			}
			#viewContainer #credentialContainer #credentialHolder {
				width: 150px;
				height: 200px;
				float: left;
				margin-left: 23px;
				margin-top: 20px;
				border: 1px dashed #506a00;
				border-radius: 5px/5px;
			}
			#viewContainer #credentialContainer #credentialHolder #picHolder{
				width: 100%;
				height: 150px;
				float: left;
			}
			#viewContainer #credentialContainer #credentialHolder #titleHolder{
				width: 100%;
				height: 30px;
				float: left;
				font-family: helvetica;
				font-size: 12px;
				font-weight: bold;
				text-align: center;
				
			}
			#viewContainer #credentialContainer #credentialHolder #titleHolder a {
				text-decoration: none;
				color: black;
			}
			#viewContainer #credentialContainer #credentialHolder #titleHolder a:hover {
				text-decoration: none;
				color: #b0e413;
				transition-duration: 0.5s;
			}
			#viewContainer #credentialContainer #credentialHolder #optionHolder{
				width: 100%;
				height: 30px;
				float: left;
				font-family: helvetica;
				font-size: 12px;
				
				font-weight: bold;
				text-align: center;
				
			}
			#viewContainer #credentialContainer #credentialHolder #optionHolder a{
				text-decoration: none;
				color: #666666;
			}
			#viewContainer #credentialContainer #credentialHolder #optionHolder a:hover{
				color: black;
				transition-duration: 0.5s;
			}
			#viewContainer #credentialContainer #credentialHolder #picHolder img {
				width: 100%;
				height: 100%;
			}
			
		</style>
	</head>
	<body>
		<div id="addContainer">
			<img src="../images/add.png" />
			<a href="" id="addCertificate">Add Certificate</a>
		</div>
		<div id="formContainer">
			<form action='processes/process.student.add.credential.php' method='POST' enctype='multipart/form-data'>
				<span>Type : </span><select name='type'>
					<option value='Image'>image</option>
					<option value='PDF'>pdf</option>
					<option value='Document'>document</option>
				</select><br/><br/>
				<span>Title : </span><input type='text' name='title' placeholder='Title'/><br/><br/>
				<input type='file' name='file' id='fileButton'/><br/><br/>
				<input type='submit' id='submitButton'/>
			</form>
		</div>
		<div id="credentialContainer">
			<?php
				foreach ($credential->get_credentials($_SESSION['user_id']) as $credentials) {
					echo "
						<a href='".$credentials['certificate_url']."' target='_blank'><div id='credentialHolder'>
							<div id='picHolder'><img src='../images/".$credentials['certificate_type'].".png'/></div>
							<div id='titleHolder'><a href=''>".$credentials['title']."</a></div>
							<div id='optionHolder'><a href='processes/process.student.delete.credential.php?date=".$credentials['certificate_date_added']."&time=".$credentials['certificate_time_added']."'>Delete</a></div>
						</div></a>
					";
				}
			?>
		</div>
		<script type="text/javascript" src="../library/jquery.js"></script>
		<script type="text/javascript" src="library/js.js"></script>
	</body>
</html>