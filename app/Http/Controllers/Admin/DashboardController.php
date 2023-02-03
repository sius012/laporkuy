<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\User;
class DashboardController extends Controller
{
    public function index(){
        $role = ["admin","petugas"];
        
        $laporanMenunggu = Laporan::where("status","menunggu")->count();
        $laporanKepetugas = Laporan::where("status","kepetugas")->count();
        $laporanDiproses = Laporan::where("status","diproses")->count();
        $laporanSelesai = Laporan::where("status","selesai")->count();


        $jumlahadmin = User::role("admin")->count();
        $jumlahpetugas = User::role("petugas")->count();
        $jumlahmasyarakat = User::role("masyarakat")->count();

        return view("admin.dashboard.index", ["laporan_menunggu" => $laporanMenunggu, "laporan_kepetugas"=>$laporanKepetugas,"laporan_diproses"=>$laporanDiproses, "laporan_selesai" => $laporanSelesai,
        "jumlahadmin" => $jumlahadmin,
        "jumlahpetugas" => $jumlahpetugas,
        "jumlahmasyarakat" => $jumlahmasyarakat,
    ]);
    }
}