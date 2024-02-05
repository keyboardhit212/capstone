<?php

include '../library/config.php';
include '../library/class.applicant.php';
include '../library/class.notification.php';
include '../library/class.job.php';
include '../library/class.user.php';
include '../library/class.profession.php';

$id = (isset($_GET['id'])) ? $_GET['id'] : '';
$job_id = (isset($_GET['job_id'])) ? $_GET['job_id'] : '';

$applicant = new Applicant();
$notification = new Notification();
$job = new Job();
$user = new User();
$profession = new Profession();

$applicant->apply($job_id, $id);
$notification->notify($job->get_employer_id($job_id),$id,$user->get_full_name($id)." has applied for ".$profession->get_profession_name($job->get_profession_id($job_id)));