<?php

session_start();

include '../../library/config.php';
include '../../library/class.message.php';

$message = new Message();

$message->clear($_SESSION['user_id']);

