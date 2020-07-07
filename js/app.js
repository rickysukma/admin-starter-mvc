var api_url = "";
// var container = $("#main-container");
// $(".nav-link").click(function (e) {
//     e.preventDefault();
//     var url = $(this).attr('href');
//     render(url);
// })
function render(targetPage) {    
    var targetURL = "view/" + targetPage + ".php";
    if (targetPage != "") {
        $.ajax({
            url: targetURL,
            type: "POST",
            data: {
                ajax: true
            },
            success: function (result) {
                // $('ul.sidebar-menu a').each(function () {
                //     if (targetPage == $(this).data("target")) {
                //         $(this).parentsUntil('ul.sidebar-menu', 'li').addClass('active');
                //     } else {
                //         $(this).parentsUntil('ul.sidebar-menu', 'li').removeClass("active");
                //     }
                // });
                container.html(result);
                // if (notification != false) {
                //     if (notification.success == true) {
                //         toastr["success"](notification.message, "Berhasil");
                //     } else {
                //         toastr["error"](notification.message, "Gagal");
                //     }
                // }
            },
            error: function () {
                // toastr["error"]("Halaman Tidak Ditemukan", "Gagal");
                console.log("error here");

            }
        });
    }
}