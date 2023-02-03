@extends("layouts.layout_user")
@section("title")
    <h3 class='p-3'>Laporan Saya</h3>
@endsection
@section("titletab", "Laporan Saya")
@section("content")
@push("scripts")
<script>
$(document).ready(function() {

    function loadTab(target = null,parent = null) {
        var targetelm = target == null ? "keterangan-tab" : target;
        var theparent = parent == null ? $(".tab-cont") : parent.find(".tab-cont");
        theparent.each(function() {
            if ($(this).hasClass(targetelm) == false) {
                $(this).hide("fast");
            } else {
                $(this).show("fast");
            }
        });
    }

    loadTab();
    $(".button-tab").click(function() {
        var data_target = $(this).attr("lk-data-target");
        var parent = $(this).closest(".card-comp");
        loadTab($(this).attr("lk-data-target"),parent);

        
        $(this).parent().children(".button-tab").each(function(){
            if($(this).attr("lk-data-target") == data_target ){
                $(this).find("i").removeClass("disabled");
            }else{
                $(this).find("i").addClass("disabled");
            }
        });
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
<div class="containers m-3" style="height   : 100vh">

    <div class="row">

        <div class="col-6">
            <div class="card shadow p-3">
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
                            <button class="btn btn-primary-lk" value="laporan" name="filter">Cari</button>
                        </div>
                    </div>

                </form>
            </div>
            @foreach($laporan as $lp)
            @include("component.laporan_comp")
            @endforeach
        </div>
        <div class="col m-0">
            <div class="card shadow-lg" style="height: 100%">
                <div class="row p-3">
                    <h3><i class="fa fa-history"></i> Riwayat Laporan Saya</h3>
                </div>

                @foreach($laporan as $lp)
                <div class="card shadow-sm p-3 m-3">
                    <div class="row">
                        <div class="col-1"><i class="fa fa-list"></i></div>
                        <div class="col-3" data-bs-toggle="tooltip" title="{{$lp['judul_laporan']}}"><b >{{truncate($lp["judul_laporan"],30)}}</b></div>
                        <div class="col-3">{{truncate($lp["keterangan"],20)}}</div>
                        <div class="col-3"><span class="badge {{renderSpan($lp['status'])}}">{{$lp["status"]}}</span></div>
                        <div class="col-2"><span><i class="fa fa-calendar pl-3"></i>{{date('d-m-y')}}</span></div>
                    </div>
                </div>
                @endforeach
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