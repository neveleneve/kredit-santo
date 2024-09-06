<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nasabah extends Model {
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama',
        'alamat',
        'village_id',
    ];

    public function detailNasabah() {
        return $this->hasOne(DetailNasabah::class);
    }

    public function penilaian() {
        return $this->hasOne(Penilaian::class);
    }

    public function village() {
        return $this->belongsTo(Village::class);
    }
}
