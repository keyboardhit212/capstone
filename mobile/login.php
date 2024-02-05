<?php
ob_start();
session_start();

include '../library/config.php';
include '../library/class.user.php';
include '../library/class.block.php';
include '../library/class.student.php';
include '../library/class.employer.php';

$user = new User();
$block = new Block();

$username = (isset($_GET['username'])) ? $_GET['username'] : '';
$password = (isset($_GET['password'])) ? $_GET['password'] : '';

$user->login($username,$password);

$id = ($_SESSION['user_id'] == 0) ? '0000000' : $_SESSION['user_id'];
$account = ($_SESSION['account_type'] == 0) ? '0' : $_SESSION['account_type'];
$status = ($_SESSION['status'] == 0) ? '0' : $_SESSION['status'];
$block = ($block->check($_SESSION['user_id']) == false) ? 'false' : 'true'; 

$array = array('id'=>$id,'type'=>$account,'status'=>$status,'block'=>$block);

header("Content-type: application/json");
echo json_encode($array);

