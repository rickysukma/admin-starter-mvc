loaddata(1);

function loaddata(page){
    param = 'proses=loaddata';
    send_text('master_menu_slave.php?page='+page,param,'#isihalaman');
}

function new_menu(){
    param = 'proses=form&type=new';
    send_text('master_menu_slave.php',param,'#isihalaman');
}

function simpan(){
    nama_menu = $("#nama_menu").val();
    icon = $("#icon").val();
    source = $("#source").val();
    parent = $("#parent").val();
    param = '';
    param += 'nama_menu='+nama_menu+'&icon='+icon+'&source='+source+'&parent='+parent;
    post_text('master_menu_slave.php?proses=save',param,function(){
        notif(
            'Berhasil','success','Done!'
        );
        loaddata();
    });
}

function edit(id){
    param = 'proses=form&type=edit&id='+id;
    send_text('master_menu_slave.php',param,'#isihalaman');
}

function update(id){
    nama_menu = $("#nama_menu").val();
    icon = $("#icon").val();
    source = $("#source").val();
    parent = $("#parent").val();
    param = '';
    param += 'nama_menu='+nama_menu+'&icon='+icon+'&source='+source+'&parent='+parent;
    post_text('master_menu_slave.php?proses=update&id='+id,param,function(){
        notif('Berhasil','success','Done!');
        loaddata();
    });
}

function cari(){
    q = $("input[name=q]").val();
    param="proses=loaddata&cari="+q;
    send_text('master_menu_slave.php',param,'#isihalaman');
}

$("input[name=q]").on('keypress',function(e) {
    if(e.which == 13) {
        cari();
    }
});