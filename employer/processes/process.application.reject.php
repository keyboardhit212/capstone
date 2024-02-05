<?php
ob_start();
$stud_id = (isset($_GET['stud_id'])) ? $_GET['stud_id'] : '';
$job_id = (isset($_GET['job_id'])) ? $_GET['job_id'] : '';

session_start();

include '../../library/config.php';
include '../../library/class.notification.php';
include '../../library/class.applicant.php';
include '../../library/class.company.php';
include '../../library/class.job.php';
include '../../library/class.profession.php';

$notification = new Notification();
$applicant = new Applicant();
$company = new Company();
$job = new Job();
$profession = new Profession();

$notification->notify($stud_id,$_SESSION['user_id'],'Sorry, your application on '.$profession->get_profession_name($job->get_profession_id($job_id)).' has been rejected by the '.$company->get_name($_SESSION['user_id']).'. Please feel free to message us if you have any questions regarding this matter.');
$applicant->delete_applicant($job_id,$stud_id);
header("location:../index.php?page=applicant");