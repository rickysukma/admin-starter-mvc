<?php
require 'config/connection.php';
require 'lib/nangkoelib.php';
require 'config/master_validation.php';
// $pagination->reverse(true);
// $page = checkPostGet('page','');
$proses = checkPostGet('proses','');
$type = checkPostGet('type','');
$id = checkPostGet('id','');
$keyword = checkPostGet('cari','');
$field = checkPostGet('field','');
$value = checkPostGet('value','');
$created = $updateby = $_SESSION['userdata']['id_user'];
switch($proses){
    case 'loaddata':
        $master = DB::query("SELECT *,(SELECT COUNT(*) as has_child FROM program WHERE induk = program.id_program ORDER BY id_program_display) FROM program LEFT JOIN user ON user.id_user = program.updateby");
        foreach($master as $m){
            ?>
            <tr>
                <td><?= $m['id_program'] ?></td>
                <td style="cursor:pointer" ondblclick="input(this,'ket_program','<?= $m['id_program'] ?>')"><?= $m['ket_program'] ?></td>
                <td><?= $m['tgl_perencanaan'] ?></td>
                <td ondblclick="input(this,'rp_budget','<?= $m['id_program'] ?>')"><?= $m['rp_budget'] ?></td>
                <td><?= $m['display_name'] ?></td>
                <td><i onclick="newsubheader('<?=$m['id_program']?>',this)" class="fa fa-plus btn-link"></i>   <i class="fa fa-trash btn-danger btn-link " onclick="delete('<?=$m['id_program']?>')"></i></td>
            </tr>
            <?php
        }
    break;
    case 'form':

    break;
    case 'save':
        $data = $_POST;
        if($data['induk'] == 'null') $data['induk'] = "";
        $data['createtime'] = date('Y-m-d H:i:s');
        $data['id_program_display'] = $data['id_program'];
        $data['updatetime'] = date('Y-m-d H:i:s');
        $data['createdby'] = $created;
        $data['updateby'] = $updateby;
        DB::insert('program',$data);
        $master = DB::query("SELECT program.*,display_name,(SELECT COUNT(*) as has_child FROM program WHERE induk = program.id_program ORDER BY id_program_display) as has_child FROM program LEFT JOIN user ON user.id_user = program.updateby WHERE id_program = %s ORDER BY program.id_program_display",$data['id_program']);
        echo json_encode($master);
    break;
    case 'update':
        $data[$field] = $value;
        DB::update('program',$data,'id_program=%i',$id);
    break;
    case 'getlastid':
        $indux = checkPostGet('induk','');
        $indux = DB::queryFirstField("SELECT IF(COUNT(*) > 0,max(id_program)+1,CONCAT($indux,'1')) as next FROM program WHERE induk = %i;",$indux);
        echo $indux;
    break;

}