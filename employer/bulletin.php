<!DOCTYPE html>
<html>
	<head>
		<style>
			#viewContainer #bulletinContainer {
				width: 90%;
				height: auto;
				margin-left: auto;
				margin-right: auto;
				display: block;
			}
			#viewContainer #bulletinContainer #rowContainer {
				width: 90%;
				height: auto;
				min-height: 150px;
				margin-left: auto;
				font-family: helvetica;
				font-size: 20px;
				overflow: hidden;
			}
			#viewContainer #bulletinContainer #rowContainer #dateTimeLabel {
				margin-left: 20px;
				margin-top: 10px;
			}
			#viewContainer #bulletinContainer #rowContainer #whatLabel {
				margin-left: 30px;
				margin-top: 10px;
				float: left;
			}
			#viewContainer #bulletinContainer #rowContainer #whatContent {
				margin-right: 30px;
				margin-top: 10px;
				float: right;
			}
			#viewContainer #bulletinContainer #rowContainer #whereLabel {
				margin-left: 20px;
				margin-top: 10px;
				float: left;
			}
			#viewContainer #bulletinContainer #rowContainer #whereContent {
				margin-left: 100px;
				margin-top: 10px;
				float: left;
			}
			#viewContainer #bulletinContainer #rowContainer #whenLabel {
				margin-left: 20px;
				margin-top: 10px;
				float: left;
			}
			#viewContainer #bulletinContainer #rowContainer #whenContent {
				margin-left: 100px;
				margin-top: 10px;
				float: left;
			}
			#viewContainer #bulletinContainer #rowContainer #descriptionLabel {
				margin-left: 20px;
				margin-top: 10px;
				float: left;
			}
			#viewContainer #bulletinContainer #rowContainer #descriptionContent {
				margin-left: 20px;
				margin-top: 10px;
				float: left;
			}
			#viewContainer #bulletinContainer img {
				width: auto;
				position: relative;
				left: 150px;
				top: 20px;
			}
			#viewContainer #bulletinContainer #contentContainer {
				width: 100%;
				min-height: 500px;
				margin-bottom: 10px;
			}
			#viewContainer #bulletinContainer #eventContainer {
				width: 95%;
				min-height: 50px;
				background: #b5ee08;
				border-radius: 10px/10px;
				margin: 0 auto;
			}
			#viewContainer #bulletinContainer #venueContainer {
				width: 95%;
				min-height: 50px;
				border-radius: 10px/10px;
				margin: 0 auto;
			}
			#viewContainer #bulletinContainer #dateContainer {
				width: 95%;
				min-height: 50px;
				margin-top: 30px;
				margin: 0 auto;
			}
			#viewContainer #bulletinContainer #descriptionContainer {
				width: 95%;
				min-height: 200px;
				margin-top: 20px;
				margin: 0 auto;
				border: 1px solid black;
				border-radius: 10px/10px;
			}
		</style>
	</head>
	<body>
		<div id="bulletinContainer">
			<img src="../images/announcement.png"/>
			<div id='rowContainer'><br/><br/>
				<?php
					foreach($bulletin->get_employer_announcement() as $bulletins) {
						echo "<div id='contentContainer'><span id='dateTimeLabel'>Posted: ".DateTime::createFromFormat('Y-m-d',$bulletins['date_added'])->format('m/d/Y')." | ".$bulletins['time_added']."</span><br/><br/>
							<div id='eventContainer'><span id='whatLabel'>Event:</span><span id='whatContent'>".$bulletins['what']."</span><br/><br/></div>
							<div id='dateContainer'><span id='whereLabel'>Venue:</span><span id='whereContent'>".$bulletins['where']."</span><br/><br/></div>
							<div id='venueContainer'><span id='whenLabel'>When:</span><span id='whenContent'>".$bulletins['when']."</span><br/><br/></div>
							<div id='descriptionContainer'><span id='descriptionContent'>".$bulletins['description']."</span></div></div>";
					}
				?>
			</div>
		</div>
		<script src="../library/jquery.js" type="text/javascript"></script>
		<script src="library/js.js" type="text/javascript"></script>  
	</body>
</html>