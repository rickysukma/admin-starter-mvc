function loaddata(page){
    /*
    @param 
    1 = master_slave_test.php
    2 = param
    3 = element yanf akan di isi
    */
   param = 'proses=loaddata';
   param += '&page='+page;
    send_text('master_slave_test.php',param,'#isihalaman');
}

loaddata(1);

function testform(){
    param = 'proses=testform';
    send_text('master_slave_test.php',param,'#isihalaman');
}

function simpan(){
    nama_test = $("#nama_test").val();
    if(nama_test == '' || nama_test == undefined){
        /*
            @tipe = success,warning,error,info
            @pesan = Pesan yang ingin disampaikan
            @title = Judul Pesan

        */
    //    notif('warning','Field nama masih kosong','');
    alert('Field belum terisi');
    }
    /*
    @param 
    1 = master_slave_test.php
    2 = param
    3 = function callback
    */
   param = 'proses=simpan';
   param += '&nama_test='+nama_test;
    post_text('master_slave_test.php',param,function(){
        alert('Done');
        loaddata(1);
    });
}