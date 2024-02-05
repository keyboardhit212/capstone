<?php

include '../library/config.php';
include '../library/class.user.php';
include '../library/class.student.php';
include '../library/class.skill.php';
include '../library/class.link.php';

$user = new User();
$student = new Student();
$skills = new Skill();
$links = new Link();

$id = (isset($_GET['id'])) ? $_GET['id'] : '';
$fname = (isset($_POST['fname'])) ? $_POST['fname'] : '';
$mname = (isset($_POST['mname'])) ? $_POST['mname'] : '';
$lname = (isset($_POST['lname'])) ? $_POST['lname'] : '';
$birthdate = (isset($_POST['birthdate'])) ? $_POST['birthdate'] : '';
$email = (isset($_POST['email'])) ? $_POST['email'] : '';
$phone = (isset($_POST['phone'])) ? $_POST['phone'] : '';
$gender = (isset($_POST['gender'])) ? $_POST['gender'] : '';
$college = (isset($_POST['college'])) ? $_POST['college'] : '';
$course = (isset($_POST['course'])) ? $_POST['course'] : '';
$major = (isset($_POST['major'])) ? $_POST['major'] : '';
$industry = (isset($_POST['industry'])) ? $_POST['industry'] : '';
$profession = (isset($_POST['profession'])) ? $_POST['profession'] : '';
$skill = (isset($_POST['skill'])) ? $_POST['skill'] : '';
$skype = (isset($_POST['skype'])) ? $_POST['skype'] : '';
$link = (isset($_POST['link'])) ? $_POST['link'] : '';


$user->update_name($fname, $mname, $lname, $id);
$user->update_birthdate($birthdate, $id);
$user->update_age($id);
$student->update_email($email, $id);
$student->update_phone($phone, $id);
$user->update_gender($gender, $id);
$student->update_college($college, $id);
$student->update_course($course, $id);
$student->update_specialization($major, $id);
$student->update_industry($industry, $id);
$student->update_profession($profession, $id);
$skills->update_skill($skill, $id);
$student->update_skype($skype, $id);
$links->update_link($link, $id);

/*$array = array('id'=>$id,'fname'=>$fname,'mname'=>$mname,'lname'=>$lname,'birthdate'=>$birthdate,'email'=>$email,'phone'=>$phone,
'gender'=>$gender,'college'=>$college,'course'=>$course,'major'=>$major,'industry'=>$industry,'profession'=>$profession,'skill'=>$skill,
'skype'=>$skype,'link'=>$link);

echo json_encode($array);*/



