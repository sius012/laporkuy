<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Petugas\PetugasController;

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/add', [App\Http\Controllers\LaporanController::class, 'add'])->name('add');

Auth::routes();





Auth::routes();

Route::get('/flogout',[App\Http\Controllers\UserController::class, 'logout']);


Route::middleware(["rolenew:petugas|admin"])->prefix("petugas")->group(function(){
    Route::get("/tugassaya", [App\Http\Controllers\Petugas\PetugasController::class, "index"]);
    
});

Route::middleware(["rolenew:admin"])->prefix("admin")->group(function(){
        //Dashboard
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
        Route::get('/laporan', [App\Http\Controllers\LaporanController::class, 'index'])->name("admin.laporan.index");
        Route::post('/buatlaporan', [App\Http\Controllers\LaporanController::class, 'buatLaporan'])->name('admin.laporan.buat');

        //laporan
        Route::get('/halamanunduh', [App\Http\Controllers\CetakLaporanController::class, 'index']);
        Route::post('/unduhlaporan', [App\Http\Controllers\CetakLaporanController::class, 'CetakLaporan']);

        //laporanPetugas
        Route::post('/tambahpetugas', [App\Http\Controllers\LaporanController::class, 'tambahPetugas'])->name('admin.laporan.tambahpetugas');
        Route::post('/perbaruipetugas', [App\Http\Controllers\LaporanController::class, 'tambahPetugas'])->name('admin.laporan.perbaruipetugas');
        //dapatkaninformasidetail


        //pengelolaan pengguna
        Route::get('/userdata', [App\Http\Controllers\UserdataController::class, 'index'])->name('admin.user.tampil');
        Route::post('/getuserdetail', [App\Http\Controllers\UserdataController::class, 'getuserdetail'])->name('admin.user.detail');
        Route::post('/tambahuser',[App\Http\Controllers\UserdataController::class, 'tambahuser']);
        Route::post('/tambahrole',[App\Http\Controllers\UserdataController::class, 'tambahrole']);
        Route::post('/editroleuser',[App\Http\Controllers\UserdataController::class, 'editroleuser']);

        Route::get('/laporan/hapus/{id}', [App\Http\Controllers\LaporanController::class, 'hapusLaporan']);
});



    

//General
Route::post('/getuserdata', [App\Http\Controllers\UserDataController::class,  "edituser"]);


//Laporan General
Route::post('/getdetaillaporan', [App\Http\Controllers\LaporanController::class, 'getdetaillaporan']);
Route::post("/ubahstatuslaporan", [App\Http\Controllers\LaporanController::class, "ubahstatuslaporan"]);
Route::get("/laporan/get", [App\Http\Controllers\LaporanController::class, "getlaporan"]);
Route::post("/laporan/selesai", [App\Http\Controllers\LaporanController::class, "laporanselesai"]);
Route::post("/kirimtanggapan", [App\Http\Controllers\LaporanController::class, "kirimtanggapan"]);



//General Need Auth
Route::middleware("auth")->group(function(){
    Route::post('/caripetugas', [PetugasController::class, 'cariPetugas'])->name('petugas.cari');
    Route::post('/user/getroles', [App\Http\Controllers\UserController::class,  "getroles"])->name('user.getro');
    Route::get('/pengaturanakun', [App\Http\Controllers\PengaturanAkunController::class,  "index"])->name('pengaturan.akun');
    Route::post('/editaccount', [App\Http\Controllers\PengaturanAkunController::class, "perbaruiakun"]);
});

Route::get("/redirect", [App\Http\Controllers\RedirectController::class,  "index"])->name('route.redirect');



Route::get("/", [App\Http\Controllers\Masyarakat\LaporanMasyarakatController::class, "index"]);
//Masyarakat
Route::middleware("rolenew:masyarakat|admin")->group(function(){
    
    Route::get("/laporansaya", [App\Http\Controllers\Masyarakat\LaporanMasyarakatController::class, "laporanSaya"]);
    Route::post("/buatlaporanmasyarakat", [App\Http\Controllers\Masyarakat\LaporanMasyarakatController::class, "buatlaporan"])->name("masyarakat.laporan.buat");
});




Auth::routes();







//Login Cheater
Route::post('/flogin', [App\Http\Controllers\LoginController::class, function(Request $req){
  
        $email      = $req->input('email');
        $password   = $req->input('password');

        if(Auth::guard('web')->attempt(['email' => $email, 'password' => $password])) {
            return response()->json([
                'success' => true
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Login Gagal!'
            ], 401);
        }


}]);