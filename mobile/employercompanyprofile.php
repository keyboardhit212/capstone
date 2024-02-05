<?php

include '../library/config.php';
include '../library/class.company.php';

$id = (isset($_GET['id'])) ? $_GET['id'] : '';

$company = new Company();

$array = array('pic'=>$company->get_pic($id), 'name'=>$company->get_name($id), 'address'=>$company->get_address($id), 'email'=>$company->get_email($id),
'phone'=>$company->get_phone($id), 'url'=>$company->get_url($id), 'description'=>$company->get_description($id), 'link'=>$company->get_link($id));

header("Content-type: application/json");

echo json_encode($array);