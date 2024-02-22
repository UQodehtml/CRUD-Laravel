<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kota;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{
    public function index(Request $request){
        $kota = Kota::pluck('kota', 'id');
        if($request->has('search')){
            $data = Siswa::where('nis', 'LIKE', '%' .$request->search. '%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        } else{
            $data = Siswa::paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }
        return view('siswa', compact('data', 'kota'));
    }

    public function tambahsiswa(){
        $datakota = Kota::all();
        return view('tambahsiswa', compact('datakota'));
    }

    public function insertsiswa(Request $request){
        $this->validate($request, [
            'nis' => 'required|min:6|max:8',
            'nama' => 'required',
        ]);

        $data = Siswa::create($request->all());
        return redirect()->route('siswa')->with('succes', 'Data Berhasil Ditambahkan!');
    }

    public function tampilkandata($id){
        $data = Siswa::find($id);
        $kota = Kota::pluck('kota', 'id');
        // dd($data);
        return view('tampildata', compact('data', 'kota'));
    }

    // function untuk mengupdate data dari halaman tampildata dan menampilkan notifikasi berhasil update di halaman siswa
    public function updatedata(Request $request, $id){
        $data = Siswa::find($id);
        $data->update($request->all());
        if(session('halaman_url')){
            return Redirect(session('halaman_url'))->with('succes', 'Data Berhasil Diupdate!');
        } 
        return redirect()->route('siswa')->with('succes', 'Data Berhasil Diupdate!');
    }

    // function untuk
    public function deletedata($id){
        $data = Siswa::find($id);
        $data->delete();
        return redirect()->route('siswa')->with('succes', 'Data Berhasil Dihapus!');
    }

    public function dashboard(){
        // $totalsiswa = Siswa::count('*');
        // $totalsiswalaki = Siswa::where('jenis_kelamin', 'Laki-Laki')->count();
        // $totalsiswaperempuan = Siswa::where('jenis_kelamin', 'Perempuan')->count();
        // // $siswaPerKota = Siswa::select('kota', DB::raw('count(*) as total'))->groupBy('kota')->get();

        // return view('dashboard')->with('totalsiswa', $totalsiswa)->with('totalsiswalaki', $totalsiswalaki)->with('totalsiswaperempuan', $totalsiswaperempuan);
    }
}
