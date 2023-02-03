<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Laporkuy: @yield("titletab")</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- stylesheet -->
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
    @notifyCss


    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="{{asset('js/laporan.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"
        integrity="sha512-nnzkI2u2Dy6HMnzMIkh7CPd1KX445z38XIu4jG1jGw7x5tSL3VBjE44dY4ihMU1ijAQV930SPM12cCFrB18sVw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    @stack("css")
    <style>
    *{
        font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI",
        Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue",
        sans-serif; 
    }
    navbar {
        background-color: red !important;
    }

    .navbar-brand {
        color: white !important;
        font-weight: bold;
    }

    .nav-link {
        color: white !important;
        font-size: 13pt;
        display: block;
        
        padding:10px 30px !important
    }

    .btn-laporkuy {
        background: #5a13ab;
        color: white;
    }

    .btn-tab:hover {
        background: whitesmoke;
    }

    .disabled {
        color: #d1d1d1;
    }

    .html{
        margin: ;
    }
    .btn-login{
        color: black;
        text-decoration: none;
        background: white ;
        padding: 10px;
        font-size: 12pt;
        font-weight: bold;
        border-radius: 30px;
    </style>
    
    @isset($latat)
    <style>
    .nav-link {
        color: white !important;
        
    }

    .actived-nav{
        font-weight: bold;
        background: #4e03fc;
        border-radius: 30px;
    }

    nav {
        box-shadow: 0px 0px 5px -2px black;
        background: #1a1424;
    }

    .navbar-brand {
        font-size: 20pt;
        color: white !important;
        font-weight: bold;
    }

    .card{
        border: none;   
        box-shadow: 0px 0px -2px black !important;
    }

  

@keyframes gradient-animation {
  0% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 0% 50%;
  }
    }
    </style>
    @endisset
</head>
@php
$bg = asset("/img/bg_user.svg");
@endphp

<body class="body-user" style="overflow-x: hidden;" >
    @stack("scripts")
    @include("sweetalert::alert")
    @include("layouts.navbar")
    <div class="containers" >
    @yield("title")
        @yield("content")
    </div>
</body>
<footer class="text-center p-3 mt-3 bg-light shadow z-index:100">
    <h6>Copyright © 2023 Dion Hermawan. All rights reserved.

    </h6>
</footer>

</html>