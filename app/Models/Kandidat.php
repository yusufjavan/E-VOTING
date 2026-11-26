<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kandidat extends Model
{
    protected $table = 'kandidat';

    protected $fillable = [
        'nomor',
        'nama_ketua',
        'nama_wakil',
        'foto',
        'tagline',
        'latar_ketua',
        'latar_wakil',
        'visi_singkat',
        'visi_utama',
        'misi',
        'program_kerja',
    ];

    protected function casts(): array
    {
        return [
            'misi' => 'array',
            'program_kerja' => 'array',
        ];
    }

    /**
     * Relasi ke suara anonim (hanya untuk hitung agregat, bukan untuk korelasi pemilih).
     */
    public function suara(): HasMany
    {
        return $this->hasMany(Suara::class, 'kandidat_id');
    }

    /**
     * Hitung jumlah suara yang diperoleh kandidat ini.
     */
    public function jumlahSuara(): int
    {
        return $this->suara()->count();
    }
}
