<nav class="navbar  navbar-expand-lg navbar-light  @if(isset($latat)) @if($latat==false)  position-absolute @endif @else position-absolute  @endif" style="width: 100%">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarTogglerDemo01">
      <a class="navbar-brand" href="#">LaporKuy</a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex" >
        <li class="nav-item">
            
          <a class="nav-link active" aria-current="page" href="{{url('/')}}"> <i class="bi bi-house-door-fill"></i> Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('laporansaya')}}"> <i class="bi bi-card-text"></i> Laporan Saya</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="bi bi-telephone-fill"></i> Kontak Admin</a>
        </li>
      </ul>
    </div>
  </div>
</nav>