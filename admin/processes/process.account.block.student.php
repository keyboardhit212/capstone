<?php
ob_start();
$id  = (isset($_GET['id'])) ? $_GET['id'] : '';

session_start();

include '../../library/config.php';
include '../../library/class.block.php';

$block = new Block();

$block->block_account($id, $_SESSION['user_id']);

header("location:../detail.php?page=about&id=$id");