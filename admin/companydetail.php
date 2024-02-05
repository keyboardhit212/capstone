<?php

$job_id = (isset($_GET['job_id'])) ? $_GET['job_id'] : '';
$company_id = (isset($_GET['company_id'])) ? $_GET['company_id'] : '';
$company_page = (isset($_GET['company_page'])) ? $_GET['company_page'] : '';

?>
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
			
			/*---------------------------------------------------------------------COMPANY DETAILS----------------------------------------------*/
			
			#viewContainer #companyDetails {
				width: 700px;
				height: auto;
				overflow: hidden;
				border: 1px solid #ced3cd;
				margin-left: auto;
				margin-right: auto;
				margin-top: 60px;
				border-radius: 10px/10px;
				
			}
			#viewContainer #companyDetails #pic {
				width: 200px;
				height: 170px;
				border-right: 1px solid #b7b7b7;
				margin-top: 10px;
				margin-bottom: 10px;
				float: left;
			}
			#viewContainer #companyDetails #pic #ellipse {
				float: left;
				position: relative;
				left: 50px;
				top: 10px;
			}
			#viewContainer #companyDetails #logo {
				width: 75px;
				height: 75px;
				float: left;
				position: relative;
				left: -43px;
				top: 25px;
			}
			#viewContainer #companyDetails #pic a {
				text-decoration: none;
				font-family: helvetica;
				color: #2160c9;
				position: relative;
				top: 30px;
				display: block;
				text-align: center;
			}
			#viewContainer #companyDetails #logo img {
				width: 100%;
				height: 100%;
			}
			#viewContainer #companyDetails #companyName {
				display: block;
				text-align: center;
				margin-top: 10px;
				font-family: helvetica;
				font-weight: bold;
				color: #666666;
				font-size: 30px;
			}
			#viewContainer #companyDetails #companyDescription {
				display: block;
				text-align: center;
				margin-top: 10px;
				font-family: helvetica;
				color: #666666;
				font-size: 16px;
			}
			#viewContainer #companyDetails #companyAddress {
				display: block;
				text-align: center;
				margin-top: 10px;
				font-family: helvetica;
				color: #666666;
				font-size: 16px;
				font-weight: bold;
			}
			
			/*-----------------------------------------------------NAVIGATION-----------------------------------*/
			
			#viewContainer #navigation {
				width: 700px;
				height: 50px;
				border-top: 1px solid #bababa;
				border-bottom: 1px solid #bababa;
				margin-left: auto;
				margin-right: auto;
				margin-top: 20px;
				font-family: helvetica;
				font-size: 20px;
				font-weight: bold;
			}
			#viewContainer #navigation .left {
				width: 30%;
				height: 100%;
				float: left;
				border-right: 1px solid #bababa;
			}
			#viewContainer #navigation .right {
				width: 30%;
				height: 100%;
				float: left;
				border-left: 1px solid #bababa;
			}
			#viewContainer #navigation .left span {
				display: block;
				text-align: center;
				color: #676767;
				position: relative;
				top: 10px;
			}
			#viewContainer #navigation .right span {
				display: block;
				text-align: center;
				color: #676767;
				position: relative;
				top: 10px;
			}
			
			/*-----------------------------------------------------------LOWER CONTAINER------------------------------------------*/
			
			#viewContainer #lowerContainer {
				width: 700px;
				height: 300px;
				border: 1px solid #dcdcdc;
				margin-left: auto;
				margin-right: auto;
				margin-top: 20px;
				border-radius: 5px/5px;
				overflow: hidden;
				overflow-y: auto;
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
			
			/*----------------------------------------COMPANY DETAIL BODY------------------------------------------*/
			#companyDetailBody {
				width: 99%;
				height: 110%;
				border: 1px solid #404340;
				border-radius: 15px;
			}
			#messaging {
				font-family: helvetica;
				color: black;
				font-weight: bold;
				text-decoration: none;
			}
			#messaging span {
				position: relative;
				top: -10px;
			}
			#blockLink {
				position: relative;
				text-decoration: none;
			}
			#blockLink img {
				zoom: 0.25;
				position: relative;
				top: -20px;
			}
			#blockLink span {
				position: relative;
				top: -10px;
				left: 5px;
				color: black;
				font-weight: bold;
				font-family: helvetica;
			}
		</style>
	</head>
	<body>
		<a href="detail.php?page=companydetail&company_id=<?php echo $company_id ?>&company_page=message" id="messaging"><img src="../images/mail.png"/> <span>Message</span></a>&nbsp;&nbsp;&nbsp;
		<a href="<?php echo (($block->check($company_id)) ? "processes/process.account.unblock.employer.php?id=".$company_id."" : "processes/process.account.block.employer.php?id=".$company_id.""); ?>" id="blockLink"><img src="../images/block.png"/><span><?php echo (($block->check($company_id)) ? 'Unblock' : 'Block'); ?></span></a>
		<div id="companyDetailBody">
			<div id="informationHeader"><span>Job Details</span></div>
			<div id="companyDetails">
				<div id="pic">
					<img src="../images/ellipse.png" id="ellipse"/><div id="logo"><img src="<?php echo $company->get_pic($company_id); ?>"/></div><br/>
					<a href="">www.youtube.com</a>
				</div>
				<span id="companyName"><?php echo $company->get_name($company_id); ?></span>
				<span id="companyDescription"><?php echo $company->get_description($company_id); ?></span>
				<span id="companyAddress"><?php echo $company->get_address($company_id); ?>
			</div>
			<div id="navigation">
				<a href="detail.php?page=companydetail&company_id=<?php echo $company_id ?>&company_page=info"><div class="left"><span>Company Info</span></div></a>
				<a href="detail.php?page=companydetail&company_id=<?php echo $company_id ?>&company_page=job"><div class="right"><span>Job Offers</span></div></a>
				<a href="detail.php?page=companydetail&company_id=<?php echo $company_id ?>&company_page=hired"><div class="right"><span>Hired Applicants</span></div></a>
			</div>
			<div id="lowerContainer">
				<?php
					switch($company_page) {
						case 'info':
							require_once 'companyinfo.php';
							break;
						case 'job':
							require_once 'companyjob.php';
							break;
						case 'message':
							require_once 'companymessage.php';
							break;
						case 'hired':
							require_once 'hiredapplicant.php';
							break;
						default:
							require_once 'companyinfo.php';
							break;
					}
				?>
			</div>
		</div>
	</body>
</html>

<?php
	
	function details() {
	
	}
	
?>
 