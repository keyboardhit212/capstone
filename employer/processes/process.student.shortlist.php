<?php
ob_start();
include '../../library/config.php';
include '../../library/class.employer.cart.php';

$emp_id = (isset($_GET['emp_id'])) ? $_GET['emp_id'] : '';
$stud_id = (isset($_GET['stud_id'])) ? $_GET['stud_id'] : '';
$job_id = (isset($_GET['job_id'])) ? $_GET['job_id'] : '';

$cart = new EmployerCart();

$cart->add_student($stud_id, $emp_id);

header("location:../detail.php?page=current&id=$stud_id&job_id=$job_id");