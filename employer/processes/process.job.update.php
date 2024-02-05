<?php
ob_start();
include '../../library/config.php';
include '../../library/class.job.php';

$job = new Job();

$job_id = (isset($_GET['job_id'])) ? $_GET['job_id'] : '';

$industry = (isset($_POST['industry'])) ? $_POST['industry'] : '';
$profession = (isset($_POST['profession'])) ? $_POST['profession'] : '';
$skills = (isset($_POST['skills'])) ? $_POST['skills'] : '';
$description = (isset($_POST['description'])) ? $_POST['description'] : '';
$salary = (isset($_POST['salary'])) ? $_POST['salary'] : '';
$requirement = (isset($_POST['requirement'])) ? $_POST['requirement'] : '0';

$job->update_industry($job_id, $industry);
$job->update_profession($job_id, $profession);
$job->update_skill($job_id, $skills);
$job->update_description($job_id, $description);
$job->update_salary($job_id, $salary);
$job->update_requirement($job_id, $requirement);

header("location:../index.php?page=jobdetail&job_id=$job_id");