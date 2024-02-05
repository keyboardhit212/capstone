<!DOCTYPE html>
<html>
	<head>
		<style>
				#viewContainer #informationHeader {
				float: left;
				width: 100%;
				height: 40px;
				background: #414340;
				border-top-left-radius: 10px;
				border-top-right-radius: 10px;
			}
			
			#viewContainer #informationHeader span {
				color: white;
				font-family: helvetica;
				font-weight: bold;
				font-size: 25px;
				position: relative;
				left: 70px;
				top: 5px;
			}
			
			#viewContainer #pic {
				width: 70px;
				height: 70px;
				position: relative;
				left: 365px;
				top: -90px;
			}
			#viewContainer #ellipse {
				margin-left: auto;
				margin-right: auto;
				margin-top: 70px;
				display: block;
			}
			#viewContainer #pic img {
				width: 100%;
				height: 100%;
			}	
			
				/*------------------------------------JOB FORM---------------------------*/
			
		#viewContainer form {
			font-family: helvetica;
			position: relative;
			top: 0px;
		}		
		#viewContainer form .text {
			position: relative;
			left: 150px;
			color: #414340;
			font-size: 20px;
			font-weight: bold;
		}
		#viewContainer form .textField {
			width: 600px;
			height: 25px;
			position: relative;
			top: 5px;
			left: 120px;
			border: 2px solid #868686;
			font-size: 20px;
			border-radius: 10px;
		}
		
		#viewContainer form textarea {
			width: 600px;
			height: 150px;
			position: relative;
			top: 5px;
			left: 120px;
			border: 2px solid #868686;
			font-size: 20px;
			border-radius: 10px;
			resize: none;
		}
	
		#viewContainer form #button {
			position: relative;
			top: 100px;
			left: 560px;
			width: 150px;
			height: 30px;
			border-radius: 5px/5px;
			font-size: 20px;
			color: #3f4440;
			font-weight: bold;
			background: #aee702;
		}
		</style>
	</head>
	<body>
		<div id="informationHeader"><span>Edit Company</span></div>
		<img src="../images/ellipse.png" id="ellipse"/>
		<div id="pic"><img src="<?php echo $company->get_pic($_SESSION['user_id']); ?>"/></div>
		<form action="processes/process.company.edit.php" method="POST" enctype="multipart/form-data">
			<span class="text">Logo</span><br/>
			<input type="file" name="pic" class="textField"/><br/><br/><br/>
			<span class="text">Company Name</span><br/>
			<input type="text" name="company" placeholder="Company Name" class="textField" value="<?php echo $company->get_name($_SESSION['user_id']); ?>"/><br/><br/><br/>
			<span class="text">Address</span><br/>
			<input type="text" name="address" placeholder="Address" class="textField" value="<?php echo $company->get_address($_SESSION['user_id']); ?>" /><br/><br/><br/>
			<span class="text">Email</span><br/>
			<input type="email" name="email" placeholder="Email" class="textField" value="<?php echo $company->get_email($_SESSION['user_id']); ?>"/><br/><br/><br/>
			<span class="text">Telephone/Phone No.</span><br/>
			<input type="text" name="phone" placeholder="Telephone/Phone No." class="textField" value="<?php echo $company->get_phone($_SESSION['user_id']); ?>"/><br/><br/><br/>
			<span class="text">Website URL</span><br/>
			<input type="text" name="url" placeholder="URL" class="textField" value="<?php echo $company->get_url($_SESSION['user_id']); ?>"/><br/><br/><br/>
			<span class="text">Description</span><br/>
			<textarea name="description" placeholder="Company Description"><?php echo $company->get_description($_SESSION['user_id']); ?></textarea><br/><br/><br/>
			<span class="text">Links</span><br/>
			<textarea name="link" placeholder="Multiple links should be separated with a comma and space"><?php echo $company->get_link($_SESSION['user_id']); ?></textarea><br/><br/><br/>
			<input type="submit" name="submit" value="Submit" id="button"/>
		</form>
	</body>
</html>