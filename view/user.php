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
                    <h3 class="box-title">List Users Data</h3>
                    <div style="float:right" class="float-right">
                        <button data-toggle="modal" data-target="#userModal" class="btn btn-success"><i class="fa fa-plus"></i> New User</button>
                    </div>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="row content">
                    <div class="col-md-12">
                        <table class="table table-bordered" id="userlist">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Created Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Ahmad</td>
                                    <td>User</td>
                                    <td>10-10-2001</td>
                                    <td align="center">
                                    <a class="btn btn-default" href="path/to/settings" aria-label="Settings">
                                    <i class="fa fa-cog" aria-hidden="true"></i>
                                    </a>

                                    <a class="btn btn-danger" href="path/to/settings" aria-label="Delete">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </a>

                                    <a class="btn btn-primary" href="#navigation-main" aria-label="Skip to main navigation">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                    </a>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.box -->

        </div>
        <!--/.col (left) -->
    </div>
    <!-- /.row -->
</section>

<!-- Modal -->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Default Modal</h4>
        </div>
        <div class="modal-body">
        <!-- form user  -->
        <form action="<?php echo App::post('user','insert') ?>" role="form" method="POST">
            <div class="box-body">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" autocomplete="off" class="form-control" id="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <label for="display">FullName</label>
                    <input type="text" name="display_name" autocomplete="off" class="form-control" id="display_name" placeholder="Fullname" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" autocomplete="off" class="form-control" id="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label for="password">Re-type Password</label>
                    <input type="password" name="repassword" autocomplete="off" class="form-control" id="repassword" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label for="role">Role User</label>
                    <select class="form-control" name="id_role" id="id_role" required>
                        <?php
                            $roles = App::getRoles();
                            foreach($roles as $role){
                                echo "<option value=\"$role[id_role]\">$role[rolename]</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
</div>

<script src="js/user.js"></script>