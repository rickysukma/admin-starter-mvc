<?php
require 'config/connection.php';
require 'core/app.php';
if(isset($_GET['page']) &&  isset($_GET['action']) && $_GET['page'] != '' && $_GET['action'] != ''){
    $page = $_GET['page'];
    $method = $_GET['action'];
    if(!file_exists("core/$page.php")){
        echo "ERROR : Not Found";
        http_response_code(404);
    }else{
        require "core/$page.php";
        ucfirst($page)::$method();
    }
    

}