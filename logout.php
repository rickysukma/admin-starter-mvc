<?php
session_start();
$_SESSION['userdata']['logged'] = false;
unset($_SESSION['userdata']);
session_unset();
session_destroy();
header('location:login.php');