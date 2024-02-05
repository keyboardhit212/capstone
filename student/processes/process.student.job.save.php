<?php
ob_start();
session_start();

include '../../library/config.php';
include '../../library/class.job.cart.php';

$student_id = (isset($_POST['student_id'])) ? $_POST['student_id'] : '';
$job_id  = (isset($_POST['job_id'])) ? $_POST['job_id'] : '';

$cart = new JobCart();

$cart->save($job_id,$student_id);

