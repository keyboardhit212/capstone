<?php

include '../library/config.php';
include '../library/class.job.cart.php';

$jobcart = new JobCart();

$id = (isset($_GET['id'])) ? $_GET['id'] : '';
$job_id = (isset($_GET['job_id'])) ? $_GET['job_id'] : '';

$jobcart->save($job_id,$id);

echo $id." ".$job_id;