$(document).ready( function () {
    loaddata();
} );

url_user = "?page=user&action=";

function loaddata() {
    send_request(url_user+'table','','#isihalaman');
}

function newform() {
    send_request(url_user+'form','','#isihalaman');
}

function simpan(){
    data =  $("#form").serializeArray();
    if(data === undefined || data.length == 0){
        notif("Isikan semua kolom terlebih dahulu!","warning","Perhatian!");
    }

    if($("#password").val() != $("#repassword").val()){
        notif("Konfirmasi password tidak sama dengan kolom password","warning","Perhatian!");
        $("#password").focus();
        return;
    }
    post_ajax(url_user+"simpan_user",data,function () {
        notif("Data berhasil disimpan.",'success','Done!');
        loaddata();
    });
    
}

function update(){
    data =  $("#form").serializeArray();
    if(data === undefined || data.length == 0){
        notif("Isikan semua kolom terlebih dahulu!","warning","Perhatian!");
    }

    if($("#password").val() != $("#repassword").val()){
        notif("Konfirmasi password tidak sama dengan kolom password","warning","Perhatian!");
        $("#password").focus();
        return;
    }
    post_ajax(url_user+"update",data,function () {
        notif("Data berhasil disimpan.",'success','Done!');
        loaddata();
    });
    
}

function edit(id){
    param = 'id='+id;
    send_request(url_user+'formedit',param,"#isihalaman");
}

function hapus(id){
    toastr.info("<br><button type='button' id='confirmationRevertYes' class='btn btn-secondary text-black'>Yes</button> <button type='button' class='btn btn-success'>Batal</button>",'Anda yakin akan menghapus data ini?',
  {
      closeButton: false,
      allowHtml: true,
      positionClass:'toast-top-center',
      onShown: function (toast) {
          $("#confirmationRevertYes").click(function(){
            param = 'id='+id;
            post_ajax(url_user+"delete",param,function () {
                notif("Data berhasil dihapus.",'success','Done!');
                loaddata();
            });
          });
        }
  });
}