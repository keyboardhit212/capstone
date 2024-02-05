<?php

include '../library/config.php';
include '../library/class.search.php';
include '../library/class.profession.php';
include '../library/class.user.php';
include '../library/class.resume.php';
include '../library/class.student.php';
include '../library/class.industry.php';

header("Content-type: application/json");

$keyword = (isset($_GET['keyword'])) ? $_GET['keyword'] : '';
$status = (isset($_GET['status'])) ? $_GET['status'] : '';

$user = new User();
$search = new Search();
$profession = new Profession();
$student = new Student();
$profession = new Profession();
$industry = new Industry();
$resume = new Resume();

$array = array();

foreach($search->employer_search($keyword,"",$status,"") as $results) {
	$array[] = array('id'=>$results['student_id'],'name'=>$user->get_full_name($results['student_id']),'subtext'=>$industry->get_industry_name($student->get_industry($results['student_id'])).' - '.$profession->get_profession_name($student->get_profession($results['student_id'])),'description'=>$resume->get_objective($results['student_id']));
}

echo "{\"result\":".json_encode($array)."}";