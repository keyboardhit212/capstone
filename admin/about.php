<?php
	$subpage = (isset($_GET['subpage'])) ? $_GET['subpage'] : '';
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
				height: auto;
				margin: 0 auto;
				overflow: hidden;
			}
			
			/*------------------------------------------MISC OPTIONS----------------------------------------*/
			#mailLink {
				position: relative;
				left: 50px;
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
				left: 50px;
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
			#blockLink {
				position: relative;
				left: 50px;
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
			#achieverDiv {
				width: 100px;
				height: 28px;
				background: #2a2a28;
				float: right;
				margin-right: 640px;
				font-family: helvetica;
				border-radius: 10px/10px;
			}
			#achieverDiv span {
				color: #ade309;
				font-weight: bold;
				display: block;
				text-align: center;
				position: relative;
				top: 5px;
			}
		</style>
	</head>
	<body>
		<a href="detail.php?page=about&subpage=message&id=<?php echo $id ?>" id="mailLink"><img src="../images/mail.png"/><span>Message</span></a>&nbsp;&nbsp;&nbsp;
		<a href="<?php echo (($block->check($id)) ? "processes/process.account.unblock.student.php?id=".$id."" : "processes/process.account.block.student.php?id=".$id.""); ?>" id="blockLink"><img src="../images/block.png"/><span><?php echo (($block->check($id)) ? 'Unblock' : 'Block'); ?></span></a>
		<!--<a href="detail.php?page=about&subpage=message&id=<?php echo $id ?>" id="approveLink"><img src="../images/approve.png"/><span>Hire</span></a>!-->
		<?php echo ($student->isAchiever($id) ? "<div id='achieverDiv'><span>Achiever</span></div>" : '' ) ?>
		<div id="infoContainer">
			<div id="picContainer"><div><img src="<?php echo $user->get_pic($id); ?>"/></div></div>
			<span id="name"><?php echo $user->get_full_name($id); ?></span><br/>
			<span id="profession"><?php  echo $profession->get_profession_name($student->get_profession($id)); ?></span><br/>
			<span id="industry"><?php echo $industry->get_industry_name($student->get_industry($id)); ?></span><br/>
			<span id="email"><?php echo $student->get_email($id); ?></span>
		</div><br/>
		<div id="navigation">
			<div class="navRow"><a href="detail.php?page=about&subpage=info&id=<?php echo $id; ?>">About</a></div>
			<div class="navRow"><a href="detail.php?page=about&subpage=credential&id=<?php echo $id; ?>">Credentials</a></div>
			<div class="navRow"><a href="detail.php?page=about&subpage=resume&id=<?php echo $id; ?>">Resume</a></div>
			<div class="navRow"><a href="detail.php?page=about&subpage=introduction&id=<?php echo $id; ?>">Introduction</a></div>
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