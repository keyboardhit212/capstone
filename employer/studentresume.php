<html>
	<head>
		<style>
			#pageContainer #aboutContainer {
				width: 100%;
				height: auto;
				font-family: helvetica;
				font-size: 20px;
				display: block;
				font-family: helvetica;
				padding-bottom: 20px;
			}
			#pageContainer #aboutContainer #objectiveLabel {
				font-size: 23px;
				font-weight: bold;
				margin-left: 50px;
				margin-top: 10px;
				float: left;
			}
			#pageContainer #aboutContainer #objectiveContent {
				font-size: 16px;
				position: relative;
				left: -70px;
				top: 30px;
				float: left;
				width: 600px;
			}
			
			/*---------------------------------------------------REFERENCE CONTAINER-----------------------------*/
			
			#pageContainer #aboutContainer #referenceLabel {
				font-size: 25px;
				margin-left: 50px;
				font-weight: bold;
			}
			#pageContainer #referenceContainer {
				width: 780px;
				height: 150px;
				border: 1px solid #6e6e6e;
				margin-left: 50px;
				margin-top: 30px;
				border-radius: 5px/5px;
			}
			#pageContainer #referenceContainer #referenceImage {
				width: 125px;
				height: 125px;
				border: 1px solid black;
				position: relative;
				left: 10px;
				top: 12px;
				border-radius: 62.5px/62.5px;
				float: left;
				overflow: hidden;
			}
			#pageContainer #referenceContainer #referenceImage img {
				width: 100%;
				height: 100%;
			}
			#pageContainer #referenceContainer #nameLabel {
				color: green;
				display: block;
				float: left;
				position: relative;
				left: 30px;
				top: 20px;
				font-size: 20px;
				font-weight: bold;
			}	
			#pageContainer #referenceContainer #emailLabel {
				color: black;
				display: block;
				float: left;
				position: relative;
				left: 30px;
				top: 20px;
				font-size: 15px;
			}	
		</style>
	</head>
	<body>
		<div id="aboutContainer">
			<span id="objectiveLabel">Objective</span><br/>
			<span id="objectiveContent"><?php echo $resume->get_objective($id) ?></span><br/><br/><br/><br/>
			<span id="objectiveLabel">Interest/Hobbies</span><br/>
			<span id="objectiveContent"><?php echo $resume->get_interest($id) ?></span><br/><br/><br/><br/>
			<span id="objectiveLabel">Achievements</span><br/>
			<span id="objectiveContent"><?php echo $resume->get_achievement($id) ?></span><br/><br/><br/><br/>
			<span id="objectiveLabel">Experiences</span><br/>
			<span id="objectiveContent"><?php echo $resume->get_experience($id) ?></span><br/><br/><br/><br/><br/>

			<span id="referenceLabel">References</span><br/>
			<?php
				foreach($reference->get_references($id) as $references) {
					echo "<div id='referenceContainer'>
					<div id='referenceImage'><img src='".$references['reference_pic']."'/></div>
					<a href='".$references['reference_url']."'><span id='nameLabel'>".$references['reference_fname']." ".$references['reference_mname']." ".$references['reference_lname']."</span><br/></a>
					<span id='emailLabel'>".$references['reference_email']."</span><br/>
					<span id='emailLabel'>".$references['reference_company']."</span><br/>
					<span id='emailLabel'>".$references['reference_contact']."</span>
				</div>";
				}
				
			?>
			
		</div>
	</body>
</html>