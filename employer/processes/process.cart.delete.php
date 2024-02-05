<?php
ob_start();
session_start();

include '../../library/config.php';
include '../../library/class.employer.cart.php';

$cart = new EmployerCart();

$stud_id = (isset($_GET['stud_id'])) ? $_GET['stud_id'] : '';

$cart->delete($_SESSION['user_id'], $stud_id);

header("location:../index.php?page=cart");
