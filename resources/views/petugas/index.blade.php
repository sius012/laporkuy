@extends('layouts.app')
@section('content')
@section("title", "Tugas Saya")



@push('css')
<style>
.header-task {
    background: whitesmoke !important;
}

.header-task h3 {
    font-size: 10pt;
}


.task-container {
    height: 500px;
}

.nav-link {
    color: black !important;
}

.card-task:hover {
    outline: 0px solid transparent;
    border: 5px solid #999999;
    -webkit-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
}
</style>
@endpush
<h5 class="m-0 mx-5 my-4">Daftar Tugas</h5>
<div class="contasiner mx-5">



    <div class="row">

        <div class="col-3  ">
            <h4 class="badge bg-secondary">Laporan Masuk</h4>
            <div class="container task-container">
                @foreach ($laporan as $lp)
                @php
                $data = ['mainContent' => $lp];
                @endphp
                @include('component.card_task', $data)
                @endforeach
            </div>
        </div>
        <div class="col-3 ">
            <h4 class="badge bg-warning"> Laporan Diproses</h4>
            <div class="task-container">
                @foreach ($diproses as $lp)
                @php
                $data = ['mainContent' => $lp];
                @endphp
                @include('component.card_task', $data)
                @endforeach
            </div>
        </div>
        <div class="col-3  ">
            <h4 class="badge bg-danger">Laporan Tertunda</h4>
            <div class="task-container">
                @foreach ($tindak_ulang as $lp)
                @php
                $data = ['mainContent' => $lp];
                @endphp
                @include('component.card_task', $data)
                @endforeach
            </div>
        </div>
        <div class=" col-3 ">
            <h4 class=" badge bg-primary">Laporan Selesai</h4>
            <div class="task-container">
                @foreach ($selesai as $lp)
                @php
                $data = ['mainContent' => $lp];
                @endphp
                @include('component.card_task', $data)
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection



@section('modalparts')
<script>
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
</script>
@include("component.modallaporaninfo")

<div class="modal" tabindex="-1" id="modal-selesai">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection