<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class PengaturanPemilihan extends Model
{
    protected $table = 'pengaturan_pemilihan';

    protected $fillable = [
        'nama',
        'periode',
        'mulai',
        'selesai',
    ];

    protected function casts(): array
    {
        return [
            'mulai' => 'datetime',
            'selesai' => 'datetime',
        ];
    }

    /* ───── Status dihitung otomatis dari mulai/selesai ───── */

    /**
     * Hitung status pemilihan saat ini secara otomatis.
     *
     * @return string 'belum_dimulai'|'berlangsung'|'selesai'
     */
    public function hitungStatus(): string
    {
        $sekarang = Carbon::now();

        if ($sekarang->lt($this->mulai)) {
            return 'belum_dimulai';
        }

        if ($sekarang->gt($this->selesai)) {
            return 'selesai';
        }

        return 'berlangsung';
    }

    /**
     * Accessor: $pengaturan->status
     */
    public function getStatusAttribute(): string
    {
        return $this->hitungStatus();
    }

    /**
     * Apakah pemungutan suara sedang dibuka.
     */
    public function sedangBerlangsung(): bool
    {
        return $this->hitungStatus() === 'berlangsung';
    }

    /**
     * Label status dalam Bahasa Indonesia yang ramah pengguna.
     */
    public function getLabelStatusAttribute(): string
    {
        return match ($this->hitungStatus()) {
            'belum_dimulai' => 'Belum Dimulai',
            'berlangsung' => 'Berlangsung',
            'selesai' => 'Selesai',
        };
    }

    /* ───── Singleton helper ───── */

    /**
     * Ambil satu-satunya baris pengaturan pemilihan.
     */
    public static function aktif(): ?self
    {
        return static::first();
    }
}
