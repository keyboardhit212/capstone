<?php
ob_start();
$id = (isset($_GET['id'])) ? $_GET['id'] : '';


session_start();

include '../../library/config.php';
include '../../library/class.block.php';

$block = new Block;

$block->unblock($id);

header("location:../detail.php?page=companydetail&company_id=$id");