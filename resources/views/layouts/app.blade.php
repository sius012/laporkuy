<!doctype html>

@php
$whoactive = "";
@endphp
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield("title")</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.3.js"
        integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <link href="{{asset('css/mycss.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
    </script>
    <script src="{{asset('js/popper.js')}}"></script>
    <script src="{{asset('js/autokey.js')}}"></script>
    <script src="{{asset('js/sidebar.js')}}"></script>
    <script src="{{asset('js/laporandetail.js')}}"></script>
    <script src="{{asset('js/sweetalert2.all.js')}}"></script>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="{{asset('js/laporan.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"
        integrity="sha512-nnzkI2u2Dy6HMnzMIkh7CPd1KX445z38XIu4jG1jGw7x5tSL3VBjE44dY4ihMU1ijAQV930SPM12cCFrB18sVw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
    function showLaporan(id) {
        $(document).ready(function() {
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                url: "/getdetaillaporan",
                data: {
                    id: id,
                    state: ["respon_laporan", "change_log"],
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
                        $(".img-prev-cont").append(` <div class="carousel-item ${
                        i == 0 ? " active" : ""
                    }">
                        <img src="${
                            data["lampiran"][i]["image"]
                        }" class="d-block mx-auto my-auto" alt="..." style="width:100%; height: 100%">
                         </div>`);
                    }

                    //show petugas panel
                    let elementpetugas = data["petugas"].map(function(e) {
                        return `<li class="list-group-item">${
                        e["name"]
                    }${e["jabatan"] === "ketua" ? `<span class="badge badge-dark ml-1" style="background: red">Ketua</span>` : ""}</li>`;
                    });

                    $(".list-petugas").html(elementpetugas);

                    //isi halaman keterangan
                    $("#tab-pg1 p").html(data["keterangan"]);

                    //isi halaman admin

                    $("#tab-pg2 .respon-admin").html(data["respon_laporan"]["keterangan"]);
                    $("#tab-pg2 .nama-admin").html(data["admin"]["name"]+" (Admin)");

                    var date = new Date(data["respon_laporan"]["created_at"]);
                    var dateString = date.toString('YYYY-MM-dd');
                    $("#tab-pg2 .tgl-respon").html(dateString);

                    $("#tab-pg2 .send-message").val(data["_id"]);
                    //isi status

                    $(".btn-status").val(data["_id"]);
                    $(".btn-status").html(data["status"]);
                    $(".btn-status").attr("url", '{{url("/laporan/selesai")}}');
                    $(".btn-status").attr("token", "{{csrf_token()}}");

                    //isi log
                    let mylog = data["log"].map(function(e) {
                        return `<li class="list-group-item">${e["tanggal"]} <b> ${e["nama_pembuat"]} ${e["isi_keterangan"]} </b></li>`;
                    });
                    $(".list-log").html(mylog);


                    //filltanggapan
                    var tanggapan = data["respon_laporan"]["tanggapan"].map(function(e){
                        return `<div class="d-flex ${e["account_id"] == "{{Auth::user()->_id}}" ? "flex-row-reverse" : "flex-row"} bd-highlight ">
                                                        <div class="card p-2 dark ${e["account_id"] == "{{Auth::user()->_id}}" ? "card-message-me" : ""} m-3">
                                                            <b>${e["nama"]} ${e["account_id"] == "{{Auth::user()->_id}}" ?  "(Anda)": "( "+e["role"]+" )"}</b>
                                                            <span class="">${e["tanggapan"]}</span>
                                                            <span class="">${new Date(e["tanggal"]).toString('YYYY-MM-dd')}</span>
                                                        </div>
                                                    </div>`
                    });

                    $(".cont-tanggapan").html(tanggapan);
                },
                error: function(err) {
                    alert(err.responseText);
                },
            });
        });
    }

    function showdetaillaporan(data) {}

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
    </script>
    <style>
    * {
        font-family:
    }

    .sidebar-brand {
        color: white;
    }

    .sidebar {
        background: #1a1424;
        padding: 20px;
    }

    .sidebar a {
        color: white;
        border-radius: 50px;
    }

    .sidebar a:hover {
        background: #8d42f5;
        color: white !important;
        border-radius: 50px;
    }

    .nav-link-active{
        background-color: white;
        color: black !important;
    }
    </style>

    @stack("css")

</head>
@php
$bg = asset("/public/img/bg-user.svg");
@endphp

<body class="" style="overflow-x: hidden; background: url('{{$bg}}')">
    @include("sweetalert::alert")
    <div id="app">
        <div class="containers main-content " style="height: 100vh">
            <div class="row " style="height:100vh">
                <div class="col-2 sideb shadow p-0" style="height: auto">
                    @include('layouts.sidebar')
                </div>
                <div class="col-10 menu-content">
                    <div class="card  m-2 border-none shadow-sm p-3">
                        <div class="row ml-5">
                            <div class="col-4 ">
                                <h4>@yield("title")</h4>
                            </div>
                            <div class="col-8">

                                <div class="d-flex flex-row-reverse">
                                    <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-user-circle"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li>
                                            <a href="" class="nav-link p-1 mx-2"><i class="fa fa-user-circle fs-5"></i><span class="mx-3"><b>{{Auth::user()->name}} ({{ucwords(App\Models\User::myRole()[0])}})</b></span></a>
                                        </li>
                                        <li>
                                            <form action="{{route('logout')}}" method="post">
                                                @csrf
                                                <button class="btn btn-danger m-2" type="submit">Logout</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                    </div>
                    @yield("content")
                </div>
            </div>
            </nav>
            <div class="container">

            </div>

        </div>
    </div>
    </div>

    @yield('modalparts')




    <!-- JSKU -->
    @stack("scripts")
    </div>



</body>

</html>