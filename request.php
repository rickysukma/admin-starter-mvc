<?php
require 'config/connection.php';
require 'core/app.php';
if(isset($_GET['page']) &&  isset($_GET['action']) && $_GET['page'] != '' && $_GET['action'] != ''){
    $page = $_GET['page'];
    $method = $_GET['action'];
    require "core/$page.php";
    ucfirst($page)::$method();

}