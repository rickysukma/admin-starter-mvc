<?php
// require 'config/connection.php';
class model_app
{
    function getUser($id=null){
        if($id != null){
            $query = DB::queryFirstRow("SELECT user.id_user,user.display_name,user.createdtime,user.username,rolename,user.id_role FROM user JOIN role_users ON role_users.id_role = user.id_role WHERE id_user = $id");
        }else{
            $query = DB::query("SELECT user.id_user,user.display_name,user.createdtime,user.username,rolename,user.id_role FROM user JOIN role_users ON role_users.id_role = user.id_role");
        }
        return $query;
    }

    function getAccesMenu($idrole){
        $array = DB::queryFirstColumn("SELECT id_menu FROM access_menu WHERE id_role = $idrole "); //get all id menu of user role with param @idrole
        $query = DB::query("SELECT * FROM menu WHERE id_menu IN %li",$array);
        return $query;

    }

    function getUserLogin($data){
        extract($data);
        $query = DB::queryFirstRow("SELECT * FROM user WHERE username = %s AND password = %s",$username,$password);
        return $query;
    }

    function getRoles($id=null){
        if($id != null){
            $query = DB::queryFirstRow("SELECT * FROM role_users WHERE id_role = $id");
        }else{
            $query = DB::query("SELECT * FROM role_users");
        }
        return $query;
    }
}
