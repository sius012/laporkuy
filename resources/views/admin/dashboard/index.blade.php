@php
    $whoactive = "tes";
@endphp
@extends('layouts.app')

@section('title', 'Dashboard')
@section('content')
@push('css')
<style>
.order-card {
    color: #fff;
}

.bg-c-blue {
    background: linear-gradient(45deg, #4099ff, #73b4ff);
}

.bg-c-green {
    background: linear-gradient(45deg, #2ed8b6, #59e0c5);
}

.bg-c-yellow {
    background: linear-gradient(45deg, #FFB64D, #ffcb80);
}

.bg-c-pink {
    background: linear-gradient(45deg, #FF5370, #ff869a);
}


.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
    box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
    border: none;
    margin-bottom: 30px;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

.card .card-block {
    padding: 25px;
}

.order-card i {
    font-size: 26px;
}

.f-left {
    float: left;
}

.f-right {
    float: right;
}
</style>
@endpush

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="containers mt-5">
    <div class="card p-4">
        <h5 class="mb-3">STATUS LAPORAN</h5>
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-blue order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Laporan Menunggu</h6>
                        <h2 class="text-right  m-3"><span>{{$laporan_menunggu}}</span></h2>
                        <p class="m-b-0">menunggu<span class="f-right">351</span></p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-yellow  order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Diserahkan Ke Petugas</h6>
                        <h2 class="text-right  m-3"><span>{{$laporan_kepetugas}}</span></h2>
                        <p class="m-b-0">Diproses<span class="f-right">351</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-yellow  order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">laporan Diproses</h6>
                        <h2 class="text-right  m-3"><span>{{$laporan_diproses}}</span></h2>
                        <p class="m-b-0">Diproses<span class="f-right">351</span></p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-xl-3">
                <div class="card  bg-c-green order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Laporan Selesai</h6>
                        <h2 class="text-right m-3"><span>{{$laporan_selesai}}</span>
                        </h2>
                        <p class="m-b-0">selesai<span class="f-right">351</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col-3">
                <div class="card p-3 ">
                <h5 class="mb-3">PENGGUNA</h5>
                <div class="card bg-c-green order-card">
                <div class="row">
                    <div class="col-8 p-3"><h4 class="m-2"><i class="fa fa-circle-user"></i> Admin</h4></div>
                    <div class="col-4 p-4"><h3>{{$jumlahadmin}}</h3></div>
                </div>
                </div>
                <div class="card bg-c-green order-card">
                <div class="row">
                    <div class="col-8 p-3"><h4 class="m-2"><i class="fa fa-circle-user"></i> Petugas</h4></div>
                    <div class="col-4 p-4"><h3>{{$jumlahpetugas}}</h3></div>
                </div>
                </div>
                <div class="card bg-c-green order-card">
                <div class="row">
                    <div class="col-8 p-3"><h4 class="m-2"><i class="fa fa-circle-user"></i> Masyarakat</h4></div>
                    <div class="col-4 p-4"><h3>{{$jumlahmasyarakat}}</h3></div>
                </div>
                </div>
                
                </div>
            </div>
        </div>
</div>
<component :is="'script'">


    var ctx = document.getElementById("cv").getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
    labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
    datasets: [{
    label: '# of Votes',
    data: [12, 19, 3, 23, 2, 3],
    backgroundColor: [
    'rgba(255, 99, 132, 0.2)',
    'rgba(54, 162, 235, 0.2)',
    'rgba(255, 206, 86, 0.2)',
    'rgba(75, 192, 192, 0.2)',
    'rgba(153, 102, 255, 0.2)',
    'rgba(255, 159, 64, 0.2)'
    ],
    borderColor: [
    'rgba(255,99,132,1)',
    'rgba(54, 162, 235, 1)',
    'rgba(255, 206, 86, 1)',
    'rgba(75, 192, 192, 1)',
    'rgba(153, 102, 255, 1)',
    'rgba(255, 159, 64, 1)'
    ],
    borderWidth: 1
    }]
    },
    options: {
    scales: {
    yAxes: [{
    ticks: {
    beginAtZero: true
    }
    }]
    }
    }
    });
</component>
@endsection