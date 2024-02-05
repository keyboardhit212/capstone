<?php

session_start();

$id = (isset($_POST['id'])) ? $_POST['id'] : '';

include '../../library/config.php';
include '../../library/class.course.php';
include '../../library/class.student.php';
include '../../library/class.specialization.php';
include '../../library/class.profession.php';

$course = new Course();
$student = new Student();
$major = new Specialization();
$profession = new Profession();

foreach($profession->get_all_profession($id) as $professions) {
	echo "<option value='".$professions['profession_id']."' ".(($student->get_profession($_SESSION['user_id']) == $professions['profession_id']) ? 'selected' : '')." >".$professions['profession_name']."</option>";
}