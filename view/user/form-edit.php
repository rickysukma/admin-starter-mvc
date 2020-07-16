<?php extract($data) ?>
<div class="box-header">
<h3 class="box-title">Form Header</h3>
</div>
<form id="form" action="<?php echo App::post('user','update') ?>" role="form" method="POST">
   <div class="box-body">
      <input type="hidden" name="id_user" value="<?= $id_user ?>">
      <div class="form-group">
         <label for="username">Username</label>
         <input type="text" name="username" value="<?= $username ?>" autocomplete="off" class="form-control" id="username" placeholder="Username" required>
      </div>
      <div class="form-group">
         <label for="display">FullName</label>
         <input type="text" name="display_name" value="<?= $display_name ?>" autocomplete="off" class="form-control" id="display_name" placeholder="Fullname" required>
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
               $select = "";
               if($role['id_role'] == $id_role){
                  $select = 'selected';
               }
                echo "<option selected value=\"$role[id_role]\">$role[rolename]</option>";
            }
            ?>
         </select>
      </div>
   </div>
   <!-- /.box-body -->
   </div>
   <div class="modal-footer">
      <button type="button" onclick="loaddata()" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
      <button type="button" onclick="update()" class="btn btn-primary">Save changes</button>
   </div>
</form>