<?php
ob_start();
$id = (isset($_GET['reference'])) ? $_GET['reference'] : '';

session_start();

include '../../library/config.php';
include '../../library/class.reference.php';

$reference = new Reference();

$reference->delete_reference($id);

header("location:../index.php?page=reference");