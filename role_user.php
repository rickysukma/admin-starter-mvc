<section class="content-header">
    <h1>
        Setup
        <small>Role User</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Administrator</a></li>
        <!-- <li><a href="#">Forms</a></li> -->
        <li class="active">Setup Role User</li>
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
                    <div class="text-left col-md-10">
                        <button class="btn btn-info btn-lg" onclick="newrole()"><i class="fa fa-file"></i> New Role</button>
                        <button class="btn btn-info btn-lg" onclick="loaddata()"><i class="fa fa-th-large"></i> List Menu</button>
                    </div>
                    <div class="col-md-2">
                        <div class="form" style="background-color:white">
                        <!-- <label for="q">Cari Nama :</label> -->
                            <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Cari Nama">
                                <span class="input-group-btn">
                                    <button type="button" onclick="cari()" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="row content" id="isihalaman">
                    <!-- Isi Halaman -->
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Role Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="data-menu">
                                
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
<script src="js/roleuser.js"></script>