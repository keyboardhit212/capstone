<?php

include '../library/config.php';
include '../library/class.specialization.php';

$major = new Specialization();

$id = (isset($_GET['id'])) ? $_GET['id'] : '';

$array = array();

foreach($major->get_all_specialization($id) as $majors) {
	$array[] = array('id'=>$majors['specialization_id'],'name'=>$majors['specialization_name']);
}


echo "{\"major\":".json_encode($array)."}";