<?php

namespace App\Http\Controllers;

use App\Models\Sub;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kriteria = DB::table('kriterias')->get();
        // $kriteria = Kriteria::all();
        return view('kriteria.index', compact('kriteria'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kriteria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|min:1',
            'namakriteria' => 'required',
            'bobot' => 'required'
        ]);

        DB::table('kriterias')->insert([
            'kode' => $request->kode,
            'namakriteria' => $request->namakriteria,
            'atribut' => $request->atribut,
            'bobot' => $request->bobot
        ]);
        return redirect('kriteria')->with('status', 'Tambah Data Kriteria Berhasil !!');
    }

    /**
     * Display the specified resource.
     */
    public function show($kode)
    {
        $ubahkriteria = DB::table('kriterias')->where('kode', $kode)->first();

        return view('kriteria.edit', compact('ubahkriteria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kriteria $kriteria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $kode)
    {
        $request->validate([
            'kode' => 'required|min:1',
            'namakriteria' => 'required',
            'bobot' => 'required'
        ]);

        DB::table('kriterias')->where('kode', $kode)
            ->update([
            'kode' => $request->kode,
            'namakriteria' => $request->namakriteria,
            'atribut' => $request->atribut,
            'bobot' => $request->bobot
            ]);
        return redirect('kriteria')->with('status', 'Edit Kriteria Berhasil !!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($kode)
    {
        DB::table('kriterias')->where('kode', $kode)->delete();
        return redirect('kriteria')->with('delete', 'Hapus Data Kriteria Berhasil !!');
    }
}
