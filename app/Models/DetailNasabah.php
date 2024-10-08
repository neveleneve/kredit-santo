<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailNasabah extends Model {
    use HasFactory;

    protected $fillable = [
        'nasabah_id',
        'nik',
        'no_kk',
        'tempat_lahir',
        'tanggal_lahir',
        'kontak',
        'jenis_kelamin',
        'status_pernikahan',
        'pekerjaan',
        'gaji',
        'aset_rumah',
        'aset_kendaraan',
    ];

    public function nasabah() {
        return $this->belongsTo(Nasabah::class);
    }
}
