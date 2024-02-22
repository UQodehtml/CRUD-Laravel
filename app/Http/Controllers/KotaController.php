<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Kota::paginate('5');
        if($request->has('search')){
            $data = Kota::where('kota', 'LIKE', '%' .$request->search. '%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        } else{
            $data = Kota::paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }

        return view('kota', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tambahkota');
    }

    /**
     * Store a newly created resource in storage.
     */
    // Create kota masuk ke dalam database
    public function store(Request $request)
    {
        $data = Kota::create($request->all());
        return redirect()->route('kota')->with('succes', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Kota::find($id);
        return view('Tampilkota', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kota $kota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Kota::find($id);
        $data->update($request->all());
        return redirect()->route('kota')->with('succes', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Kota::find($id);
        $data->delete();
        return redirect()->route('kota')->with('succes', 'Data Berhasil Dihapus!');
    }
}
