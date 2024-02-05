<?php
ob_start();
session_start();

include '../../library/config.php';
include '../../library/class.job.php';

$job = new Job();

$job_id = (isset($_GET['job_id'])) ? $_GET['job_id'] : '';

$job->delete_job($job_id);

header("location:../index.php?page=job");