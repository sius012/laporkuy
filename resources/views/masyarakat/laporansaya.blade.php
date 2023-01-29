@extends("layouts.layout_user")
@section("title", "Laporan Saya")
@section("titletab", "Laporan Saya")
@section("content")
@push("scripts")
<script>
$(document).ready(function() {

    function loadTab(target = null) {
        var targetelm = target == null ? "keterangan-tab" : target;
        $(".tab-cont").each(function() {
            if ($(this).hasClass(targetelm) == false) {
                $(this).hide("fast");
            } else {
                $(this).show("fast");
            }
        });
    }

    loadTab();
    $(".button-tab").click(function() {

        loadTab($(this).attr("lk-data-target"));
    });


    $(".lampiran-saya").click(function() {
        $.ajax({
            url: "/getdetaillaporan",

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: $(this).val(),
            },
            dataType: "json",
            type: "post",
            success: function(data) {

                // $(".img-prev").html("");
                data["lampiran"].map(function(e, i) {
                    $(".img-prev").append(` <div class="carousel-item ${i == 0 ? " active" : ""}">
                                <img src="${e["image"]}" class="d-block mx-auto" alt="..." style="width:100%; height: 400px">
                            </div>`);
                });

            },
            error: function(err) {
                alert(err.responseText);
            }
        });
    });


});
</script>


@endpush

<div class="dic mb-5"></div>
<div class="containers m-3">

    <div class="row" style="height: 100vh">

        <div class="col-6">
            <div class="card p-3">
                <form action="" method="GET">

                    <div class="row">
                        <div class="col">
                            <h5>Status:</h5>
                        </div>
                        <div class="col">
                            <h5>Dari:</h5>
                        </div>
                        <div class="col">
                            <h5>Sampai:</h5>
                        </div>
                        <div class="col"></div>
                    </div>
                    <div class="row">
                        <div class="col"> <select id="" class="form-select" name="status">
                                <option value="">Pilih Status</option>
                                <option value="menunggu">{{ucwords("menunggu")}}</option>
                                <option value="kepetugas">{{ucwords("kepetugas")}}</option>
                                <option value="diproses">{{ucwords("diproses")}}</option>
                                <option value="selesai">{{ucwords("selesai")}}</option>
                            </select></div>
                        <div class="col">
                            <input type="date" class="form-control" name="dari">
                        </div>
                        <div class="col">
                            <input type="date" class="form-control" name="sampai">
                        </div>
                        <div class="col">
                            <button class="btn btn-primary" value="laporan" name="filter">Cari</button>
                        </div>
                    </div>

                </form>
            </div>
            @foreach($laporan as $lp)
            @include("component.laporan_comp")
            @endforeach
        </div>
        <div class="col-1"></div>
        <div class="col-4">
            <div class="card" style="height: 100%">
                <div class="card p-3 m-3 mb-0 inbox-header">
                    <div class=" row">
                        <div class="col-1">
                            <i class="fa fa-message"></i>
                        </div>
                        <div class="col-11">
                            <h5>Inbox</h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card m-3 p-3" class="">
                            <div class=" card">
                                <div class="row">
                                    <div class="col-3 d-flex">
                                        <img src="https://cdn-icons-png.flaticon.com/512/146/146035.png" alt=""
                                            class="rounded-circle my-auto p-3">
                                    </div>
                                    <div class="col-9 p-2">
                                        <p><b>Jotaro Kujo</b> <span class=" badge bg-primary">Admin</span></p>
                                        <p>Halo...</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner img-prev">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection