<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Laporan;
use Auth;
use App\Models\User;


class PetugasController extends Controller
{
    public function index(Request $req){
        $laporanMasuk = Laporan::where('petugas', 'elemMatch', ["_id"=> Auth::user()->id])->where("status", "kepetugas")->get();
        $laporanDiproses = Laporan::where('petugas', 'elemMatch', ["_id"=> Auth::user()->id])->where("status", "diproses")->get();
        $laporanUlang = Laporan::where('petugas', 'elemMatch', ["_id"=> Auth::user()->id])->where("status", "repeat")->get();
        $laporanSelesai = Laporan::where('petugas', 'elemMatch', ["_id"=> Auth::user()->id])->where("status", "selesai")->get();
      //  dd($laporanMasuk);

        return view("petugas.index",["laporan"=>$laporanMasuk,"diproses"=>$laporanDiproses,"selesai"=>$laporanSelesai,"tindak_ulang"=>$laporanUlang]);
    }
    public function cariPetugas(Request $req){
        $data = User::role("petugas")->where("name", "LIKE" ,"%".$req->kw."%")->get()->toArray();

        return json_encode(["kw"=>$data,]);
    }
}
