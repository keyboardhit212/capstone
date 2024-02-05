<?php

include '../library/config.php';
include '../library/class.user.php';
include '../library/class.resume.php';

$id = (isset($_GET['id'])) ? $_GET['id'] : '';

$resume = new Resume();

$array = array('objective'=>$resume->get_objective($id),'interest'=>$resume->get_interest($id),'achievement'=>$resume->get_achievement($id),'experience'=>$resume->get_experience($id));

header("Content-type: application/json");

echo json_encode($array);