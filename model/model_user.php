<?php
require 'lib/ssp.class.php';
class model_user
{
    function ajaxData(){

    }

    function getuser(){
        $query = DB::query("SELECT user.*, role_users.rolename FROM user LEFT JOIN role_users ON role_users.id_role = user.id_role");
        return $query;
    }
}
