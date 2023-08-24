<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
    ];

    public function detailNasabah()
    {
        return $this->hasOne(DetailNasabah::class);
    }

    public function istri()
    {
        return $this->hasOne(Istri::class);
    }

    public function penjamin()
    {
        return $this->hasOne(Penjamin::class);
    }

    public function penilaian()
    {
        return $this->hasOne(Penilaian::class);
    }
}
