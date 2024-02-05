<?php

include '../library/config.php';
include '../library/class.job.cart.php';
include '../library/class.profession.php';
include '../library/class.company.php';
include '../library/class.job.php';

$profession = new Profession();
$company = new Company();
$jobcart = new JobCart();
$job = new Job();

$id = (isset($_GET['id'])) ? $_GET['id'] : '';

$array = array();

foreach($jobcart->get_saved_job($id) as $jobs) {
	$array[] = array('id'=>$jobs['job_id'],'name'=>$profession->get_profession_name($job->get_profession_id($jobs['job_id'])),
	'subtext'=>$company->get_name($job->get_employer_id($jobs['job_id'])),'description'=>$jobs['job_date_added']." | ".$jobs['job_time_added']);
}

header("Content-type: application/json");

echo "{\"result\":".json_encode($array)."}";

