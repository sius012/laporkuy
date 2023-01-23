<?php

namespace App\Http\Controllers\Masyarakat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LaporanController;
use RealRashid\SweetAlert\Facades\Alert;

class LaporanMasyarakatController extends Controller
{
    public function index(){
       
        return view("masyarakat.laporan_masyarakat");
       
    }

    public function buatLaporan(Request $req){
        $laporanku = new LaporanController();
        $laporanku->tambahLaporan($req);
        Alert::success('Laporan Berhasil dibuat', 'laporan anda akan diproses oleh admin');
        return redirect()->back();

    }

    public function laporanSaya(Request $req){

        return view("masyarakat.laporansaya", ["darkmode"=>true]);
    }
}
