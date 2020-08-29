<?php
session_start();

$idrole = $_SESSION['userdata']['id_role'];
$source = checkPostGet("source",'');

$akses = DB::queryFirstField("SELECT COUNT(*) as isThere FROM access_menu a JOIN menu b ON b.id_menu = a.id_menu WHERE b.source = '$source' AND a.id_role = %i",$idrole);

if(empty($_SESSION['userdata'])){
    http_response_code(501);
    exit("YOU NEED LOGIN TO ACCESS THIS PAGE!");
}