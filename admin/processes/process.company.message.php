<?php
ob_start();
session_start();

include '../../library/config.php';
include '../../library/class.message.php';

$to = (isset($_POST['to'])) ? $_POST['to'] : '';
$from = (isset($_POST['from'])) ? $_POST['from'] : '';
$message = (isset($_POST['message'])) ? $_POST['message'] : '';

$mail = new Message();

$mail->send_message($to,$from,$message);
