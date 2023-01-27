<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Laporan;
class DashboardController extends Controller
{
    public function index(){
        $laporanMenunggu = Laporan::where("status","menunggu")->count();
        $laporanKepetugas = Laporan::where("status","kepetugas")->count();
        $laporanDiproses = Laporan::where("status","diproses")->count();
        $laporanSelesai = Laporan::where("status","selesai")->count();

        return view("admin.dashboard.index", ["laporan_menunggu" => $laporanMenunggu, "laporan_kepetugas"=>$laporanKepetugas,"laporan_diproses"=>$laporanDiproses, "laporan_selesai" => $laporanSelesai]);
    }
}
