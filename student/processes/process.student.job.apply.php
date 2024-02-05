<?php
ob_start();
session_start();

include '../../library/config.php';
include '../../library/class.applicant.php';
include '../../library/class.notification.php';
include '../../library/class.user.php';
include '../../library/class.job.php';
include '../../library/class.profession.php';

$student_id = (isset($_POST['student_id'])) ? $_POST['student_id'] : '';
$job_id  = (isset($_POST['job_id'])) ? $_POST['job_id'] : '';
$company_id = (isset($_POST['company_id'])) ? $_POST['company_id'] : '';

$user = new User();
$notification = new Notification();
$applicant = new Applicant();
$job = new Job();
$profession = new Profession();

$applicant->apply($job_id,$student_id);
$notification->notify_priority($company_id,$student_id,$user->get_full_name($student_id)." has as applied for ".$profession->get_profession_name($job->get_profession_id($job_id)));
