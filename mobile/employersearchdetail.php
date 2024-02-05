<?php

header("Content-type: application/json");

$id = (isset($_GET['id'])) ? $_GET['id'] : '';
$job_id = (isset($_GET['job_id'])) ? $_GET['job_id'] : '';

include '../library/config.php';
include '../library/class.user.php';
include '../library/class.student.php';
include '../library/class.profession.php';
include '../library/class.industry.php';
include '../library/class.resume.php';
include '../library/class.course.php';
include '../library/class.specialization.php';
include '../library/class.skill.php';
include '../library/class.applicant.php';
include '../library/class.job.php';

$user = new User();
$student = new Student();
$profession = new Profession();
$industry = new Industry();
$resume = new Resume();
$course = new Course();
$specialization = new Specialization();
$skill = new Skill();
$applicant = new Applicant();
$job = new Job();


$array = array('pic'=>$user->get_pic($id), 'name'=>$user->get_fname($id)." ".$user->get_mname($id)[0].". ".$user->get_lname($id), 'profession'=>$profession->get_profession_name($student->get_profession($id)),
'industry'=>$industry->get_industry_name($student->get_industry($id)), 'email'=>$student->get_email($id), 'phone'=>$student->get_phone($id), 
'education'=>$course->get_course_name($student->get_course($id)), 'major'=>$specialization->get_specialization_name($student->get_specialization($id)), 
'skill'=>$skill->get_skill($id), 'objective'=>$resume->get_objective($id), 'interest'=>$resume->get_interest($id), 'achievement'=>$resume->get_achievement($id), 
'experience'=>$resume->get_experience($id),'job_applicant'=>$applicant->is_applicant($job_id, $id),'company_applicant'=>$applicant->is_company_applicant($job->get_employer_id($job_id),$id),'status'=>$applicant->is_approved($job_id,$id));

echo json_encode($array);