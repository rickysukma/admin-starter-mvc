var api_url = "";
var server_url = $("#base_url").val();

//example data 
// var data = new Array('id=354313', 'fname=Henry', 'lname=Ford');
// var data = myData.join('&');

//@target = tujuan halaman ex : page=user&action=buat_form
//@page adalah class yang jadi target, action adalah method atau funcgsi yang akan di pangggil 
//@isikontent = tag id=html yang akan di isi ex : #isikonten; berarti id="isikonten"

function send_request(target,data = null,isikonten){
    $(".loading").show();
    if (target != "") {
        $.ajax({
            url: server_url+target,
            type: "POST",
            data: data,
            success: function (result) {
                if(isError(result)){
                    notif(result,"error","Galat!");
                }
                $(isikonten).html(result);
            },
            error: function (xhr) {
                notif(xhr.responseText,'error','Gagal')
                // console.log("error here");

            }
        });
    }
    $(".loading").hide();
}

function send_text(target,data = null,isikonten){
    $(".loading").show();
    if (target != "") {
        $.ajax({
            url: target,
            type: "POST",
            data: data,
            success: function (result) {
                if(isError(result)){
                    notif(result,"error","Galat!");
                }
                $(isikonten).html(result);
            },
            error: function (xhr) {
                notif(xhr.responseText,'error','Gagal')
                // console.log("error here");

            }
        });
    }
    $(".loading").hide();
}


function post_ajax(target,data,callback) {
    if (target != "") {
        $.ajax({
            url: server_url+target,
            type: "POST",
            data: data,
            dataType: "html",
            success: function (result) {
                if(isError(result)){
                    notif(result,"error","Galat!");
                    return;
                }
                callback();
            },
            error: function (xhr) {
                notif(xhr.responseText,'error','Gagal')
                return false;
                // console.log("error here");

            }
        });
    }
}

function post_text(target,data,callback) {
    if (target != "") {
        $.ajax({
            url: target,
            type: "POST",
            data: data,
            dataType: "html",
            success: function (result) {
                if(isError(result)){
                    notif(result,"error","Galat!");
                    return;
                }
                callback(result);
            },
            error: function (xhr) {
                notif(xhr.responseText,'error','Gagal')
                return false;
                // console.log("error here");

            }
        });
    }
}

/*
    @tipe = success,warning,error,info
    @pesan = Pesan yang ingin disampaikan
    @title = Judul Pesan

*/

function notif(pesan,tipe,title){
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      };
    toastr[tipe](pesan, title);
}


//checking result including error or warning word
function isError(text) {
    cek = text.substr(0,150);
    cek = cek.toLowerCase();
    if(cek.includes("error") || cek.includes("warning") || cek.includes("error:")){
        return true;
    }else{
        return false;
    }
}

function do_load(page){
    refresh(page);
    $.ajax({
        url:page+'.php',
        data:{},
        dataType:'html',
        success:function(html){
        $("#main-container").html(html);
        },error:function(error,err){
            notif(error.statusText,'error','Error!');
        }
    });
}

function refresh(page){
    localStorage.setItem("refresh", page);
}

//check for Navigation Timing API support
if (window.performance) {
    console.info("window.performance works fine on this browser");
}
if (performance.navigation.type == performance.navigation.TYPE_RELOAD) {
    do_load(localStorage.getItem("refresh"));
} else {
    console.info( "This page is not reloaded");
}

function getIdVal(elem,display){
    val = $(elem).val();
    if(val == '' || val == undefined){
        notif("Kolom "+display+" tidak boleh kosong","info","Validation");
        $(elem).focus();
        console.log($(elem).val());
        throw false;
    }else{
        return $(elem).val();
    }
}