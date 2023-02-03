<div class="card m-3 shadow card-comp">
    <div class="card-header header-task">
        <span class=" fs-6"><b>{{$lp["judul_laporan"]}} <span
                    class="badge  fs-6 {{renderSpan($lp['status'])}}">{{ucwords($lp["status"])}}</span></b>
        </span>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-1"><img
                    src="{{auth()->user()->foto_profil != null ?  auth()->user()->foto_profil : 'https://www.w3schools.com/howto/img_avatar.png'}}"
                    alt="" class="rounded-circle" style="size: 200px;"></div>
            <div class="col-11">
                <div class="row">
                    <div class="col">
                        <b>
                            <p>{{auth()->user()->name}} (Anda)</p>
                        </b>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p class="fs-6">Membuat Laporan pada
                            <span class="badge bg-secondary">{{date("d-m-Y", strtotime($lp["tanggal"]))}}</span>
                        </p>
                    </div>
                </div>

            </div>
        </div>
        <div class="row mb-3">
            <div class="col-4">
                <div class="row">
                    <div class="col">
                        <button class="btn btn-tab button-tab" lk-data-target="keterangan-tab"><i
                                class="fa fa-sticky-note"></i></button>
                        <button class="btn btn-tab button-tab" lk-data-target="respon-admin-tab"><i
                                class="fa fa-reply disabled"></i>
                        </button>
                        <button class="btn btn-tab button-tab" lk-data-target="changelog-tab"><i
                                class="fa fa-history disabled"></i>
                        </button>
                        <button class="btn btn-tab button-tab" lk-data-target="result-tab"><i
                                class="fa fa-check disabled"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-12">
                <div class="container keterangan-tab tab-cont">

                    <div class="card p-3 shadow" readonly>
                        <p><b>Keterangan</b></p>
                        {{$lp["keterangan"]}}
                    </div>
                </div>
                <div class="container respon-admin-tab tab-cont">
                    <div class="card p-3 shadow">
                        <p><b>Respon Admin dan Petugas</b></p>
                        <div class="container">
                            @if(isset($lp["respon_laporan"]))
                            <div class="respon-section" style="height: 200px; overflow-y: scroll">
                                <div class="d-flex flex-row bd-highlight mb-3 ">
                                    <div class="contaner">
                                        <div class="card p-3 dark shadow border">
                                            <b class="nama-admin">{{$lp["admin"]["name"]}} (Admin)</b>
                                            <p class="respon-admin">{{$lp["respon_laporan"]["keterangan"]}}

                                        </div>
                                        <span class="tgl-respon"></span>
                                    </div>

                                </div>
                                <div class="cont-tanggapan">
                                    @if(isset($lp["respon_laporan"]["tanggapan"]))
                                    @foreach($lp["respon_laporan"]["tanggapan"] as $lpt)
                                    <div class="d-flex @if(Auth::user()->id == $lpt['account_id']) flex-row-reverse @else flex-row @endif bd-highlight">
                                        <div class="card m-3 shadow border p-3 dark @if(Auth::user()->id == $lpt['account_id']) card-message-me @endif ">
                                            <b>{{$lpt["nama"]}}</b>
                                            <p class="">{{$lpt["tanggapan"]}}</p>
                                            <p class="">{{$lpt["tanggal"]}}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>

                            </div>
                            @if(isset($lp["respon_laporan"]["tanggapan"]))
                            <div class="card px-3 py-2">
                                            <div class="row">
                                                <div class="col-10">
                                                    <input type="text" class="form-control field-message-sender" id="">
                                                </div>
                                                <div class="col-2">
                                                    <button class="btn btn-primary-lk send-message" value="{{$lp['_id']}}"><i
                                                            class="fa fa-paper-plane"></i></button>
                                                </div>
                                            </div>
                                </div>
                            @endif
                            @else
                            <h5 class="disabled">Laporan Belum direspon</h5>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="container changelog-tab tab-cont">
                    <div class="card p-3 shadow">
                        <div class="container">
                            <p><b>Log Laporan</b></p>
                            @if(isset($lp["log"]))

                            <ul class="list-group">
                                @foreach($lp["log"] as $lg)
                                <li class="list-group-item"><span>{{$lg["tanggal"]}}</span>
                                    <span><b>{{$lg["nama_pembuat"]}}</b></span> <span>{{$lg["isi_keterangan"]}}</span>
                                </li>
                                @endforeach
                            </ul>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="container result-tab tab-cont">
                    <div class="card p-3 shadow">
                        <p><b>Pasca laporan</b></p>
                        @if($lp['petugas'] != null)
                        <div class="container">
                            <ul class="list-group " style="font-size: 8pt">

                                <li class="list-group-item active" aria-current="true">Daftar Petugas</li>
                                @foreach($lp["petugas"] as $pt)
                                <li class="list-group-item">{{$pt["name"]}}</li>
                                @endforeach


                            </ul>

                        </div>
                        @endif
                        <div class="container m-3">
                            <div class="card border">
                                <div class="card-body">
                                    <p><b> Keterangan akhir</b></p>
                                    @if(isset($lp["respon_laporan"]["keterangan_petugas"]))
                                    <p>{{$lp["respon_laporan"]["keterangan_petugas"]}}</p>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="card-footer">
        <button class="btn btn-success lampiran-saya" data-bs-toggle="modal" data-bs-target="#exampleModal"
            value="{{$lp['_id']}}"><i class="fa fa-image" ></i></button>

    </div>

</div>