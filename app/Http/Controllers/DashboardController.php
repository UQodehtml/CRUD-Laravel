<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    } 
    public function index()
    {
        $totalkota = Kota::count();
        $totalsiswa = Siswa::count();
        $totalsiswalaki = Siswa::where('jenis_kelamin','Laki-Laki')->count();
        $totalsiswaperempuan = Siswa::where('jenis_kelamin','Perempuan')->count();

        // return view('Dashboard', compact('totalsiswa', 'totalsiswalaki', 'totalsiswaperempuan', 'totalkota'));
        // mengambil data untuk chart dari tabel siswa dan kota dengan group by kota dan count total siswa per kota
        /** ex: 
         * [ 
         * ['kota' => 'Jakarta', 'total' => 10],
         * ['kota' => 'Bandung', 'total' => 20],
         * ['kota' => 'Surabaya', 'total' => 30],
         * ]
         **/
        $dataChart = DB::table('siswas')
            ->join('kotas', 'siswas.id_kota', '=', 'kotas.id')
            ->select('kotas.kota as kota', DB::raw('count(*) as total'))
            ->groupBy('kotas.kota')
            ->get()
            ->toArray();

        $dataTahunChart = DB::table('siswas')
            ->select(DB::raw('YEAR(tanggal_lahir) as tahun'), DB::raw('count(*) as total'))
            ->groupBy(DB::raw('YEAR(tanggal_lahir)'))
            ->orderBy('total', 'desc')
            ->get()
            ->toArray();
        $labelsYear = array_column($dataTahunChart, 'tahun');
        $dataTotalYear = array_column($dataTahunChart, 'total');


        return view('Dashboard')
            ->with('totalkota', $totalkota)
            ->with('totalsiswa', $totalsiswa)
            ->with('totalsiswalaki', $totalsiswalaki)
            ->with('totalsiswaperempuan', $totalsiswaperempuan)
            ->with('dataChart', $dataChart)
            ->with('labelsYear', $labelsYear)
            ->with('dataTotalYear', $dataTotalYear);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}