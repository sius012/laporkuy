function deleteLaporan(id) {
    if (confirm("yakin?")) {
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: "/admin/laporan/hapus/" + id,
            type: "get",
            success: function () {
                alert("data berhasil dihapus");
            },
        });
        window.location = "/admin/laporan/hapus/" + id;
    }
}
$(document).ready(function () {
    var output = $(".img-prev-cont");
    const input = $(".img-inp");
    let imageArray = [];

    var element = "";

    input.change(function () {
        output.html = "";
        const files = this.files;

        for (let i = 0; i < files.length; i++) {
            let reader = new FileReader();
            if (this.files[i]) {
                let reader = new FileReader();
                reader.onload = function (event) {
                    console.log(event.target.result);
                    output.append(` <div class="carousel-item ${
                        i == 0 ? " active" : ""
                    }">
                <img src="${
                    event.target.result
                }" class="d-block mx-auto" alt="..." style="width:100%; height: 400px">
              </div>`);
                };
                reader.readAsDataURL(this.files[i]);
            }
            console.log(imageArray);
        }

        // renderImg(output, imageArray);

        if (files.length > 0) {
            $(".img-parts").show();
            $(".content-parts").attr("class", "col-8 content-parts");
        } else {
            if (typeof init == "function") {
                init();
            }
        }
    });

    $(".laporan-row").click(function () {});
});

function readimage(element, func) {
    output.html = "";
    const files = elemet.files;

    for (let i = 0; i < files.length; i++) {
        let reader = new FileReader();
        if (this.files[i]) {
            let reader = new FileReader();
            reader.onload = function (event) {
                console.log(event.target.result);
                output.append(` <div class="carousel-item ${
                    i == 0 ? " active" : ""
                }">
                <img src="${
                    event.target.result
                }" class="d-block mx-auto" alt="..." style="width:100%; height: 400px">
              </div>`);
            };
            reader.readAsDataURL(this.files[i]);
        }
        console.log(imageArray);
    }

    renderImg(output, imageArray);

    if (func != null) {
        func();
    }
}

$(document).ready(function () {
    $("#tuning-options li .dropdown-item").click(function () {
        changeStatus($(this));
    });
});

function changeStatus(element, modalement = null) {
    let button = element.closest(".btn-group").children("button");

    if (element.attr("value") == "selesai") {
        if (modalement != null) {
            Swal.fire({
                title: "<strong>Konfirmasi selesai</strong>",
                html:
                    `<form action="${button.attr(
                        "url"
                    )}" method="POST" id="form-selesai">` +
                    `<input type="hidden" name="id_laporan" value="${button.val()}">` +
                    `<input type="hidden" name="_token" value="${button.attr(
                        "token"
                    )}">` +
                    "<b>Masukan keterangan</b>, " +
                    '<textarea name="keterangan" class="form-control " style="display:block !important;"></textarea>' +
                    "</form>",
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: '<i class="fa fa-ok"></i> Selesai',
                confirmButtonAriaLabel: "Thumbs up, great!",
                cancelButtonText: '<i class="fa fa-close"></i>',
                cancelButtonAriaLabel: "Thumbs down",
            }).then((res) => {
                if (res.isConfirmed) {
                    $("#form-selesai").submit();
                } else {
                }
            });
        }
    } else {
        changeStatusAjax(element, button);
    }
}

function changeStatusAjax(element, button) {
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: "/ubahstatuslaporan",
        data: {
            status: element.attr("value"),
            id_laporan: button.val(),
        },
        type: "post",
        dataType: "json",
        success: function (data) {
            button.attr("class", "btn dropdown-toggle " + data["bg"]);
            button.text(element.text());

            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener("mouseenter", Swal.stopTimer);
                    toast.addEventListener("mouseleave", Swal.resumeTimer);
                },
            });

            Toast.fire({
                icon: "success",
                title: "status telah diubah",
            });
        },
        error: function (err) {
            alert(err.responseText);
        },
    });
}
