<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\ResponLaporan;
use App\Http\Controllers\LaporanController;
use PDF;


class CetakLaporanController extends Controller
{
    public function index(Request $req){
        return view("admin.unduhlaporan.index");
    }
    public function CetakLaporan(Request $req){
        $laporan = Laporan::orderBy("status", "menunggu");
    
        
       

        $laporan = $laporan->groupBy("status")->get()->pluck("status");
        
        $finaloutput = [];

        foreach($laporan as $i => $lp){
            $list = Laporan::where("status", $lp);
            if($req->filled("dari") and $req->filled("sampai")){
                $list->whereBetween("tanggal", [$req->dari, $req->sampai]);
            }
            $list = $list->get()->toArray(); 
            $finaloutput[$lp] = $list;

            foreach($list as $j => $ls){
                $detail = ResponLaporan::where("id_laporan", $ls["_id"])->first();
                if($detail!=null){
                    $detail = $detail->toArray();
                }
                $finaloutput[$lp][$j]["respon_laporan"] = $detail;
            }
        }

     //dd($finaloutput);


       //dd($finaloutput);
        //Penambahan Petugas



    //dd($finaloutput);
    $pdf = PDF::loadview('printable.laporan_printable',['laporan'=>$finaloutput]);
    return $pdf->download('Laporan-'.date("d-m-Y").'.pdf');
     //   return view('printable.laporan_printable',['laporan'=>$finaloutput]);
    }
}
