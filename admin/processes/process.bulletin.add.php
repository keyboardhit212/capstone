<?php
//ob_start();
session_start();

include '../../library/config.php';
include '../../library/class.bulletin.php';

$what = (isset($_POST['what'])) ? $_POST['what'] : '';
$where = (isset($_POST['where'])) ? $_POST['where'] : '';
$when = (isset($_POST['when'])) ? $_POST['when'] : '';
$description = (isset($_POST['description'])) ? $_POST['description'] : '';
$student = (isset($_POST['student'])) ? $_POST['student'] : '';
$employer = (isset($_POST['employer'])) ? $_POST['employer'] : '';

$bulletin = new Bulletin();

$bulletin->create($student,$employer,$what,$where,$when,$description,$_SESSION['user_id']);

//cho $what." ".$where." ".$when." ".$description;

header("location:../index.php?page=addbulletin&result=success");

