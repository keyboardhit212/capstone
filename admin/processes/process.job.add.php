<?php
ob_start();
include '../../library/config.php';
include '../../library/class.job.php';

$job = new Job;

//industry
//profession
//skills
//description
//salary

$industry = (isset($_POST['industry'])) ? $_POST['industry'] : '';
$profession = (isset($_POST['profession'])) ? $_POST['profession']  : '';
$skills = (isset($_POST['skills'])) ? $_POST['skills'] : '';
$description = (isset($_POST['description'])) ? $_POST['description'] : '';
$salary = (isset($_POST['salary'])) ? $_POST['salary'] : '';


echo "Hello";
//echo $industry." ".$profession." ".$skills." ".$description." ".$salary;