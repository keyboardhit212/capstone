<?php

include '../../library/config.php';
include '../../library/class.user.php';

$user = new User();

?>
<!DOCTYPE html>
</html>
	<head>
		<style>
			#requestList #listRow {
				height: 30px;
				width: 100%;
				border-bottom: 1px solid gray;
			}	
			#requestList #listRow span {
				font-family: helvetica;
				font-size: 18px;
				position: relative;
				top: 5px;
				left: 10px;
				
			}
			#requestList #listRow a {
				text-decoration: none;
			}
			#requestList #listRow a:hover {
				font-family: helvetica;
				font-size: 18px;
				color: green;
				transition-duration: 0.5s;
			}
			#requestList #listRow #approveLink {
				float: right;
				position: relative;
				top: -15px;
				left: -10px;
			}
			#requestList #listRow #achieverLabel {
				position: relative;
				left: -50px;
				top: -1px;
			}	
		</style>
	</head>
	<body>
		<?php
			foreach($user->get_student_pending() as $pendings) {
				echo "<div id='listRow'><a href='detail.php?page=about&id=".$pendings['user_id']."'><span>".$user->get_full_name($pendings['user_id'])."</span></a></span><br/>
				<form action='processes/process.student.request.approve.php?' method='GET' id='approveLink'><span id='achieverLabel'>Achiever 
				<input type='checkbox' name='achiever'/><input type='hidden' name='id' value='".$pendings['user_id']."'/></span>".
				((($user->get_full_name($pendings['user_id'])) != "  " ) ? "<input type='image' src='../images/approverequest.png' alt='Submit Form'/>" : '')."
				</form></div>";
				
				//<input type='image' src='../images/approverequest.png' alt='Submit Form'/>
			}
		?>
	</body>
</html>
