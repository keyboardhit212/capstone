<?php

session_start();

$id = (isset($_POST['id'])) ? $_POST['id'] : '';

include '../../library/config.php';
include '../../library/class.course.php';
include '../../library/class.student.php';
include '../../library/class.specialization.php';

$course = new Course();
$student = new Student();
$major = new Specialization();

foreach($major->get_all_specialization($id) as $majors) {
	echo "<option value='".$majors['specialization_id']."' ".(($student->get_specialization($_SESSION['user_id']) == $majors['specialization_id']) ? 'selected' : '')." >".$majors['specialization_name']."</option>";
}