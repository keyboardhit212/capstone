<?php
ob_start();
$date = (isset($_GET['date'])) ? $_GET['date'] : '';
$time = (isset($_GET['time'])) ? $_GET['time'] : '';

session_start();

include '../../library/config.php';
include '../../library/class.credential.php';

$credential = new Credential();

$credential->delete_credential($_SESSION['user_id'], $date, $time);

header("location:../index.php?page=credential");
