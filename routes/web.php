<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\SiswaController;
use App\Models\Kota;
use App\Models\Siswa;
use Illuminate\Support\Facades\Route;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route Login
Route::get('/login', [AuthController::class, 'login'])->name('login');
// Route proses login
Route::post('/loginproses', [AuthController::class, 'loginproses'])->name('loginproses');

// Route Register
Route::get('/register', [AuthController::class, 'register'])->name('register');
// Route Registeruser untuk masuk ke database users
Route::post('/registeruser', [AuthController::class, 
'registeruser'])->name('registeruser');

// Route logout untuk masuk ke login
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


// Batas Route Login & Dashboard


Route::get('/', [DashboardController::class, 'index'])->middleware('auth');
//     $totalkota = Kota::count();
//     $totalsiswa = Siswa::count();
//     $totalsiswalaki = Siswa::where('jenis_kelamin','Laki-Laki')->count();
//     $totalsiswaperempuan = Siswa::where('jenis_kelamin','Perempuan')->count();

//     return view('Dashboard', compact('totalsiswa', 'totalsiswalaki', 'totalsiswaperempuan', 'totalkota'));
// })->middleware('auth');

// Hak akses untuk admin ke beberapa fitur (user tidak bisa)
Route::group(['middleware' => ['auth', 'hakakses:admin']], function(){
    
});

// Route Crud ke (buat data siswa) Siswa
Route::get('/siswa',[SiswaController::class, 'index'])->name('siswa');
// Route crUd ke (tambah/update data siswa) Siswa
Route::get('/tambahsiswa',[SiswaController::class, 'tambahsiswa'])->name('tambahsiswa');
// Route untuk memasukan data ke dalam database 
Route::post('/insertsiswa',[SiswaController::class, 'insertsiswa'])->name('insertsiswa');

// Route untuk menampilkan data di tampilkandata
Route::get('/tampilkandata/{id}',[SiswaController::class, 'tampilkandata'])->name('tampilkandata');

// Route untuk update data di editdata
Route::post('/updatedata/{id}',[SiswaController::class, 'updatedata'])->name('updatedata');

// Route untuk menghapus data data di tampilkandata 
Route::get('/deletedata/{id}',[SiswaController::class, 'deletedata'])->name('deletedata');

// Route untuk ke Kota 
Route::get('/kota',[KotaController::class, 'index'])->name('kota')->middleware('auth');
// Route crUd ke (tambah/update data kota) Kota
Route::get('/tambahkota',[KotaController::class, 'create'])->name('tambahkota');
// Route untuk memasukan data ke dalam database 
Route::post('/insertkota',[KotaController::class, 'store'])->name('insertkota');
Route::get('/tampilkankota/{id}',[KotaController::class, 'show'])->name('tampilkankota');
Route::post('/updatekota/{id}',[KotaController::class, 'update'])->name('tampilkankota');
Route::get('/deletekota/{id}',[KotaController::class, 'destroy'])->name('deletekota');


