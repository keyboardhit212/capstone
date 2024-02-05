<?php

include '../library/config.php';
include '../library/class.applicant.php';
include '../library/class.profession.php';
include '../library/class.job.php';
include '../library/class.user.php';

$applicant = new Applicant();
$profession = new Profession();
$job = new Job();
$user = new User();

$id = (isset($_GET['id'])) ? $_GET['id'] : '';

$array = array();

foreach($applicant->get_applicant($id) as $applicants) {
	$array[] = array('id'=>$applicants['student_id'],'name'=>$profession->get_profession_name($job->get_profession_id($applicants['job_id'])),'applicant'=>$user->get_full_name($applicants['student_id']),
	'description'=>$user->get_full_name($applicants['student_id']).' has applied for this job!, Press to view resume','job_id'=>$applicants['job_id']);
}

header("Content-type: application/json");

echo "{\"inquirer\":".json_encode($array)."}";
