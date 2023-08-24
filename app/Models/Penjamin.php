<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjamin extends Model
{
    use HasFactory;

    protected $fillable = [
        'nasabah_id',
        'tipe_penjamin',
        'nama',
        'kontak',
        'alamat',
    ];

    public function nasabah()
    {
        return $this->belongsTo(Nasabah::class);
    }
}
