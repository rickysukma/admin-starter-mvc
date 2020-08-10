<ul id="tree1">
    <li><a href="#">TECH</a>
        <ul>
            <li>Company Maintenance</li>
            <li>Employees
                <ul>
                    <li>Reports
                        <ul>
                            <li>Report1</li>
                            <li>Report2</li>
                            <li>Report3</li>
                        </ul>
                    </li>
                    <li>Employee Maint.</li>
                </ul>
            </li>
            <li>Human Resources</li>
        </ul>
    </li>
    <li><a href="#">Ampas</a>
        <ul>
            <li>Company Maintenance</li>
            <li>Employees
                <ul>
                    <li>Reports
                        <ul>
                            <li>Report1</li>
                            <li>Report2</li>
                            <li>Report3</li>
                        </ul>
                    </li>
                    <li>Employee Maint.</li>
                </ul>
            </li>
            <li>Human Resources</li>
        </ul>
    </li>
</ul>

<?php
require 'config/connection.php';
require 'lib/nangkoelib.php';
// $pagination->reverse(true);
// $page = checkPostGet('page','');
$proses = checkPostGet('proses','');
$type = checkPostGet('type','');
$id = checkPostGet('id','');
$keyword = checkPostGet('cari','');

switch($proses){
    case 'loadrole':
        
    break;
    case 'loaddata':
    break;
    case 'form':
    if($type == 'new'){

    }else{
        $data = DB::queryFirstRow("SELECT * FROM role_users WHERE id_role = %i",$id);
    }
    require 'lib/icons.php';
    require 'role_user_form.php';
    break;

    case 'save':
        DB::insert('role_users',$_POST);
    break;
    case 'update':
        DB::update('role_users',$_POST,'id_role=%i',$id);
    break;

}