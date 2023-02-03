<div class="card flex-row flex-wrap m-3 card-task card-selesai">
        <div class="row">
            <div class="col-4 d-flex">
            @php $id = $data['mainContent']['_id'];@endphp
            <img src="{{$data['mainContent']['lampiran'][0]['image']}}" alt=""  style="width:100%; height:100%;" class="trigger-show-laporan my-auto" data-bs-toggle="modal" data-bs-target="#modal-laporan" onclick="showLaporan('{{$id}}')"/>
            </div>
            <div class="col-8 p-1">
            <p class="card-title" title="{{$data['mainContent']['judul_laporan']}}"><b>{{truncate($data["mainContent"]["judul_laporan"],20)}}</b></p>
            <p><i class="fa fa-calendar"></i>{{" ".$data["mainContent"]["tanggal"]}}</p>
            </div>
        </div>
        
    </div>