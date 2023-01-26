@extends('layouts.layout_petugas')
@section('content')




@section('css')
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
@endsection
<h3 class="m-0 mx-5 my-4">Daftar Tugas</h3>
<div class="contasiner mx-5">


    <div class="row border">
        <div class="col-3 bg-light p-3 header-task ">
            <h3><b>Laporan Masuk</b></h3>
        </div>
        <div class="col-3 bg-light p-3 header-task ">
            <h3><b> Sedang Dikerjakan</b></h3>
        </div>
        <div class="col-3 bg-light p-3 header-task ">
            <h3><b>Tindak Ulang</b></h3>
        </div>
        <div class="col-3 bg-light p-3 header-task ">
            <h3><b>Selesai</b></h3>
        </div>
    </div>
    <div class="row">

        <div class="col-3 border bg-light task-container">
            @foreach ($laporan as $lp)
                @php
                    $data = ['mainContent' => $lp];
                @endphp
                @include('component.card_task', $data)
            @endforeach
        </div>
        <div class="col-3 border bg-light">
            @foreach ($diproses as $lp)
                @php
                    $data = ['mainContent' => $lp];
                @endphp
                @include('component.card_task', $data)
            @endforeach
        </div>
        <div class="col-3 border bg-light">
            @foreach ($diproses as $lp)
                @php
                    $data = ['mainContent' => $lp];
                @endphp
                @include('component.card_task', $data)
            @endforeach
        </div>
        <div class="col-3 border bg-light">
            @foreach ($selesai as $lp)
                @php
                    $data = ['mainContent' => $lp];
                @endphp
                @include('component.card_task', $data)
            @endforeach
        </div>
    </div>
</div>

@endsection



@section('modalParts')
<script>
    $(document).ready(function(e) {
        initialize();
    });

    $(document).ready(function() {

        $('#tuning-options li .dropdown-item-petugas').click(function() {
            changeStatus($(this), function(){
                alert("tes");
            });
        });

    });

    function showLaporan(id) {
        $("document").ready(function() {


            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/getdetaillaporan",
                data: {
                    id: id,
                    state: ["respon_laporan", "change_log"]
                },
                type: "post",
                dataType: "json",
                success: function(data) {
                    console.log(data);

                    $(".modal-judul-laporan").text(data["judul_laporan"]);
                    $(".modal-isi-laporan").text(data["keterangan"]);
                    $(".modal-tanggal-laporan").text(data["created_at"]);
                    $(".modal-status-laporan").text(data["status"]);

                    //show gambar

                    for (let i = 0; i < data["lampiran"].length; i++) {

                        $(".img-prev-cont").append(` <div class="carousel-item ${i == 0 ? " active" : ""}">
                        <img src="${data["lampiran"][i]["image"]}" class="d-block mx-auto my-auto" alt="..." style="width:100%; height: 100%">
                         </div>`);
                    }



                    //show petugas panel
                    let elementpetugas = data["petugas"].map(function(e) {

                        return `<li class="list-group-item">${e["name"]}${e["jabatan"] === "ketua" ? `<span class="badge badge-dark ml-1" style="background: red">Ketua</span>` : ""}</li>`;
                    });

                    $(".list-petugas").html(elementpetugas);


                    //isi halaman keterangan
                    $("#tab-pg1 p").html(data["keterangan"]);

                    //isi halaman admin

                    $("#tab-pg2 p").html(data["respon_laporan"]["keterangan"]);


                    //isi log
                    let mylog = data["log"].map(function(e) {
                        return `<li class="list-group-item">${e["tanggal"]} <b> ${e["nama_pembuat"]} ${e["isi_keterangan"]} </b></li>`;
                    });
                    $(".list-log").html(mylog);


                },
                error: function(err) {
                    alert(err.responseText);
                }
            });



        });
    }

    function showdetaillaporan(data) {

    }


    $(document).ready(function() {
        $(".tab-open").click(function() {
            showDetail($(this));
        });
    });




    function showDetail(event) {

        $(document).ready(function() {
            initialize(event.attr("data-target"));
        });

    }

    //ubahtab



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
<div class="modal fade" id="modal-laporan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Laporan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="containers">
                    <div class="row">
                        <div class="col-4">
                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner img-prev-cont my-auto">

                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-8">
                            <table class="table">
                                <tr>
                                    <th>Judul Laporan</th>
                                    <td>
                                        <p class="modal-judul-laporan"></p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Tanggal</th>
                                    <td>
                                        <p class="modal-tanggal-laporan"></p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        @include("component.status")
                                    </td>
                                </tr>
                            </table>
                            <div class="container ">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link p-2 tab-open" aria-current="page" href="#"
                                            data-target="#tab-pg1"><b> Keterangan</b></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link p-2 tab-open" aria-current="page" href="#"
                                            data-target="#tab-pg2"><b> Keterangan Admin</b></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link p-2 tab-open" aria-current="page" href="#"
                                            data-target="#tab-pg3"><b>Petugas</b></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link p-2 tab-open" aria-current="page" href="#"
                                            data-target="#tab-pg4"><b>Log</b></a>
                                    </li>
                                </ul>
                                <div class="cont-detail">
                                    <div class="container tab-cont" style="height: 200px" id="tab-pg1">
                                        <p></p>
                                    </div>
                                    <div class="container tab-cont" style="height: 200px" id="tab-pg2">
                                        <p></p>
                                    </div>
                                    <div class="container tab-cont" style="height: 200px" id="tab-pg3">
                                        <ul class="list-group list-petugas  m-3">
                                            <li class="list-group-item">An item</li>

                                        </ul>
                                    </div>
                                    <div class="container tab-cont" id="tab-pg4" style="height: 200px">
                                        <ul class="list-group list-log  m-3">
                                            <li class="list-group-item">An item</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

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
