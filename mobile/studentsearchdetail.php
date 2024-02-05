<?php

include '../library/config.php';
include '../library/class.job.php';
include '../library/class.user.php';
include '../library/class.company.php';
include '../library/class.profession.php';
include '../library/class.industry.php';
include '../library/class.job.cart.php';
include '../library/class.applicant.php';

$job_id = (isset($_GET['job_id'])) ? $_GET['job_id'] : '';
$id = (isset($_GET['id'])) ? $_GET['id'] : '';

$user = new User();
$company = new Company();
$job = new Job();
$profession = new Profession();
$industry = new Industry();
$jobCart = new JobCart();
$applicant = new Applicant();

$array = array('pic'=>$company->get_pic($job->get_employer_id($job_id)),'company'=>$company->get_name($job->get_employer_id($job_id)),'profession'=>$profession->get_profession_name($job->get_profession_id($job_id)),
'industry'=>$industry->get_industry_name($job->get_industry_id($job_id)),'description'=>$job->get_description($job_id),'skill'=>$job->get_skill($job_id),'salary'=>$job->get_salary($job_id),'application'=>$applicant->is_applicant($job_id,$id),'cart'=>$jobCart->is_saved($job_id, $id),
'company_applicant'=>$applicant->is_company_applicant($job->get_employer_id($job_id),$id));
echo json_encode($array);
