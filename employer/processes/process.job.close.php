<?php
ob_start();
include '../../library/config.php';
include '../../library/class.job.php';

$job = new Job();

$job_id = (isset($_GET['job_id'])) ? $_GET['job_id'] : '';

$job->close($job_id);

header("location:../index.php?page=jobdetail&job_id=$job_id");