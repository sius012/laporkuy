<div class="btn-group">
    <button type="button" class="btn dropdown-toggle {{renderSpan($lp->status)}}" data-bs-toggle="dropdown"
        aria-expanded="false" value="{{$lp->_id}}">
        {{$lp["status"]}}
    </button>
    <ul class="dropdown-menu" id="tuning-options">
        <li><a class="dropdown-item" href="#" value="menunggu">Menunggu</a></li>
        <li><a class="dropdown-item" href="#" value="kepetugas">Ke Petugas</a></li>
        <li><a class="dropdown-item" href="#" value="diproses">Diproses</a></li>
        <li><a class="dropdown-item" href="#" value="ditunda">Ditunda</a></li>
        <li><a class="dropdown-item" href="#" value="selesai">Selesai</a></li>

    </ul>
</div>