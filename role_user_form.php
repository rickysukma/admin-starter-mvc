<style>
.select {
  font-family: 'FontAwesome', 'sans-serif';
}

<?php 
if($id != ''){
   $button = 'update('.$id.')';
}else{
   $button = 'simpan()';
}
?>

</style>
<div class="box-header">
<h3 class="box-title">Form Header</h3>
</div>
<form action="#">
   <div class="box-body">
      <div class="form-group">
         <label for="username">Nama Role</label>
         <input type="text" name="rolename" autocomplete="off" class="form-control" id="rolename" placeholder="Nama Role" required value="<?= @$data['rolename'] ?>">
      </div>
   <!-- /.box-body -->
   </div>
   <div class="modal-footer">
      <button type="button" class="btn btn-default pull-left" onclick="loaddata()">Close</button>
      <button type="button" onclick="<?= $button ?>" class="btn btn-primary">Save changes</button>
   </div>
</form>