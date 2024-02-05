<?php

include '../library/config.php';
include '../library/class.user.php';
include '../library/class.employer.php';

header("Content-type: application/json");

$username = (isset($_POST['username'])) ? $_POST['username'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';

$employer = new Employer();
$result = false;

if($employer->insert_initial_employer("","","",$username,md5($password))) { 
	$employer->register_employer($username,md5($password),"","");
	$result = true;
}
else {
	$result = false;
}

$array = array('result'=>$result);

echo json_encode($array);