<?php
ob_start();
session_start();

include '../../library/config.php';
include '../../library/class.resume.php';

$resume = new Resume();

$objective = (isset($_POST['objective'])) ? $_POST['objective'] : '';
$interest = (isset($_POST['interest'])) ? $_POST['interest'] : '';
$achievement = (isset($_POST['achievement'])) ? $_POST['achievement'] : '';
$experience = (isset($_POST['experience'])) ? $_POST['experience'] : '';

$resume->update_objective($objective, $_SESSION['user_id']);
$resume->update_interest($interest, $_SESSION['user_id']);
$resume->update_achievement($achievement, $_SESSION['user_id']);
$resume->update_experience($experience, $_SESSION['user_id']);

header("location: ../index.php?page=resume");