<?php

namespace App\Http\Controllers;

use App\Models\Proses;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\KecocokanController;
use App\Http\Controllers\NilaiReferensiController;
use App\Http\Controllers\NilaiReferensi2Controller;
use App\Http\Controllers\MatrikTernormalisasiController;

class ProsesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->generate();

        $kecocokan =  new KecocokanController();
        $header = $kecocokan->getalldatadisticnt();
        $detail = $kecocokan->getalldata();

        $ternormalisasi = new MatrikTernormalisasiController();
        $headermatrik = $ternormalisasi->getalldatadisticnt();
        $detailmatrik = $ternormalisasi->getalldata();

        $referensi = new NilaiReferensiController();
        $headerreferensi = $referensi->getalldatadisticnt();
        $detailreferensi = $referensi->getalldata();

        $referensi2 = new NilaiReferensi2Controller();
        $headerreferensi2 = $referensi2->getall();

        $ranking = new RankingController();
        $headerranking = $ranking->getall();

        return view('proses.index',compact("header","detail","headermatrik","detailmatrik","headerreferensi","detailreferensi","headerreferensi2","headerranking"));
    }

    public function generate()
    {
        $penilaian = new Penilaian();
        $kriteriakecocokan = new KecocokanController();
        $ternormalisasi = new MatrikTernormalisasiController();
        $referensi = new NilaiReferensiController();
        $referensi2 = new NilaiReferensi2Controller();
        $ranking = new RankingController();

        $penilaianlist = $penilaian->getList();
        foreach ($penilaianlist as $item ) {
            $deletekriteriakecocokan = $kriteriakecocokan->deletedata($item->id);
            $deleternormalisasi = $ternormalisasi->deletedata( $item->id);
            $deletereferensi = $referensi->deletedata( $item->id);
            $deletereferensi2 = $referensi2->deletedata( $item->id);
            $deleteranking = $ranking->deletedata( $item->id);

            $penilaiandetail = $penilaian->getpenilaian($item->id);

            foreach ($penilaiandetail as $detail ) {
                $bobot = $kriteriakecocokan->getbobot($detail->id_sub);
                $simpankriteriakecocokan = $kriteriakecocokan->savingdata( $item->id,
                $detail->id_kriteria,round($bobot, 2));

                $bobotternormalisasi = $ternormalisasi->getbobot($item->id,$detail->id_kriteria);
                $simpanternormalisasi = $ternormalisasi->savingdata( $item->id,
                $detail->id_kriteria,round($bobotternormalisasi, 2));

                $bobotreferensi = $referensi->getbobot($item->id,$detail->id_kriteria);
                $simpanreferensi = $referensi->savingdata( $item->id,
                $detail->id_kriteria,round($bobotreferensi, 2));



            }
            $bobotreferensi2 = $referensi2->getbobot($item->id);
            $simpanreferensi2 = $referensi2->savingdata( $item->id,
            round($bobotreferensi2, 2));
            $bobotranking = $ranking->getbobot($item->id);
            $simpanranking = $ranking->savingdata( $item->id,
            round($bobotranking, 2));
        }


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
    public function show(Proses $proses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proses $proses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proses $proses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proses $proses)
    {
        //
    }
}
