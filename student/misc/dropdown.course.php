<?php

$id = (isset($_POST['id'])) ? $_POST['id'] : '';

include '../../library/config.php';
include '../../library/class.course.php';
include '../../library/class.student.php';

$course = new Course();
$student = new Student();

foreach($course->get_all_course($id) as $courses) {
	echo "<option value='".$courses['course_id']."' ".(($student->get_course($_SESSION['user_id']) == $courses['course_id']) ? 'selected' : '')." >".$courses['course_name']."</option>";
}
	
?>