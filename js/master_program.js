loaddata();
function loaddata(page){
    param = 'proses=loaddata';
    send_text('master_slave_program.php?page='+page,param,'#data-table');
}

function newheader(){
    rowcount = $(".program tr").length;
    rowcount = rowcount + 1;
    alert(rowcount);
    var date = new Date();
    var dateString = new Date(date.getTime() - (date.getTimezoneOffset() * 60000 ))
                    .toISOString()
                    .split("T")[0];
    html = '<td><input id="id_'+rowcount+'" type=text></td>';
    html += '<td><input id="ket_'+rowcount+'" type=text></td>';
    html += '<td><input id="tgl_'+rowcount+'" type=date value='+dateString+'></td>';
    html += '<td><input id="budget_'+rowcount+'" type=text></td>';
    html += '<td></td>';
    html += '<td><i class="fa fa-save"></i></td>';
    $('.program > tbody:last-child').append('<tr>'+html+'</tr>');
}

function newsubheader(){
    
}

function simpanheader() { 

 }

function simpan(){
    nama_menu = $("#nama_menu").val();
    icon = $("#icon").val();
    source = $("#source").val();
    parent = $("#parent").val();
    param = '';
    param += 'nama_menu='+nama_menu+'&icon='+icon+'&source='+source+'&parent='+parent;
    post_text('master_slave_program.php?proses=save',param,function(){
        notif(
            'Berhasil','success','Done!'
        );
        loaddata();
    });
}

function edit(id){
    param = 'proses=form&type=edit&id='+id;
    send_text('master_slave_program.php',param,'#isihalaman');
}

function update(id){
    nama_menu = $("#nama_menu").val();
    icon = $("#icon").val();
    source = $("#source").val();
    parent = $("#parent").val();
    param = '';
    param += 'nama_menu='+nama_menu+'&icon='+icon+'&source='+source+'&parent='+parent;
    post_text('master_slave_program.php?proses=update&id='+id,param,function(){
        notif('Berhasil','success','Done!');
        loaddata();
    });
}

function cari(){
    q = $("input[name=q]").val();
    param="proses=loaddata&cari="+q;
    send_text('master_slave_program.php',param,'#isihalaman');
}

$("input[name=q]").on('keypress',function(e) {
    if(e.which == 13) {
        cari();
    }
});