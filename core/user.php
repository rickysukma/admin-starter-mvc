<?php  
class User extends App {
    function index(){
        $users = model_app::getUser();
        require 'view/user.php';
    }

    function insert(){

        $data['username'] = $_POST['username'];
        $data['display_name'] = $_POST['display_name'];
        $data['password'] = md5($_POST['password']);
        $data['id_role'] = $_POST['id_role'];
        // print_r($_POST);die;
        $insert = DB::insert('user',$data);
        App::redirectto('index.php','user');
        
    }
}