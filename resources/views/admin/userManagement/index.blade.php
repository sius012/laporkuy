@section('title', 'Kelola Pengguna')
@extends('layouts.app')
@push("css")
<style>
.tab {
    overflow: hidden;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border-top: none;
}
</style>
@endpush
@section('content')
<script>
function setmodaluser(data){
    $("#namapengguna").val(data["name"]);
    $("#emailpengguna").val(data["email"]);
    $("#alamatpengguna").val(data["alamat"]);
    $("#passwordpengguna").val(12345678);
    $("#rolepengguna").children("option").each(function(){
        if($(this).val()==data["rolesdata"][0]["name"]){
            $(this).attr("selected", "selected");
        }else{
            $(this).removeAttr("selected");
        }
    });


    //buat semua inputan modal menjadi readonly
    $("#tambah-user-modal").find("input").each(function(){
        $(this).attr("readonly","readonly");
    });

    //update action form
    $("#tambah-user-modal").find("form").attr("action","{{url('admin/editroleuser')}}");
   

    $(".perbarui-pengguna").text("Perbarui");
    $(".perbarui-pengguna").val(data["_id"]);
    $(".perbarui-pengguna").attr("name","id");
    
}

function resetmodaluser(){




    //buat semua inputan modal menjadi readonly
    $("#tambah-user-modal").find("input").each(function(){
        $(this).removeAttr("readonly");
        $(this).val("");
    });

     //update action form
     $("#tambah-user-modal").find("form").attr("action","{{url('admin/tambahuser')}}");

    $(".perbarui-pengguna").text("Tambah Pengguna")
    
}
$(document).ready(function() {
    $(".btn-edit-user").click(function(){
       
        $.ajax({
            url: "/getuserdata",

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: $(this).val(),
            },
            dataType: "json",
            type: "post",
            success: function(data) {
                setmodaluser(data);
            }, 
            error: function(err) {
                alert(err.responseText);
            }
        });


    });

   
    function loadTab(target = null) {
        var targetelm = target == null ? "pengguna-cont" : target;

        $(".tab-cont").each(function() {
            if ($(this).attr("id") != targetelm) {
                $(this).hide("fast");
                $("[data-target=" +
                    targetelm +
                    "]").removeClass("active");
            } else {
                $(this).show("fast");
                $("[data-target=" +
                    targetelm +
                    "]").toggleClass("active")
            }
        });
    }

    loadTab();
    $(".button-tab").click(function() {
        loadTab($(this).attr("data-target"));

    });

    //
   


    $(".tambah-modal").click(function(){
        resetmodaluser();
    });



    $(".btn-edit-role").click(function(){
        $("#namarole").val($(this).attr("value2"));
    }); 

    

});
</script>

<div class="containers m-3">



    <div class="mb-3">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active button-tab" aria-current="page" href="#"
                    data-target="pengguna-cont">Pengguna</a>
            </li>
            <li class="nav-item">
                <a class="nav-link button-tab" href="#" data-target="role-cont">Role</a>
            </li>
        </ul>
    </div>

    <!-- container content -->
    <div class="tab-cont" id="pengguna-cont">
        <button type="button" class="btn btn-primary-lk tambah-modal" data-bs-toggle="modal" data-bs-target="#tambah-user-modal">
            Tambah Pengguna
        </button>
        <table class="table table-stripped" id="tabel-pengguna">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pengguna</th>
                    <th>email</th>
                    <th>Role</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datauser as $i => $du)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $du['name'] }}</td>
                    <td>{{ $du['email'] }}</td>
                    <td>{{ $du['rolesdata'][0]['name'] }}</td>
                    <td>
                        <button class='btn btn-danger pr-4 btn-delete-user' onclick="check(event)" value="{{ $du['_id'] }}" data-bs-toggle="modal" data-bs-target="">
                            <i class="fa fa-trash"></i>
                        </button>
                        <button class=' m-1  my-0 btn btn-warning pr-4 btn-edit-user' onclick="" value="{{ $du['_id'] }}" data-bs-toggle="modal" data-bs-target="#tambah-user-modal">
                            <i class="fa fa-edit"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <script>
    function check(data) {
        $(document).ready(function() {
            var dataelement = $(data.target);
            var realelement;
            if (dataelement.is("button")) {
                realelement = dataelement;
            } else {
                realelement = dataelement.closest("button");
            }

            showDetailInfo(realelement.val());


        });
    }


    function showDetailInfo(id) {
        $(document).ready(function() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/admin/getuserdetail",
                type: "post",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) {
                    showModal(data);
                },
                error: function(err) {
                    alert(err.responseText);
                }
            });
        });
    }


    function showModal(data) {
        $(document).ready(function() {
            console.log(data);
            $("#modal-info-user").modal("show");


            //updateEvent
            $(".modal-title").text(data["name"]);
            $(".modal-nama-akun").text(data["name"]);
            $(".modal-email-akun").text(data["email"]);
            $(".modal-alamat-akun").text(data["alamat"] == undefined ? "" : data["alamat"]);
            $(".modal-role-akun").text(data["rolesdata"][0]["name"]);



            //Case Handler
            if (data["roles"][0]["name"] == "admin") {
                $.get("")
            }

        });

    }
    </script>



    <div class="modal" tabindex="-1" id="modal-info-user">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col col-5">
                                <img src="https://www.pphfoundation.ca/wp-content/uploads/2018/05/default-avatar.png"
                                    class="rounded-circle" style="width: 200px;" alt="Avatar" />
                            </div>
                            <div class="col col-7">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Nama:</th>
                                            <td class="modal-nama-akun p-3">....</td>
                                        </tr>
                                        <tr>
                                            <th>Email:</th>
                                            <td class="modal-email-akun p-3">....</td>
                                        </tr>
                                        <tr>
                                            <th>Alamat:</th>
                                            <td class="modal-alamat-akun p-3">....</td>
                                        </tr>
                                        <tr>
                                            <th>Role:</th>
                                            <td class="modal-role-akun p-3">....</td>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="div" id="case-handler">
                                    <div class="container">
                                        <table class="table">
                                            <tr>
                                                <td align="center" colspan=2><b>Data Penanganan Laporan</b></td>
                                            </tr>
                                            <tr>
                                                <td align="center"><b>Diproses</b></td>
                                                <td align="center"><b>Selesai<b></td>
                                            </tr>
                                        </table>
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
</div>
<div class="tab-cont" id="role-cont">
    <button type="button" class="btn btn-primary-lk m-3" data-bs-toggle="modal" data-bs-target="#tambah-role-modal">
        Buat Role
    </button>
    <div class="containers">
        <table class="table p-3" id="tabel-role">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Role Id</th>
                    <th>Role Name</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($role as $i => $roles)
                <tr>
                    <td>{{$i+1}}</td>
                    <td>{{$roles->_id}}</td>
                    <td>{{$roles->name}}</td>
                    <td>
                        <button class="btn btn-warning btn-edit-role" value="{{$roles->_id}}" value2="{{$roles->name}}"
                        data-bs-toggle = "modal"
                        data-bs-target = "#tambah-role-modal"
                        ><i class="fa fa-edit"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('modalparts')
@include('admin.usermanagement.tambahuser')
@include('admin.usermanagement.tambahrole')
@endsection

@push("scripts")
<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js"></script>
<script>
$(document).ready(function() {

    $("#tabel-pengguna").DataTable({
        buttons: []
    });

    $("#tabel-role").DataTable({
        buttons: []
    });
});
</script>
<script src="{{ asset("js/dataTables.buttons.min.js") }}"></script>
<script src="{{ asset("js/buttons.bootstrap5.js") }}"></script>
@endpush