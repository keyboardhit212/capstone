<?php
ob_start();
session_start();

include '../../library/config.php';
include '../../library/class.user.php';
include '../../library/class.student.php';
include '../../library/class.skill.php';
include '../../library/class.link.php';

$student = new Student();
$user = new User();
$links = new Link();
$skills = new Skill();

echo $_SESSION['user_id'];

$fname = (isset($_POST['fname'])) ? $_POST['fname'] : '';
$mname = (isset($_POST['mname'])) ? $_POST['mname'] : '';
$lname = (isset($_POST['lname'])) ? $_POST['lname'] : '';
$birthdate = (isset($_POST['birthdate'])) ? $_POST['birthdate'] : '';
$email = (isset($_POST['email'])) ? $_POST['email'] : '';
$phone = (isset($_POST['phone'])) ? $_POST['phone'] : '';
$college = (isset($_POST['college'])) ? $_POST['college'] : '';
$course = (isset($_POST['course'])) ? $_POST['course'] : '';
$specialization = (isset($_POST['specialization'])) ? $_POST['specialization'] : '';
$industry = (isset($_POST['industry'])) ? $_POST['industry'] : '';
$profession = (isset($_POST['profession'])) ? $_POST['profession'] : '';
$skill = (isset($_POST['skill'])) ? $_POST['skill'] : '';
$skype = (isset($_POST['skype'])) ? $_POST['skype'] : '';
$link = (isset($_POST['link'])) ? $_POST['link'] : '';
$gender = (isset($_POST['gender'])) ? $_POST['gender'] : '';

$user->update_name($fname,$mname,$lname,$_SESSION['user_id']);
$user->update_birthdate($birthdate, $_SESSION['user_id']);
$user->update_age($_SESSION['user_id']);
$user->update_gender($gender, $_SESSION['user_id']);
$student->update_college($college, $_SESSION['user_id']);
$student->update_course($course, $_SESSION['user_id']);
$student->update_specialization($specialization, $_SESSION['user_id']);
$student->update_profession($profession,$_SESSION['user_id']);
$student->update_industry($industry, $_SESSION['user_id']);
$student->update_skype($skype, $_SESSION['user_id']);
$student->update_email($email, $_SESSION['user_id']);
$student->update_phone($phone, $_SESSION['user_id']);
$skills->update_skill($skill, $_SESSION['user_id']);
$links->update_link($link, $_SESSION['user_id']);

header("location: ../index.php?page=about");

