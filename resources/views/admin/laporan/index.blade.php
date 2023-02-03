@extends("layouts.app")
@section("title","Laporan")
@section("content")



<!-- Button trigger modal -->


<!-- Modal -->






<!-- <button type="button" class="btn btn-primary-lk my-1 mx-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Tambahkan data
</button> -->
<div class="container-fluid my-3">
    <form action="{{url('/admin/laporan')}}" id="filter-form">
        @csrf
    <div class="card p-2">
        <h5>Filter</h5>
        <div class="row p-3">
            <div class="col">
                <label for="">Pilih Status</label>
                <select id="" class="form-select" name="status">
                    <option value="">Pilih Status</option>
                    <option value="menunggu">Menunggu</option>
                    <option value="kepetugas">Ke Petugas</option>
                    <option value="ditunda">Ditunda</option>
                    <option value="diproses">Diproses</option>
                    <option value="selesai">Selesai</option>
                </select>
            </div>
            <div class="col">
                <b><label for="">Dari</label></b>
                <input type="date" class="form-control" name="dari" placeholder="dari">
            </div>
            <div class="col">
                <b><label for="">Sampai</label></b>
                <input type="date" class="form-control" name="sampai">
            </div>
            <div class="col">
               
            </div>
        </div>
        <div class="row">
            <div class="col">
            <button type="submit" class="btn btn-primary-lk">Filter</button>
            </div>
        </div>
    </div>
    </form>
</div>



<script>
$(document).ready(function() {
    $(document).ready(function() {
        $(document).delegate('.dropdown-item', 'click', function() {
            changeStatus($(this));
        });
    });


});
</script>


<div class="containers  mx-2 w-auto">
    <table class="table table-light table-hover px-2 mt-3" id="tabel-laporan">
        <thead class="s">
            <tr>
                <th>No</th>
                <th>Judul Laporan</th>
                <th>Pelapor</th>
                <th>Status</th>
                <th>Lokasi</th>
                <th>Assignment</th>
                <th>tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="myTable">
            @foreach($laporan as $i=> $lp)
            <tr id_laporan='{{$lp->_id}}'>
                <td>{{$i+1}}</td>
                <td>{{$lp->judul_laporan}}</td>
                <td>


                </td>
                <td><a href="">{{$lp->lokasi}}</a></td>
                <td>
                    @if($lp->petugas != null)
                    @php
                    $daftarpetugas = "";

                    foreach($lp["petugas"] as $i => $pg){
                    if($i == 0){
                    $daftarpetugas.="(";
                    }


                    $daftarpetugas .= $pg["name"];

                    if($pg["jabatan"] == "ketua"){
                    $daftarpetugas .= "(Ketua)";
                    }

                    if(!isset($lp["petugas"][$i+1])){
                    $daftarpetugas.=")";
                    }else{
                    $daftarpetugas .=",";
                    }


                    }

                    echo "<p>$daftarpetugas</p>";
                    @endphp
                    @else
                    <a class='td-laporan' id_laporan="{{$lp->_id}}" href="#" data-bs-toggle="modal"
                        data-bs-target="#modalAssigment" data-bs-whatever="@mdo"><i class="bi bi-pencil-fill"></i></a>
                    @endif


                </td>
                <td>{{date("Y-m-d", strtotime($lp->created_at))}}</td>
                <td>
                    <button class="btn  btn-success" class="laporan-row"><i class='bi bi-info'></i></button>
                    <button class="btn  btn-danger m-1" onclick="deleteLaporan('{{ $lp->_id }}')"><i
                            class='bi bi-trash'></i></button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection

@section("modalparts")
<script>
$(document).ready(function() {
    $(document).on("change", "input", function() {

    });
});
</script>

<form action="{{route('admin.laporan.buat')}}" method="post" enctype='multipart/form-data'>



    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Buat Laporan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                @csrf
                <div class="modal-body">

                    <div class="mb-3">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner img-prev-cont">

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
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Judul Laporan</label>
                        <input required type="text" class="form-control" id="recipient-name" name="judul_laporan">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Keterangan:</label>
                        <textarea class="form-control" id="message-text" name="keterangan"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Lokasi:</label>
                        <input required type="text" name="lokasi" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Lampiran:</label>
                        <input required type="file" class="form-control img-inp" multiple accept=".jpg"
                            name='lampiran[]'>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Tanggal:</label>
                        <input required type="date" class="form-control" name='tanggal'>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary-lk">Buat Laporan</button>
                </div>

            </div>
        </div>
    </div>
</form>





<!-- assignment -->
<script>
function initialize() {
    $("#petugas-list").hide();
}






//tampilkandetaillaporan




var counter = 0;

function showdetaillaporan(data) {

    $(".container-petugas").html("");
    for (var j = 0; j < data["petugas"].length; j++) {
        tambahRow(data, "fromdb", j);
    }

}

function tambahRow(te, mode = null, index = null) {
    $(".container-petugas").append(`
           <tr >
                          <td>
                            <a href="#" class='datarow' uid="${mode == "fromdb" ? te["petugas"][index]["_id"] : te.attr("uid")}">${mode == "fromdb" ? te["petugas"][index]["name"] : te.attr("nama_petugas")}</a>
                            <input  type='hidden' name='uid[]' value=${mode == "fromdb" ? te["petugas"][index]["_id"] : te.attr("uid")}>
                          </td>
                          <td>
                            <select class='form-control jabatan-drop' name="jabatan[]" value=${mode == "fromdb" ? te["petugas"][index]["jabatan"] : "anggota"}>
                              <option value='ketua'  ${mode == "fromdb" && te["petugas"][index]["jabatan"] == "ketua" ? "selected" : ""}>Ketua</option>
                              <option value='anggota'  ${mode == "fromdb" && te["petugas"][index]["jabatan"] == "anggota" ? "selected" : ""}>Anggota</option>
                            </select>
                          </td>
                          <td>
                            <button type="button" class='btn btn-danger hps-petugas' value="${mode == "fromdb" ? te["petugas"][index]["_id"] : te.attr("uid")}"><i class='bi bi-trash'></i></button>
                            ${mode == "fromdb" ? "<button class='btn btn-warning'><i class='bi bi-pen'></i></button>" : ""}
                          </td>
                        </tr>
           `);
}

$(document).ready(function() {
    initialize();


    $(document).delegate(
        ".hps-petugas", "click",
        function() {
            $(this).closest("tr").hide("slow").delay(10).queue(function() {
                $(this).remove();
            });;
        }
    )
    $(document).delegate(".td-laporan", "click", function(e) {
        var element = $(this);
        $("#id-laporan").val($(this).attr("id_laporan"));



        $.ajax({
            url: "/getdetaillaporan",

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: $(e.target).closest("a").attr("id_laporan"),
            },
            dataType: "json",
            type: "post",
            success: function(data) {
                if (element.attr("target") == "update") {
                    $(".btn-assigment").text("Perbarui");
                    $(".btn-assigment").val("update");
                    $(".btn-assigment").attr("name", "target");
                    $("#assigment-form").attr("action",
                    '{{url("/admin/perbaruipetugas")}}');
                } else {
                    $(".btn-assigment").text("Assigment");
                    $(".btn-assigment").val("");
                    $(".btn-assigment").removeAttr("name");
                    $("#assigment-form").attr("action", '{{url("/admin/tambahpetugas")}}');
                }

                showdetaillaporan(data);
            },
            error: function(err) {
                alert(err.responseText);
            }
        });
    });



    $("#assigment-field").keyup(function() {
        $("#petugas-list").hide();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/caripetugas",
            type: "post",
            data: {
                kw: $(this).val()
            },
            dataType: "json",
            success: function(data) {
                $("#petugas-list").show();
                var listuser = data["kw"];
                var list = listuser.map(function(e) {
                    return `<li><a href="#"  uid=${e["_id"]} class="add-petugas daftar-petugas" nama_petugas='${e["name"]}'> ${e["name"]} <i class='bi bi-plus'></i></a></li>`;
                });
                $("#petugas-list").html(list);
            },
            error: function(err) {
                alert(err.responseText);
            }
        });
    });

    $(document).on("click", ".add-petugas", function(event) {
        $("#petugas-list").hide();
        var theElement = $(event.target);


        var listLength = $(".container-petugas").children().length;



        if (listLength < 1) {
            tambahRow(theElement);

        } else {
            let sameval = false;
            $(".datarow").each(function(i) {
                console.log($(this).attr("uid"));
                if ($(event.target).attr('uid') == $(this).attr("uid")) {
                    sameval = true;
                }


            });
            if (!sameval) {
                tambahRow(theElement);
            } else {
                alert("Petugas Sudah ditambahkan");
            }

        }

    });





});
</script>
<form action="{{url('/admin/tambahpetugas')}}" method="post" id="assigment-form">
    <div class="modal fade" id="modalAssigment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambahkan Petugas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control " id="assigment-field">
                    <ul id="petugas-list">
                        <li>

                        </li>
                    </ul>

                </div>

                <div class="daftar-petugas container">

                    @csrf
                    <input type="hidden" id="id-laporan" name="idlaporan">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>Nama Petugas</th>
                                <th>Jabatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="container-petugas">

                        </tbody>
                    </table>

                    <div class="form-group">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Masukan Keterangan</label>
                            <textarea name="keterangan" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary-lk btn-assigment">Assigment</button>
                </div>
</form>


</div>
</div>

</div>
</form>







@endsection

@section("toast")
<div role="alert" aria-live="assertive" aria-atomic="true" class="toast" data-autohide="false">
    <div class="toast-header">
        <img src="..." class="rounded mr-2" alt="...">
        <strong class="mr-auto">Bootstrap</strong>
        <small>11 mins ago</small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body">
        Hello, world! This is a toast message.
    </div>
</div>

@endsection


@push("scripts")
<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    
    var tabel = $("#tabel-laporan").DataTable({
        dom: 'Bfrtip',
        ordering: true,
        serverSide: true,
        processing: true,
        ajax: {
            'url': "/laporan/get",
             data: function(d){
                
                d.status =  $("select[name=status]").val();
                d.dari =  $("input[name=dari]").val();
                d.sampai = $("input[name=sampai]").val();
            },
        },
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                width: '10px',
                orderable: false,
                searchable: false
            },
            {
                data: 'judul_laporan',
                name: "judul_laporan"
            },
            {
                data: 'pelapor.name',
                name: "pelapor.name"
            },
            {
                data: 'lokasi',
                name: "lokasi"
            },
            {
                data: 'status',
                name: "status"
            },
            {
                data: 'petugas',
                name: ""
            },
            {
                data: 'created_at',
                name: "created_at"
            },
            {
                data: 'aksi',
                name: "aksi"
            },
        ],
        dom: 'Bfrtip',
        buttons: [

        ]
    });

    $("#filter-form").submit(function(e){
        
        e.preventDefault();
        tabel.ajax.reload();
    });
});
</script>
<script>
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
<script src="{{ asset("js/dataTables.buttons.min.js") }}"></script>
<script src="{{ asset("js/buttons.bootstrap5.js") }}"></script>

@include("component.modallaporaninfo")
@endpush