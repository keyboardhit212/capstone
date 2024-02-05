<?php
	$error = (isset($_GET['error'])) ? $_GET['error'] : '';
?>
<!DOCTYPE html>
<html>
	<head>
		<style>
			#viewContainer #videoContainer {
				width: 100%;
				height: 500px;
				/*background: blue;*/
			}
			#viewContainer #videoContainer #video{
				width: 700px;
				height: 500px;
				background: black;
				margin-left: auto;
				margin-right: auto;
				margin-top: 20px;
				border-radius: 10px/10px;
			}
			#viewContainer #videoContainer #video video{
				width: 100%;
				height: 100%;
			}
			#viewContainer #videoContainer #options{
				width: 700px;
				height: 50px;
				/*border: 1px solid black;*/
				float: left;
				margin-left: 200px;
				margin-bottom: 20px;
			}
			#viewContainer #videoContainer #options #edit {
				width: 200px;
				height: 20px;
				/*border: 1px solid black;*/
				float: left;
				margin-left: 170px;
			}
			#viewContainer #videoContainer #options #delete {
				width: 200px;
				height: 20px;
				/*border: 1px solid black;*/
				float: left;
			}
			#viewContainer #videoContainer #options a {
				color: #404040;
				font-family: helvetica;
				text-decoration: none;
				font-weight: bold;
			}
			#viewContainer #videoContainer #options a span {
				position: relative;
				left: 10px;
			}
			#viewContainer #videoContainer #options a span:hover {
				transition-duration: 1s;
				color: #b0e413;
			}
			#uploadForm {
				display: none;
			}
			
			/*--------------------------------------------------ERROR MESSAGES-----------------------------*/
			
			#errorContainer {
				width: 700px;
				height: 30px;
				background: red;
				margin-left: auto;
				margin-right: auto;
				margin-top: 20px;
				font-family: helvetica;
			}
			#errorContainer span {
				text-align: center;
				display: block;
			}
			#warningMessage {
				display: block;
				text-align: center;
				font-family: helvetica;
			}
		</style>
	</head>
	<body>
		<div id="videoContainer">
			<?php echo (($error != '') ? "<div id='errorContainer'><span>Sorry but the file you uploaded exceeded the limit which is 50MB</span></div>" : '') ?>
			<br/>
			<span id="warningMessage">The maximum file size that you can upload is only 50 MB</span>
			<div id="video">
				<video controls>
						<source src="<?php echo $student->get_video($_SESSION['user_id']); ?>" type="video/mp4">
						<source src="<?php echo $student->get_video($_SESSION['user_id']); ?>" type="video/ogg">
				</video>
			</div><br/>
			<div id="options">
				<div id="edit"><a href=""><img src="../images/edit.png"/><span id="editVideo">Edit Video</span></a></div>
				<div id="delete"><a href="processes/process.student.video.delete.php"><img src="../images/delete.png"/><span>Delete Video</span></a></div>
			</div>
		</div>
		<script src="../library/jquery.js" type="text/javascript"></script>
		<script src="library/js.js" type="text/javascript"></script>
		<form action="processes/process.student.introduction.php" method="POST" enctype="multipart/form-data" id="uploadForm">
			<input type="file" name="video" id="uploadButton" onchange="this.form.submit();"/>
		</form>
	</body>
</html>