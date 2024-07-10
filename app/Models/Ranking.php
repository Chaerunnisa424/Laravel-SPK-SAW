<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ranking extends Model
{
    use HasFactory;

    public static function getbobot($id_alternatif)
    {
        $data = DB::select("SELECT SUM(bobot) AS bobot FROM nilaiReferensi WHERE id_alternatif = '".$id_alternatif."'");
        return $data[0]->bobot;
    }

    public static function savingdata($id_alternatif, $bobot)
    {
        try {
            $save = DB::table('ranking')->insert([
                'id_alternatif' => $id_alternatif,
                'bobot' => $bobot
            ]);

            return "Success";
        } catch (\Exception $e) {
            return $e;
        }
    }

    public static function deletedata($id_alternatif)
    {
        try {
            $save = DB::table('ranking')
                ->where("id_alternatif", $id_alternatif)
                ->delete();

            return "Success";
        } catch (\Exception $e) {
            return $e;
        }
    }

    public static function getall()
    {
        $data = DB::select("SELECT * FROM ranking LEFT JOIN kosts ON ranking.id_alternatif = kosts.id ORDER BY bobot DESC");
        return $data;
    }
}
