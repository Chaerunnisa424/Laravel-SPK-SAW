<?php

namespace App\Http\Controllers;

use App\Models\Sub;
use App\Models\Kost;
use App\Models\Kriteria;
use App\Models\Penilaian;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\KriteriaKecocokan;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\KecocokanController;
use App\Http\Controllers\NilaiReferensiController;
use App\Http\Controllers\MatrikTernormalisasiController;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penilaian = Penilaian::getList();
        $kriteria = Kriteria::all();
        $detail = Penilaian::getnilai();
        return view('penilaian.index', compact('penilaian', 'detail'));
        // return $penilaian;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $alternatif = Kost::all();
        $kriteria = Kriteria::all();
        $sub = Sub::all();
        return view('penilaian.create', compact('alternatif', 'kriteria', 'sub'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $penilaian = new Penilaian();
    $i = 0;

    // Validasi inputan jika diperlukan
    // $this->validate($request, [
    //     'id_alternatif' => 'required',
    //     'idkriteria.*' => 'required',
    //     'sub.*' => 'required',
    // ]);

    // Cek jika idnilai tidak kosong, maka hapus data penilaian yang sudah ada untuk id_alternatif ini
    if ($request->idnilai != "") {
        DB::table('penilaians')->where('id_alternatif', $request->id_alternatif)->delete();
    }

    // Cek apakah data penilaian untuk id_alternatif sudah ada
    $cekdata = $penilaian->getpenilaian($request->id_alternatif);
    if (count($cekdata) > 0) {
        return redirect('penilaian')->with('error', 'Tambah Penilaian Gagal Karena Data Sudah Ada');
    }

    foreach ($request->idkriteria as $key) {
        $penilaian = new Penilaian(); // Inisialisasi ulang $penilaian untuk setiap iterasi
        $penilaian->id_alternatif = $request->id_alternatif;
        $penilaian->id_kriteria = $key;
        $penilaian->nilai = $request->sub[$i];
        $penilaian->id_sub = $penilaian->getidsub($key, $request->sub[$i]);
        $penilaian->save();

        $i += 1;
    }

    return redirect('penilaian')->with('status', 'Tambah atau edit penilaian berhasil !!');
}




    /**m
     * Display the specified resource.
     */
    public function show($penilaian)
    {
        $alternatif = Kost::all();
        $kriteria = Kriteria::all();
        $sub = Sub::all();
        $data = DB::table('penilaians')->where('id_alternatif', $penilaian)->get();

        return view('penilaian.edit', compact('data', 'alternatif', 'sub', 'kriteria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penilaian $penilaian)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Ambil data penilaian berdasarkan $id
    $penilaian = Penilaian::find($id);

    // Validasi apakah penilaian ditemukan
    if (!$penilaian) {
        return redirect('penilaian')->with('error', 'Penilaian tidak ditemukan.');
    }

    // Lakukan update nilai-nilai penilaian
    $i = 0;
    foreach ($request->idkriteria as $key) {
        // Update nilai-nilai di sini, contoh:
        $penilaian->nilai = $request->sub[$i];
        $penilaian->id_sub = $penilaian->getidsub($key, $request->sub[$i]);
        $penilaian->save();

        $i++;
    }

    // Redirect ke halaman penilaian dengan pesan sukses
    return redirect('penilaian')->with('status', 'Update Penilaian Berhasil !!');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($penilaian)
{
    // Hapus data pada tabel penilaians
    DB::table('penilaians')->where('id_alternatif', $penilaian)->delete();

    // Hapus data terkait pada tabel rating kecocokan
    DB::table('ratingkecocokan')->where('id_alternatif', $penilaian)->delete();

    // Hapus data terkait pada tabel matriks ternormalisasi
    DB::table('matrikternormalisasi')->where('id_alternatif', $penilaian)->delete();

    // Hapus data terkait pada tabel nilai preferensi
    DB::table('nilaireferensi')->where('id_alternatif', $penilaian)->delete();

    // Hapus data terkait pada tabel ranking
    DB::table('ranking')->where('id_alternatif', $penilaian)->delete();

    return redirect('penilaian')->with('delete', 'Hapus Data Penilaian Berhasil !!');
}

}
