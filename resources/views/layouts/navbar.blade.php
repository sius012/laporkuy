<nav class="navbar  navbar-expand-lg navbar-light  @if(isset($latat)) @if($latat==false)  position-absolute @endif @else position-absolute  @endif"
    style="width: 100%">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#">LaporKuy</a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex">
                <li class="nav-item">

                    <a class="nav-link @if(url()->current() == url('/') ) actived-nav @endif" aria-current="page"
                        href="{{url('/')}}"> <i class="bi bi-house-door-fill"></i> Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(url()->current() == url('laporansaya') ) actived-nav @endif "
                        href="{{url('laporansaya')}}"> <i class="bi bi-card-text"></i> Laporan Saya</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(url()->current() == url('/kontakadmin') ) actived-nav @endif " href="#"><i
                            class="bi bi-rocket mx-3"></i>Jelajahi Laporan</a>
                </li>
            </ul>
            <div class="d-flex">
                @if(Auth::check())
                <div class="dropdown">
                    <button class="btn btn-primary-lk dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{Auth::user()->name}}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{url('/pengaturanakun')}}"><i
                                    class="fa fa-circle-user"></i><b class="mx-3">Pengaturan Akun</b></a></li>
                        <li>
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <a class="dropdown-item" href="#"><button class="btn btn-danger"><i class="fa fa-door-open"></i> Logout</button></a>
                            </form>
                        </li>
                    </ul>
                </div>
                @else
                <a class="btn-login" href="{{route('login')}}">Mari bergabung!</a>
                @endif
            </div>
        </div>
    </div>
</nav>