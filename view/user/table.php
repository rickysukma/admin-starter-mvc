<div class="col-md-12">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>Username</th>
                <th>Role</th>
                <th>Created Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="data-user">
            <?php
            $no =1;
            foreach($users as $s){
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $s['username'] ?></td>
                <td><?= $s['rolename'] ?></td>
                <td><?= $s['createdtime'] ?></td>
                <td>
                    <button onclick="edit('<?= $s['id_user'] ?>')" title="Sunting" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></button>
                    <button onclick="hapus('<?= $s['id_user'] ?>')" title="Hapus" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>