<?php
require 'config/connection.php';
require 'lib/nangkoelib.php';
// require 'session.php';
require 'lib/pagination.php';

$proses = checkPostGet('proses','');
$page = checkPostGet('page',1);
$nama_test = checkPostGet('nama_test','');

switch ($proses) {
    case 'loaddata':
        $master = DB::query('SELECT * FROM test');
        if($master)
        foreach($master as $m){
            echo $m['nama_test'];
            echo "<br>";

        }
        break;
    case 'testform':
        require 'master_test_form.php';
    break;
    case 'simpan':
        //mekrodb
        $data = array('nama_test' => $nama_test);
        DB::insert('test',$data);
    break;
    default:
        # code...
        break;
}