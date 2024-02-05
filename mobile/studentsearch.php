<?php

include '../library/config.php';
include '../library/class.user.php';
include '../library/class.search.php';
include '../library/class.profession.php';
include '../library/class.company.php';
include '../library/class.job.php';

$keyword = (isset($_GET['keyword'])) ? $_GET['keyword'] : '';
$status = (isset($_GET['status'])) ? $_GET['status'] : '';

$job = new Job();
$company = new Company();
$search = new Search();
$profession = new Profession();

header("Content-type: application/json");

$array = array();

foreach($search->student_search($keyword,"",$status,"") as $results) {
	$array[] = array('id'=>$results['job_id'],'name'=>$profession->get_profession_name($job->get_profession_id($results['job_id'])),'subtext'=>$company->get_name($job->get_employer_id($results['job_id'])),'description'=>$job->get_description($results['job_id']));
}

echo "{\"result\":".json_encode($array)."}";
