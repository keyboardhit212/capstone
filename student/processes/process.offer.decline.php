<?php
ob_start();
session_start();

include '../../library/config.php';
include '../../library/class.applicant.php';
include '../../library/class.notification.php';
include '../../library/class.user.php';
include '../../library/class.job.php';

$job_id = (isset($_GET['job_id'])) ? $_GET['job_id'] : '';

$applicant = new Applicant();
$notification = new Notification();
$user = new User();
$job = new Job();

$notification->notify($job->get_employer_id($job_id),$_SESSION['user_id'],$user->get_full_name($_SESSION['user_id']).' has declined the job offer. If you want some further details, kindly send her a message. Thank You');
$applicant->delete_applicant($job_id,$_SESSION['user_id']);
header("location:../index.php?page=appliedjob");

