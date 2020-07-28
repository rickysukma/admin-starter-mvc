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

    function getUserByName($keyword=null){
        if($keyword != null){
            $query = DB::query("SELECT user.id_user,user.display_name,user.createdtime,user.username,rolename,user.id_role FROM user JOIN role_users ON role_users.id_role = user.id_role WHERE user.username LIKE '%$keyword%'");
        }else{
            $query = DB::query("SELECT user.id_user,user.display_name,user.createdtime,user.username,rolename,user.id_role FROM user JOIN role_users ON role_users.id_role = user.id_role");
        }
        return $query;
    }

    function getAccesMenu($idrole){
        $array = DB::queryFirstColumn("SELECT id_menu FROM access_menu WHERE id_role = $idrole "); //get all id menu of user role with param @idrole
        if(empty($array)) $array = [0];
        $query = DB::query("SELECT a.*,(SELECT COUNT(*) FROM menu WHERE parent = a.id_menu) as has_child FROM menu a WHERE a.id_menu IN %li AND parent IS NULL",$array);
        return $query;

    }

    function treeView($idmenu,$idrole){
        $array = DB::queryFirstColumn("SELECT id_menu FROM access_menu WHERE id_role = $idrole "); //get all id menu of user role with param @idrole
        $submenu = DB::query("SELECT a.*,(SELECT COUNT(*) FROM menu WHERE parent = a.id_menu) as has_child FROM menu a WHERE id_menu IN %li AND a.parent = %i",$array,$idmenu);
        return $submenu;
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
