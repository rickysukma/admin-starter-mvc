<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Table
        <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="#">
                <i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li>
            <a href="#">Examples</a>
        </li>
        <li class="active">Blank page</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Title</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped" id="userTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            Footer
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
<script>
    $.ajax({
        url: 'https://jsonplaceholder.typicode.com/users/',
        method: 'get',
        dataType: 'json',
        success: function(data) {
            var userTable = $('#userTable').DataTable({
                data: data,
                columns: [
                    { data: 'id', },
                    { data: 'name' },
                    { data: 'username' },
                    { data: 'email' },
                    { 
                        'render': function(data, type, full, meta) {
                                    return '<a href="#" class="btn btn-primary" onclick="render(edit-table?id='+full.id+'\)">Edit</a>';
                                }
                    }
                ],
            });
        },
    });
</script>