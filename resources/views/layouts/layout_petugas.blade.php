<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
      <!-- stylesheet -->
     
    <link href="{{asset('css/mycss.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 
    @notifyCss

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script type="text/javascript"
    src="https://maps.google.com/maps/api/js?key=Your_Google_Key=places&callback=initAutocomplete"></script>
    <script src="{{asset('js/autokey.js') }}"></script>
    <script src="{{asset('js/laporan.js') }}"></script>
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
            color: rgb(0, 0, 0) !important;
        }
    </style>
</head>
<body style="background: whitesmoke">
    @include("layouts.navbar2")
    
    @yield("content")
    @yield("modalParts")
</body>
</html>