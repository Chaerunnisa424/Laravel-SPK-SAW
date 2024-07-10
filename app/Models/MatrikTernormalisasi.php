<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MatrikTernormalisasi extends Model
{
    use HasFactory;

    /**
     * Mengambil bobot relatif untuk suatu alternatif dan kriteria
     *
     * @param int $id_alternatif
     * @param int $id_kriteria
     * @return float|null
     */
    public static function getbobot($id_alternatif, $id_kriteria)
    {
        // Mengambil atribut kriteria (benefit atau cost) dari tabel kriterias
        $kriteria = DB::table('kriterias')
                    ->where('kode', $id_kriteria)
                    ->first();

        if (!$kriteria) {
            return null; // Mengembalikan null jika kriteria tidak ditemukan
        }

        $atribut = strtolower($kriteria->atribut); // Pastikan atribut dalam lowercase

        // Menghitung nilai maksimum bobot dari tabel ratingkecocokan untuk kriteria tertentu
        $max_bobot = DB::table('ratingkecocokan')
                        ->where('id_kriteria', $id_kriteria)
                        ->max('bobot');

        // Menghitung nilai minimum bobot dari tabel ratingkecocokan untuk kriteria tertentu
        $min_bobot = DB::table('ratingkecocokan')
                        ->where('id_kriteria', $id_kriteria)
                        ->min('bobot');

        // Mengambil bobot dari tabel ratingkecocokan untuk id_alternatif dan id_kriteria yang diberikan
        $rating = DB::table('ratingkecocokan')
                    ->where('id_alternatif', $id_alternatif)
                    ->where('id_kriteria', $id_kriteria)
                    ->value('bobot');

        if ($atribut == 'benefit') {
            if ($max_bobot != 0) {
                $bobot_relatif = $rating / $max_bobot;
            } else {
                return null; // Mengembalikan null jika max_bobot bernilai 0 (untuk menghindari pembagian oleh 0)
            }
        } elseif ($atribut == 'cost') {
            if ($rating != 0) {
                $bobot_relatif = $min_bobot / $rating;
            } else {
                return null; // Mengembalikan null jika rating bernilai 0 (untuk menghindari pembagian oleh 0)
            }
        } else {
            return null; // Mengembalikan null jika tipe kriteria tidak valid (harusnya tidak terjadi)
        }

        return $bobot_relatif;
    }

    /**
     * Menyimpan data bobot dalam tabel matrik ternormalisasi
     *
     * @param int $id_alternatif
     * @param int $id_kriteria
     * @param float $bobot
     * @return string|\Exception
     */
    public static function savingdata($id_alternatif, $id_kriteria, $bobot)
    {
        try {
            $save = DB::table('matrikternormalisasi')->insert([
                'id_alternatif' => $id_alternatif,
                'id_kriteria' => $id_kriteria,
                'bobot' => $bobot
            ]);

            return "Success";
        } catch (\Exception $e) {
            return $e; // Mengembalikan exception jika terjadi kesalahan saat menyimpan data
        }
    }

    /**
     * Menghapus data berdasarkan id_alternatif dari tabel matrik ternormalisasi
     *
     * @param int $id_alternatif
     * @return string|\Exception
     */
    public static function deletedata($id_alternatif)
    {
        try {
            $save = DB::table('matrikternormalisasi')
                    ->where("id_alternatif", $id_alternatif)
                    ->delete();

            return "Success";
        } catch (\Exception $e) {
            return $e; // Mengembalikan exception jika terjadi kesalahan saat menghapus data
        }
    }

    /**
     * Mengambil semua data dari tabel matrik ternormalisasi dengan join ke tabel kosts
     *
     * @return array
     */
    public static function getalldata()
    {
        $data = DB::select("SELECT * FROM matrikternormalisasi LEFT JOIN kosts ON matrikternormalisasi.id_alternatif = kosts.id");
        return $data;
    }

    /**
     * Mengambil semua id_alternatif yang unik dari tabel matrik ternormalisasi
     *
     * @return array
     */
    public static function getalldatadisticnt()
    {
        $data = DB::select("SELECT DISTINCT(id_alternatif) FROM matrikternormalisasi");
        return $data;
    }
}
