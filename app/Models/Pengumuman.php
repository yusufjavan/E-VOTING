<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $table = 'pengumuman';

    protected $fillable = [
        'judul',
        'isi',
        'tanggal',
        'dipublikasikan',
    ];

    protected function casts(): array
    {
        return [
            'tanggal' => 'date',
            'dipublikasikan' => 'boolean',
        ];
    }

    /**
     * Scope: hanya pengumuman yang dipublikasikan, urut tanggal terbaru.
     */
    public function scopeDipublikasikan($query)
    {
        return $query->where('dipublikasikan', true)->orderByDesc('tanggal');
    }
}
