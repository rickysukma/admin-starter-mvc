<section class="content-header">
    <h1>
        Daftar
        <small>Aset</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Transaksi</a></li>
        <!-- <li><a href="#">Forms</a></li> -->
        <li class="active">Daftar Aset</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <!-- <h3 class="box-title">List Users Data</h3> -->
                    <!-- <div class="text-left col-md-10">
                        <button class="btn btn-info btn-lg" onclick="new_menu()"><i class="fa fa-file"></i> New Menu</button>
                        <button class="btn btn-info btn-lg" onclick="loaddata()"><i class="fa fa-th-large"></i> List Menu</button>
                    </div> -->
                    <div class="col-md-2">
                        <div class="form" style="background-color:white">
                        <label for="q">Cari pada Nama :</label>
                            <div class="input-group">
                            <input type="text" autocomplete=off name="q" class="pull-right" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="row content" id="isihalaman">
                    <?php
                    require 'lib/myfunction.php';
                    $tab = array();
                    $tab[1]['header'] = 'Form';
                    $tab[2]['header'] = 'List Data';
                    $tab[1]['html'] = file_get_contents('form_trans_daftaraset.php');
                    $tab[2]['html'] = file_get_contents('trans_slave_daftaraset.php');
                        echo tabpanel($tab);
                    ?>
                </div>
                    <!--  -->
                    <div class="overlay loading" style="display:none">
                        <i class="fa fa-refresh fa-spin"></i>
                    </div>
                </div>
            </div>
            <!-- /.box -->

        </div>
        <!--/.col (left) -->
    </div>
    <!-- /.row -->
</section>
<!-- <script src="js/menu.js"></script> -->