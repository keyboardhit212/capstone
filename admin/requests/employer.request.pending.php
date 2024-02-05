<?php

include '../../library/config.php';
include '../../library/class.user.php';
include '../../library/class.company.php';

$user = new User();
$company = new Company();

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
			#requestList #listRow a {
				text-decoration: none;
			}	
			#requestList #listRow span {
				font-family: helvetica;
				font-size: 18px;
				position: relative;
				top: 5px;
				left: 10px;
			}
			#requestList #listRow #approveLink {
				float: right;
				position: relative;
				top: -15px;
				left: -10px;
			}
		</style>
	</head>
	<body>
		<?php
			foreach($user->get_employer_pending() as $pendings) {
				echo "<div id='listRow'><a href='detail.php?page=companydetail&company_id=".$pendings['user_id']."'><span>".$company->get_name($pendings['user_id'])."</span></a><br/>".(($company->get_name($pendings['user_id']) != "") ? "<a href='processes/process.employer.request.approve.php?id=".$pendings['user_id']."' id='approveLink'><img src='../images/approverequest.png'/>" : '')."</a></div>";
			}
		?>
	</body>
</html>
