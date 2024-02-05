<?php
ob_start();
session_start();

include '../../library/config.php';
include '../../library/class.user.php';

$user = new User();

$user->update_pic('genericpic.png',$_SESSION['user_id']);

header("location:../index.php?page=about");