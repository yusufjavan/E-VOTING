<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Suara extends Model
{
    use HasUuids;

    protected $table = 'suara';

    /**
     * Tanpa timestamps agar tidak bisa dicocokkan lewat urutan/waktu.
     */
    public $timestamps = false;

    protected $fillable = [
        'kandidat_id',
    ];

    /**
     * Hanya relasi ke kandidat — tidak ada relasi ke user/pemilih
     * demi menjaga kerahasiaan suara.
     */
    public function kandidat(): BelongsTo
    {
        return $this->belongsTo(Kandidat::class, 'kandidat_id');
    }
}
