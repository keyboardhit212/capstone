<!DOCTYPE html>
<html>
	<head>
		<style>
			#viewContainer #referenceContainer {
				width: 900px;
				height: auto;
				margin: 0 auto;
				overflow: hidden;
			}
			#viewContainer #referenceContainer #addFormContainer {
				width: 600px;
				height: 500px;
				float: left;
				position: relative;
				left: 30px;
				display: none;
			}
			#viewContainer #referenceContainer #addLink {
				float: left;
				font-size: 20px;
				font-family: helvetica;
				text-decoration: none;
				color: black;
				position: relative;
				left: 20px;
				font-weight: bold;
				margin-top: 10px;
			}
			#viewContainer #referenceContainer #addFormContainer form input {
				width: 100%;
				height: 30px;
				/*border-radius: 3px/3px;*/
				/*border: 1px solid gray;*/
				font-size: 18px;
			}
			#viewContainer #referenceContainer a img {
				width: 30px;
				height: 30px;
				position: relative;
				left: -10px;
				top: 5px;
			}
			#viewsContainer #referenceContainer #addFormContainer {
				width: 100%;
				height: 100%;
				border: 1px solid black;
				float: left;
				background: blue;
			}
			/*-------------------------------------------------------------------------------RECORDS OF REFERENCES---------------------------------------*/
			
			#viewContainer #referenceContainer #referencesContainer {
				width: 100%;
				height: auto;
				float: left;
				margin-top: 10px;
				overflow: hidden;
				font-family: helvetica;
			}
			#viewContainer #referencesContainer #referenceRow {
				width: 850px;
				height: 200px;
				border-top: 1px solid gray;
				margin: 0 auto;
				margin-top: 10px;
			}
			#viewContainer #referencesContainer #referenceRow #referenceImage {
				width: 150px;
				height: 150px;
				border: 1px solid green;
				float: left;
				margin-left: 10px;
				margin-top: 4px;
				border-radius: 75px/75px;
				overflow: hidden;
			}
			#viewContainer #referencesContainer #referenceRow #referenceImage img {
				width: 100%;
				height: 100%;
			}
			#viewContainer #referencesContainer span {
				float: left;
				position: relative;
				left: 20px;
			}
			#viewContainer #referencesContainer span a {
				text-decoration: none;
				color: #313131;
				font-weight: bold;
				font-size: 15px;
			}
			#viewContainer #referencesContainer span #fullName {
				color: green;
				font-size: 25px;
			}
			#viewContainer #referencesContainer #delete {
				position: relative;
				left: 180px;
				text-decoration: none;
				color: #1f0c5c;
				transition-duration: 0.5s;
			}				
			#viewContainer #referencesContainer #delete:hover {
				transition-duration: 0.5s;
				font-weight: bold;
			}		
		</style>
	</head>
	<body>
		<div id="referenceContainer">
			<a id='addLink' href="" id="addReference"><img src="../images/add.png"/>Add Reference </a><br/><br/><br/><br/>
			<div id="addFormContainer">
				<form action='processes/process.student.add.reference.php' method='POST' enctype='multipart/form-data'>
					<input type='text' name='fname' placeholder='First Name' required /><br/><br/>
					<input type='text' name='mname' placeholder='Middle Name' required /><br/><br/>
					<input type='text' name='lname' placeholder='Last Name' required /><br/><br/>
					<input type='text' name='company' placeholder='Company' required /><br/><br/>
					<input type='text' name='contact' placeholder='Contact #' required /><br/><br/>
					<input type='email' name='email' placeholder='Email' required /><br/><br/>
					<input type='text' name='link' placeholder='Link' required /><br/><br/>
					<input type='file' name='pic' required /><br/><br/><br/>
					<input type='submit' />
				</form>
			</div>
			<div id="referencesContainer">
				<?php
					foreach($reference->get_references($_SESSION['user_id']) as $references) {
						echo "
							<div id='referenceRow'>
								<div id='referenceImage'>
									<img src='".$references['reference_pic']."'/>
								</div>
								<span ><a href='".$references['reference_url']."' id='fullName' >".$references['reference_fname']." ".$references['reference_mname']." ".$references['reference_lname']."</a></span><br/><br/><br/>
								<span><a>Email : ".$references['reference_email']."</a></span><br/><br/>
								<span><a>Company : ".$references['reference_company']."</a></span><br/><br/>
								<span><a>Mobile # : ".$references['reference_contact']."</a></span><br/><br/>
								<a href='processes/process.student.delete.reference.php?reference=".$references['reference_id']."' id='delete'>Delete</a>
							</div>
						";
					}
				?>
			</div>
		</div>
		<script type="text/javascript" src="../library/jquery.js"></script>
		<script type="text/javascript" src="library/js.js"></script>
	</body>
</html>