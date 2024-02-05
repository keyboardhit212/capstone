<?php

include '../library/config.php';
include '../library/class.job.php';

$job = new Job();

$id = (isset($_GET['id'])) ? $_GET['id'] : '';
$industry = (isset($_POST['industry'])) ? $_POST['industry'] : '';
$profession = (isset($_POST['profession'])) ? $_POST['profession'] : '';
$skill = (isset($_POST['skill'])) ? $_POST['skill'] : '';
$description = (isset($_POST['description'])) ? $_POST['description'] : '';
$salary = (isset($_POST['salary'])) ? $_POST['salary'] : '';

$job->insert_job($id,$industry,$profession,$salary,$description,$skill,1);