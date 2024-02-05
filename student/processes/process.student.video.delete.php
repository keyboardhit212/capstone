<?php
ob_start();
session_start();

include '../../library/config.php';
include '../../library/class.student.php';

$student = new Student();

$student->update_video('',$_SESSION['user_id']);

header("location:../index.php?page=introduction");


