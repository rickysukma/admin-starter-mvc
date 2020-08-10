loaddata(1);

function loaddata(page){
    param = 'proses=loaddata';
    send_text('role_user_slave.php?page='+page,param,'#isihalaman');
}

function newrole(){
    param = 'proses=form&type=new';
    send_text('role_user_slave.php',param,'#isihalaman');
}

function simpan(){
    rolename = $("#rolename").val();
    param = '';
    param += 'rolename='+rolename;
    post_text('role_user_slave.php?proses=save',param,function(){
        notif(
            'Berhasil','success','Done!'
        );
        loaddata();
    });
}

function edit(id){
    param = 'proses=form&type=edit&id='+id;
    send_text('role_user_slave.php',param,'#isihalaman');
}

function update(id){
    rolename = $("#rolename").val();
    param = '';
    param += 'rolename='+rolename;
    post_text('role_user_slave.php?proses=update&id='+id,param,function(){
        notif('Berhasil','success','Done!');
        loaddata();
    });
}

function cari(){
    q = $("input[name=q]").val();
    param="proses=loaddata&cari="+q;
    send_text('role_user_slave.php',param,'#isihalaman');
}

$("input[name=q]").on('keypress',function(e) {
    if(e.which == 13) {
        cari();
    }
});