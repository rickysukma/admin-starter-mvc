loaddata(1);

function loaddata(page){
    param = 'proses=loaddata';
    send_text('master_menu_slave.php?page='+page,param,'#isihalaman');
}