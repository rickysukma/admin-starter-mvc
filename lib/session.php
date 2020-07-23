<?php
session_start();
if($_SESSION['masuk'] != 'logged'){
    header('location:'.url().'login.html');
}else{
    header('location:'.url());
    json_encode(['redirect'=>true]);
}

function url(){
    return sprintf(
      "%s://%s:%s%s",
      isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
      $_SERVER['SERVER_NAME'],$_SERVER['SERVER_PORT'],'admin-starter-mvc'
    );
  }