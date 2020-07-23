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
switch($proses){
    case 'loaddata':

        $total = DB::queryFirstField("SELECT COUNT(*) FROM menu");
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
                        <th>ID Menu.</th>
                        <th>Nama Menu</th>
                        <th>Icon</th>
                        <th>Source</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="data-menu">
                    <?php
                    $no =1;
                    $menu = DB::query("SELECT * FROM menu LIMIT ". (($pagination->get_page() - 1) * $records_per_page) . ", " . $records_per_page ."");
                    foreach($menu as $s){
                    ?>
                    <tr>
                        <td><?= $s['id_menu'] ?></td>
                        <td><?= $s['nama_menu'] ?></td>
                        <td><i class="<?= $s['icon'] ?>"></i></td>
                        <td><?= $s['source'] ?></td>
                        <td>
                            <button onclick="edit('<?= $s['id_user'] ?>')" title="Sunting" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></button>
                            <button onclick="hapus('<?= $s['id_user'] ?>')" title="Hapus" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
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
}