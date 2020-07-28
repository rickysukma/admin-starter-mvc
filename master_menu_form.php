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
<form>
   <div class="box-body">
      <div class="form-group">
         <label for="username">Nama Menu</label>
         <input type="text" name="nama_menu" autocomplete="off" class="form-control" id="nama_menu" placeholder="Nama Menu" required value="<?= @$data['nama_menu'] ?>">
      </div>
      <div class="form-group">
         <label for="display">Icons</label>
         <select name="icon" id="icon" class="form-control select">
         <option value="">Pilih Icon</option>
         <?php
         if(@$icons)
         $iconselect = "";
         foreach($icons as $i){
            if($data['icon'] == 'fa '.$i['name']) $iconselect = 'selected';
            echo "<option $iconselect value=\"fa $i[name]\">&#x$i[unicode]</option>";
         }
         ?>
         </select>
      </div>
      <div class="form-group">
         <label for="source">Source</label>
         <input type="source" name="source" value="<?= @$data['source'] ?>" autocomplete="off" class="form-control" id="source" placeholder="source" required>
      </div>
      <div class="form-group">
         <label for="role">Parent Menu</label>
         <select class="form-control" name="parent" id="parent">
         <option value="">Pilih Parent</option>
         <?php
            $parent = DB::query("SELECT * FROM menu");
            
            foreach($parent as $m){
               if($m['id_menu'] == $data['parent']){
                  $select= 'selected';
               }else{
                  $select = '';
               }
                echo "<option $select value=\"$m[id_menu]\">$m[nama_menu]</option>";
            }
            ?>
         </select>
      </div>
   </div>
   <!-- /.box-body -->
   </div>
   <div class="modal-footer">
      <button type="button" class="btn btn-default pull-left" onclick="loaddata()">Close</button>
      <button type="button" onclick="<?= $button ?>" class="btn btn-primary">Save changes</button>
   </div>
</form>