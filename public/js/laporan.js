
    function deleteLaporan(id   ){
        if(confirm("yakin?")){
            $.ajax({
                headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/admin/laporan/hapus/"+id,
        type: "get",
        success: function(){
            alert('data berhasil dihapus');
        }
            });
            window.location =  "/admin/laporan/hapus/"+id;
            
        }
    }
$(document).ready(function() {
    

    var output = $(".img-prev-cont");
    const input = $(".img-inp");
    let imageArray = [];

    var element = "";

    input.change(function() {
     
        output.html = "";
        const files = this.files;




        for (let i = 0; i < files.length; i++) {
            
            let reader = new FileReader();
            if (this.files[i]) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    console.log(event.target.result);
                    output.append(` <div class="carousel-item ${i == 0 ? " active" : ""}">
                <img src="${event.target.result}" class="d-block mx-auto" alt="..." style="width:100%; height: 400px">
              </div>`);
                }
                reader.readAsDataURL(this.files[i]);
            }
            console.log(imageArray);

        }


        renderImg(output, imageArray);


    });

    $(".laporan-row").click(function() {

    });

});






$(document).ready(function() {

    $('#tuning-options li .dropdown-item').click(function() {
        changeStatus($(this));
    });


});



function changeStatus(element, modalement = null) {

    let button = element.closest(".btn-group").children("button");

    if(element.attr("value") == "selesai"){
        if(modalement != null){
            modalement.modal("show");
        }
    }else{
        changeStatusAjax(element);
    }



    
}

function changeStatusAjax(element){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/ubahstatuslaporan",
        data: {
            status: element.attr("value"),
            id_laporan: button.val()
        },
        type: "post",
        dataType: "json",
        success: function(data) {
          alert(element.attr("value"));
            button.attr("class", "btn dropdown-toggle " + data["bg"]);
            button.text(element.text());
            
            
            
        },
        error: function(err) {
            alert(err.responseText);
        }

    });
}
