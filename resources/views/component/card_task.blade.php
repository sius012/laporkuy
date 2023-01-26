<div class="card flex-row flex-wrap m-3 card-task">
        <div class="card-header border-0 m-0">
            @php $id = $data['mainContent']['_id'];@endphp
            <img src="{{$data['mainContent']['lampiran'][0]['image']}}" alt=""  style="width:80px; height:60px;" class="trigger-show-laporan m-0" data-bs-toggle="modal" data-bs-target="#modal-laporan" onclick="showLaporan('{{$id}}')"/>
        </div>
        <div class="card-block m-2">
            <p class="card-title"><b>{{$data["mainContent"]["judul_laporan"]}}</b></p>
            <p class="card-text">{{$data["mainContent"]["keterangan"]}}</p>
            <p><i class="fa fa-location-dot"></i>{{" ".$data["mainContent"]["lokasi"]}}</p>
            <p><i class="fa fa-calendar"></i>{{" ".$data["mainContent"]["tanggal"]}}</p>
        </div>
        <div class="w-100"></div>
    </div>