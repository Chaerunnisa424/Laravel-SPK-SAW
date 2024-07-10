<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kosts = DB::table('kosts')->get();

        return view('kost.index', compact('kosts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kost.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'nama' => 'required|min:2',
            'tempat' => 'required',
        ]);

        DB::table('kosts')->insert([
            'id' => $request->id,
            'nama' => $request->nama,
            'tempat' => $request->tempat,
        ]);
        return redirect('kost')->with('status', 'Tambah Kost Berhasil !!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ubahkost = DB::table('kosts')->where('id', $id)->first();

        return view('kost.edit', compact('ubahkost'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kost $kost)
    {
        // Implementasi untuk mengedit kost
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id' => 'required',
            'nama' => 'required|min:2',
            'tempat' => 'required',
        ]);

        DB::table('kosts')->where('id', $id)
            ->update([
                'id' => $request->id,
                'nama' => $request->nama,
                'tempat' => $request->tempat
            ]);
        return redirect('kost')->with('status', 'Edit Kost Berhasil !!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('kosts')->where('id', $id)->delete();
        return redirect('kost')->with('delete', 'Hapus Data Kost Berhasil !!');
    }
}
