<?php

include '../library/config.php';
include '../library/class.resume.php';

$resume = new Resume();

header("Content-type: application/json");

$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$objective = (isset($_POST['objective'])) ? $_POST['objective'] : '';
$interest = (isset($_POST['interest'])) ? $_POST['interest'] : '';
$achievement = (isset($_POST['achievement'])) ? $_POST['achievement'] : '';
$experience = (isset($_POST['experience'])) ? $_POST['experience'] : '';

$resume->update_objective($objective, $id);
$resume->update_interest($interest, $id);
$resume->update_achievement($achievement, $id);
$resume->update_experience($experience, $id);

$array = array('objective'=>$objective,'interest'=>$interest,'achievement'=>$achievement,'experience'=>$experience);

echo json_encode($array);