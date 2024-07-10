<?php

namespace App\Http\Controllers;

use App\Models\NilaiReferensi;
use App\Models\nilaiReferensi2;
use Illuminate\Routing\Controller;
use \Illuminate\Database\Eloquent\Factories\HasFactory;



class NilaiReferensi2Controller extends Controller
{
    use HasFactory;

    public  function getbobot($id_alternatif)
    {
        $data = NilaiReferensi2::getbobot($id_alternatif);
        return $data;
    }

    public  function savingdata($id_alternatif,$bobot)
    {

        $data = nilaiReferensi2::savingdata($id_alternatif,$bobot);
        return $data;


    }
    public  function deletedata($id_alternatif)
    {
        $data = nilaiReferensi2::deletedata($id_alternatif);
        return $data;


    }
    public  function getall()
    {
        $data = nilaiReferensi2::getall();
        return $data;
    }

}
