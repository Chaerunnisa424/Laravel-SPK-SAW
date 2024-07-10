<?php

namespace App\Models;

use App\Models\Kriteria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sub extends Model
{
    use HasFactory;
    protected $fillable = ['subs'];
    protected $table = 'subs';
    public function sub(): HasMany
    {
        return $this->hasMany(Kriteria::class, 'kode_id', 'kode');
    }
    public function kriteria(): BelongsTo
    {
        return $this->belongsTo(Kriteria::class, 'kode_id', 'kode');
    }
}
