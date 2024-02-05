<?php

include '../library/config.php';
include '../library/class.college.php';

$college = new College();

$array = array();

foreach($college->get_all_college() as $colleges) {
	$array[] = array('id'=>$colleges['college_id'],'name'=>$colleges['college_name']);
}

echo "{\"college\":".json_encode($array)."}";