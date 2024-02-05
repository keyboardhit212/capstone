<?php
ob_start();
session_start();

include '../../library/config.php';
include '../../library/class.job.php';

$job = new Job();

$industry = (isset($_POST['industry'])) ? $_POST['industry'] : '';
$profession = (isset($_POST['profession'])) ? $_POST['profession'] : '';
$skills = (isset($_POST['skills'])) ? $_POST['skills'] : '';
$description = (isset($_POST['description'])) ? $_POST['description'] : '';
$salary = (isset($_POST['salary'])) ? $_POST['salary'] : '';
$requirement = (isset($_POST['requirement'])) ? $_POST['requirement'] : '';
$location = (isset($_POST['location'])) ? $_POST['location'] : '';

if($_SESSION['status'] == 1) {
	$job->insert_job($_SESSION['user_id'], $industry, $profession, $salary, $description, $skills, 1, $location);
}

header("location:../index.php?page=createjob&result=successful");