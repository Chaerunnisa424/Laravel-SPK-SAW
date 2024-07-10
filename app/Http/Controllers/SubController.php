<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Sub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
    }
    public function show($kode)
    {
        $showsub = Sub::where('kode_id', $kode)->get();
        return view('sub.index', compact('showsub'));
    }


    public function create()
    {
        Sub::where('kode_id')->first();
        return view('sub.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'desc' => 'required',
            'nilaiawal' => 'required',
            'nilaiakhir' => 'required',
            'bobot' => 'required'
        ]);
        $sub = Sub::where('kode_id')->first();
        $sub = new Sub;
        $sub->kode_id = $request->kode;
        $sub->desc = $request->desc;
        $sub->nilaiawal = $request->nilaiawal;
        $sub->nilaiakhir = $request->nilaiakhir;
        $sub->bobot = $request->bobot;
        $sub->save();
        return redirect('sub/' . $request->kode)->with('status', 'Tambah Sub Berhasil !!');
    }

    public function edit($id)
    {
        $subs = Sub::where('id', $id)->first();
        return view('sub.edit', compact('subs'));
    }

    public function update(Request $request, Sub $sub)
    {
        $request->validate([
            'desc' => 'required',
            'nilaiawal' => 'required',
            'nilaiakhir' => 'required',
            'bobot' => 'required'
        ]);


        Sub::where('id', $sub->id)
            ->update([
                'kode_id' => $request->kode,
                'desc' => $request->desc,
                'nilaiawal' => $request->nilaiawal,
                'nilaiakhir' => $request->nilaiakhir,
                'bobot' => $request->bobot,
            ]);
        return redirect('sub/' . $sub->kode_id)->with('status', 'Edit Sub Berhasil !!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sub $sub)
    {
        Sub::destroy($sub->id);
        return redirect('sub/' . $sub->kode_id)->with('delete', 'Hapus Data Sub Berhasil !!');
    }
}
