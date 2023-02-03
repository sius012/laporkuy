@extends('layouts.layout_user')
@push('css')
<style>
.landing {
    background-color: #431280 !important;


}



.landing h3 {
    color: white;
    font-size: 40pt;
}



.section-text {
    color: white;
    max-width: 500px;
    padding-bottom: 50px;
    font-size: 15pt;
}

.btn-buatlaporan {
    background: white;
    padding: 10px;
    font-weight: bold;
    border-radius: 50px;
}

.cont-text-buatlaporan h1 {
    font-size: 20pt
}
</style>
@endpush
@push("scripts")
<script>
function init() {
    $(".img-parts").hide();
    $(".content-parts").attr("class", "col-12 content-parts")
}

$(document).ready(function() {
    init();

});


function scrollto() {
    document.getElementById('bb').scrollIntoView({
        behavior: "smooth",
        block: "start",
        inline: "nearest"
    });
}
</script>



@endpush
@section('content')

    <div class="row landing p-5">
        <div class="col mt-5">
            <div class="m-5 content">
                <h3 class="pb-5">Buat Kondisi Lebih Baik bersama <b>Laporkuy</b></h3>
                <p class="section-text">
                    buat laporan pengajuan anda, apapun laporan anda kami terima
                </p>
                <button class="btn-buatlaporan" onclick="scrollto()"> Buat Laporan</button>
            </div>
        </div>
        <div class="col mt-5">
          <img class="m-0" src="{{asset('/img/lp_ilustration.svg')}}" alt="" style="width: 500px">
        </div>
    </div>
<div class="div">
    <div class="container" style="
            padding-top: 10px
            ">

        <div class="container">
            <div class="cont-text-buatlaporan">
                <h1 class="align-center text-center m-4">Buat Laporan anda</h1>

            </div>

            <div class="card">
                <div class="card-header">
                    Form Laporan Anda
                </div>
                <div class="card-body">
                    <form action="{{ route("masyarakat.laporan.buat") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="container">
                            <div class="row">
                                <div class="col-4 img-parts">
                                    @include('masyarakat.laporanlampiran')
                                </div>
                                <div class="col-8 content-parts" id="bb">
                                    @include('masyarakat.buatlaporan')
                                    <button type="submit" class="btn btn-primary">Buat Laporan</button>
                                </div>
                            </div>
                        </div>



                    </form>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection