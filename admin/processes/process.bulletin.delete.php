<?php

ob_start();
session_start();

include '../../library/config.php';
include '../../library/class.bulletin.php';

$date = (isset($_GET['date'])) ? $_GET['date'] : '';
$time = (isset($_GET['time'])) ? $_GET['time'] : '';

$bulletin = new Bulletin();

$bulletin->delete($date,$time,$_SESSION['user_id']);

header("location:../index.php?page=bulletin");

