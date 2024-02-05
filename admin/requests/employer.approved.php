<?php

include '../../library/config.php';
include '../../library/class.user.php';

$user = new User();

echo "<br/>";
foreach($user->get_approved_employer() as $approved) {
	echo "<div><a href='".'detail.php?page=companydetail&company_id='.$approved['employer_id'].''."'>".$user->get_full_name($approved['employer_id'])."</a><span></span></div><br/>";
}