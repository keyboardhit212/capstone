<?php
ob_start();
session_start();

include '../../library/config.php';
include '../../library/class.student.php';

$student = new Student();

if (!((($_FILES['video']['size'] / 1024) / 1024) > 50)) {
	$student->update_video("../videos/".$_FILES['video']['name'], $_SESSION['user_id']);
	move_uploaded_file($_FILES['video']['tmp_name'],"../../videos/".$_FILES['video']['name']);
	header("location: ../index.php?page=introduction");
}
else {
	header("location: ../index.php?page=introduction&error=true");
}

