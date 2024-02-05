<?php

include '../library/config.php';
include '../library/class.industry.php';

$industry = new Industry();

$array = array();

foreach($industry->get_all_industry() as $industries) {
	$array[] = array('id'=>$industries['industry_id'],'name'=>$industries['industry_name']);
}

echo "{\"industry\":".json_encode($array)."}";