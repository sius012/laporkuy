@extends('layouts.layout_user')
@section('css')
    <style>
        section {
            background-color: #431280;


            height: 600px;
        }



        .landing h3 {
            color: white;
            font-size: 40pt;
        }

        .landing .content {
            position: absolute;
            top: 75px;
        }

        .section-text {
            color: white;
            max-width: 500px;
            padding-bottom: 50px;
            font-size: 15pt;
        }

        .btn-buatlaporan {
            background: white;
            padding: 10px;
            font-weight: bold;
            border-radius: 50px;
        }

        .cont-text-buatlaporan h1 {
            font-size: 20pt
        }
    </style>
@endsection
@section('content')
    <section class="landing ">
        <div class="p-5 content">
            <h3 class="pb-5">Buat Kondisi Lebih Baik bersama <b>Laporkuy</b></h3>
            <p class="section-text">
                buat laporan pengajuan anda, apapun laporan anda kami terima
            </p>
            <button class="btn-buatlaporan">Buat Laporan</button>
        </div>
    </section>
    <div class="div">
        <div class="container" style="
            padding-top: 10px
            ">

            <div class="container">
                <div class="cont-text-buatlaporan">
                    <h1 class="align-center text-center m-4">Buat Laporan anda</h1>

                </div>

                <div class="card">
                    <div class="card-header">
                        Form Laporan Anda
                    </div>
                    <div class="card-body">
                        <form action="{{ route("masyarakat.laporan.buat") }}" method="POST">
                            @csrf
                        <div class="container">
                            <div class="row">
                                <div class="col-4">
                                    @include('masyarakat.laporanlampiran')
                                </div>
                                <div class="col-8">
                                    @include('masyarakat.buatlaporan')
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    
                           
                           
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection