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
    case 'loaddata':
        $master = DB::query("SELECT *,(SELECT COUNT(*) as has_child FROM program WHERE induk = program.id_program ORDER BY id_program_display) FROM program");
        print_r($master);
        foreach($master as $m){
            ?>
            <tr>
                <td><?= $m['id_program'] ?></td>
                <td><?= $m['ket_program'] ?></td>
                <td><?= $m['tgl_perencanaan'] ?></td>
                <td><?= $m['rp_budget'] ?></td>
                <td><?= $m['updateby'] ?></td>
                <td><i class="fa fa-plus"></i> </td>
            </tr>
            <?php
        }
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