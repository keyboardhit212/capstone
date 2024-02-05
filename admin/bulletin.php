<!DOCTYPE html>
<html>
	<head>
		<style>
			#viewContainer #bulletinContainer {
				width: 100%;
				height: auto;
				margin-left: auto;
				margin-right: auto;
				display: block;
			
			}
			#viewContainer #bulletinContainer #rowContainer {
				width: 95%;
				height: auto;
				min-height: 150px;
				margin: 0 auto;
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
			/*---------------------------------------BULLETIN ROW LIST---------------------------------------------*/
			
			#bulletinListContainer {
				width: 100%;
				height: 50px;
				background: #b5ee08;
				border-radius: 5px/5px;
				margin-top: 10px;
			}
			#dateLabel {
				float: left;
				margin-left: 20px;
				margin-top: 10px;
			}
			#titleLabel {
				float: left;
				margin-left: 100px;
				margin-top: 10px;
			}
			#bulletinListContainer a  {
				display: block;
				width: auto;
				float: right;
				margin-right: 15px;
				margin-top: 10px;
			}
		</style>
	</head>
	<body>
		<div id="bulletinContainer">
			<img src="../images/announcement.png"/>
			<div id='rowContainer'><br/><br/>
				<?php
					foreach($bulletin->get_all($_SESSION['user_id']) as $bulletins) {
						echo "<div id='bulletinListContainer'><span id='dateLabel'>".$bulletins['when']."</span><span id='titleLabel'>".$bulletins['what']."</span><a href='processes/process.bulletin.delete.php?date=".$bulletins['date_added']."&time=".$bulletins['time_added']."'>Delete</a></div>";
					}
				?>
			</div>
		</div>
		<script src="../library/jquery.js" type="text/javascript"></script>
		<script src="library/js.js" type="text/javascript"></script>  
	</body>
</html>