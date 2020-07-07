<?php
// @require 'config/connection.php';
@require 'model/model_app.php';
class App
{
    function index(){
        require 'view/dashboard.php';
    }

    function hasAccess($idmenu){
        return 'test';
    }

    function IsCanAccess($iduser){
        $iduser = 1;
        $cek = model_app::getAccesMenu($iduser);
        return $cek;
    }

    function login($data){
        $user = model_app::getUserLogin($data);
        return $user;
    }

    function isLogin(){
        if($_SESSION['userdata']['logged'] == 1){
            return true;
        }else{
            return false;
        }
    }

    function getRoles($id=null){
        return model_app::getRoles($id);
    }

    function post($class,$method){
        return 'request.php?page='.$class.'&action='.$method;
    }

    /*redirect to page
    native : header(location:index.php?page=user);
    */

    function redirectto($index,$page){
        header('location:'.$index.'?page='.$page);
    }

    function notfound(){
        require 'view/404.php';
    }

}
