<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailNasabah extends Model
{
    use HasFactory;

    protected $fillable = [
        'nasabah_id',
        'nik',
        'no_kk',
        'jenis_kelamin',
        'pekerjaan',
        'gaji',
        'pengeluaran',
        'tanggungan',
    ];

    public function nasabah()
    {
        return $this->belongsTo(Nasabah::class);
    }
}
