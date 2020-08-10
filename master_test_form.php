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
<h3 class="box-title">Form Test</h3>
</div>
<form action="#">
   <div class="box-body">
      <div class="form-group">
         <label for="username">Nama Test</label>
         <input type="text" name="nama_test" autocomplete="off" class="form-control" id="nama_test" placeholder="Nama Test" required value="<?= @$data['nama_test'] ?>">
      </div>
   <!-- /.box-body -->
   </div>
   <div class="modal-footer">
      <button type="button" class="btn btn-default pull-left" onclick="loaddata()">Close</button>
      <button type="button" onclick="<?= $button ?>" class="btn btn-primary">Save changes</button>
   </div>
</form>