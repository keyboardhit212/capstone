<?php

include '../library/config.php';
include '../library/class.user.php';
include '../library/class.applicant.php';
include '../library/class.profession.php';
include '../library/class.job.php';
include '../library/class.company.php';
include '../library/class.notification.php';

$job_id = (isset($_GET['job_id'])) ? $_GET['job_id'] : '';
$stud_id = (isset($_GET['stud_id'])) ? $_GET['stud_id'] : '';
$emp_id = (isset($_GET['emp_id'])) ? $_GET['emp_id'] : '';

$user = new User();
$applicant = new Applicant();
$profession = new Profession();
$job = new Job();
$company = new Company();
$notification = new Notification();

$applicant->update_applicant_status($stud_id,$job_id);
$notification->notify($stud_id,$emp_id,'Congratulations!, your application on '.$profession->get_profession_name($job->get_profession_id($job_id)).' has been approved by the '.$company->get_name($emp_id).'. We will send you immediately a message regarding the details of the process. Please feel free to ask us for clarification purposes regarding the details of this job.');

