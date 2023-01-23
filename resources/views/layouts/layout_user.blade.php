<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

      <!-- stylesheet -->
    <link href="{{asset('css/mycss.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="{{ asset('js/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('js/laporan.js') }}"></script>
   
    @notifyCss
   

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script type="text/javascript"
    src="https://maps.google.com/maps/api/js?key=Your_Google_Key=places&callback=initAutocomplete"></script>
    @yield("css")
    <style>
        navbar{
            background-color: red !important;
        }

        .navbar-brand{
            color: white !important;
            font-weight: bold;
        }

        .nav-link{
            color: white !important;
        }
    </style>

    @isset($darkmode)
       <style>
             .nav-link{
              color:     rgb(0, 0, 0) !important;
              }

              nav{
                box-shadow: 0px 0px 3px -2px black;
        
              }

              .navbar-brand{
            color: rgb(7, 7, 7) !important;
            font-weight: bold;
        }
       </style>
    @endisset
</head>
<body>
    @include("sweetalert::alert")
    @include("layouts.navbar")
    
    @yield("content")
</body>
</html>