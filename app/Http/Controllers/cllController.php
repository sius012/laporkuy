<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChangeLogLaporan;

class cllController extends Controller
{
    public static function buatLog($id_laporan,$arr){
        $cl = new ChangeLogLaporan();
        $cl->id_laporan = $id_laporan;
        $cl->log = $arr["log"];

        $cl->save();
    }

    public static function updateLog($id_laporan,$arr){
        $cl = ChangeLogLaporan::where("id_laporan",$id_laporan)->first();
        $clLog = $cl["log"];

        //updateLog
        ChangeLogLaporan::where("id_laporan",$id_laporan)->update(["log"=> array_merge($clLog,[$arr])]);
    }
}
