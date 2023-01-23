@section('title', 'Kelola Pengguna')
@extends('layouts.app')
@section('content')


    <div class="container">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah-user-modal">
            Tambah User Modal
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
                            <button class='btn btn-success' onclick="check(event)" value="{{ $du['_id'] }}">
                                <i class="bi bi-info"></i>
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
@endsection

@section('modalparts')
    @include('admin.usermanagement.tambahuser')
@endsection

@push("scripts")
<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
      
        $("#tabel-pengguna").DataTable( {
            buttons: []
        });
    });
</script>
<script src="{{ asset("js/dataTables.buttons.min.js") }}"></script>
<script src="{{ asset("js/buttons.bootstrap5.js") }}"></script>
@endpush
