<?php
ob_start();
include '../../library/config.php';
include '../../library/class.block.php';

$block = new Block;

$id = (isset($_GET['id'])) ? $_GET['id'] : '';

$block->unblock($id);

header("location:../index.php?page=block");