@extends("layouts.app")
@section("title", "Unduh Laporan")
@section("content")
<div class="container-fluid">
    <div class="card">
        <form action="{{url('/admin/unduhlaporan')}}" method="post">
            @csrf
            <div class="row">
                <h6 class="m-3">Unduh laporan</h6>
            </div>
            <div class="row p-3">
                <div class="col">
                    <label for="">Pilih Status</label>
                    <select id="" class="form-select" name="status">
                        <option value="">Pilih Status</option>
                        <option value="menunggu">Pilih Status</option>
                        <option value="kepetugas">Ke Petugas</option>
                        <option value="ditunda">Ditunda</option>
                        <option value="diproses">Diproses</option>
                        <option value="selesai">Selesai</option>
                    </select>
                </div>
                <div class="col">
                    <b><label for="">Dari</label></b>
                    <input type="date" class="form-control" name="dari">
                </div>
                <div class="col">
                    <b><label for="">Sampai</label></b>
                    <input type="date" class="form-control" name="sampai">
                </div>
                <div class="col">
                    <b> <label>Tampilkan petugas</label></b>
                    <input type="checkbox" class="m-3 form-check-input text-bottom d-block" name="petugas">
                </div>
            </div>
            <div class="row">
                <div class="col ">
                    <button class="btn btn-primary-lk m-2"><i class="fa fa-download m-2 d-inline"></i>Unduh</button>
                </div>

            </div>
    </div>
    </form>
</div>
</div>

@endsection