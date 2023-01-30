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
    <link href="{{asset('css/mycss.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="{{ asset('js/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('js/laporan.js') }}"></script>

    @notifyCss


    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script type="text/javascript"
        src="https://maps.google.com/maps/api/js?key=Your_Google_Key=places&callback=initAutocomplete"></script>
    @stack("css")
    <style>
    navbar {
        background-color: red !important;
    }

    .navbar-brand {
        color: white !important;
        font-weight: bold;
    }

    .nav-link {
        color: white !important;
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
    </style>

    @isset($latat)
    <style>
    .nav-link {
        color: #32064f !important;
    }

    nav {
        box-shadow: 0px 0px 3px -2px black;
        background: white;
    }

    .navbar-brand {
        color: rgb(7, 7, 7) !important;
        font-weight: bold;
    }

    .card{
        border: none;   
        box-shadow: 0px 0px -2px black !important;
    }

    .body-user {
 
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

<body class="body-user" style="overflow-x: hidden; ">
    @stack("scripts")
    @include("sweetalert::alert")
    @include("layouts.navbar")
    <div class="containers">
        <h3 class="m-3">@yield("title")</h3>
        @yield("content")
    </div>

</body>
<footer class="text-center p-3 mt-3 bg-light shadow z-index:100">
    <h6>Copyright © 2023 Dion Hermawan. All rights reserved.

    </h6>
</footer>

</html>