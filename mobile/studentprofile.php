<?php

include '../library/config.php';
include '../library/class.user.php';
include '../library/class.student.php';
include '../library/class.profession.php';
include '../library/class.industry.php';
include '../library/class.course.php';
include '../library/class.college.php';
include '../library/class.specialization.php';
include '../library/class.resume.php';
include '../library/class.skill.php';
include '../library/class.link.php';

$user = new User();
$student = new Student();
$profession = new Profession();
$industry = new Industry();
$course = new Course();
$college = new College();
$specialization = new Specialization();
$resume = new Resume();
$skill = new Skill();
$link = new Link();


$id = (isset($_GET['id'])) ? $_GET['id'] : '';

$array = array('pic'=>$user->get_pic($id),'fname'=>$user->get_fname($id),'mname'=>$user->get_mname($id),'lname'=>$user->get_lname($id),
'birthdate'=>$user->get_birthdate($id),'email'=>$student->get_email($id),'phone'=>$student->get_phone($id),'skill'=>$skill->get_skill($id),
'skype'=>$student->get_skype($id),'link'=>$link->get_link($id),'gender'=>$user->get_gender($id),'profession'=>$profession->get_profession_name($student->get_profession($id)),
'industry'=>$industry->get_industry_name($student->get_industry($id)));

echo json_encode($array);
