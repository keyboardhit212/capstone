<?php

include '../library/config.php';
include '../library/class.bulletin.php';

$bulletin = new Bulletin();

echo "{\"result\":".json_encode($bulletin->get_student_announcement())."}";