<?php

include '../library/config.php';
include '../library/class.course.php';
include '../library/class.industry.php';

$industry = new Industry();
$course = new Course();

$id = (isset($_GET['id'])) ? $_GET['id']  : '';

$array = array();

foreach($course->get_all_course($id) as $courses) {
	$array[] = array('id'=>$courses['course_id'],'name'=>$courses['course_name']);
}

echo "{\"course\":".json_encode($array)."}";