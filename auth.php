<?php
session_start();
require 'config/connection.php';
require 'core/app.php';
if(@$_POST){
    $data['username'] = $_POST['username'];
    $data['password'] = md5($_POST['password']);
    $userdata  = App::login($data);
    if($userdata){
        $_SESSION['userdata'] = $userdata;
        $_SESSION['userdata']['logged'] = true;
        header('location:index.php');
    }else{
        $_SESSION['error'] = "Username atau Password tidak benar!";
    }
}else{
    if(!empty($_SESSION['userdata']['logged'])){
        header('location:index.php');
    }
}