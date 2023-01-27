
<div class="card m-3 shadow">
    <div class="card-header">
        <p class=" fs-6"><b>{{$lp["judul_laporan"]}} <span class="badge  fs-6 {{renderSpan($lp['status'])}}">{{ucwords($lp["status"])}}</span></b>
        </p>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-1"><img src="https://www.w3schools.com/howto/img_avatar.png" alt="" class="rounded-circle"
                    style="size: 200px;"></div>
            <div class="col-11">
                <div class="row">
                    <div class="col">
                        <b>
                            <p>Dionisius Setya hermawan (Anda)</p>
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

                    <div class="card p-3" readonly>{{$lp["keterangan"]}}</div>
                </div>
                <div class="container respon-admin-tab tab-cont">
                    <div class="card p-2">
                        <div class="container">
                            @if(isset($lp["respon_laporan"]))
                            <p>Pesan dari Admin: <b>{{$lp["admin"]["name"]}}</b></p>
                            <span class="fs-6 ">direspon pada </span>
                            <div class="badge bg-warning">{{date("Y-m-d")}}</div>
                            <div class="card p-2 m-3">{{$lp["respon_laporan"]["keterangan"]}}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="container changelog-tab tab-cont">
                    <div class="card p-2">
                        <div class="container">
                            @if($lp["admin"]!=null)
                            @if(isset($lp["log"]))
                            <p>ChangeLog: <b>{{$lp["admin"]["name"]}}</b></p>
                            <span class="fs-6 ">direspon pada </span>
                            <div class="badge bg-warning">{{date("Y-m-d")}}</div>
                            <div class="card p-2 m-3">{{$lp["respon_laporan"]["keterangan"]}}</div>
                            @endif
                            @endif
                        </div>
                    </div>
                </div>
                <div class="container result-tab tab-cont">
                    <div class="card p-2">
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
                            <div class="card ">
                                <div class="card-body">
                                    <p><b> Keterangan akhir</b></p>
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sint, ea?
                                    Earum
                                    repellendus consectetur praesentium vel optio cumque rem repellat?
                                    Dolore.
                                </div>


                                <div class="card-footer">
                                    <button class="btn btn-laporkuy" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal"><i class="fa fa-image "></i><span
                                            class="ml-1">Lampiran Akhir </span> </button>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="card-footer">
        <button class="btn btn-success lampiran-saya" data-bs-toggle="modal" data-bs-target="#exampleModal" value="{{$lp['_id']}}" ><i
                class="fa fa-image"></i></button>

    </div>

</div>