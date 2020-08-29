loaddata();
function loaddata(page){
    param = 'proses=loaddata';
    send_text('master_slave_program.php?page='+page,param,'#data-table');
}

function newheader(){
    rowcount = $(".program tr").length;
    rowcount = rowcount + 1;
    var date = new Date();
    var dateString = new Date(date.getTime() - (date.getTimezoneOffset() * 60000 ))
                    .toISOString()
                    .split("T")[0];
    html = '<td><input autocomplete=off id="id_'+rowcount+'" type=text></td>';
    html += '<td><input autocomplete=off id="ket_'+rowcount+'" type=text></td>';
    html += '<td><input autocomplete=off id="tgl_'+rowcount+'" type=date value='+dateString+'></td>';
    html += '<td><input autocomplete=off id="budget_'+rowcount+'" type=text></td>';
    html += '<td></td>';
    html += '<td><i class="fa fa-save btn-link" onclick=simpanheader('+rowcount+')></i>    <i class="fa fa-close btn-danger btn-link " onclick=cancel('+rowcount+')></i></td>';
    $('.program > tbody:last-child').append('<tr id=idrowcount_'+rowcount+'>'+html+'</tr>');
}

function cancel(i){
    $("#idrowcount_"+i).remove();
}

function newsubheader(indux,$this){
    tr = $($this).closest("tr");
    totaltr = $(".input_").length;
    rowcount = totaltr + 1;
    console.log(rowcount);
    var date = new Date();
    var dateString = new Date(date.getTime() - (date.getTimezoneOffset() * 60000 ))
    .toISOString()
    .split("T")[0];
    html = '<td><input autocomplete=off id="id_'+rowcount+'" type=text value=""></td>';
    html += '<td><input autocomplete=off id="ket_'+rowcount+'" type=text></td>';
    html += '<td><input autocomplete=off id="tgl_'+rowcount+'" type=date value='+dateString+'></td>';
    html += '<td><input autocomplete=off id="budget_'+rowcount+'" type=text></td>';
    html += '<td></td>';
    html += '<td><i class="fa fa-save" onclick=simpanheader('+rowcount+','+indux+')></i>  <i class="fa fa-close btn-danger btn-link " onclick=cancel('+rowcount+')></i></td>';
    $(tr).after('<tr class="input_" id=idrowcount_'+rowcount+'>'+html+'</tr>');
    getlastid(indux,rowcount);
}

function simpanheader(rowid,indux = null) {
    if(indux != null) indux = indux;
    id = getIdVal("#id_"+rowcount,"ID");
    ket = getIdVal("#ket_"+rowcount,"Keterangan");
    tanggal = getIdVal("#tgl_"+rowcount,"Tanggal");
    budget = getIdVal("#budget_"+rowcount,"Badget");
    param = 'id_program='+id;
    param += '&ket_program='+ket;
    param += '&tgl_perencanaan='+tanggal;
    param += '&rp_budget='+budget;
    param += '&induk='+indux;
    post_text('master_slave_program.php?proses=save',param,function(data){
        data = JSON.parse(data);
        html = '<td>'+data[0].id_program+'</td>';
        html += '<td>'+data[0].ket_program+'</td>';
        html += '<td>'+data[0].tgl_perencanaan+'</td>';
        html += '<td>'+data[0].rp_budget+'</td>';
        html += '<td>'+data[0].display_name+'</td>';
        html += '<td><i class="fa fa-plus btn-link" onclick=newsubheader('+data[0].id_program+',this)></i>  <i class="fa fa-close btn-danger btn-link " onclick=delete('+id+')></td>';
        $("#idrowcount_"+rowcount).html(html);
        $("#idrowcount_"+rowcount).addClass("sub_"+indux);
        // loaddata();
    });
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

$('.td').on('dbclick', function() {
    // var $this = $(this);
    var $input = $('<input>', {
        value: $this.text(),
        type: 'text',
        blur: function() {
           $this.text(this.value);
        },
        keyup: function(e) {
           if (e.which === 13) $input.blur();
        }
    }).appendTo( $this.empty() ).focus();
    alert('test');
});

function input($this,field,id){
    var $this = $($this);
    var $input = $('<input>', {
        value: $this.text(),
        type: 'text',
        blur: function() {
            update(field,this.value,id);
            $this.text(this.value);
        },
        keyup: function(e) {
           if (e.which === 13) $input.blur();
        }
    }).appendTo( $this.empty() ).focus();
}

function update(field,value,id){
    param = 'proses=update';
    param += '&field='+field;
    param += '&value='+value;
    param += '&id='+id;
    post_text('master_slave_program.php',param,()=>{
        notif('Saved!','success','Notif');
    });
}

function getlastid(indux,row) {
    param = 'proses=getlastid';
    param += '&induk='+indux;
    post_text('master_slave_program.php',param,(id)=>{
        $("#id_"+row).val(id);
    });
}