<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script
        src="https://code.jquery.com/jquery-3.6.3.js"
        integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>
      <link href="{{asset('css/mycss.css')}}" rel="stylesheet">
     
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>
    <script src="{{asset('js/popper.js')}}"></script>
    <script src="{{asset('js/autokey.js')}}"></script>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="{{asset('js/laporan.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js" integrity="sha512-nnzkI2u2Dy6HMnzMIkh7CPd1KX445z38XIu4jG1jGw7x5tSL3VBjE44dY4ihMU1ijAQV930SPM12cCFrB18sVw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   <script>
    
    </script>
    <style>

        *{
            font-family: 
        }
        .sidebar a:hover{
            background: #8d42f5;
            color: white !important;
            border-radius: 50px
        }

        
    </style>

    @stack("css")
 
</head>
@php 
$bg = asset("/public/img/bg-user.svg");
@endphp
<body class="" style="overflow-x: hidden; background: url('{{$bg}}')"> 
    @include("sweetalert::alert")
    <div id="app">
       <div class="containers " style="height: 100vh">
        <div class="row" style="height:100vh">
            <div class="col-2 sideb shadow" style="height: auto; background-color: white">
                @include('layouts.sidebar')
            </div>
            <div class="col-10">
                <div class="card p-2 px-3 shadow m-2">
                <h3>@yield("title")</h3>
                </div>
            <div class="container">
                
            </div>
            @yield('content')
            </div>
        </div>
       </div>

       @yield('modalparts')
        



       <!-- JSKU -->
        @stack("scripts")
    </div>
</body>
</html>
