$(document).ready(function(e) {
    initialize();
});

$(document).ready(function() {

    $('#tuning-options li .dropdown-item-petugas').click(function() {
        
        changeStatus($(this), $("#modal-selesai"));
    });

});




///INISIALISASI
function initialize(defaultTab = null) {
    let activepage = defaultTab != null ? defaultTab : "#tab-pg1";
    $(".tab-cont").each(function() {
        if ($(this).attr("id") != activepage.slice(1)) {
            $(this).hide();
        } else {
            $(this).show();
        }
    });
}


$(document).ready(function(){
    $(".send-message").click(function(){
        let message = $(this).closest(".tab-cont").find(".field-message-sender").val();
        alert(message);
        if(message.length > 0){
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                url: "/kirimtanggapan",
                data: {
                    id_laporan : $(this).val(),
                    message: message
                },  
                type: "post",
                success: function (data) {
                    alert("berhasil terkirim");
                },
                error: function(err){
                    alert(err.responseText);
                }
            });
        }else{
            
        }
    });
});