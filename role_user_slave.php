<?php
require 'config/connection.php';
require 'lib/nangkoelib.php';
// require 'session.php';
require 'lib/pagination.php';

// pagination
$pagination = new Zebra_Pagination();
// $pagination->reverse(true);
// $page = checkPostGet('page','');
$proses = checkPostGet('proses','');
$type = checkPostGet('type','');
$id = checkPostGet('id','');
$keyword = checkPostGet('cari','');

switch($proses){
    case 'loaddata':

        $total = DB::queryFirstField("SELECT COUNT(*) FROM role_users WHERE rolename LIKE '%$keyword%'");
        $records_per_page = 10;
        $pagination->records($total);
        $pagination->navigation_position(isset($_GET['navigation_position']) && in_array($_GET['navigation_position'], array('left', 'right')) ? $_GET['navigation_position'] : 'outside');

        if(!isset($_GET['reversed'])) {

            // pass the total number of records to the pagination class
            $pagination->records($total);
    
            // records per page
            $pagination->records_per_page($records_per_page);
    
        }

        ?>
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Role User</th>
                        <th width=10%>Action</th>
                    </tr>
                </thead>
                <tbody id="data-menu">
                    <?php
                    $no =1;
                    $menu = DB::query("SELECT * FROM role_users WHERE rolename LIKE '%$keyword%' LIMIT ". (($pagination->get_page() - 1) * $records_per_page) . ", " . $records_per_page ."");
                    foreach($menu as $s){
                    ?>
                    <tr>
                        <td><span class="btn btn-link"><?= $s['rolename'] ?></span></td>
                        <td>
                            <button onclick="edit('<?= $s['id_role'] ?>')" title="Sunting" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></button>
                            <button onclick="hapus('<?= $s['id_role'] ?>')" title="Hapus" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="text-center">
            <?php $pagination->render() ?>
            </div>
        </div>
        <?php
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