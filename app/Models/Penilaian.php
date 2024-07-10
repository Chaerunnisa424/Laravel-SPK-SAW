<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penilaian extends Model
{
    use HasFactory;

    protected $fillable = ['id_alternatif', 'id_kriteria', 'id_sub', 'nilai'];

    public function alternatif(): BelongsTo
    {
        return $this->belongsTo(Kost::class, 'id_alternatif', 'id');
    }

    public function sub(): BelongsTo
    {
        return $this->belongsTo(Sub::class, 'id_sub', 'id');
    }

    public function kriteria(): BelongsTo
    {
        return $this->belongsTo(Kriteria::class, 'id_kriteria', 'kode');
    }

    public function getidsub($codekriteria, $nilai)
    {
        $data = null;
        if (is_numeric($nilai)) {
            $data = DB::select("SELECT * FROM subs WHERE kode_id = ? AND ? BETWEEN CAST(nilaiawal AS UNSIGNED) AND CAST(nilaiakhir AS UNSIGNED)", [$codekriteria, $nilai]);
        } else {
            $data = DB::select("SELECT * FROM subs WHERE kode_id = ? AND ? BETWEEN nilaiawal AND nilaiakhir", [$codekriteria, $nilai]);
        }

        if (!empty($data)) {
            return $data[0]->id;
        } else {
            return null;
        }
    }

    public static function getnilai()
    {
        return DB::select("SELECT * FROM penilaians LEFT JOIN kosts ON penilaians.id_alternatif = kosts.id");
    }

    public static function getList()
    {
        return DB::select("SELECT DISTINCT(id_alternatif) as id FROM penilaians");
    }

    public static function getpenilaian($id_alternatif)
    {
        return DB::select("SELECT * FROM penilaians WHERE id_alternatif = ?", [$id_alternatif]);
    }
}
