function loaddatas(page=null){
    if(page !== null)page = page;
    param = 'proses=loaddata&page='+page;
    post_response_text('master_menu_slave.php',param,respon);
    function respon() {
        if (con.readyState == 4) {
            if (con.status == 200) {
                if (!isSaveResponse(con.responseText)) {
                    alert(con.responseText);
                } else {
                    // Success Response
                    document.getElementById('isihalaman') = con.responseText;
                    // updBlokDropdown();
                }
            } else {
                error_catch(con.status);
            }
        }
    }
}

loaddata(1);

function loaddata(page){
    param = 'proses=loaddata';
    send_text('master_menu_slave.php?page='+page,param,'#isihalaman');
}