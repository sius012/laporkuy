@extends("layouts.layout_user")
@section("content")
<script>
$(document).ready(function() {
    $(".activator-edit").click(function() {
        //  alert($(this).parent().children("input").attr("readonly"));
        if ($(this).parent().children("input").attr("readonly") != undefined) {
            $(this).parent().children("input").removeAttr("readonly");
            $(this).parent().children("input").removeAttr("disabled");
        } else {
            $(this).parent().children("input").attr("readonly", "readonly");
            $(this).parent().children("input").attr("disabled", "disabled");
        }

        if ($(this).parent().children("input").attr("id") == "nik-akun") {
            $(this).parent().children("input").val("");
        }

    });

});
</script>
<div class="container">
    <div class="card">
        <div class="row">
            <div class="col-4 d-flex">
                <img src="data:image/jpeg;base64,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"
                    class="rounded-circle my-auto mx-auto" alt="" style="width: 250px; height: 250px">
                <button class="btn btn-primary position-absolute" style="top: 100px; left: 100px"><i
                        class="fa fa-image"></i>
                </button>
            </div>
            <div class="col-8 p-5">
                <form action="{{url('/editaccount')}}" method="post">
                    @csrf
                    <div class="form-group ">
                        <div class="row">
                            <label for="name-akun">Nama</label>
                            <div class="col d-flex">
                                <input type="text" id="name-akun" class="form-control" value="{{$user['name']}}"
                                    name="name">
                                <a href="#" class="p-2 activator-edit"><i class="fa fa-pencil"></i></a>


                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="email-akun">Email</label>
                            <div class="col d-flex">
                                <input type="email" id="email-akun" class="form-control" value="{{$user['email']}}"
                                    name="email" readonly> <a href="#" class="p-2 activator-edit"><i
                                        class="fa fa-pencil"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="nik-akun">NIK</label>
                            <div class="col d-flex">
                                <input type="text" id="nik-akun" class="form-control" name="nik"
                                    value="@if(isset($user['nik'])){{$user['nik']}} @else{{'belum dilengkapi'}} @endif"
                                    readonly disabled>
                                <a href="#" class="p-2 activator-edit disable">Lengkapi</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="alamat-akun">Alamat</label>
                            <div class="col d-flex">
                                <input type="text" id="alamat-akun" name="alamat" class="form-control"
                                    value="{{$user['alamat']}}" readonly><a href="#" class="p-2 activator-edit"><i
                                        class="fa fa-pencil"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="name-akun">Password</label>
                            <div class="col d-flex">
                                <input type="password" name="password" id="password-akun" class="form-control"
                                    value="12345678" readonly disabled><a href="#" class="p-2 activator-edit"><i
                                        class="fa fa-pencil"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="form mt-4">
                        <button class="btn btn-primary" type="submit">Perbarui</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection