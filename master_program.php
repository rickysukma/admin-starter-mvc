<link rel="stylesheet" href="css/tree.css">
<section class="content-header">
    <h1>
        Master
        <small>Program</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Anggaran</a></li>
        <!-- <li><a href="#">Forms</a></li> -->
        <li class="active">Master Program</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <!-- /.box-header -->
                <!-- form start -->
                <div class="row content" id="isihalaman">
                    <!-- Isi Halaman -->
                    <div class="col-md-12">
                        <table class="table tree-2 table-bordered w-auto small program">
                            <thead>
                                <tr class="treegrid-1">
                                    <th>ID</th>
                                    <th>Keterangan Program</th>
                                    <th>Tanggal Perencanaan</th>
                                    <th>Budget</th>
                                    <th>Last Update</th>
                                    <th> <span class="btn-link"><i class="fa fa-plus" onclick="newheader()"></i></span> </th>
                                </tr>
                            </thead>
                            <tbody id="data-table">
                                
                            </tbody>
                        </table>	
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
<script src="js/master_program.js"></script>