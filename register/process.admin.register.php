<?php

include '../library/config.php';
include '../library/class.admin.php';

$admin = new Administrator();

$pic = (isset($_FILES['pic']['name'])) ? $_FILES['pic']['name'] : '';
$fname = (isset($_POST['fname'])) ? $_POST['fname'] : '';
$mname = (isset($_POST['mname'])) ? $_POST['mname'] : '';
$lname = (isset($_POST['lname'])) ? $_POST['lname'] : '';
$username = (isset($_POST['username'])) ? $_POST['username'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';
$confirmpassword = (isset($_POST['confirmpassword'])) ? $_POST['confirmpassword'] : '';
$birthdate = (isset($_POST['birthdate'])) ? $_POST['birthdate'] : '';
$gender = (isset($_POST['gender'])) ? $_POST['gender'] : '';

if($password == $confirmpassword) {
	$admin->insert_initial_admin($fname,$mname,$lname,$username,md5($password),$gender,$pic,$birthdate);
	$admin->register_admin($username,md5($password));
	header("location:../index.php");
} 
else {
	echo "Password Does Not Match";
}
