<?php  
class User extends App {
    function index(){
        require 'view/user/index.php';
    }

    function form(){
        $users = model_app::getUser();
        require 'view/user/form.php';
    }

    function data_user(){
        $users = model_app::getUser();
        require 'view/user/data-user.php';
    }

    function formedit(){
        $id = $_POST['id'];
        $data = DB::queryFirstRow("SELECT * FROM user WHERE id_user = %s",$id);
        require 'view/user/form-edit.php';
    }

    function table(){
        $users = model_app::getUser();
        require 'view/user/table.php';
    }

    function update(){
        $data = $_POST;
        if($data['password'] == ''){
            unset($data['password']);
            unset($data['repassword']);
        }else{
            if($data['password'] != $data['repassword']){
                exit("Warning : Password dan konfirmasi password yang diinputkan tidak sama!");
            };
            unset($data['repassword']);
            $data['password'] = md5($data['password']);
        }
        DB::update('user',$data,'id_user=%i',$data['id_user']);
    }

    function simpan_user(){

        $data['username'] = $_POST['username'];
        $data['display_name'] = $_POST['display_name'];
        $data['password'] = md5($_POST['password']);
        $data['id_role'] = $_POST['id_role'];
        // print_r($_POST);die;
        $insert = DB::insert('user',$data);
        // redirect ke index.php, page=user 
        $respon = array('status' => 'berhasil');
        echo json_encode($respon);
        
    }

    function delete(){
        DB::delete('user','id_user=%i',$_POST['id']);
    }
}