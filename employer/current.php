<?php
	$subpage = (isset($_GET['subpage'])) ? $_GET['subpage'] : '';
	$job_id = (isset($_GET['job_id'])) ? $_GET['job_id'] : '';
?>
<!DOCTYPE html>
<html>
	<head>
		<style>
			#viewContainer #infoContainer {
				width: 90%;
				height: 250px;
				border: 1px solid #cdd2ce;
				border-radius: 10px/10px;
				margin: 0 auto;
				font-family: helvetica;
			}
			#viewContainer #infoContainer #picContainer {
				width: 250px;
				height: 200px;
				border-right: 1px solid black;
				margin-left: 30px;
				margin-top: 25px;
				float: left;
			}
			#viewContainer #infoContainer #picContainer div {
				width: 150px;
				height: 150px;
				border: 1px solid black;
				margin-left: auto;
				margin-right: auto;
				margin-top: 20px;
				border-radius: 75px;
				overflow: hidden;
			}
			#viewContainer #infoContainer #picContainer div img {
				width: 100%;
				height: 100%;
			}
			#viewContainer #infoContainer #name {
				font-size: 30px;
				font-weight: bold;
				display: block;
				position: relative;
				left: 20px;
				top: 30px;
				color: #666666;
			}
			#viewContainer #infoContainer #profession {
				font-size: 23px;
				font-weight: bold;
				display: block;
				position: relative;
				left: 20px;
				top: 20px;
				color: #9fd304;
			}
			#viewContainer #infoContainer #industry {
				font-size: 19px;
				font-weight: bold;
				display: block;
				position: relative;
				left: 20px;
				top: 60px;
				color: #656565;
			}
			#viewContainer #infoContainer #email {
				font-size: 18px;
				display: block;
				position: relative;
				left: 20px;
				top: 50px;
				color: #737373;
			}
			
			/*-------------------------------NAVIGATION------------------------------*/
			
			#viewContainer #navigation {
				width: 90%;
				height: 50px;
				border-top: 1px solid #bababa;
				border-bottom: 1px solid #bababa;
				margin: 0 auto;
				font-family: helvetica;
				color: #666666;
			}
			#viewContainer #navigation .navRow {
				float: left;
				width: 24.7%;
				height: 100%;
				border-right: 1px solid gray;
				border-left: 1px solid gray;
			}
			#viewContainer #navigation .navRow a{
				text-decoration: none;
				color: gray;
				font-size: 18px;
				font-weight: bold;
				display: block;
				text-align: center;
				position: relative;
				top: 10px;
				}
				
			/*------------------------------------------------PAGE CONTAINER-----------------------------*/
			
			#viewContainer #pageContainer {
				width: 90%;
				height: 500px;
				margin: 0 auto;
			}
			
			/*------------------------------------------MISC OPTIONS----------------------------------------*/
			#mailLink {
				position: relative;
				left: 10px;
				text-decoration: none;
				color: black;	
			}
			#mailLink span {
				position: relative;
				top: -10px;
				font-family: helvetica;
				font-weight: bold;
			}
			#approveLink {
				position: relative;
				left: 10px;
				top: -5px;
				text-decoration: none;
				color: black;	
			}
			#approveLink span {
				position: relative;
				top: -5px;
				font-family: helvetica;
				font-weight: bold;
				left: 3px;
			}
			#rejectLink {
				position: relative;
				left: 300px;
				top: -5px;
				text-decoration: none;
				color: black;	
			}
			#rejectLink span {
				position: relative;
				top: -5px;
				font-family: helvetica;
				font-weight: bold;
				left: 3px;
			}
			
			/*------------------------------------------VIDEO CALL AND VOICE CALL-----------------------------------*/
			
			#videoCallLink img {
				zoom: 0.8;
				position: relative;
				top: -20px;
				left: 60px;
			}
			#voiceCallLink img {
				zoom: 0.8;
				position: relative;
				left: 150px;
				top: -10px;
			}
			 #saveLink {
				color: #ade309;
				font-weight: bold;
				display: block;
				text-align: center;
				float: left;
				margin-left: 50px;
			}
			#saveLink input {
				width: 100px;
				height: 30px;
				font-size: 18px;
				border-radius: 10px/10px;
				border: none;
			}
		</style>
	</head>
	<body>
		<a href="detail.php?page=current&subpage=message&id=<?php echo $id ?>&job_id=<?php echo $job_id ?>" id="mailLink"><img src="../images/mail.png"/><span>Message</span></a>&nbsp;&nbsp;&nbsp;
		
		<a href="<?php echo (($job->is_required($job_id) == true) ? (($message->has_message($id,$_SESSION['user_id']) == true) ? 'processes/process.application.approve.php?stud_id='.$id.'&job_id='.$job_id.'' : '') : 'processes/process.application.approve.php?stud_id='.$id.'&job_id='.$job_id.'') ?>" <?php echo (($applicant->is_approved($job_id,$id) == true ) ? 'style=ponter-events:none' : '') ?> id='approveLink'><img src='../images/approve.png'/><span>Approve Application </span></a>
		<a href="processes/process.application.reject.php?stud_id=<?php echo $id ?>&job_id=<?php echo $job_id ?>" id="rejectLink"><img src="../images/reject.png"/><span>Reject Application</span></a>
		<a id="saveLink" href="processes/process.student.shortlist.php?emp_id=<?php echo $_SESSION['user_id'] ?>&stud_id=<?php echo $id; ?>&job_id=<?php echo $job_id; ?>"><input type="submit" value="<?php echo (($cart->is_saved($id, $_SESSION['user_id']) == true) ? 'Saved' : 'Save') ?>"  <?php echo (($cart->is_saved($id, $_SESSION['user_id']) == true) ? 'disabled' : '') ?> /></span></a>
		<div id="infoContainer">
			<div id="picContainer"><div><img src="<?php echo $user->get_pic($id); ?>"/></div><a href="skype:<?php echo $student->get_skype($id); ?>?call&video=true" id="videoCallLink"><img src="../images/video_call.png"/></a><a href="skype:<?php echo $student->get_skype($id); ?>?call" id="voiceCallLink"><img src="../images/voice_call.png"/></a></div>
			<span id="name"><?php echo $user->get_full_name($id); ?></span><br/>
			<span id="profession"><?php  echo $profession->get_profession_name($student->get_profession($id)); ?></span><br/>
			<span id="industry"><?php echo $industry->get_industry_name($student->get_industry($id)); ?></span><br/>
			<span id="email"><?php echo $student->get_email($id); ?></span>
		</div><br/>
		<div id="navigation">
			<div class="navRow"><a href="detail.php?page=current&subpage=info&id=<?php echo $id; ?>&job_id=<?php echo $job_id; ?>">About</a></div>
			<div class="navRow"><a href="detail.php?page=current&subpage=credential&id=<?php echo $id; ?>&job_id=<?php echo $job_id; ?>">Credentials</a></div>
			<div class="navRow"><a href="detail.php?page=current&subpage=resume&id=<?php echo $id; ?>&job_id=<?php echo $job_id; ?>">Resume</a></div>
			<div class="navRow"><a href="detail.php?page=current&subpage=introduction&id=<?php echo $id; ?>&job_id=<?php echo $job_id; ?>">Introduction</a></div>
		</div><br/>
		<div id="pageContainer">
			<?php
				switch($subpage) {
					case 'info':
						require_once 'studentinfo.php';
						break;
					case 'credential':
						require_once 'studentcredential.php';
						break;
					case 'resume':
						require_once 'studentresume.php';
						break;
					case 'introduction':
						require_once 'studentintroduction.php';
						break;
					case 'message':
						require_once 'studentmessage.php';
						break;
					default:
						require_once 'studentinfo.php';
				}
			?>
		</div>
	</body>
</html>