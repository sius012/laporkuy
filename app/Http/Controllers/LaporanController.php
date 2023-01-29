<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use Auth;
use App\Models\User;
use App\Models\ResponLaporan;
use Illuminate\Support\Facades\DB;
use Stevebauman\Location\Facades\Location;
use DataTables;


//getChangeLog
use App\Http\Controllers\cllController;
use App\Models\ChangeLogLaporan;

use App\DataTables\LaporanDataTable;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;


class LaporanController extends Controller
{
    public function index(Request $req){
    $data = Laporan::all();
       


        
      
   return view("admin.laporan.index", ["laporan"=>$data]);
    // return DataTables::of($data)->addIndexColumn()->addColumn('tes', function(){
    //     return '<span> tes</span>';
    // })->make(true);
    // return $dataTable->render("laporan.index");
    
    }

    public function add(){
        

        
    }

    public function buatLaporan(Request $req){
        
        $this->tambahLaporan($req);
    
        return redirect()->back();
    }



    public function tambahPetugas(Request $req){
        $idLaporan = $req->idlaporan;

        
       
        $daftarpetugas = [];
        foreach($req->input("uid") as $i => $fc){
            $datapetugas = User::role("petugas")->find($fc);


            
            
            
            $daftarpetugas[$i] = $datapetugas->toArray();
            $daftarpetugas[$i]["jabatan"] = $req->jabatan[$i];

            
        }
        //INISIALISASI DASAR
        $modelLaporan = Laporan::where("_id",$idLaporan)->first();
        $akunadmin = User::where("_id", Auth::user()->id)->first()->toArray();
        

        //PEMANBAHAN PETUGAS
        if(count($daftarpetugas) > 0 ){
            
            $modelLaporan->petugas = $daftarpetugas;
            $modelLaporan->save();
        }

        //PENAUTAN ADMIN
        $modelLaporan->admin = $akunadmin;
        

        //PERUBAHAN STATUS
        $modelLaporan->status = "kepetugas";
        
        $modelLaporan->save();


        //Membuat Keterengan Respon Laporan
        $responLaporan = new ResponLaporan();

        $responLaporan->keterangan = $req->keterangan;
        $responLaporan->id_laporan = $idLaporan;

        $responLaporan->save();


        //ChangeLog
        

        
        return redirect()->back();
    }








    //AJAX FUNCTION
    public function getlaporan(Request $req){
        $data = Laporan::get();
       
       
      
        
      
    // return view("admin.laporan.index", ["laporan"=>$data]);
       $datatable =  DataTables::of($data)->addIndexColumn()
            ->editColumn("pelapor.name", function($data){
                return $data->pelapor["name"];})
            ->editColumn('petugas', function($data){
                if($data->petugas != null){
                
                  $daftarpetugas = "";

                  foreach($data->petugas as $i => $pg){
                    if($i == 0){
                      $daftarpetugas.="(";
                    }

                   
                    $daftarpetugas .= $pg["name"];

                    if($pg["jabatan"] == "ketua"){
                      $daftarpetugas .= "(Ketua)";
                    }

                    if(!isset($lp["petugas"][$i+1])){
                      $daftarpetugas.=")";
                    }else{
                      $daftarpetugas .=",";
                    }


                  }

                  return "<p>".$daftarpetugas."</p>";
              
                }else{
                return "<a class='td-laporan' id_laporan='".$data->_id."' href='#' data-bs-toggle='modal'
                        data-bs-target='#modalAssigment' data-bs-whatever='@mdo'><i class='bi bi-pencil-fill'></i></a>";
                }
            })
            ->editColumn("status", function($data){
                return '<div class="btn-group">
                <button type="button" class="btn dropdown-toggle '.renderSpan($data->status).'" data-bs-toggle="dropdown"
                    aria-expanded="false" value="'.$data->_id.'">
                    '.$data->status.'
                </button>
                <ul class="dropdown-menu" id="tuning-options">
                    <li><a class="dropdown-item" href="#" value="menunggu">Menunggu</a></li>
                    <li><a class="dropdown-item" href="#" value="kepetugas">Ke Petugas</a></li>
                    <li><a class="dropdown-item" href="#" value="diproses">Diproses</a></li>
                    <li><a class="dropdown-item" href="#" value="ditunda">Ditunda</a></li>
                    <li><a class="dropdown-item" href="#" value="selesai">Selesai</a></li>

                </ul>
            </div>';
            })
            ->editColumn("created_at",function($data){
                return date("Y-m-d", strtotime($data->created_at));
            })
            ->addColumn("aksi", function($data){
                return '<button class="btn  btn-success" class="laporan-row"><i class="bi bi-info"></i></button>
                <button class="btn  btn-danger m-1" onclick="deleteLaporan('. "'".$data->_id."'".')"><i class="bi bi-trash"></i></button>';
            })  
            ->rawColumns(["petugas","status","aksi"])
            
       ->make(true);

       if($req->has("action")){

        $data = ["data"=>json_decode(json_encode($datatable))->original->data];
        
        return view("vendor.datatables.print", $data);
       }else{
        return $datatable;
       }
    }

    public function getlaporanuser($uid, $req=null){
        
        $laporanuser = Laporan::where("pelapor._id", "all", [$uid] );

        if($req!=null){
            if($req->filled("status")){
                $laporanuser->where("status", $req->status);
            }

            if($req->filled("dari") and $req->filled("sampai")){
                $laporanuser->whereBetween("tanggal", [$req->dari, $req->sampai]);
            }
            
        }

        return $laporanuser->get()->toArray();
    }


    public function getdetaillaporan(Request $req){
        $laporan = Laporan::find($req->id)->toArray();

        $nojson = false;
    
        if($req->filled("state")){
            if(in_array("nojson", $req->state)){
                $nojson = true;
            }
            foreach($req->state as $st){
                if($st == "respon_laporan"){

                    
         

                        //Get Response Laporan
                        $rp = ResponLaporan::where("id_laporan",$req->id)->first();
                        if($rp!=null){
                            $laporan["respon_laporan"] = $rp->toArray();
                        }
                }else if($st == "change_log"){
                        $log = ChangeLogLaporan::where("id_laporan",$req->id)->first()->toArray();
                        $laporan["log"] = $log["log"]; 
                }
            }
        }


        return $nojson == true ? $laporan : json_encode($laporan);
    }

    public function ubahstatuslaporan(Request $req){
        $pengubah = Auth::user()->name;
        Laporan::where("_id",$req->id_laporan )->update(["status"=>$req->status]);

        $bg = renderSpan($req->status);

       
        //ubah status laporan
        cllController::updateLog($req->id_laporan,
         ["nama_pembuat"=>$pengubah,
          "isi_keterangan"=>"mengubah status menjadi ".$req->status,
          "tanggal"=>date("Y-m-d H:i:s")
         
        ]);

        return json_encode(["bg"=>$bg]);
    }

    public function hapusLaporan($id){
        Laporan::where("_id",$id )->delete();
        ChangeLogLaporan::where("id_laporan",$id )->delete();
        ResponLaporan::where("id_laporan",$id )->delete();

        return redirect()->back();
    }


    //Global Function
    

    public function tambahLaporan(Request $req){
        if(!Auth::check()){
            return redirect("login");
        }
            $lampiran = [];

        $pelapor = User::where("_id", Auth::user()->id)->first()->toArray();

        
       
        if($req->hasfile('lampiran')){
            foreach($req->file('lampiran') as $i => $ls){
                $image = base64_encode(file_get_contents($ls));
                $lampiran[$i] = ["image"=>"data:image/jpg;base64,".$image];
            }
        }

    
            $laporan = new Laporan();

            $laporan->judul_laporan = $req->judul_laporan;
            $laporan->keterangan = $req->keterangan;
            $laporan->pelapor = $pelapor;
            $laporan->petugas = null;
            $laporan->lampiran = $lampiran;
            $laporan->lokasi = $req->lokasi;
            $laporan->admin = null;
            $laporan->status = "menunggu";
            $laporan->tanggal = $req->tanggal;
        
        
            $laporan->save();
     
        //Initialisiasi change Log
        cllController::buatLog($laporan->_id,[
            'log'=>[[
                "nama_pembuat" => Auth::user()->name,
                "isi_keterangan" => "membuat laporan",
                "tanggal" => date("Y-m-d H:i:s")
            ]]
             ]);
        
    
        
    }

    public function laporanSelesai(Request $req){
       $id = $req->id_laporan;
       $keterangan_petugas = $req->keterangan;
       $id_petugas = Auth::user()->id;
       

       ResponLaporan::where("id_laporan", $id)->update(["keterangan_petugas" => $keterangan_petugas, "petugas"=> User::where("_id", $id_petugas)->first()->toArray()]);
       Alert::success("Laporan Selesai", "Anda Mengakhiri Laporan");

       $req->status = "selesai";
       //ChangeLog 
       $this->ubahstatuslaporan($req);
       return redirect()->back();

    }


}