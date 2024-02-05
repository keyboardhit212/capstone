<?php
ob_start();
$job_id = ($_GET['job_id']) ? $_GET['job_id'] : '';

session_start();

include '../../library/config.php';
include '../../library/class.job.cart.php';

$jobcart = new JobCart();

$jobcart->delete_saved_job($job_id,$_SESSION['user_id']);
header("location:../index.php?page=cart");