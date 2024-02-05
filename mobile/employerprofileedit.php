<?php

include '../library/config.php';
include '../library/class.user.php';
include '../library/class.employer.php';

$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$fname = (isset($_POST['fname'])) ? $_POST['fname'] : '';
$mname = (isset($_POST['mname'])) ? $_POST['mname'] : '';
$lname = (isset($_POST['lname'])) ? $_POST['lname'] : '';
$email = (isset($_POST['email'])) ? $_POST['email'] : '';
$phone = (isset($_POST['phone'])) ? $_POST['phone'] : '';
$skype = (isset($_POST['skype'])) ? $_POST['skype'] : '';
$gender = (isset($_POST['gender'])) ? $_POST['gender'] : '';
$birthdate = (isset($_POST['birthdate'])) ? $_POST['birthdate'] : '';

$user = new User();
$employer = new Employer();

$user->update_name($fname,$lname,$mname,$id);
$user->update_birthdate($birthdate,$id);
$employer->update_email($email,$id);
$employer->update_phone($phone,$id);
$employer->update_skype($skype,$id);
$user->update_gender($gender, $id);

$array = array('id'=>$id,'name'=>$fname." ".$mname." ".$lname,'email'=>$email,'phone'=>$phone,'skype'=>$skype,'gender'=>$gender,'birthdate'=>$birthdate);

echo json_encode($array);
