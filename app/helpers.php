<?php

use function Termwind\render;

function renderSpan($status){
    switch ($status) {
      case "menunggu":
        return "bg-menunggu";
        break;
      case "kepetugas":
          return "bg-petugas";
          break;
      case "diproses":
        return "bg-warning";
        break;
      case "ditolak":
          return "bg-danger";
          break;
      case "selesai":
        return "bg-selesai";
        break;
        case "ditunda":
          return "bg-onhold";
          break;
      default:
        return "bg-secondary";
    }
}

function secho($var){
  if(isset($var)){
    return $var;
  }else{
    return "data tidak ada";
  }
}



class LaporkuyLayout {



  public static function renderSidebar($url){
    $menustring = "";
    $menu =  [
      [
        "nama_menu" => "Dashboard",
        "class_icon" => "fa fa-dashboard",
        "redirect_to" => url("/admin/dashboard"),
        "only" => ["admin"]
      ],
      [
        "nama_menu" => "Laporan",
        "class_icon" => "fa fa-list",
        "redirect_to" => url("/admin/laporan"),
        "only" => ["admin"]
      ],
      [
        "nama_menu" => "Pengguna",
        "class_icon" => "fa fa-user",
        "redirect_to" => url("/admin/userdata"),
        "only" => ["admin"]
      ],
      [
        "nama_menu" => "Unduh Laporan",
        "class_icon" => "fa fa-download",
        "redirect_to" => url("/admin/halamanunduh"),
        "only"=>["admin"],
      ],
      [
        "nama_menu" => "Tugas Saya",
        "class_icon" => "fa fa-list",
        "redirect_to" => url("/petugas/tugassaya"),
        "only"=>["petugas","admin"],
      ],
       [
        "nama_menu" => "Pengaturan Akun",
        "class_icon" => "fa fa-gear",
        "redirect_to" => url("/pengaturanakun"),
        "only" => ["petugas", "admin"]
      ]

      ,

    
      ];

   
    foreach($menu as $i => $m){
        

    if(isset($m["title"])){
      if($m["title"] == true){
        $menustring .= '<div class="row">
      <a href="'.(isset($m["redirect_to"]) ? $m["redirect_to"] : "#").'" class="p-3 side-link nav-link ">
          <div class="row">
             
              <div class="col-9 fw-bold fs-2">'.$m["nama_menu"].'</div>
              <div class="col-3"></div>
          </div>
      </a>
      
   </div>';
      }
      
    }else if(in_array(App\Models\User::myRole()[0],$m["only"])){

      
      $menustring .= '<div class="row">

      
        <a href="'.(isset($m["redirect_to"]) ? $m["redirect_to"] : "#").'" class="p-3 side-link nav-link '.($m["redirect_to"] == $url ? "nav-link-active" : "").'">
            <div class="row">
                <div class="col-3"><i class=" px-3 '.(isset($m["class_icon"]) ? $m["class_icon"] : "") .'"></i></div>
                <div class="col-9 fw-bold">'.$m["nama_menu"].'</div>
            </div>
        </a>
        
     </div>';
    }

  
  }
  echo $menustring;
}
}

function truncate($string, $length, $dots = "...") {
  return (strlen($string) > $length) ? substr($string, 0, $length - strlen($dots)) . $dots : $string;
}



?>