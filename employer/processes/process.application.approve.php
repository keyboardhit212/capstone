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

$notification->notify_priority($stud_id,$_SESSION['user_id'],'Congratulations!, your application on '.$profession->get_profession_name($job->get_profession_id($job_id)).' has been approved by the '.$company->get_name($_SESSION['user_id']).'. We will send you immediately a message regarding the details of the process. Please feel free to ask us for clarification purposes regarding the details of this job.');
$applicant->update_applicant_status($stud_id,$job_id);
header("location:../index.php?page=applicant");