<?php

namespace App\Http\Controllers\Masyarakat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LaporanController;
use RealRashid\SweetAlert\Facades\Alert;

use Auth;

    

class LaporanMasyarakatController extends Controller
{
    public function index(){
        
        return view("masyarakat.laporan_masyarakat");
       
    }

    public function buatLaporan(Request $req){
        $laporanku = new LaporanController();
        $laporanku->tambahLaporan($req);
        Alert::success('Laporan Berhasil dibuat', 'laporan anda akan diproses oleh admin');
        return redirect("/laporansaya");

    }

    public function laporanSaya(Request $req){
        

        

   
        $laporan = new LaporanController;
        $data = $laporan->getlaporanuser(Auth::user()->id, $req->filled("filter") ? $req : null);
        
        //tambahkan detail
        foreach($data as $i => $dt){
            $myRequest = new Request();
            $myRequest->setMethod('POST');
            $myRequest->request->add(['id' => $dt["_id"]]);
            $myRequest->request->add(['state' => ["respon_laporan","nojson","change_log"]]);

            $detail = new LaporanController;
            
            $data[$i] = $detail->getdetaillaporan($myRequest);
        }
        
        // /dd($data);
        
            
        return view("masyarakat.laporansaya", ["latat"=>true, "laporan"=>$data]);
    }
}
