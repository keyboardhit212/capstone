<?php

include '../../library/config.php';
include '../../library/class.user.php';

$user = new User();

echo "<br/>";
foreach($user->get_approved_student() as $approved) {
		echo "<div><a href='".'detail.php?page=about&id='.$approved['student_id']."'>".$user->get_full_name($approved['student_id'])."</a><span></span></div><br/>";
}