<?php

include '../library/config.php';
include '../library/class.user.php';
include '../library/class.employer.php';
include '../library/class.company.php';
include '../library/class.job.php';

header("Content-type: application/json");

$user = new User();
$employer = new Employer();
$company = new Company();
$job = new Job();

$id = (isset($_GET['id'])) ? $job->get_employer_id($_GET['id']) : '';

$array = array('pic'=>$user->get_pic($id),'firstname'=>$user->get_fname($id),'middlename'=>$user->get_mname($id),'lastname'=>$user->get_lname($id),
'birthdate'=>$user->get_birthdate($id),'gender'=>$user->get_gender($id),'email'=>$employer->get_email($id),'phone'=>$employer->get_phone($id),'skype'=>$employer->get_skype($id),
'company_name'=>$company->get_name($id),'company_description'=>$company->get_description($id),'company_address'=>$company->get_address($id),
'company_phone'=>$company->get_phone($id),'company_url'=>$company->get_url($id),'company_email'=>$company->get_email($id));

echo json_encode($array);