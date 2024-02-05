<?php
	
?>
<!DOCTYPE html>
<html>
	<head>
		<style>
			#viewContainer #upperContainer {
				width: 700px;
				height: auto;
				border-bottom: 1px solid #a5a5a3;
				margin: 0 auto;
			}
			#upperContainer #image {
				width: 110px;
				height: 110px;
				background: url('../images/ellipse.png') no-repeat;
				/*border: 1px solid black;*/
				margin-left: auto;
				margin-right: auto;
				margin-top: 20px;
			}
			#upperContainer #image #pic {
				width: 70px;
				height: 70px;
				/*border: 1px solid black;*/
				position: relative;
				left: 18px;
				top: 20px;
			}
			#pic img {
				width: 100%;
				height: 100%;
			}
			#title {
				width: 700px;
				height: auto;
				/*border: 1px solid black;*/
				margin-left: auto;
				margin-right: auto;
			}
			#title span {
				display: block;
				text-align: center;
				font-weight: bold;
				font-size: 45px;
				font-family: helvetica;
				color: #404340;
			}
			#description {
				width: 700px;
				height: auto;
				/*border: 1px solid black;*/
				margin-left: auto;
				margin-right: auto;
			}
			#description span {
				display: block;
				text-align: center;
				color: #404340;
				font-family: helvetica;
			}
			#address {
				width: 700px;
				height: auto;
				/*border: 1px solid black;*/
				margin-left: auto;
				margin-right: auto;
			}
			#address span {
				color: #404340;
				font-family: helvetica;
				display: block;
				text-align: center;
				fon-size: 23px;
				font-weight: bold;
			}
			#url {
				width: 700px;
				height: auto;
				/*border: 1px solid black;*/
				margin-left: auto;
				margin-right: auto;
				margin-bottom: 30px;
			}
			#url a {
				display: block;
				text-align: center;
				text-decoration: none;
				font-family: helvetica;
				color: #2061c9;
			}
			
			/*----------------------------------------------------LOWER CONTAINER-------------------------------------------*/
			
			#lowerContainer {
				width: 700px;
				height: auto;
				/*border: 1px solid black;*/
				margin-left: auto;
				margin-right: auto;
				margin-top: 20px;
				overflow: hidden;
			}
			
			#lowerContainer #contactText {
				font-family: helvetica;
				font-weight: bold;
				color: #404340;
				display: block;
				text-align: center;
				font-size: 22px;
			}
			
			#lowerContainer #email {
				width: 700px;
				height: auto;
				/*border: 1px solid black;*/
				float: left;
				margin-top: 25px;
			}
			
			#lowerContainer #email .left {
				font-family: helvetica;
				color: #404340;
				float: left;
				margin-left: 30px;
			}
			
			#lowerContainer #email .right {
				font-family: helvetica;
				color: #404340;
				float: right;
				font-weight: bold;
				margin-right: 30px;
			}
			
			#lowerContainer #contact {
				width: 700px;
				height: auto;
				/*border: 1px solid black;*/
				float: left;
				margin-top: 25px;
			}
			
			#lowerContainer #contact .left {
				font-family: helvetica;
				color: #404340;
				float: left;
				margin-left: 30px;
			}
			
			#lowerContainer #contact .right {
				font-family: helvetica;
				color: #404340;
				float: right;
				font-weight: bold;
				margin-right: 30px;
			}
			
			#lowerContainer #contact .right #links {
				width: 100px;
				height: auto;
				/*border: 1px solid black;*/
				position: relative;
				left: -100px;
			}
			
			#lowerContainer #edit {
				width: 190px;
				height: 40px;
				float: left;
				margin-left: 270px;
				margin-top: 70px;
				margin-bottom: 20px;
				background: #aee702;
				border-radius: 5px/5px;
			}
			
			#lowerContainer #edit span {
				font-family: helvetica;
				font-weight: bold;
				color: #404340;
				text-align: center;
				display: block;
				font-size: 22px;
				margin-top: 7px;
			}
		</style>
	</head>
	<body>
		<div id="upperContainer">
			<div id="image"><div id="pic"><img src="<?php echo $company->get_pic($_SESSION['user_id']); ?>"/></div></div><br/>
			<div id="title"><span><?php echo $company->get_name($_SESSION['user_id']); ?></span></div><br/>
			<div id="description"><span><?php echo $company->get_description($_SESSION['user_id']); ?></span></div><br/>
			<div id="address"><span><?php echo $company->get_address($_SESSION['user_id']); ?></span></div><br/>
			<div id="url"><a href="<?php echo $company->get_url($_SESSION['user_id']); ?>"><?php echo $company->get_url($_SESSION['user_id']); ?></a></div>
		</div>
		<div id="lowerContainer">
			<span id="contactText">Contact Information</span><br/>
			<div id="email">
				<span class="left">Email</span><span class="right"><?php echo $company->get_email($_SESSION['user_id']); ?></span>
			</div>
			<div id="contact">
				<span class="left">Contact Number</span><span class="right"><?php echo $company->get_phone($_SESSION['user_id']); ?></span>
			</div>
			<div id="contact">
				<span class="left">Employer's Name</span><span class="right"><?php echo $user->get_full_name($_SESSION['user_id']); ?></span>
			</div>
			<div id="contact">
				<span class="left">Links</span><span class="right"><div id="links"><?php foreach($company_link->get_links($_SESSION['user_id']) as $links){echo $links['company_link']." ";} ?></div></span>
			</div><br/>
			<a href="index.php?page=editcompany"><div id="edit"><span>Edit Company</span></div></a>
		</div>
	</body>
</html>