<html>
	<head>
		<style>
			#pageContainer #videoContainer {
				width: 100%;
				height: 500px;
				background: black;
			}
		</style>
	</head>
	<body>
		<div id="videoContainer">
			<video width="100%" height="100%" controls>
				<source type="video/mp4" src="<?php echo $student->get_video($id); ?>">
			</video>
		</div>
	</body>
</html>