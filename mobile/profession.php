<?php

include '../library/config.php';
include '../library/class.industry.php';
include '../library/class.profession.php';

$id = (isset($_GET['id'])) ? $_GET['id'] : '';

$industry = new Industry();
$profession = new Profession();

$array = array();

foreach($profession->get_all_profession($id) as $professions) {
	$array[] = array('id'=>$professions['profession_id'],'name'=>$professions['profession_name']);
}

echo "{\"profession\":".json_encode($array)."}";