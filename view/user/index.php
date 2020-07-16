<section class="content-header">
    <h1>
        User
        <small>Manager</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <!-- <li><a href="#">Forms</a></li> -->
        <li class="active">User</li>
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
                    <div class="text-left">
                        <button class="btn btn-info btn-lg" onclick="newform()"><i class="fa fa-file"></i> New User</button>
                        <button class="btn btn-info btn-lg" onclick="loaddata()"><i class="fa fa-th-large"></i> List Data</button>
                    </div>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="row content" id="isihalaman">
                    <!-- Isi Halaman -->
                    
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
<script src="js/user.js"></script>