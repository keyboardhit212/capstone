<?php

include '../../library/config.php';
include '../../library/class.user.php';
include '../../library/class.block.php';

$user = new User();
$block = new Block();


?>
<!DOCTYPE html>
</html>
	<head>
		<style>
			#blockList #listRow {
				height: 30px;
				width: 100%;
				border-bottom: 1px solid gray;
			}	
			#blockList #listRow span {
				font-family: helvetica;
				font-size: 18px;
				position: relative;
				top: 5px;
				left: 10px;
			}
			#blockList #listRow #approveLink {
				float: right;
				position: relative;
				top: -15px;
				left: -10px;
			}
		</style>
	</head>
	<body>
		<?php
			foreach($block->get_students() as $blocked) {
				echo "<div id='listRow'><a href=''><span>".$user->get_full_name($blocked['user_id'])."</span></a><br/><a href='processes/process.account.unblock.php?id=".$blocked['user_id']."' id='approveLink'>Unblock</a></div>";
			}
		?>
	</body>
</html>
